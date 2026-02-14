<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UsersPostRequestController extends Controller
{
    // Register
    public function Register(){
        // if(DB::table('users')->where('email',request()->input('email'))->count() > 0){
        //     return response()->json([
        //         'message' => 'Email address has been taken',
        //         'status' => 'error'
        //     ]);
        // }
        if(trim(request('ref')) !== '' && !DB::table('users')->where('uniqid',request('ref'))->exists()){
            return response()->json([
                'message' => 'Invalid referral code,please leave empty if you dont have a reference code',
                'status' => 'error'
            ]);
        }
        if(DB::table('users')->where('mobile',request('mobile'))->exists()){
            return response()->json([
                'message' => 'Mobile number already exists',
                'status' => 'error'
            ]);
        }
         if(DB::table('users')->where('username',request()->input('username'))->count() > 0){
            return response()->json([
                'message' => 'Username has been taken',
                'status' => 'error'
            ]);
        }
        $username=strtolower(str_replace([' ','-'],'_',request()->input('username')));
        $email=$username.'@gmail.com';
        DB::table('users')->insert([
            'uniqid' => strtoupper(Str::random(12)),
            'username' => $username,
            'email' => $email,
            'name' => request()->input('name'),
            'mobile' => request()->input('mobile'),
            'password' => Hash::make(request()->input('password')),
            'withdrawal' => json_decode(DB::table('settings')->where('key','general_settings')->first()->json ?? '{}')->signup_bonus ?? 0,
            'status' => 'active',
            'date' => Carbon::now(),
            'updated' => Carbon::now(),
            'photo' => 'avatar.jpg',
            'ref' => DB::table('users')->where('uniqid',request()->input('ref'))->first()->username ?? ''
        ]);
        DB::table('notifications')->insert([
            'user_id' => DB::table('users')->where('username',$username)->first()->id,
            'message' => json_encode([
                'user' => 'Registration Success',
                'admin' => '<a class="b c-primary" href="'.url('admins/user?id='.DB::table('users')->where('username',$username)->first()->id.'').'">@'.$username.'</a> Just Registerd on the site'
            ]),
            'status' => json_encode([
                'user' => 'read',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Registration successfull,redirecting to login....',
            'status' => 'success',
            'url' => url('login')
        ]);
    }
    // login
    public function Login(){
        if(DB::table('users')->where('mobile',request()->input('id'))->orWhere('username',request()->input('id'))->count() == 0){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $select=DB::table('users')->where('username',request()->input('id'))->orWhere('mobile',request()->input('id'))->first();
        if($select->status == 'banned'){
              return response()->json([
                'message' => 'Your account was banned,contact support',
                'status' => 'error'
            ]);
        }
        if(Hash::check(request()->input('password'),$select->password)){
            Auth::guard('users')->loginUsingId($select->id,true);
            DB::table('logs')->insert([
                'user_id' => Auth::guard('users')->user()->id,
                'ip' => request()->ip(),
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Login Successfull',
                'status' => 'success',
                'url' => url('users/dashboard')
            ]);
        }
         else{
            return response()->json([
                'message' => 'Invalid password',
                'status' => 'error'
            ]);

         }
    }
    // add bank
    public function AddBank(){
        $account_number=request('account_number');
        $account_name=request('account_name');
        $bank_name=request('bank_name');
       
       
      DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'bank' => json_encode([
            'account_number' => $account_number,
            'account_name' => $account_name,
            'bank_name' => $bank_name
        ])
        ]);
         DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just linked a bank account',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just linked a bank account'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account details updated success',
            'status' => 'success'
        ]);
    }
    // update photo
    public function UpdatePhoto(){
        $name=time().request()->file('photo')->getClientOriginalExtension();
        if(request()->file('photo')->move(public_path('images/users'),$name)){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'photo' => $name,
                'updated' => Carbon::now()
            ]);
              DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just updated your photo',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just updated his/her photo'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
            return response()->json([
                'message' => 'Profile photo updated successfully',
                'status' => 'success',
                'photo' => asset('images/users/'.$name.'')
            ]);
        }
    }
    // password update
    public function PasswordUpdate(){
        if(!Hash::check(request()->input('current'),Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid current password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
            return response()->json([
                'message' => 'New password and Confirm password must match',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make(request()->input('new')),
            'updated' => Carbon::now()
        ]);
         DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just updated your account password',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just updated his/her account password'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success',
            'url' => url()->to('users/profile')
        ]);
    }
    //   complete deposit
public function CompleteDeposit(){
    $receipt=time().'.'.request()->file('receipt')->getClientOriginalExtension();
    if(request()->file('receipt')->move(public_path('receipts'),$receipt)){
         DB::table('transactions')->insert([
      'uniqid' => strtoupper(uniqid('TRX')),
                'user_id' => Auth::guard('users')->user()->id,
                'type' => 'deposit',
                'class' => 'credit',
                'amount' => request()->input('amount'),
                'json' => json_encode([
                    'gateway' => 'manual',
                    'account_name' => request()->input('account_name'),
                    'bank_name' => request()->input('bank_name') ?? 'null',
                    'receipt' => $receipt
                    
                ]),
                'status' => 'pending',
                'updated' => Carbon::now(),
                'date' => Carbon::now()
            ]);
              DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just submitted a deposit request',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just submitted a deposit request'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
            return response()->json([
                'message' => 'Deposit submitted successfully',
                'status' => 'success',
                'url' => url('users/transactions')
            ]);
    }
   
}

// withdraw
    public function Withdraw(){
     
        $settings=DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}';
        $settings=json_decode($settings);
          if((float) request()->input('amount') == 0){
         return response()->json([
                'message' => 'Minimum Withdrawal amount is &#8358;'.$settings->min_withdrawal.'',
                'status' => 'error'
            ]);
       }
        if(Auth::guard('users')->user()->withdrawal < (float) request()->input('amount')){
            return response()->json([
                'message' => 'Insufficient balance',
                'status' => 'error'
            ]);
        }
         if((float) request()->input('amount') < $settings->min_withdrawal){
            return response()->json([
                'message' => 'Minimum Withdrawal amount is &#8358;'.$settings->min_withdrawal.'',
                'status' => 'error'
            ]);
         }
        if($settings->withdrawal_status !== 'active'){
            return response()->json([
                'message' => 'Withdrawal is currently closed,please check back later',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'withdrawal' => DB::raw('withdrawal - '.(float) request()->input('amount').''),
            'updated' => Carbon::now()
        ]);
        $amount=request()->input('amount') - (($settings->withdrawal_fee*request()->input('amount'))/100);
            //  $balance=Http::withToken(env('FLWV_SECRET_KEY'))->get(env('FLWV_BASE_URL').'/balances/NGN');
            DB::table('transactions')->insert([
            'uniqid' => strtoupper(uniqid('TRX')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'withdrawal',
            'class' => 'debit',
            'amount' => $amount,
            'json' => Auth::guard('users')->user()->bank,
            'status' => 'pending',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]); 
       
       
         DB::table('notifications')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'message' => json_encode([
                'user' => 'You just submitted a withdrawal request',
                'admin' => '<a class="c-primary b" href="'.url('admins/user?user_id='.Auth::guard('users')->user()->id.'').'">@'.Auth::guard('users')->user()->username.'</a> Just submitted a withdrawal request'
            ]),
            'status' => json_encode([
                'user' => 'unread',
                'admin' => 'unread'
            ]),
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Withdrawal placed successfully',
            'status' => 'success',
            'url' => url('users/transactions')
        ]);
    }
    // redeem gift code
    public function RedeemGiftCode(){
        if(!DB::table('gift_code')->where('code',request('code'))->exists()){
            return response()->json([
                'message' => 'Gift code does not exist or have been deleted',
                'status' => 'error'
            ]);

        }
        if(DB::table('transactions')->where('json->code',request('code'))->where('type','Gift Code')->where('user_id',Auth::guard('users')->user()->id)->exists()){
            return response()->json([
                'message' => 'You have already used this gift code, kindly wait for another',
                'status' => 'error'
            ]);
        }
        $code=DB::table('gift_code')->where('code',request('code'))->first();
        if($code->redeemed >= $code->limit){
            return response()->json([
                'message' => 'Gift code has reached its limit',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'withdrawal' => DB::raw('withdrawal + '.$code->value.'')
        ]);
           DB::table('transactions')->insert([
            'uniqid' => strtoupper(uniqid('TRX')),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'gift Code',
            'class' => 'credit',
            'amount' => $code->value,
            'json' => json_encode($code),
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]); 
        DB::table('gift_code')->where('code',request('code'))->update([
            'redeemed' => DB::raw('redeemed + 1')
        ]);
        return response()->json([
            'message' => 'Gift code redeemed successfully',
            'status' => 'success'
        ]);

    
    }
 
}


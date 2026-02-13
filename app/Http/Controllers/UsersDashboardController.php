<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UsersDashboardController extends Controller
{
    // dashboard
    public function Dashboard(){
      $products=DB::table('products')->orderBy('price','asc')->get();
        return view('users.dashboard',[
            'products' => $products,
           'banner_settings' => json_decode(DB::table('settings')->where('key','banner_settings')->first()->json ?? '{}')
      
        ]);
    } 
    // deposit
    public function Deposit(){
        return view('users.deposit.index',[
            'auto' => DB::table('products')->orderBy('price','asc')->get()
        ]);
    }
       // withdraw
    public function Withdraw(){
       
        if(!isset(Auth::guard('users')->user()->bank)){
         
            return redirect()->to('users/bank');
        }
         $settings=DB::table('settings')->where('key','finance_settings')->first()->json ?? '{}';
        return view('users.withdraw',[
            'bank' => json_decode(Auth::guard('users')->user()->bank),
            'portal' => json_decode($settings)->withdrawal_status,
            'settings' => json_decode($settings)
        ]);
    }
//    bank
    public function Bank(){
       
       // $json=Auth::guard('users')->user()->json ?? '{}';
        return view('users.bank',[
            'bank' => json_decode(Auth::guard('users')->user()->bank)
        ]);
    }
    // transactions
    public function Transactions(){
        $total=DB::table('transactions')->whereNot('status','initiated')->where('user_id',Auth::guard('users')->user()->id)->count();
        $trx=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id);
      if(request()->has('type')){
        $trx=$trx->where('type',request('type'));
      }
      if(request()->has('status')){
        $trx=$trx->where('status',request('status'));
      }

        $trx=$trx->orderBy('date','desc')->paginate(100);
        $trx->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
      });
        return view('users.transactions',[
            'trx' => $trx,
            'total' => $total,
            'type' => request('type') ?? null,
            'status' => request('status') ?? null
        ]);
    }

    // profile
    public function Profile(){
        return view('users.profile',[
            'reg_date' => Carbon::parse(Auth::guard('users')->user()->date)->format('d M Y, H:i:s')
        ]);
    }
    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect()->to('login');
    }
    // invite
    public function Invite(){
        return view('users.invite',[
            'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->json)
        ]);
    }
    // products
    public function Products(){
       $purchased=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->paginate(100);
        $purchased->getCollection()->transform(function($each){
            $each->json=json_decode($each->json);
            $each->expires=Carbon::parse($each->date)->addDays($each->json->validity)->format('D M d,Y H:i:s');
            $each->income_time=Carbon::parse($each->updated)->format('H:i');
            return $each;
        });
        return view('users.products',[
            'products' => $purchased
        ]);

    }
   
   
    // referrals
    public function Referrals(){
        $username=Auth::guard('users')->user()->username;
       $referrals=DB::table('users')->where('ref',Auth::guard('users')->user()->username)->orWhereIn('ref',function($q) use($username){
        $q->select('username')->from('users')->where('ref',$username);
       })->orderBy('date','desc')->paginate(100);
       $referrals->getCollection()->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        $each->invested=DB::table('transactions')->where('type','purchase')->where('user_id',$each->id)->sum('amount');
        $each->total_commission=DB::table('transactions')->where('type','commission')->where('json->user_id',$each->id)->sum('amount');
        return $each;
       });
        return view('users.referrals',[
           'referrals' => $referrals
        ]);
    }
    // flutterwave debug
    public function Flutterwave(){
     
        $bank=json_decode(Auth::guard('users')->user()->json);
       $account_number=$bank->account_number;
       $account_bank=Banks()->{$bank->bank_key}->code;
      // $balance=Http::withToken(env('FLWV_SECRET_KEY'))->get(env('FLWV_BASE_URL').'/balances/NGN');
        // return json_decode(json_encode($balance->json()))->data->available_balance;
      $withdraw=Http::withToken(env('FLWV_SECRET_KEY'))->post(env('FLWV_BASE_URL').'/transfers',[
        'account_bank' => $account_bank,
        'account_number' => $account_number,
        'amount' => '100',
        'narration' => ''.config('app.name').' Payout',
        'currency' => 'NGN',
        'reference' => uniqid('TRX'),
        'callback_url' => url('/'),
        'debit_currency' => 'NGN'
      ]);
      if($withdraw->successful()){
       
        return json_encode($withdraw->json());
      }else{
        return $withdraw->body();
      }
    }
    // ip
    public function Ip(){
    $ip=Http::get('https://api.ipify.org');
    return $ip->body();
}
    // deposit pay
    public function DepositPay(){
        $bank=json_decode(DB::table('settings')->where('key','bank_details')->first()->json ?? '{}');
        foreach(AllBanks() as $data){
            if($data->code == $bank->bank_code){
                $bank_name=$data->name;
            }
        }
        $bank->bank=$bank_name;
        return view('users.pay',[
            'bank' => $bank,
            'amount' => request()->input('amount')
        ]);
    }
    // deposit complete
    public function DepositComplete(){
        if(config('settings.deposit') == 'manual'){
  return view('users.deposit.manual',[
    'amount' => request('amount'),
    'bank_details' => json_decode(DB::table('settings')->where('key','bank_details')->first()->json ?? '{}'),
    'session_id' => strtoupper(Str::random(12))
  ]);
        }
      
    }
    // password update

    public function PasswordUpdate(){
        return view('users.password');
    }
    // gift code
    public function GiftCode(){
        return view('users.gift_code');
    }
}

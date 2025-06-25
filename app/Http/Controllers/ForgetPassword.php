<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Traits\GeneralTrait;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class ForgetPassword extends Controller
{
    use GeneralTrait;
    public function forgetPassword(Request $request)
    {
         $valid=$request->validate([
            'email'=>'required|email'
        ] , [
            'email.required'=>'يجب إدخال بريد إالكتروني ',
            'email.email'=>'يجب إدخال بريد إلكتروني صالح '
        ]);
        $user =User::where('email',$request->email)->first();
        $otp = (string) random_int(100000, 999999);
        $user->otp = $otp;
        $user->otp_created_at=Carbon::now();
        $user->save();
         Mail::to($request->email)->send(new OtpMail($otp,$user->name));
        return $this->apiResponse('تم إرسال تفاصيل إستعادة كلمة المرور الخاصة بك إلى بريدك الإلكتروني ');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['otp'=>'numeric'] , ['otp.numeric'=>'يجب إدخال الرمز الذي تم ']);

        $user=User::where('email',$request->email)->first();
        $otpCreatedAt = $user->otp_created_at instanceof Carbon
    ? $user->otp_created_at
    : Carbon::parse($user->otp_created_at);

// أضف 5 دقائق للكائن:
$otpExpiry = $otpCreatedAt->copy()->addMinutes(5);
        if($user->otp==$request->otp && Carbon::now()->lessThanOrEqualTo($otpExpiry))
        return $this->apiResponse('تم التحقق بنجاح ');
    elseif($user->otp!=$request->otp)
    return $this->apiResponse('يجب إدخال الرمز الذي تم إرساله ');

      elseif(Carbon::now()->greaterThanOrEqualTo($otpCreatedAt->copy()->addMinutes(5)))
    return $this->apiResponse('لقد تأخرت بإرسال البريد الإالكتروني ');
    }

public function updatedPassword(Request $request)
{
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6',
        'confirm_password'=>'required|same:password'
    ],[
        'email.required'=>'يجب إدخال بريد إالكتروني ',
        'email.email'=>'يجب إدخال بريد إالكتروني صالح ',
        'password.required'=>'يجب إدخال كلمة المرور ',
        'password.min'=>'يجب إدخال كلمة المرور ما بين 6 أحرف ',
        'confirm_password.required'=>'يجب إدخال تأكيد كلمة المرور ',
        'confirm_password.same'=>'يجب إدخال تأكيد كلمة المرور متطابقة '
    ]);
  $user=User::where('email', $request->email)->first();
  $user->password=Hash::make($request->password);
  $user->save();
  return $this->apiResponse('تم تحديث كلمة المرور بنجاح ');
}

}



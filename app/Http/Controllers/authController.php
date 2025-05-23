<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'البريد الإلكتروني مطلوب.',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',

                'password.required' => 'كلمة المرور مطلوبة.',
            ]
        );

        $user = User::where('email', $request->email)->first();
        if ($user == null || !Hash::check($request->password, $user->password)) {
            return $this->apiResponse(null, false, 'كلمة المرور أو الإيميل غير صحيح', 401);
        } else {
            $token = $user->createToken('token')->plainTextToken;
            $data = ['token' =>  $token, 'user' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]];
            return $this->apiResponse($data, true, 'تم تسجيل الدخول بنجاح');
        }
    }






    public function register(Request $request)
    {
        $credentials = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', 'min:6']
            ],
            [
                // name
                'name.required' => 'الاسم مطلوب.',
                'name.string' => 'الاسم يجب أن يكون نصاً.',
                'name.max' => 'الاسم لا يجب أن يتجاوز 255 حرفاً.',

                // email
                'email.required' => 'البريد الإلكتروني مطلوب.',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',

                // password
                'password.required' => 'كلمة المرور مطلوبة.',
                'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',
                'password.min' => 'كلمة المرور يجب أن تكون على الأقل 6 أحرف.',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->apiResponse('تم الاشتراك بنجاح ');
    }


    public function logout()
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            return $this->apiResponse(null, false, 'المستخدم غير موجود', 404);
        }
        $user->tokens()->delete();
        return $this->apiResponse('تم تسجيل الخروج بنجاح ');
    }


    public function edit()
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            return $this->apiResponse(null, false, 'المستخدم غير موجود', 404);
        }
        return $this->apiResponse([
            'name' => $user->name,
            'email' => $user->email,
            'country' => $user->country,
            'gender' => $user->gender,
            'phone' => $user->phone,
            'photo' => $user->photo,
        ]);
    }

    public function update()
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        if (!$user) {
            return $this->apiResponse(null, false, 'المستخدم غير موجود', 404);
        }
        $credentials = request()->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'country' => ['string'],
                'gender' => ['string'],
                'phone' => ['string'],
                'photo' => ['mimes:png'],

            ],
            [
                'name.required' => 'الاسم مطلوب.',
                'name.string' => 'الاسم يجب أن يكون نصاً.',
                'name.max' => 'الاسم لا يجب أن يزيد عن 50 حرفاً.',

                'email.required' => 'البريد الإلكتروني مطلوب.',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة.',

                'country.string' => 'الدولة يجب أن تكون نصاً.',
                'gender.string' => 'الجنس يجب أن يكون نصاً.',
                'phone.string' => 'رقم الهاتف يجب أن يكون نصاً.',

                'photo.mimes' => 'يجب أن تكون الصورة بصيغة PNG فقط.',
            ]
        );
        $user->name = request('name');
        $user->email = request('email');
        $user->country = request('country');
        $user->gender = request('gender');
        $user->phone = request('phone');
        if (request()->hasFile('photo')) {
            $photo = request()->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->store('user', 'public');
            $user->photo = 'storage/' . $path;  // حفظ مسار الصورة داخل قاعدة البيانات
        }
        $user->save();
        return $this->apiResponse('تم التحديث بنجاح ');
    }

    public function updatePassword( Request $request)
    {
        $id=Auth::user()->id;
        $user = User::find($id);
        if (!Hash::check($request->old, $user->password)) {
            return $this->apiResponse(null, false, "كلمة المرور القديمة غير صحيحة ", 401);
        }
        $credentials = $request->validate([
            'password' => ['required', 'min:6', 'confirmed']
        ], [
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.min' => 'يجب أن تتكون كلمة المرور من 6 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
        ]);
        $user->password = (Hash::make($request->password));
        $user->save();
        $data = ['token' =>  $user->createToken('token')->plainTextToken, 'user' => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]];
        return $this->apiResponse($id, true, 'تم تحديث كلمة المرور بنجاح ', 200);
    }
}

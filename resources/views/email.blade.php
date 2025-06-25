<div style="max-width: 600px; margin: auto; direction: rtl; font-family: 'Tahoma', 'Arial', sans-serif; background-color: #f9f9f9; padding: 25px; border-radius: 10px; border: 1px solid #ddd; color: #333;">
    <p style="text-align: right; font-size: 16px; line-height: 1.7;">
        السلام عليكم <br>
        <strong>{{ $userName }}</strong> <br><br>

        لقد طلبت <strong>استعادة كلمة المرور</strong> الخاصة بك على منصة <strong>كورسات</strong>. <br>
        يرجى نسخ الرمز التالي:
    </p>

    <div style="background-color: #fff; border: 2px dashed #4CAF50; padding: 12px; font-size: 20px; text-align: center; font-weight: bold; color: #4CAF50; margin: 20px 0;">
        {{ $otp }}
    </div>

    <p style="text-align: right; font-size: 14px; line-height: 1.6;">
        ثم وضعه على الموقع لإكمال التحقق. <br>
        إذا لم تطلب استعادة كلمة المرور، يمكنك تجاهل هذه الرسالة، ولن يحدث شيء. <br><br>

        أطيب التحيات،<br>
        <strong>فريق منصة كورسات</strong>
    </p>
</div>

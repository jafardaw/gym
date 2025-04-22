// ResetPasswordController.php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

public function showResetForm()
{
    return view('auth.sms-reset');
}

public function handleReset(Request $request)
{
    $request->validate([
        'phone' => 'required|exists:users,phone',
    ]);

    $user = User::where('phone', $request->phone)->first();
    $newPassword = Str::random(6);

    $user->password = Hash::make($newPassword);
    $user->must_change_password = true; // نضيفها لاحقاً للجدول
    $user->save();

    // إرسال SMS
    // ممكن تستخدم أي خدمة (Twilio, Vonage, etc.)
    $this->sendSMS($user->phone, "كلمة السر الجديدة: $newPassword");

    return redirect()->route('login')->with('success', 'تم إرسال كلمة السر الجديدة عبر SMS.');
}

private function sendSMS($phone, $message)
{
    // مكان إرسال SMS وهمي كمثال
    logger("SMS to $phone: $message");
}

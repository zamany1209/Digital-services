<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// require '/vendor/autoload.php';
// $sender = "1000596446";
// $receptor = "09399293248";
// $message = ".وب سرویس پیام کوتاه کاوه نگار";
// $api = new \Kavenegar\KavenegarApi("36614F394D594F57704E3056345450534170315676745A5A375543707965755352356E454E6135754F366B3D");
// $api -> Send ( $sender,$receptor,$message);
class LoginController extends Controller
{
    //
    public function init()
    {
        $user = Auth::user();
        return response()->json(['user' => $user],200);
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            return response()->json(Auth::user(),200);
        }
        else
        {
            return response()->json(['error' => 'اطلاعات وارد شده صحیح نمی باشد'],401);
        }

    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(isset($user->id))
        {
            return response()->json(['error' => 'این ایمیل قبلا ثبت شده است'],401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return response()->json($user , 200);

    }
    public function logout()
    {
        Auth::logout();
    }
}

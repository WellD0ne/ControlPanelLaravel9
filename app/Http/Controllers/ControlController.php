<?php

namespace App\Http\Controllers;

use App\Models\PasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControlController extends Controller
{
    public function index()
    {
        return view('control');
    }

//    Запрос на смену пароля
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'currentPassword' => ['required', 'current_password:web'],
            'newPassword' => 'required|min:6|max:255|alpha_num|bail|regex:/^[a-z\d]+$/i',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);

        $changePassword = new PasswordChange;
        $changePassword->login = auth()->user()->login;
        $changePassword->uid = auth()->user()->uid;
        $changePassword->new_plain = $request->newPassword;
        $changePassword->new_password = Hash::make($request->newPassword);
        $changePassword->is_held = 0;
        $changePassword->save();

        return back()->with('message', 'Заявка на смену пароля успешно принята.<br/>Пароль начнет действовать в течение 15 минут!');
    }
}

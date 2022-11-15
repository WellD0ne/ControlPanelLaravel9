<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\PasswordChange;
use Illuminate\Support\Facades\Hash;

class ControlController extends Controller
{
    public function index()
    {
        return view('control');
    }

//    Запрос на смену пароля
    public function changePassword(ChangePasswordRequest $request)
    {
        $validated = $request->validated();

        $changePassword = new PasswordChange;
        $changePassword->login = auth()->user()->login;
        $changePassword->uid = auth()->user()->uid;
        $changePassword->new_plain = $validated['newPassword'];
        $changePassword->new_password = Hash::make($validated['newPassword']);
        $changePassword->is_held = 0;
        $changePassword->save();

        return back()->with('message', 'Заявка на смену пароля успешно принята.<br/>Пароль начнет действовать в течение 15 минут!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UserGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Отображает страницу авторизации.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Попытка авторизации.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($validated, true)) {
            return redirect('/');
        } else{
            return redirect()->back()->withErrors(['login' => 'Неверный логин или пароль!']);
        }
    }

    /**
     * Выход из аккаунта
     */
    public function logout(Request $request){
        Auth::logout();
        return redirect(route('auth.index'));
    }

    /**
     * Повторная отправка заявки в группу
     */
    public function regroup(Request $request){
        $validated = $request->validate([
            'group_id' => 'required|integer|exists:user_groups,id'
        ]);
        
        UserGroupRequest::create([
            'user_id' => Auth::user()->id,
            'group_id' => $validated['group_id']
        ]);
        return redirect('/');
    }
}

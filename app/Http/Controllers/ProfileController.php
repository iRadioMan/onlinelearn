<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Отображает страницу профиля.
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Обновляет данные профиля.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'confirmed', 'min:6', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/u'],
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::find(Auth::user()->id)->update($validated);

        return redirect('/profile')->with('success', 'Вы успешно изменили пароль!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Отображает страницу регистрации.
     */
    public function index()
    {
        $userGroups = UserGroup::all();
        return view('register', ['groups' => $userGroups]);
    }

    /**
     * Регистрация пользователя.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:50',
            'login' => 'required|string|unique:users|max:50',
            'password' => ['required', 'string', 'confirmed', 'min:6', 'max:50', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/u'],
            'group_id' => 'required|integer|exists:user_groups,id'
        ]);

        $groupId = $validated['group_id']; //Передаём id группы во временную переменную, чтобы затем создалась заявка
        unset($validated['group_id']); //Теперь пользователь создастся без выбранной группы, нужно ожидать принятия заявки
        $validated['password'] = Hash::make($validated['password']);

        $validated['code'] = substr(md5(time()), 0, 6); //генерируем код восстановления
        
        $user = User::create($validated);
        UserGroupRequest::create([
            'user_id' => $user->id,
            'group_id' => $groupId
        ]);
        return redirect(route('auth.index'))->with('success', 'Вы успешно зарегистрировались! Пожалуйста, запишите ваш код восстановления: ' . $validated['code']);
    }
}

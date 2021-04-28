<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestorePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restore');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|string',
            'password' => ['required', 'string', 'confirmed', 'min:6', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/u'],
            'code' => 'required|string|min:6|max:6'
        ]);

        $user = User::where('login', '=', $validated['login'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['login' => 'Пользователь с таким логином не найден!']);
        }

        if ($user->code != $validated['code']) {
            return redirect()->back()->withErrors(['code' => 'Неверный код восстановления!']);
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['code'] = substr(md5(time()), 0, 6); //генерируем новый код восстановления

        User::where('login', '=', $validated['login'])->update($validated);

        return redirect('/')->with('success', 'Вы успешно изменили пароль! Ваш новый код восстановления: ' . $validated['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

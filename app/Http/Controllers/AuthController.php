<?php

namespace App\Http\Controllers;

use App\Models\UserGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
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
     * Попытка авторизации.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
    public function update(Request $request, $id)
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

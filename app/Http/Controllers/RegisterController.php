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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userGroups = UserGroup::all();
        return view('register', ['groups' => $userGroups]);
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
            'fullname' => 'required|string|max:50',
            'login' => 'required|string|unique:users|max:50',
            'password' => ['required', 'string', 'confirmed', 'min:6', 'max:50', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/u'],
            'group_id' => 'required|integer|exists:user_groups,id'
        ]);

        $groupId = $validated['group_id']; //Передаём id группы во временную переменную, чтобы затем создалась заявка
        unset($validated['group_id']); //Теперь пользователь создастся без выбранной группы, нужно ожидать принятия заявки
        $validated['password'] = Hash::make($validated['password']);
        
        $user = User::create($validated);
        UserGroupRequest::create([
            'user_id' => $user->id,
            'group_id' => $groupId
        ]);
        return redirect(route('auth.index'))->with('success', 'Вы успешно зарегистрировались!');
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
}

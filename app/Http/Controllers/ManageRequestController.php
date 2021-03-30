<?php

namespace App\Http\Controllers;

use App\Models\UserGroupRequest;
use Illuminate\Http\Request;

class ManageRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupRequests = UserGroupRequest::orderBy('created_at', 'desc')->get();
        return view('grouprequests.index', ['groupRequests' => $groupRequests]);
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
        //
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
        $request->validate([
            'status_id' => 'required|integer|exists:group_request_statuses,id',
        ]);
        $groupRequest = UserGroupRequest::find($id);
        if(!$groupRequest)
            abort(404);

        if($request->status_id == 2){
            $groupRequest->user->update(['group_id' => $groupRequest->group_id]);
        }
        $groupRequest->update(['status_id' => $request->status_id]);
        return redirect()->back()->with('success', 'Заявка успешно обновлена.');
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

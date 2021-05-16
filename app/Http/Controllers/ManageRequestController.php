<?php

namespace App\Http\Controllers;

use App\Models\UserGroupRequest;
use Illuminate\Http\Request;

class ManageRequestController extends Controller
{
    /**
     * Отображает список заявок в группы.
     */
    public function index()
    {
        $groupRequests = UserGroupRequest::whereIn('status_id', [1])->orderBy('created_at', 'desc')->get();
        return view('grouprequests.index', ['groupRequests' => $groupRequests]);
    }

    /**
     * Обновляет данные заявки в группу.
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
}

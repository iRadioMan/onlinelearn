<?php

namespace App\Http\Controllers;

use App\Exports\ResultsExport;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ViewResultsController extends Controller
{
    /**
     * Отображает страницу с результатами пользователей.
     */
    public function index()
    {
        return view("view/results/index", [
            'users' => User::all()->sortBy('fullname'),
            'lessons' => Lesson::all()
        ]);
    }

    /**
     * Создает экспорт результатов в таблицу Excel.
     */
    public function create()
    {
        return Excel::download(new ResultsExport, 'student_results.xlsx');
    }
}

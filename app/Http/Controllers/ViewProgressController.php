<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\AppSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewProgressController extends Controller
{
    /**
     * Отображает страницу с прогрессом пользователя.
     */
    public function index()
    {
        $lessonsCount = Lesson::all()->count();

        $availableLessonsCount = Lesson::all()->filter(function($item){
            return $item->accessible;
        })->count();

        if (Lesson::all()->last()->quizResult) {
            $lastLessonCompleted = Lesson::all()->last()->quizResult->correct_percentage >= (int)AppSettings::where('name', 'acceptable_percentage')->first()->value;
        }
        else {
            $lastLessonCompleted = false;
        }

        if (($availableLessonsCount == $lessonsCount) && $lastLessonCompleted)
        {
            $completedLessonsCount = $availableLessonsCount;
        }
        else {
            $completedLessonsCount = $availableLessonsCount - 1;
        }

        return view("view/progress/index", [
            'user' => Auth::User(),
            'lessonsCount' => $lessonsCount,
            'completedLessonsCount' => $completedLessonsCount
        ]);
    }
}

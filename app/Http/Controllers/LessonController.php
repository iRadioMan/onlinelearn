<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\AppSettings;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Отображает список уроков.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLessonsCount = Lesson::all()->count();

        $availableLessons = Lesson::all()->filter(function($item){
            return $item->accessible;
        });        

        $allLessonsCompleted = ($allLessonsCount == $availableLessons->count()) ? true : false;
        
        return view('lessons.index', [
            'lessons' => $availableLessons,
            'acceptable_percentage' => AppSettings::where('name', 'acceptable_percentage')->first()->value,
            'allLessonsCompleted' => $allLessonsCompleted            
        ]);
    }

    /**
     * Отображает урок (тему).
     */
    public function show(Lesson $lesson)
    {
        $nextLesson = Lesson::where('id', '>', $lesson->id)->first();
        
        if($nextLesson != null) {
            $nextLessonIsAccesible = Lesson::where('id', '>', $lesson->id)->first()->accessible;
        }
        else {
            $nextLessonIsAccesible = $lesson->quiz_result->correct_percentage >= (int)AppSettings::where('name', 'acceptable_percentage')->first()->value;
        }

        return view('lessons.show', [
            'lesson' => $lesson,
            'nextLessonIsAccessible' => $nextLessonIsAccesible
        ]);
    }
}

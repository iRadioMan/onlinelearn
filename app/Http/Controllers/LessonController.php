<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\AppSettings;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
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
    public function show(Lesson $lesson)
    {
        $nextLesson = Lesson::where('id', '>', $lesson->id)->first();
        
        if($nextLesson) {
            $nextLessonIsAccesible = Lesson::where('id', '>', $lesson->id)->first()->accessible;
            $allLessonsCompleted = false;
        }
        else {
            $nextLessonIsAccesible = true;
            $allLessonsCompleted = true;
        }

        return view('lessons.show', [
            'lesson' => $lesson,
            'nextLessonIsAccessible' => $nextLessonIsAccesible,
            'allLessonsCompleted' => $allLessonsCompleted
        ]);
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

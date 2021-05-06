<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class ManageQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $lesson = Lesson::find($id);
        if(!$lesson)
            abort(403);
        return view('manage/quiz/edit', ['lesson' => $lesson]);
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
        $lesson  = Lesson::find($id);
        if(!$lesson)
            abort(404);

        $validated = $request->validate([
            'questions' => 'required|array',
            'questions.*.id' => 'required|integer',
            'questions.*.description' => 'required|string',
            'questions.*.question_options' => 'required|array|min:2',
            'questions.*.question_options.*.id' => 'required|integer',
            'questions.*.question_options.*.correct' => 'string',
            'questions.*.question_options.*.description' => 'required|string',
        ]);

        $questions = $validated['questions'];
        Question::where('lesson_id', $id)->delete();

        foreach($questions as $question){
            $question['lesson_id'] = $id;
            $createdQuestion = Question::create($question);
            foreach($question['question_options'] as $questionOption){
                if(isset($questionOption['correct']))
                    $questionOption['correct'] = true;
                
                $questionOption['question_id'] = $createdQuestion->id;
                QuestionOption::create($questionOption);
            }
        }
        return redirect()->back()->with('success', 'Тест успешно обновлён!');
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

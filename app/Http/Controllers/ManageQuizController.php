<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class ManageQuizController extends Controller
{
    /**
     * Отображает форму редактирования теста.
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson)
            abort(403);
        return view('manage/quiz/edit', ['lesson' => $lesson]);
    }

    /**
     * Обновляет данные теста в БД.
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
}

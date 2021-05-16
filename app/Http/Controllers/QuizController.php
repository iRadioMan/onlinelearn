<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\QuestionOption;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Сохраняет данные прохождения теста.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesson_id' => 'required|integer|exists:lessons,id',
            'question_option' => 'required|array',
            'question_option.*' => 'required|integer|exists:question_options,id',
        ]);

        $lesson = Lesson::find($request->lesson_id);
    
        $correctQuestionCount = 0;
        foreach($lesson->questions as $question){
            $currentQuestionSubmittedIds = [];
            foreach($validated['question_option'] as $questionOptionId){
                if($question->id == QuestionOption::find($questionOptionId)->question_id){
                    $currentQuestionSubmittedIds []= $questionOptionId;
                }
            }
            $questionCorrectIds = $question->correctQuestionOptions->pluck('id')->toArray();
            
            asort($currentQuestionSubmittedIds);
            asort($questionCorrectIds);
            
            if ($currentQuestionSubmittedIds == $questionCorrectIds) {
                $correctQuestionCount++;
            }
        }


        $quizResult = QuizResult::create([
            'user_id' => Auth::user()->id,
            'lesson_id' => $lesson->id,
            'correct_percentage' => (int)($correctQuestionCount / count($lesson->questions) * 100)
        ]);

        return redirect(route('lessons.index'));
    }

    /**
     * Отображает тест для прохождения.
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson)
            abort(404);
   
        return view('quiz.show', ['lesson' => $lesson]);
    }
}

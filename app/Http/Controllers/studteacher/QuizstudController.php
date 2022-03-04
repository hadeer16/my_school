<?php

namespace App\Http\Controllers\studteacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Subject;
use App\model\Quizz;
use App\model\Question;
class QuizstudController extends Controller
{
    public function show($id)
    {
        $data = Subject::find($id);
        $quiz = Quizz::find($data);
        //dd($dd);
        return view('pages.student.quizstud.show',compact('quiz'));
    }
}

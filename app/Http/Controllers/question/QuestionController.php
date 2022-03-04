<?php

namespace App\Http\Controllers\question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Question;
use App\model\Teacher;
use App\model\Quizz;
class QuestionController extends Controller
{
    public function show($id){
        $user = Teacher::find($id);
        $quizz = Quizz::whereIn('teacher_id',$user)->get();
        $test = Question::all();
        //dd($quizz);
        return view('pages.question.index',compact('quizz','test'));
    }
    public function store(Request $request){
        $user = auth()->user()->teachers->id;
        $data = $request->all();
        $test = Question::create($data);
        return redirect()->route('question.show',$user);
    }
    public function destroy($id)
    {
        $user = auth()->user()->teachers->id;
        $data = Question::find($id);
        $data->delete();
        return redirect()->route('question.show',$user);
    }
}

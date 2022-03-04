<?php

namespace App\Http\Controllers\studteacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Quizz;
use App\model\Question;
use App\model\Quiz_Student;
use App\model\Student;
class QuiztionController extends Controller
{
    public function show($id){
        $data = Quizz::find($id);
        $quizz = Question::whereIn('quizz_id',$data)->get();
        return view('pages.student.quizstud.quiztionstud.index',compact('data','quizz'));
    }
    public function store(Request $request){
        $data = $request->all();
        $data['student_id'] = auth()->user()->students->id;
        $quizz = $request->question_id;
        $ss =  Question::find($quizz)->correct;
        $mark =  Question::find($quizz)->mark;
        //dd($mark);
        //dd($request->answer,$ss);
        if($request->answer == $ss){
            $data['mark'] = $mark;
        }
        else{
            $data['mark'] = 0;
        }
        //dd($data);
        $quiz = Quiz_Student::create($data);
        // return view('qiztion.show');

    }
}

<?php

namespace App\Http\Controllers\quizz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Subject;
use App\model\Teacher;
use App\model\Quizz;

class QuizController extends Controller
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
        
        $data = $request->all();
        $data['teacher_id'] = auth()->user()->teachers->id;
        $quiz = Quizz::create($data);
        return redirect()->route('quizz.show',$data['teacher_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        $classes = $teacher->classrooms()->get();
        //dd($classes);
        $subject = $teacher->subjects()->get();
        //dd($data);
        $quizz = Quizz::all();
        return view('pages.quizz.index',compact('quizz','subject','classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $user = auth()->user()->teachers->id;
        $data = $request->all();
        $quizz = Quizz::find($id);
        $quizz->update($data);
        return redirect()->route('quizz.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user()->teachers->id;
        $data = Quizz::find($id);
        $data->delete();
        return redirect()->route('quizz.show',$user);
    }
}

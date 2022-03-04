<?php

namespace App\Http\Controllers\subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Level;
use App\model\Classroom;
use App\model\Teacher;
use App\model\Subject;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::all();
        $data_classes = Classroom::all();
        $data_teach = Teacher::all();
        $data = Level::with(['subjects'])->get();
        foreach($data as $levels)
        {
            // echo $levels->subject;
        }
        return view('pages.subject.index',compact('level','data_teach','data_classes'));
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
        $data_sub = Subject::create($data);
        $data_sub->teachers()->sync($request->teacher_id);
        return redirect()->route('subject.index');
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
        $data = Subject::find($id);
        $subject = $request->all();
        $data->update($subject);
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subject::find($id);
        $data->delete();
        return redirect()->route('subject.index');
    }
    public function getclasses($id)
    {
        $classes = Classroom::where('level_id',$id)->pluck('name','id');
        return $classes;
    }
    public function getteachers($id)
    {
        $classroom = Classroom::find($id);
        $teachers = $classroom->teachers()->pluck('name','teachers.id');
    //$teachers = Teacher::where('classroom_id',$id)->pluck('name','id');
    return $teachers;
    }
}

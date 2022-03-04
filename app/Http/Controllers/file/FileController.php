<?php

namespace App\Http\Controllers\file;

use App\Http\Controllers\Controller;
use App\model\Classroom;
use App\model\File;
use App\model\Teacher;
use App\model\Subject;
use Illuminate\Http\Request;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.show');
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
        $data['teacher_id']= auth()->user()->teachers->id;
        $imagename = $request->file('files')->getClientOriginalName();
        $data['files'] = $imagename;
        $request->file('files')->move(public_path('file'), $imagename);
        $data_level= File::create($data);
        return redirect()->route('file.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Teacher::find($id);
        $classes = $data->classrooms()->get();
        //dd($classes);
       return view('pages.teacher.file.index',compact('classes'));
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
    public function getsubject($id)
    {
        $classes = Subject::where('classroom_id',$id)->pluck('name','id');
        //dd($classes);
        return $classes;
    }
}

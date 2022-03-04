<?php

namespace App\Http\Controllers\attendance;

use App\Http\Controllers\Controller;
use App\model\Attendance;
use Illuminate\Http\Request;
use App\model\Teacher;
use App\model\Classroom;
use App\model\Level;
use App\model\Student;
class AttendanceController extends Controller
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
        foreach ($request->attendances as $ids => $attend)
        {
            if ($attend == 'presence') {
                $stutas = true;
            }else if($attend == 'absent')
            {
                $stutas = false;
            }
        }
        Attendance::create([
            'student_id' => $ids,
            'level_id'=>$request->level_id,
            'classroom_id'=>$request->classroom_id,
            'teacher_id' => auth()->user()->teachers->id,
            'date' => date('y-m-d'),
            'status' => $stutas
        ]);
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
        $dd = $data->classrooms()->get();
        //dd($dd);
        return view('pages.teacher.attendance.index',compact('dd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Classroom::find($id);
        $student = Student::with('attend')->whereIn('classroom_id',$data)->get();
        //dd($student);
        return view('pages.teacher.attendance.show',compact('student','data'));
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

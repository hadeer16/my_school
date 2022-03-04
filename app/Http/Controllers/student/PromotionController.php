<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Level;
use App\model\Classroom;
use App\model\Student;
use App\model\promotion;
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::all();
        $classes = Classroom::all();
        return view('pages.student.promotion.index',compact('level','classes'));
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
        $students = Student::where('level_id',$request->level_id)->where('classroom_id',$request->classroom_id)->get();
        //dd($students);
        foreach($students as $student){
            $ids = explode(',' ,$student->id);
            Student::whereIn('id',$ids)->update([
                'level_id'=>$request->levels_id,
                'classroom_id'=>$request->classrooms_id,
            ]);
            $promotion = new Promotion();
            $promotion->student_id = $student->id;
            $promotion->level_id = $request->level_id;
            $promotion->classroom_id = $request->classroom_id;
            $promotion->levels_id = $request->levels_id;
            $promotion->classrooms_id = $request->classrooms_id;
            $promotion->save();
            return redirect()->route('promotion.index');
        }
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

<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Level;
use App\model\Classroom;
use App\model\Teacher;
use App\model\User;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Level::with(['level_teacher'])->get();
        foreach($data as $levels)
        {
        }
        $level = Level::all();
        return view('pages.teacher.index',compact('level','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Level::all();
        $data_class = Classroom::all();
        return view('pages.teacher.create',compact('data','data_class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $data['catogry'] = 'teacher';
        $data['password'] = bcrypt(request()->password);
        $teach_user = User::create($data);
        $data['user_id'] = $teach_user->id;
        $imagename = time().'.'.request()->image->getClientOriginalExtension();
        $data['image'] = $imagename;
        request()->image->move(public_path('images'), $imagename);
        $data_teach = Teacher::create($data);
        $data_teach->classrooms()->sync($request->classroom_id);
        return redirect()->route('teacher.index');
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
        $data = Teacher::find($id);
        $data_level = Level::all();
        return view('pages.teacher.edit',compact('data','data_level'));
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
        $dataclass= Teacher::find($id);
        $data = $request->all();
        $data['catogry'] = 'teacher';
        $data['password'] = bcrypt(request()->password);
        $dataclass->users->update($data);
        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $data['image'] = $filename;
            $image->move(public_path('images'),$filename);
        }
        $dataclass->update($data);
        $dataclass->classrooms()->sync($request->classroom_id);
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::find($id);
        $data->delete();
        return redirect()->route('teacher.index');
    }
    public function getclasses($id)
    {
        $classes = Classroom::whereIn('level_id',$id)->pluck('name','id');
        return $classes;
    }
}

<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Level;
use App\model\Classroom;
use App\model\Myparent;
use Carbon\Carbon;
use App\model\Student;
use App\model\User;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::with(['students'])->get();
        foreach($level as $data)
        {
        }
        $levels_data = Level::all();
        return view('pages.student.index',compact('levels_data','level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = Level::all();
        $classes = Classroom::all();
        $my_pare = Myparent::all();
        return view('pages.student.create',compact('level','classes','my_pare'));
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
        $imagename = time().'.'.request()->img->getClientOriginalExtension();
        $data['img'] = $imagename;
        request()->img->move(public_path('student_img'), $imagename);
        $data['catogry'] = 'student';
        $data['password'] = bcrypt(request()->password);
        $stud_user = User::create($data);
        $data["user_id"] = $stud_user->id;
        $birth = $request->birth;
        $data['age'] = \Carbon\Carbon::parse($birth)->age;
        $student = Student::create($data);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        $level = Level::all();
        $classes = Classroom::all();
        $pare = Myparent::all();
        return view('pages.student.edit',compact('data','level','classes','pare'));
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
        $dataclass= Student::find($id);
        $data = $request->all();
        $data['catogry'] = 'student';
        $data['password'] = bcrypt(request()->password);
        // إضافة المعلم في قائمة اليوزر
        $dataclass->users->update($data);
        $birth = $request->birth;
        $data['age'] = \Carbon\Carbon::parse($birth)->age;
        if($request->has('img'))
        {
            $image = $request->file('img');
            $filename = $image->getClientOriginalName();
            $data['img'] = $filename;
            $image->move(public_path('student_img'),$filename);
        }
        $dataclass->update($data);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('student.index');
    }
    public function getclasses($id)
    {
        $classes = Classroom::where('level_id',$id)->pluck('name','id');
        return $classes;
    }
}

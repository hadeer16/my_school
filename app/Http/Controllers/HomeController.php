<?php

namespace App\Http\Controllers;

use App\model\Post;
use App\model\Classroom;
use App\model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $data = Post::where('user_id',auth()->user()->id)->get();
        // $stud = Student::find(auth()->user()->id);
        // $classes = $stud->classes()->get();
        // $post = Post::whereIn('classroom_id',$classes)->get();
        //dd($post);
        $dd = DB::table('levels')->count();
        $ss = DB::table('classrooms')->count();
        $tt = DB::table('teachers')->count();
        $st = DB::table('subjects')->count();
        return view('dashboard',compact('data','dd','ss','tt','st'));
    }
}

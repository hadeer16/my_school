<?php

namespace App\Http\Controllers\box;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Box;
class BoxstudController extends Controller
{
    public function index()
    {
        $data = Box::all();
        return view('pages.boxstud.index',compact('data'));
    }
}

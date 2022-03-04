<?php

namespace App\Http\Controllers\level;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Level;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Level::all();
        return view('pages.level.index',compact('data'));
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
        $imagename = time().'.'.request()->img->getClientOriginalExtension();
        $data['img'] = $imagename;
        request()->img->move(public_path('level_images'), $imagename);
        $data_level= Level::create($data);
        return redirect()->route('level.index');
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
        $data = $request->all();
        if($request->has('img'))
        {
            $image = $request->file('img');
            $filename = $image->getClientOriginalName();
            $data['img'] = $filename;
            $image->move(public_path('level_images'),$filename);
    }
        $data_level = Level::find($id);
        $data_level->update($data);
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Level::find($id);
        $data->delete();
        return redirect()->route('level.index');
    }
}

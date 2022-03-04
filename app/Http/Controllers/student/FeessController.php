<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Student;
use App\model\Fees;
use App\model\Invoice;
use App\model\Student_Account;
class FeessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('pages.student.feess.index');
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
        $dd = Invoice::create($data);
        $data['debit']= $request->amount;
        $data['invoice_id']= $dd->id;
        $data['credit']= 0.00;
        $stud_acc = Student_Account::create($data);
        $user = $request->student_id;
        return redirect()->route('feess.show',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::find($id);
        $classes = Fees::where('classroom_id',$data->classroom_id)->get();
        $invo = Invoice::where('student_id',$data->id)->get();
        //dd($invo);
        return view('pages.student.feess.index',compact('data','classes','invo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Invoice::find($id);
        $classes = Fees::where('classroom_id',$data->classroom_id)->get();
        //dd($classes);
        return view('pages.student.feess.edit',compact('data','classes'));
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
        $data = Invoice::find($id);
        $invo = $request->all();
        $data->update($invo);
        $account = Student_Account::where('invoice_id',$data->id)->first();
        //dd($account);
        $account['debit'] = $request->amount;
        $account['credit'] = 0.00;
        $account['text'] = $request->text;
        $account->update($invo);
        $user = $request->student_id;
        return redirect()->route('feess.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Invoice::find($id);
        $data->delete();
        $user = $data->student_id;
        return redirect()->route('feess.show',$user);
    }
    public function getfeess($id)
    {
        $fee = Fees::find($id)->pluck('amount');
        //$data = $fee->amount;
        //$ss = $fee->pluck('amount')::whereIn('id',$fee);
        return $fee;
    }
}

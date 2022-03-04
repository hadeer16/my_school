<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Student;
use App\model\Receipt;
use App\model\Student_Account;
use App\model\BoxStudent;
use App\model\Level;
class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $dd = Receipt::create($data);
        $data['receipt_id'] = $dd->id;
        $data['debit'] = $dd->debit;
        $data['credit'] = 0.00;
        $box = BoxStudent::create($data);
        $data['debit'] = 0.00;
        $data['credit'] = $dd->debit;
        $account = Student_Account::create($data);
        $user = $account->student_id;
        return redirect()->route('receipt.show',$user);
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
        $receipt = Receipt::where('student_id',$data->id)->get();
        //dd($receipt);
        $debit = Student_Account::where('student_id',$data->id)->sum('debit');
        $credit = Student_Account::where('student_id',$data->id)->sum('credit');
        $minus = $debit-$credit;
        //dd($debit);
        return view('pages.student.receipt.index',compact('data','receipt','debit','minus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Receipt::find($id);
        return view('pages.student.receipt.edit',compact('data'));
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
        $data = Receipt::find($id);
        $rece = $request->all();
        $data->update($rece);
        $boxs = BoxStudent::where('receipt_id',$data->id)->first();
        $boxs['debit'] = $request->debit;
        $boxs['credit'] = 0.00;
        $boxs->update($rece);
        $account = Student_Account::where('receipt_id',$data->id)->first();
        $account['debit'] = $boxs->credit;
        $account['credit'] = $request->debit;
        $account->update($rece);
        $user = $data->student_id;
        return redirect()->route('receipt.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Receipt::find($id);
        $user = $data->student_id;
        $data->delete();
        return redirect()->route('receipt.show',$user);
    }
}

@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ $data->students->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('receipt.update',$data->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                    <div class="col-8">
                        <label>Enter The Amount</label>
                        <input type="number" value="{{ $data->debit }}" name="debit" class="form-control" placeholder="Enter the Amount">
                    </div>
                </div>
            </br>
                <div class="row">
                    <div class="col-8">
                        <label>Enter The text</label>
                        <input type="text" value="{{ $data->text }}" name="text" class="form-control" placeholder="enter text">
                    </div>
                    </div>
                </br>
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

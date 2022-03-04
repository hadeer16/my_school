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
            @foreach($quiz as $data)
            <h4 class="mb-0">{{ $data->title }}</h4>
            @endforeach
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
    <div class="col-md-12 mb-30 ">
        <div class="title mt-5">
            <h2 style="text-align: center">...Are You Ready</h2>
        </div>
        <div class="link d-flex justify-content-center mt-5">
            @foreach($quiz as $data)
            <a href="{{ route('quiztion.show',$data->id) }}"  class="btn btn-primary">open the exam</a>
            @endforeach
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

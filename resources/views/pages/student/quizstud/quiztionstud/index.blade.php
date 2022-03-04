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
            <h4 class="mb-0">{{ $data->title }}</h4>
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
                @foreach ($quizz as $quiz)
                <div class="card text-white bg-dark mb-3" style="max-width: 40rem;">
                <form method="POST" action="{{route('quiztion.store')}}">
                @csrf
                <div class="card-header d-flex">
                <input class="form-control" style="font-size:17px" name="question_id" type="hidden" value="{{$quiz->id}}" readonly>
                <input class="form-control" style="font-size:17px" type="text" value="{{$quiz->question}}" readonly>
                </div>
                    <div class="card-body">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="a{{$quiz->id}}" name="answer" value="a" class="custom-control-input">
                            <label class="custom-control-label" for="a{{$quiz->id}}"><span style="padding-right:20px">{{$quiz->a}}</span></label>
                          </div>
                          <div class="custom-control custom-radio mt-3">
                            <input type="radio" id="b{{$quiz->id}}" name="answer" value="b" class="custom-control-input mt-3">
                            <label class="custom-control-label" for="b{{$quiz->id}}"><span style="padding-right:20px">{{$quiz->b}}</span></label>
                          </div>
                          <div class="custom-control custom-radio mt-3">
                            <input type="radio" id="c{{$quiz->id}}" name="answer" value="c" class="custom-control-input mt-3">
                            <label class="custom-control-label" for="c{{$quiz->id}}"><span style="padding-right:20px">{{$quiz->c}}</span></label>
                          </div>
                          <div class="custom-control custom-radio mt-3">
                            <input type="radio" id="d{{$quiz->id}}" name="answer" value="d" class="custom-control-input mt-3">
                            <label class="custom-control-label" for="d{{$quiz->id}}"><span style="padding-right:20px">{{$quiz->d}}</span></label>
                          </div>
                          <button class="btn btn-danger mt-3 ml-4" type="submit">Save</button>
                    </div>
                </div>
            </form>
            </div>
             @endforeach
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

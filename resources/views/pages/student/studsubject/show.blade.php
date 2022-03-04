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
            <h3 class="mb-0">{{ $data->name }}</h3>
            @foreach ($data->teachers()->pluck('name')->toArray() as $teacher)
            <p style="font-size: 17px" class="text-info">أ/{{ $teacher }}</p>
            @endforeach
        </br>
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
                @foreach ($data->files()->pluck('files')->toArray() as $file)
                <a class="badge badge-secondary pr-5 pt-4 pb-4 rounded" style="font-size:20px" href="{{ asset('file/'.$file) }}">{{ $file }}</a>
                @endforeach
                @foreach($subj as $subjects)
                <a class="badge badge-secondary pr-5 pt-4 pb-4 rounded" style="font-size:20px" href="{{ route('quizstud.show',$subjects->id) }}">{{ $subjects->title }}</a>
                @endforeach 
                
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

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
            <h4 class="mb-0"> المواد الدراسية</h4>
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
    @foreach($subject as $subjects)
    @foreach ($subjects->teachers()->pluck('name')->toArray() as $teacher)
    <div class="col-md-3 mb-30">
        <div class="card" style="width: 18rem;">
            <h3 style="text-align:center; padding-top:10px">{{ $subjects->name }}</h3>
            <div class="card-body">
              <p class="card-text" style="font-size:17px;padding-bottom:10px"">أ/{{ $teacher }}</p>
              <a href="{{ route('studsubject.edit',$subjects->id) }}" class="stretched-link" style="color:blue">الذهاب للمادة....</a>
            </div>
          </div>
        </div>
            @endforeach
            @endforeach
        </div>
<!-- row closed -->
@endsection
@section('js')

@endsection

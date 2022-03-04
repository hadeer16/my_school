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
                <form action="{{ route('feess.update',$data->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div style="display:flex">
                    <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.name') }}</label>
                            <select style="padding:8px" class="form-select form-control student_id" name="student_id" id="student_id" aria-label="Floating label select example">
                                <option selected disabled value="{{$data->students->id}}">{{$data->students->name}}</option>
                    </select>
                    </div>
                    <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.feess') }}</label>
                            <select style="padding:8px" class="form-select form-control fee_id" name="fee_id" id="fee_id" aria-label="Floating label select example">
                                @foreach ($data->fees()->pluck('name')->toArray() as $dd)
                                <option selected disabled>{{ $dd }}</option>
                                @endforeach
                                @foreach($classes as $fees)
                                <option value="{{$fees->id}}">{{$fees->name}}</option>
                                @endforeach 
                    </select>
                    </div>
                    </div>
                    <div style="display:flex">
                    <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.amount') }}</label>
                            <select style="padding:8px" class="form-select form-control amount" name="amount" id="amount" aria-label="Floating label select example">
                                @foreach ($data->fees()->pluck('amount')->toArray() as $amount)
                                <option selected disabled>{{ $amount }}</option>
                                @endforeach
                                @foreach($classes as $amount)
                                <option value="{{ $amount->amount }}">{{ $amount->amount }}</option>
                                @endforeach  
                    </select>
                    </div>
                    <div class="col-6 mb-3">
                    <div class="form-group">
                            <label for="formGroupExampleInput2">{{ trans('student.note') }}</label>
                            <input type="text" value="{{ $data->text }}" name="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                    </div>
                    </div>
                    </div>
                    <input type="hidden" name="student_id" value="{{ $data->id }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                    <input type="hidden" name="level_id" value="{{ $data->levels->id }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                    <input type="hidden" name="classroom_id" value="{{ $data->classes->id }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                    <button type="submit" class="btn btn-primary pl-5 pr-5 mr-3">{{ trans('parent.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

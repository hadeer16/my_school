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
            <h4 class="mb-0">{{ $data->name }}</h4>
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
                <form action="{{ route('attendance.store') }}" method="POST">
                    @csrf
                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">الصف</th>
                            <th scope="col">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;?>
                            @foreach($student as $students)
                            <?php $i++?>
                            <tr>
                                <th>{{ $i }}</th>
                                <td>{{ $students->name }}</td>
                                <td>{{ $students->classes->name }}</td>
                                <td>
                                    @if(isset($students->attend()->where('date',date('y-m-d'))->first()->student_id))
                                    <label class="block">
                                        <input type="radio" value="presence" name="attendances[{{ $students->id }}]" class="leading-tight" disabled
                                        {{ $students->attend()->first()->status == 1 ? 'checked':'' }}>
                                        <span class="text-danger">حضور</span>
                                    </label>
                                    <label class="block">
                                        <input type="radio" value="presence" name="attendances[{{ $students->id }}]" class="leading-tight" disabled
                                        {{ $students->attend()->first()->status == 0 ? 'checked':'' }}>
                                        <span class="text-danger">غياب</span>
                                    </label>
                                    @else
                                    <label class="block">
                                        <input type="radio" value="presence" name="attendances[{{ $students->id }}]" class="leading-tight">
                                        <span class="text-danger">حضور</span>
                                    </label>
                                    <label class="block">
                                        <input type="radio" value="absent" name="attendances[{{ $students->id }}]" class="leading-tight">
                                        <span class="text-danger">غياب</span>
                                    </label>
                                    @endif 
                                    <input type="hidden" name="student_id[]" value="{{ $students->id }}">
                                    <input type="hidden" name="level_id" value="{{ $students->levels->id }}">
                                    <input type="hidden" name="classroom_id" value="{{ $students->classes->id }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- @if($condition)
                        
                    @endif --}}
                    <button type="submit" class="btn btn-danger">save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

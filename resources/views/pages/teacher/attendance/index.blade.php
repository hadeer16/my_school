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
            <h4 class="mb-0"> تسجيل الغياب و الحضور</h4>
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
    <div class="col-md-10 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الاسم</th>
                        <th scope="col"> العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=0?>
                        @foreach ($dd as $data)
                        <?php $i++?>
                        <tr>
                            <th>{{ $i }}</th>
                            <td>{{ $data->name }}</td>
                            <td>
                                <a href="{{ route('attendance.edit',$data->id) }}" class="btn btn-danger">عرض الطلاب</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

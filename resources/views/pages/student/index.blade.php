@extends('layouts.master')
@section('css')

@section('title')
    student
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('student.student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('student.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.student') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <a href="{{ route('student.create') }}" class="btn btn-primary mr-3 mb-3">{{ trans('student.add') }}</a>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div id="accordion">
                    @foreach($levels_data as $level)
                    <div class="card mb-5">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $level->id }}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $level->name }}
                            </button>
                            </h5>
                        </div>
                        <div id="collapseOne{{ $level->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="card-title mg-b-0">{{ trans('student.table') }}</h6>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>{{ trans('student.id') }}</th>
                                                        <th>{{ trans('student.name') }}</th>
                                                        <th>{{ trans('student.classroom') }}</th>
                                                        <th>{{ trans('student.email') }}</th>
                                                        <th>{{ trans('student.pass') }}</th>
                                                        <th>{{ trans('student.religion') }}</th>
                                                        <th>{{ trans('student.date') }}</th>
                                                        <th>{{ trans('student.age') }}</th>
                                                        <th>{{ trans('student.img') }}</th>
                                                        <th>{{ trans('teacher.action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i=0;?>
                                                    @foreach ($level->students as $levels)
                                                    <?php $i++?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $levels->name }}</td>
                                                        <td>{{ $levels->classes->name }}</td>
                                                        <td>{{ $levels->email }}</td>
                                                        <td>{{ $levels->password }}</td>
                                                        <td>{{ $levels->religion }}</td>
                                                        <td>{{ $levels->birth }}</td>
                                                        <td>{{ $levels->age }}</td>
                                                        <td><img src="{{ asset('student_img/'.$levels->img) }}" style="width:50px; height:50px; border-radius:50% "/></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                {{ trans('teacher.action') }}
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" style="color:blue" href="{{ route('student.edit',$levels->id) }}"><i style="color:red; margin-left:5px" class="far fa-edit"></i>{{ trans('student.edit') }}</a>
                                                                    <a href="" class="dropdown-item" style="color:blue" data-toggle="modal" data-target="#delete{{ $levels->id }}"><i style="color:red; margin-left:5px" class="fas fa-user-minus"></i>{{ trans('student.delete') }}</a>
                                                                    <a class="dropdown-item" style="color:blue" href="{{ route('feess.show',$levels->id) }}"><i style="color:red; margin-left:5px" class="fas fa-comments-dollar"></i>{{ trans('student.feess') }}</a>
                                                                    <a class="dropdown-item" style="color:blue" href="{{ route('receipt.show',$levels->id) }}"><i style="color:red; margin-left:5px" class="far fa-edit"></i>دفع المصاريف</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        {{-- model delete --}}
                                                        <div class="modal fade" id="delete{{ $levels->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <h4 style="text-align: center">{{ trans('student.Do') }}</h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('student.close') }}</button>
                                                                        <form action="{{ route('student.destroy',$levels->id) }}" method="POST" style="display: inline">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-success">{{ trans('student.delete') }}</button>
                                                                        </form>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>  <!--/div-->
                        </div>
                        </div>
                    </div>
                </div>   
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

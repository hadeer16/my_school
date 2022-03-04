@extends('layouts.master')
@section('css')

@section('title')
    study fees
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('student.fees') }} <span style="color:red">{{$data->name}}</span></h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('student.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('student.feess') }}</li>
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
                <form action="{{ route('feess.store') }}" method="POST">
                    @csrf
                    <div style="display:flex">
                    <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.name') }}</label>
                            <select style="padding:8px" class="form-select form-control student_id" name="student_id" id="student_id" aria-label="Floating label select example">
                                <option selected disabled value="{{$data->id}}">{{$data->name}}</option>
                    </select>
                    </div>
                    <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('student.feess') }}</label>
                            <select style="padding:8px" class="form-select form-control fee_id" name="fee_id" id="fee_id" aria-label="Floating label select example">
                                <option selected disabled></option>
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
                                <option selected disabled></option>
                                @foreach($classes as $amount)
                                <option value="{{ $amount->amount }}">{{ $amount->amount }}</option>
                                @endforeach 
                    </select>
                    </div>
                    <div class="col-6 mb-3">
                    <div class="form-group">
                            <label for="formGroupExampleInput2">{{ trans('student.note') }}</label>
                            <input type="text" name="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
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
<div class="row">
    <div class="col-12">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div id="accordion">
                
                    <div class="card mb-5">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" style="font-size: 20px" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ $data->name}}
                            </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="card-title mg-b-0">حساب الطالب </h6>
                                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                                            </div>
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الطالب</th>
                                                        <th>نوع الرسوم </th>
                                                        <th>المبلغ</th>
                                                        <th>البيان</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;?>
                                                    @foreach($invo as $dd)
                                                    <?php $i++;?>
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $dd->students->name }}</td>
                                                        <td>{{ $dd->fees->name }}</td>
                                                        <td>{{ $dd->amount }}</td>
                                                        <td>{{ $dd->text }}</td>
                                                        <td>
                                                        <a href="" data-toggle="modal" data-target="#delete{{ $dd->id }}"><i class="fas fa-minus text-danger"></i></a>
                                                        /
                                                        <a href="{{ route('feess.edit',$dd->id) }}"><i class="fas fa-edit text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="delete{{ $dd->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h4 style="text-align: center">هل تريد حذف هذه الرسوم؟</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('student.close') }}</button>
                                                                    <form action="{{ route('feess.destroy',$dd->id) }}" method="POST" style="display: inline">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="btn btn-success">{{ trans('student.delete') }}</button>
                                                                    </form>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>  <!--/div-->
                        </div>
                        </div>
                    </div>
                </div>   
            </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

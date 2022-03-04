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
                <form action="{{ route('receipt.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="invoice_id" value="{{ $data->invoices->id }}" class="form-control" placeholder="enter text">
                    <div class="col-8">
                        <label>Enter The Amount</label>
                        <input type="number" name="debit" class="form-control" placeholder="Enter the Amount">
                    </div>
                </div>
            </br>
                <div class="row">
                    <div class="col-8">
                        <label>Enter The text</label>
                        <input type="text" name="text" class="form-control" placeholder="enter text">
                    </div>
                    </div>
                </br>
                <input type="hidden" name="level_id" value="{{ $data->levels->id }}" class="form-control" placeholder="enter text">
                    <input type="hidden" name="student_id" value="{{ $data->id }}" class="form-control" placeholder="enter text">
                    <input type="hidden" name="classroom_id" value="{{ $data->classes->id }}" class="form-control" placeholder="enter text">
                </br>
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="card-header" id="headingOne">
        <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         سندات القبض {{ $data->name }}
        </button>
        </h5>
    </div>
    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title mg-b-0"></h6>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الرسوم</th>
                                    <th>اجمالي المبلغ</th>
                                    <th> المبلغ المدفوع</th>
                                    <th>المبلغ المتبقى</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($receipt as $dd)
                                <?php $i++;?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $dd->students->name }}</td>
                                    <td>{{ $dd->text }}</td>
                                    <td>{{ $debit }}</td>
                                    <td>{{ $dd->debit }}</td>
                                    <td>{{ $minus }}</td>
                                    <td>
                                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete{{ $dd->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <a href="{{ route('receipt.edit',$dd->id) }}" class="btn btn-danger">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    {{-- modal delete --}}
                                    <div class="modal fade" id="delete{{ $dd->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            <h4 style="text-align: center">{{ trans('level.Do') }}</h4>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                            <form action="{{ route('receipt.destroy',$dd->id) }}" method="POST" style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-success">{{ trans('level.delete') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- end modal delete --}}
                                    {{-- model edit --}}
                                    
                                    {{-- end modal edit --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                </div>
            </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

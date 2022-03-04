@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@section('title')
level
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('level.Level') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('level.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('level.Level') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('level.Add-a-new-Level') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('level.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('level.name') }}</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                </div>
                                <div class="form-group">
                                <label for="formGroupExampleInput2">{{ trans('level.note') }}</label>
                                <input type="text" name="note" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                            </div>
                            <div class="form-group">
                                    <label for="formGroupExampleInput2 ">{{ trans('level.image') }}</label>
                                    <input type="file" id="img" name="img" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note" value="">
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('level.save') }}</button>
                            </div>
                        </form>
                    </div>
        </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#exampleModal">
        {{ trans('level.Add-a-new-Level') }}
    </button>
    <div class="col-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                            <div class="table-responsive level">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td>{{ trans('level.id')}}</td>
                                            <td>{{ trans('level.name')}}</td>
                                            <td>{{ trans('level.note')}}</td>
                                            <td>{{ trans('level.image')}}</td>
                                            <td>{{ trans('level.action')}}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php $i=0;?>
                                            @foreach ($data as $data)
                                            <?php $i++?>
                                            <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $data->name}}</td>
                                            <td>{{ $data->note }}</td>
                                            <td><img src="{{ asset('level_images/'.$data->img) }}" style="width:70px; height:70px; border-radius:50% "/></td>
                                            <td style="display:inline;">
                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{$data->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary mt-3 mr-3" data-toggle="modal" data-target="#edit{{$data->id}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            {{-- modal delete --}}
                                            <div class="modal fade" id="delete{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                    <h4 style="text-align: center">{{ trans('level.Do') }}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                                    <form action="{{ route('level.destroy',$data->id) }}" method="POST" style="display: inline">
															@csrf
															@method('delete')
															<button type="submit" class="btn btn-success">{{ trans('level.delete') }}</button>
														</form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            {{-- end modal delete --}}

                                            {{-- modal edit --}}
                                        <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ trans('level.edit') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('level.update',$data->id)}}" enctype="multipart/form-data">
                                                        @method('put')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">{{ trans('level.name') }}</label>
                                                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{$data->name}}" placeholder="Enter the name of Level">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="formGroupExampleInput2">{{ trans('level.note') }}</label>
                                                                <input type="text" name="note" value="{{$data->note}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                                                            </div>
                                                            <div class="form-group">
                                                                    <label for="formGroupExampleInput2 ">{{ trans('level.image') }}</label>
                                                                    <input type="file" id="img" name="img" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note" value="">
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                                                <button type="submit" class="btn btn-primary">{{ trans('level.save') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            {{-- end modal edit --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- row closed -->
@endsection
@section('js')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection

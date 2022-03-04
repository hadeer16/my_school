@extends('layouts.master')
@section('css')

@section('title')
    classroom
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('classroom.class') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('classroom.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('classroom.class') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    {{--model create class --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('classroom.add') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('classroom.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('classroom.name') }}</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                </div>
                                <div class="form-group">
                                <label for="formGroupExampleInput2">{{ trans('classroom.note') }}</label>
                                <input type="text" name="note" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                            </div>
                            <label for="formGroupExampleInput">{{ trans('classroom.levels') }}</label>
								<select class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
									<option selected disabled>Select Level</option>
                                    @foreach ($level as $levels)
									<option value="{{ $levels->id }}">{{$levels->name}}</option>
                                    @endforeach
								</select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classroom.close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('classroom.save') }}</button>
                            </div>
                        </form>
                    </div>
        </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#exampleModal">
        {{ trans('classroom.add') }}
    </button>
    {{-- end model create --}}
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-12">
                    <div id="accordion">
                        @foreach($data as $data)
                        <div class="card mb-5">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $data->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $data->name }}
                                </button>
                                </h5>
                            </div>
                            <div id="collapseOne{{ $data->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="card-title mg-b-0">{{ trans('classroom.table') }}</h6>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('classroom.id') }}</th>
                                                            <th>{{ trans('classroom.name') }}</th>
                                                            <th>{{ trans('classroom.note') }}</th>
                                                            <th>{{ trans('classroom.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=0;?>
                                                        @foreach ($data->classrooms as $levels)
                                                        <?php $i++;?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $levels->name }}</td>
                                                            <td>{{ $levels->note }}</td>
                                                            <td>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{$levels->id}}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#edit{{$levels->id}}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </td>
                                                            {{-- modal delete --}}
                                                            <div class="modal fade" id="delete{{$levels->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                    <h4 style="text-align: center">{{ trans('level.Do') }}</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classroom.close') }}</button>
                                                                    <form action="{{ route('classroom.destroy',$levels->id) }}" method="POST" style="display: inline">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit" class="btn btn-success">{{ trans('classroom.delete') }}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            {{-- end modal delete --}}
                                                            {{-- model edit --}}
                                                            <div class="modal fade" id="edit{{ $levels->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('classroom.edit') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                            <div class="modal-body">
                                                                                <form method="POST" action="{{ route('classroom.update',$levels->id) }}">
                                                                                    @method('put')
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label for="formGroupExampleInput">{{ trans('classroom.name') }}</label>
                                                                                        <input type="text" name="name" value="{{ $levels->name }}" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                        <label for="formGroupExampleInput2">{{ trans('classroom.note') }}</label>
                                                                                        <input type="text" name="note" value="{{ $levels->note }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter the Note">
                                                                                    </div>
                                                                                    <label for="formGroupExampleInput">{{ trans('classroom.levels') }}</label>
                                                                                        <select class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
                                                                                            <option selected disabled value="{{ $levels->levels->id }}">{{ $levels->levels->name }}</option>
                                                                                            @foreach ($level as $levels)
                                                                                            <option value="{{ $levels->id }}">{{$levels->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classroom.close') }}</button>
                                                                                        <button type="submit" class="btn btn-primary">{{ trans('classroom.save') }}</button>
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
                                            <div class="card-body">
                                        </div>
                                    </div>
                                    <!--/div-->
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
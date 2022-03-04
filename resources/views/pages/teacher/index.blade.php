@extends('layouts.master')
@section('css')

@section('title')
    teachers
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('teacher.teachers') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('teacher.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('teacher.teachers') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <a href="{{ route('teacher.create') }}" class="btn btn-primary mb-3 mr-3">{{ trans('teacher.Add-a-new-teacher') }}</a>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-12">
                    <div id="accordion">
                        @foreach($level as $levels)
                        <div class="card mb-5">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne{{ $levels->id }}" aria-expanded="true" aria-controls="collapseOne">
                                {{ $levels->name }}
                                </button>
                                </h5>
                            </div>
                            <div id="collapseOne{{ $levels->id }}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="card-title mg-b-0">{{ trans('teacher.table') }}</h6>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('teacher.id') }}</th>
                                                            <th>{{ trans('teacher.name') }}</th>
                                                            <th>{{ trans('teacher.gender') }}</th>
                                                            <th>{{ trans('teacher.email') }}</th>
                                                            <th>{{ trans('teacher.address') }}</th>
                                                            <th>{{ trans('teacher.phone') }}</th>
                                                            <th>{{ trans('teacher.sallary') }}</th>
                                                            <th>{{ trans('teacher.img') }}</th>
                                                            <th>{{ trans('teacher.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=0;?>
                                                    @foreach ($levels->level_teacher as $teacher)
                                                    <?php $i++?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $teacher->name }}</td>
                                                            <td>{{ $teacher->gender }}</td>
                                                            <td>{{ $teacher->email }}</td>
                                                            <td>{{ $teacher->address }}</td>
                                                            <td>{{ $teacher->phone }}</td>
                                                            <td>{{ $teacher->salary }}</td>
                                                            <td><img src="{{ asset('images/'.$teacher->image) }}" style="width:50px; height:50px; border-radius:50% "/></td>
                                                            <td>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{ $teacher->id }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <a href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-primary mt-2"><i class="fas fa-edit"></i></a>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#show{{ $teacher->id }}">
                                                                <i class="fas fa-eye"></i>
                                                                </button>
                                                            </td>
                                                            {{-- model delete --}}
                                                            <div class="modal fade" id="delete{{ $teacher->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <h4 style="text-align: center">{{ trans('teacher.Do') }}</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('teacher.close') }}</button>
                                                                            <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST" style="display: inline">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit" class="btn btn-success">{{ trans('teacher.delete') }}</button>
                                                                            </form>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- model show --}}
                                            <div class="modal fade" id="show{{ $teacher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $teacher->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('images/'.$teacher->image) }}" style="width:70px; height:70px; border-radius:50% "/>
                                                        <br/>
                                                        <br/>
                                                        <br/>
                                                        {{ $teacher->teach_level->name }}
                                                        @foreach ($teacher->classrooms()->pluck('name')->toArray() as $classes)
                                                        <p class="badge bg-success" value="">{{$classes}}</p>
                                                        @endforeach
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

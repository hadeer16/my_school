@extends('layouts.master')
@section('css')

@section('title')
    parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.parent') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">{{ trans('parent.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('parent.parent') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<a href="{{route('parents.create')}}" class="btn btn-primary mr-3 mb-3">{{ trans('parent.new-parent') }}</a>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
    
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th>{{ trans('parent.id') }}</th>
                <th>{{ trans('parent.name-father') }}</th>
                <th>{{ trans('parent.address-father') }}</th>
                 <th>{{ trans('parent.job-father') }}</th>
                 <th>{{ trans('parent.email') }}</th>
                <th>{{ trans('parent.pass') }}</th>
                <th>{{ trans('parent.name-mother') }}</th>
                <th>{{ trans('parent.job-mother') }}</th>
                <th>{{ trans('parent.address-mother') }}</th>
                <th>{{ trans('parent.active') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php $i=0;?>
                @foreach($data as $mypare)
                <?php $i++?>
                <td>{{$i}}</td>
                <td>{{$mypare->name_father}}</td>
                <td>{{$mypare->father_address}}</td>
                <td>{{$mypare->father_job}}</td>
                <td>{{$mypare->email}}</td>
                <td>{{$mypare->password}}</td>
                <td>{{$mypare->name_mother}}</td>
                <td>{{$mypare->mother_job}}</td>
                <td>{{$mypare->mother_address}}</td>
                <td>
                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{$mypare->id}}">
                    <i class="fas fa-trash"></i>
                </button>
                <a href="{{ route('parents.edit',$mypare->id) }}" class="btn btn-primary mt-3"><i class="fas fa-user-edit"></i></a> 
                </td>
                <div class="modal fade" id="delete{{$mypare->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <h4 style="text-align: center">{{ trans('parent.do') }}</h4>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                <form action="{{ route('parents.destroy',$mypare->id) }}" method="POST" style="display: inline">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-success">{{ trans('level.delete') }}</button>
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

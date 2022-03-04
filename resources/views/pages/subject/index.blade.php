@extends('layouts.master')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title')
    subject
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('subject.subject') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="default-color">{{ trans('subject.home') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('subject.subject') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    {{-- start modal create --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('subject.Add-a-new-subject') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('subject.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">{{ trans('subject.name') }}</label>
                                <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                </div>
                            <div class="form-group">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.level') }}</label>
                                <select style="padding:8px" class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
                                            <option selected disabled>{{ trans('teacher.select-class') }}</option>
                                            @foreach($level as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.class') }}</label>
                                </br>
                                <select style="padding:8px; width:300px" class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example" multiple="multiple">
                                
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.teacher') }}</label>
                                </br>
                                <select style="padding:8px; width:300px" class="form-select form-control teacher_id" name="teacher_id[]" id="teacher_id" aria-label="Floating label select example" multiple="multiple">
                                            <option selected disabled>{{ trans('subject.teacher') }}</option>
                                            <option value=""></option>
                                </select>
                            </div>
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
    {{-- end modal create --}}
    <button type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#exampleModal">
        {{ trans('subject.Add-a-new-subject') }}
    </button>
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
                                                    <h6 class="card-title mg-b-0">{{ trans('subject.table') }}</h6>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ trans('subject.id') }}</th>
                                                            <th>{{ trans('subject.name') }}</th>
                                                            <th>{{ trans('subject.clsses') }}</th>
                                                            <th>{{ trans('subject.teach') }}</th>
                                                            <th>{{ trans('subject.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=0;?>
                                                        @foreach($levels->subjects as $data)
                                                        <?php $i++;?>
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->classrooms->name }}</td>
                                                            @foreach ($data->teachers()->pluck('name')->toArray() as $teacher)
                                                            <td>{{ $teacher }}</td>
                                                            @endforeach
                                                            <td>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                                <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#edit{{ $data->id }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                            </td>
                                                            {{-- modal delete --}}
                                                            <div class="modal fade" id="delete{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                    <h4 style="text-align: center">{{ trans('subject.do') }}</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('classroom.close') }}</button>
                                                                    <form action="{{ route('subject.destroy',$data->id) }}" method="POST" style="display: inline">
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
                                                            <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('subject.Add-a-new-subject') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        </div>
                                                                            <div class="modal-body">
                                                                                <form method="POST" action="{{ route('subject.update',$data->id) }}">
                                                                                    @method('put')
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label for="formGroupExampleInput">{{ trans('subject.name') }}</label>
                                                                                        <input type="text" value={{ $data->name }} name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                                                                        </div>
                                                                                    <div class="form-group">
                                                                                    <div class="mb-3">
                                                                                        <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.level') }}</label>
                                                                                        <select style="padding:8px" class="form-select form-control level_id" name="level_id" id="level_id" aria-label="Floating label select example">
                                                                                                    <option selected disabled value="{{$data->levels->id}}">{{$data->levels->name}}</option>
                                                                                                    @foreach($level as $levels)
                                                                                                    <option value="{{$levels->id}}">{{$levels->name}}</option>
                                                                                                    @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <div class="mb-3">
                                                                                        <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.class') }}</label>
                                                                                        </br>
                                                                                        <select style="padding:8px; width:300px" class="form-select form-control classroom_id" name="classroom_id" id="" aria-label="Floating label select example" multiple="multiple">
                                                                                        <option selected disabled value="{{$data->classrooms->id}}">{{$data->classrooms->name}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <div class="mb-3">
                                                                                        <label for="formGroupExampleInput2" class="form-label">{{ trans('subject.teacher') }}</label>
                                                                                        </br>
                                                                                        <select style="padding:8px; width:300px" class="form-select form-control teacher_id" name="teacher_id[]" id="" aria-label="Floating label select example" multiple="multiple">
                                                                                        @foreach($data->teachers()->pluck('name')->toArray() as $teachers) 
                                                                                                    <option selected disabled>{{$teachers}}</option>
                                                                                                    @endforeach
                                                                                                    <option value=""></option>
                                                                                        </select>
                                                                                    </div>
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
		$("select[name='level_id']").on('change', function (){
			var level_id = $(this).val();
			if(level_id){
				$.ajax({
					url: "{{ URL::to('classet') }}/" + level_id,
					type: 'GET',
					datatype:'json',
					success: function(data){
						if(data){
							$("select[name='classroom_id']").empty();
						$.each(data, function(key, value){
							$("select[name ='classroom_id']").append('<option value="' + key +'">'+ value +'</option>');
						});
						}
						else
						{
							console.log('no');
						}
					}
				});
			}else{
				console.log('no');
			}
		});
		$("#classroom_id").select2();
		$("#teacher_id").select2();
});
</script> 
<script>
	$(document).ready(function() {
		$("select[name='classroom_id']").on('change', function (){
			var classroom_id = $(this).val();
			if(classroom_id){
				$.ajax({
					url: "{{ URL::to('teachers') }}/" + classroom_id,
					type: 'GET',
					datatype:'json',
					success: function(data){
						if(data){
							$("select[name='teacher_id[]']").empty();
						$.each(data, function(key, value){
							$("select[name ='teacher_id[]']").append('<option value="' + key +'">'+ value +'</option>');
						});
						}
						else
						{
							console.log('no');
						}
					}
				});
			}else{
				console.log('no');
			}
		});
		$(".classroom_id").select2();
		$(".teacher_id").select2();
         $('#example').DataTable();
});
</script> 

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

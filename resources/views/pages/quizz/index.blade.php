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
            <h4 class="mb-0"> إنشاء امتحان جديد</h4>
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
                    <form method="POST" action="{{ route('quizz.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">{{ trans('level.name') }}</label>
                            <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                            </div>
                            <label for="formGroupExampleInput">حدد الصف الدراسي</label>
								<select class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
									<option selected disabled>Select Level</option>
                                    @foreach ($classes as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @endforeach
								</select>
                                <label for="formGroupExampleInput">حدد المادة الدراسية</label>
								<select class="form-select form-control subject_id" name="subject_id" id="subject_id" aria-label="Floating label select example">
									<option selected disabled>Select Level</option>
                                    @foreach ($subject as $subjects)
                                    <option value="{{ $subjects->id }}">{{ $subjects->name }}</option>
                                    @endforeach
								</select>
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
    إضافة امتحان جديد
</button>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Classroom</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach ($quizz as $data)
                        <?php $i++?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->classes->name }}</td>
                            <td>{{ $data->subjects->name }}</td>
                            <td>
                                <button  type="button" class="btn btn-primary " data-toggle="modal" data-target="#delete{{$data->id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-primary  mr-3" data-toggle="modal" data-target="#edit{{$data->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                          </tr>

                          {{-- modal delete --}}
                          <div class="modal fade" id="delete{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <h4 style="text-align: center">{{ trans('level.Do') }}</h4>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('level.close') }}</button>
                                <form action="{{ route('quizz.destroy',$data->id) }}" method="POST" style="display: inline">
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
                            <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('level.Add-a-new-Level') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                            <div class="modal-body">
                                                <form method="POST"action="{{ route('quizz.update',$data->id) }}">
                                                    @method('put')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">{{ trans('level.name') }}</label>
                                                        <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="formGroupExampleInput" placeholder="Enter the name of Level">
                                                        </div>
                                                        <label for="formGroupExampleInput">حدد الصف الدراسي</label>
                                                            <select class="form-select form-control classroom_id" name="classroom_id" id="classroom_id" aria-label="Floating label select example">
                                                                <option selected disabled>Select Level</option>
                                                                @foreach ($classes as $classroom)
                                                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="formGroupExampleInput">حدد المادة الدراسية</label>
                                                            <select class="form-select form-control subject_id" name="subject_id" id="subject_id" aria-label="Floating label select example">
                                                                <option selected disabled>Select Level</option>
                                                                @foreach ($subject as $subjects)
                                                                <option value="{{ $subjects->id }}">{{ $subjects->name }}</option>
                                                                @endforeach 
                                                            </select> 
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
<!-- row closed -->
@endsection
@section('js')

@endsection

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
            <h4 class="mb-0"> create a question</h4>
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
                    <form method="POST" action="{{ route('question.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="formGroupExampleInput">حدد الاختبار</label>
                        <select class="form-select form-control quizz_id" name="quizz_id" id="quizz_id" aria-label="Floating label select example">
                            <option selected disabled></option>
                            @foreach ($quizz as $data)
                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label for="formGroupExampleInput">السؤال</label>
                            <input type="text" name="question" class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput"> : a</label>
                                <input type="text" name="a" class="form-control" id="formGroupExampleInput">
                            </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">: b</label>
                                    <input type="text" name="b" class="form-control" id="formGroupExampleInput">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">: c</label>
                                    <input type="text" name="c" class="form-control" id="formGroupExampleInput">
                                </div>
                                <div class="form-group">
                                        <label for="formGroupExampleInput">: d</label>
                                        <input type="text" name="d" class="form-control" id="formGroupExampleInput">
                                </div>
                                <label for="formGroupExampleInput">حدد الاختيار الصحيح</label>
                                <select class="form-select form-control correct" name="correct" id="correct" aria-label="Floating label select example">
                                    <option selected disabled>حدد الاختيار الصحيح</option>
                                    <option value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                </select>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">حدد الدرجة</label>
                                    <input type="number" name="mark" class="form-control" id="formGroupExampleInput">
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
    إضافة سؤال 
</button>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Option_a</th>
                        <th scope="col">Option_b</th>
                        <th scope="col">Option_c</th>
                        <th scope="col">Option_d</th>
                        <th scope="col">Correct</th>
                        <th scope="col">Mark</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach ($test as $data)
                        <?php $i++?>
                        <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $data->question }}</td>
                        <td>{{ $data->a }}</td>
                        <td>{{ $data->b }}</td>
                        <td>{{ $data->c }}</td>
                        <td>{{ $data->d }}</td>
                        <td>{{ $data->correct }}</td>
                        <td>{{ $data->mark }}</td>
                        <td>
                            <button  type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#delete{{$data->id}}">
                                <i class="fas fa-trash"></i>
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
                                <form action="{{ route('question.destroy',$data->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-success">{{ trans('level.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        {{-- end modal delete --}}
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

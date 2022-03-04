@extends('layouts.master')
@section('css')

@section('title')
    edit parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('parent.edit-parent') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('parent.home') }}</a></li>
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
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{route('parents.update',$data->id)}}" method="POST">
                    @method('put')
                    @csrf
                    <div style="display:flex">
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.name-father') }}</label>
                            <input type="text" name="name_father" value="{{ $data->name_father }}" autocomplete="off" class="form-control" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.name-mother') }}</label>
                            <input type="text" name="name_mother" value="{{ $data->name_mother }}" autocomplete="off" class="form-control" id="formGroupExampleInput">
                        </div>
                    </div>
                    <div style="display:flex">    
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.id-card-father') }}</label>
                            <input type="number" class="form-control" value="{{ $data->id_card_father }}" name="id_card_father" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('parent.id-card-mother') }}</label>
                            <input type="number" class="form-control" value="{{ $data->id_card_mother }}" name="id_card_mother" id="formGroupExampleInput2">
                        </div>
                        </div>
                        <div style="display:flex">    
                        <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.job-father') }}</label>
                            <input type="text" class="form-control" value={{ $data->father_job }} name="father_job" id="formGroupExampleInput">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('parent.job-mother') }}</label>
                            <input type="text" class="form-control" value="{{ $data->mother_job }}" name="mother_job" id="formGroupExampleInput2">
                        </div>
                        </div>
                        <div style="display:flex">    
                            <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.address-father') }}</label>
                            <input type="text" class="form-control" value="{{ $data->father_address }}" name="father_address" id="formGroupExampleInput">
                            </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('parent.address-mother') }}</label>
                            <input type="text" class="form-control" value="{{ $data->mother_address }}" name="mother_address" id="formGroupExampleInput2">
                        </div>
                        </div>
                        <div style="display:flex">    
                            <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.phone-father') }}</label>
                            <input type="tel" class="form-control" value="{{ $data->father_phone }}" name="father_phone" id="formGroupExampleInput">
                            </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('parent.phone-mother') }}</label>
                            <input type="tel" class="form-control" value="{{ $data->mother_phone }}" name="mother_phone" id="formGroupExampleInput2">
                        </div>
                        </div>
                        <div style="display:flex">    
                            <div class="col-6 mb-3" >
                            <label for="formGroupExampleInput" class="form-label">{{ trans('parent.email') }}</label>
                            <input type="email" class="form-control" value="{{ $data->email }}" name="email" id="formGroupExampleInput">
                            </div>
                        <div class="col-6 mb-3">
                            <label for="formGroupExampleInput2" class="form-label">{{ trans('parent.pass') }}</label>
                            <input type="password" class="form-control" value="{{ $data->password }}" name="password" id="formGroupExampleInput2">
                        </div>
                        </div>
                            <button type="submit" class="btn btn-primary pl-5 pr-5 mr-3">{{ trans('parent.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

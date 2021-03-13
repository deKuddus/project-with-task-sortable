@extends('master')

@section('title', trans('text.project.crud.edit'))

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('text.project.title')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{trans('text.home')}}</a></li>
              <li class="breadcrumb-item active">{{trans('text.project.crud.edit')}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">{{trans('text.project.crud.edit')}}</h4>
                <a href="{{route('project.index')}}" class="btn btn-info float-right"><strong><i class="fa fa-list"></i> {{trans('text.project.crud.list')}}</strong></a>
            </div>
            <div class="card-body">
                <form action="{{route('project.update',$project->id)}}" method="post">
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="offset-md-3 col-md-6">
                            <div class="form-group">
                                <label for="name">{{trans('text.project.label')}}</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $project->name}}">
                                @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info float-right" type="submit">{{trans('text.action.update')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@extends('master')

@section('title',trans('text.task.crud.show'))

@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{trans('text.task.title')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">{{trans('text.home')}}</a></li>
                <li class="breadcrumb-item active">{{trans('text.task.crud.list')}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">{{trans('text.task.title')}}</h4>
                <a href="{{route('task.index')}}" class="btn btn-info float-right"><strong><i class="fa fa-list"></i> {{trans('text.task.crud.list')}}</strong></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-widget widget-user shadow-lg">
                            <div class="card-header bg-info">
                                <h3 class="font-weight-bold">
                                    {{trans('text.project.crud.label')}} >>{{$task->project->name}} >>
                                    {{trans('text.task.title')}} >> {{$task->task_name}}
                                </h3>
                            </div>
                            <div class="card-body">
                                    <span class="description-text">
                                        {!! $task->task_details !!}
                                    </span>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

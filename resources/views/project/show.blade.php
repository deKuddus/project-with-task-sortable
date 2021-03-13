@extends('master')

@section('title',trans('text.project.crud.show'))

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
                <li class="breadcrumb-item active">{{trans('text.project.crud.list')}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">{{trans('text.project.table.name')}} >> {{$project->name}}</h4>
                <a href="{{route('project.index')}}" class="btn btn-info float-right"><strong><i class="fa fa-list"></i> {{trans('text.project.crud.list')}}</strong></a>
            </div>
            <div class="card-body">
                <div class="row task-list">
                    @php
                        $bg = ['card-info','card-success','card-primary','card-secondary','card-warning'];
                    @endphp
                    @foreach ($project->tasks as $key => $task)
                        <div class="col-md-4" data-id="{{$task->id}}">
                            <div class="card {{$bg[array_rand($bg)]}}">
                            <div class="card-header">
                                <h3 class="card-title">{{$task->task_name}}</h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                {!! $task->task_details !!}
                            </div>
                            <div class="card-footer">
                                <a href="{{route('task.edit',$task->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                            </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});

            function updateToDatabase(sortId){

                $.ajax({
                    url:'{{route("task.sort")}}',
                    method:'POST',
                    data:{sortId:sortId,project_id:'{{$project->id}}'},
                    success:function(){
                        alert("List Updated");
                    }
                })
            }
            var target = $('.task-list');
            target.sortable({
                placeholder: 'sort-highlight',
                connectWith: '.tasl-list',
                handle: '.card-header, .nav-tabs',
                forcePlaceholderSize: true,
                axis: "x,y",
                update: function (e, ui){
                   var sortId = target.sortable('toArray',{ attribute: 'data-id'})

                   updateToDatabase(sortId);
                }

            })
            $('.tasl-list .card-header').css('cursor', 'move')
        });
    </script>
@endsection

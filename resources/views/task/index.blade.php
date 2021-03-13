@extends('master')

@section('title',trans('text.task.crud.list'))

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
                <a href="{{route('task.create')}}" class="btn btn-info float-right"><i class="fa fa-plus"></i> {{trans('text.task.crud.create')}}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{trans('text.task.table.id')}}</th>
                                <th>{{trans('text.task.table.name')}}</th>
                                <th>{{trans('text.task.table.details')}}</th>
                                <th>{{trans('text.task.table.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->task_name}}</td>
                                    <td>{!! Str::limit($task->task_details, 50, '...') !!}</td>
                                    <td>
                                        <a href="{{route('task.show',$task->id)}}" class="btn btn-success btn-sm float-left mr-1"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('task.edit',$task->id)}}" class="btn btn-info btn-sm float-left mr-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('task.destroy',$task->id)}}" id="task_delete_{{$task->id}}" method="post">@csrf @method('DELETE')
                                            <button type="submit" href="javascript:void(0)" onclick="return confirm('{{trans('text.task.crud.delete')}}')" class="btn btn-danger btn-sm float-left mr-1"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @if ($tasks->links() && !empty($tasks->links()) && !is_null($tasks->links()))
                    {{$tasks->links()}}
                @endif
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@extends('master')

@section('title',trans('text.project.crud.list'))

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
                <h4 class="float-left">{{trans('text.project.title')}}</h4>
                <a href="{{route('project.create')}}" class="btn btn-info float-right"><i class="fa fa-plus"></i> {{trans('text.project.crud.create')}}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{trans('text.project.table.id')}}</th>
                                <th>{{trans('text.project.table.name')}}</th>
                                <th>{{trans('text.task.title')}}</th>
                                <th>{{trans('text.project.table.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $key => $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>
                                        {{trans('text.project.table.action')}} : {{$project->tasks_count}} <br>
                                        <a href="{{route('task._create',$project->id)}}" class="btn btn-info btn-sm float-left mr-1"><i class="fa fa-plus"></i></a>
                                        <a href="{{route('project.show',$project->id)}}" class="btn btn-success btn-sm float-left mr-1"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('project.edit',$project->id)}}" class="btn btn-info btn-sm float-left mr-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('project.destroy',$project->id)}}" id="project_delete_{{$project->id}}" method="post">@csrf @method('DELETE')
                                            <button type="submit" href="javascript:void(0)" onclick="return confirm('{{trans('text.project.crud.delete')}}')" class="btn btn-danger btn-sm float-left mr-1"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @if ($projects->links() && !empty($projects->links()) && !is_null($projects->links()))
                    {{$projects->links()}}
                @endif
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection

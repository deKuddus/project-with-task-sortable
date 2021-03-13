@extends('master')

@section('title','Create New Project')

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
              <li class="breadcrumb-item active">{{trans('text.task.crud.edit')}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">{{trans('text.task.crud.edit')}}</h4>
                <a href="{{route('task.index')}}" class="btn btn-info float-right"><strong><i class="fa fa-list"></i> {{trans('text.task.crud.list')}}</strong></a>
            </div>
            <div class="card-body">
                <form action="{{route('task.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="offset-md-3 col-md-6">
                            <div class="form-group">
                                <label for="project_id">{{trans('text.project.title')}}</label>
                                <select name="project_id" class="form-control" id="project_id">
                                    @foreach ($projects as $id => $name)
                                        <option value="{{$id}}" {{(old('project') == $id OR $id == $task->project->id) ? 'selected':''}}>{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">{{trans('text.task.table.name')}}</label>
                                <input type="text" class="form-control" name="task_name" id="task_name" value="{{old('task_name') ?? $task->task_name}}" >
                                @error('task_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="task_details">{{trans('text.task.table.details')}}</label>
                                <textarea class="form-control" name="task_details" id="task_details" placeholder="Write Task Name here">{{old('task_details') ?? $task->task_details}}</textarea>
                                @error('task_details')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-info float-right" type="submit">{{trans('text.action.create')}}</button>
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
@section('scripts')
  <script >
      $('#task_details').summernote()
  </script>
@endsection

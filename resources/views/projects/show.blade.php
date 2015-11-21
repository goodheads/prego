@extends('layouts.master')

@section('content')

@include('layouts.partials.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @include('layouts.partials.alerts')
    @if( $project )
    <h1 class="page-header">
        {!! $project->project_name !!}
    </h1>

    <div class="container">
        <div class="row">
            <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;padding:10px;">
              <p>Due : {!! date_format(new DateTime($project->due_date), "D, m Y") !!}</p>
              <p>Status: {!! $project->project_status !!}</p>
              <p>Tasks: 0</p>
              <p>Comments: 0</p>
              <p>Attachments: 0</p>
              <p><a href="/projects/{{ $project->id }}/edit">Edit</a></p>
                  <button class="btn btn-circle btn-danger delete"
                          data-action="{{ url('projects/' . $project->id) }}"
                          data-token="{{csrf_token()}}">
                    <i class="fa fa-trash-o"></i>Delete
                  </button>
            </div>
        </div>
        <hr>
        <div class="row">
            @include('tasks.form')
            @include('files.form')
        </div>
        <hr>
        <div class="row">
            @include('comments.form')
        </div>
    </div>
    @endif
</div>
@stop
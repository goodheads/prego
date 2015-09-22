@extends('layouts.master')

@section('content')

@include('layouts.partials.sidebar')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    @include('layouts.partials.alerts')
    <h1 class="page-header">
        Projects
        <a class="btn btn-info" href="{{ route('projects.create') }}">New Project</a>
    </h1>

        <div class="container">
            @if( $project )
                <div class="row">
                    @foreach ($project as $proj)
                        <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;">
                          <h2>{!! $proj->project_name !!}</h2>
                          <p>Due : {!! date_format(new DateTime($proj->due_date), "D, m Y") !!}</p>
                          <p>Status: {!! $proj->project_status !!}</p>
                          <p>Tasks: 0</p>
                          <p>Comments: 0</p>
                          <p>Attachments: 0</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @if( $project->isEmpty() )
           <h3>There are currently no Projects</h3>
        @endif
    </div>

    <div class="container">
       <a class="btn btn-info" href="{{ route('projects.create') }}">New Project</a>
    </div>


</div>
@stop
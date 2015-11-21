@extends('layouts.master')

@section('content')

@include('layouts.partials.sidebar')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header"> Edit Comment</h1>

    @include('layouts.partials.alerts')
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ url('projects/' .$projectId .'/comments/' . $comment->id) }}">
            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                <input type="text" name="comments" class="form-control" id="comments" value="{!! $comment->comments ?: '' !!}">
                @if ($errors->has('comments'))
                    <span class="help-block">{{ $errors->first('comments') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info">Update Comment</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {!! method_field('PUT') !!}
        </form>
    </div>
</div>
@stop
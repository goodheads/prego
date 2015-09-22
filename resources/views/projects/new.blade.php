@extends('layouts.master')

@section('content')

@include('layouts.partials.sidebar')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">New Project</h1>

    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('projects.store') }}">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status" class="control-label">Choose Status</label>
                <select name="status" id="status">
                    <option value="">Choose a status</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="Active">Active</option>
                    <option value="Completed">Completed</option>
                </select>
                @if ($errors->has('status'))
                    <span class="help-block">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('due-date') ? ' has-error' : '' }}">
                <label for="due-date" class="control-label">Due date</label>
                <input type="date" name="due-date" class="form-control" id="due-date">
                @if ($errors->has('due-date'))
                    <span class="help-block">{{ $errors->first('due-date') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                <label for="notes" class="control-label">Notes</label>
                <textarea name="notes" class="form-control" id="notes" rows="10" cols="10">
                </textarea>
                @if ($errors->has('notes'))
                    <span class="help-block">{{ $errors->first('notes') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Create</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>
@stop
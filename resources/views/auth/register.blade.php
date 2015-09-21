@extends('layouts.master')

@section('content')
    <h3><a href={{ route('index') }}> Prego - Project Management App for Human Beings </a></h3>

    <h3>Register Here</h3>
    <div class="row">
        <div class="col-lg-6">
            <form class="form-vertical" role="form" method="post" action="{{ route('auth.register') }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Your email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') ?: '' }}">
                    @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="control-label">Choose a username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ old('username') ?: '' }}">
                    @if ($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Choose a password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Sign up</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop
@extends('layouts.master')

@section('content')
        <h1>Project Management for Human Beings</h1>

        <p>The promise of Prego is simple. All your projects and todos on one screen without having to filter by team or users. Finally, project management built just for humanbeings. Very Intuitve, Slick and crafted with the power of Laravel</p>

        <p><img src="{{ asset('images/projectmanagement.gif') }}" /></p>

        <a class="btn btn-large btn-info" href="/auth/register">Sign Up</a>

        <p class="login">Already signed up? <a class="btn btn-large btn-info" href="/auth/signin">Login</a></p>
@stop
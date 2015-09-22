@extends('layouts.master')

@section('content')


    @if (! Auth::check())
        <h1>Project Management for Human Beings</h1>

        <p>The promise of Prego is simple. All your projects and todos on one screen without having to filter by team or users. Finally, project management built just for humanbeings. Very Intuitve, Slick and crafted with the power of Laravel</p>

        <p><img src="{{ asset('images/projectmanagement.gif') }}" /></p>

        <a class="btn btn-large btn-info" href="/auth/register">Sign Up</a>

        <p class="login">Already signed up? <a class="btn btn-large btn-info" href="/auth/signin">Login</a></p>
    @endif



    @if ( Auth::check())
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li style="margin-left:20px;">
                    <img src="{{ Auth::user()->getAvatarUrl() }}" height="50" width="50" style="border-radius:25px;" />
                </li>
                <li><a href="#"> @ {{ Auth::user()->username }}</a></li>
                <li class="active"><a href="#">PREGO<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Edit Account</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Todos</a></li>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href="">Account</a></li>
                <li><a href="">Help</a></li>
                <li><a href="{{ route('auth.logout') }}">Sign Out</a></li>
              </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              <h1 class="page-header">Dashboard</h1>

              <h2 class="sub-header">Projects</h2>
              <a class="btn btn-info" href="{{ route('projects.create') }}">New Project</a>
            </div>
          </div>
        </div>
    @endif
@stop
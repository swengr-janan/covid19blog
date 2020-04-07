@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
        <h1 class="display-4">Welcome to {{$title}}</h1>
        <p class="lead">Want to be updated on the latest update about Corona Virus? You may find this blog useful.</p>
        <hr class="my-4">
        <p>This blog is not only for the update but also hearing the different informations from netizens.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="/login" role="button">Log-in</a>
          <a class="btn btn-warning btn-lg" href="/register" role="button">Register</a>
        </p>
      </div>
@endsection
           

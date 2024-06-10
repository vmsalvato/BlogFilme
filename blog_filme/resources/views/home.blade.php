@extends('layouts.main')
@section('title', 'Blog Filmes')

@section('content')
<h1>Bem-vindo ao seu blog de filmes!</h1>
<br>
<div id="events-container" class="cool-md-12">
    <br>
    <h2>Acompanhe as críticas abaixo</h2>
    <br>
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3" style="margin: 5px;">
            <img src="/images/events/{{ $event->image}}" alt="{{ $event->title }}" style="max-height: 720px; border-top-left-radius: 10px; border-top-right-radius: 10px; padding-top: 10px;">
            <div class="card-body">    
                <h5 class="card-title">{{ $event->title }} </h5>
                <a href="/events/ {{ $event->id }}" class="btn btn-primary">Saiba mais</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
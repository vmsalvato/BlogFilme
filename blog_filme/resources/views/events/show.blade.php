@extends('layouts.main')
@section('title', '$event->title')

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <div id="info-container" class="col-md-6">
                    <img src="/images/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
                </div>
            </div>
            <div id="info-container" class="col-md-6">
                <h1>Filme: {{ $event->title }}</h1>
                <p class="event-owner">Dono(a) da critica: {{ $eventOwner['name']}}</p>
                <h3>Critica</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection
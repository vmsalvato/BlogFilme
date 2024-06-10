@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Criticas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count(events) > 0)

    @else   
    <p>Você ainda não possui criticas, <a href="/events/create">Criar Critica</a></p>
    @endif
</div>

@endsection

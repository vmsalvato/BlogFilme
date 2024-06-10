@extends('layouts.main')
@section('title', 'Edição' . $event->title)

@section('content')
<h1>Avalie um filme</h1>
<br>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Edição: {{ $event->title}}</h1>
    <br>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Escolha uma Imagem</label>
            <br><br>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/images/events/{{ $event->image}}" alt="{{ $event->title}}" class="img-preview" style="width: 100px; margin-top:20px;">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Filme</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do filme" value="{{$event->title}}" required="required">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Critica</label>
            <textarea name="description" id="description" class="form-control" placeholder="Escreva sua critica" required="required">{{$event->description}}</textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
        
@endsection
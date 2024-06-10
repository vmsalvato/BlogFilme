@extends('layouts.main')
@section('title', 'Avaliar Filme')

@section('content')
<h1>Avalie um filme</h1>
<br>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie sua avaliação</h1>
    <br>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Escolha uma Imagem</label>
            <br><br>
            <input type="file" id="image" name="image" class="form-control-file" required="required">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Filme</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do filme" required="required">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Critica</label>
            <textarea name="description" id="description" class="form-control" placeholder="Escreva sua critica" required="required"></textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
        
@endsection
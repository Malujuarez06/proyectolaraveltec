@extends('layouts.app')

@section('title', 'Ver Nota')

@section('content')
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->content }}</p>
    @if ($note->image)
        <div class="image-container">
            <img src="{{ asset('storage/' . $note->image) }}" alt="Imagen de la Nota">
        </div>
    @endif
    <div class="button-group">
        <a href="{{ route('notes.index') }}" class="btn">Regresar a la Lista de Notas</a>
        <a href="{{ route('notes.edit', $note) }}" class="btn">Editar</a>
        <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Eliminar</button>
        </form>
        <a href="{{ route('notes.pdf', $note) }}" class="btn">Generar PDF</a>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }

        .navbar a, .logout-button {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border: none;
            background: none;
            cursor: pointer;
        }

        .navbar a:hover, .logout-button:hover {
            background-color: #555;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .image-container {
            text-align: center;
            margin: 20px 0;
        }

        .image-container img {
            width: 150px; /* Ancho más pequeño */
            height: auto;
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }

        button, .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }

        button:hover, .btn:hover {
            background-color: #555;
        }
    </style>
@endsection

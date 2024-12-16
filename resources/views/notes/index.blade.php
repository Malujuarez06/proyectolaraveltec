@extends('layouts.app')

@section('title', 'Lista de Notas')

@section('content')
    <h1>Lista de Notas</h1>

    <form method="GET" action="{{ route('notes.index') }}">
        <input type="text" name="query" value="{{ request()->input('query') }}" placeholder="Buscar notas...">
        <button type="submit">Buscar</button>
    </form>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul class="note-list">
        @foreach ($notes as $note)
            <li>
                @if ($note->image)
                    <img src="{{ asset('storage/' . $note->image) }}" alt="Imagen de la Nota" class="note-preview">
                @endif
                <div class="note-details">
                    <p>{{ $note->title }}</p>
                    <p>{{ $note->content }}</p>
                    <a href="{{ route('notes.show', $note) }}" class="btn">Ver Nota</a>
                    <a href="{{ route('notes.edit', $note) }}" class="btn">Editar</a>
                    <a href="{{ route('notes.pdf', $note) }}" class="btn">Generar PDF</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

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

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

        ul.note-list {
            list-style: none;
            padding: 0;
        }

        ul.note-list li {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        ul.note-list li img.note-preview {
            width: 100px;
            height: auto;
            margin-right: 10px;
            border-radius: 4px;
        }

        ul.note-list li .note-details {
            flex-grow: 1;
        }

        ul.note-list li .note-details p {
            margin: 0 0 10px;
            color: #000;
        }

        ul.note-list li .note-details .btn {
            display: inline-block;
            margin-right: 5px;
            text-align: center;
        }
    </style>
@endsection

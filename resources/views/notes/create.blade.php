@extends('layouts.app')

@section('title', 'Crear Nota')

@section('content')
    <h1>Crear Nota</h1>
    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Título" required>
        <textarea name="content" placeholder="Contenido" required></textarea>
        <input type="file" name="image">
        <button type="submit">Guardar</button>
    </form>

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

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }

        .navbar a:hover {
            background-color: #555;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
@endsection

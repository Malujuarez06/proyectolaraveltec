<!DOCTYPE html>
<html>
<head>
    <title>Nota PDF</title>
    <style>
        body { 
            font-family: 'DejaVu Sans', sans-serif; 
            background-color: #f2f2f2; 
            color: #333; 
            margin: 0; 
            padding: 0;
        }
        .container { 
            margin: 40px auto; 
            padding: 30px; 
            max-width: 800px; 
            background-color: #fff; 
            border: 2px solid #333;
            border-radius: 15px; 
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); 
        }
        h1 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 30px; 
            font-size: 28px;
        }
        p { 
            color: #555; 
            line-height: 1.8; 
            font-size: 16px; 
            margin-bottom: 20px;
        }
        .note-image-container {
            display: flex; 
            justify-content: center; 
            margin: 20px 0; 
        }
        .note-image { 
            max-width: 300px; 
            border-radius: 10px; 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); 
        }
        .note-content { 
            text-align: justify;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $note->title }}</h1>
        <div class="note-content">
            <p>{{ $note->content }}</p>
            @if ($note->image)
                <div class="note-image-container">
                    <img src="{{ public_path('storage/' . $note->image) }}" alt="Imagen de la Nota" class="note-image">
                </div>
            @endif
        </div>
    </div>
</body>
</html>


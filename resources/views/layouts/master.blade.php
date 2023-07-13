<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .highlight-on-hover:hover {
            background-color: yellow;
        }
    </style>
    
    <title>Anuncios2023_V1</title>
</head>

<body>
  @if (isset($errors) && $errors->any())
<div class="alert alert-danger">
             
        <ul>
            @foreach ($errors->all() as $error)   {{-- //! Clase 39 --}}
                <li>{{ $error }}</li>
            @endforeach
        </ul>

</div>
      
  @endif
    @yield('content') {{-- //! Clase 30 --}}

</body>
            
</html>

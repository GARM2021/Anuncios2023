<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anuncios</title>
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

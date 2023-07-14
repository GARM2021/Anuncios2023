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
            background-color: yellow !important;
        }

        .table-container {
            max-height: 500px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .table-header-container {
            max-height: 50px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .table-row-container {
            max-height: 400px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        /* .header_fijo {
  width: 1000px;
  table-layout: sticky !important;
  border-collapse: collapse; 
}
.header_fijo thead {
  background-color: #333;
  color: #FDFDFD;
}

.header_fijo thead tr {
  display: block;
  position: relative;
}
.header_fijo tbody {
  display: block;
  overflow: auto;
  width: 100%;
  height: 1000px;
} */



         .thead {
            position: sticky !important;
            top: 100;
            background-color: #0b6fe2;
            /* Ajusta el color de fondo según tu diseño */
        }
         
    </style>

    <title>Anuncios2023_V1</title>
</head>

<body>
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    {{-- //! Clase 39 --}}
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif
    @yield('content') {{-- //! Clase 30 --}}

</body>

</html>

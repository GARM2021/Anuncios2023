<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <link  rel="stylesheet" href="{{ asset('D:\xampp\htdocs\Anuncios2023\resources\css\anuncios2023.css') }}"> --}}
    <style>
        .highlight-on-hover:hover {
            background-color: yellow !important;

        }

        .highlight-on-hover_g:hover {
            background-color: rgb(126, 197, 230) !important;
            color: white;
        }

        .highlight-on-hover_t:hover {

            background-color: rgb(123, 116, 133, 1) !important;
            color: white;
        }

        .highlight-on-hover_t:hover::placeholder {
            color: white;
        }


        .div-container {
            max-height: 550px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
            margin-left: 2%;
            background-color: rgb(115, 148, 167) !important;
        }



        h1 h2 h3 h4 h5 h6 {
            margin-left: 2% !important;
        }

        /* h2 {
            margin-left: 5% !important;
        } */
        label {
            margin-left: 1%;
        }

        .head_uno {
            background-color: rgb(65, 71, 77, 1);
            color: white !important;
            margin-left: 2%;

            /* el ultimo parametro de background-color es 1 solido si es menor de 1 es traslucido */
        }



        .table-container {
            max-height: 1000px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .table-header-container {
            max-height: 40px;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .table-row-container {
            max-height: auto;
            /* Ajusta la altura máxima según tus necesidades */
            overflow-y: auto;
        }

        .thead-fixed {
            position: sticky !important;
            top: 0;
            background-color: hsla(210, 6%, 6%, 1);
            color: white !important;
            /* el ultimo parametro de background-color es 1 solido si es menor de 1 es traslucido */
        }

        td {
            padding: 3px;
        }

        td:first-child {
            white-space: nowrap;
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

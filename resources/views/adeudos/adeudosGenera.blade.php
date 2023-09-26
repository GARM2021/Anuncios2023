@extends('layouts.app')
@section('content')
    {{-- //! Clase 31 --}}



    <h6 style="margin-left: 2%;">Genera Adeudos</h6>

    {{-- @dump($errors)
    @dump($dua) --}}
    <div class="head_uno">
        <h5>Dua {{ $dua }}</h5>
        <h5> {{ $nomdua }}</h5>
        <h6>SubDua {{ $subdua }}</h6>
        <h6>Dom. SubDua: {{ $sububicaion }}</h6>
    </div> <br>
    <div class="div-container">
        <form id="Genera" name="Genera" method="POST" action="{{ route('adeudos.genera') }}">
            {{-- //! aqui lo resolvi asi  --}}
            {{-- //! https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario  --}}
            {{-- //! tenia unos elementos form intermedios? y en la lina 299  --}}
            {{--  //! Clase  31 tenia action en lugar de method --}}
            @csrf


            <div tabindex="0">
                <input class="form-control highlight-on-hover_t" maxlength="60" type="hidden" name="dua"
                    value="{{ $dua }}" requiered>
            </div>


            <div tabindex="0">
                <input type="hidden" name="subdua" value="{{ $subdua }}" requiered>
            </div>
            <div tabindex="0">
                <input type="hidden" name="nomdua" value="{{ $nomdua }}" requiered>
            </div>


            <div tabindex="0">
                <input type="hidden" name="sububicacion" value="{{ $sububicaion }}" requiered>
            </div>


            <br>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Recibo del Ultimo pago </span>
                </div>
                <input class=" highlight-on-hover_t" maxlength="60" type="text" name="recibo" id="recibo"
                    value="{{ old('recibo') ?? $frmitems['frmrecibo'] }}" placeholder="CCCCNNNNNN C=CAJA N=CONSECUTIVO">
            </div>

            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Fecha Ultimo Pago: </span>
                </div>
                <input class=" highlight-on-hover_t" type="text" maxlength="08" id="fupago" v-model="fupago"
                    name="fupago" value="{{ old('fupago') ?? $frmitems['frmfupago'] }}" placeholder="AAAAMMDD"
                    pattern="[0-9]{8}">
                <small> Format Ejemplo: 20230512</small>
            </div>

            <div class=" mb-3 ">

                <span disabled id="datosrecibo" style="margin-left: 2%;"
                    contenteditable="false">{{ $frmitems['datorecibo'] }}</span>
            </div>



            <hr style="border-color: black; border-width: 2px;">

            <br>



            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Año Pagado </span>
                </div>


                <select name="AñoPagado" id="AñoPagado" class="highlight-on-hover_t" option
                    value="{{ old('AñoPagado') ?? $frmitems['frmAñoPagado'] }}" requiered>
                    <?php
                    for ($year = 1999; $year <= 2024; $year++) {
                        echo "<option value='$year' " . ($year == $frmitems['frmAñoPagado'] ? 'selected' : '') . ">$year</option>";
                    }
                    ?>
                </select>
            </div>


            <br>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Año Generado </span>
                </div>

                <select name="AñoGenerado" id="AñoGenerado" class="highlight-on-hover_t" option
                    value="{{ old('AñoGenerado') ?? $frmitems['frmAñoGenerado'] }}" requiered>
                    <?php
                    for ($year = 1999; $year <= 2024; $year++) {
                        echo "<option value='$year' " . ($year == $frmitems['frmAñoGenerado'] ? 'selected' : '') . ">$year</option>";
                    }
                    ?>
                </select>
            </div>



            <br>

            <hr style="border-color: black; border-width: 2px;">

            <br>

            <div tabindex="0">
                <button name="BCrea" type="submit" class="btn btn-primary btn-sm"
                    onclick="document.forms.Genera.submit();">Valida Datos</button>
                {{-- //! aqui lo resolvi en esta pagina --}}
                {{-- https://es.stackoverflow.com/questions/418419/el-bot%C3%B3n-submit-no-funciona-en-formulario --}}
                {{--  --}}
            </div> <br>

            <br>

            <div tabindex="0">
                <button disabled id="BCalcula" name="BCalcula" type="submit" class="btn btn-primary btn-sm"
                    onclick="document.forms.Genera.submit();">Calcula Anuncios</button>
             </div> <br>



        </form>
        <script>
            window.onload = function() {


                frm_idatosrecibo = document.getElementById("datosrecibo");
                frm_BCalcula = document.getElementById("BCalcula");

              

                if(frm_idatosrecibo.textContent.length > 2) {

                    frm_BCalcula.disabled = false;
                }
             
            }
        </script>
    @endsection

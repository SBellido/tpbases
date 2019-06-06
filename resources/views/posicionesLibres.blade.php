@extends('plantillabase')
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <h2>Busqueda de Posiciones libres</h2>
        <form action="/posiciones-libres" method="post">
            {{ csrf_field() }}
            <label for="date">Seleccione una fecha para mostrar los lugares vacios</label>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control datepicker" name="datestart" />
            </div>  
            <button type="submit" class="btn btn-default btn-primary">Enviar</button>
        </form>

        </div>
        <div class="col-md-4 ">
        <h3>Posiciones libres al dia {{$datestart}}</h3>
        

        <table class="table">
            <thead>                
                    <th>Estanteria</th>
                    <th>Fila</th>
                    <th>Posicion</th>
    
            </thead>
            <tbody>
            @foreach ($lugaresvacios as $lugarvacio)
                <tr>
                    <td>{{$lugarvacio->nro_estanteria}}</td>
                    <td>{{$lugarvacio->nro_fila}}</td>
                    <td>{{$lugarvacio->nro_posicion}}</td>
                </tr>
            @endforeach
            @if (sizeof($lugaresvacios) == 0)
                <p>Haga su busqueda</p>
            @endif
            </tbody>
        </table>

        <ul>
           
        </ul>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
<!-- Languaje -->
<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

<script>
$('.datepicker').datepicker({
    startView: 1,
    maxViewMode: 3,
    calendarWeeks: true,
    autoclose: false,
    format: "yyyy-mm-dd",
    defaultViewDate: { year: 2000, month: 01, day: 01 }
});
 </script>
@endsection
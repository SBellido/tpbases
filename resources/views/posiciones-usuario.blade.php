@extends('plantillabase')
@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <h2>Busqueda de Posiciones del usuario</h2>
        <form action="/posiciones-usuario" method="post">
            {{ csrf_field() }}
            <label for="date">Seleccione el usuario</label>
            <div class="input-daterange input-group" id="cliente">
                <select class="form-control" name="cliente" id="">
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->cuit_cuil}}">{{$cliente->apellido}}, {{$cliente->nombre}}</option>
            @endforeach
                </select>
            </div>  
            <button type="submit" class="btn btn-default btn-primary">Enviar</button>
        </form>

        </div>
        <div class="col-md-4 ">
        <h3>Posiciones ocupadas del cliente</h3>
        

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
    autoclose: true,
    format: "yyyy-mm-dd",
    defaultViewDate: { year: 2000, month: 01, day: 01 }
});
 </script>
@endsection
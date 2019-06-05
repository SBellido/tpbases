@extends('plantillabase')
@section('instituciones')
            <div class="content">
                <div class="m-b-md">
                <h2>instituciones</h2>

                    <ul>
                        @foreach ($instituciones as $institucion)
                            <li>{{$institucion->nombre_institucion}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
@endsection

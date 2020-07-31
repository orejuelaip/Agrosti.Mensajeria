@extends('app')
@section('contenido')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                Mensajes por asunto
            </div>
            <div class="col-2">
                <a href="/" class="btn btn-success btn-large" >Regresar</a>

            </div>
        </div>

      </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="tblMensajes" class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>Asunto</th>
                            <th>Cantidad</th>
                            <th>porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($info as $value)
                            <tr>
                                <td>{{ $value->desc}}</td>
                                <td>{{ $value->Total}}</td> 
                                <td>{{ $value->porcentaje}}</td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>



@endsection
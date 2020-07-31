@extends('app')


@section('contenido')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8">
                Mensaje
            </div>
            <div class="col-2">
                <a href="/Mensajeria/Cantidad" class="btn btn-primary btn-large" >Ver por asunto</a>

            </div>
            <div class="col-2">
                <a href="/Mensajeria/Crear" class="btn btn-success btn-large" >Crear</a>

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
                <table id="tblMensajes" class="table ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha</th>
                            <th>Mensaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mensajeria as $value)
                            <tr>
                                <td>{{ $value->fromName}}</td>
                                <td>{{ $value->fromEmail}}</td>
                                <td>{{ $value->date}}</td>
                                <td>{{ $value->body}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>


<script>
    $(document).ready(function(){

        $('#tblMensajes').DataTable(
            {
                "order": [[ 2, "desc" ]]
            }
        );

    })
</script>
@endsection
@extends('app')


@section('contenido')
  
    <form id="FormMensaje" action="/Mensajeria/Guardar" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <h4 class="text-center">Enviar Mensajes</h4>
            </div>
        </div>
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="fromName">Nombre</label>
                <input type="text" name="fromName" id="fromName" class="form-control" placeholder="Ingresar nombre"/>
            </div>

        </div>
        <div class="row">
            <div class="form-group col">
                <label for="fromEmail">Email</label>
                <input type="email" name="fromEmail" id="fromEmail" class="form-control" placeholder="Ingresar email"/>
            </div>
         
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="subjectId">Asunto</label>
                <select name="subjectId" id="subjectId" class="form-control">
                    <option value="0">Seleccione...</option>
                    @foreach ($subjects as $value)
                        <option value="{{ $value->id}}">{{ $value->desc}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="">Mensaje</label>
                <textarea name="body" id="body" cols="20" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="footer">
            <button name="Guardar" id="Guardar" class="btn btn-success ">Guardar</button>
            <a href="/" name="Cancelar" class="btn btn-primary ">Cancelar</a>
        </div>
    </form>


    <script>


        (function (){

            const ctrl ={
                fromName: $('#fromName'),
                fromEmail: $('#fromEmail'),
                subjectId: $('#subjectId'),
                body: $('#body'),
                Guardar: $('#Guardar'),
                FormMensaje:$('#FormMensaje'),
                modallg:$('#modallg')
            }

            var inicio ={
                Init:function(){
                    this.Eventos.Init();
                },
                Eventos:{
                    Init:function (){
                        this.Click();
                    },
                    Click:function(){
                        ctrl.FormMensaje.submit(function(event){
                            var mensaje = inicio.ValidarFormulario();
                            if (mensaje.length!= 0) {
                                
                                $('#modallg').modal('show');
                                $('#modallg .modal-body').html(
                                    `<div class="alert alert-danger" role="alert">  ${mensaje}  </div>`
                                );
                                $('#modallg .modal-title').html("Alerta");
                                return false;
                            }
                        });
                    }

                },
                ValidarFormulario:function(){
                    var mensaje ="";
                    if (ctrl.fromEmail.val()=="") {
                        mensaje +="Debe indicar un email.<br/>";
                    }

                    if (ctrl.fromName.val()=="") {
                        mensaje +="Debe indicar un nombre. <br/>";
                    }

                    if (ctrl.subjectId.val()=="0") {
                        mensaje +="Debe indicar un asunto. <br/>";
                    }

                    if (ctrl.body.val()=="") {
                        mensaje +="Debe indicar un mensaje. <br/>";
                    }

                    return mensaje;

                }
            }


            $(document).ready(function (){
                inicio.Init();
            });
        }());
     
    </script>



<div id="modallg" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
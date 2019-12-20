<script>
        var action=1;
        var formValue=0;
        $(function () {
            $("#solicitudTable").DataTable();
        });

        function getUbicaciones($select,$ubicacion_id){
            console.log($ubicacion_id);
            var xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    console.log(JSON.parse(this.responseText));
                    var select=document.getElementById($select);
                    var length = select.options.length;
                    for (i = length-1; i >= 1; i--) {
                    select.options[i] = null;
                    }   
                    var data = JSON.parse(this.responseText);
                    data.forEach(function (item) {
                        var option = document.createElement("option");
                        option.text = item.nombre;
                        option.value =item.id;
                        select.add(option);
                    });
                }
            };
            xhttp.open('GET', '/getUbicaciones/' + $ubicacion_id, true);
            xhttp.send();
        }

        var inputs=document.querySelectorAll('input:not([type="submit"])');
        var flag=true;
        var submit = document.getElementById('btn');
        console.log('prueba de submit')
        console.log(inputs);
        for (var i=0;i<inputs.length;i++){
            inputs[i].addEventListener('keyup',function () {
                validate(this);
            });
        }

        submit.addEventListener('click', function() {
            for (var i = 0; i < inputs.length; i++) {
                validate(inputs[i]);
            }
        });

        function formulario(num){
        formValue= num;
            if (formValue == "form280") {
                $("#form280").show();
                $("#form701").hide();
            }
            if (formValue == "form701") {
                $("#form280").hide();
                $("#form701").show();
            }
            if (formValue == "0") {
                $("#form280").hide();
                $("#form701").hide();
            }
        }

        function departamento(num){
            
        }

        function validate(input){
            switch (input.id) {
                case 'registrador_id':
                        input.className='form-control is-valid';
                        flag=true;
                    break;
                case 'nro_hectareas':
                    if(input.value.match(/[0-9]+$/)){
                        input.className='form-control is-valid';
                        flag=true;
                    }else{
                        flag=false;
                        input.className='form-control is-invalid';
                    }
                    break;
                case 'nro_orden':
                if(input.value.match(/[0-9]+$/)){
                    input.className='form-control is-valid';
                    flag=true;
                }else{
                    flag=false;
                    input.className='form-control is-invalid';
                }
                break;
                default:
                    if(input.value.match(/[0-9]+$/)){
                        input.className='form-control is-valid';
                        flag=true;
                    }else{
                        flag=false;
                        input.className='form-control is-invalid';
                    }
                    break;
            }
            validateSubmit();
        }
        function validateSubmit(){
            if(flag===false) {
                submit.style.display='none';
            }else{
                submit.style.display='inline';
            }
        }
        var _iMethod='';
        $('#new').click(function () {
            $('.select2').select2()
            action=1;
            var form= document.getElementById('userForm');
            form.action='{{route('solicitudes.store')}}';
            form.method='post';
            var inputMethod=document.getElementsByName('_method');
            for(var i=0;i<inputMethod.length;i++){
                if(inputMethod[i].value==='PUT'){
                    _iMethod=inputMethod[i];
                    inputMethod[i].value='POST';
                }
            }
            document.getElementById('htitle').innerText='Nueva Solicitud';
            document.getElementById('btn').innerText='Guardar'

        });

        function editar($solicitud){
            $('.select2').select2()
            console.log($solicitud);
            action=2;
            var form= document.getElementById('userForm');
            // var formSolicitud= document.getElementById('userForm');
            form.action='{{route('solicitudes.update',0)}}';
            form.method='post';
            //if(_iMethod.toString().length>0){
            _iMethod.value='PUT';
            console.log(_iMethod.value);
            //}
            $('#edit').modal('show');
            document.getElementById('htitle').innerText='Editar Solicitud';
            document.getElementById('btn').innerText='Editar';
            $('#edit').find('.modal-body #actividad_id').val($solicitud.actividad_id);
            $('#edit').find('.modal-body #cliente_id').val($solicitud.cliente_id);
            $('#edit').find('.modal-body #registrador_id').val($solicitud.registrador_id);
            $('#edit').find('.modal-body #ubicacion_id').val($solicitud.ubicacion_id);
            $('#edit').find('.modal-body #tipo_solicitud').val($solicitud.tipo_solicitud);
            $('#edit').find('.modal-body #nro_orden').val($solicitud.nro_orden);
            $('#edit').find('.modal-body #gestion').val($solicitud.gestion);
            $('#edit').find('.modal-body #nro_hectareas').val($solicitud.nro_hectareas);
            $('#edit').find('.modal-body #fecha_solicitud').val($solicitud.fecha_solicitud);
            $('#edit').find('.modal-body #fecha_finalizacion').val($solicitud.fecha_finalizacion);

            $('#edit').find('.modal-body #nit_dependencia').val($solicitud.nit_dependencia);
            $('#edit').find('.modal-body #nro_documento').val($solicitud.nro_documento);
            $('#edit').find('.modal-body #nro_boletapago').val($solicitud.nro_boletapago);
            $('#edit').find('.modal-body #documento_empresa').val($solicitud.documento_empresa);
            $('#edit').find('.modal-body #nro_titulopropiedad1').val($solicitud.nro_titulopropiedad1);

            $('#edit').find('.modal-body #ddjj_original').val($solicitud.ddjj_original);
            $('#edit').find('.modal-body #folio').val($solicitud.folio);
            $('#edit').find('.modal-body #nro_titulopropiedad').val($solicitud.nro_titulopropiedad);

            $('#edit').find('.modal-body #id').val($solicitud.id);
        }
    </script>

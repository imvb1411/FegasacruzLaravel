<script>
        var action=1;
        $(function () {
            $("#planoTable").DataTable();
        });
        var inputs=document.querySelectorAll('input:not([type="submit"])');
        var flag=true;
        var submit = document.getElementById('btn');
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

        function validate(input){
            switch (input.id) {
                case 'descripcion':
                    if(input.value.match(/[a-z0-9._%+-]*$/)){
                        input.className='form-control is-valid';
                        flag=true;
                    }else{
                        flag=false;
                        input.className='form-control is-invalid';
                    }
                    break;
                default:
                    if(input.value.match(/^[A-Za-z\s]*$/)){
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
            action=1;
            var form= document.getElementById('userForm');
            form.action='{{route('planos.store')}}';
            form.method='post';
            form.enctype="multipart/form-data";
            var inputMethod=document.getElementsByName('_method');

            for(var i=0;i<inputMethod.length;i++){
                if(inputMethod[i].value==='PUT'){
                    _iMethod=inputMethod[i];
                    inputMethod[i].value='POST';
                }
            }
            document.getElementById('htitle').innerText='Nuevo Plano';
            document.getElementById('btn').innerText='Guardar'

        });

        function editar($plano){
            console.log($plano.solicitud_id);
            action=2;
            var form= document.getElementById('userForm');
            form.action='{{route('planos.update',0)}}';
            form.method='post';
            // form.files='true';
            form.enctype="multipart/form-data";
            //if(_iMethod.toString().length>0){
            _iMethod.value='PUT';
            // console.log(_iMethod.value);
            //}
            $('#edit').modal('show');
            document.getElementById('htitle').innerText='Editar plano';
            document.getElementById('btn').innerText='Editar';
            $('#edit').find('.modal-body #descripcion').val($plano.descripcion);
            $('#edit').find('.modal-body #solicitud_id').val($plano.solicitud_id);
            $('#edit').find('.modal-body #id').val($plano.id);
        }
    </script>

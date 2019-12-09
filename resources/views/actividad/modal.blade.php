<script>
    var action=1;
    $(function () {
        $("#clientTable").DataTable();
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
            case 'descrpcion':
                if(input.value.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)){
                    input.className='form-control is-valid';
                    flag=true;
                }else{
                    flag=false;
                    input.className='form-control is-invalid';
                }
                break;
            case 'nombre':
                if(input.value.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/)){

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

        var form= document.getElementById('ubicacionForm');
        form.action='{{route('ubicacion.store')}}';
        form.method='post';
        var inputMethod=document.getElementsByName('_method');


        var form= document.getElementById('userForm');
        form.action='{{route('actividad.store')}}';
        form.method='post';
        var inputMethod=document.getElementsByName('_method');

        for(var i=0;i<inputMethod.length;i++){
            if(inputMethod[i].value==='PUT'){
                _iMethod=inputMethod[i];
                inputMethod[i].value='POST';
            }
        }

        document.getElementById('htitle').innerText='Nueva Ubicacion';
        document.getElementById('btn').innerText='Guardar'

    });

    function changeTipo() {
        var x = document.getElementById("tipo").value;
        if (x==1){
            document.getElementById("divDep").style.display = "none";
        }else{
            document.getElementById("divDep").style.display = "block";
        }
        document.getElementById('htitle').innerText='Nueva Actividad';
        document.getElementById('btn').innerText='Guardar'
    }
    function editar($actividad) {
        console.log($actividad);
        action = 2;
        var form = document.getElementById('actividadForm');
        form.action = '{{route('actividad.update',0)}}';
        form.method = 'post';
        //if(_iMethod.toString().length>0){
        _iMethod.value = 'PUT';
        console.log(_iMethod.value);
        //}
        $('#edit').modal('show');
        document.getElementById('htitle').innerText = 'Editar Actividad';
        document.getElementById('btn').innerText = 'Editar';
        $('#edit').find('.modal-body #codigo').val($actividad.codigo);
        $('#edit').find('.modal-body #nombre').val($actividad.nombre);
        $('#edit').find('.modal-body #descripcion').val($actividad.descripcion);
        $('#edit').find('.modal-body #id').val($actividad.id);
    }
</script>

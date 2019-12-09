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
            case 'nombre':
                if(input.value.match(/^[A-Za-z\s]*$/)){
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

        for(var i=0;i<inputMethod.length;i++){
            if(inputMethod[i].value==='PUT'){
                _iMethod=inputMethod[i];
                inputMethod[i].value='POST';
            }
        }
        document.getElementById('htitle').innerText='Nueva Ubicacion';
        document.getElementById('btn').innerText='Guardar'

    });

    function editar($ubicacion){
        action=2;
        var form= document.getElementById('ubicacionForm');
        form.action='{{route('ubicacion.update',0)}}';
        form.method='post';
        //if(_iMethod.toString().length>0){
        _iMethod.value='PUT';
        console.log(_iMethod.value);
        console.log($ubicacion);
        //}
        $('#edit').modal('show');
        document.getElementById('htitle').innerText='Editar Ubicacion';
        document.getElementById('btn').innerText='Editar';
        $('#edit').find('.modal-body #id').val($ubicacion.id);
        $('#edit').find('.modal-body #ubicacion_id').val($ubicacion.ubicacion_id);
        $('#edit').find('.modal-body #nombre').val($ubicacion.nombre);
        $('#edit').find('.modal-body #tipo').val($ubicacion.tipo);
    }
    function changeTipo() {
        var x = document.getElementById("tipo").value;
        if (x==1){
            document.getElementById("divDep").style.display = "none";
        }else{
            document.getElementById("divDep").style.display = "block";
        }
    }
</script>

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
            case 'ci':
                if(input.value.match(/^[0-9]+$/)){
                    input.className='form-control is-valid';
                    flag=true;
                }else{
                    flag=false;
                    input.className='form-control is-invalid';
                }
                break;
            case 'telefono':
                if(input.value.match(/^[0-9]+$/)){
                    input.className='form-control is-valid';
                    flag=true;
                }else{
                    flag=false;
                    input.className='form-control is-invalid';
                }
                break;
            case 'email':
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
        var form= document.getElementById('userForm');
        form.action='{{route('clientes.store')}}';
        form.method='post';
        var inputMethod=document.getElementsByName('_method');

        for(var i=0;i<inputMethod.length;i++){
            if(inputMethod[i].value==='PUT'){
                _iMethod=inputMethod[i];
                inputMethod[i].value='POST';
            }
        }
        document.getElementById('htitle').innerText='Nuevo Cliente';
        document.getElementById('btn').innerText='Guardar'

    });

    function editar($cliente){
        console.log($cliente);
        action=2;
        var form= document.getElementById('userForm');
        form.action='{{route('clientes.update',0)}}';
        form.method='post';
        //if(_iMethod.toString().length>0){
        _iMethod.value='PUT';
        console.log(_iMethod.value);
        //}
        $('#edit').modal('show');
        document.getElementById('htitle').innerText='Editar Cliente';
        document.getElementById('btn').innerText='Editar';
        $('#edit').find('.modal-body #ci').val($cliente.ci);
        $('#edit').find('.modal-body #nombre').val($cliente.nombre);
        $('#edit').find('.modal-body #apellido_pat').val($cliente.apellido_pat);
        $('#edit').find('.modal-body #apellido_mat').val($cliente.apellido_mat);
        $('#edit').find('.modal-body #telefono').val($cliente.telefono);
        $('#edit').find('.modal-body #email').val($cliente.email);
        $('#edit').find('.modal-body #id').val($cliente.id);
    }

    // $('#edit').on('show.bs.modal',function(event){
    //     if(action===2) {
    //         var button = $(event.relatedTarget);
    //         var id = button.data('idcliente');
    //         alert(id);
    //         var ci = button.data('ci');
    //         var nombre = button.data('nombre');
    //         var apellido_pat = button.data('apellido_pat');
    //         var apellido_mat = button.data('apellido_mat');
    //         var telefono = button.data('telefono');
    //         var email = button.data('email');
    //         var modal = $(this);
    //         modal.find('.modal-body #ci').val(ci);
    //         modal.find('.modal-body #nombre').val(nombre);
    //         modal.find('.modal-body #apellido_pat').val(apellido_pat);
    //         modal.find('.modal-body #apellido_mat').val(apellido_mat);
    //         modal.find('.modal-body #telefono').val(telefono);
    //         modal.find('.modal-body #email').val(email);
    //         modal.find('modal-body $id').val(id);
    //     }
    // });
</script>
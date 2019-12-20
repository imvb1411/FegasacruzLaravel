<script>
    var action=1;
    $(function () {
        $("#personalTable").DataTable();
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
            case 'password':
                if(input.value.match(/^[a-zA-Z0-9]+$/)){
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
        form.action='{{route('users.store')}}';
        form.method='post';
        var inputMethod=document.getElementsByName('_method');

        for(var i=0;i<inputMethod.length;i++){
            if(inputMethod[i].value==='PUT'){
                _iMethod=inputMethod[i];
                inputMethod[i].value='POST';
            }
        }
        document.getElementById('htitle').innerText='Nuevo Usuario-Personal';
        document.getElementById('btn').innerText='Guardar'

    });

    function editPersonalClick($personal){
        console.log($personal);
        action=2;
        var form= document.getElementById('userForm');
        form.action='{{route('users.update',0)}}';
        form.method='post';
        document.getElementById('htitle').innerText='Editar Personal';
        document.getElementById('btn').innerText='Editar';
        var id = $personal.id;
        var ci = $personal.persona.ci;
        var nombre = $personal.persona.nombre;
        var apellido_pat = $personal.persona.apellido_pat;
        var apellido_mat = $personal.persona.apellido_mat;
        var telefono = $personal.persona.telefono;
        var email = $personal.persona.email;
        var modal = $('#editPersonal');
        modal.modal('show');
        modal.find('.modal-body #ci').val(ci);
        modal.find('.modal-body #nombre').val(nombre);
        modal.find('.modal-body #apellido_pat').val(apellido_pat);
        modal.find('.modal-body #apellido_mat').val(apellido_mat);
        modal.find('.modal-body #telefono').val(telefono);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #nick').val($personal.nick);
        modal.find('.modal-body #role').val($personal.rol);
        modal.find('.modal-body #id').val(id);
    }

</script>
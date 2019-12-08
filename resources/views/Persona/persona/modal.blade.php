<script>
    var action=1;
    $(function () {
        $("#userTable").DataTable();
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
            case 'password':
                if(!input.value.match(/[\!\@\#\$\%\^\&\*]/g) &&input.value.length>=3){
                    input.className='form-control is-valid';
                    flag=true;
                }else{
                    flag=false;
                    input.className='form-control is-invalid';
                }
                break;
            case 'nick':
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
        document.getElementById('htitle').innerText='Nuevo usuario';
        document.getElementById('btn').innerText='Guardar'

    });

    function editClick(){
        action=2;
        var form= document.getElementById('userForm');
        form.action='{{route('users.update',0)}}';
        form.method='post';
        //if(_iMethod.toString().length>0){
        _iMethod.value='PUT';
        console.log(_iMethod.value);
        //}
        document.getElementById('htitle').innerText='Editar usuario';
        document.getElementById('btn').innerText='Editar';
    }

    $('#edit').on('show.bs.modal',function(event){
        if(action===2) {
            var button = $(event.relatedTarget);
            var iduser = button.data('iduser');
            var personid = button.data('personid');
            var nick = button.data('nick');
            var password = button.data('password');
            var fullname=button.data('name');
            var modal = $(this);
            modal.find('.modal-body #iduser').val(iduser);
            modal.find('.modal-body #nick').val(nick);
            modal.find('.modal-body #personid').val(personid);
            modal.find('.modal-body #password').val(password);
            $("#personid").children('option:first').remove();
            $("#personid").append(new Option(fullname, personid));
        }else{
            var modal = $(this);
            modal.find('.modal-body #iduser').val('');
            modal.find('.modal-body #nick').val('');
            modal.find('.modal-body #password').val('');
        }
    })
</script>
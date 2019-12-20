<script>
    var action=1;
    $(function () {
        $("#ubicacionTable").DataTable();
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
        //$('#edit').find('.modal-body #ubicacion_id').val($ubicacion.ubicacion_id);
        $('#edit').find('.modal-body #nombre').val($ubicacion.nombre);
        $('#edit').find('.modal-body #tipo').val($ubicacion.tipo);
    }

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
            var base_url={!! json_encode(url('/')) !!};
            console.log({!! json_encode(url('/')) !!});
            xhttp.open('GET', base_url+'/getUbicaciones/' + $ubicacion_id, true);
            xhttp.send();
        }
    
    function changeTipo() {
        var x = document.getElementById("tipo").value;
        if (x==1){
            document.getElementById("divDep").style.display = "none";
        }else if (x==2){            
            document.getElementById("divDep").style.display = "block";
            document.getElementById("divProv").style.display = "none";
            document.getElementById("divMun").style.display = "none";
            document.getElementById("divZon").style.display = "none";
            document.getElementById("divSub").style.display = "none";
        }else if (x==3){
            document.getElementById("divDep").style.display = "block";
            document.getElementById("divProv").style.display = "block";
            document.getElementById("divMun").style.display = "none";
            document.getElementById("divZon").style.display = "none";
            document.getElementById("divSub").style.display = "none";
        }else if (x==4){
            document.getElementById("divDep").style.display = "block";
            document.getElementById("divProv").style.display = "block";
            document.getElementById("divMun").style.display = "block";
            document.getElementById("divZon").style.display = "none";
            document.getElementById("divSub").style.display = "none";
        }else if (x==5){
            document.getElementById("divDep").style.display = "block";
            document.getElementById("divProv").style.display = "block";
            document.getElementById("divMun").style.display = "block";
            document.getElementById("divZon").style.display = "block";
            document.getElementById("divSub").style.display = "none";
        }else if (x==6){
            document.getElementById("divDep").style.display = "block";
            document.getElementById("divProv").style.display = "block";
            document.getElementById("divMun").style.display = "block";
            document.getElementById("divZon").style.display = "block";
            document.getElementById("divSub").style.display = "block";
        }
    }
</script>

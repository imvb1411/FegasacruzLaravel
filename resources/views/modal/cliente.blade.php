<script>
        
    /*EDITAR CATEGORIA EN VENTANA MODAL*/
    $('#abrirmodalEditar').on('show.bs.modal', function (event) {
   
   //console.log('modal abierto');
   
   var button = $(event.relatedTarget) 
   var ci_modal_editar = button.data('ci')
   var nombre_modal_editar = button.data('nombre')
   var apellido_pat_modal_editar = button.data('apellido_pat')
   var apellido_mat_modal_editar = button.data('apellido_mat')
   var telefono_modal_editar = button.data('telefono')
   var email_modal_editar = button.data('email')
   var id = button.data('id')
   var modal = $(this)
   // modal.find('.modal-title').text('New message to ' + recipient)
   // ubicara al archivo index.blade.php de categoria a la clase que tenga modal-body 
   // y que tenga el id nombre despues el val hace referencia a las variables de este mismo archivo
   modal.find('.modal-body #ci').val(ci_modal_editar);
   modal.find('.modal-body #nombre').val(nombre_modal_editar);
   modal.find('.modal-body #apellido_pat').val(apellido_pat_modal_editar);
   modal.find('.modal-body #apellido_mat').val(apellido_mat_modal_editar);
   modal.find('.modal-body #telefono').val(telefono_modal_editar);
   modal.find('.modal-body #email').val(email_modal_editar);
   modal.find('.modal-body #id').val(id);
   })
</script>
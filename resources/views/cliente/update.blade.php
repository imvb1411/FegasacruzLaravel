<div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        
            <div class="modal-body">
              
                

                <form action="{{route('cliente.update','test')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{method_field('patch')}}
                    {{-- para evitar ataques --}}
                    {{csrf_field()}}

                    <input type="hidden" id="id" name="id" value=" ">

                    {{-- para incluir el formulario --}}
                    @include('cliente.form')


                </form>
            </div>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
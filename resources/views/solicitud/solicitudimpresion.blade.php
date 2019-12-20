<div >
   <input type="hidden" name="id" id="id" class="form-control">
   <h2 align="center">FORMULARIO 280V.3 SOLICITUD DE CERTIFICADO DE NO IMPONIBILIDAD RAU</h2><br/>
   <h3 align="center">DECLARACION JURADA</h3><br/>
   <h4 align="center">R-1102</h4><br/><br/><br/>
   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">NRO DE ORDEN: </label>
           <u>  <em> {{$solicitud->nro_orden}}</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">NIT - DEPENDENCIA OPERATIVA: </label>
               <u>  <em> {{$solicitud280->nit_dependencia}} </em> </u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">NRO DE DOCUMENTO IDENTIFICACION: </label>
           <u>  <em> {{$solicitud280->nro_documento}}</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">GESTION: </label>
               <u>  <em> {{$solicitud->gestion}}</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-12">
           <label class="form-control-label" for="cliente_id">NOMBRES Y APELLIDOS: </label>
           <u>  <em> {{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}</em></u>
       </div>
   </div>
   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">NRO DE TELEFONO FIJO: </label>
           <u>  <em> {{$solicitud->cliente->telefono}}</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">EMAIL: </label>
               <u>  <em> {{$solicitud->cliente->email}}</em></u>
       </div>
   </div>
   <br>
   <h3 align="center">UBICACION E IDENTIFICACION DEL PREDIO</h3><br/><br>
   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">DEPARTAMENTO: </label>
           <u>  <em> SANTA CRUZ </em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">N° TITULO DE PROPIEDAD/ OTRO DOCUMENTO: </label>
               <u>  <em> {{$solicitud280->nro_titulopropiedad}}</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">PROVINCIA: </label>
           <u>  <em> WARNES</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">MUNICIPIO: </label>
           <u>  <em> WARENES</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-12">
           <label class="form-control-label" for="cliente_id">DOCUMENTO PRESENTADO A LA EMPRESA: </label>
           <u>  <em>{{$solicitud280->documento_empresa}}</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">ZONA: </label>
           <u>  <em>SUBTROPICAL</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">ACTIVIDAD: </label>
               <u>  <em>{{$solicitud->actividad->nombre}}</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">SUBZONA: </label>
           <u>  <em>SUBTROPICAL</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">ACTIVIDAD: </label>
               <u>  <em>{{$solicitud->actividad->descripcion}}</em></u>
       </div>
   </div>

   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">SITIO: </label>
           <u>  <em>SANTA CRUZ</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">EXTENSION HECTAREAS DE NO IMPONIBILIDAD: </label>
               <u>  <em>{{$solicitud->nro_hectareas}}</em></u>
       </div>
   </div>
   <br>
   <h3>PRESENTE DECLARACION</h3>
   <br>
   <div class="form-group row">
       <div class="col-md-6">
           <label class="form-control-label" for="cliente_id">LUGAR Y FECHA DE SOLICITUD: </label>
           <u>  <em>SANTA CRUZ, {{$solicitud->fecha_solicitud}}</em></u>
       </div>
       <div class="col-md-6">
               <label class="form-control-label" for="registrador_id">N° ORDEN DE BOLETA DE PAGO: </label>
               <u>  <em>{{$solicitud280->nro_boletapago}}</em></u>
       </div>
   </div>
</div>
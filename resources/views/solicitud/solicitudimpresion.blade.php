<div >
    <input type="hidden" name="id" id="id" class="form-control">
    <h2 align="right">FORMULARIO 280V.3 SOLICITUD DE CERTIFICADO DE NO IMPONIBILIDAD RAU</h2>
    <h3 align="right">DECLARACION JURADA</h3>
    <h6 align="right">FORMULARIO GRATUITO</h6>
    <h6 align="right">R-1102</h6><br/>
    <div class="container">
    <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">NRO DE ORDEN:</td>
            <td style="border: solid" align="center" width="25%">{{$solicitud->nro_orden}}</td>                        
            <td style="border: hidden">NIT - DEPENDENCIA OPERATIVA:</td>
            <td style="border: solid" align="center" width="25%">{{$solicitud280->nit_dependencia}}</td>
         </tr>      
      </table>

      <br>   
      <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">NRO DE DOCUMENTO IDENTIFICACION:</td>
            <td style="border: solid" align="center" width="25%">{{$solicitud280->nro_documento}}</td>                            
            <td style="border: hidden">GESTION:</td>
            <td style="border: solid" align="center" width="25%">{{$solicitud->gestion}}</td>
         </tr>
      </table>
      <br>   
      <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">NOMBRES Y APELLIDOS:</td>
            <td style="border: solid" align="center">{{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}</td>                         
         </tr>
      </table>

    <br>
    <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">DEPARTAMENTO:</td> 
            <td style="border: solid" align="center">SANTA CRUZ</td>   
            <td style="border: hidden">N° TITULO DE PROPIEDAD/ OTRO DOCUMENTO: </td>
            <td style="border: solid" align="center">{{$solicitud280->nro_titulopropiedad}}</td>                         
         </tr>
      </table>
      <br>   
      <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">PROVINCIA:</td>
            <td style="border: solid" align="center">WARNES</td>        
         </tr><br>   
         <tr >
            <td style="border: hidden">MUNICIPIO:</td>
            <td style="border: solid" align="center">WARNES</td>                         
         </tr><br>   
         <tr>
            <td style="border: hidden">DOCUMENTO PRESENTADO A LA EMPRESA:</td>
            <td style="border: solid" align="center">{{$solicitud->titulo->descripcion}}</td>                         
         </tr>
      </table>
      <br>   

      <table width = "100%" height = "150">
         <tr>
            <td style="border: hidden">ZONA:</td>
            <td style="border: solid" align="center">SUBTROPICAL</td>                           
            <td style="border: hidden">ACTIVIDAD:</td>
            <td style="border: solid" align="center">{{$solicitud->actividad->nombre}}</td>
         </tr>                
      </table>
    <br>   
    <table width = "100%" height = "150">
      <tr>
            <td style="border: hidden">SUBZONA:</td>
            <td style="border: solid" align="center">SUBTROPICAL</td>                           
            <td style="border: hidden">DESCRIPCION DE LA ACTIVIDAD:</td>
            <td style="border: solid" align="center">{{$solicitud->actividad->descripcion}}</td>
         </tr>
      </table>
      <br>   
    <table width = "100%" height = "150">
    <tr>
            <td style="border: hidden">SITIO:</td>
            <td style="border: solid" align="center">SANTA CRUZ</td>                           
            <td style="border: hidden">EXTENSION HECTAREAS DE NO IMPONIBILIDAD:</td>
            <td style="border: solid" align="center"> {{$solicitud->nro_hectareas}}</td>
         </tr>
      </table>
    <br>   
    <h2>PRESENTE DECLARACION</h2>
    <br>
    <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label" for="cliente_id">LUGAR Y FECHA DE SOLICITUD: {{$solicitud->fecha_solicitud}}</label>
        </div>
        <div class="col-md-6">
                <label class="form-control-label" for="registrador_id">N° ORDEN DE BOLETA DE PAGO: {{$solicitud280->nro_boletapago}}</label>
        </div>
    </div>
</div>
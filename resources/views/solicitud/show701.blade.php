@extends('layouts.master')
@section('title', 'Solicitud 701')
    @section('header-title','Vista de Consulta')
    @section('header-content')
    <div class="row">
        <div class="col-3">
        <a href="{{URL::action('SolicitudController@print',$solicitud->id)}}" class="btn btn-warning">Imprimir</a>
        </div>
    </div>
@endsection
@section('vistas')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12 float-sm-right">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="far fa-flag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Visitas</span>
                    {{-- <span class="info-box-number">{{$view->vistas}}</span> --}}
                    <span class="info-box-number">total</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <input type="hidden" name="id" id="id" class="form-control">
    <h2 class="text-center">REGIMEN AGROPECUARIO UNIFICADO</h2><br/>
    <h3 class="text-center">FORMULARIO 701V.3</h3><br/>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-9">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NOMBRE(S) Y APELLIDO(S) O RAZON SOCIAL DEL CONTRIBUYENTE
                            </div>
                        </div>
                        <div class="card-body">
                            {{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NUMERO DE ORDEN
                            </div>
                        </div>
                        <div class="card-body">
                            {{$solicitud->nro_orden}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        NIT
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{$solicitud->cliente->ci}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        GESTION
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{$solicitud->gestion}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="bg-secondary color-palette">
                                    <div class="card-header">
                                        DD.JJ.ORIGINAL
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row"><code>Cod <br> 534</code> </div>
                                         
                                        </div>
                                        <div class="col-8 row">
                                            {{$solicitud701->ddjj_original}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                FOLIO
                            </div>
                        </div>
                        <div class="card-body">
                            {{$solicitud701->folio}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
    <br>
    <h3>DATOS BASICOS DE LA DECLARACION JURADA QUE RECTIFICA</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                NUMERO DE RESOLUCION ADMINISTRATIVA
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                 <div class="row"><code>Cod <br> 518</code> </div> 
                                </div>
                                <div class="col-10">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                FORMULARIO
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row"><code>Cod <br> 537</code> </div>
                                 
                                </div>
                                <div class="col-8 row">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                               VERSIÓN
                            </div>
                        </div>
                        <div class="card-body">
                            1.0
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                N° DE ORDEN
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row"><code>Cod <br> 521</code> </div>
                                 
                                </div>
                                <div class="col-8 row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <h3>INFORMACION DE PROPIEDAD</h3>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-secondary color-palette">
                            <div class="card-header">
                                N° DE TITULO DE PROPIEDAD
                            </div>
                        </div>
                        <div class="card-body">
                            {{$solicitud701->nro_titulopropiedad}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette col-11">
                                <div class="card-header">
                                    ZONA
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{$solicitud->ubicacion->nombre}}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette col-11">
                                <div class="card-header">
                                   SUBZONA
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            SANTA CRUZ
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <div class="bg-secondary color-palette">
                                <div class="card-header">
                                    COD. MUNICIPIO
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            71127
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rubro 1 (ID)
                </div>
                <div class="card-header">
                    Nombre Rubro
                </div>
                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette">
                                   1
                                </td>
                                <td class="text-center">
                                    Propiedad Agricola
                                </td>
                                <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 013
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">Extension total del predio segun titulo de propiedad, expendiente de dotacion o consolidacion <br> <br></div></div>
                                        {{$solicitud701->clienteSolicitud[0]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 026
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12"> Area no Aprovechable <br> <br></div></div>
                                        {{$solicitud701->clienteSolicitud[1]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 070
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">ALICUOTA (En Bolivianos) <br></div></div>
                                        {{$solicitud701->clienteSolicitud[2]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 043
                                 </td>
                                 <td  class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">  IMPORTE TOTAL DEL ___ (Cod.013 - Cod 026) * Cod 043<br></div></div>
                                        {{$solicitud701->clienteSolicitud[3]->valor}}
                                    </div>
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette">
                                   2
                                </td>
                                <td class="text-center">
                                    Propiedad Pecuaria
                                </td>
                                <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 039
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">Extension total del predio segun titulo de propiedad, expendiente de dotacion o consolidacion <br> <br></div></div>
                                        {{$solicitud701->clienteSolicitud[4]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 042
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12"> Area no Aprovechable <br> <br></div></div>
                                        {{$solicitud701->clienteSolicitud[5]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 080
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">ALICUOTA (En Bolivianos) <br></div></div>
                                        {{$solicitud701->clienteSolicitud[6]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 055
                                 </td>
                                 <td  class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">  IMPORTE TOTAL DEL ___ (Cod.039 - Cod 055) * Cod 042<br></div></div>
                                        {{$solicitud701->clienteSolicitud[7]->valor}}
                                    </div>
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette">
                                   3
                                </td>
                                <td class="text-center" style="width: 20%">
                                    Otras propiedades(Dedicada a la Avicultura, Apicultura, Floricultura, Cunicultura, o Piscicultura)
                                </td>
                                <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 071
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">Extension total del predio segun titulo de propiedad, expendiente de dotacion o consolidacion <br> <br></div></div>
                                        {{$solicitud701->clienteSolicitud[8]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 090
                                 </td>
                                 <td class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">ALICUOTA (En Bolivianos) <br></div></div>
                                        {{$solicitud701->clienteSolicitud[9]->valor}}
                                    </div>
                                 </td>
                                 <td class="bg-secondary disabled color-palette">
                                    Cod. <br> 060
                                 </td>
                                 <td  class="text-center">
                                    <div class="col-12">
                                        <div class="row bg-info color-palette"> <div class="col-12">  IMPORTE TOTAL DEL ___ (Cod.039 - Cod 055) * Cod 042<br></div></div>
                                        {{$solicitud701->clienteSolicitud[10]->valor}}
                                    </div>
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rubro 2 (ID)
                </div>
                <div class="card-header">
                    DETERMINACION DEL SALDO
                </div>
                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   4
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Impuesto determinado (C043+C055+C060)
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    909
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[11]->valor}}
                                 </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                   5
                                </td>
                                <td style="width: 78%" class="bg-primary color-palette">
                                    Pagos a Cuenta Realizados en DD.JJ. y/o en Boletas de Pago correspondientes a la gestión que se declara
                                </td>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                    622
                                 </td>
                                 <td style="width: 18%" class="bg-primary color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[12]->valor}}
                                 </td>
                            </tr>

                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   6
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Saldo de Pagos a Cuenta del periodo anterior a compensar (C408 del Formulario del periodo anterior)
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    640
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[13]->valor}}
                                 </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                   7
                                </td>
                                <td style="width: 78%" class="bg-primary color-palette">
                                    Saldo a Favor del Contribuyente (C622+C640-909)
                                </td>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                    408
                                 </td>
                                 <td style="width: 18%" class="bg-primary color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[14]->valor}}
                                 </td>
                            </tr>

                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   8
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Saldo a Favor del Fisco(C909 - C622 - C640); Si >0
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    996
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[15]->valor}}
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rubro 3 (ID)
                </div>
                <div class="card-header">
                    DETERMINACION DE LA DEUDA TRIBUTARIA
                </div>
                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   9
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Tributo Omitido(C996)
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    924
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[16]->valor}}
                                 </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                   10
                                </td>
                                <td style="width: 78%" class="bg-primary color-palette">
                                    Actualizacion de Valor sobre el Tributo Omitido
                                </td>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                    925
                                 </td>
                                 <td style="width: 18%" class="bg-primary color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[17]->valor}}
                                 </td>
                            </tr>

                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   11
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Intereses sobre Tributo Omitido Actualizado
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    938
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[18]->valor}}
                                 </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                   12
                                </td>
                                <td style="width: 78%" class="bg-primary color-palette">
                                    Multa por incumplimiento al Deber Formal(IDF) por presentacion fuera de plazo
                                </td>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                    954
                                 </td>
                                 <td style="width: 18%" class="bg-primary color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[19]->valor}}
                                 </td>
                            </tr>

                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   13
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Total Deuda Tributaria (C924+C925+C938+C954; Si >0)
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    955
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[20]->valor}}
                                 </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Rubro 4 (ID)
                </div>
                <div class="card-header">
                    IMPORTE DE PAGO
                </div>
                <div class="row">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                   14
                                </td>
                                <td style="width: 78%" class="bg-primary disabled color-palette">
                                    Pago de valores (Sujeto a verificación y confirmación por el SIN)
                                </td>
                                <td class="bg-secondary disabled color-palette" style="width: 2%">
                                    577
                                 </td>
                                 <td style="width: 18%" class="bg-primary disabled color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[21]->valor}}
                                 </td>
                            </tr>
                            <tr>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                   15
                                </td>
                                <td style="width: 78%" class="bg-primary color-palette">
                                    Pago en Efectivo (C996 o C955); si > 0; según corresponda
                                </td>
                                <td class="bg-secondary color-palette" style="width: 2%">
                                    576
                                 </td>
                                 <td style="width: 18%" class="bg-primary color-palette text-center">
                                     {{$solicitud701->clienteSolicitud[22]->valor}}
                                 </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <SCRIPT>
		var a=document.getElementsByClassName("color1");
		for (var i=0; i<a.length; i++) a[i].className="bg-primary disabled color-palette";

        var b=document.getElementsByClassName("color2");
		for (var i=0; i<b.length; i++) b[i].className="bg-secondary disabled color-palette";
    </SCRIPT>
@endsection
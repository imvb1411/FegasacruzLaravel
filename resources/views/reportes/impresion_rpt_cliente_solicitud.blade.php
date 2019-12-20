
<!doctype html>
<html lang="en">
<div class="class">
<h1 align="center">REPORTE DE SOLICITUDES</h1>
<body>
<table id="solicitudTable" border="1" width="100%" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>PRODUCTOR</th>
                <th>NRO SOLICITUD</th>
                <th>ACTIVIDAD</th>
            </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{$solicitud->cliente->nombre}} {{$solicitud->cliente->apellido_pat}} {{$solicitud->cliente->apellido_mat}}</td>
                    <td>{{$solicitud->nro_orden}}</td>
                    <td>{{$solicitud->actividad->nombre}}</td>
                @endforeach
                </tr>
            </tbody>
</table>
</body>
</div>
</html>
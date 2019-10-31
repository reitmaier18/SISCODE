<!-- Modal para listar los expedientes -->
    <div class="modal fade" id="grafica_modal" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grafica Estadistica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="false">&times;</span>
            </div>
            <div class="modal-body">
                <div id="grafica">
                    
                </div>
            </div>
        
        </div>
    </div>
    </div>

    <script type="text/javascript">
        function grafica(exp, sol){
            expediente=parseInt(exp,10);
            solicitud=parseInt(sol,10);
            Highcharts.chart('grafica', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Gráfica de actividades'
            },
            xAxis: {
                categories: [
                    'Expedientes registrados',
                    'Solicitudes tramitadas'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de registros'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                //useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Registros',
                data: [expediente, solicitud]

            }]

        })
        }
    </script>
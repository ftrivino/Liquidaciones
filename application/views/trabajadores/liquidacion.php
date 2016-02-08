<script>
    var idusuario = <?php echo $idusuario ?>;
</script>
<div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Obtener liquidacion por mes</h1>
                
                <div class="container">
                    <div class="row">
                        <div class='col-sm-8'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="fecha" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    
                                    
                                </div>
                            </div><a href="javascript:;" class="btn btn-primary pull-right " onclick="ajax_liquidacion();">
                                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate ajax_liquidacion"></span>
                                Ver mes</a>
                            
                            
                        </div>
                        <script type="text/javascript">
                            $(function () {
                               
                                $('#datetimepicker2').datetimepicker({
                                    locale: 'es',
                                    viewMode: 'months',
                                    format: 'MM/YYYY'
                                });
                            });
                        </script>
                    </div>
                </div>
                
                <form method="post" action="#" enctype="multipart/form-data" id="form_liquidacion">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8" id="contenido_liquidacion_ajax">

                            </div>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div> <!-- /container -->
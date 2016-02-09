<script>
    var idusuario = <?php echo $idusuario ?>;
</script>
<div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Calendario</h1>
                
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
                            </div><a href="javascript:;" class="btn btn-primary pull-right " onclick="ajax_calendario();">
                                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate ajax_calendario"></span>
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
                
                <form method="post" action="#" enctype="multipart/form-data" id="form_calendario">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                    <input type="hidden" name="fecha_base" id="fecha_base"  value="">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8" id="contenido_calendario_ajax">

                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <p>&nbsp;</p>
                            <button type="button" class="btn btn-success pull-right boton-guardar-calendario" style="display: none;" onclick="ajax_guardar_calendario();">
                                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
                                Guardar</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> <!-- /container -->
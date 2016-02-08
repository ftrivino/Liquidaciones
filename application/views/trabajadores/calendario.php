    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Calendario</h1>
                
                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" id="fecha" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    
                                    
                                </div>
                            </div><a href="javascript:;" class="btn btn-primary pull-right" onclick="ajax_calendario();">Ver mes</a>
                            
                            
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
                
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" id="contenido_calendario_ajax">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> <!-- /container -->
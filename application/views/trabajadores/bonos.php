<script>
    var idusuario = <?php echo $trabajador ?>;
</script>
<div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Bonos</h1>
                
                <div class="container">
                    <form method="post" action="#" enctype="multipart/form-data" id="form_bonos" class="form-inline">
                        <div class="row" id="bonos">
                            <div class='col-sm-8'>
                                <div class="form-group">
                                    <label for="concepto">Concepto</label>
                                    <input type="text" class="form-control" id="concepto" placeholder="Cocepto" name="concepto[]">
                                </div>
                                <div class="form-group">
                                    <label for="monto">Monto</label>
                                    <input type="text" class="form-control" id="monto" placeholder="Monto" name="monto">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class='col-sm-8'>
                                <p>&nbsp;</p>
                            </div>
                            
                            <div class='col-sm-8'>
                                <button type="button" class="btn btn-success pull-right boton-guardar-bonos" onclick="ajax_guardar_bonos();">
                                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
                                Guardar</button>
                                
                                <button type="button" class="btn btn-primary boton-guardar-calendario" id="btn_agregar_bono">
                                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
                                Agregar bono</button>
                            </div>
                        </div>
                    </form>
                </div>
                           
            </div>
        </div>
    </div> <!-- /container -->
    
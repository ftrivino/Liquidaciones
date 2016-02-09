

    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Trabajadores - Nuevo trabajador</h1>
                <form method="post" enctype="multipart/form-data" action="/trabajadores/guardar">
                    <input type="hidden" name="dv" id="dv" />
                    <input type="hidden" name="rut2" id="rut2" />
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="rut">RUT</label>
                        <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut" onblur="" onkeyup="javascript:formatoRut(this.value, this.id)">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo">
                    </div>
                    <div class="form-group">
                        <label for="sueldo_liquido">Sueldo líquido</label>
                        <input type="text" class="form-control" id="sueldo_liquido" name="sueldo_liquido" placeholder="Sueldo líquido" onkeypress="return isNumberKey(event);">
                    </div>
                    <div class="form-group">
                        <label for="afp">AFP</label>
                        <select class="form-control" name="afp">
                            <?php foreach($afps as $afp){ ?>
                            <option value="<?php echo $afp->idafps; ?>"><?php echo ucfirst($afp->nombre); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <select class="form-control" name="empresa">
                            <?php foreach($empresas as $empresa){ ?>
                            <option value="<?php echo $empresa->idempresas; ?>"><?php echo ucfirst($empresa->nombre); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="salud">Isapre/Fonasa</label>
                        <select class="form-control" name="salud">
                            <option value="isapre">Isapre</option>
                            <option value="fonasa">Fonasa</option>
                        </select>
                    </div>
                    
                    <div class='input-group date' id='datetimepicker2'>
                        <label for="fecha">Fecha de contrato</label>
                        <input type='text' class="form-control" id="fecha" name="fecha" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-default">Guardar</button>
                  </form>
            </div>
        </div>
    </div> <!-- /container -->
    
    <script type="text/javascript">
        $(function () {

            $('#fecha').datetimepicker({
                locale: 'es',
                viewMode: 'days',
                format: 'DD/MM/YYYY'
            });
        });
    </script>
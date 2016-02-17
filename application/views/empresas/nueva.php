

    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Empresas - Nueva empresa</h1>
                <form method="post" enctype="multipart/form-data" action="/empresas/guardar">
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
                        <label for="razonsocial">Razón social</label>
                        <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Razón social">
                    </div>
                    <div class="form-group">
                        <label for="sueldo_base">Sueldo base</label>
                        <input type="text" class="form-control" id="sueldo_base" name="sueldo_base" placeholder="Sueldo base">
                    </div>
                    <button type="submit" class="btn btn-default">Guardar</button>
                  </form>
            </div>
        </div>
    </div> <!-- /container -->


    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Empresas - Nueva empresa</h1>
                <form method="post" enctype="multipart/form-data" action="/empresas/guardar">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="rut">RUT</label>
                        <input type="text" class="form-control" id="rut" name="rut" placeholder="Rut">
                    </div>
                    <div class="form-group">
                        <label for="razonsocial">Razón social</label>
                        <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Razón social">
                    </div>
                    <button type="submit" class="btn btn-default">Guardar</button>
                  </form>
            </div>
        </div>
    </div> <!-- /container -->
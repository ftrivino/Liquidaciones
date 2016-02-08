    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-lg-12">
                <h1>Empresas - Ver listado</h1>
                <table class="table table-stripe table-bordered table-hover">
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Nombre</th> 
                            <th>Rut</th> 
                            <th>Razón social</th>
                            <th>Acciones</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php
                        foreach($empresas as $empresa){
                        
                            echo '<tr>';
                            echo '  <th scope="row">'.$empresa->idempresas.'</th> ';
                            echo '  <td>'.$empresa->nombre.'</td> ';
                            echo '  <td>'.$empresa->rut.'</td> ';
                            echo '  <td>'.$empresa->razonsocial.'</td> ';
                            echo '  <td>';
                            echo '      <a href="/empresas/borrar/'.$empresa->idempresas.'" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>';
                            echo '      <a href="/empresas/editar/'.$empresa->idempresas.'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>';
                            echo '      <a href="/trabajadores/empresa/'.$empresa->idempresas.'" class="btn btn-default btn-xs"><i class="fa fa-building-o"></i></a>';
                            echo '  </td> ';
                            echo '</tr>';
                                }
                        ?>
                    </tbody>
                </table>
                <a href="/empresas/nueva" class="btn btn-primary pull-right">Nueva empresa</a>
            </div>
        </div>
    </div> <!-- /container -->
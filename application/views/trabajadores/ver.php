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
                            <th>Fecha de incorporación</th>
                            <th>Sueldo líquido</th>
                            <th>Acciones</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($trabajadores as $trabajador){
                            $date = date_create($trabajador->fecha_incorporacion);
                            
                            echo '<tr>';
                            echo '  <th scope="row">'.$i.'</th> ';
                            echo '  <td>'.$trabajador->nombre.'</td> ';
                            echo '  <td>'.$trabajador->rut.'</td> ';
                            echo '  <td>'.date_format($date,"d/m/Y").'</td> ';
                            echo '  <td>$'.number_format($trabajador->sueldo_liquido,0,'.','.').'</td> ';
                            echo '  <td>';
                            echo '      <a href="/trabajadores/borrar/'.$trabajador->idempresas.'" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>';
                            echo '      <a href="/trabajadores/editar/'.$trabajador->idempresas.'" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>';
                            echo '      <a href="/trabajadores/calendario/'.$trabajador->idtrabajadores.'" class="btn btn-default btn-xs"><i class="fa fa-calendar"></i></a>';
                            echo '      <a href="/trabajadores/liquidacion/'.$trabajador->idtrabajadores.'" class="btn btn-default btn-xs"><i class="fa fa-archive"></i></a>';
                            echo '      <a href="/trabajadores/bonos/'.$trabajador->idtrabajadores.'" class="btn btn-default btn-xs"><i class="fa fa-money"></i></a>';
                            echo '  </td> ';
                            echo '</tr>';
                            
                            $i++;
                                }
                        ?>
                    </tbody>
                </table>
                <a href="/trabajadores/nueva" class="btn btn-primary pull-right">Nuevo trabajador</a>
            </div>
        </div>
    </div> <!-- /container -->
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Liquidaciones</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/empresas/ver">Ver empresas</a></li>
                <li><a href="/empresas/nueva">Nueva empresa</a></li>                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trabajadores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/trabajadores/ver">Ver trabajadores</a></li>
                <li><a href="/trabajadores/nueva">Nuevo trabajador</a></li>                
              </ul>
            </li>
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="/login/salir">Salir</a></li>
            </ul>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
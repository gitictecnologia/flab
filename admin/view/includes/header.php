<div id="header">

    <div class="navbar">
        <div class="navbar-inner">
          <div class="container-fluid">
            <a class="brand" href="./">FLab</a>
            <div class="nav-no-collapse">
                <!--
                <ul class="nav">
                    <li><a href="./"><span class="icon16 icomoon-icon-screen-2"></span>Painel : Home</a></li>					
				</ul>
                -->
              
                <ul class="nav pull-right usernav">
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <img src="images/icon-app-f.png" alt="" class="image" />  -->
                            <span class="txt"><?= (isset($_SESSION['Auth']['Nome']) ? $_SESSION['Auth']['Nome'] : '') ?></span>
                            <b class="caret"></b>
                        </a>
                        <!--
                        <ul class="dropdown-menu">
                            <li class="menu">
                                <ul>
                                    <li>
                                        <a href="?s=usuarios-edit"><span class="icon16 icomoon-icon-user-3"></span>Editar dados</a>
                                    </li>                                    
                                </ul>
                            </li>
                        </ul>
                        -->
                    </li>
                    <li><a href="?s=sair"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
          </div>
        </div><!-- /navbar-inner -->
      </div><!-- /navbar -->
</div><!-- End #header -->
<?php

require('util/util.php');
require('model/autoload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /**
    *
    * Efetua o login
    *
    */

    $login = new Login();
    $login->setUser($_POST['username']);
    $login->setPassword($_POST['password']);

    if($login->executeLogin())
    {
        Go('./');
    }
    else
    {
        Erro2('Usuário ou senha estão inválidos');
    }    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <title>FLab | Gerenciador de Conteúdo</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css" /> 
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    </head>
      
    <body class="loginPage">

    <div class="container-fluid">

        <div id="header">

            <div class="row-fluid">

                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="brand" href="./">FLab</a>
                        </div>
                    </div><!-- /navbar-inner -->
                </div><!-- /navbar -->
            </div><!-- End .row-fluid -->

        </div><!-- End #header -->

    </div><!-- End .container-fluid -->    

    <div class="container-fluid">

        <div class="loginContainer">            

            <form class="form-horizontal" action="login.php" id="loginForm" method="post">
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="username">                                
                                <span class="icon16 icomoon-icon-user-3 right gray marginR10"></span>
                            </label>
                            <input class="span12" id="username" type="text" name="username" placeHolder="* Usuário" autofocus />
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span12" for="password">                                
                                <span class="icon16 icomoon-icon-locked right gray marginR10"></span>                                
                            </label>
                            <input class="span12" id="password" type="password" name="password" placeHolder="* Senha" />
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <?php showErros2() ?>
                        </div>
                    </div>
                </div>

                <div class="form-row row-fluid">                       
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="form-actions">
                            <div class="span12 controls">
                                <!-- <input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Lembrar meus dados -->
                                <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>

            </form>
        </div>

    </div><!-- End .container-fluid -->

    <!-- Le javascript
    ================================================== -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.js"></script>  
    </body>
</html>

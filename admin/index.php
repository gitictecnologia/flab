<?php

session_start();

ob_start();

setcookie("ck_authorized", "true", 0, "/");

require('util/util.php');
require('util/auth.php');

require('model/autoload.php');


/**
*
* Desloga o usuario
*/
if (isset($_GET['s']) && $_GET['s'] == 'sair')
{
    unset($_SESSION['Auth']);
    Go('login.php');
}



$secoes = array(

    // Pagina de testes
    'p-teste' => 'teste.php',

    '' => 'dashboard.php',

    // Empresas
    'empresas' => 'empresas.php',    
    'empresas-edit' => 'empresas-edit.php',    

    // Newsletter
    'newsletter' => 'newsletter.php',
    'newsletter-add' => 'newsletter-add.php',
    'newsletter-edit' => 'newsletter-edit.php',

    // Clipping
    'clipping' => 'clipping.php',
    'clipping-add' => 'clipping-add.php',
    'clipping-edit' => 'clipping-edit.php',

    //usuarios
    'usuarios' => 'usuarios.php',
    'usuarios-add' => 'usuarios-add.php',
    'usuarios-edit' => 'usuarios-edit.php',

);
$title = array(

    '' => 'Dashboard',

    // Posts
    'empresas' => 'Posts',
    'empresas-add' => 'Adicionar Post',
    'empresas-edit' => 'Editar Post',

    // Newsletter
    'newsletter' => 'Newsletter',
    'newsletter-add' => 'Newsletter',
    'newsletter-edit' => 'Newsletter',

    // Clipping
    'clipping' => 'Clipping',
    'clipping-add' => 'Clipping',
    'clipping-edit' => 'Clipping',
    
    //usuarios
    'usuarios' => 'Usuários',
    'usuarios-add' => 'Adicionar Usuário',
    'usuarios-edit' => 'Editar Usuário',    
);

$breadcrumb = array(

    '' => 'Dashboard',

    // Posts
    'empresas' => 'Posts',
    'posts-add' => 'Adicionar Post',
    'empresas-edit' => 'Editar Post',

    // Newsletter
    'newsletter' => 'Newsletter',
    'newsletter-add' => 'Newsletter',
    'newsletter-edit' => 'Newsletter',

    // Newsletter
    'clipping' => 'Clipping',
    'clipping-add' => 'Clipping',
    'clipping-edit' => 'Clipping',
    
	//usuarios
    'usuarios' => 'Usuários',
    'usuarios-add' => 'Adicionar Usuário',
    'usuarios-edit' => 'Editar Usuário',
	
);

if (isset($_GET['a']) && !array_key_exists($_GET['a'], $secoes))
{
    $_GET['s'] = '';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" type="image/png" href="images/favicon.png">

        <title>FLab | <?php if(isset($_GET['s'])) { echo $title[$_GET['s']]; } else { echo 'Dashboard'; } ?></title>

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php include('view/includes/css.php'); ?>

        <script type="text/javascript">
            //adding load class to body and hide page
            document.documentElement.className += 'loadstate';
        </script>
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    </head>

    <body style="height: 100%">
        <!-- loading animation -->
        <div id="qLoverlay"></div>
        <div id="qLbar"></div>

        <!-- Header -->
        <?php include('view/includes/header.php'); ?>

        <div id="wrapper">

            <!--Sidebar content-->
            <?php include('view/includes/sidebar.php'); ?>

            <!--Body content-->
            <div id="content" class="clearfix">
                <div class="contentwrapper"><!--Content wrapper-->
                    <div class="heading">
                        <h3>Painel de administração</h3>
                        <div class="resBtnSearch">
                            <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                        </div>
                        <ul class="breadcrumb">
                            <li>Você está em:</li>
                            <li>
                                <a href="#" class="tip" title="voltar para dashboard">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                </span>
                            </li>
                            <li class="active"><?= (isset($_GET['s']) ? $breadcrumb[$_GET['s']]:$breadcrumb['']) ?></li>
                        </ul>
                    </div>

                    <!-- Start content --> 
                    <?php isset($_GET['s']) ? include('view/' . $secoes[$_GET['s']]) : include('view/' . $secoes['']) ?>
                    <!-- End content --> 

                </div><!-- End contentwrapper -->
            </div><!-- End #content -->
        </div><!-- End #wrapper -->

        <?php include('view/includes/js.php'); ?>
    </body>
</html>
<?php
require_once 'configs/sa_configs.php';
require_once 'configs/sa_funcoeslib.php';
require_once 'configs/sa_url-amigavel.php';
require_once 'configs/sa_cache.php';
require_once 'configs/sa_css-js.php';
require_once 'admin/util/pathImages.php';
require_once 'admin/model/autoload.php';
?>

<!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
    <!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
    <!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>flab.solutions é inovação</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link rel="icon" type="image/png" href="assets/images/favicon.png">  

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>        

        <!-- Global CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">        

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
        
        <!-- OWL Carousel -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <!-- <link rel="stylesheet" href="assets/css/owl.theme.css"> -->
        

        <!-- Theme CSS -->
        <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->       


        <?php
        /**
        * Print de styles
        */
        echo $css;

        /**
        * Define a PATH para javascript
        */
        echo '<script> var PATH = "' . PATH . '"; var PATHA = "' . PATHA . '"; </script>';
        ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-77440405-1', 'auto');
            ga('send', 'pageview');
		</script>
    </head>
    <body class="home-page">
        <?php

        flush();

        $require = 'index.php';

        if(!$_CREATE)
        {
            $require = 'error_404.php';
        }
        else
        {
            if(isset($_GET["a"]) && !empty($_GET["a"]))
            {
                $require = $_GET["a"].'.php';
                
                if(!file_exists('views/site_'.$require) && !file_exists('views/site_p_'.$require))
                {
                    $require = 'error_404.php';
                }
                else if(file_exists('views/site_p_'.$require))
                {
                    $require = 'p_'.$require;
                }
            }
        }


        require_once 'views/includes/site_header.php';
        require_once 'views/site_'.$require;
        require_once 'views/includes/site_footer.php';


        echo $js;

        /**        
        * Lightbox
        */
        include 'views/includes/site_lightbox.php';
        ?>


        <style>
        /* Tira margem row e ajusta para mobile */
        .row {
            margin-left: 15px;
            margin-right: 15px;
        }
        </style>

        <!-- Javascript -->
        <script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>        
        <script type="text/javascript" src="assets/plugins/jquery-placeholder/jquery.placeholder.js"></script>
        <script type="text/javascript" src="assets/plugins/FitVids/jquery.fitvids.js"></script>
        <script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/newsletters.js"></script>

        <!-- Vimeo video API -->
        <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
        <script type="text/javascript" src="assets/js/vimeo.js"></script>


        <script>

            // Clipping            
            $('.carousel-clipping').owlCarousel({                
                loop:true,
                margin:10,
                nav:true,
                responsive: { 
                    0:{items:1},
                    600:{items:1},
                    1000:{items:2}
                },
                navText: [
                  "<span class='glyphicon glyphicon-circle-arrow-left'></span>",
                  "<span class='glyphicon glyphicon-circle-arrow-right'></span>"
                ],
            });

            // Building modal clipping
            $('.modal-view-clipping').click(function (event) {                
                event.preventDefault();                
                var id = $(this).attr('id').replace('clipping-', '');
                $.ajax({
                    method: "GET",
                    url: PATHA + 'controller/clipping.php',
                    data: { "do":"get", "id":id },
                    success: function (data) {
                        if(data.status == true) {                        
                            var html = '' +
                            '<div class="modal fade modal-clipping" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">' +
                                '<div class="modal-dialog modal-lg">' +
                                    '<div class="modal-content">' +
                                        '<div class="modal-header">' +
                                            '<div class="row">' +
                                                '<div class="col-sm-12">' +
                                                    '<a class="close-modal" data-dismiss="modal" aria-label="Close" style="float: right; text-decoration: none; cursor: pointer">X</a>' +
                                                    '<h2>' + data.clipping.titulo + '</h2>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="modal-body">' +
                                            '<div class="row">' +
                                                '<div class="col-sm-12">' + 
                                                    '<h4>' + data.clipping.subtitulo + '</h4>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row">' +
                                                '<div class="col-sm-12">' +
                                                    '<p>' + data.clipping.texto + '</p>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="modal-footer">' +
                                            '<div class="row">' +
                                                '<div class="col-xs-6 text-left">' +
                                                    '<p>Fonte: ' + data.clipping.fonte + '</p>' +
                                                '</div>' +
                                                '<div class="col-xs-6 text-right">' +
                                                    '<p>Data: ' + data.clipping.dtNoticia + '</p>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';

                            $('.box-clipping').html(html);
                            $('.modal-clipping').modal('show');
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function (data) {
                        console.log(data);
                        alert('Falha na operação');
                    }
                });                
            });


            // Menu active
            $('.main-nav .nav-item').click(function() {
                $('.main-nav .nav-item').removeClass('active');
                $(this).addClass('active');
            });

            // Animação seta Banner > Testemonial
            $('.clk-seta-testemonial').click(function () {                   
                $('html, body').animate({ scrollTop: $("#testemonial").offset().top - 0}, 500);
                return false;
            });

            
            // Animação seta Testemonial > Beneficios
            $('.clk-seta-beneficios').click(function () {                   
                $('html, body').animate({ scrollTop: $("#beneficios").offset().top - 20}, 500);
                return false;
            });

            // Animação seta Beneficios > Interessses
            $('.clk-seta-interesses').click(function () {
                $('html, body').animate({ scrollTop: $("#interesses").offset().top - 20}, 500);
                return false;
            });

            // Animação seta Interessses > Como funciona
            $('.clk-seta-comofunciona').click(function () {
                $('html, body').animate({ scrollTop: $("#comofunciona").offset().top - 20}, 500);
                return false;
            });

            // Animação seta Como funciona > Timeline
            $('.clk-seta-timeline').click(function () {
                $('html, body').animate({ scrollTop: $("#timeline").offset().top - 20}, 500);
                return false;
            });

            // Animação seta Timeline > Clipping
            $('.clk-seta-clipping').click(function () {
                $('html, body').animate({ scrollTop: $("#clipping").offset().top - 20}, 500);
                return false;
            });

            

            // Animação seta Timeline > Newsletters
            $('.clk-seta-newsletters').click(function () {
                $('html, body').animate({ scrollTop: $("#newsletters").offset().top - 20}, 500);
                return false;
            });


            $(window).scroll(function () {
                if($(this).scrollTop() == 0) {
                    $('.x-logo-2').css('display', 'none');
                    $('.x-logo').css('display', 'inline');
                } else {
                    $('.x-logo-2').css('display', 'inline');
                    $('.x-logo').css('display', 'none');
                }
            });
        </script>

    </body>
</html>

<?php

$_HTML = ob_get_contents();
ob_end_clean();

require_once 'configs/sa_cache-create.php';
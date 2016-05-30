<!-- ******HEADER****** -->
<style>
    .header .x-logo {
        height: 130px;
        top: 60px;
        left: -5px;
        float: left;
    }

    .header .x-logo-2 {
        position: absolute;     
        height: 72px;   
        top: -27px; 
        left: -30px;
        display: none;
    }
    
    a.btn-cta-primary, a.btn-cta-primary:hover {
        background-color: transparent;
    }
    a.btn-cta-primary, a.btn-cta-primary:hover {
        border: 1px solid #fff;
        border-radius: 0px;
    }

    @media (min-width: 1200px) {
        .container {
            width: 1060px !important;
        }
    }
    
    .nav-item a{
        font-family: Lato;
        font-weight: 100;
        font-size:1.1em;
        color:#666666;
    }

    .promo {
        height: auto;
        margin-bottom: 20px;
    }
    
    .bt-antenna{
        font-family: Lato;
        font-size:1em;
        font-weight: 100;
    }

    /*
    * Handler bullet menu
    */
    @media (min-width: 768px) {
        .bullet-nav-item:after, .bullet-nav-item:active:after {
            content: '-';
            color: #fff;
            font-size: 2em;
            display: inline;
            position: absolute;
            top: 7px;
            right: -12px;
        }
    }
</style>
<div class="row">
    <span id="home"></span>    
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <header id="header" class="header navbar-fixed-top">  
            <div class="container">
                <div style="float: left; position: absolute; top: 30px">
                    <a href="#home"><img class="x-logo" src="assets/images/logo/logo-branco.png" style="margin:15px 0 0 -30px;" border="0" /></a>
                    <a href="#home"><img class="x-logo-2" src="assets/images/logo/logocolorido.png" border="0" /></a>
                </div>
                <!-- <h1 class="logo"></h1><!--//<logo-->
                <nav class="main-nav navbar-right" role="navigation">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><!--//nav-toggle-->
                    </div><!--//navbar-header-->
                    <div id="navbar-collapse" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active nav-item bullet-nav-item"><a href="#home">Home</a></li>
                            <li class="nav-item bullet-nav-item"><a href="#testemonial">Visão Flab</a></li>
                            <li class="nav-item bullet-nav-item"><a href="#clipping">Clipping</a></li>
                            <li class="nav-item bullet-nav-item"><a href="#beneficios">Beneficios para as Startups</a></li>
                            <li class="nav-item"><a href="#interesses">Áreas de Interesse</a></li>
                            <!-- <li class="nav-item"><a href="#newsletters">Acompanhe as Novidades</a></li> -->
                            <li class="nav-item nav-item-cta last">
                                <a class="btn btn-cta btn-cta-secondary" href="#subscribe">Inscreva sua Startup!</a>
                            </li>
                        </ul><!--//nav-->
                    </div><!--//navabr-collapse-->
                </nav><!--//main-nav-->                     
            </div><!--//container-->
        </header><!--//header-->

        <!--Texto que fica no banner -->
        <section class="promo section section-on-bg">
            <div class="container text-left">                
                <h2 class="title" style="text-align: left; text-shadow: none;">

                    FLAB.SOLUTIONS É UMA UNIDADE DE NEGÓCIOS<br>
                    DA AGÊNCIA FISCHER,<br>
                    DEDICADA À GERAÇÃO DE NEGÓCIOS<br> EM DUAS FRENTES:<br>
                    FOMENTO A STARTUPS E ÁREA DE INOVAÇÃO,<br>
                    FOCADAS EM TECNOLOGIA. 
                    <br>
                    <br>
                    INSCRIÇÕES ABERTAS PARA STARTUPS DE 1 A 15 DE JUNHO.
                </h2>
                <p style="font-family: 'Roboto'; font-weight: 300; font-size: 1.2em; text-shadow: none;">
                </p>
                <p><a class="btn btn-cta btn-cta-primary bt-antenna" href="#subscribe" >Inscreva sua Startup!</a></p>
                
                <!--<button type="button" class="play-trigger btn-link " data-toggle="modal" data-target="#modal-video" ><i class="fa fa-youtube-play"></i> Watch the video</button>-->
            
            </div><!--//container-->
            <div style="width:auto;text-align:center;" class="setabanner">
                <a href="#testemonial" class="clk-seta-testemonial"><i class="fa fa-chevron-circle-down" style="font-size: 50px; padding: 0 0 0 20px; color:#76F983;font-weight:thin;"></i></a>
            </div>
        </section><!--//promo-->
    
    </div>
    
    <div class="col-md-2"></div>
</div>
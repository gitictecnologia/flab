<style>    
    .clipping {
        padding-top: 80px;
        padding-bottom: 14px;
        color: #E6E6E6;
    	min-height: 600px;
        background-color: #fff;
        font-family: 'Roboto';                
    }
    .clipping .title-h1 {
        font-size: 3.6em;
        font-weight: 900;
        color: #66CC66;
    }
    .carousel-clipping .item {    
        background-color: #f5f5f5;
        height: 450px;
        padding: 5px 5px;
        /*border: 0.5px solid #b7b7b7;*/
    }
    .carousel-clipping .owl-prev {
        float: left;
        margin-left: -35px;
        opacity: 0.2;
    }
    .carousel-clipping .owl-next {
        float: right;
        margin-right: -35px;
        opacity: 0.2;
    }
    .carousel-clipping .owl-prev, .carousel-clipping .owl-next {
        position: relative;
        color: #333;
        font-size: 2em;
        top: -200px;       
    }

    .carousel-clipping .item h1, .close-modal {
        color: #666666;
        font-size: 2em;   
        font-weight: 900;    
    }

    .carousel-clipping .item .clipping-body p {
        color: #666666;
        font-size: 1.3em;   
        font-weight: 300;
        line-height: 1.2;
        margin-bottom: 5px;
    }

    .carousel-clipping .item .clipping-body img {
        float: left;
        background-color: #444;
        max-width: 30%;
        max-height: 30%;
        margin: 5px 10px 5px 0px;
    }

    .carousel-clipping .item .clipping-footer {
        background-color: #b7b7b7;
        color: #fdfdfd;
        font-size: 1.3em;
        font-weight: 900;
        position: absolute;
        bottom: -10px;
        width: 99.8%;
        margin-left: -5px;
        height: 60px;
    	padding-top: 10px;
    	transition: 0.3s
    }

    .carousel-clipping .item .clipping-footer:hover {    	
    	background-color: #666;
    	transition: 0.3s;
    }

    .carousel-clipping .item .clipping-footer .glyphicon {
    	float: right;
    	top: 7px;
    }

</style>

<section id="clipping" class="clipping">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p class="title-h1" >Clipping</p>
            

            <?php
            /**
            *
            *
            * Obtem os clippings
            */
            $clippings = Clipping::getAll(1);
            ?>
            <div class="clipping">

                <div class="carousel-clipping">       

                    <?php foreach($clippings as $c) { ?>

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-12"><h1><?= (strlen($c->Titulo) > 30 ? substr($c->Titulo, 0, 30) . ' ...' : $c->Titulo) ?></h1></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="clipping-body">                                        
                                        <?php if($c->Thumb) { ?>
                                            <img src="<?= $pathImage['clipping']['rel'] . $c->Thumb ?>" class="img-responsive">
                                        <?php } ?>
                                        <p><?= date('d/m/Y', strtotime($c->DtNoticia)) ?></p>
                                        <p>Fonte: <?= $c->Fonte ?></p>
                                        <p><?= (strlen($c->Subtitulo) > 130 ? substr($c->Subtitulo, 0, 130) . ' ...' : $c->Subtitulo) ?></p>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="modal-view-clipping" id="clipping-<?= $c->Id ?>">
                                <div class="row clipping-footer">                            
                                    <div class="col-sm-12">                                
                                        <p>LEIA O ARTIGO <span class="glyphicon glyphicon-arrow-right"></span></p>                                
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>
                </div>
            </div>            
        </div>
        <div class="col-md-2"></div>
    </div>

    <div style="width:auto;text-align:center;">
        <a href="#newsletters" class="clk-seta-newsletters"><i class="fa fa-chevron-circle-down" style="font-size: 50px;  color:#76F983;font-weight:thin;margin:0px 0 30px 0;"></i></a>
    </div>
</section>
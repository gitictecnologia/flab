<!-- Build page from here: -->                   
<div class="row-fluid">

    <div class="span12">

        <div class="box">
            <?php showErros(); ?>

            <div class="title">
                <h4>
                    <span class="icon16 icomoon-icon-equalizer-2"></span>
                    <span>Footer - Links</span>
                </h4>
            </div>

            <div class="content">

                <form class="form-horizontal" action="action/footer.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="do" value="altera" />
                    <input type="hidden" name="id" value="1" />

                    <div class="form-row row-fluid">
                        <div class="span12">

                             <div class="page-header">
                                <h4>Conteúdo</h4>
                            </div>

                            <div style="margin-bottom: 20px;">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#links" data-toggle="tab">Link</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="links">
                                            <div class="form-row row-fluid">
                                                <div class="span12">
                                                    <div class="row-fluid">
                                                       <div class="form-row">
                                                            <textarea class="tinymce" name="texto" id="texto" style="width:90%;"><?=$r['texto']?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .span6 -->

                    </div><!-- End .row-fluid -->

                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Salvar</button>
                       <button type="button" class="btn" onclick="location.href='?s=footer'">Cancelar</button>
                    </div>

                </form>

            </div>

        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
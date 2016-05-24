<!-- Build page from here: -->
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            
            <?php showErros(); ?>

            <div class="title"><h4><?= ($title[$_GET['s']])  ?></h4></div>

            <div class="content">                

                <form class="form-horizontal" action="controller/clipping.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="do" value="add" />
                    <input type="hidden" id="friendlyUrl" name="friendlyUrl" value="" />
                    
                    <div class="form-row row-fluid">
                        <div class="span12">
                            
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="titulo">* Titulo</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input class="title-friendlyUrl" id="titulo" name="titulo" value="<?= ( isset($_SESSION['clipping']['titulo']) ? $_SESSION['clipping']['titulo'] : '' ) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="subtitulo">* Subtitulo (chamada)</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <input id="subtitulo" name="subtitulo" value="<?= ( isset($_SESSION['clipping']['subtitulo']) ? $_SESSION['clipping']['subtitulo'] : '' ) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="texto">* Texto</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <textarea class="form-control" id="texto" name="texto">
                                                <?= ( isset($_SESSION['clipping']['texto']) ? $_SESSION['clipping']['texto'] : '' ) ?>
                                            </textarea>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="fonte">Fonte</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input id="fonte" name="fonte" value="<?= ( isset($_SESSION['clipping']['fonte']) ? $_SESSION['clipping']['fonte'] : '' ) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="dtNoticia">* Data da Notícia</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input class="data" id="dtNoticia" name="dtNoticia" value="<?= ( isset($_SESSION['clipping']['dtNoticia']) ? $_SESSION['clipping']['dtNoticia'] : '' ) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="thumb">Imagem</label>                                           
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input type="file" id="thumb" name="thumb" value="<?= ( isset($_SESSION['clipping']['thumb']) ? $_SESSION['clipping']['thumb'] : '' ) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="destaque" value="0">
                            <!--
                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="destaque">* Destaque (Mostrar na home)</label>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <select id="destaque" name="destaque">
                                                <option value="0" <?= ( isset($_SESSION['clipping']['destaque']) && $_SESSION['clipping']['destaque'] == 0 ? 'selected="selected"' : '' ) ?>> Não</option>
                                                <option value="1" <?= ( isset($_SESSION['clipping']['destaque']) && $_SESSION['clipping']['destaque'] == 1 ? 'selected="selected"' : '' ) ?>> Sim</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="status">* Ativo</label>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3">
                                            <select id="status" name="status">
                                                <option value="1" <?= ( isset($_SESSION['clipping']['status']) && $_SESSION['clipping']['status'] == 1 ? 'selected="selected"' : '' ) ?>> Sim</option>
                                                <option value="0" <?= ( isset($_SESSION['clipping']['status']) && $_SESSION['clipping']['status'] == 0 ? 'selected="selected"' : '' ) ?>> Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>                        
                    </div><!-- End .row-fluid -->

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info">Salvar</button>
                        <button type="button" class="btn" onclick="location.href='?s=clipping'">Cancelar</button>
                    </div>

                </form>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
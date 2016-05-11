<?php

/**
* ID da clipping
*/
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$clipping = Clipping::getById($id);


?>
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            
            <?php showErros(); ?>

            <div class="title"><h4><?= ($title[$_GET['s']])  ?></h4></div>

            <div class="content">

                <?php if(!is_null($clipping)) { ?>

                <form class="form-horizontal" action="controller/clipping.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="do" value="edit" />
                    <input type="hidden" name="id" value="<?= $clipping->Id ?>" />
                    <input type="hidden" id="friendlyUrl" name="friendlyUrl" value="<?= $clipping->Url ?>" />
                    
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
                                            <input class="title-friendlyUrl" id="titulo" name="titulo" value="<?= $clipping->Titulo ?>">
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
                                            <input id="subtitulo" name="subtitulo" value="<?= $clipping->Subtitulo ?>">
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
                                                <?= $clipping->Texto ?>
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
                                            <input id="fonte" name="fonte" value="<?= $clipping->Fonte ?>">
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
                                            <input class="data" id="dtNoticia" name="dtNoticia" value="<?= date('d/m/Y', strtotime($clipping->DtNoticia)) ?>">
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
                                            <input type="file" id="thumb" name="thumb" value="<?= $clipping->Thumb ?>">
                                            
                                            <?php
                                            if(!is_null($clipping->Thumb))
                                            {
                                                echo '<a href="' . $pathImage['clipping']['rel'] . $clipping->Thumb . '" class="btn btn-default" rel="prettyPhoto"> Visualizar </a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="destaque">* Destaque (Mostrar na home)</label>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <select id="destaque" name="destaque">
                                                <option value="0" <?= ( $clipping->Destaque == 0 ? 'selected="selected"' : '' ) ?>> Não</option>
                                                <option value="1" <?= ( $clipping->Destaque == 1 ? 'selected="selected"' : '' ) ?>> Sim</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <label for="status">* Ativo</label>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <select id="status" name="status">
                                                <option value="1" <?= ( $clipping->St == 1 ? 'selected="selected"' : '' ) ?>> Sim</option>
                                                <option value="0" <?= ( $clipping->St == 0 ? 'selected="selected"' : '' ) ?>> Não</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>                        
                    </div><!-- End .row-fluid -->

                    <div class="form-actions">
                        <button type="submit" class="btn btn-info">Salvar</button>
                        <button type="button" class="btn" onclick="location.href='?s=posts'">Cancelar</button>
                    </div>
                </form>

                <?php } else { ?>

                    <p>Registro não encontrado</p>

                <?php } ?>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
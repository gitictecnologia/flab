
<?php 

$id = (int)$_GET['id'];
$post = Post::getById($id);
$postHome = Destaque::getPostByTipoDestaqueId(1);

?>

<!-- Build page from here: -->
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            
            <?php showErros(); ?>

            <div class="title">
                <h4>                    
                    <span>Editar Post: <?= ($post != NULL ? $post->getTitulo():'Not Defined')  ?></span>
                </h4>
            </div>

            <div class="content">                

                <form class="form-horizontal" action="action/posts.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="do" value="edit" />
                    <input type="hidden" name="id" value="<?= $id ?>" />
                    
                    <div class="form-row row-fluid">
                        <div class="span12">

                            <div class="form-row row-fluid">
                                <div class="span12">

                                    <div class="row-fluid">
                                        <div class="form-row row-fluid">
                                            <div class="span12">
                                                <div class="row-fluid">                                       
                                                    <label class="form-label span4" for="textarea">Imagem</label>
                                                    <input type="file" name="imagem" id="imagem" />
                                                    <span class="help-block blue span8">Tamanho recomendado em pixel: 520 x 350</span>

                                                    <?php if($post->getImagem() != NULL) { ?>
                                                    <a href="#" class="btn" id="openChamada">
                                                        Visualizar
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- ui dialog -->
                                        <div id="dialogChamada" title="Preview da Imagem" class="dialog">
                                            <p style="text-align:center;">
                                                <img src="../uploads/img/posts/<?= $post->getImagem() ?>">
                                            </p>
                                        </div>

                                        <div class="form-row">
                                            <div class="span4">                                                
                                                <strong>* Tema:</strong>
                                                <br/>
                                                <select name="temaId" id="temaId" class="span4">
                                                    <?php 
                                                    $temas = Tema::getAll();
                                                    foreach($temas as $tema) {
                                                        if($post->getTemaId() == $tema->getId()) {
                                                            echo '<option value="'.$tema->getId().'" selected="selected">'.$tema->getNome().'</option>';
                                                        } else {
                                                            echo '<option value="'.$tema->getId().'">'.$tema->getNome().'</option>';
                                                        }                                                        
                                                    }
                                                    ?>                                                                                                
                                                </select>                                                                                             
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="help-block blue"><a href="?s=temas-add">Incluir novo tema</a></span>

                                        
                                        <div class="form-row">
                                            <strong>* Título:</strong>
                                            <br>
                                            <input class="span6" type="text" name="titulo" id="titulo" value="<?= $post->getTitulo() ?>" />
                                        </div>

                                        <div class="form-row">
                                            <strong>* URL amigável:</strong>
                                            <br>
                                            <input class="span6" type="text" name="codigo" id="friendly_url" value="<?= $post->getCodigo() ?>" readonly />                                            
                                        </div>

                                        <div class="form-row">
                                            <strong>Chamada:</strong>
                                            <br/>
                                            <input class="span12" type="text" name="descricao" id="descricao" value="<?= $post->getDescricao() ?>" />
                                        </div>

                                        <div class="form-row">
                                            <strong>* Texto:</strong>
                                            <br/> 
                                            <textarea class="span12" name="texto" id="texto"><?= $post->getTexto() ?></textarea>
                                        </div>                                        

                                        <div class="form-row">
                                            <div class="span2">                                 
                                                <strong>Destaque Home:</strong>
                                                <br/>
                                                <select name="destaqueHome" id="destaqueHome">
                                                    <?php

                                                        if(count($postHome) > 0) {

                                                            $isPostHome = false;
                                                            foreach($postHome as $ph) {
                                                                if($ph->getId() == $post->getId()) { $isPostHome = true; }
                                                            }                                                           

                                                            if($isPostHome) { 

                                                                echo '<option value="1" selected="selected">Sim</option>'; 
                                                                echo '<option value="0">Não</option>'; 
                                                            } else {

                                                                echo '<option value="1">Sim</option>'; 
                                                                echo '<option value="0" selected="selected">Não</option>';
                                                            }
                                                             
                                                        } else {

                                                            echo '<option value="1">Sim</option>'; 
                                                            echo '<option value="0" selected="selected">Não</option>';
                                                        }
                                                        
                                                    ?>
                                                </select>
                                                <br>
                                                <br>
                                                <strong>Ativo:</strong>
                                                <br/>
                                                <select name="st" id="st">
                                                    <option value="1" <?= ($post->getSt() == 1 ? 'selected="selected"':'') ?>>Sim</option>
                                                    <option value="0" <?= ($post->getSt() == 0 ? 'selected="selected"':'') ?>>Não</option>                                                
                                                </select>
                                            </div>
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
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
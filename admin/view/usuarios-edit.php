<?php

$id = (int) isset($_GET['id']) ? $_GET['id']: null;
if(empty($id)) {
    $id = $usuario->getId();
} 

// Obtem o usuario
$user = Usuario::getById($id);

?>

<!-- Build page from here: -->                   
<div class="row-fluid">

    <div class="span12">
        <div class="box">
            <?php showErros(); ?>

            <div class="title">
                <h4>                    
                    <span>Editar Usuário</span>
                </h4>                
            </div>
            <div class="content">
               
                <form class="form-horizontal" action="action/usuarios.php" method="post">
                    <input type="hidden" name="do" value="edit" />
                    <input type="hidden" name="id" value="<?= $user->getId() ?>" />
                    
                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Nome:</strong>
                                <br/>                  
                                <input class="span3" id="nome" name="nome" type="text" value="<?= $user->getNome() ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Sobrenome:</strong>
                                <br/>                       
                                <input class="span3" id="sobrenome" name="sobrenome" type="text" value="<?= $user->getSobrenome() ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Email:</strong>
                                <br/>                                
                                <input class="span6" id="email" name="email" type="text" value="<?= $user->getEmail() ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Login:</strong>
                                <br/>                                
                                <input class="span6" id="login" name="login" type="text" value="<?= $user->getLogin() ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Senha:</strong>
                                <br/>                                
                                <input class="span3" id="senha" name="senha" type="password" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <strong>Confirme:</strong>
                                <br/>                                
                                <input class="span3" id="conf" name="conf" type="password" />
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                       <button type="submit" class="btn btn-info">Salvar</button>
                       <button type="button" class="btn" onclick="location.href='?s=usuarios'">Cancelar</button>
                    </div>
                </form>             
            </div>  
        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
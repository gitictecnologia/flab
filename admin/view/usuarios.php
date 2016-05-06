<div class="row-fluid">

    <div class="span12">

        <div class="box gradient">
            <?php showErros(); ?>
            <div class="title">
                <h4>
                    <span>Usuários</span>
                </h4>
            </div>
            <div class="content noPad clearfix">
                <div class="clearfix">
                    <!--
                    <div class="btn-group" style="margin:20px;">
                        <a class="btn blue" href="?s=usuarios-add" title="Adicionar"><i class="icon-plus"></i> Adicionar</a>
                    </div>
                    -->
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $usuarios = Usuario::getAll(1);
                        foreach($usuarios as $usuario) { 
                        ?>
                        <tr class="odd gradeX">
                            <td width="400"><?= $usuario->getNome() ?></td>
                            <td width="400"><?= $usuario->getLogin() ?></td>
                            <td align="center">
                                <a class="btn mini blue" href="?s=usuarios-edit&id=<?= $usuario->getId() ?>"><i class="icon-pencil"></i> Editar</a> 
                                <!--                               
                                <a href="action/usuarios.php?do=exclui&id=<?= $usuario->getId() ?>" role="buttton" class="del btn btn-danger"> <i class="icon-trash"></i> Excluir</a>
                                -->
                            </td>
                        </tr>
                        <?php } ?>                       
                    </tbody>
                </table>
            </div>

        </div><!-- End .box -->

    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
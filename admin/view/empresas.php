<?php
/**
*
* Obtem as listagem de empresas
*
*/
$empresas = Empresa::getAll();

?>

<div class="row-fluid">
    <div class="span12">
        <div class="box gradient">

            <?php showErros(); ?>

            <div class="title">
                <h4>Empresas</h4>
            </div>
            <hr>
            <div class="content noPad clearfix">

                <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th style="30">Nome</th>                                                        
                            <th style="30">Telefone</th>
                            <th style="30">Email</th>
                            <th style="10">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach($empresas as $empresa) { 
                        ?>
                        <tr class="odd gradeX">
                            <td><?= $empresa->get('Nome') ?></td>
                            <td><?= $empresa->get('Telefone') ?></td>
                            <td><?= $empresa->get('Telefone') ?></td>                            
                            <td>
                                <a class="btn btn-default" href="?s=empresas-edit&id=<?= $empresa->get('Id') ?>"> <i class="icon-eye-open"></i></a>                                 
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->
</div><!-- End .row-fluid -->
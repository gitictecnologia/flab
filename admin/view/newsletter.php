<?php
/**
*
* Obtem as listagem de empresas
*
*/
$newsletters = Newsletter::getAll(1);

?>

<div class="row-fluid">
    <div class="span12">
        <div class="box gradient">

            <?php showErros(); ?>

            <div class="title">
                <h4>Newsletter</h4>
            </div>
            <hr>
            <div class="content noPad clearfix">

                <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th style="30">Interessado</th>                                                        
                            <th style="30">Nome da Empresa</th>
                            <th style="30">Email</th>
                            <th style="10">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach($newsletters as $newsletter) { 
                        ?>
                        <tr class="odd gradeX">
                            <td><?= $newsletter->get('NomeUsuario') ?></td>
                            <td><?= $newsletter->get('NomeEmpresa') ?></td>
                            <td><?= $newsletter->get('Email') ?></td>                            
                            <td>
                                <a class="btn btn-default" href="?s=newsletters-edit&id=<?= $newsletter->get('Id') ?>"> <i class="icon-eye-open"></i></a>                                 
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->
</div><!-- End .row-fluid -->
<?php
/**
*
* Obtem a listagem de empresas cadastradas no programa
*
*/
$empresas = Empresa::getAll(1);
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
                            <th style="30">Nome da Empresa</th>                                                        
                            <th style="30">Telefone</th>
                            <th style="30">Email</th>
                            <th style="10"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach($empresas as $empresa) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?= $empresa->Nome ?></td>
                            <td><?= $empresa->Telefone ?></td>
                            <td><?= isset($empresa->Socios[0]) ? $empresa->Socios[0]->Email : 'N/D' ?></td>                            
                            <td><a class="btn btn-default" href="?s=empresas-edit&id=<?= $empresa->Id ?>"> <i class="icon-eye-open"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->
</div><!-- End .row-fluid -->
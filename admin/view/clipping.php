<?php

$status = isset($_GET['st']) ? $_GET['st'] : 1;
$clippings = Clipping::getAll($status);

?>

<div class="row-fluid">
    <div class="span12">
        <div class="box gradient">

            <?php showErros(); ?>

            <div class="title"><h4><?= ($title[$_GET['s']])  ?></h4></div>            
            <div class="content noPad clearfix">

                <div class="col-sm-3">
                    <a class="pull-right btn btn-default" href="?s=clipping&st=<?= ($status == 1 ? 0 : 1) ?>"><?= ($status == 1 ? 'Inativos' : 'Ativos') ?></a>
                </div>
                <br>
                <hr>
                <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                    <thead>
                        <tr>                            
                            <th style="40">Titulo</th>
                            <th style="40">Subtitulo</th>
                            <th style="10">Data Clipping</th>
                            <th style="10">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach($clippings as $clipping) { 
                        ?>
                        <tr class="odd gradeX">                            
                            <td><?= $clipping->Titulo ?></td>
                            <td><?= $clipping->Subtitulo ?></td>
                            <td><?= date('d/m/Y', strtotime($clipping->DtNoticia)) ?></td>
                            <td>
                                <a class="btn btn-warning" href="?s=clipping-edit&id=<?= $clipping->Id ?>" title="Editar"> <i class="icon-edit"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->
</div><!-- End .row-fluid -->
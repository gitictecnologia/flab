<?php

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$empresa = Empresa::getById($id);
?>

<!-- Build page from here: -->
<div class="row-fluid">
    <div class="span12">
        <div class="box">
            
            <?php showErros(); ?>

            <div class="title"><h4>Visualizar empresa</h4></div>

            <div class="content">

                <?php if(is_null($empresa)) { ?>
                    <h3>Empresa não foi encontrada</h3>
                <?php } else { ?>    
                    <form class="form-horizontal">                        
                        
                        <div class="row-fluid">
                            <div class="span12">

                                <!-- Empresa -->
                                <section>

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="title"><h4>Empresa</h4></div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="row-fluid">
                                                <div class="span12">Nome da Empresa</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Nome ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="row-fluid">
                                                <div class="span12">CNPJ</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->CNPJ ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Website</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Site ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">E-mail</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Email ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Telefone</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Telefone ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Data de fundação</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= date('d/m/Y', strtotime($empresa->DtFundacao)) ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Faturamento em 2015</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="R$ <?= $empresa->Faturamento ?>"></div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </section>

                                <br>
                                <br>

                                <!-- Endereço empresa -->
                                <section>

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="title"><h4>Endereço da empresa</h4></div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Endereço</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Endereco[0]->Logradouro ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Cidade</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Endereco[0]->Cidade ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Estado</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Endereco[0]->Estado->Nome ?>"></div>
                                            </div>
                                        </div>                                       
                                    </div>                                    
                                </section>

                                <br>
                                <br>

                                <!-- Socios -->
                                <section>

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="title"><h4>Sócio responsável</h4></div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Nome</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Socios[0]->Nome ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Cargo</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Socios[0]->Cargo ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">E-mail</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Socios[0]->Email ?>"></div>
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="row-fluid">
                                                <div class="span12">Telefone</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Socios[0]->Celular ?>"></div>
                                            </div>
                                        </div>                                       
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Currículos</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12"><input class="span12" type="text" value="<?= $empresa->Socios[0]->CurriculoLink ?>"></div>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <br>
                                <br>

                                <!-- Pergunta -->
                                <section>

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="title"><h4>Descrição Projeto/Empresa</h4></div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">                                            
                                            <div class="row-fluid">
                                                <div class="span12"><textarea class="span12" rows="4"><?= $empresa->Respostas[0]->Resposta ?></textarea></div>
                                            </div>
                                        </div>
                                    </div>

                                </section>

                                <br>
                                <br>

                                <!-- Arquivos -->
                                <section>

                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="title"><h4>Arquivos</h4></div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Currículo dos sócios</div>
                                            </div>                                          
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <?php if(is_null($empresa->Socios[0]->Curriculo)) { ?>
                                                        &nbsp; <strong>Não há arquivo</strong>
                                                    <?php } else { ?>
                                                        &nbsp; <a href="<?= $pathImage['docs']['curriculo']['rel'] . $empresa->Socios[0]->Curriculo ?>" class="btn btn-default" target="_blank"><span class="icomoon-icon-file-download"></span> Baixar</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Autorização dos sócios</div>
                                            </div>                                          
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <?php if(is_null($empresa->Socios[0]->Autorizacao)) { ?>
                                                        &nbsp; <strong>Não há arquivo</strong>                                                    
                                                    <?php } else { ?>
                                                        &nbsp; <a href="<?= $pathImage['docs']['autorizacao']['rel'] . $empresa->Socios[0]->Autorizacao ?>" class="btn btn-default" target="_blank"><span class="icomoon-icon-file-download"></span> Baixar</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="row-fluid">
                                                <div class="span12">Apresentação da empresa</div>
                                            </div>                                          
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <?php if(is_null($empresa->Apresentacao)) { ?>
                                                        &nbsp; <strong>Não há arquivo</strong>                                                    
                                                    <?php } else { ?>
                                                        &nbsp; <a href="<?= $pathImage['docs']['apresentacao']['rel'] . $empresa->Apresentacao ?>" class="btn btn-default" target="_blank"><span class="icomoon-icon-file-download"></span> Baixar</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br>
                                <br>
                                <br>
                            </div>                        
                        </div><!-- End .row-fluid -->

                        <!--
                        <div class="form-actions">
                            <button type="submit" class="btn btn-info">Salvar</button>
                            <button type="button" class="btn" onclick="location.href='?s=posts'">Cancelar</button>
                        </div>
                        -->
                    </form>
                <?php } ?>
            </div>
        </div><!-- End .box -->
    </div><!-- End .span12 -->

</div><!-- End .row-fluid -->
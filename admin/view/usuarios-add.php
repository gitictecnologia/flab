<!-- Build page from here: -->
                   
<div class="row-fluid">

    <div class="span12">

        <div class="box">
            <?php showErros(); ?>

            <div class="title">

                <h4>                    
                    <span>Usuários</span>
                </h4>

            </div>
            <div class="content">

                <form class="form-horizontal" action="action/usuarios.php" method="post">
                    <input type="hidden" name="do" value="cadastra" />

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="normal">Nome</label>
                                <input class="span8" id="normalInput" type="text" name="nome" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="normal">Login</label>
                                <input class="span8" id="normalInput" type="text" name="login" />
                            </div>
                        </div>
                    </div>

                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="normal">Senha</label>
                                <input class="span8" id="normalInput" type="password" name="senha" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row row-fluid">
                        <div class="span12">
                            <div class="row-fluid">
                                <label class="form-label span4" for="conf">Confirme</label>
                                <input class="span8" id="conf" type="password" name="conf" />
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
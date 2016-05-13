
<style>
    .subscribe {
        background-color: #91fa9c;
        padding-top: 46px;
        padding-bottom: 14px;
        color: #6c6c6c;
    }
    .subscribe .title-h1 {
        font-size: 3em;
        font-weight: 900;
    }
    .subscribe .row {
        padding: 20px 0;
        margin-left: -15px;
        margin-right: 15px;
    }

    .subscribe input[type="file"] {
        display: block;
        opacity: 0;
        position: absolute;
        top: 12px;
        color: transparent;
        background: none;
        border: none;
    }

    .subscribe input[type="text"], .subscribe textarea, .subscribe select {
        border: none;
        border-bottom: 1px solid #6c6c6c;
        border-radius: 0px;
        background-color: #91fa9c;
        color: #6c6c6c;
        font-size: 1.3em;
        margin-top: 15px;
        padding: 0px 0px 16px 0px;        
    }

    .subscribe input[name="fakeCurriculoSocio"], .subscribe input[name="fakeAutorizacaoSocio"], .subscribe input[name='fakePptApresentacao'] {
        border-bottom: 4px solid #6c6c6c;
    }

    .subscribe input[type="text"]::input-placeholder,    
    .subscribe textarea::input-placeholder,
    .subscribe select::input-placeholder {
        color: #6c6c6c;
        font-weight: 100;
    } 
    .subscribe input[type="text"]::-webkit-input-placeholder,
    .subscribe textarea::-webkit-input-placeholder,
    .subscribe select::-webkit-input-placeholder { 
        color: #6c6c6c;
        font-weight: 100;
    }
    .subscribe input[type="text"]:-moz-input-placeholder,
    .subscribe textarea:-moz-input-placeholder,
    .subscribe select:-moz-input-placeholder { 
        color: #6c6c6c;
        font-weight: 100;
    }
    .subscribe input[type="text"]::-moz-input-placeholder,
    .subscribe textarea::-moz-input-placeholder,
    .subscribe select::-moz-input-placeholder { 
        color: #6c6c6c;
        font-weight: 100;
    }
    .subscribe input[type="text"]:-ms-input-placeholder,
    .subscribe textarea:-ms-input-placeholder,
    .subscribe select:-ms-input-placeholder {
        color: #6c6c6c;
        font-weight: 100;
    }    

    .subscribe .btn {
        color: #6c6c6c;
        border: 1px solid #6c6c6c;
        border-radius: 0px;        
        font-size: 1em;
        margin-top: 20px;
        padding-left: 60px;
        padding-right: 60px;
    }   

</style>
<section id="subscribe" class="subscribe">
    <div class="row">
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-8">
            <h1 class="title-h1">Inscreva sua startup</h1>        
            
            <div class="row">
                <div class="col-sm-12 col-md-12">

                    <form class="form-horizontal" id="form-subscribe" role="form">
                        <input type="hidden" name="do" value="add"></input>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">                        
                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" value="" required >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">                        
                                <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" placeholder="Nome da Empresa" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="" required>
                            </div>
                        </div>

                        <div class="row">                                                         
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <select class="form-control" id="estado" name="estado" placeholder="Estado" value="" required>
                                            <option value="">Estado</option>
                                            <option value="">São Paulo</option>
                                            <option value="">Rio de Janeiro</option>
                                            <option value="">Pará</option>
                                            <option value="">Bahia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="" required>                                        
                                    </div>                                    
                                </div>
                            </div>                                
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control" id="nomeSocioResponsavel" name="nomeSocioResponsavel" placeholder="Nome do Sócio - responsável pela inscrição" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="" required>
                                    </div>
                                </div>   
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo ou Função" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Telefone Celular" value="" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="fakeCurriculoSocio" name="fakeCurriculoSocio" placeholder="Anexar Currículo dos Sócios" value="">
                                        <input type="file" class="form-control" id="curriculoSocio" name="curriculoSocio" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-1">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        OU
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" class="form-control" id="linkedinSocio" name="linkedinSocio" placeholder="Link Linkedin" value="" required>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control" id="fakeAutorizacaoSocio" name="fakeAutorizacaoSocio" placeholder="Anexar autorização dos demais sócios (se houver)" value="">
                                <input type="file" class="form-control" id="autorizacaoSocio" name="autorizacaoSocio" value="" required>
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea class="form-control" id="descricaoProjetoEmpresa" name="descricaoProjetoEmpresa" placeholder="Breve descrição do projeto e da empresa" rows="4" required ></textarea>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <input type="text" class="form-control" id="fakePptApresentacao" name="fakePptApresentacao" placeholder="Anexar PPT de apresentação" value="">
                                <input type="file" class="form-control" id="pptApresentacao" name="pptApresentacao" value="" required>
                            </div>
                        </div>


                        <div class="row subscribe-resposnse" style="display: none; padding-bottom: 0;">
                            <div class="col-sm-12 col-md-6">                        
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">                        
                                <button type="submit" class="btn btn-cta btn-cta-secondary">Enviar Inscrição</button>
                            </div>
                        </div>
                    </form>
                </div><!--//content-->
            </div><!--//item-->
        </div>
        <div class="col-sm-12 col-md-2"></div>
    </div>
</section>


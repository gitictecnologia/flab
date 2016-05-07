
<style>
    .newsletters {
        background-color: #666666;
        padding-top: 46px;
        padding-bottom: 14px;
        color: #76f983;
    }
    .newsletters .title-h1 {
        font-size: 4.3em;
        font-weight: 900;
    }
    .newsletters .row {
        padding: 20px 0;
    }
    .newsletters input[type="text"] {
        border: none;
        border-bottom: 1px solid #76f983;
        border-radius: 0px;
        background-color: #666666;
        color: #76f983;
        font-size: 1.5em;
        margin-top: 15px;
        padding: 0px 0px 20px 0px;        
    } 
    input[type="text"]::-webkit-input-placeholder { 
        color: #76f983;
        font-weight: 100;
    }
    input[type="text"]:-moz-input-placeholder {
        color: #76f983;
        font-weight: 100;
    }
    input[type="text"]::-moz-input-placeholder {
        color: #76f983;
        font-weight: 100;
    }
    input[type="text"]:-ms-input-placeholder {
        color: #76f983;
        font-weight: 100;
    }

    .newsletters .btn {
        color: #76f983;
        border: 1px solid #76f983;
        border-radius: 0px;        
        font-size: 1em;
        margin-top: 20px;
        padding-left: 60px;
        padding-right: 60px;
    }

</style>
<section id="newsletters" class="section newsletters">
    <div class="container">
        <h1 class="title-h1">Acompanhe as novidades</h1>
        <span>As inscrições começam em <strong>1° de junho</strong>. Deixe seus dados e te avisamos sobre as próximas fases.</span>
    
        <h2 class="title text-center"></h2>
        <div class="row">
            <div class="col-sm-12 col-md-12">

                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-6">                        
                            <input type="text" class="form-control" id="newslettersNome" name="newslettersNome" placeholder="Nome" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">                        
                            <input type="text" class="form-control" id="newslettersNomeEmpresa" name="newslettersNomeEmpresa" placeholder="Nome da Empresa" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">                        
                            <input type="text" class="form-control" id="newslettersEmail" name="newslettersEmail" placeholder="Email" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">                        
                            <button class="btn btn-cta btn-cta-secondary">Cadastrar</button>
                        </div>
                    </div>

                </form>
            </div><!--//content-->
        </div><!--//item-->
    </div>
</section>


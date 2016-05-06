<!-- Build page from here: -->
<div class="row-fluid">
    <div class="span12">
        <div class="centerContent">
            <ul class="bigBtnIcon">
                <li>
                    <a href="?s=empresas" title="Empresas" class="tipB">
                        <span class="icon icomoon-icon-pencil"></span>
                        <span class="txt">Empresas</span>
                        <span class="notification blue"><?= count(Empresa::getAll()) ?></span>
                    </a>
                </li>
                
				<li>
                    <a href="?s=newsletter" title="Newsletter" class="tipB">
                        <span class="icon icomoon-icon-target"></span>
                        <span class="txt">Newsletter</span>
                        <span class="notification blue"><?= count(Newsletter::getAll()) ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- End .span8 -->
</div><!-- End .row-fluid -->
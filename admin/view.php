<?php
    require ("header.php");
?>

<div id="page_content">
        <div id="page_content_inner">
            <h3 class="heading_a uk-margin-bottom">Ordem Alfabética:</h3>

            <ul id="products_sort" class="uk-subnav uk-subnav-pill">
                <li data-uk-sort="product-name:asc"><a href="#">A-z</a></li>
                <li data-uk-sort="product-name:desc"><a href="#">Z-a</a></li>
            </ul>
<div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">
<?php
foreach ($veiculos as $key => $value) {
$categoriaVeiculo = $views->carregaCategoriaUnica($conn, $value["categoria"]);
$combustivelVeiculo = $views->carregaCombustivelUnica($conn, $value["combustivel"]);
$imagemPrincipal = $views->carregaImagemPrincipal($conn, $value["id"]);
?>
<div data-product-name="<?=$value["modelo"];?>">
<div class="md-card md-card-hover-img">
<div class="md-card-head uk-text-center uk-position-relative">
<div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">
<?=$value["preco"]?></div>
<img class="md-card-head-img" src="<?=$imagemPrincipal[0]["url"]?>" alt="Imagem Quebrada"/>
</div>
<div class="md-card-content">
<h4 class="heading_c uk-margin-bottom">
<div class="uk-width-medium-1-1">
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons" style="color: #ac0029;">&#xE613;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><b><?=$value["modelo"]?></b></span>
                                        <span class="uk-text-small uk-text-muted"><?=$value["motor"]?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons" style="color: #ac0029;">&#xEB3C;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?=$categoriaVeiculo[0]["nome"]?></span>
                                        <span class="uk-text-small uk-text-muted"><?=$value["portas"]?> Portas</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons" style="color: #ac0029;">&#xE56D;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading"><?=$combustivelVeiculo[0]["nome"]?></span>
                                        <span class="uk-text-small uk-text-muted"><?=$value["transmissao"]?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
</h4>
<p></p>
<br>
<a class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light uk-position-bottom-right" style="margin: 0 auto; margin-bottom: 5px; margin-right: 3px;" href="views.php?id=<?=$value["id"]?>">Mais Detalhes</a>
</div>
</div>
</div>
<?php

}
?>
</div>
</div>
</div>
<?php
require ("footer.php");
?>
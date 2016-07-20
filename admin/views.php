<?php
    require ("header.php");
    $id = $_GET["id"]; 
    $veiculo = $views->carregaVeiculoUnico($conn, $id);
    $categoriaVeiculo = $views->carregaCategoriaUnica($conn, $veiculo[0]["categoria"]);
	$combustivelVeiculo = $views->carregaCombustivelUnica($conn, $veiculo[0]["combustivel"]);
	$imagemPrincipal = $views->carregaImagemPrincipal($conn, $id);
	$todasImagens = $views->carregaTodasImagensVeiculo($conn, $id);
?>


 <div id="page_content">
        <div id="page_heading">
            <h1><?=$veiculo[0]["modelo"]?></h1>
            <span class="uk-text-muted uk-text-upper uk-text-small"><?=$veiculo[0]["motor"]?></span>
        </div>
        <div id="page_content_inner">

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Fotos
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-margin-bottom uk-text-center">
                               <a href="<?=$imagemPrincipal[0]["url"]?>" data-uk-lightbox> <img src="<?=$imagemPrincipal[0]["url"]?>" alt="Imagem Quebrada" class="img_medium" /></a>
                            </div>
                            <ul class="uk-grid uk-grid-width-small-1-3 uk-text-center" data-uk-grid-margin>
                            <?php
                            	foreach ($todasImagens as $key => $value) {
                            		?>
                            		<li>
                                  	  <a href="<?=$value['url']?>" data-uk-lightbox><img src="<?=$value['url']?>" alt="Imagem Quebrada" class="img_small"/></a>
                               		</li>
                            		<?php
                            		}
                            		?>
                            </ul>
                        </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <ul class="md-list">
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Valor</span>
                                        <span class="md-list-heading uk-text-large uk-text-success"><?=$veiculo[0]["preco"]?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Ano</span>
                                        <span class="md-list-heading uk-text-large"><?=$veiculo[0]["ano"]?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Detalhes
                            </h3>
                        </div>
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium">
                                <div class="uk-width-large-1-2">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Modelo </span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <span class="uk-text-large uk-text-middle"><?=$veiculo[0]["modelo"]?></span>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Motor</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <span class="uk-text-large uk-text-middle"><?=$veiculo[0]["motor"]?></span>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Cor</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <?=$veiculo[0]["cor"]?>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Transmissão</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <?=$veiculo[0]["transmissao"]?>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-3">
                                            <span class="uk-text-muted uk-text-small">Combustível</span>
                                        </div>
                                        <div class="uk-width-large-2-3">
                                            <?=$combustivelVeiculo[0]["nome"]?>
                                        </div>
                                    </div>
                                    <hr class="uk-grid-divider uk-hidden-large">
                                </div>
                                <div class="uk-width-large-1-2">
                                    <p>
                                        <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Categoria</span>
                                        <span class="uk-badge uk-badge-primary"><?=$categoriaVeiculo[0]["nome"]?></span>
                                    </p>
                                    <hr class="uk-grid-divider">
                                    <p>
                                        <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Descriçâo</span>
                                       <?=$veiculo[0]["descricao"]?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Tenho interesse
                            </h3>
                        </div>
                        <div class="md-card-content large-padding">
                            <div class="uk-grid uk-grid-divider uk-grid-medium">
                                <div class="uk-width-large-1-2">
                                    <form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>Nome</label>
                                        <input type="text" class="input-count md-input" id="first_name input_counter"  name="first_name" maxlength="60" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>Sobrenome</label>
                                        <input type="text" class="input-count md-input" id="last_name input_counter"  name="last_name" maxlength="60" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>Email</label>
                                        <input type="text" class="input-count md-input" id="email input_counter"  name="email" maxlength="60" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>Celular</label>
                                        <input type="text" class="input-count md-input" id="mobile input_counter"  name="mobile" maxlength="60" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>Telefone Residencial</label>
                                        <input type="text" class="input-count md-input" id="00NF0000008v201 input_counter"  name="00NF0000008v201" maxlength="60" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider uk-hidden-large">
                                    </div>
                                    <div class="uk-width-large-1-2">
                                    <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-medium-1-1">
                                         <label>CEP</label>
                                        <input type="text" class="input-count md-input" id="zip"  name="zip" maxlength="14" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                     <div class="uk-grid uk-grid-small">
                                     <div class="uk-width-medium-1-1">
                                         <label>CPF</label>
                                        <input type="text" class="input-count md-input" id="00NF0000008v1ye"  name="00NF0000008v1ye" maxlength="15" required/>
                                    </div>
                                    </div>
                                    <hr class="uk-grid-divider">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-large-1-1">
                                            <button id="envis" type="submit" class="md-btn md-btn-primary" style="width: 100%;">Enviar</button>
                                        </div>
                                    </div>
<input  id="00NF0000008v1yP" maxlength="10" name="00NF0000008v1yP" size="20" type="hidden" value="91624"/>
<input  id="00NF0000008v1yU" maxlength="10" name="00NF0000008v1yU" size="20" type="hidden" />
<input type="hidden"  id="00NF0000008vI1R" name="00NF0000008vI1R" rows="3" type="text" wrap="soft" value="<?="Código do Veículo - ".$id?>">
<input type="hidden" id="lead_source" name="lead_source" value="Site da concessionária">
<input type="hidden"  id="00NF000000CXhVk" name="00NF000000CXhVk" title="Sub-origem" value="Landing pages">
<input  id="00NF0000008vqVG" maxlength="50" name="00NF0000008vqVG" size="20" type="hidden" />
<input  id="00NF000000CGCsC" maxlength="100" name="00NF000000CGCsC" size="20" type="hidden" value="Site - Novos" />
<input  id="00NF000000CGCsH" maxlength="100" name="00NF000000CGCsH" size="20" type="hidden" value="Site - Novos"/>
<input  id="00NF000000CGCsM" maxlength="100" name="00NF000000CGCsM" size="20" type="hidden" value="Site - Novos"/>
<input  id="00NF000000CGCsR" maxlength="100" name="00NF000000CGCsR" size="20" type="hidden" value="Site - Novos"/>
<input type="hidden" value="Vendas" id="00NF0000008v1z8" name="00NF0000008v1z8" title="Grupo do produto">
<input id="00NF000000CWcsx" maxlength="10" name="00NF000000CWcsx" size="20" type="hidden" />
<input type=hidden name="oid" value="00DA0000000Allh">
<input type=hidden name="retURL" value="http://venturefiat.com/novos/">
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php
require ("footer.php");
?>

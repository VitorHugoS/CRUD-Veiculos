<?php
    require ("header.php");
    require ("sidebar.php");
    $id = $_GET["id"]; 
    $veiculo = $views->carregaVeiculoUnico($conn, $id);
    $categoriaVeiculo = $views->carregaCategoriaUnica($conn, $veiculo[0]["categoria"]);
    $combustivelVeiculo = $views->carregaCombustivelUnica($conn, $veiculo[0]["combustivel"]);
    $imagemPrincipal = $views->carregaImagemPrincipal($conn, $id);
    $todasImagens = $views->carregaTodasImagensVeiculo($conn, $id);
?>
<div id="page_content">
        <div id="page_content_inner">
        <div id="form">
        	<!--Modelo-->
            <h1>Atualizar Veículo</h1>
             <div class="md-card">
                    <div class="md-card-content">
                    <h3 class="heading_a">
                        Envie as fotos do veículo
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                         <form id="uploadimage" method="post" enctype="multipart/form-data" id="uploadimage" action="">
                         <input type="hidden" name="idv" value="<?=$id?>"></input>
                            <div id="file_upload-drop" class="uk-file-upload">
                                <p class="uk-text">Arrate os arquivos</p>
                                <p class="uk-text-muted uk-text-small uk-margin-small-bottom">ou</p>
                                <a class="uk-form-file md-btn">Escolha o arquivo<input id="file_upload-select" name="file[]" type="file" multiple></a>
                            </div>
                            <div id="file_upload-progressbar" class="uk-progress uk-hidden">
                                <div class="uk-progress-bar" style="width:0">0%</div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                     <div class="uk-width-1-1">
                      <ul class="uk-nestable" id="nestable">
                      <?php
                      foreach ($todasImagens as $key => $value) {
                        ?>
                         <li id="<?=$value["id"]?>" class='uk-nestable-item'><div class='uk-nestable-panel'><img src='<?=$value["url"]?>' alt='teste' style='width: 100px;'><br/><span class='uk-text-muted uk-text-small'><a href="#" onclick="apagarimg(<?=$value["id"]?>)">Apagar</a></span></div></li>
                        <?php
                      }
                      ?>
                      </ul>
                     </div>
                    </div>
                    </form>
                </div>
            </div> 

        	 <div class="md-card">
	                <div class="md-card-content">
	                    <div class="uk-grid">
	                    	<div class="uk-width-1-1">
	                            <div class="uk-form-row">
	                            <label>Modelo</label>
	                            	 <input type="text" class="input-count md-input" id="input_counter" name="modelo" maxlength="70" value="<?=$veiculo[0]["modelo"]?>"/>
               					</div>
	                        </div>
	                    </div>
	                </div>
	        </div>
        	<!--Modelo-->
        	<!--dados veiculo-->
        	 <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <label>Ano</label>
                            <input type="text" class="input-count md-input" id="input_counter" name="ano" value="<?=$veiculo[0]["ano"]?>" maxlength="60" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label>Motor</label>
                            <input type="text" class="input-count md-input" value="<?=$veiculo[0]["motor"]?>" id="input_counter" name="motor" maxlength="60" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label>Código do Veículo</label>
                            <input type="text" class="input-count md-input" value="<?=$veiculo[0]["codigo"]?>" id="input_counter" name="codigo" maxlength="60" />
                        </div>
                    </div>
                </div>
            </div>
             <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <label>Combustível</label>
                            <select name="combustivel" data-md-selectize>
                                <option value="">Selecione...</option>
                                <?php
                                foreach ($combustivel as $key => $value) {
                                    $select = ($value['id']==$veiculo[0]['combustivel'])?'selected':'';
                                    echo "<option value='".$value["id"]."' ".$select.">".$value["nome"]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label>Cor</label>
                            <input type="text" class="input-count md-input" id="input_counter" value="<?=$veiculo[0]["cor"]?>" name="cor" maxlength="60" />
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label for="masked_currency">Preço</label>
                            <input class="md-input masked_input" id="masked_currency" value="<?=$veiculo[0]["preco"]?>" name="preco" type="text" data-inputmask="'alias': 'currency', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'R$ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-3">
                            <label>Categoria</label>
                             <select name="categoria" data-md-selectize>
                                <option value="">Selecione...</option>
                                <?php
                                foreach ($categorias as $key => $value) {
                                    $select = ($value['id']==$veiculo[0]['categoria'])?'selected':'';
                                    echo "<option value='".$value["id"]."' ".$select.">".$value["nome"]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label>Transmissão</label>
                             <select name="transmissao" data-md-selectize>
                                <option value="" <?=($value['id']==$veiculo[0]['transmissao'])?'selected':''?>>Selecione...</option>
                                <option value="Automático" <?=('Automático'==$veiculo[0]['transmissao'])?'selected':''?>>Automático</option>
                                <option value="Manual" <?=('Manual'==$veiculo[0]['transmissao'])?'selected':''?>>Manual</option>
                            </select>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <label>Portas</label>
                             <select name="porta" data-md-selectize>
                                <option value="">Selecione...</option>
                                <option value="1" <?=(1==$veiculo[0]['portas'])?'selected':''?>>1</option>
                                <option value="2" <?=(2==$veiculo[0]['portas'])?'selected':''?>>2</option>
                                <option value="3" <?=(3==$veiculo[0]['portas'])?'selected':''?>>3</option>
                                <option value="4" <?=(4==$veiculo[0]['portas'])?'selected':''?>>4</option>
                                <option value="5" <?=(5==$veiculo[0]['portas'])?'selected':''?>>5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modelo-->
        	<!--Textarea-->
	        <div class="md-card">
	                <div class="md-card-content">
	                    <h3 class="heading_a">Descrição</h3>
	                    <div class="uk-grid">
	                        <div class="uk-width-1-1">
	                            <div class="uk-form-row">
	                                <textarea name="desc" id="wysiwyg_ckeditor" cols="30" rows="20">
                                    <?=$veiculo[0]["descricao"]?>
	            					</textarea>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                
	        </div>
	        <!--Textarea-->
	        <div class="md-card" style="height: 105px;">
	                <div class="md-card-content">
	                <div class="md-fab-wrapper md-fab-in-card">
                                <a class="md-fab md-fab-success md-fab-wave-light waves-effect waves-button waves-light" href="#" onclick="enviar(<?=$id?>);return false;"><i class="material-icons">&#xE877;</i></a>
                    </div>
	                </div>
	        </div>
	        </div>
		</div>
</div>
<script type="text/javascript">
    function enviar(value){
        var modelo = $("input[name=modelo]").val();
        var ano = $("input[name=ano]").val();
        var motor = $("input[name=motor]").val();
        var codigo = $("input[name=codigo]").val();
        var combustivel = $("select[name=combustivel]").val();
        var cor = $("input[name=cor]").val();
        var preco = $("input[name=preco]").val();
        var categoria = $("select[name=categoria]").val();
        var transmissao = $("select[name=transmissao]").val();
        var portas = $("select[name=porta]").val();
        var descricao = $("textarea[name=desc]").val();
        var id = value;
        //envia dados para pagina de cadastro!
        $.ajax({
            type: "POST",
            url: "actions/atualizar.php",
            data:{id: id, modelo: modelo, ano: ano, motor: motor, codigo: codigo, combustivel: combustivel, cor: cor, preco: preco, categoria: categoria, transmissao: transmissao, portas: portas, descricao: descricao},
            success: function(data){
             if(data==0){
                 alert('erro');
             } else{
                alert("Veiculo atualizado");
             }
            }       
        });
    }
</script>
<?php
require ("footer.php");
?>
  <script src="assets/js/pages/forms_wysiwyg.min.js"></script>
    <!-- inputmask-->
    <script src="bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!-- ckeditor -->
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="bower_components/ckeditor/adapters/jquery.js"></script>
    <!--  forms advanced functions -->
    <script src="assets/js/pages/forms_advanced.min.js"></script>
    <!--  forms_file_upload functions -->
    <script src="assets/js/pages/forms_file_upload.min.js"></script>
    <!--  nestable component functions -->
    <script src="assets/js/pages/components_nestable.min.js"></script>
    <script type="text/javascript">
$("#file_upload-select").change(function(input){
    input.preventDefault();
   //upload jquery fotos
   var fd = new FormData(); 
   fd.append( 'id', $("input[name=idv]").val());   
   for(var i = 0; i < input.target.files.length; i++){
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#nestable").append("<li data-id='"+i+"' class='uk-nestable-item'><div class='uk-nestable-panel'><img id='imgs"+i+"' src='"+e.target.result+"' alt='teste' style='width: 100px;'><br/><span class='uk-text-muted uk-text-small'></span></div></li>");
            }
            reader.readAsDataURL(input.target.files[i]);
            fd.append( 'file['+i+']', input.target.files[i]);
        }
        console.log(fd);
$.ajax({
url: "actions/cadastro_img.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: fd, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
    {
        $(".enviou").fadeOut();
        $(".finalizar").fadeIn();
    }
});
});
function apagarimg(value){
    $.ajax({
            type: "POST",
            url: "actions/apagar_img.php",
            data:{id: value},
            success: function(data){
             if(data==0){
                 alert('Erro ao deletar este item!');
             } else{
                $("#"+value).fadeOut();
             }
            }       
    });
}
</script>
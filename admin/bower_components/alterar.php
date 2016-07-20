<?php
    require ("header.php");
    require ("sidebar.php");
?>
 <div id="page_content">

        <div id="page_heading" data-uk-sticky="{ top: 48, media: 960 }">
            <h1>Veículos</h1>
            <span class="uk-text-upper uk-text-small"><a href="#">Venture Fiat</a></span>
        </div>

        <div id="page_content_inner">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-overflow-container uk-margin-bottom">
                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_issues">
                            <thead>
                                <tr>
                                    <th class="uk-text-center">Código</th>
                                    <th>Modelo</th>
                                    <th>Motor</th>
                                    <th>Cor</th>
                                    <th>Ano</th>
                                    <th>Transmissão</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th class="uk-text-center">Código</th>
                                    <th>Modelo</th>
                                    <th>Motor</th>
                                    <th>Cor</th>
                                    <th>Ano</th>
                                    <th>Transmissão</th>
                                    <th>Categoria</th>
                                </tr>
                            </tfoot>
                            <tbody>
<?php
foreach ($veiculos as $key => $value) {
$categoriaVeiculo = $views->carregaCategoriaUnica($conn, $value["categoria"]);
?>
								<tr>
                                    <td class="uk-text-center"><span class="uk-text-small uk-text-muted uk-text-nowrap"><?=$value["codigo"]?></span></td>
                                    <td>
                                        <a href="page_issue_details.html"> <?=$value["modelo"]?></a>
                                    </td>
                                    <td><?=$value["motor"]?></td>
                                    <td><span class="uk-badge uk-badge-warning"><?=$value["cor"]?></span></td>
                                    <td class="uk-text-small"><?=$value["ano"]?></td>
                                    <td class="uk-text-small"><?=$value["transmissao"]?></td>
                                    <td><span class="uk-badge uk-badge-outline uk-text-upper"><?=$categoriaVeiculo[0]["nome"]?></span></td>
                                </tr>
<?php
}
?>
                            </tbody>
                        </table>
                    </div>
                    <ul class="uk-pagination ts_pager">
                        <li data-uk-tooltip title="Select Page">
                            <select class="ts_gotoPage ts_selectize"></select>
                        </li>
                        <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                        <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                        <li><span class="pagedisplay"></span></li>
                        <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                        <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                        <li data-uk-tooltip title="Page Size">
                            <select class="pagesize ts_selectize">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

<?php
require ("footer.php");
?>

 <!-- page specific plugins -->
    <!-- tablesorter -->
    <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/widgets/widget-alignChar.min.js"></script>
    <script src="bower_components/tablesorter/dist/js/extras/jquery.tablesorter.pager.min.js"></script>

    <!--  issues list functions -->
    <script src="assets/js/pages/pages_issues.min.js"></script>
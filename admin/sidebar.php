 <?php
$path_parts = pathinfo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$atual=$path_parts['filename'];
 ?>
 <aside id="sidebar_main">
        <div class="menu_section">
            <ul>
                <li class="<?=($atual=='index')?"current_section":""?><?=($atual=='admin')?"current_section":""?>" title="Dashboard">
                    <a href="/admin/admin">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Home</span>
                    </a>
                </li>
                <li class="<?=($atual=='adicionar')?"current_section":""?><?=($atual=='alterar')?"current_section":""?>">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE8F1;</i></span>
                        <span class="menu_title">Carros</span>
                    </a>
                    <ul>
                        <li class="<?=($atual=='adicionar')?"act_item":""?>"><a href="adicionar.php">Adicionar</a></li>
                        <li class="<?=($atual=='alterar')?"act_item":""?><?=($atual=='atualizarVeiculo')?"act_item":""?>"><a href="alterar.php">Listar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside><!-- main sidebar end -->
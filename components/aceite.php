<h4 class="card-title text-center" style="background-image: linear-gradient(to right,#1cbf10, #4e41fe); color: white; padding: 10px">Aceite </h4>
<?php 
if($_SESSION['CD_PERFIL'] == 2){ // Gerente
    $link = "regulamento_gerentes.php";
} else if($_SESSION['CD_PERFIL'] == 3){ // Supervisor
    $link = "regulamento_supervisor.php";
} else if($_SESSION['CD_PERFIL'] == 4){ // Representante
    $link = "regulamento_geral.php";
} else if($_SESSION['CD_PERFIL'] == 5){ // Fornecedor
    $link = "#";
} else if($_SESSION['CD_PERFIL'] == 6){ // Diretor / Adm / GR
    $link = "regulamento_grs.php";
}

$SQL = "select * from usuarios where cd_codigo = '".$_SESSION['CD_CODIGO']."'";
$RSS = mysql_query($SQL, $conexao);
$RS = mysql_fetch_array($RSS);

if($RS['cd_aceite'] == 0){ ?>
    <h5 class="text-center">Você ainda não realizou o aceite. <br> Clique <a href="<?= $link ?>">aqui</a> para ser redirecionado ao regulamento</h5>
    <div class="text-center">
        <img src="images/icone_nao.png" width="50px">
    </div>
<?php } else { ?>
    <h5 class="text-center">Você já realizou o aceite, boa campanha!</h5>
    <div class="text-center">
        <img src="images/icone_sim.png" width="50px">
    </div>
<?php } ?>
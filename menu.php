<?php include "administrar/restricao_de_login.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl7/2/1D5D9Jab7G5hJ18ZJ5NSl4f+5m5iufz/jnsXKAIzS0Fi3qUVb4RI2Qemog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Lexend';
        }

        .menu-toggle {
            font-size: 30px;
            cursor: pointer;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
            background-color: white;
            color: #34495e;
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .inner-wrapper {
            width: 270px;
            background-color: white;
            position: fixed;
            top: 0;
            left: -270px;
            height: 100%;
            overflow-y: auto;
            z-index: 1000;
            color: black;
            transition: left 0.3s ease;
            scrollbar-width: thin;
            scrollbar-color: lightgray white;
        }

        .inner-wrapper.open {
            left: 0;
        }

        .inner-wrapper a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 16px;
        }

        .inner-wrapper a:hover {
            background-color: lightgrey;
        }

        .inner-wrapper i {
            padding-right: 10px;
        }

        .inner-wrapper .logo-menu {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid black;
        }

        .nav-children {
            list-style-type: none;
            padding-left: 20px;
            display: none;
        }

        .nav-children.open {
            display: block;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            background-color: #ecf0f1;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .has-children i.fa-chevron-right {
            transition: transform 0.4s ease;
        }

        .has-children.open i.fa-chevron-right {
            transform: rotate(90deg);
        }

        .sublinhado {
            background-color: #ffe200;
            padding: 6px;
            border-radius: 7px;
            color: black;
        }

        .btn-sair {
            background-color: #fac6c8;
            border-radius: 7px;
            text-align: center;
            padding: 10px;
            margin: 0px 10px;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background-image: linear-gradient(to bottom, #0009BD, #4CDAFF);
            border-radius: 10px;
        }

        .header-nome {
            background-image: linear-gradient(to right, #FF2F07, #FFD003);
            color: white;
            padding: 5px;
            margin: 10px;
            border-radius: 30px;
        }

        .header-aceite {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
            border-radius: 10px;
        }

        .alerta-piscando {
            color: red;
            font-weight: bold;
            margin-left: 5px;
            animation: piscar 2s infinite;
        }

        @keyframes piscar {

            0%,
            50%,
            100% {
                opacity: 1;
            }

            25%,
            75% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>


    <?php

    $perfil = $_SESSION['CD_PERFIL'];

    include "./administrar/restricao_de_login.php";
    include  "./variaveis_globais.php";

    $SQL = "select * from usuarios where cd_codigo = '" . $_SESSION['CD_CODIGO'] . "'";
    $RSS = mysql_query($SQL, $conexao);
    $RS = mysql_fetch_array($RSS);
    $deuAceite = $RS['cd_aceite'];
    if (!empty($RS['foto'])) {
        $img_usuario = $RS['foto'];
    } elseif (!empty($RS['avatar_url'])) {
        $img_usuario = $RS['avatar_url'];
    }

    if ($_SESSION['CD_PERFIL'] == 2) { // Gerente
        $link = "regulamento_gerentes.php";
    } else if ($_SESSION['CD_PERFIL'] == 3) { // Supervisor
        $link = "regulamento_supervisor.php";
    } else if ($_SESSION['CD_PERFIL'] == 4) { // Representante
        $link = "regulamento_geral.php";
    } else if ($_SESSION['CD_PERFIL'] == 5) { // Fornecedor
        $link = "#";
    } else if ($_SESSION['CD_PERFIL'] == 6) { // Diretor / Adm / GR
        $link = "regulamento_grs.php";
    }

    ?>

    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <div class="inner-wrapper" id="sidebar">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul style="padding-left: 0">
                    <div style="display: flex; justify-content: center; margin-top: 20px">
                        <?php if ($img_usuario) { ?>
                            <img src="<?= $img_usuario ?>" class="logo-menu">
                        <?php } else { ?>
                            <a href="envio_foto.php"><img src="images/envie_sua_foto.png" class="logo-menu"></a>
                        <?php } ?>
                    </div>
                    <h6 class="header-nome">
                        <div style="margin-left: 20px;">
                            <b><?= $_SESSION['DS_USUARIO'] ?></b><br>
                            <?= $_SESSION['CD_CODIGO'] ?> - GRUPO 
                            <?php if($_SESSION['CD_GRUPO'] == '6'){
                                echo "GDM";
                            } else if($_SESSION['CD_GRUPO'] == '21'){
                                echo " 1 RS";
                            } else if($_SESSION['CD_GRUPO'] == '22'){
                                echo " 2 RS";
                            } else {
                                echo $_SESSION['CD_GRUPO'];
                            } ?>
                        </div>
                    </h6>
                    <div class="header-aceite" style="background-color: <?= $deuAceite ? '#c6fac9' :  '#fac6c8' ?>">
                        Aceite:
                        <?php if ($deuAceite) { ?>
                            <img src="images/icone_sim.png" width="30px">&nbsp;Sim
                        <?php } else { ?>
                            <a href="<?= $link ?>"><img src="images/icone_nao.png" width="30px"></a>Não
                        <?php } ?>
                    </div>
                    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Página Inicial</a>
                    <a href="envio_foto.php">
                        <i class="fa fa-camera" aria-hidden="true"></i> Perfil
                        <?php if (!$img_usuario) { ?>
                            <span class="alerta-piscando">!</span>
                        <?php } ?>
                    </a>
                    <a href="regulamento_geral.php"><i class="fa fa-file-text-o" aria-hidden="true"></i>Regulamento</a>
                    <?php if ($perfil != '4') { ?>
                        <a href="pagina_aceites.php"><i class="fa fa-check" aria-hidden="true"></i>Aceites</a>
                    <?php } ?>
                    <a href="grupos.php"><i class="fa fa-users" aria-hidden="true"></i>Grupos</a>


                    <a href="#" class="has-children">
                        <i class="fa fa-bullseye" aria-hidden="true"></i>Produtos Participantes
                        <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>
                    </a>
                    <ul class="nav-children">
                        <a href="pontos.php">Pontuações</a>
                        <a href="mix_estrela.php">Mix Estrela</a>
                    </ul>


                    <a href="parciais_grupos_gerais.php"><i class="fa fa-calendar" aria-hidden="true"></i><span class="sublinhado">Parciais grupos gerais</span></a>
                    <a href="parciais_viagem.php"><i class="fa fa-plane" aria-hidden="true"></i>Moral em casa</a>
                    <a href="#" class="has-children">
                        <i class="fa fa-trophy" aria-hidden="true"></i>Bingos
                        <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>
                    </a>
                    <ul class="nav-children">

                        <!--
                        1 - ADMINISTRADOR
                        2 - GERENTE
                        3 - SUPERVISOR
                        4 - VENDEDOR
                        6 - DIRETOR
                        -->

                        <li><a href="bingo_geral.php">Bingo grupos</a></li>

                        <li><a href="bingo_ouro_sup.php">Super Bingo Ouro</a></li>
                        <?php
                        $mesAtual = date('n');
                        $grupo = 0;

                        switch ($mesAtual) {
                            case 11:
                                $grupo = 1;
                                break;
                            case 12:
                                $grupo = 2;
                                break;
                            case 1:
                                $grupo = 3;
                                break;
                            case 2:
                                $grupo = 4;
                                break;
                        }
                        ?>
                        <li><a href="bingo_mix_estrela.php?grupo-<?= $grupo ?>">Bingo Mix Estrela</a></li>

                    </ul>
                    <a href="#" class="has-children">
                        <i class="fa fa-rocket" aria-hidden="true"></i>Aceleradores
                        <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>
                    </a>
                    <ul class="nav-children">
                        <li><a href="aceleradores.php">Aceleradores</a></li>
                        <li><a href="aceleradores_por_venda.php">Aceleradores Venda</a></li>
                    </ul>
                    <a href="memorias.php"><i class="fa fa-camera" aria-hidden="true"></i>Memórias</a>
                    <!-- <a href="fornecedores"><i class="fa fa-users" aria-hidden="true"></i>Fornecedores</a> -->
                    <a href="acomp_venda_cvm.php"><i class="fa fa-money" aria-hidden="true"></i>Acomp. Venda CVM</a>
                    <a href="log_pontuacao.php"><i class="fa fa-star" aria-hidden="true"></i>Acomp. Detalhado de Ptos</a>


                    <?php
                    // Aparecer para Supervisores, Diretores, Adm, Gerente e GR
                    if (in_array($perfil, ['1', '2', '3', '5', '6'])) { ?>
                        <a href="#" class="has-children" style="border-top: 1px solid lightgray;">
                            <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>Supervisor / Consultor
                        </a>
                        <ul class="nav-children">
                            <li><a href="regulamento_supervisor.php"><i class="fa fa-bars"></i>Regulamento</a> </li>
                            <li><a href="parciais_supervisor.php"><i class="fa fa-file-text"></i>Parciais Fase 01</a> </li>
                            <li><a href="parciais_supervisor_prata.php?grupo-<?= $grupo ?>"><i class="fa fa-file-text"></i>Parciais Bingo Mix Estrela</a> </li>
                            <li><a href="parciais_supervisor_viagem.php"><i class="fa fa-file-text"></i>Parciais Moral em Casa</a> </li>
                        </ul>
                    <?php }

                    // Aparecer para Diretores, Adm, Gerente e GR
                    if (in_array($perfil, ['1', '2', '5', '6'])) { ?>
                        <a href="#" class="has-children">
                            <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>Gerente
                        </a>
                        <ul class="nav-children">
                            <li><a href="regulamento_gerentes.php"><i class="fa fa-bars"></i>Regulamento</a> </li>
                            <li><a href="parciais_gerentes.php"><i class="fa fa-file-text"></i>Parciais Gerentes</a> </li>
                            <li><a href="parciais_gerentes_prata.php"><i class="fa fa-file-text"></i>Parciais Gerentes - Mix Estrela</a> </li>
                        </ul>
                    <?php }

                    // Aparecer para Diretores, Adm e GR
                    if (in_array($perfil, ['1', '6'])) { ?>
                        <a href="#" class="has-children">
                            <i class="fa fa-chevron-right" aria-hidden="true" style="float: right;"></i>GR
                        </a>
                        <ul class="nav-children">
                            <li><a href="regulamento_grs.php"><i class="fa fa-bars"></i>Regulamento</a> </li>
                        </ul>
                    <?php } ?>
                    <br>
                    <br>
                    <a href="/campanhas/cvm/login.php" class='btn-sair'>Sair</a>
                </ul>
            </nav>
        </div>
    </div>
    <?php include "components/fale_conosco.php" ?>
    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            const content = document.querySelector('.content');
            sidebar.classList.toggle('open');
            content.classList.toggle('shifted');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const hasChildren = document.querySelectorAll('.has-children');
            hasChildren.forEach(parent => {
                parent.addEventListener('click', (e) => {
                    e.preventDefault();
                    const nextSibling = parent.nextElementSibling;
                    if (nextSibling && nextSibling.classList.contains('nav-children')) {
                        nextSibling.classList.toggle('open');
                        parent.classList.toggle('open');
                    }
                });
            });
        });
    </script>
</body>

</html>
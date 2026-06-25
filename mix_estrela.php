<?php
include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if ($_SESSION["CD_USUARIO"] == "") {
    echo "<script language='javascript'>window.open('login.php', '_self');</script>";
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?php echo $Titulo; ?></title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
    <meta http-equiv="content-language" content="pt" />
    <meta itemprop="description" name="description" content="" />
    <meta name="robots" content="no follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="js/Toggle-Menu/menu.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <style>
        .tab-content {
            display: none;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 10px;
        }

        .produto-card {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .produto-card p {
            padding: 0px;
        }

        .produto-card:hover {
            transform: scale(1.01);
        }

        .produto-card img {
            width: 100%;
            height: 150px;
            object-fit: contain;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .tabs7-select {
            display: none;
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        @media (max-width: 768px) {
            .tabs7 {
                display: none;
            }

            .tabs7-select {
                display: block;
            }
        }
    </style>
</head>

<body style="margin-top:-25px;">
    <?php include "loading.php" ?>
    <?php include "menu.php"; ?>
    <div class="clearfix"></div>
    <div class="container">
        <div style="margin-top: 80px">
            <div class="container" style="display: flex; justify-content: space-between;">
                <h3>Produtos Mix Estrela</h3>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <h5>
                        Clique <a href="download/pontuacao_mix_estrela.xlsx" style="color: green; text-decoration: underline;">aqui</a> para baixar a planilha
                    </h5>

                    <?php if ($_SESSION['CD_PERFIL'] == '6') { ?>
                        <form action="upload_pontuacao.php" method="post" enctype="multipart/form-data" style="display: flex; align-items: center; gap: 10px;">
                            <input type="hidden" name="destino" value="pontuacao_mix_estrela">
                            <label for="fileUpload" style=" background-color: #007bff; color: white; padding: 8px 16px; border-radius: 5px; cursor: pointer; font-size: 14px;">
                                Enviar planilha
                            </label>
                            <input type="file" id="fileUpload" name="fileUpload" accept=".xlsx, .xls" style="display: none;" onchange="this.form.submit()">
                        </form>
                    <?php } ?>
                </div>

            </div>
        </div>
        <div class="portfolio_four">
            <div class="tabs-content7">
                <div class="tabs-panel7">

                    <?php
                    $fornecedores = [];

                    $SQL = "SELECT * FROM clifor_prata order by ds_razao";
                    $RSS = mysql_query($SQL);
                    while ($RS = mysql_fetch_array($RSS)) {
                        $fornecedores[] = $RS['cd_fornecedor'];
                    }
                    ?>

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <select class="tabs7-select" onchange="changeTab(this)">
                            <option value="">Selecione um fornecedor</option>
                            <?php foreach ($fornecedores as $codigo) {
                                $SQL = "SELECT ds_razao from clifor_prata where cd_fornecedor = '$codigo'";
                                $RSS = mysql_query($SQL, $conexao);
                                $RS = mysql_fetch_array($RSS);
                            ?>
                                <option value="#Grupo-<?= $codigo ?>"><?= $RS['ds_razao'] ?></option>
                            <?php } ?>
                        </select>

                        <ul class="tabs7">
                            <?php foreach ($fornecedores as $codigo) {
                                $SQL = "SELECT ds_razao from clifor_prata where cd_fornecedor = '$codigo'";
                                $RSS = mysql_query($SQL);
                                $RS = mysql_fetch_array($RSS);
                            ?>
                                <li style="list-style: none;">
                                    <a href="#Grupo-<?= $codigo ?>" data-target="<?= $codigo ?>" class="tab-link" target="_self" style="font-size: 11px;">
                                        <?= $RS['ds_razao'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div style="display: flex; gap: 10px;">
                            <button id="btnTabela" style="background-color: #287e51; color: white; border: none; padding: 8px 14px; border-radius: 6px; cursor: pointer;">
                                Mostrar por Tabela
                            </button>
                            <button id="btnGrid" style="background-color: #2c3e50; color: white; border: none; padding: 8px 14px; border-radius: 6px; cursor: pointer;">
                                Mostrar por Imagens
                            </button>
                        </div>
                    </div>
                    <br>
                    
                    <div style="text-align: right; display: none;" id="searchDiv">
                        <label style="display: inline-block; margin-bottom: 5px; font-weight: bold;">Pesquisar
                            <input type="text" id="searchGrid" placeholder="Buscar registros" style="border: 1px solid #aaa; border-radius: 3px; padding: 5px; background-color: transparent;">
                        </label>
                    </div>

                    <?php foreach ($fornecedores as $codigo) { ?>
                        <div class="tab-section" id="<?= $codigo ?>">

                            <div class="table-style tab-content tabela" style="display: block;">
                                <table class="table-list2">
                                    <thead>
                                        <tr>
                                            <th>CÓDIGO</th>
                                            <th>CÓDIGO DE BARRAS</th>
                                            <th>DESCRIÇÃO</th>
                                            <th>FORNECEDOR</th>
                                            <th>CÓDIGO FORNECEDOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $SQL =  "SELECT B1_COD, MIN(B1_CODBAR) AS B1_CODBAR, MIN(B1_DESC) AS B1_DESC, MIN(A5_NOMEFOR) AS A5_NOMEFOR FROM SIGA.SA5010 A5, SIGA.SB1010 B1 WHERE A5_FORNECE = '$codigo' AND A5_FILIAL in ('09','10') AND B1_COD = A5_PRODUTO AND B1_FILIAL = A5_FILIAL AND A5.D_E_L_E_T_ = ' ' AND B1.D_E_L_E_T_ = ' ' GROUP BY B1_COD ORDER BY B1_DESC ASC";
                                        // echo $SQL;
                                        $RSS = oci_parse($oraconnect, $SQL);
                                        oci_execute($RSS, OCI_DEFAULT);
                                        while ($RS = oci_fetch_assoc($RSS)) { ?>
                                            <tr>
                                                <td><?= $RS['B1_COD'] ?></td>
                                                <td><?= $RS['B1_CODBAR'] ?></td>
                                                <td><?= $RS['B1_DESC'] ?></td>
                                                <td><?= $RS['A5_NOMEFOR'] ?></td>
                                                <td><?= $codigo ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="grid-style tab-content grid" style="display: none;">
                                <div class="grid-container"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php include "footer.php"; ?>

    <script>
        function changeTab(select) {
            const value = select.value;
            if (value) {
                const target = document.querySelector(`a[href="${value}"]`);
                if (target) target.click();
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabSections = document.querySelectorAll('.tab-section');
            
            // Seletores com IDs e Fallbacks
            const tabelaBtn = document.getElementById('btnTabela') || document.querySelector('button:nth-child(1)');
            const gridBtn = document.getElementById('btnGrid') || document.querySelector('button:nth-child(2)');
            const searchInput = document.getElementById('searchGrid');
            const searchDiv = document.getElementById('searchDiv');

            let modoGrid = false;
            let imagensCarregadas = {};

            tabSections.forEach(section => section.style.display = 'none');

            if (tabSections.length > 0) {
                tabSections[0].style.display = 'block';
                tabSections[0].querySelector('.tabela').style.display = 'block';
                tabSections[0].querySelector('.grid').style.display = 'none';
            }

            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const termo = this.value.toLowerCase();
                    
                    const abaAtiva = document.querySelector('.tab-section:not([style*="display: none"])');
                    if (!abaAtiva) return;

                    const cards = abaAtiva.querySelectorAll('.grid-container .produto-card');

                    cards.forEach(card => {
                        const textoCard = card.textContent.toLowerCase();
                        if (textoCard.includes(termo)) {
                            card.style.display = ''; 
                        } else {
                            card.style.display = 'none'; 
                        }
                    });
                });
            }

            function atualizarModo() {
                const ativo = document.querySelector('.tab-section:not([style*="display: none"])');
                if (!ativo) return;

                const grid = ativo.querySelector('.grid');
                const tabela = ativo.querySelector('.tabela');

                if (modoGrid) {
                    grid.style.display = 'block';
                    tabela.style.display = 'none';

                    if(searchDiv) {
                        searchDiv.style.display = 'block';
                    }

                    const codigo = ativo.id;
                    if (!imagensCarregadas[codigo]) {
                        fetch('ajax_carregar_imagens.php?fornecedor=' + codigo)
                            .then(res => res.text())
                            .then(html => {
                                ativo.querySelector('.grid-container').innerHTML = html;
                                imagensCarregadas[codigo] = true;
                                
                                if(searchInput && searchInput.value !== '') {
                                    searchInput.dispatchEvent(new Event('keyup')); 
                                }
                            });
                    }
                } else {
                    grid.style.display = 'none';
                    tabela.style.display = 'block';

                    if(searchDiv) {
                        searchDiv.style.display = 'none';
                        if(searchInput) searchInput.value = '';
                    }

                    const cards = ativo.querySelectorAll('.grid-container .produto-card');
                    cards.forEach(c => c.style.display = '');
                }
            }

            tabLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('data-target');

                    tabSections.forEach(section => section.style.display = 'none');
                    const ativo = document.getElementById(targetId);
                    ativo.style.display = 'block';

                    if(searchInput) searchInput.value = '';
                    const cards = ativo.querySelectorAll('.grid-container .produto-card');
                    cards.forEach(c => c.style.display = '');

                    atualizarModo();
                });
            });

            if(gridBtn) {
                gridBtn.addEventListener('click', () => {
                    modoGrid = true;
                    atualizarModo();
                });
            }

            if(tabelaBtn) {
                tabelaBtn.addEventListener('click', () => {
                    modoGrid = false;
                    atualizarModo();
                });
            }
        });
    </script>

    <script type="text/javascript" src="js/universal/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table-list2').DataTable({
                pageLength: 50,
                "order": [],
                language: {
                    url: "js/datatable/pt_br.json"
                }
            });
        });
    </script>
    </section>
</body>

</html>
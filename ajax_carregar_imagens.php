<?php include "administrar/ora_connect.php";

$codigo = $_GET['fornecedor'];

$SQL =  "SELECT B1_COD, MIN(B1_CODBAR) AS B1_CODBAR, MIN(B1_DESC) AS B1_DESC, MIN(A5_NOMEFOR) AS A5_NOMEFOR FROM SIGA.SA5010 A5, SIGA.SB1010 B1 WHERE A5_FORNECE = '$codigo' AND A5_FILIAL in ('09','10') AND B1_COD = A5_PRODUTO AND B1_FILIAL = A5_FILIAL AND A5.D_E_L_E_T_ = ' ' AND B1.D_E_L_E_T_ = ' ' GROUP BY B1_COD ORDER BY B1_DESC ASC";
$RSS = oci_parse($oraconnect, $SQL);
oci_execute($RSS, OCI_DEFAULT);
$conexao_atacado = mysql_connect("localhost", "admin", "mu125030");
mysql_select_db("mu_atacado", $conexao_atacado) or die(mysql_error());
mysql_set_charset('UTF8', $conexao_atacado);

while ($RS = oci_fetch_assoc($RSS)) {
    $SQL2 = "SELECT * FROM cat_produtos WHERE cd_codigo = '" . $RS['B1_COD'] . "' AND cd_ativo = 1";
    $RSSPROD = mysql_query($SQL2, $conexao_atacado);
    $RSPROD = mysql_fetch_array($RSSPROD);

    $imgPath = "/catalogo/images/produtos/{$RSPROD['ds_imagem']}";
?>
    <div class="produto-card">
        <img src="<?= $imgPath ?>" alt="Imagem não encontrada">
        <h6><?= $RS['B1_DESC'] ?></h6>
        <p><strong>Código:</strong> <?= $RS['B1_COD'] ?></p>
        <?php if (basename($_SERVER['PHP_SELF']) == 'pontos.php'){ ?>
            <p><strong>Pontos:</strong> <?= $RS['A5_PROMVEN'] ?></p>
        <?php } ?>
        <p><strong>Fornecedor:</strong> <?= $RS['A5_NOMEFOR'] ?></p>
        <p><strong>Fracionamento:</strong> <?= $RS['A5_QTFRAC'] ?></p>
    </div>
<?php } ?>
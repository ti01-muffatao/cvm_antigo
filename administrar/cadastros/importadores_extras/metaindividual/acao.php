<?php include "../../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../../index.php', '_self');</script>";}

echo "<div style='color:red;font-weight:bold;font-size:13px;font-family:verdana;'>Aguarde... Processando...</div>";
// activar Error reporting
error_reporting(E_ALL);

// carregar a classe PHPExcel
require_once '../../../classe/Classes/PHPExcel.php';
$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("documentos/metaindividual.xls");
$objPHPExcel->setActiveSheetIndex(0);

for($linha = 1; $linha <= 5000; $linha++){
	if($linha > 1 && utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue()) != ""){
		$col0 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue());
		$col1 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
		$col2 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $linha)->getValue());
		$col3 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $linha)->getValue());

		if($col1 != ""){
		//$metapositivacao = str_replace(".",",", $col5);
		$SQL = "insert into meta_individual(cd_campanha, cd_codigo, cd_fornecedor, vl_metam)values(" ;
		$SQL .= " '".$col0."', '".$col1."', '".$col2."', '".$col3."') ";
			mysql_query($SQL, $conexao);
		}
	}
}
echo "<script language='javascript'>alert('Processamento Concluído!');</script>";
echo "<script language='javascript'>window.open('formulario.php', '_self');</script>";


?>
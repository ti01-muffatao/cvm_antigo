<?php include "../../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../../index.php', '_self');</script>";}

echo "<div style='color:red;font-weight:bold;font-size:13px;font-family:verdana;'>Aguarde... Processando...</div>";
// activar Error reporting
error_reporting(E_ALL);

// carregar a classe PHPExcel
require_once '../../../classe/Classes/PHPExcel.php';
$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("documentos/user.xls");
$objPHPExcel->setActiveSheetIndex(0);

for($linha = 1; $linha <= 5000; $linha++){
	if($linha > 1 && utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue()) != ""){
		$col0 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue());
		$col1 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
		$col2 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $linha)->getValue());
		$col3 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $linha)->getValue());
		$col4 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $linha)->getValue());
		$col5 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $linha)->getValue());
		$col6 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6, $linha)->getValue());
		$col7 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7, $linha)->getValue());
		$col8 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8, $linha)->getValue());
		$col9 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9, $linha)->getValue());
		$col10 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10, $linha)->getValue());

		if($col1 != ""){
			//$data = implode("-",array_reverse(explode("/",$col10)));
			$SQL = "insert into usuarios(ds_usuario, cd_perfil, cd_cargo, ds_cpf, ds_senha, cd_ativo, cd_codigo, cd_estado, cd_grupo, consultor, cd_supervisor)values(" ;
			$SQL .= " '".$col0."', '".$col1."', '".$col2."', '".$col3."', '".$col4."', '".$col5."', '".$col6."' , '".$col7."' , '".$col8."' , '".$col9."' , '".$col10."') ";
			mysql_query($SQL, $conexao);
		}
	}
}
echo "<script language='javascript'>alert('Processamento Concluído!');</script>";
echo "<script language='javascript'>window.open('formulario.php', '_self');</script>";


?>
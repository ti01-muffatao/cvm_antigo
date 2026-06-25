<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}
echo "<div style='color:red;font-weight:bold;font-size:13px;font-family:verdana;'>Aguarde... Processando...</div>";
// activar Error reporting
error_reporting(E_ALL);
// carregar a classe PHPExcel
require_once '../../classe/Classes/PHPExcel.php';
$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("documentos/parcialfoco.xls");
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
		$col11 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11, $linha)->getValue());
		$col12 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12, $linha)->getValue());
		$col13 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13, $linha)->getValue());
		$col14 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14, $linha)->getValue());
		$col15 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(15, $linha)->getValue());
		$col16 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(16, $linha)->getValue());
		$col17 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(17, $linha)->getValue());
		$col18 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(18, $linha)->getValue());
		$col19 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(19, $linha)->getValue());
		if($col1 != ""){
			$data = implode("-",array_reverse(explode("/",$col7)));
			$SQL = "insert into item_foco(cd_codigo, ds_usuario, ds_supervisor, ds_grupo, cd_estado, cd_mes, cd_parcial, dt_data, real_f1, falta_f1, real_f2, falta_f2, real_f3, falta_f3, real_f4, falta_f4, real_f5, falta_f5, real_f6, falta_f6)values(" ; 
			$SQL .= " '".$col0."', '".$col1."', '".$col2."', '".$col3."', '".$col4."', '".$col5."', '".$col6."' , '".$data."' , '".$col8."' , '".$col9."' , '".$col10."' , '".$col11."' , '".$col12."' , '".$col13."' , '".$col14."' , '".$col15."' , '".$col16."' , '".$col17."' , '".$col18."' , '".$col19."') ";
			 mysql_query($SQL, $conexao);
		}
	}
}
echo "<script language='javascript'>alert('Processamento Concluído!');</script>";
echo "<script language='javascript'>window.open('formulario.php', '_self');</script>";
?>
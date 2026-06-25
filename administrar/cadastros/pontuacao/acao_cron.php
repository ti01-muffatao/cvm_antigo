<?php include "../../conexao.php";
if($_SERVER["REMOTE_ADDR"] != "138.128.185.167" && $_SERVER["REMOTE_ADDR"] != "177.200.206.142"){ 
    die("Acesso nao Autorizado"); 
    //ipservidor 138.128.185.167
    //ipmuffatao 177.200.206.142
} 
//echo "<div style='color:red;font-weight:bold;font-size:13px;font-family:verdana;'>Aguarde... Processando...</div>";
// activar Error reporting
error_reporting(E_ALL);

//$tabela = "venda";
$arquivo = '../../../../public_html/cascavel/documentos/ptscapverao.txt';
if (!file_exists($arquivo)) {
    echo "Não Existe Aquivos Para Importar!!!";
} else {
	
$arq = fopen($arquivo,'r');

while(!feof($arq))
for($i=0; $i<1; $i++){
 if ($conteudo = fgets($arq)){
  $ll++;
  $linha = explode('|', $conteudo);
  //$data = implode("-",array_reverse(explode("/",$linha[4])));
  
  $dataRecebe = str_replace("/", "-", $linha[4]);
  $data = date('Y-m-d', strtotime($dataRecebe));
	
 }
 $RSS = mysql_query("select * from usuarios where cd_perfil = 4", $conexao);
 $RS = mysql_fetch_assoc($RSS);
	if($RS["cd_perfil"] == 4){
	
	//SE CODIGO E DATA FOR IGUAL ATUALIZA VALORES SE NÃO INSERE NOVO REGISTRO
	//$RSS1 = mysql_query("select * from pontuacao where cd_codigo = '".$linha[0]."' ", $conexao) or die (mysql_error());
	//$RS1 = mysql_fetch_assoc($RSS1);
	//if(mysql_num_rows($RSS1) >0){
	//$at++;
    //$sql = "update pontuacao set cd_pontos='".$linha[3]."' ";
	//$result = mysql_query($sql) or die(mysql_error());
		//}else{
 	$sql = "insert into pontuacao (cd_codigo, cd_supervisor, cd_fornecedor, cd_pontos, dt_data)values('".$linha[0]."', '".$linha[1]."', '".$linha[2]."', '".$linha[3]."', '".$data."' )";
	 $result = mysql_query($sql) or die(mysql_error());
 	$linha = array(); //limpa o array da variavel $linha e volta para o for
		}
	 }
  //}
	fclose($arq);
}
//echo " Total de linhas Atualizadas = ".$at;
echo "Quantidade de linhas importadas = ".$ll;
echo "<script language='javascript'>alert('Processamento Concluído!');<script>";
echo "<script language='javascript'>window.open('formulario.php', '_self');<script>";
echo unlink("../../../../public_html/cascavel/documentos/ptscapverao.txt");

mysql_query("update pontuacao set cd_supervisor = '989' where cd_supervisor = '992' ", $conexao);
mysql_query("update pontuacao set cd_supervisor = '112', cd_codigo = '236' where cd_codigo = '338' ", $conexao);
mysql_query("update pontuacao set cd_supervisor = '112', cd_codigo = '258' where cd_codigo = '661' ", $conexao);


?>
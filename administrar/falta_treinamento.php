<?php include "conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('index.php', '_self');</script>";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Relatório</title>
<script language="JavaScript">

function DoPrinting(){
if (!window.print){
return
}
window.print()
}

</script>
</head>
<body>
<div align="center">
<h2 style="font-family: sans-serif;">Faltam Responder Questionário</h2>
</div>
<?php $SQL = "select * from t_treinamento order by cd_treinamento desc limit 1";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS)){
			$ultimotreinamento = $RS["cd_treinamento"];  
		  }?>
<div align="center">
<table width="300px" align="center">
<tr>
<td align="center"><h4 style="font-family: sans-serif;"><a href="JavaScript:location.reload(true);">Atualizar Lista</a></h4></td>
<td align="center"><h4 style="font-family: sans-serif;"><a href="javascript:DoPrinting()">Imprimir Lista</a></h4></td></tr></table>
</div>
<h3>NÃO RESPONDERAM </h3>
<table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
<tr bgcolor="#c6dae9" style="height: 35px;">
	<td align="center"><b>Codigo</b></td>
    <td align="center"><b>Usuario</b></td>
    <td align="center"><b>Supervisor</b></td>
    <td align="center"><b>Filial</b></td>
	<td align="center"><b>Total Respostas</b></td>
	</tr>
	<?php $SQL = "select * from usuarios where cd_perfil in (3,4,7) and cd_ativo = 1 and cd_codigo not in (select cd_codigo from user_pontos where cd_treinamento = '".$ultimotreinamento."')";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS)){
		  $cont = 0;
		  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
		  <tr height="20" bgcolor="<?php echo $cor;?>">
		  <?php 
		  echo "<td align='center'>".strtoupper($RS["cd_codigo"])."</td>";
		  echo "<td align='center'>".strtoupper($RS["ds_usuario"])."</td>";
		  echo "<td align='center'>".BuscaDSSupervisor($RS["cd_codigo"])."</td>";
		  echo "<td align='center'>".BuscaEstado($RS["cd_estado"])."</td>";
		  echo "<td align='center'>".$cont."</td>";
		  //echo "<td align='center'>".BuscaClifor($RS["cd_fornecedor"])."</td>";
		  echo "</tr>";
	 }?>
</table>
<BR/>
<table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
<tr bgcolor="#c6dae9" style="height: 35px;">
	<td align="center"><b>Codigo</b></td>
    <td align="center"><b>Usuario</b></td>
    <td align="center"><b>Supervisor</b></td>
    <td align="center"><b>Filial</b></td>
	<td align="center"><b>Total Respostas</b></td>
	</tr>
	<?php $SQL = "select count(p.cd_codigo) as totalrespostas, p.cd_fornecedor, p.cd_treinamento, u.cd_codigo, u.ds_usuario, u.cd_estado, u.cd_perfil, u.cd_supervisor from user_pontos as p, usuarios as u where p.cd_codigo = u.cd_codigo and p.cd_perfil in(3,4,7) and p.cd_treinamento = '".$ultimotreinamento."' group by p.cd_codigo, u.cd_codigo order by totalrespostas asc";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS)){
		  
		  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
		  <tr height="20" bgcolor="<?php echo $cor;?>">
		  <?php 
		  echo "<td align='center'>".strtoupper($RS["cd_codigo"])."</td>";
		  echo "<td align='center'>".strtoupper($RS["ds_usuario"])."</td>";
		  echo "<td align='center'>".BuscaDSSupervisor($RS["cd_codigo"])."</td>";
		  echo "<td align='center'>".BuscaEstado($RS["cd_estado"])."</td>";
		  echo "<td align='center'>".$RS["totalrespostas"]."</td>";
		  //echo "<td align='center'>".BuscaClifor($RS["cd_fornecedor"])."</td>";
		  echo "</tr>";
	 }?>
</table>
</body>
</html>

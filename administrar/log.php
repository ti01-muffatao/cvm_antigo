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
<h2 style="font-family: sans-serif;">Relatório de Acessos ao Sistema</h2>
</div>

<div align="center">
<table width="300px" align="center">
<tr>
<td align="center"><h4 style="font-family: sans-serif;"><a href="JavaScript:location.reload(true);">Atualizar Lista</a></h4></td>
<td align="center"><h4 style="font-family: sans-serif;"><a href="javascript:DoPrinting()">Imprimir Lista</a></h4></td></tr></table>
</div>

<table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
<tr bgcolor="#c6dae9" style="height: 35px;">
	<td align="center"><b>Codigo</b></td>
    <td><b>Usuario</b></td>
	<td><b>Ultimo Acesso</b></td>
    <td align="center"><b>Acessos</b></td>
	</tr>
	<?php $SQL = "select u.ds_usuario, count(u.cd_codigo) as acessos, l.dt_data, l.cd_codigo from log as l, usuarios as u where l.cd_codigo = u.cd_codigo group by u.cd_codigo, l.cd_codigo order by l.dt_data desc";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS)){
			  $RSS4 = mysql_query("select cd_codigo from usuarios where cd_codigo = '".$RS["cd_codigo"]."' ", $conexao);
					while($RS4 = mysql_fetch_array($RSS4)){
						$RSS3 = mysql_query("select dt_data, cd_codigo from log where cd_codigo = '".$RS4["cd_codigo"]."' order by dt_data desc limit 1 ", $conexao);
						$RS3 = mysql_fetch_assoc($RSS3);
						$data = $RS3["dt_data"];
					}
									
		  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
		  <tr height="20" bgcolor="<?php echo $cor;?>">
		  <?php 
		  echo "<td align='center'>".strtoupper($RS["cd_codigo"])."</td>";
		  echo "<td>".strtoupper($RS["ds_usuario"])."</td>";
		  echo "<td>".date("d/m/Y   H:i", strtotime($data))."</td>";
		  echo "<td align='center'>".$RS["acessos"]."</td>";
		  echo "</tr>";
	 }?>
</table>

</body>
</html>

<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
	<table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
	<tr <?php echo $cabecalho;?>>
	<td><b>Nome</b></td>
    <td><b>Cod. Perfil</b></td>
	</tr>
	  <?php $SQL = "select * from perfil where cd_perfil <> 0 ";
	  if($TxPesquisa != ""){$SQL .= " and ds_perfil like '%". $TxPesquisa."%'";}
	  $SQL .= " order by ds_perfil asc ";
		$RSS = mysql_query($SQL, $conexao);
		while($RS = mysql_fetch_array($RSS)){
		  $Cont = $Cont + 1;
		  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
		  <tr height="20" bgcolor="<?php echo $cor;?>" id="a<?php echo $Cont?>" onClick="javascript: Clica(this,'<?php echo $RS["cd_perfil"]?>');" style="cursor:pointer;">
		  <?php
		  echo "<td>".strtoupper($RS["ds_perfil"])."</td>";
		  echo "<td>".strtoupper($RS["cd_perfil"])."</td>";
		  echo "</tr>";
		}?>
	</table>
</body>
</html>
<script language="javascript">
function recarrega(vl){
	window.open('lista.php?TxPesquisa='+vl, "_self");
}
function Clica(atual, Cod){
	<?php if($Cont != ""){?>
		for (i=1; i <= <?php echo $Cont?>; i++){eval('a'+i).style.color = '#000000';}
		atual.style.color='#FF0000';
	<?php }?>
	window.open('acao.php?Tipo=D&Codigo='+Cod, "acao");
}
</script>
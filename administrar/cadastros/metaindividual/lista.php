<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
  <table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
    <tr <?php echo $cabecalho;?>>
    <td align="center"><b>Código</b></td>
	<td><b>Usuário</b></td>
	<td><b>Fornecedor</b></td>
    <td><b>Meta</b></td>
	<td><b>Campanha</b></td>
	</tr>
	<?php $SQL = "select * from meta_individual as m, usuarios as u where m.cd_codigo = u.cd_codigo and u.cd_cargo in(2,3) ";
		if($TxPesquisa != ""){$SQL .= " and u.cd_codigo like '%". $TxPesquisa ."%' ";}
		$SQL .= " order by ds_usuario asc limit 100 ";
		$RSS = mysql_query($SQL, $conexao);
		while($RS = mysql_fetch_array($RSS)){
			$Cont = $Cont + 1;
			if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
			<tr height="20" bgcolor="<?php echo $cor;?>" id="a<?php echo $Cont?>" onClick="javascript: Clica(this,'<?php echo $RS["cd_meta"]?>');" style="cursor:pointer;">
			<?php
			echo "<td align='center'>".strtoupper($RS["cd_codigo"])."</td>";
			echo "<td>".strtoupper($RS["ds_usuario"])."</td>";
			echo "<td>".BuscaClifor($RS["cd_fornecedor"])."</td>";
			echo "<td>".($RS["vl_metam"])."</td>";
			echo "<td>".BuscaCampanha($RS["cd_campanha"])."</td>";
			echo "</tr>";
		}
		echo "<font face='verdana' size='2'><b>(".$Cont.")</b> Registros Encontrados";
	?>
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
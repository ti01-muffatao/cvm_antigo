<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_perfil" id="cd_perfil" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr> 
  <td colspan="2">Nome do Perfil:<input type="text" id="ds_perfil" name="ds_perfil" class="selectboxnormal" size="65" value="<?php echo $ds_perfil?>" maxlength="30" style="<?php echo $objetos;?>"></td>
</tr> 
<tr> 
  <td width="50%" valign="top">
  <!----------------------------------->
	<fieldset><legend><font face="verdana" size="2"><strong>Cadastros</strong></font></legend>
	<div style="overflow-y:auto;height:200px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:11px;">
	  <tr><td width="5%"><input type="checkbox" id="ckcad1" name="ckcad1" value=""></td><td><label for="ckcad1"><b>Cadastros</b></label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad2" name="ckcad2" value=""></td><td><label for="ckcad2">Usuários</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad3" name="ckcad3" value=""></td><td><label for="ckcad3">Perfil</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad4" name="ckcad4" value=""></td><td><label for="ckcad4">Notícias</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad5" name="ckcad5" value=""></td><td><label for="ckcad5">Fornecedores</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad6" name="ckcad6" value=""></td><td><label for="ckcad6">Grupos</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad7" name="ckcad7" value=""></td><td><label for="ckcad7">Metas Individuais</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad8" name="ckcad8" value=""></td><td><label for="ckcad8">Parcial</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad9" name="ckcad9" value=""></td><td><label for="ckcad9">Pontuação</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckcad10" name="ckcad10" value=""></td><td><label for="ckcad10">Campanhas</label></td></tr>
	</table>
	</div>
	</fieldset>
  <!----------------------------------->
  </td>
  <td width="50%" valign="top">
  <!----------------------------------->
	<fieldset><legend><font face="verdana" size="2"><strong>Acessos</strong></font></legend>
	<div style="overflow-y:auto;height:200px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:11px;">
	  <tr><td width="5%"><input type="checkbox" id="ckac1" name="ckac1" value=""></td><td><label for="ckac1">Fotos</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac2" name="ckac2" value=""></td><td><label for="ckac2">Vídeos</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac3" name="ckac3" value=""></td><td><label for="ckac3">Comentários</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac4" name="ckac4" value=""></td><td><label for="ckac4">Regulamento Alimentar</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac5" name="ckac5" value=""></td><td><label for="ckac5">Grupo Alimentar</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac6" name="ckac6" value=""></td><td><label for="ckac6">Bingo</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac7" name="ckac7" value=""></td><td><label for="ckac7">Bingo Premium</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac8" name="ckac8" value=""></td><td><label for="ckac8">Itens Foco</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac9" name="ckac9" value=""></td><td><label for="ckac9">Regulamento Farma</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac10" name="ckac10" value=""></td><td><label for="ckac10">Grupo Farma</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac11" name="ckac11" value=""></td><td><label for="ckac11">Bingo Farma</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac12" name="ckac12" value=""></td><td><label for="ckac12">Parciais PR</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac13" name="ckac13" value=""></td><td><label for="ckac13">Parciais SC</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac14" name="ckac14" value=""></td><td><label for="ckac14">Parciais RS</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac15" name="ckac15" value=""></td><td><label for="ckac15">Parciais Farma</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac16" name="ckac16" value=""></td><td><label for="ckac16">Regulamento Gestor</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac17" name="ckac17" value=""></td><td><label for="ckac17">Regulamento Supervisor</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac18" name="ckac18" value=""></td><td><label for="ckac18">Parciais Gestor</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac19" name="ckac19" value=""></td><td><label for="ckac19">Parciais Supervisor</label></td></tr>
	  <tr><td width="5%"><input type="checkbox" id="ckac20" name="ckac20" value=""></td><td><label for="ckac20">Fornecedores</label></td></tr>
	</table>
	</div>
	</fieldset>
  <!----------------------------------->
  </td>
</tr>
</table>
<br>
<div align="center">
	<input type="button" value="Salvar" id="BtSalvar" name="BtSalvar" onClick="JavaScript: Salvar();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">  
	<input type="button" value="Novo" id="BtNovo" name="BtNovo" onClick="javascript: Novo();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
	<br>
</div>
</body>
</html>
<script language="javascript">
function Novo(){
	window.open('formulario.php', "_self");
}
function Salvar(){
  	var cdperfil	= document.getElementById('cd_perfil').value;
  	var dsperfil	= document.getElementById('ds_perfil').value;
	if(document.getElementById('ckcad1').checked == true){var cad1 = '1';}else{var cad1 = '0';}
	if(document.getElementById('ckcad2').checked == true){var cad2 = '1';}else{var cad2 = '0';}
	if(document.getElementById('ckcad3').checked == true){var cad3 = '1';}else{var cad3 = '0';}
	if(document.getElementById('ckcad4').checked == true){var cad4 = '1';}else{var cad4 = '0';}
	if(document.getElementById('ckcad5').checked == true){var cad5 = '1';}else{var cad5 = '0';}
	if(document.getElementById('ckcad6').checked == true){var cad6 = '1';}else{var cad6 = '0';}
	if(document.getElementById('ckcad7').checked == true){var cad7 = '1';}else{var cad7 = '0';}
	if(document.getElementById('ckcad8').checked == true){var cad8 = '1';}else{var cad8 = '0';}
	if(document.getElementById('ckcad9').checked == true){var cad9 = '1';}else{var cad9 = '0';}
	if(document.getElementById('ckcad10').checked == true){var cad10 = '1';}else{var cad10 = '0';}
	var ds_cadastros = cad1+cad2+cad3+cad4+cad5+cad6+cad7+cad8+cad9+cad10;
	if(document.getElementById('ckac1').checked == true){var ac1 = '1';}else{var ac1 = '0';}
	if(document.getElementById('ckac2').checked == true){var ac2 = '1';}else{var ac2 = '0';}
	if(document.getElementById('ckac3').checked == true){var ac3 = '1';}else{var ac3 = '0';}
	if(document.getElementById('ckac4').checked == true){var ac4 = '1';}else{var ac4 = '0';}
	if(document.getElementById('ckac5').checked == true){var ac5 = '1';}else{var ac5 = '0';}
	if(document.getElementById('ckac6').checked == true){var ac6 = '1';}else{var ac6 = '0';}
	if(document.getElementById('ckac7').checked == true){var ac7 = '1';}else{var ac7 = '0';}
	if(document.getElementById('ckac8').checked == true){var ac8 = '1';}else{var ac8 = '0';}
	if(document.getElementById('ckac9').checked == true){var ac9 = '1';}else{var ac9 = '0';}
	if(document.getElementById('ckac10').checked == true){var ac10 = '1';}else{var ac10 = '0';}
	if(document.getElementById('ckac11').checked == true){var ac11 = '1';}else{var ac11 = '0';}
	if(document.getElementById('ckac12').checked == true){var ac12 = '1';}else{var ac12 = '0';}
	if(document.getElementById('ckac13').checked == true){var ac13 = '1';}else{var ac13 = '0';}
	if(document.getElementById('ckac14').checked == true){var ac14 = '1';}else{var ac14 = '0';}
	if(document.getElementById('ckac15').checked == true){var ac15 = '1';}else{var ac15 = '0';}
	if(document.getElementById('ckac16').checked == true){var ac16 = '1';}else{var ac16 = '0';}
	if(document.getElementById('ckac17').checked == true){var ac17 = '1';}else{var ac17 = '0';}
	if(document.getElementById('ckac18').checked == true){var ac18 = '1';}else{var ac18 = '0';}
	if(document.getElementById('ckac19').checked == true){var ac19 = '1';}else{var ac19 = '0';}
	if(document.getElementById('ckac20').checked == true){var ac20 = '1';}else{var ac20 = '0';}
	var ds_acessos = ac1+ac2+ac3+ac4+ac5+ac6+ac7+ac8+ac9+ac10+ac11+ac12+ac13+ac14+ac15+ac16+ac17+ac18+ac19+ac20;
		
	if(dsperfil == ''){alert("Campo NOME DO PERFIL Obrigatório!!!");document.getElementById('ds_perfil').focus();}
 	else{
		if(cdperfil == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_perfil='+cdperfil+'&ds_perfil='+dsperfil+'&ds_cadastros='+ds_cadastros+'&ds_acessos='+ds_acessos, "acao");
	}
}
</script>
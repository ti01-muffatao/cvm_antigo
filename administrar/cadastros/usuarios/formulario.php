<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>">
<br>
<input type="hidden" name="cd_usuario" id="cd_usuario" value="">
<table border="0" width="100%" style="font-family:verdana;font-size:12px;">
<tr> 
  <td width="20%">Nome:</td>
  <td width="80%" colspan="3"><input type="text" id="ds_usuario" name="ds_usuario" class="selectboxnormal" size="65" value="" maxlength="100" style="<?php echo $objetos;?>"></td>
</tr> 
<tr> 
  <td width="20%">CPF:</td>
  <td width="30%"><input type="text" id="ds_cpf" name="ds_cpf" class="selectboxnormal" onBlur="javascript: VerificaCPF();" size="20" value="" maxlength="11" style="<?php echo $objetos;?>"></td>
  <td width="20%">Senha:</td>
  <td width="30%"><input type="password" id="ds_senha" name="ds_senha" class="selectboxnormal" size="20" value="" maxlength="15" style="<?php echo $objetos;?>"></td>
</tr>
<tr>
  <td width="20%">Perfil:</td>
  <td width="30%">
  <select id="cd_perfil" name="cd_perfil" class="selectboxnormal" style="height: 18; font-size: 8 pt;<?php echo $objetos;?>">
  <OPTION VALUE="">- Perfil -</OPTION>
  <?php $RSS = mysql_query("select * from perfil order by ds_perfil asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_perfil"] . "'";
    if($cd_perfil == $RS["cd_perfil"]){echo " selected";}
    echo ">" . $RS["ds_perfil"] . "</OPTION>";}?>
  </select>
  </td>
  <td width="20%">Grupo:</td>
  <td width="30%">
  <select id="cd_grupo" name="cd_grupo" class="selectboxnormal" style="height: 18; font-size: 8 pt;">
  <OPTION VALUE="">- Grupos -</OPTION>
  <?php $RSS = mysql_query("select * from grupos order by ds_grupo asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_grupo"] . "'";
    if($cd_grupo == $RS["cd_grupo"]){echo " selected";}
    echo ">" . $RS["ds_grupo"] . "</OPTION>";}?>
  </select>
  </td>
</tr>
<tr> 
  <td width="20%">Cargo:</td>
  <td width="30%">
  <select id="cd_cargo" name="cd_cargo" class="selectboxnormal" style="height: 18; font-size: 8 pt;<?php echo $objetos;?>">
  <OPTION VALUE="">- Cargo -</OPTION>
  <?php $RSS = mysql_query("select * from cargos order by ds_cargo asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_cargo"] . "'";
    if($cd_cargo == $RS["cd_cargo"]){echo " selected";}
    echo ">" . $RS["ds_cargo"] . "</OPTION>";}?>
  </select>
  </td>
  <td width="20%">Estado:</td>
  <td width="30%">
  <select id="cd_estado" name="cd_estado" class="selectboxnormal" style="height: 18; font-size: 8 pt;">
  <OPTION VALUE="">- Estado -</OPTION>
  <?php $RSS = mysql_query("select * from estados order by ds_estado asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_estado"] . "'";
    if($cd_estado == $RS["cd_estado"]){echo " selected";}
    echo ">" . $RS["ds_estado"] . "</OPTION>";}?>
  </select>
  </td>
</tr>
<tr> 
  <td width="20%">Consultor:</td>
  <td width="30%">
  <select id="consultor" name="consultor" class="selectboxnormal" style="height: 18; font-size: 8 pt;">
  <OPTION VALUE="0">- Consultor -</OPTION>
  <?php $RSS = mysql_query("select * from usuarios where cd_cargo = 7 and cd_ativo = 1 order by ds_usuario asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_usuario"] . "'";
    if($cd_gerente == $RS["cd_usuario"]){echo " selected";}
    echo ">" . $RS["ds_usuario"] . "</OPTION>";}?>
  </select>
  </td>
  <td width="20%">Supervisor:</td>
  <td width="30%">
  <select id="cd_supervisor" name="cd_supervisor" class="selectboxnormal" style="height: 18; font-size: 8 pt;">
  <OPTION VALUE="0">- Supervisor -</OPTION>
  <?php $RSS = mysql_query("select * from usuarios where cd_cargo = 3 and cd_ativo = 1 order by ds_usuario asc", $conexao);
  while($RS = mysql_fetch_array($RSS)){
  	echo "<OPTION VALUE='" . $RS["cd_codigo"] . "'";
    if($cd_supervisor == $RS["cd_codigo"]){echo " selected";}
    echo ">" . $RS["ds_usuario"] . "</OPTION>";}?>
  </select>
  </td>
</tr>
<tr> 
  <td width="20%">Código:</td>
  <td width="50%" colspan="2"><input type="text" id="cd_codigo" name="cd_codigo" class="selectboxnormal" size="10" value="" style="<?php echo $objetos;?>"></td>
  <td><input type="checkbox" id="ativo" name="ativo" value=""><label for="ativo">Ativo</label></td>
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
function VerificaCPF(){
	if(document.getElementById('ds_cpf').value!=''){if(validacpf(document.getElementById('ds_cpf').value)==false){document.getElementById('ds_cpf').value='';}}
}

function Novo(){
	window.open('formulario.php', "_self");
}

function Salvar(){
  	var cdusuario	= document.getElementById('cd_usuario').value;
	var dsusuario	= document.getElementById('ds_usuario').value;
	var dscpf		= document.getElementById('ds_cpf').value;
	var dssenha		= document.getElementById('ds_senha').value;
	var cdperfil	= document.getElementById('cd_perfil').value;
	var cdgrupo		= document.getElementById('cd_grupo').value;
	var cdcargo		= document.getElementById('cd_cargo').value;
	var cdestado	= document.getElementById('cd_estado').value;
	var consultor	= document.getElementById('consultor').value;
	var cdsupervisor= document.getElementById('cd_supervisor').value;
	var cdcodigo	= document.getElementById('cd_codigo').value;
	if(document.getElementById('ativo').checked == true){var cd_ativo=1;}else{var cd_ativo=0;}
	
	if(dsusuario == ''){alert("Campo NOME DO USUÁRIO Obrigatório!!!");document.getElementById('ds_usuario').focus();}
	else if(dscpf == ''){alert("Campo CPF Obrigatório!!!");document.getElementById('ds_cpf').focus();}
	else if(dssenha == ''){alert("Campo SENHA Obrigatório!!!");document.getElementById('ds_senha').focus();}
	else if(cdperfil == ''){alert("Campo PERFIL Obrigatório!!!");document.getElementById('cd_perfil').focus();}
	//else if(cdgrupo == ''){alert("Campo GRUPO Obrigatório!!!");document.getElementById('cd_grupo').focus();}
	else if(cdcargo == ''){alert("Campo CARGO Obrigatório!!!");document.getElementById('cd_cargo').focus();}
	//else if(cdestado == ''){alert("Campo ESTADO Obrigatório!!!");document.getElementById('cd_estado').focus();}
	//else if(cdsupervisor == ''){alert("Campo SUPERVISOR Obrigatório!!!");document.getElementById('cd_supervisor').focus();}
	else if(cdcodigo == ''){alert("Campo CÓDIGO Obrigatório!!!");document.getElementById('cd_codigo').focus();}
 	else{
		if(cdusuario == ""){Tipo='I';}else{Tipo='A';}
		window.open('acao.php?Tipo='+Tipo+'&cd_usuario='+cdusuario+'&ds_usuario='+dsusuario+'&ds_cpf='+dscpf+'&ds_senha='+dssenha+'&cd_perfil='+cdperfil+'&cd_grupo='+cdgrupo+'&cd_cargo='+cdcargo+'&cd_estado='+cdestado+'&consultor='+consultor+'&cd_supervisor='+cdsupervisor+'&cd_codigo='+cdcodigo+'&cd_ativo='+cd_ativo, "acao");
	}
}
</script>
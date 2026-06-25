<?php include "conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('index.php', '_self');</script>";}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<link rel="icon" href="imagens/logo.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="suite/codebase/dhtmlx.css"/>
	<script src="suite/codebase/dhtmlx.js"></script>
	<title><?php echo $Titulo?></title>
</head>
<body style="margin:0px;" onload="javascript:carrega();">
<input type="hidden" id="cd_painel" name="cd_painel" value="<?php echo $_SESSION["CD_PAINEL"];?>">
<div id="menuObj" style="margin:0px; height:250px;"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:11px;color:#000000;left:0; top:27; position: absolute;z-index:5;">
  <tr bgcolor="#004000">
	<td colspan="8" id="otitle" bgcolor="#004000" style="background-image:url(suite/header_bg.gif); background-repeat:repeat-x; font-weight:bold;font-size:13px; height:21px; text-align:center; font-family:verdana;"></td>
  </tr>
  <tr>
	<td colspan="8"><iframe id="corpo" name="corpo" src="fundo.php" width="100%" height="0" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe></td>
  </tr>
  <tr style="background-image:url(suite/header_bg.gif); background-repeat:repeat-x; height:19px;">
	<td><strong>Usuário:</strong>&nbsp;&nbsp;<?php echo $_SESSION["DS_USUARIO"];?></td>
	<td></td>
	<td><strong>Perfil:</strong>&nbsp;&nbsp;<?php echo $_SESSION["DS_PERFIL"];?></td>
	<td></td>
	<td><strong>Acessado em:</strong>&nbsp;&nbsp;<?php echo date("d/m/Y H:i:s");?></td>
	<td></td>
	<td></td>
	<td id="dvRelogio" style="font-weight:bold;text-align:right;"></td>
  </tr>
</table>
</body>
</html>
<script language="javascript">
function click()
{if (event.button==2||event.button==3) {oncontextmenu='return false';}}
document.onmousedown=click
document.oncontextmenu = new Function("return false;")

var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	myWidth = window.innerWidth;
	myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	//IE 6+ in 'standards compliant mode'
	myWidth = document.documentElement.clientWidth;
	myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	//IE 4 compatible
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
}

document.getElementById('corpo').height = (myHeight-67);
var menu;
function carrega(){
	menu = new dhtmlXMenuObject({
		parent: "menuObj",
		icons_path: "imagens/",
		xml: "mymenu.php",
		onclick: menuClick
	});
	moveRelogio();
}

function menuClick(opcao){
	var cdpainel = document.getElementById('cd_painel').value;
	//ARQUIVO
	if(opcao == 1){NewJan("Alterar Senha", "mudasenha.php", 400, 210, 1);}
	if(opcao == 2){NewJan("Relatório Acessos", "log.php", 800, 550, 1);}
	if(opcao == 40){NewJan("Respostas Academia", "resp_treinamentos.php", 800, 550, 1);}
	if(opcao == 41){NewJan("Falta Resposta", "falta_treinamento.php", 800, 550, 1);}
	if(opcao == 3){NewJan("Sobre", "sobre.php", 400, 300, 1);}
	if(opcao == 4){if(confirm("Deseja realmente sair do Sistema?")){window.open('index.php', "_self");}}
	
	//CADASTROS
	if(opcao == 10){window.open('cadastros/usuarios/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Usuários';}
	if(opcao == 11){window.open('cadastros/perfil/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Perfil';}
	if(opcao == 12){window.open('cadastros/noticias/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Notícias';}
	if(opcao == 13){window.open('cadastros/clifor/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Fornecedores';}
	if(opcao == 14){window.open('cadastros/grupos/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Grupos';}
	if(opcao == 15){window.open('cadastros/metaindividual/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Metas Individuais';}
	if(opcao == 16){window.open('cadastros/parcial/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Parciais';}
	if(opcao == 17){window.open('cadastros/pontuacao/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Pontuação';}
	if(opcao == 18){window.open('cadastros/campanha/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Campanhas';}
	if(opcao == 19){window.open('cadastros/parcialitemfoco/frames.php', "corpo");document.getElementById('otitle').innerHTML='Parcial Item Foco';}
	
	//TREINAMENTO
	if(opcao == 20){window.open('cadastros/t_treinamento/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Treinamentos';}
	if(opcao == 21){window.open('cadastros/t_conteudo/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastrar Conteúdo Treinamentos';}
	if(opcao == 22){window.open('cadastros/t_pergunta/frames.php', "corpo");document.getElementById('otitle').innerHTML='Cadastro de Perguntas - Treinamento Muffatão';}
	
	//EXTRAS
	if(opcao == 30){window.open('cadastros/importadores_extras/usuarios/frames.php', "corpo");document.getElementById('otitle').innerHTML='Importar Usuarios';}
	if(opcao == 31){window.open('cadastros/importadores_extras/metaindividual/frames.php', "corpo");document.getElementById('otitle').innerHTML='Importar Metas Individuais';}
	
	
}

function moveRelogio(){
	var momentoAtual = new Date() 
	var hora	= momentoAtual.getHours();
	var minuto	= momentoAtual.getMinutes();
	var segundo	= momentoAtual.getSeconds();
	document.getElementById('dvRelogio').innerHTML = hora + ' : ' + minuto + ' : ' + segundo;
	setTimeout("moveRelogio()",1000) 
}

function NewJan(titulo, caminho, alargura, aaltura, tipo){
	dhxWins = new dhtmlXWindows();

	www = dhxWins.createWindow("www", 20, 30, alargura, aaltura);
	www.setText(titulo);
	www.attachURL(caminho);
	if(tipo == 1){dhxWins.window("www").setModal(true);}
	if(tipo == 2){dhxWins.window("www").setModal(true);www.denyPark();www.hideHeader();}
	dhxWins.window("www").center();
}
</script>
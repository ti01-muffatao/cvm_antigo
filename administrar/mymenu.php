<?php session_start();
header("Content-Type: application/xml; charset=ISO-8859-1");
echo '<' . '?xml version="1.0" encoding="ISO-8859-1" ?' . '>';
echo "<menu>";
	echo "<item id='MNArquivo' text='Arquivo'>";
		echo "<item id='1' text='Alterar Senha' img='senha.gif' />";
		echo "<item id='2' text='Relatório Acessos' img='config.png' />";
		echo "<item id='40' text='Respostas Academia' img='check.gif' />";
		echo "<item id='41' text='Falta Resposta' img='lfiltro.png' />";
		echo "<item id='3' text='Sobre' img='sobre.gif' />";
		echo "<item id='separador1' type='separator' />";
		echo "<item id='4' text='Sair' img='close.gif' />";
	echo "</item>";
if(substr($_SESSION["PRF_CADASTROS"],0,1) == 1){	
	echo "<item id='MNCadastros' text='Cadastros'>";
		if(substr($_SESSION["PRF_CADASTROS"],1,1) == 1){echo "<item id='10' text='Usuários' img='user.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],2,1) == 1){echo "<item id='11' text='Perfil' img='perfil.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],3,1) == 1){echo "<item id='12' text='Notícias' img='newspaper.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],4,1) == 1){echo "<item id='13' text='Fornecedores' img='fornecedor.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],5,1) == 1){echo "<item id='14' text='Grupos' img='grupos.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],6,1) == 1){echo "<item id='15' text='Metas Individuais' img='check.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],7,1) == 1){echo "<item id='16' text='Parcial' img='sistema.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],8,1) == 1){echo "<item id='17' text='Pontuação' img='money.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],9,1) == 1){echo "<item id='18' text='Campanhas' img='campanha.png' />";}
		if(substr($_SESSION["PRF_CADASTROS"],0,1) == 1){echo "<item id='19' text='Parcial Item Foco' img='sistema.png' />";}
	echo "</item>";
}
	echo "<item id='MNTreinamento' text='Treinamento Muffatão'>";
		{echo "<item id='20' text='Cadastrar Treinamentos' img='edit.gif' />";}
		{echo "<item id='21' text='Conteúdo Treinamentos' img='report.png' />";}
		{echo "<item id='22' text='Cadastrar Perguntas' img='sobre.gif' />";}

	echo "</item>";
	
	//MENU EXTRAS
	echo "<item id='MNExtras' text='Extras'>";
		echo "<item id='30' text='Importar Usuarios' img='user.png' />";
		echo "<item id='31' text='Importar Metas Individuais' img='check.png' />";
	echo "</item>";
	
	
echo "</menu>";
?>
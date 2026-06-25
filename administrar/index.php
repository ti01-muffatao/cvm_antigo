<?php include "conexao.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="icon" href="imagens/logo.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="suite/codebase/dhtmlx.css"/>
	<script src="suite/codebase/dhtmlx.js"></script>
	<style>
		div.controls {
			margin: 0px 10px;
			font-size: 14px;
			font-family: Tahoma;
			color: #404040;
			height: 80px;
		}
		div#winVP {
			position: relative;
			height: 350px;
			border: #a4bed4 1px solid;
			border-radius: 2px;
			margin: 10px;
		}
	</style>
	<script>
	var dhxWins, w1;
	function doOnLoad(){
		dhxWins = new dhtmlXWindows();
		dhxWins.attachViewportTo("winVP");
	
		w1 = dhxWins.createWindow("w1", 20, 30, 430, 250);
		w1.setText("Acesso");
		w1.button("minmax1").hide();
		w1.button("close").hide();
		w1.attachURL("login.php");
		dhxWins.window("w1").setModal(true);
		dhxWins.window("w1").center();
		w1.denyResize();
		w1.denyPark();
		w1.hideHeader();
	}
	
	function Conectar(cpf, senha)
	{
		window.open('conecta.php?TxCPF='+cpf+'&TxSenha='+senha, "_self");
	}
	</script>
</head>
<body style="margin:0px;background:#CFCFCF;" onLoad="javascript:doOnLoad();">
<div id="winVP" style="position: relative; border: #cecece 1px solid; margin: 0px;"></div>
</body>
</html>
<script language="javascript">if(myHeight == 0){myHeight = 500;}document.getElementById('winVP').style.height = (myHeight-2);</script>
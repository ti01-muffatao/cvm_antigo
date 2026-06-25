<?php
	$destino = '../../../importar/dados';
	if(!$_FILES){
		echo 'Nenhum arquivo enviado!';
	}else{
		$nome_arquivo		= "ptscapverao".substr($_FILES['file']['name'],-4);
		$extensao			= substr($_FILES['file']['name'],-4);
		$arqv_temporario	= $_FILES['file']['tmp_name'];

		if(move_uploaded_file($arqv_temporario, $destino."/".$nome_arquivo)){
			echo "<script language='javascript'>alert('Arquivo Carregado! Aguardando processamento!');window.open('up.php', '_self');</script>";
		}else{
			echo "<script language='javascript'>alert('O Arquivo não foi Carregado por algum problema!...Pode ser um arquivo muito grande, com extensão incompatível...etc');window.open('up.php', '_self');</script>";
		}
	}
?>
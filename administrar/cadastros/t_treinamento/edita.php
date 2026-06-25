<?php include "../../conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";}

//=======================		INCLUSÃO DOS DADOS
	// Se o usuário clicou no botão cadastrar efetua as ações
if ($_POST['cadastrar']) {
	
	// Recupera os dados dos campos
	$ds_campanha = $_POST['ds_campanha'];
	$cd_filial = $_POST['cd_filial'];
	$dt_ini = $_POST['dt_ini'];
	$dt_fim = $_POST['dt_fim'];
	$foto = $_FILES["foto"];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		//$largura = 150;
		// Altura máxima em pixels
		//$altura = 180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		//if($dimensoes[0] > $largura) {
		//	$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		//}

		// Verifica se a altura da imagem é maior que a altura permitida
		//if($dimensoes[1] > $altura) {
		//	$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		//}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($arquivo["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "laminas/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql = mysql_query("insert into campanhas values ('', '".$ds_campanha."', '".$cd_filial."', '".DtBrToDtEua($dt_ini,3)."', '".DtBrToDtEua($dt_fim,3)."', '".$nome_imagem."')");
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script language='javascript'>alert('Cadastrado com Sucesso!');window.open('formulario.php', '_self');</script>";
			}else{
				echo "<script language='javascript'>alert('Erro no Cadastro. Verifique os Dados Inseridos!');window.open('formulario.php', '_self');</script>";
			}
		}
	}
}

//=======================		ALTERAÇÃO DOS DADOS
	// Se o usuário clicou no botão alterar efetua as ações
if ($_POST['alterar']) {
	
	// Recupera os dados dos campos
	$ds_campanha = $_POST['ds_campanha'];
	$cd_filial = $_POST['cd_filial'];
	$dt_ini = $_POST['dt_ini'];
	$dt_fim = $_POST['dt_fim'];
	$foto = $_FILES["foto"];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
		
		// Largura máxima em pixels
		//$largura = 150;
		// Altura máxima em pixels
		//$altura = 180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		//if($dimensoes[0] > $largura) {
		//	$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		//}

		// Verifica se a altura da imagem é maior que a altura permitida
		//if($dimensoes[1] > $altura) {
		//	$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		//}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($arquivo["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "laminas/" . $nome_imagem;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
			// Insere os dados no banco
			$sql2 = mysql_query("updade campanhas set values ('', '".$ds_campanha."', '".$cd_filial."', '".DtBrToDtEua($dt_ini,3)."', '".DtBrToDtEua($dt_fim,3)."', '".$nome_imagem."')");
		
			// Se os dados forem inseridos com sucesso
			if ($sql2){
				echo "<script language='javascript'>alert('Alterado com Sucesso!');window.open('formulario.php', '_self');</script>";
			}else{
				echo "<script language='javascript'>alert('Erro na Alteração. Verifique os Dados Inseridos!');window.open('formulario.php', '_self');</script>";
			}
		}
	}
}
?>

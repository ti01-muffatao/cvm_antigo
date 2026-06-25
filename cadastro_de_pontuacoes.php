<?php include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>"; } 
?>
<!doctype html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="pt-BR">
    <title><?php echo $Titulo;?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
    <meta http-equiv="content-language" content="pt" />
    <meta itemprop="description" name="description" content="" />
    <meta name="robots" content="no follow" />
    <!-- mobile  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">            
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css" type="text/css" />  
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!-- ESTILO RESPONSIVO -->
    <link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
    <!-- MEGA MENU -->
    <link href="js/mainmenu/sticky.css" rel="stylesheet">
    <link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="js/mainmenu/demo.css" rel="stylesheet">
    <link href="js/mainmenu/menu.css" rel="stylesheet">
    <!-- toogle menu -->
    <link rel="stylesheet" href="js/Toggle-Menu/menu.css" type="text/css"/>
    <!-- SLIDER -->
    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
    <!-- CONFIGURAÇÃO SLIDER -->
    <link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
    <!-- ICONES -->
    <link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
    <!-- flexslider -->
    <link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
    <!-- Accordions -->
    <link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs7.css">
    <link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">  
</head>
<body>
<section class="body">

<?php include "menu.php";?>

<form method="POST" action="cadastro_de_pontuacoes.php" enctype="multipart/form-data">
<input type="hidden" id="acao1" name="acao1" value="1">
<div style="padding: 5%">
    <label>Selecionar arquivo</label>
    <input type="file" name="fileUpload" />
    <input type="submit" value="Enviar">
</div>
<div style="padding: 5%; text-align: center">
    <h4>Breves explicações para dar tudo certo na importação</h4>
    <ol>
        <li>Todos os fornecedores precisam estar em uma única página, foi criado uma nova coluna para colocar o fornecedor (código)</li>
        <li>A disposição dos elementos na planilha precisa ser sempre a mesma, pois os dados são pegos por coluna.</li>
        <li>A primeira coluna <b>PRECISA</b> ser o código do produto, a segunda <b>PRECISA</b> ser o código de barras e assim por diante... segue a baixo como devem ser a disposição das colunas</li>
        <ul>
            <li><b>Código do produto - Código de barras - Descrição - Ponto - Fracionamento - Fornecedor (código)</b></li>
        </ul>
        <li>Sempre antes de enviar, ele vai apagar os dados inseridos anteriormente para não haver duplicação de produtos</li>
        <li>Essa pagina tem como intuíto pegar os valores da planilha e inserir no banco de dados automaticamente, para que os vendedores consigam vizualizar a pontuação on-line, sem a necessidade de ficar baixando a planilha o tempo todo</li>
    </ol>
</div>

<?php 
if(isset($_FILES['fileUpload']) && $_POST['acao1'] == 1){

date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

$ext = strtolower(pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION)); // Pegando extensão do arquivo
$new_name = "pontuacao." . $ext;
$dir = 'upload/' . $new_name; //Diretório para uploads


move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir); //Fazer upload do arquivo

// carregar a classe PHPExcel
require_once '../../pag/assets/classe/Classes/PHPExcel.php';
$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);
try{
$inputFileType = PHPExcel_IOFactory::identify($dir);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load("$dir");
$objPHPExcel->setActiveSheetIndex(0);
} catch (Exception $e) {
    echo 'Erro ao carregar o arquivo: ',  $e->getMessage(), "\n";
}

// Primeiro apaga para depois inserir tudo
$SQL = "delete from pontos_produtos";
mysql_query($SQL, $conexao);

for($linha = 1; $linha <= 5000; $linha++){
	if($linha > 1 && utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue()) != ""){

		$col0 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue());
		$col1 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, $linha)->getValue());
		$col2 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $linha)->getValue());
		$col3 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3, $linha)->getValue());
		$col4 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $linha)->getValue());
		$col5 = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5, $linha)->getValue());

		if($col1 != ""){
			$SQL = "insert into pontos_produtos(cd_produto, cd_barras, descricao, pontos, fracionado, fornecedor)values('".$col0."', '".$col1."', '".$col2."', '".$col3."', '".$col4."', '".$col5."') ";
			mysql_query($SQL, $conexao);
		}
	}
}
    if(mysql_affected_rows()>0){
        echo "<script type='text/javascript'>alert('Processamento efetuado com sucesso!');window.open('cadastro_de_pontuacoes.php', '_self');</script>";	
    }else{
        echo "<script type='text/javascript'>alert('Algo de errado. Tente novamente');window.open('cadastro_de_pontuacoes.php', '_self');</script>";	
    }
}
?>


<?php include "footer.php";?>

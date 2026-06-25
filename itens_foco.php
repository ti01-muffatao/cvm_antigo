<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
//conecta BD comentarios//
include "conexao2.php";
?>
<!--
**********************************************
CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
**********************************************
--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->
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
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- ######### ESTILO CSS ######### -->
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
<!-- ######### ARQUIVOS JS ######### --> 
<!-- get jQuery from the google apis --> 
<script type="text/javascript" src="js/universal/jquery.js"></script> 
<!-- style switcher --> 
<script src="js/style-switcher/jquery-1.js"></script> 
<script src="js/style-switcher/styleselector.js"></script> 
<!-- mega menu --> 
<script src="js/mainmenu/bootstrap.min.js"></script> 
<script src="js/mainmenu/customeUI.js"></script> 
<!-- sticky menu --> 
<script type="text/javascript" src="js/mainmenu/sticky.js"></script> 
<script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script> 
<!-- scroll up --> 
<script src="js/scrolltotop/totop.js" type="text/javascript"></script>
<script src="js/universal/tooltip2.js"></script>
<!--- Tabs --->
<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
<!-- Flexslider --> 
<script  src="js/flexslider/jquery.flexslider.js"></script> 
<script  src="js/flexslider/custom.js"></script>
</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>
  <div class="clearfix"></div>
  <div class="section_holdergrupos">
    <div class="container">
      <div class="one_full">
        <h3>Itens Foco Mensal</h3>
        <ul class="tabs7">
          <li><a href="#grupo-1" target="_self">Tabela de Itens Foco</a></li>
          <li><a href="#grupo-2" target="_self">O Que São os Itens Foco?</a></li>
        </ul>
        <div class="tabs-content7">
          <div id="grupo-1" class="tabs-panel7">
            <p>
            <div class="table-style">
            <h5>* Posicione o mouse sobre o item para visualizar a imagem do produto!</h5>
<table class="table-list2">
	<tr>
		<th>FORNECEDORES</th>
		<th>NOVEMBRO</th>
		<th>DEZEMBRO</th>
		<th>JANEIRO</th>
		<th>FEVEREIRO</th>
	</tr>
    <tr>
		<th>BETTANIN</th>
		<td <a onMouseover="toolTip('<b>ESPONJA BRILHUS 64 P3<br><img src=images/item-foco/bettanin-novembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Esponja Brilhus L4 P3 <br><strong>05 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>SACO LIXO ROLO<br><img src=images/item-foco/bettanin-dezembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Saco Lixo Rolo 15/30/50/100 LTS<br><strong>10 FDS</strong></td>
		<td <a onMouseover="toolTip('<b>ESPONJA ESFREBOM 64 P3<br><img src=images/item-foco/bettanin-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Esponja Esfrebom L4 P3 <br><strong>05 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>LUVAS P/M/G<br><img src=images/item-foco/bettanin-fevereiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Luvas P/M/G <br><strong>10 DÚZIAS</strong></td>
	</tr>
	<tr>
		<th>CARGILL</th>
		<td <a onMouseover="toolTip('<b>MOLHO TARANTELLA SABORES<br><img src=images/item-foco/cargill-novembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Molho Tarantella Sabores<br><strong> 05 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>MAIONESE LIZA CASEIRA<br><img src=images/item-foco/cargill-dezembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Maionese Liza Caseira <br><strong>03 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>MOLHO LIZA SALADA TODOS<br><img src=images/item-foco/cargill-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Molho Liza Salada<br><strong>36 Und</strong></td>
		<td <a onMouseover="toolTip('<b>AZEITE BORGES 500ml<br><img src=images/item-foco/cargill-fevereiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Azeite Borges 500ml Vidro<br><strong> 24 Und</strong></td>
	</tr>
	<tr>
		<th>GE ILUMINAÇÃO</th>
		<td <a onMouseover="toolTip('<b>LÂMPADA TRIPLA 22W<br><img src=images/item-foco/ge-novembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Lâmpada Tripla 22W <br><strong>50 Und</strong></td>
		<td <a onMouseover="toolTip('<b>LÂMPADA ESPIRAL 24W<br><img src=images/item-foco/ge-dezembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Lâmpada Espiral 24W <br><strong>50 Und</strong></td>
		<td <a onMouseover="toolTip('<b>LAMP. TRIPLA 20W<br><img src=images/item-foco/ge-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Lâmpada Tripla 20W <br><strong>50 Und</strong></td>
		<td <a onMouseover="toolTip('<b>LAMP. LED (TODAS)<br><img src=images/item-foco/ge-fevereiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Lâmpada Led (TODAS)<br><strong>20 Und</strong></td>
	</tr>
	<tr>
		<th>MAT INSET</th>
		<td <a onMouseover="toolTip('<b>DESINF. FLUSS PASTILHA<br><img src=images/item-foco/matinset-novembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Desinfetante Fluss Pastilha <br><strong>72 Und</strong></td>
		<td <a onMouseover="toolTip('<b>REPEL. NO INSET LOÇÃO<br><img src=images/item-foco/matinset-dezembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Repelente No Inset Loção <br><strong>24 Und</strong></td>
		<td <a onMouseover="toolTip('<b>INSET MAT INSET AER. MULTI PROM.<br><img src=images/item-foco/matinset-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Inset Mat Inset AER Multi Promocional <br><strong>10 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>INSET MAT INSET AER. MULTI PROM.<br><img src=images/item-foco/matinset-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Inset Mat Inset AER Multi Promocional <br><strong>10 Caixas</strong></td>
	</tr>
	<tr>
		<th>UNILEVER</th>
		<td <a onMouseover="toolTip('<b>TIRA MANCHAS OMO SACHET LÍQ.<br><img src=images/item-foco/unilever-novembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Tira Manchas OMO Sachet Líq.<br><strong>12 Und</strong></td>
		<td <a onMouseover="toolTip('<b>CIF CREMOSO TODOS<br><img src=images/item-foco/unilever-dezembro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Cif Cremoso <br><strong>05 Caixas</strong></td>
		<td <a onMouseover="toolTip('<b>SH TRESSEME 200ml<br><img src=images/item-foco/unilever-janeiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Shampoo Tresseme 200ml <br><strong>05 Dúzias</strong></td>
		<td <a onMouseover="toolTip('<b>DES. SUAVE FEM.<br><img src=images/item-foco/unilever-fevereiro.jpg>', 'auto:auto', 100, 20, '')" onMouseOut="toolTip()">Desodorante Suave Feminino<br><strong>05 Dúzias</strong></td>
	</tr>
</table>
        </div>
        </p>
          </div>
          <!-- FIM GRUPO 1 -->
          
          <div id="grupo-2" class="tabs-panel7">
            <p>
            <img src="images/media/item_foco.jpg" alt="" class="img_left2" />
            <p>Fechando a Meta do Item Foco Mensal de Todos os Fornecedores Participantes, os RCA’s estarão Ganhando 01 (uma) Cartela Mensal para Concorrer ao BINGO ITEM FOCO MENSAL.<br><br>
 O BINGO ITEM FOCO MENSAL serão 04(quatro) PRÊMIOS de R$ 1.000,00 (mil reais). Para ganhar a Cartela Mensal os RCA’s terão que Fechar as Metas dos Itens Foco Mensal de todos os Fornecedores Participantes da Campanha. A Meta É MENSAL e NÃO É ACUMULATIVA.<br><br>
Para participar os RCA’s terão que obter no MÍNIMO 02(duas) Cartelas, ou seja, terão que fechar as Metas dos Itens Foco de Todos os Fornecedores participantes em no mínimo 02(dois) Meses.
</p>
          </div>
          <!-- FIM GRUPO 2 -->
        </div>
      </div>
      </div>
      <!-- FIM DAS TABELAS GRUPOS --> 
	 <!--- COMENTÁRIOS TRANSIÇÃO --->
        <div class="clearfix"></div>
  			<div class="section_holder36">
    			<div class="container">
      			<div class="section_title_line_full"></div>
      			<div class="clearfix"></div>
      			<section class="slider">
      			<div class="flexslider style6">
         	 	<ul class="slides">
                <?php $SQL = "select * from comments where is_approved='1'";
	      	 	 $SQL .= " order by dated desc limit 5 ";
		   	  	 $RSS = mysql_query($SQL, $conexao2);
		   	  	 while($RS = mysql_fetch_array($RSS))
			 	 {?>
            	<li>
              	<div class="">
                <div class="text_holder">
                  <p><b><?php echo $RS['name'];?> (<?php echo $RS['town'];?>) Diz...</b></p>
                  <p><?php $tamanho = strlen($RS["comment"]);
						if($tamanho < 50){
						echo $RS["comment"]."&nbsp;";
						}else{
						echo substr($RS["comment"],0,350)." ....";};
				 ?><a href="comentarios.php"><font color="#CC0000"> &nbsp; Ver Mais</a></font>
                 <?php }?>
                    </p>
                </div>
              </div>
            </li>
          </ul>
		 <!-- FIM COMENTÁRIOS TRANSIÇÃO -->
          </ul>
        </div>
      </section>
    </div>
  </div>
  </div>
  </div>
  </div>
<!--end section-->
<?php include "footer.php";?>
</body>
</html>
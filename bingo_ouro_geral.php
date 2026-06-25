<?php include "administrar/ora_connect.php";
include "administrar/restricao_de_login.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
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
<title>19ª Campanha de Verão Muffatão</title>
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

<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/stylesheets/theme-custom.css">
<script src="http://portal.muffatao.com.br/pag/assets/vendor/modernizr/modernizr.js"></script>


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
        <h3>Bingo OURO - MOTOS</h3>
        
		<?php
			$diasPassaramGeral 	= dias_passaram_geral();
			$dias_realGeral		= ($diasPassaramGeral / 86) * 100;
			//echo $passaram;	
				
			///CONSULTA DEVOLUCAO EMPRESA ///
			$metaEmpresa = "26975000.00";
			$RSS1 = oci_parse($oraconnect, "SELECT SUM(d1.D1_TOTAL) as DEVGRUPO from SIGA.SD1010 d1, SIGA.SF2010 f2, SIGA.SA3010 a3, SIGA.SF4010 F4
		where d1.D1_FILIAL in('09','10') and a3.A3_GEREN in('9001','9002','9004') and d1.D1_EMISSAO >= '20221101' and d1.D1_EMISSAO <= '20230228' and d1.D1_TIPO = 'D' and d1.D1_NFORI <> ' ' and d1.D1_SERIORI <> ' ' and f2.F2_VEND1 <>'000001' and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_= ' ' and a3.D_E_L_E_T_= ' ' and f2.F2_VEND1 = a3.A3_COD and d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_FILIAL = d1.D1_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' AND d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE IN('000184','000054','000305','000037','000057') AND D_E_L_E_T_ = ' ') ");
			oci_set_prefetch($RSS1, 300);//Define o número de linhas a serem pré-buscadas por consultas
			oci_execute($RSS1,OCI_DEFAULT);
			$RS1 = oci_fetch_assoc($RSS1);
		 
			///CONSULTA VENDA FATURADA EMPRESA///
			$RSS = oci_parse($oraconnect, "SELECT SUM(D2.D2_VALBRUT) AS FATGRUPO FROM SIGA.SD2010 D2, SIGA.SF2010 F2, SIGA.SA3010 A3, SIGA.SF4010 F4 WHERE D2.D2_FILIAL IN ('09','10') AND D2.D2_EMISSAO >='20221101' AND D2.D2_EMISSAO <= '20230228' and D2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = D2.D2_FILIAL AND A5_FORNECE IN('000184','000054','000305','000037','000057') AND D_E_L_E_T_ = ' ') AND D2.D2_TIPO = 'N' AND D2.D_E_L_E_T_ <> '*' AND F2.F2_FILIAL = D2.D2_FILIAL AND F2.F2_DOC = D2.D2_DOC AND F2.F2_SERIE = D2.D2_SERIE AND F2.F2_CLIENTE = D2.D2_CLIENTE AND F2.F2_LOJA = D2.D2_LOJA AND F2.F2_EMPDEST = ' ' AND F2.D_E_L_E_T_ <> '*' AND A3.A3_FILIAL = F2.F2_FILIAL AND A3.A3_COD = F2.F2_VEND1 AND A3_GEREN IN('9001','9002','9004') AND A3.D_E_L_E_T_ <> '*' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
			oci_execute($RSS,OCI_DEFAULT);
			$RS = oci_fetch_array($RSS);
			$vd_empresa 	= $RS["FATGRUPO"] - $RS1['DEVGRUPO'];
			$PerceEmpresa 	= ($vd_empresa / $metaEmpresa)*100;
		?>        
        
        <!--INICIO BARRAS-->
        <!--PERIODO --> 
        <?php if( in_array($_SESSION['CD_CODIGO'], array('6000','6001','6002','6003','6004'))) {
					echo $_SESSION['DS_USUARIO'].", apenas você pode ver esta descrição.<br>";
					echo "Meta Total: ".number_format($metaEmpresa,2,",",".")." - Real: " .number_format($vd_empresa,2,",",".");
					echo "<br><br>";
				}
		?>  
        <div class="progress progress-md progress-half-rounded m-md">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dias_realGeral;?>%;">
               <b class="textbarra">Período. <?php echo number_format("$dias_realGeral",2,",","")."%";?></b>
            </div>
        </div>
        <br>
        <!--PERCENTUAL VENDA-->
        <div class="progress progress-md progress-half-rounded m-md">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $PerceEmpresa;?>%;">
               <b class="textbarra">Venda: <?php echo number_format("$PerceEmpresa",2,",","")."%";?></b>
            </div>
        </div>
        <!--FIM BARRAS-->    
                
        <div class="tabs-content7">
            <h3>Desempenho Geral</h3>
            <div class="divider"></div>
            <div class="table-style">
            <table class="table-list2">
                <tr>
                    <th>Fornecedor</th>
                    <th>Meta</th>
                    <th>Realizado</th>
                    <th>%</th>
                    <th>Progresso</th>
                </tr>
                <?php
					//MOTTTTTOOOOOOOOOOOOOOOOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
					$data_min 		= "20221101";
					$data_max 		= "20230228";
					$cartelas		  = 0;
					$dsCartelas		= "0";
					$cartExtra 		= 0;
					//BINGO OURO - MOTOS
					$RSS = mysql_query("select * from metas_bingo_ouro_geral order by vl_meta asc ",$conexao);
					while($RS = mysql_fetch_array($RSS)){
					// extras bingo
					$sumMeta += $RS['vl_meta'];
						
					//CONSULTA DEVOLUCAO FONECEDOR
					$RSSVD = oci_parse($oraconnect, "SELECT SUM(d1.D1_TOTAL) AS DEVOLUCAO from SIGA.SF2010 f2, SIGA.SD1010 d1, SIGA.SA3010 a3, SIGA.SF4010 F4 where f2.F2_FILIAL = d1.D1_FILIAL and d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI and f2.F2_VEND1 = a3.A3_COD and d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE = '".$RS['cd_fornecedor']."' AND D_E_L_E_T_ = ' ') and d1.D1_TIPO = 'D' and a3.A3_GEREN IN ('9001','9002','9004') and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and a3.D_E_L_E_T_= ' ' and d1.D1_FILIAL IN ('09','10') and f2.F2_VEND1 <>'000001' and d1.D1_EMISSAO >= '".$data_min."' and d1.D1_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
					oci_set_prefetch($RSSVD, 300);
					oci_execute($RSSVD,OCI_DEFAULT);
					$RSVD = oci_fetch_assoc($RSSVD);
				
					///CONSULTA VENDA FORNECEDOR///
					$RSS2 = oci_parse($oraconnect, "SELECT SUM(d2.D2_VALBRUT) AS VENDA from SIGA.SF2010 f2, SIGA.SD2010 d2, SIGA.SA3010 u3, SIGA.SF4010 F4 where f2.F2_FILIAL = d2.D2_FILIAL and f2.F2_FILIAL = u3.A3_FILIAL and f2.F2_DOC = d2.D2_DOC and f2.F2_CLIENTE = d2.D2_CLIENTE and f2.F2_LOJA = d2.D2_LOJA and f2.F2_SERIE = d2.D2_SERIE and f2.F2_EMISSAO = d2.D2_EMISSAO and d2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d2.D2_FILIAL AND A5_FORNECE = '".$RS['cd_fornecedor']."' AND D_E_L_E_T_ = ' ') and d2.D2_TIPO = 'N' and d2.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and u3.D_E_L_E_T_ = ' ' and f2.F2_VEND1 = u3.A3_COD and f2.F2_VEND1 <>'000001' and u3.A3_GEREN IN ('9001','9002','9004') and d2.D2_FILIAL IN ('09','10') and d2.D2_EMISSAO >= '".$data_min."' and d2.D2_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = d2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
					oci_set_prefetch($RSS2, 300);
					oci_execute($RSS2,OCI_DEFAULT);
					$RS2 = oci_fetch_assoc($RSS2);
					$venda 		= ($RS2['VENDA'] - $RSVD['DEVOLUCAO']);
					$perce 		= ($venda / $RS['vl_meta'])*100;
					//
					$sumVenda += $venda;
					
					//regras  extras
					$perce = ($venda / $RS['vl_meta'])*100;
					
					$perceTotalVenda = ($sumVenda / $sumMeta)*100;
				?>
   <tr>
      <td><?php echo BuscaClifor($RS['cd_fornecedor']);?></td>
      <td>R$ <?php echo number_format($RS['vl_meta'],2,",",".");?></td>
      <td>R$ <?php echo number_format($venda,2,",",".");?></td>
      <td><?php echo number_format($perce,2,",","");?> %</td>
      <td>
         <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
               <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dias_realGeral;?>%;">
               <b class="textbarra">Período. <?php echo number_format("$dias_realGeral",2,",","")."%";?></b>
               </div>
         </div>
         <div class="progress progress-md progress-half-rounded m-md">
               <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $perce;?>%;">
               <b class="textbarra">Venda. <?php echo number_format("$perce",2,",","")."%";?></b>
               </div>
         </div>
      </td>
   </tr>
   <?php $cartExtra=0;}?>
   <tr>
      <th>TOTAIS</th>
      <th><?php echo number_format($sumMeta,2,",",".");?></th>
      <th><?php echo number_format($sumVenda,2,",",".");?></th>
      <th><?php echo number_format($perceTotalVenda,2,",","");?> %</th>
      <th></th>
   </tr>
            </table>
            <br>
            </div>
            <?php unset($data_min, $data_max, $cartelas, $dsCartelas, $cartExtra, $sumMeta, $venda, $perce, $sumVenda, $libCartExtra, $perceTotalVenda, $sumCart);?>               
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
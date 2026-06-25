<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
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
        <h3>Ranking Bingo Farma</h3><br>
            <?php
			//$cartelas = array(1,1,1,1,1,1,1,1,1,1);
			?>
            <div class="table-style">
          <table class="table-list2">
            <tr>
              <th>Ranking</th><!-- POSIÇÃO -->
              <th>Nome</th><!-- NOME DO REPRESENTANTE -->
              <th>Código</th><!-- CODIGO DO REPRESENTANTE -->
              <th>Grupo</th><!-- GRUPO DO REPRESENTANTE -->
              <th>Estado</th><!-- SUP. DO REPRESENTANTE -->
              <th>Meta Geral</th><!-- META GERAL DO GRUPO -->
              <th>Total</th><!-- TOTAL DE PONTOS DO REPRESENTANTE -->
              <th>%</th><!-- PORCENTAGEM FEITA ACIMA DA META -->
              <th>Faltam p/ Meta</th>
              <th>Cartelas</th><!-- NUMERO DE CARTELAS -->
            </tr>
            <?php $SQL = "select e.cd_estado, e.ds_uf, g.cd_grupo, g.vl_metag, g.ds_grupo, u.ds_usuario, p.cd_codigo, sum(p.cd_pontos) as pontos , ((sum(p.cd_pontos)/vl_metag)*100) as perce from grupos as g, estados as e, pontuacao as p, usuarios as u, campanhas as c where p.cd_codigo = u.cd_codigo and u.cd_grupo = g.cd_grupo and u.cd_estado = e.cd_estado and u.cd_ativo = 1 and u.cd_grupo in(19,20) and p.dt_data = (select dt_data from pontuacao order by dt_data desc limit 1)";
			$SQL .= " group by u.ds_usuario, p.cd_codigo order by perce desc";
			$RSS = mysql_query($SQL, $conexao);
			while($RS = mysql_fetch_array($RSS)){
				$x = $x + 1;
				$tt = $tt + $RS["pontos"];
				//PORCENTAGEM DE PONTOS
				$total = $RS["pontos"];
				$meta = $RS["vl_metag"];
				$resultado = ($total / $meta) * 100;
				//MOSTRA CARTELAS SE ATINGIR META
				$mensagem = '';
				if($total >= $meta){
  				$mensagem = '1';
				} else {
  				$mensagem = '0';
				}
				//MOSTRA QUANTO FALTA PARA META
				$falta = '';
				if($total < $meta){
  				$falta = ($meta - $total).'&nbsp;pts';
				} else {
  				$falta = 'Fechou a Meta';
				}
				//$falta = ($meta - $total).'&nbsp;pts';
				?>
            <tr <?php if($RS["ds_usuario"] == $_SESSION["DS_USUARIO"]){echo 'style="color:#C30009; font-weight: bold;"';}?>>
              <td><?php echo $x;?>º</td>
              <td><?php echo $RS["ds_usuario"];?></td>
              <td><?php echo $RS["cd_codigo"];?></td>
              <td><?php echo $RS["ds_grupo"];?></td>
              <td><?php echo $RS["ds_uf"];?></td>
              <td><?php echo $RS["vl_metag"];?></td>
              <td><?php echo $RS["pontos"];?></td>
              <td><?php echo number_format("$resultado",1,",","")."%";?></td>
              <td><?php echo "$falta";?></td>
              <td><?php echo "$mensagem";?></td>
              <!--<td><?php //if(isset($cartelas[$n-0])) { echo $cartelas[$n-0]; };?></td>-->
            </tr>
            <?php }?>
          </table>
        </div>
          </div>
          <!-- FIM GRUPO 1 -->
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
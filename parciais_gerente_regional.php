<?php 
include "administrar/ora_connect.php";
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
?>

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!---[if lt IE 9]
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
[endif]--->
<!-- ######### CSS ESTILOS ######### -->
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<!-- MOBILE -->
<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
<!-- mega menu -->
<link href="js/mainmenu/sticky.css" rel="stylesheet">
<link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
<link href="js/mainmenu/demo.css" rel="stylesheet">
<link href="js/mainmenu/menu.css" rel="stylesheet">

<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/magnific-popup/magnific-popup.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
<link rel="stylesheet" href="http://portal.muffatao.com.br/pag/assets/stylesheets/theme-custom.css">
<script src="http://portal.muffatao.com.br/pag/assets/vendor/modernizr/modernizr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.5/gauge.min.js"></script>

<!-- ICONES -->
<link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
<!-- FONECEDORES -->
<link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
<!-- flexslider -->
<link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
</head>
<body style="margin-top:-25px;">
<?php include "loading.php" ?>
<?php include "menu.php";?>  
<div class="clearfix"></div>
  <div class="container"></div>
    <div class="clearfix"></div>
    <div class="section_holdergrupos">
      <div class="container"><h3 align="left">Parciais Gerente Regional Mix Estrela até <?php echo date('d/m/Y');?></h3></div>
    </div>
    <div class="clearfix"></div>
    <div class="portfolio_four">
      <div class="container">
        <div class="tabs-content7">
          <div id="grupo-1" class="tabs-panel7">
            <div class="table-style">              
              <table class="table-list2" style="display: none;">
                <tr>
                  <th>GERENTE</th>
                  <?php 
                  $cont_metas_fechadas = 0;
                  $cont_metas_geral = 0;
                  $diasPassaramGeral 	= dias_passaram_geral();
                  $dias_realGeral   = ($diasPassaramGeral / 86) * 100;
                  $data_min = "20241101";
                  $data_max = "20250228";
                  $sumVendaGR = 0; 
                  $sumMetaGR = 0;
                  $RSS = mysql_query("select * from clifor_prata order by ds_razao asc", $conexao);
						      while($RS = mysql_fetch_array($RSS)){
						        $i = $i + 1;
						        $forne[$i] = $RS["cd_fornecedor"];?>
						      <th><?php echo $RS["ds_razao"];?></th>
                  <?php }?>
                  <th>TOTAL</th>
                  <th>PROGRESSO</th>
                </tr>
                <tr>
                <?php 
                $ranking = array();                 
						    $RSSG = mysql_query("select * from usuarios where cd_perfil = 2 and cd_ativo = 1 ");
						    while($RSG = mysql_fetch_array($RSSG)){
                ?>
                <th><?php echo BuscaGerente($RSG["cd_codigo"]);?></th>
                <?php for($k = 1; $k <= $i; $k++){
                $SQL = "select * from metas_gerente_prata where cd_codigo = '".$RSG['cd_codigo']."' and cd_fornecedor = '".$forne[$k]."' ";
                $SQL .= " order by cd_codigo asc";                                
                $RSS = mysql_query($SQL, $conexao);	
                while($RS = mysql_fetch_array($RSS)){					
                 //CONSULTA DEVOLUCAO FONECEDOR
                  // filial dinâmica 
                  // d1.D1_FILIAL = '".$RS["cd_filial"]."'
                  $RSSVD = oci_parse($oraconnect, "select SUM(d1.D1_TOTAL) AS DEVOLUCAO from SIGA.SF2010 f2, SIGA.SD1010 d1, SIGA.SA3010 a3, SIGA.SF4010 F4 where f2.F2_FILIAL = d1.D1_FILIAL and d1.D1_FILIAL = a3.A3_FILIAL and f2.F2_DOC = d1.D1_NFORI and f2.F2_SERIE = d1.D1_SERIORI and f2.F2_VEND1 = a3.A3_COD and d1.D1_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d1.D1_FILIAL AND A5_FORNECE = '".$forne[$k]."' AND D_E_L_E_T_ = ' ') and d1.D1_TIPO = 'D' and a3.A3_GEREN = '".$RSG['cd_codigo']."' and d1.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and a3.D_E_L_E_T_= ' ' and d1.D1_FILIAL IN ('09','10') and f2.F2_VEND1 <>'000001' and d1.D1_EMISSAO >= '".$data_min."' and d1.D1_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = D1.D1_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");
                  oci_set_prefetch($RSSVD, 300);
                  oci_execute($RSSVD,OCI_DEFAULT);
                  $RSVD = oci_fetch_assoc($RSSVD);
                 //CONSULTA VENDA FORNECEDOR///
                  $RSS2 = oci_parse($oraconnect, "select SUM(d2.D2_VALBRUT) AS VENDA from SIGA.SF2010 f2, SIGA.SD2010 d2, SIGA.SA3010 u3, SIGA.SF4010 F4 where f2.F2_FILIAL = d2.D2_FILIAL and f2.F2_FILIAL = u3.A3_FILIAL and f2.F2_DOC = d2.D2_DOC and f2.F2_CLIENTE = d2.D2_CLIENTE and f2.F2_LOJA = d2.D2_LOJA and f2.F2_SERIE = d2.D2_SERIE and f2.F2_EMISSAO = d2.D2_EMISSAO and d2.D2_COD IN (SELECT DISTINCT(A5_PRODUTO) FROM SIGA.SA5010 WHERE A5_FILIAL = d2.D2_FILIAL AND A5_FORNECE = '".$forne[$k]."' AND D_E_L_E_T_ = ' ') and d2.D2_TIPO = 'N' and d2.D_E_L_E_T_ = ' ' and f2.D_E_L_E_T_ = ' ' and u3.D_E_L_E_T_ = ' ' and f2.F2_VEND1 = u3.A3_COD and f2.F2_VEND1 <>'000001' and u3.A3_GEREN = '".$RSG['cd_codigo']."' and d2.D2_FILIAL IN ('09','10') and d2.D2_EMISSAO >= '".$data_min."' and d2.D2_EMISSAO <= '".$data_max."' AND F4.F4_FILIAL='  ' AND F4.F4_CODIGO = d2.D2_TES AND F4.F4_DUPLIC='S' AND F4.D_E_L_E_T_=' ' ");                  
                  oci_set_prefetch($RSS2, 300);
                  oci_execute($RSS2,OCI_DEFAULT);
        					$RS2 = oci_fetch_assoc($RSS2);
                  $venda = 0;
        					$venda 		= ($RS2['VENDA'] - $RSVD['DEVOLUCAO']);
                  $sumVendaGR += $venda; 
                  $sumMetaGR += $RS['vl_meta'] + ($RS['vl_meta']*0.15);                  
        					$perce 		= ($venda / $RS['vl_meta'])*100;                  
        					if($perce >= 100){ $cor = "#01ce24"; 
                    $cont_metas_fechadas++;
                  }else{
						      $cor = "#f3735e";}
                  $sumMeta 	+= $RS['vl_meta'];
                  $sumVenda 	+= $venda;
                  $sumPerce = ($sumVenda / $sumMeta)*100;  
                  $meta_com_15_porcento = $RS['vl_meta'] + ($RS['vl_meta']*0.15);                                                                    
                  ?>
                  <td>
                    <table>
                      <tr>
                        <td width="40%"><strong>Meta:</strong><br><?php echo number_format($meta_com_15_porcento,2,",",".");?></td>
                        <td width="60%"><strong>Real:</strong><br><?php echo number_format($venda,2,",",".");?></td>
                        <td width="100%" style="background:<?php echo $cor;?>"><strong>%:</strong><br><?php echo number_format($perce,2,",","");?></td>
                      </tr>
                    </table>
                  </td>
                  <?php }
                  }
                    if($sumPerce >= 100){ $cor = "#01ce24";
                    }else{
                    $cor = "#f3735e";}
                    if($sumPerce >= 115){
                      $cont_metas_geral++;
                    }
                  ?>
                  <td>
                    <table>
                      <tr>
                        <td width="40%"><strong>Meta:</strong><br><?php echo number_format($sumMeta,2,",",".");?></td>
                        <td width="60%"><strong>Real:</strong><br><?php echo number_format($sumVenda,2,",",".");?></td>
                        <td width="100%" style="background:<?php echo $cor;?>"><strong>%:</strong><br><?php echo number_format($sumPerce,2,",","");?></td>
                      </tr>
                    </table>
                  </td>
                  <td>
                    <div class="progress progress-md progress-half-rounded m-md" style="margin-bottom:3px;">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dias_realGeral;?>%;">
                        <b class="textbarra" style="width: 100px;">Período. <?php echo round($dias_realGeral)."%";?></b>
                      </div>
                    </div>
                    <br>
                    <div class="progress progress-md progress-half-rounded m-md">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $sumPerce;?>%;">
                        <b class="textbarra" style="width: 100px;">Venda. <?php echo number_format("$sumPerce",2,",","")."%";?></b>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php } ?>
              </table>  
              <?php
                $porcentagem_meta_fechada = ($cont_metas_fechadas*100)/30;
                $porcentagem_meta_geral = ($cont_metas_geral*100)/3;
                $sumPerceGR = ($sumVendaGR*100)/$sumMetaGR;
              ?>  
              <table class="table-list2">
                <tr>
                  <td style="border: none;">
                    <table>
                      <tr>
                        <td width="50%"><strong>Meta:</strong><br>R$ <?php echo number_format($sumMetaGR,2,",",".");?></td>
                        <td width="50%"><strong>Real:</strong><br>R$ <?php echo number_format($sumVendaGR,2,",",".");?></td>
                        <td width="100%" style="border: none;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <div style="clear: both;"></div>
              <div style="width: 500px; padding-top: 10px; text-align: center; margin: 20px auto; border: #CCC solid 1px;">
                <span style="font-size: 20px; line-height: 24px; font-family: 'Courier New', Courier, monospace;">Vendocímetro</span>
                <div style="width: 450px; margin: 20px auto;">
                  <canvas width=450 height=250 id="canvas-preview"></canvas>
                </div>
              </div>
              <div style="clear: both;"></div>
              <?php
                  $dias_real = ($diasPassaramGeral / 86) * 100; 
              ?>
              <!--PERIODO -->  
              <div style="margin: 35px 20px 0 0; width: 100%; height: 100%; min-height: 21px; border-radius: 5px; background: #474453; box-shadow: 0 1px 3px 0 rgba(0,0,0,.4) inset;">  
                  <div class="progress progress-striped" style="width: 100%;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $dias_real;?>" aria-valuemin="0" aria-valuemax="200" style="width: <?php echo $dias_real;?>%;"><span class="sr-only" style="margin-left: 15px;">Período <?php echo number_format(round("$dias_real"), 0,",","")."%";?></span></div>
                  </div>
                  <!--<span style="float:left; margin-left: 10px;">Venda: <b>R$ <?php echo number_format($sumVendaGR,2,",",".");?></b></span>-->
              </div>
              <div class="clear"></div>
              <!--PERIODO --> 
              <div style="margin: 15px 20px 50px 0; width: 100%; height: 100%; min-height: 21px; border-radius: 5px; background: #474453; box-shadow: 0 1px 3px 0 rgba(0,0,0,.4) inset;"> 
              <div class="progress progress-striped" style="width: 100%;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $sumPerceGR;?>" aria-valuemin="0" aria-valuemax="200" style="width: <?php echo $sumPerceGR;?>%;"><span class="sr-only" style="margin-left: 15px;">Venda <?php echo number_format(round("$sumPerceGR"), 0,",","")."%";?></span></div>
                  </div>  
              </div>  
              <div class="clear"></div>
          </div>
        </div>           
    </div>
  </div>
  <!-- FINAL QUADRO DE FORNECEDORES -->
  <div class="clearfix"></div>
  <?php include "footer.php";?>
  <!-- ######### ARQUIVOS JS ######### --> 
  <script type="text/javascript" src="js/universal/jquery.js"></script> 
  <!-- style switcher --> 
  <script src="js/style-switcher/jquery-1.js"></script> 
  <script src="js/style-switcher/styleselector.js"></script> 
  <!-- mega menu --> 
  <script src="js/mainmenu/bootstrap.min.js"></script> 
  <script src="js/mainmenu/customeUI.js"></script> 
  <!-- scroll up --> 
  <script src="js/scrolltotop/totop.js" type="text/javascript"></script> 
  <!-- sticky menu --> 
  <script type="text/javascript" src="js/mainmenu/sticky.js"></script> 
  <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script> 
  <!-- scroll up --> 
  <script src="js/scrolltotop/totop.js" type="text/javascript"></script> 
  <!-- cubeportfolio --> 
  <script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
  <script type="text/javascript" src="js/cubeportfolio/main-juicy.js"></script>
  <script type="text/javascript">
      var opts = {
        angle: -0.01, // The span of the gauge arc
        lineWidth: 0.20, // The line thickness
        radiusScale: 1, // Relative radius
        pointer: {
          length: 0.35, // // Relative to gauge radius
          strokeWidth: 0.035, // The thickness
          color: '#000000' // Fill color
        },
        limitMax: false,     // If false, max value increases automatically if value > maxValue
        limitMin: false,     // If true, the min value of the gauge will be fixed
        colorStart: '#6F6EA0',   // Colors
        colorStop: '#C0C0DB',    // just experiment with them
        strokeColor: '#EEEEEE',  // to see which ones work best for you
        generateGradient: true,
        highDpiSupport: true,     // High resolution support
        // renderTicks is Optional
        renderTicks: {
          divisions: 8,
          divWidth: 1.1,
          divLength: 1,
          divColor: '#333333',
          subDivisions: 0,
          subLength: 0.5,
          subWidth: 0.6,
          subColor: '#666666'
        },
        staticZones: [
          {strokeStyle: "#f03e3e", min: 0, max: 10},
          {strokeStyle: "#fa5f31", min: 10, max: 20},
          {strokeStyle: "#ff9a0f", min: 20, max: 30},
          {strokeStyle: "#e1cc00", min: 30, max: 40},
          {strokeStyle: "#d0d500", min: 40, max: 50},
          {strokeStyle: "#adce02", min: 50, max: 60},
          {strokeStyle: "#89c612", min: 60, max: 70},
          {strokeStyle: "#62bd20", min: 70, max: 80},
          {strokeStyle: "#62bd20", min: 80, max: 90},
          {strokeStyle: "#30b32d", min: 90, max: 100},
        ],
        staticLabels: {
            font: "12px sans-serif",  // Specifies font
            labels: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],  // Print labels at these values
            color: "#000000",  // Optional: Label text color
            fractionDigits: 0  // Optional: Numerical precision. 0=round off.
        },
      };
      var target = document.getElementById('canvas-preview'); // your canvas element
      var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
      gauge.maxValue = 100; // set max gauge value
      gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
      gauge.animationSpeed = 32; // set animation speed (32 is default value)
      gauge.set(<?php echo $sumPerceGR; ?>); // set actual value
    </script>
  </body>
</html>

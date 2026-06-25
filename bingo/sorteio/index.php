<?php
include "../../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

$get_cdcodigo 	= $_POST['cd_codigo'];
$get_cdBingo 	= $_GET['cd_bingo'];

switch ($get_cdBingo) {
	case '1':
		$nomeBingo = "BINGO OURO";
		break;

	case '2':
		$nomeBingo = "BINGO PRATA";
		break;
		
	case '3':
		$nomeBingo = "BINGO GERAL";
		break;		
	
	default:
		# code...
		break;
}

//verificar se usuario tem cartelas para o bingo selecionado
$RSSB = mysql_query("select * from bin_cartelas where cd_codigo = '".$_SESSION['CD_CODIGO']."' and cd_bingo = '".$get_cdBingo."' ",$conexao);
$RSB = mysql_fetch_assoc($RSB);
if (mysql_num_rows($RSSB)<=0) {
	echo "<script language='javascript'>alert('Ops, você não tem cartelas para este bingo!');window.open('../index.php', '_self');</script>";
}

$inicio = 1;
$cartelas = 2;
$colunas = 5;
$numero = 25;
$limite = 75;
$largurcartela = 55;
$alturacartela = 40;
$meio = true;
$cartelas_ = array();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Bingo</title>

<style type="text/css">
body {
  font-family: Arial, sans-serif;
  text-align: center;
}

#flex {
  display: flex;
  flex-flow: row wrap;
  width: 100%;
}

.item {
	padding: 10px;
   margin: 0 auto;
}

.td-link{
  width: 100%;
  height: 100%;
  text-decoration: none;
  text-align: center;
  vertical-align: middle;
  line-height: 59px;      
}

.td-link:hover  {
  background-color: #07afc1;
}

a {
   text-decoration: none;
   color: black;
}

.sorteadas{
	margin-bottom: 75px;
}

.sorteadas p{
	font-size: 22px;
}

.fundo_numero{
	border-radius: 52px;
   background: #07afc1;
   padding: 10px;
   width: 10px;
   height: 10px;
   font-weight: 600;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function marcaNumero(user, num, divId, cartela, bingo){	
	//alert(user+","+num+","+divId+","+cartela);
	$.ajax({ url: 'grava_numero.php',
      type:'POST',
      url:'grava_numero.php',
      dataType:"json",  
      data: {cd_codigo:user, cd_numero:num, cd_cartela:cartela, cd_bingo:bingo},
      success: function(data) {
      	if (data.status == "ok") {
      		document.getElementById(divId).style.backgroundColor = "#03ca12";
      		document.getElementById('link'+divId).removeAttribute("onclick");
         	//alert(data.status);
   		}else{
   			alert('Número '+num+' ainda não foi sorteado!');
   		}
      }
	});
}
</script>

</head>

<body>


<div id="flex" style="margin-bottom: 50px;">
	<div class="item">
	<a href="../index.php">
		<img src="../../images/voltar_blue.png" style="width: 50px; float: left; text-align: left;"/>
	</a>
	<br>
	<p style="float: left; text-align: left; font-size: 22px; font-weight: 600;"><?php echo $nomeBingo;?></p>
	<br>
	<p style="float: left; text-align: left; font-size: 22px;"><?php echo $_SESSION['CD_CODIGO']." - ".$_SESSION['DS_USUARIO'];?></p>
	</div>

	<div class="item">
		<p style="font-size: 22px;">Números Sorteados 
			<a href="" onClick="refresh">
				<img src="../../images/refresh.png" style="width: 30px;">
			</a>
		</p>
		<div style="line-height: 45px;">
			<?php 
				$RSS = mysql_query("select * from bin_numeros_sorteados where cd_bingo = '".$get_cdBingo."' ");
				while($RS = mysql_fetch_array($RSS)){
			?>
				<a class="fundo_numero"><?php echo $RS['cd_numero'];?></a>
			<?php }?>
		</div>

	</div>
</div>	

<div id="flex">
<?php
$RSSC = mysql_query("select * from bin_cartelas where cd_codigo = '".$_SESSION['CD_CODIGO']."' and cd_bingo = '".$get_cdBingo."'  ");
while($RSC = mysql_fetch_array($RSSC)){?>

	<div class="item">
	<table>
		<tr>
			<td style="width:300px; text-align:center;">
				<p style="font-weight: 700;"><?php echo "CARTELA: #".$RSC['cd_cartela'];?></p>
			</td>
		</tr>
	<tr>
	<td>
	
	<table id="bingo" cellpadding="0" cellspacing="0" style="text-align:center; border:1px solid #000">
	<tr>
		<td style="height:55px; border-bottom:1px solid #000; border-top:1px solid #000; border-left:1px solid #000"><b>B</b></td>
		<td style="border-bottom:1px solid #000; border-top:1px solid #000"><b>I</b></td>
		<td style="border-bottom:1px solid #000; border-top:1px solid #000"><b>N</b></td>
		<td style="border-bottom:1px solid #000; border-top:1px solid #000"><b>G</b></td>
		<td style="border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000"><b>O</b></td>
	</tr>

	<tr>

	<td style="text-align:center; width:55px; border:1px solid #000; height:40px">
		<?php						   		
			$RSSN = mysql_query("select * from bin_numeros_cartela where cd_cartela = '".$RSC['cd_cartela']."' and cd_codigo = '".$RSC['cd_codigo']."' ");
			$RSN = mysql_fetch_assoc($RSSN);

			$sorteadosExiste = array();
			$RSST = mysql_query("select * from bin_salva_numero where cd_codigo = '".$_SESSION['CD_CODIGO']."' and cd_bingo = '".$get_cdBingo."' and cd_cartela = '".$RSC['cd_cartela']."' ");
			while($RST = mysql_fetch_array($RSST)){
				array_push($sorteadosExiste, $RST['cd_numero']);
			}

			$numerosB = split(",", $RSN['numeros_b']);
			$numerosI = split(",", $RSN['numeros_i']);
			$numerosN = split(",", $RSN['numeros_n']);
			$numerosG = split(",", $RSN['numeros_g']);
			$numerosO = split(",", $RSN['numeros_o']);
			
			//bagunça numeros
			shuffle($numerosB);
			shuffle($numerosI);
			shuffle($numerosN);
			shuffle($numerosG);
			shuffle($numerosO);
			
			//pega os 5 primeiros números
			for ($i=0; $i<5; $i++) {
				$numeros1[$i] = $numerosB[$i];
				$numeros2[$i] = $numerosI[$i];
				$numeros3[$i] = $numerosN[$i];
				$numeros4[$i] = $numerosG[$i];
				$numeros5[$i] = $numerosO[$i];
			}
			
			//ordena numeros
			sort($numeros1);
			sort($numeros2);
			sort($numeros3);
			sort($numeros4);
			sort($numeros5);
			$cont = 1;

			$i = 0;

			for($y=0; $y<$numero; $y++) {	
				if (($cont == 1) or ($cont == 6) or ($cont == 11) or ($cont == 16) or ($cont == 21)) {
					// COLUNA B
					$cur_num = $numeros1[$i];

					if (in_array($cur_num, $sorteadosExiste)) { 
						echo '<a><div id="'.trim($RSC['cd_cartela'].$cur_num).'" style="background:#03ca12;" class="td-link">';
					}else{
						echo '<a id="link'.trim($RSC['cd_cartela'].$cur_num).'" onclick="marcaNumero(\''.$_SESSION['CD_CODIGO'].'\',\''.$cur_num.'\',\''.trim($RSC['cd_cartela'].$cur_num).'\',\''.$RSC['cd_cartela'].'\',\''.$RSC['cd_bingo'].'\');"><div id="'.trim($RSC['cd_cartela'].$cur_num).'" class="td-link">';
					}
					echo $cur_num;
				}
				else if (($cont == 2) or ($cont == 7) or ($cont == 12) or ($cont == 17) or ($cont == 22)) {
					// COLUNA I
					$cur_num = $numeros2[$i];
					if (in_array($cur_num, $sorteadosExiste)) { 
						echo '<a><div id="'.trim($RSC['cd_cartela'].$cur_num).'" style="background:#03ca12;" class="td-link">';
					}else{
						echo '<a id="link'.trim($RSC['cd_cartela'].$cur_num).'" onclick="marcaNumero(\''.$_SESSION['CD_CODIGO'].'\',\''.$cur_num.'\',\''.trim($RSC['cd_cartela'].$cur_num).'\',\''.$RSC['cd_cartela'].'\',\''.$RSC['cd_bingo'].'\');"><div id="'.trim($RSC['cd_cartela'].$cur_num).'" class="td-link">';
					}
					echo $cur_num;
				}
				else if (($cont == 3) or ($cont == 8) or ($cont == 13) or ($cont == 18) or ($cont == 23)) {
					// COLUNA N
					if (($meio) and ($cont == 13)) {
						echo "CVM";
					}
					else {
						$cur_num = $numeros3[$i];
						if (in_array($cur_num, $sorteadosExiste)) { 
							echo '<a><div id="'.trim($RSC['cd_cartela'].$cur_num).'" style="background:#03ca12;" class="td-link">';
						}else{
							echo '<a id="link'.trim($RSC['cd_cartela'].$cur_num).'" onclick="marcaNumero(\''.$_SESSION['CD_CODIGO'].'\',\''.$cur_num.'\',\''.trim($RSC['cd_cartela'].$cur_num).'\',\''.$RSC['cd_cartela'].'\',\''.$RSC['cd_bingo'].'\');"><div id="'.trim($RSC['cd_cartela'].$cur_num).'" class="td-link">';
						}
						echo $cur_num;
					}
				}
				else if (($cont == 4) or ($cont == 9) or ($cont == 14) or ($cont == 19) or ($cont == 24)) {
					// COLUNA G
					$cur_num = $numeros4[$i];
					if (in_array($cur_num, $sorteadosExiste)) { 
						echo '<a><div id="'.trim($RSC['cd_cartela'].$cur_num).'" style="background:#03ca12;" class="td-link">';
					}else{
						echo '<a id="link'.trim($RSC['cd_cartela'].$cur_num).'" onclick="marcaNumero(\''.$_SESSION['CD_CODIGO'].'\',\''.$cur_num.'\',\''.trim($RSC['cd_cartela'].$cur_num).'\',\''.$RSC['cd_cartela'].'\',\''.$RSC['cd_bingo'].'\');"><div id="'.trim($RSC['cd_cartela'].$cur_num).'" class="td-link">';
					}
					echo $cur_num;
				}
				else if (($cont == 5) or ($cont == 10) or ($cont == 15) or ($cont == 20) or ($cont == 25)) {
					// COLUNA O
					$cur_num = $numeros5[$i];
					if (in_array($cur_num, $sorteadosExiste)) { 
						echo '<a><div id="'.trim($RSC['cd_cartela'].$cur_num).'" style="background:#03ca12;" class="td-link">';
					}else{
						echo '<a id="link'.trim($RSC['cd_cartela'].$cur_num).'" onclick="marcaNumero(\''.$_SESSION['CD_CODIGO'].'\',\''.$cur_num.'\',\''.trim($RSC['cd_cartela'].$cur_num).'\',\''.$RSC['cd_cartela'].'\',\''.$RSC['cd_bingo'].'\');"><div id="'.trim($RSC['cd_cartela'].$cur_num).'" class="td-link">';
					}
					echo $cur_num;
				}
			 	 	
				if(($cont % $colunas == 0) and ($y < 24)) {
					echo "</div></a></td></tr><tr><td style='text-align:center; width:".$largurcartela."px; border:1px solid #000; height:".$alturacartela."px'>\n";
					$i++;

				}
				else if ($y < 24) echo "</div></a></td><td style='text-align:center; width:".$largurcartela."px; border:1px solid #000; height:".$alturacartela."px'>";
				
				$cont++; 
			}?>
				
			</table>
				
			</td>

			</td>
		</tr>	
		</table>
		</div>

		<?php }?>

</div>

</body>
</html>

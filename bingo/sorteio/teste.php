<?php
include "../../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

$get_cdcodigo = $_POST['cd_codigo'];

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
<link rel="stylesheet" href="style/style.css">
<title>Bingo</title>
</head>

<body style="width: 60%;">


<?php
$RSSC = mysql_query("select * from bin_cartelas where cd_codigo = '0011' ",$conexao);
while($RSC = mysql_fetch_array($RSSC)){?>

	<div style="width: 100%;">

	<table class="geral" style="width:auto; border-right:0px dotted #000; ">
		<tr>
			<td style="width:300px; text-align:center;">
				<?php echo printf("Nº DA CARTELA: <b>%003d</b>", $RSC['cd_cartela']);?>
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
					echo $cur_num;
				}
				else if (($cont == 2) or ($cont == 7) or ($cont == 12) or ($cont == 17) or ($cont == 22)) {
					// COLUNA I
					$cur_num = $numeros2[$i];
					echo $cur_num;
				}
				else if (($cont == 3) or ($cont == 8) or ($cont == 13) or ($cont == 18) or ($cont == 23)) {
					// COLUNA N
					if (($meio) and ($cont == 13)) {
						echo "18ª CVM";
					}
					else {
						$cur_num = $numeros3[$i];
						echo $cur_num;
					}
				}
				else if (($cont == 4) or ($cont == 9) or ($cont == 14) or ($cont == 19) or ($cont == 24)) {
					// COLUNA G
					$cur_num = $numeros4[$i];
					echo $cur_num;
				}
				else if (($cont == 5) or ($cont == 10) or ($cont == 15) or ($cont == 20) or ($cont == 25)) {
					// COLUNA O
					$cur_num = $numeros5[$i];
					echo $cur_num;
				}
			 	 	
				if(($cont % $colunas == 0) and ($y < 24)) {
					echo "</td></tr><tr><td style='text-align:center; width:".$largurcartela."px; border:1px solid #000; height:".$alturacartela."px'>\n";
					$i++;
				}
				else if ($y < 24) echo "</td><td style='text-align:center; width:".$largurcartela."px; border:1px solid #000; height:".$alturacartela."px'>";
				
				$cont++; 
			}?>
				
			</table>
				
			</td>
			</td></tr>	
			</table>
			</div>
		<?php }?>


</body>
</html>
<?php
include "../../administrar/conexao.php";
//require_once(__DIR__ . '/config.php');
//require_once(__DIR__ . '/Bingo.php');

//$bingo 		= new \MyApp\Bingo();
$cd_bingo 	= $_GET['cd_bingo'];

$backgroundNum = "";
//$backgroundNum = "cadetblue";

function h($s){
   return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function teste($numeros){
	$nums = [];
	//$col = split(",", $numeros);	
	for ($i = 0; $i < 5; $i++) {
	   $col = range($i * 15 + 1, $i * 15 + 15);
	   shuffle($col);
	   $nums[$i] = array_slice($col, 0, 5);
	}
	$nums[2][2] = "18ª CVM";
	return $nums;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<title>BINGO!</title>
</head>

<body>

	<div class="container">
		<?php 
			//busca cartelas
			$RSS = mysql_query("select * from bin_cartelas where cd_bingo = 1 ", $conexao);
        	while($RS = mysql_fetch_array($RSS)){

        	//busca numeros da cartela
        	$RSSN = mysql_query("select * from bin_numeros_cartela where cd_codigo = '".$RS['cd_codigo']."' and cd_cartela = '".$RS['cd_cartela']."' ");
			$RSN = mysql_fetch_assoc($RSSN);

      ?>
		<table class="habilidades">
			<tr>
				<th>B</th>
				<th>I</th>
				<th>N</th>
				<th>G</th>
				<th>O</th>
			</tr>
			<?php  
			//$nums = $bingo -> create();
			$nums = teste(1);
			for($i = 0; $i < 5; $i++){ ?>
				<tr>
					<?php for ($j = 0; $j < 5; $j++){?>
				  		<td style="text-align: center;">
							<a href="#">
						   	<div class="td-link" style="background: <?php echo $backgroundNum;?>">
						   		<p><?php echo h($nums[$j][$i]);?></p>
						   	</div>
						  	</a>				  			
				  		</td>
					<?php }?>
				</tr>
			<?php }?>
		</table>
		<?php }?>
	</div>

</body>
</html>
<?php
include "../administrar/conexao.php";
if($_SESSION["CD_USUARIO"] != "1" && $_SESSION["CD_USUARIO"] != "605"){
	echo "<script language='javascript'>window.open('../sair.php', '_self');</script>";
}

switch ($_SESSION['CD_BINGO']) {
	case '1':
		$nomeBingo = "OURO";
		break;

	case '2':
		$nomeBingo = "PRATA";
		break;
		
	case '3':
		$nomeBingo = "GERAL";
		break;		
	
	default:
		# code...
		break;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Sortear Números</title>

<style type="text/css">
*{ margin:0; padding:0;}
 
body{ font:100% normal Arial, Helvetica, sans-serif; background:#161712; color: #FFF}
 
form,input,select,textarea{margin:0; padding:0; }
 
div.box {
    margin:0 auto;
    width:500px;
    background:#222222;
    position:relative;
    top:50px;
    border:1px solid #262626;
}
 
div.box h1 { 
    color:#ffffff;
    font-size:18px;
    text-transform:uppercase;
    padding:5px 0 5px 5px;
    border-bottom:1px solid #161712;
    border-top:1px solid #161712; 
}
 
div.box label {
    width:100%;
    display: block;
    background:#1C1C1C;
    border-top:1px solid #262626;
    border-bottom:1px solid #161712;
    padding:10px 0 10px 0;
}
 
div.box label span {
    display: block;
    color:#bbbbbb;
    font-size:12px;
    float:left;
    width:100px;
    text-align:right;
    padding:5px 20px 0 0;
}
 
div.box .input_text {
    padding:10px 10px;
    width:200px;
    background:#ffffff;
    border-bottom: 1px double #171717;
    border-top: 1px double #171717;
    border-left:1px double #333333;
    border-right:1px double #333333;
}
 
div.box .message{
    padding:7px 7px;
    width:350px;
    background:#262626;
    border-bottom: 1px double #171717;
    border-top: 1px double #171717;
    border-left:1px double #333333;
    border-right:1px double #333333;
    overflow:hidden;
    height:150px;
}
 
div.box .button{
    margin: 0 0 10px 0;
    padding: 8px 8px;
    background: #07c541;
    border: 0px;
    position: relative;
    top: 10px;
    left: 382px;
    width: 100px;
    border-bottom: 1px double #07c541;
    border-top: 1px double #07c541;
    border-left: 1px double #07c541;
    border-right: 1px double #07c541;
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
</head> 
<body> 
<form action="sortear_numero.php" method="post" id="formulario">
	<input type="hidden" name="acao" value="1">
    <div class="box"> 
        <h1>Bingo 19ª CVM</h1>
  
        <label> 
            <span>Bingo</span>
				<select id="cd_bingo" name="cd_bingo" required>
					<option value="<?php echo $_SESSION['CD_BINGO'];?>"><?php echo $nomeBingo;?></option>
					<option value="1">OURO</option>
					<option value="2">PRATA</option>
					<option value="3">GERAL</option>
				</select>
        </label>
  
        <label>
            <span>Número</span>
            <input type="text" class="input_text" name="cd_numero" id="cd_numero"/>
        </label>

        <input type="submit" class="button" value="Enviar" />
               
    </div>
</form> 

<div class="box" style="margin-top: 50px; padding: 20px;"> 
	<p style="color: #ffffff; padding-bottom: 25px;">SORTEADOS BINGO <?php echo $nomeBingo;?></p>

	<?php 
		$RSS = mysql_query("select * from bin_numeros_sorteados where cd_bingo = '".$_SESSION['CD_BINGO']."' ");
		while($RS = mysql_fetch_array($RSS)){?>
		<?php echo $RS['cd_numero']." | ";?>
	<?php }?>

</div>

<div class="box" style="margin-top: 50px; padding: 20px;"> 
	<p style="color: #ffffff; padding-bottom: 25px;">GANHADORES BINGO <?php echo $nomeBingo;?></p>
	<?php 
	$RSSG = mysql_query("select cd_codigo, cd_cartela, COUNT(*) as total from bin_salva_numero where cd_bingo = '".$_SESSION['CD_BINGO']."' group by cd_codigo, cd_cartela");
	while($RSG = mysql_fetch_array($RSSG)){
		if ($RSG['total'] >23) {
	?>
	<p style="margin-bottom: 15px;">
		<?php echo $RSG['cd_codigo']." - ".BuscaUsuario($RSG['cd_codigo'])."<br>Cartela nº: ".$RSG['cd_cartela']."<br>".strtolower(BuscaGrupoUser($RSG['cd_codigo']));?><br><br>
	</p>
	<?php }}?>
</div>

</body>
</html>

<?php 
if ($_POST['acao'] == 1) {

	$cd_bingo 	= $_POST['cd_bingo'];
	$cd_numero 	= $_POST['cd_numero'];

	$_SESSION['CD_BINGO'] = $_POST['cd_bingo'];

	if ($cd_numero != "") {
		mysql_query("insert into bin_numeros_sorteados (cd_bingo, cd_numero)values('".$cd_bingo."', '".$cd_numero."') ",$conexao);
		if (mysql_affected_rows()>0) {
			echo "<script language='javascript'>window.open('sortear_numero.php', '_self');</script>";
		}
	}else{
		echo "<script language='javascript'>window.open('sortear_numero.php', '_self');</script>";
	}


}
?>
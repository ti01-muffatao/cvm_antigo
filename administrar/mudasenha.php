<?php include"conexao.php";?>
<html>

<head>
    <link rel="stylesheet" href="obj/estilo.css">
</head>

<body style="<?php echo $Fundo;?>" onLoad="javascript:document.getElementById('TxSenhaA').focus();">
    <?php $RSS = mysql_query("select * from usuarios where ds_cpf = '". $_SESSION["CD_CPF"] ."' ", $conexao);
$RS = mysql_fetch_assoc($RSS);?>
    <br>
    <table align="center" width="60%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:11px;">
        <tr height="30">
            <td width="35%">Nome:</td>
            <td width="65%"><?php echo strtoupper($RS["ds_usuario"]);?></td>
        </tr>
        <tr height="30">
            <td>Senha Atual:</td>
            <td><input type="password" class="selectboxnormal" id="TxSenhaA" size="20" maxlength="10"></td>
        </tr>
        <tr height="30">
            <td>Senha Nova:</td>
            <td><input type="password" class="selectboxnormal" id="TxSenhaN" size="20" maxlength="10"></td>
        </tr>
    </table>
    <table align="center" width="60%" border="0" cellspacing="0" cellpadding="0" style="font-family:verdana;font-size:11px;">
        <tr height="40">
            <td width="100%" align="center"><input type="button" value="Alterar" name="BtAlterar" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" onClick="javascript:AlterarS();" style="position: relative; width: 80"></td>
        </tr>
    </table>
</body>
<script language="javascript">
    function AlterarS() {
        if (document.getElementById('TxSenhaA').value == '') {
            alert("SENHA ATUAL Obrigatório!");
            document.getElementById('TxSenhaA').focus();
        } else if (document.getElementById('TxSenhaN').value == '') {
            alert("NOVA SENHA Obrigatório!");
            document.getElementById('TxSenhaN').focus();
        } else if (document.getElementById('TxSenhaA').value == document.getElementById('TxSenhaN').value) {
            alert("A NOVA SENHA está igual a SENHA ANTIGA!");
            document.getElementById('TxSenhaN').value = '';
            document.getElementById('TxSenhaN').focus();
        } else {
            window.open('mudasenha.php?Alterar=OK&TxSenhaA=' + document.getElementById('TxSenhaA').value + '&TxSenhaN=' + document.getElementById('TxSenhaN').value, "_self");
        }
    }

</script>

</html>
<?php
if($Alterar == "OK")
{
	$RSS = mysql_query("select * from usuarios where ds_cpf = '". $_SESSION["CD_CPF"] ."' and ds_senha = '". strtoupper($TxSenhaA) ."' limit 1", $conexao);
	$RS = mysql_fetch_assoc($RSS);
	if(mysql_num_rows($RSS) <= 0){
		echo "<script language='JavaScript'>TxSenhaA.focus();alert('A Senha Atual Informada não confere!!! Tente Novamente!!!');</script>"; 
	}else{
		$RSS2 = mysql_query("update usuarios set ds_senha = '". strtoupper($TxSenhaN) ."' where cd_usuario = ". $RS["cd_usuario"], $conexao);
		echo "<script language='javascript'>alert('Senha Alterada com Sucesso...');window.parent.www.close();</script>";
	}
}
?>

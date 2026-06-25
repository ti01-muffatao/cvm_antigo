<?php include "conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('index.php', '_self');</script>";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Relatório</title>
    <script language="JavaScript">
        function DoPrinting() {
            if (!window.print) {
                return
            }
            window.print()
        }

    </script>
</head>

<body>
    <div align="center">
        <h2 style="font-family: sans-serif;">Relatório de Respostas Academia Muffatão</h2>
    </div>

    <div align="center">
        <table width="300px" align="center">
            <tr>
                <td align="center">
                    <h4 style="font-family: sans-serif;"><a href="JavaScript:location.reload(true);">Atualizar Lista</a></h4>
                </td>
                <td align="center">
                    <h4 style="font-family: sans-serif;"><a href="javascript:DoPrinting()">Imprimir Lista</a></h4>
                </td>
            </tr>
        </table>
    </div>

    <table width="100%" align="center" border="0" bordercolor="#666666" cellspacing="1" cellpadding="1" style="font-family:verdana; font-size:11px;">
        <tr bgcolor="#c6dae9" style="height: 35px;">
            <td align="center"><b>Codigo</b></td>
            <td align="center"><b>Usuario</b></td>
            <td align="center"><b>Filial</b></td>
            <td align="center"><b>Fornecedor</b></td>
            <td align="center"><b>Pontos</b></td>
            <td align="center"><b>Tentativas</b></td>
        </tr>
        <?php $SQL = "select u.ds_usuario, u.cd_codigo, u.cd_estado, u.cd_perfil, u.cd_ativo, p.cd_perfil, p.cd_codigo, p.cd_fornecedor, p.pontos, p.cd_treinamento, p.tentativas from usuarios as u, user_pontos as p where u.cd_codigo = p.cd_codigo and u.cd_perfil = p.cd_perfil and u.cd_ativo = 1 and p.cd_treinamento = (select cd_treinamento from t_treinamento order by cd_treinamento desc limit 1) order by p.cd_codigo asc";
		  $RSS = mysql_query($SQL, $conexao);
		  while($RS = mysql_fetch_array($RSS)){
			$baixopts = '';
			if($RS["pontos"] <= 7){
  			$baixopts = '<p style="color:#F00">'.$RS["pontos"].'</p>';
			} else {
  			$baixopts = '<p style="color:#090">'.$RS["pontos"].'</p>';
			}
		  
		  if($cor == "#FFFFFF"){$cor = "#DDDDDD";}else{$cor = "#FFFFFF";}?>
        <tr height="20" bgcolor="<?php echo $cor;?>">
            <?php 
		  echo "<td align='center'>".strtoupper($RS["cd_codigo"])."</td>";
		  echo "<td align='center'>".strtoupper($RS["ds_usuario"])."</td>";
		  echo "<td align='center'>".BuscaEstado($RS["cd_estado"])."</td>";
		  echo "<td align='center'>".BuscaClifor($RS["cd_fornecedor"])."</td>";
		  echo "<td align='center'><b>".$baixopts."</b></td>";
		  echo "<td align='center'>".$RS["tentativas"]."</td>";
		  echo "</tr>";
	 }?>
    </table>
</body>

</html>

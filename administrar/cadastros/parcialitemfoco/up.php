<?php include "../../conexao.php";?>
<html>
<head>
<link rel="stylesheet" href="../../obj/estilo.css">
</head>
<body style="<?php echo $Fundo;?>font-family:verdana;font-size:11px;">

<form id="upload" name="upload" enctype="multipart/form-data" action="saveup.php" method="post">
	<input type="file" id="file" name="file" size="150" class="selectboxnormal">
	<input type="submit" value="Enviar" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 47">
</form>


</body>
</html>

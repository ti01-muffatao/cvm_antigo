<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body style="background:url('imagens/captcha.jpg'); font-family:arial; font-size:27px; text-align:center;">
	<?php $achave=substr(md5(time()),0, 3);
		echo substr($achave,0,1)."&nbsp;&nbsp;".substr($achave,1,1)."&nbsp;&nbsp;".substr($achave,2,1);?>
	<input type="hidden" id="chave" name="chave" value="<?php echo $achave;?>">
</body>
</html>

<script language="javascript" type="text/javascript">
var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
	//Non-IE
	myWidth = window.innerWidth;
	myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
	//IE 6+ in 'standards compliant mode'
	myWidth = document.documentElement.clientWidth;
	myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
	//IE 4 compatible
	myWidth = document.body.clientWidth;
	myHeight = document.body.clientHeight;
}

//function click()
//{if (event.button==2||event.button==3) {oncontextmenu='return false';}}
//document.onmousedown=click
//document.oncontextmenu = new Function("return false;")

function Formata(src, mask) 
{
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida) 
		{src.value += texto.substring(0,1);}
}

// VALIDA UM CAMPO PARA ACEITAR APENAS NUMEROS
function validanumeros()
{ alert('zz');
	tecla = event.keyCode;
	if (tecla >= 48 && tecla <= 57){return true;}
	else
	{
		if(tecla == 46 || tecla == 44){return true;}
		else{alert("Este campo só recebe números. Tente novamente!");return false;}
	}
}

function Formata(src, mask) 
{
// MASCARA
	var i = src.value.length;
	var saida = mask.substring(0,1);
	var texto = mask.substring(i)
	if (texto.substring(0,1) != saida) 
	{src.value += texto.substring(0,1);}
}

function validacpf(cpf)
{
// VALIDA CPF
	var i; 
	s = cpf;
	var Estrangeiro = String(cpf).substring(0,2).toUpperCase();
	if(Estrangeiro == 'AR' || Estrangeiro == 'UR' || Estrangeiro == 'CL' || Estrangeiro == 'PR' || Estrangeiro == 'BO'){alert("DOCUMENTO ESTRANGEIRO Prossiga...");return true;}
	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
		{alert("CPF Inválido");return false;}
	var c = s.substr(0,9); 
	var dv = s.substr(9,2); 
	var d1 = 0; 
	for (i = 0; i < 9; i++) 
		{d1 += c.charAt(i)*(10-i);} 
	if (d1 == 0)
		{alert("CPF Inválido");return false;} 
	d1 = 11 - (d1 % 11); 
	if (d1 > 9) d1 = 0; 
	if (dv.charAt(0) != d1)
		{alert("CPF Inválido");return false;} 
	d1 *= 2; 
	for (i = 0; i < 9; i++) 
		{d1 += c.charAt(i)*(11-i);} 
	d1 = 11 - (d1 % 11); 
	if (d1 > 9) d1 = 0; 
	if (dv.charAt(1) != d1) 
		{alert("CPF Inválido");return false;}
		return true;
}

function validacnpj(vercnpj)
{
var Estrangeiro = String(vercnpj).substring(0,3).toUpperCase();
if(Estrangeiro == 'RUT'){return true;}
// VALIDA CNPJ
	var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais, cnpj = vercnpj.replace(/\D+/g, '');
	digitos_iguais = 1;
	if (cnpj.length != 14) 
		{alert('CNPJ Inválido');return false;}
	
	for (i = 0; i < cnpj.length - 1; i++)
	if (cnpj.charAt(i) != cnpj.charAt(i + 1))
		{digitos_iguais = 0;break;}
	if (!digitos_iguais)
		{
		tamanho = cnpj.length - 2
		numeros = cnpj.substring(0,tamanho);
		digitos = cnpj.substring(tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--)
		{
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2)
			pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(0))
			{alert('CNPJ Inválido');return false;}
		tamanho = tamanho + 1;
		numeros = cnpj.substring(0,tamanho);
		soma = 0;
		pos = tamanho - 7;
		for (i = tamanho; i >= 1; i--)
		{
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2)
			pos = 9;
		}
		resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
		if (resultado != digitos.charAt(1))
			{alert('CNPJ Inválido');return false;}
		else
			{return true;}
		}
	else
		{alert('CNPJ Inválido');return false;}
}

function validanumeros()
{
//	tecla = event.keyCode;
//	if (tecla >= 48 && tecla <= 57){return true;}
//	else
//	{
//		if(tecla == 46 || tecla == 44){return true;}
//		else{alert("Este campo só recebe números. Tente novamente!");return false;}
//	}
}
</script>
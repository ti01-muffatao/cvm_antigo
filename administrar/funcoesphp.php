<?php
//FUN��O DIAS UTEIS//
function dias_uteis($mes,$ano){
	$xconexao = mysql_connect("localhost", "admin", "mu125030");
	$RSS = mysql_query("select * from dias_uteis where cd_mes = '".$mes."' and cd_ano = '".$ano."' limit 1 ", $xconexao);
	$RS = mysql_fetch_assoc($RSS);
	return $RS["qt_dias"];
}

function dias_feriados($ano = null)
{
	if(empty($ano))
	{
		$ano = intval(date('Y'));
	}

	$pascoa = easter_date($ano); // Limite de 1970 ou após 2037 da easter_date PHP consulta http://www.php.net/manual/pt_BR/function.easter-date.php
	$dia_pascoa = date('j', $pascoa);
	$mes_pascoa = date('n', $pascoa);
	$ano_pascoa = date('Y', $pascoa);

	$feriados = array(
		// Datas Fixas dos feriados Nacionais
		mktime(0, 0, 0, 1, 1, $ano), // Confraternização Universal - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 4, 21, $ano), // Tiradentes - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 5, 1, $ano), // Dia do Trabalhador - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 9, 7, $ano), // Dia da Independência - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 10, 12, $ano), // N. S. Aparecida - Lei nº 6802, de 30/06/80
		mktime(0, 0, 0, 11, 2, $ano), // Todos os santos - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 11, 15, $ano), // Proclamação da republica - Lei nº 662, de 06/04/49
		mktime(0, 0, 0, 12, 25, $ano), // Natal - Lei nº 662, de 06/04/49

		// Essas Datas dependem diretamente da data de Pascoa
		// mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 48, $ano_pascoa), //2ºferia Carnaval
		mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 47, $ano_pascoa), //3ºferia Carnaval
		mktime(0, 0, 0, $mes_pascoa, $dia_pascoa - 2, $ano_pascoa), //6ºfeira Santa
		mktime(0, 0, 0, $mes_pascoa, $dia_pascoa, $ano_pascoa), //Pascoa
		mktime(0, 0, 0, $mes_pascoa, $dia_pascoa + 60, $ano_pascoa), //Corpus Cirist

	);

	sort($feriados);

	return $feriados;
}

//FUN��O DIAS UTEIS SE PASSARAM ATE AGORA//
function dias_passaram($mes,$ano){
  $uteis = 0;
  $passaram = 0;
  $qtd_feriados = 0;
  $dias_no_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); 

  for($dia = 1; $dia <= $dias_no_mes; $dia++){
    // Aqui voc� pode verifica se tem feriado
    $timestamp = mktime(0, 0, 0, $mes, $dia, $ano);
	$feriados = dias_feriados($ano);
	if(in_array($timestamp, $feriados)){
		$qtd_feriados++;
	}
    $semana    = date("N", $timestamp);

    if($semana < 6 ) $uteis++;
		if($dia == date('d')){
		 $passaram = $uteis ;	
		}
  	}
  	//return $passaram + 20;
	return $passaram - $qtd_feriados;
}
///////////////////

//FUN��O DIAS UTEIS SE PASSARAM ATE AGORA PERIODO DA CAMPANHA//
/*function dias_passaram_geral(){
	$uteis 			= 0;
	$passaram 		= 0;
	$dias_no_mes 	= 120; 
	$mes = date('m');
	$dia = date('d');
	$ano = date('Y');

	for($dia = 1; $dia <= $dias_no_mes; $dia++){
	// Aqui voc� pode verifica se tem feriado
	$timestamp = mktime(0, 0, 0, $mes, $dia, $ano);
	$semana    = date("N", $timestamp);
	
	if($semana < 6 && $mes >= 11 && $ano == date('Y') ) $uteis++;
		if($dia == date('d')){
		 $passaram = $uteis ;	
		}
	}
	return $passaram +20;
}
15/01/2021-Daniel: A fun��o foi comentada e reescrita, pois a contagem dos dias que passaram estava incorreta
*/

///////////////////

function getDiasUteis($dtInicio, $dtFim, $feriados = []) {
    $tsInicio = strtotime($dtInicio);
    $tsFim = strtotime($dtFim);

    $quantidadeDias = 0;
    while ($tsInicio <= $tsFim) {
        // Verifica se o dia � igual a s�bado ou domingo, caso seja continua o loop
        $diaIgualFinalSemana = (date('D', $tsInicio) === 'Sat' || date('D', $tsInicio) === 'Sun');
        // Verifica se � feriado, caso seja continua o loop
        $diaIgualFeriado = (count($feriados) && in_array(date('Y-m-d', $tsInicio), $feriados));

        $tsInicio += 86400; // 86400 quantidade de segundos em um dia

        if ($diaIgualFinalSemana || $diaIgualFeriado) {
            continue;
        }

        $quantidadeDias++;
    }

    return $quantidadeDias;
}

function dias_passaram_geral() {

$feriados = [
	// '2023-11-02',
    // '2023-11-15'
];

$inicio = '2025-11-01'; // data de inicio da campanha de verão
$hoje = date('Y-m-d');

return getDiasUteis($inicio, $hoje, $feriados); // retorna os dias(uteis) que passaram até hoje.

//return $dias_passaram;

}

function SabadosMes($ano, $mes){
	$dias = UltimoDia($ano,$mes);
	for($i = 1; $i <= $dias; $i++){
		if($i < 10){$dia = "0".$i;}else{$dia = $i;}
		if($mes < 10 && strlen($mes) == 1){$mes = "0".$mes;}
		$data = $dia."/".$mes."/".$ano;
		if(diadasemana($data) == 7){$x = $x +1;}
	}
	return $x;
}
function DomingosMes($ano, $mes){
	$dias = UltimoDia($ano,$mes);
	for($i = 1; $i <= $dias; $i++){
		if($i < 10){$dia = "0".$i;}else{$dia = $i;}
		if($mes < 10 && strlen($mes) == 1){$mes = "0".$mes;}
		$data = $dia."/".$mes."/".$ano;
		if(diadasemana($data) == 1){$x = $x +1;}
	}
	return $x;
}
function diadasemana($data){
// Traz o dia da semana para qualquer data informada - formato ex: 23/11/2023
$dia =  substr($data,0,2);
$mes =  substr($data,3,2);
$ano =  substr($data,6,9);
$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
switch($diasemana){  
	case"0": $diasemana = 1; break;  
	case"1": $diasemana = 2; break;  
	case"2": $diasemana = 3; break;  
	case"3": $diasemana = 4; break;  
	case"4": $diasemana = 5; break;  
	case"5": $diasemana = 6; break;  
	case"6": $diasemana = 7; break;  
}
return $diasemana;
}
function dsdiadasemana($data)
{  // Traz o dia da semana para qualquer data informada - formato ex: 23/11/2023
$dia =  substr($data,0,2);
$mes =  substr($data,3,2);
$ano =  substr($data,6,9);
$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
switch($diasemana){  
	case"0": $diasemana = "Domingo"; break;  
	case"1": $diasemana = "Segunda-Feira"; break;  
	case"2": $diasemana = "Ter�a-Feira"; break;  
	case"3": $diasemana = "Quarta-Feira"; break;  
	case"4": $diasemana = "Quinta-Feira"; break;  
	case"5": $diasemana = "Sexta-Feira"; break;  
	case"6": $diasemana = "S�bado"; break;  
}
return $diasemana;
}
function UltimoDia($ano,$mes){ 
   if (((fmod($ano,4)==0) and (fmod($ano,100)!=0)) or (fmod($ano,400)==0)) { 
       $dias_fevereiro = 29; 
   } else { 
       $dias_fevereiro = 28; 
   }
   if($mes < 10 && strlen($mes) == 1){$mes = "0".$mes;}
   switch($mes) { 
       case "01": return 31; break; 
       case "02": return $dias_fevereiro; break; 
       case "03": return 31; break; 
       case "04": return 30; break; 
       case "05": return 31; break; 
       case "06": return 30; break; 
       case "07": return 31; break; 
       case "08": return 31; break; 
       case "09": return 30; break; 
       case "10": return 31; break; 
       case "11": return 30; break; 
       case "12": return 31; break; 
   } 
}
function removerCaracter($string){
	$newstring = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "�������������������������� ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
	return $newstring;
}
function DtBrToDtEua($DT, $TP)
{
	if($TP == 1)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$DtConvert = $Mes."/".$Dia."/".$Ano;
	}
	if($TP == 2)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$Horas = substr($DT,10,7);
		$DtConvert = $Mes."/".$Dia."/".$Ano.$Horas;
	}
	if($TP == 3)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$DtConvert = $Ano."/".$Mes."/".$Dia;
	}
	if($TP == 4)
	{
		$Dia = substr($DT,0,2);
		$Mes = substr($DT,3,2);
		$Ano = substr($DT,6,4);
		$Horas = substr($DT,10,7);
		$DtConvert = $Ano."/".$Mes."/".$Dia.$Horas;
	}
	return $DtConvert;
}
function MinToHrMin($CAMPO){
	if($CAMPO != ""){
		if($CAMPO > 1440){
			$dias = floor($CAMPO/1440);
			$CAMPO = ($CAMPO-($dias*1440));
		}		
		$calc = ($CAMPO/60);
		$hh= floor($calc);
		$sobra	= floor(($calc - $hh)*100);
		$mm = round(($sobra*60)/100);
		
		if($dias != ""){
			if ($hh < 10 && $mm < 10){		$ResultaMTHM = $dias . "d 0". $hh . "h 0". $mm . "m";}
			if ($hh >= 10 && $mm >= 10){ 	$ResultaMTHM = $dias . "d " . $hh . "h " . $mm . "m";}
			if ($hh < 10 && $mm >= 10){ 	$ResultaMTHM = $dias . "d 0". $hh . "h " . $mm . "m";}
			if ($hh >= 10 && $mm < 10){ 	$ResultaMTHM = $dias . "d " . $hh . "h 0". $mm . "m";}
		}else{
			if ($hh < 10 && $mm < 10){ 		$ResultaMTHM = "0" . $hh  . "h 0". $mm . "m";}
			if ($hh >= 10 && $mm >= 10){ 	$ResultaMTHM = $hh . "h " . $mm  . "m";}
			if ($hh < 10 && $mm >= 10){ 	$ResultaMTHM = "0" . $hh  . "h " . $mm . "m";}
			if ($hh >= 10 && $mm < 10){ 	$ResultaMTHM = $hh . "h 0". $mm  . "m";}
		}
	}
	return $ResultaMTHM;
}
function MinToHrMinB($CAMPO){
	if($CAMPO != ""){
		$calc = ($CAMPO/60);
		$qhrs= floor($calc);
		$sobra	= floor(($calc - $qhrs)*100);
		$qmin = round(($sobra*60)/100);
		
		if($qhrs < 10){
			if($qhrs > 0){$qhrs = "0".$qhrs;}
			else{$qhrs = "00";}
		}
		if($qmin < 10){
			if($qmin > 0){$qmin = "0".$qmin;}
			else{$qmin = "00";}
		}
		$ResultaMTHM = $qhrs."h".$qmin."m";
	}
	return $ResultaMTHM;
}
function dateAdd($data_,$dias_)
{
    if(strstr($data_, "/")){
        $vetData    =   explode ("/", $data_);
        $dataFinal  =   mktime(0,0,0,$vetData[1],$vetData[0]+$dias_,$vetData[2]);
        return date("d/m/Y", $dataFinal);
    }else{
        return $data_;
    }
}
function hrdiff($hrs1, $hrs2)
{	//FORMATO HH:MM
	$h1 = substr($hrs1,0,2);
	$h2 = substr($hrs2,0,2);
	$m1 = substr($hrs1,3,2);
	$m2 = substr($hrs2,3,2);
	
	if($h2 < $h1){
		$tempo = (($h2*60)+$m2) + (((24-$h1)*60)+$m1);
	}
	if($h1 < $h2){
		$tempo = ((($h2-$h1)*60) + $m2) - $m1;
	}
	return $tempo;
}
function datediff($tipo, $data1, $data2)
{
	list($dia_inicial, $mes_inicial, $ano_inicial) = explode("/",$data1);
	list($dia_final, $mes_final, $ano_final) = explode("/", $data2);
	
	$data_inicial2 = mktime(0,0,0,$mes_inicial,$dia_inicial,$ano_inicial);
	$data_final2 = mktime(0,0,0,$mes_final,$dia_final,$ano_final);
	$dias = ($data_final2 - $data_inicial2)/86400;
	//Dias
	if($tipo == "d"){$total = $dias;}
	//Horas - Formato ex: 30/12/2012
	if($tipo == "h"){
		$h1 = substr($data1,11,2);
		$m1 = substr($data1,14,2);
		$h2 = substr($data2,11,2);
		$m2 = substr($data2,14,2);
		$total = floor(((($dias*24)*60)+(1440-(($h1*60)+$m1))-(1440-(($h2*60)+$m2))) / 60)+1;
	}
	
	//Minutos - Formato ex: 30/12/2012 19:43
	if($tipo == "n"){
		if($dias > 0){
			$minutos1 = (1440 - ((substr($data1,11,2)*60) + (substr($data1,14,2))));
			$minutos2 = (substr($data2,11,2)*60)+(substr($data2,14,2));
			$minutos3 = ((($dias-1) * 24)*60);
		}else{
			$minutos1 = ((substr($data2,11,2) - substr($data1,11,2))*60) + (substr($data2,14,2) - substr($data1,14,2));
			$minutos2 = 0;
			$minutos3 = 0;
		}	
		$total = ($minutos1 + $minutos2 + $minutos3);
	}
	return $total;
}
function dtfimMAIORdtini($dataIni, $dataFim)
{	
	//Formato ex: 30/12/2012 19:43
	$dataFim = date("YmdHi", strtotime($dataFim));
	$dataIni = date("YmdHi", strtotime($dataIni));
	if(($dataFim-$dataIni) <= 0)
		{echo "<script language='javascript'>alert('A Data Final n�o pode ser menor que a Data Inicial.');</script>";exit;}
}
function Noturnas($ini, $fim){
	//Exemplo: 21/03/2014 19:45
	if($ini != ""){
		$odia1	= floor(substr($ini, 0,2));
		$odia2	= floor(substr($fim, 0,2));
		$hora1	= floor(substr($ini, 11,2));
		$hora2	= floor(substr($fim, 11,2));
		$min1	= floor(substr($ini, 14,2));
		$min2	= floor(substr($fim, 14,2));
		$osdias	= datediff("d", $ini, $fim);
		$osmin	= datediff("n", $ini, $fim);
		$noturnas	= 0;
		if($hora2 == "00" && $min2 == "00"){$hora2 = "23"; $min2 = "61";}
		if($osdias == 0){
			if(floor($hora1) >= 5 && floor($hora1) < 22 && floor($hora2) >= 22) {$ntr1 = (((floor($hora2)-22)*60)+floor($min2));}
			if(floor($hora1) < 5 && floor($hora2) < 22 && floor($hora2) > 5)  {$ntr2 = (((5-floor($hora1))*60)-floor($min1));}
			if(floor($hora1) < 5 && floor($hora2) >= 22)  {$ntr3 = ((((floor($hora2)-22)*60)+floor($min2)) + (((5-floor($hora1))*60)-floor($min1)));}
			if(floor($hora1) < 5 && floor($hora2) < 5)	  {$ntr4 = datediff("n", $ini, $fim);}
			if(floor($hora1) >= 22 && floor($hora2) >= 22){$ntr5 = datediff("n", $ini, $fim);}
		}
		if($osdias > 0){
			if($osdias >= 2){$ntr6 = ((($osdias-1)*7)*60);}
			if(floor($hora1) >= 22)	{$ntr7 = (((24-floor($hora1))*60)-floor($min1));}
			if(floor($hora1) < 5)	{$ntr8 = (((5-floor($hora1))*60)-floor($min1));}
			if(floor($hora2) >= 5 && floor($hora2) >= 22)	{$ntr9 = ((((floor($hora2)-22)*60)+floor($min2))+300);}
			if(floor($hora2) < 5)	{$ntr10 = ((floor($hora2)*60)+floor($min2));}
			if(floor($hora1) < 5 && floor($hora2) < 5)		{$ntr11 = 120;}
			if(floor($hora1) >= 5 && floor($hora1) < 22)	{$ntr12 = 120;}
			if(floor($hora2) >= 5 && floor($hora2) < 22)	{$ntr13 = 300;}
		}
		$noturnas = ($ntr1+$ntr2+$ntr3+$ntr4+$ntr5+$ntr6+$ntr7+$ntr8+$ntr9+$ntr10+$ntr11+$ntr12+$ntr13);
		//echo $ini."|".$fim."|".$osdias." | 1=".$ntr1." | 2=".$ntr2." | 3=".$ntr3." | 4=".$ntr4." | 5=".$ntr5." | 6=".$ntr6." | 7=".$ntr17." | 8=".$ntr8." | 9=".$ntr9." | 10=".$ntr10." | 11=".$ntr11." | 12=".$ntr12." | 13=".$ntr13." | TT=".$noturnas."<br>";
		return $noturnas;
	}
}
function EnvioMail($Destinatario, $Assunto, $Corpo, $tipo){
	require("phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "mail.newsolucoes.net";
	$mail->SMTPAuth = true;
	$mail->Username = 'alerta@newsolucoes.net';
	$mail->Password = '130358';
	$mail->From = "alerta@newsolucoes.net";
	$mail->FromName = "New Solu��es";
	if($tipo == ""){
		$mail->AddAddress($Destinatario);
	}else{
		foreach($Destinatario as $dest){
			$mail->AddAddress($dest);
		}
	}
	$mail->IsHTML(true);
	$mail->Subject  = $Assunto;
	$mail->Body = $Corpo;
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
/*	if ($enviado) {
		echo "E-Mail Enviado<br>";
	} else {
		echo "N�o foi poss�vel enviar o e-mail.<br /><br />";
		echo "<br><b>Informa��es do erro:</b> <br />" . $mail->ErrorInfo;
	}
*/
}
function SMSEnviar($ddd, $telefone, $msg) {
	//Exemplo de Chamada: echo SMSEnviar('79', '99887766', 'Msg de Teste');
	$url = '10.1.1.250:7071/sms?tel=' . $ddd . urlencode($telefone) . '&msg=' . urlencode($msg);      
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
?>
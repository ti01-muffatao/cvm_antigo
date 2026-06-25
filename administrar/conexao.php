<?php
   //STARTANDO AS SESSÕES CARREGADAS   
   session_start();

   include "administrar/restricao_de_login.php";

   date_default_timezone_set('America/Fortaleza');
   $conexao = mysql_connect("localhost", "admin", "mu125030");
   mysql_select_db("mu_campanhaverao", $conexao) or print(mysql_error());
   mysql_set_charset("utf8");
   //TÍTULO 	- VARIÁVEL QUE LEVA O TÍTULO DA PÁGINA
   $Titulo = "24ª Campanha De Verão Muffatão";
   $campanha = 24;
   
   //DATA DA ULTIMA PARCIAL
   $SQL = "select dt_data as data from pontuacao order by dt_data desc limit 1";
   $RSS = mysql_query($SQL, $conexao);
   while($RS = mysql_fetch_array($RSS)){
      $UltimaParcial = date("d-m-Y", strtotime($RS["data"])-1);	
   }


   include "funcoesphp.php";
   include "funcoes.php";
   
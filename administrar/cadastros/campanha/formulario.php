<?php 
   include "../../conexao.php";
   if($_SESSION["CD_USUARIO"] == ""){
      echo "<script language='javascript'>window.open('../../index.php', '_self');</script>";
   }
?>

<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="../../obj/estilo.css">
   </head>

   <body style="<?php echo $Fundo;?>">
      <br>
      <input type="hidden" name="cd_campanha" id="cd_campanha" value="">
      <table border="0" width="100%" style="font-family:verdana;font-size:12px;">
         <tr>
            <td>Campanha:</td>
            <td><input type="text" id="ds_campanha" name="ds_campanha" class="selectboxnormal" size="65" value="" maxlength="250" style="<?php echo $objetos;?>"></td>
         </tr>
         <tr>
            <td>Ano:</td>
            <td>
               <select id="cd_ano" name="cd_ano" class="selectboxnormal" style="height: 18; font-size: 8 pt;<?php echo $objetos;?>">
                  <OPTION VALUE="">-- Ano --</OPTION>
                  <?php 
                     for ($i=2015; $i <= 2020; $i++){
                  ?>
                  <OPTION <?php 
                           if($i == date("Y")){echo "selected";}?> VALUE="<?php echo $i;?>"><?php echo $i;?></OPTION>
                     <?php }?>
                  </select>
               </td>
         </tr>
      </table>
      <br>
      <div align="center">
         <input type="button" value="Salvar" id="BtSalvar" name="BtSalvar" onClick="JavaScript: Salvar();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80"> 
         <input type="button" value="Novo" id="BtNovo" name="BtNovo" onClick="javascript: Novo();" class="FlatDActv" onMouseOver="this.className='FlatActv';" onMouseOut="this.className='FlatDActv';" style="position: relative; width: 80">
         <br>
      </div>
   </body>
</html>

<script language="javascript">
   function Novo() {
      window.open('formulario.php', "_self");
   }

   function Salvar() {
      var cdcampanha = document.getElementById('cd_campanha').value;
      var dscampanha = document.getElementById('ds_campanha').value;
      var cdano = document.getElementById('cd_ano').value;
      if (dscampanha == '') {
         alert("Campo NOME DA CAMPANHA Obrigatório!!!");
         document.getElementById('ds_campanha').focus();
      }
      if (cdano == '') {
         alert("Campo ANO DA CAMPANHA Obrigatório!!!");
         document.getElementById('cd_ano').focus();
      } else {
         if (cdcampanha == "") {
               Tipo = 'I';
         } else {
               Tipo = 'A';
         }
         window.open('acao.php?Tipo=' + Tipo + '&cd_campanha=' + cdcampanha + '&ds_campanha=' + dscampanha + '&cd_ano=' + cdano, "acao");
      }
    }
</script>

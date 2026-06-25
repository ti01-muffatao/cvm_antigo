<?php include "administrar/conexao.php";
if($_SESSION["CD_USUARIO"] == ""){echo "<script language='javascript'>window.open('login.php', '_self');</script>";}
?>
<!--
**********************************************
CONTEUDO VISIVEL SOMENTE PARA USUARIOS LOGADOS 
**********************************************
--->
<!doctype html>
<html lang="pt-BR">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="pt-BR">
<title><?php echo $Titulo;?></title>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<!-- Meta -->
<meta charset="utf-8">
<meta name="Author" content="Maicon Roberto Basse | Muffatão Atacado Distribuidor">
<meta http-equiv="content-language" content="pt" />
<meta itemprop="description" name="description" content="" />
<meta name="robots" content="no follow" />
<!-- mobile  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- ######### ESTILO CSS ######### -->
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<!-- ESTILO RESPONSIVO -->
<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
<!-- MEGA MENU -->
<link href="js/mainmenu/sticky.css" rel="stylesheet">
<link href="js/mainmenu/bootstrap.min.css" rel="stylesheet">
<link href="js/mainmenu/demo.css" rel="stylesheet">
<link href="js/mainmenu/menu.css" rel="stylesheet">
<!-- SLIDER -->
<!-- CSS STYLE-->
<link rel="stylesheet" type="text/css" href="js/revolutionslider/css/style.css" media="screen" />
<!-- CONFIGURAÇÃO SLIDER -->
<link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
<!-- ICONES -->
<link rel="stylesheet" type="text/css" href="css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
<!-- flexslider -->
<link rel="stylesheet" href="js/flexslider/flexslider.css" type="text/css" media="screen" />
<!-- Accordions -->
<link rel="stylesheet" href="js/accordion/accordion.css" type="text/css" media="all">
<!-- tabs -->
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs2.css">
<link rel="stylesheet" type="text/css" href="js/tabs/assets/css/responsive-tabs10.css">
<!-- forms -->
<link rel="stylesheet" href="js/form/sky-forms.css" type="text/css" media="all">
<!-- ######### ARQUIVOS JS ######### --> 
<!-- get jQuery from the google apis --> 
<script type="text/javascript" src="js/universal/jquery.js"></script> 
<!-- style switcher --> 
<script src="js/style-switcher/jquery-1.js"></script> 
<script src="js/style-switcher/styleselector.js"></script> 
<!-- mega menu --> 
<script src="js/mainmenu/bootstrap.min.js"></script> 
<script src="js/mainmenu/customeUI.js"></script> 
<!-- sticky menu --> 
<script type="text/javascript" src="js/mainmenu/sticky.js"></script> 
<script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script> 
<!-- scroll up --> 
<script src="js/scrolltotop/totop.js" type="text/javascript"></script> 
<!-- Flexslider --> 
<script  src="js/flexslider/jquery.flexslider.js"></script> 
<script  src="js/flexslider/custom.js"></script>
<!-- Formulario -->
<script src="js/form/jquery.form.min.js"></script>
<script src="js/form/jquery.validate.min.js"></script>
<script src="js/form/jquery.modal.js"></script>
<script src="js/form/jquery.maskedinput.min.js"></script>
<script src="js/form/jquery-1.9.1.min.js"></script>
<script src="js/form/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript">
			$(function()
			{
				// Validation
				$("#sky-form").validate(
				{					
					// Rules for form validation
					rules:
					{
						name:
						{
							required: true
						},
						email:
						{
							required: true,
							email: true
						},
						message:
						{
							required: true,
							minlength: 10
						}
					},
										
					// Mensagem de validação forumulario
					messages:
					{
						name:
						{
							required: 'Por favor insira seu nome',
						},
						email:
						{
							required: 'Por favor insira seu e-mail',
							email: 'Insira um e-mail válido'
						},
						message:
						{
							required: 'Por favor digite a mensagem'
						}
					},
										
					// Ajax form submition					
					submitHandler: function(form)
					{
						$(form).ajaxSubmit(
						{
							success: function()
							{
								$("#sky-form").addClass('submited');
							}
						});
					},
					
					// Do not change code below
					errorPlacement: function(error, element)
					{
						error.insertAfter(element.parent());
					}
				});
			});			
		</script>
</head>
<body style="margin-top:-25px;">
<?php include "menu.php";?>
  <div class="clearfix"></div>
  <div class="section_holder30" align="center">
    <div class="container">	
	 <div class="one_half">
        <h5>Preencha o formulário abaixo para entrar em contato conosco.</h5>
        <br /><br />
        
        <form action="envia_contato.php" method="post" id="sky-form" class="sky-form">
          <fieldset>
            <div class="row">
              <section class="col col-6">
                <label class="label">Nome</label>
                <label class="input"><i class="icon-append icon-user"></i>
                  <input type="text" name="name" id="name" required>
                </label>
              </section>
              <section class="col col-6">
                <label class="label">E-mail</label>
                <label class="input"> <i class="icon-append icon-envelope-alt"></i>
                  <input type="email" name="email" id="email" required>
                </label>
              </section>
            </div>
            <section>
              <label class="label">Assunto</label>
              <label class="input"> <i class="icon-append icon-tag"></i>
                <input type="text" name="subject" id="subject" required>
              </label>
            </section>
            <section>
              <label class="label">Mensagem</label>
              <label class="textarea"> <i class="icon-append icon-comment"></i>
                <textarea rows="4" name="message" id="message" required></textarea>
              </label>
            </section>
            <section>
              <label class="checkbox">
                <input type="checkbox" name="copy" id="copy">
                <i></i>Selecione para enviar uma cópia desta mensagem para seu e-mail</label>
            </section>
          </fieldset>
          <footer>
            <button type="submit" class="button">Enviar Mensagem</button>
          </footer>
          <div class="message"> <i class="icon-ok"></i>
            <p>Sua mensagem foi enviada com sucesso!</p>
          </div>
        </form>
      	</div> 
        <div class="one_half last">
      
        <div class="address_info">
        
          <h3>Informações</h3>
          <ul>
            <h6><strong>Grupo Pedro Muffato</strong></h6>
            <br />
              <h6><strong>Telefones</strong></h6>
              	<p>Ibiporã - PR: 43 3258-8888<br />
              	Itajaí - SC: 47 3344-8900</li>
              	</p><br>
                 <p id="demo">Clique no botão abaixo para obter sua localização:</p>
                 <br>
                 <p align="center"><a class="but_st1 small two green " onClick="getLocation()">Ver Minha Localização</a></p>
<br><br>
<div id="mapholder"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada nesse browser.";}
  }
 
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='250px';
  mapholder.style.width='500px';
 
  var myOptions={
  center:latlon,zoom:14,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está Aqui!"});
  }
 
function showError(error)
  {
  switch(error.code)
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Localização indisponível."
      break;
    case error.TIMEOUT:
      x.innerHTML="O tempo da requisição expirou."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Algum erro desconhecido aconteceu."
      break;
    }
  }
</script>
          </ul>
        </div>
      </div>  
	</div>
  </div>
</div>
<?php include "footer.php";?>
</body>
</html>
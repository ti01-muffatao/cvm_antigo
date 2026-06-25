<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<style type="text/css">
     html, body { height: 100%; }
    </style>
</head>
<body>
<?php 
$zoom = 12;
?>
<div id="mapa" style="height: 100%;"></div>
</body>
</html>
<script type="text/javascript">
var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];
var localizacao = [];
//var markerPonto = new google.maps.Marker({});
var markerPonto;
var contador = 0;
var l = 0;
var contentString;
var infowindow = new google.maps.InfoWindow({
//    content: contentString,
    maxWidth: 300
});

/*Método que inicia configurações iniciados do mapa*/
function initialize() {
    var latlng = new google.maps.LatLng(-23.5514565,-46.6224739);
    var options = {
        zoom: <?php echo $zoom;?>,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);

    /*Novo parte - adiciona ponteiro geolocalizador(de acordo com as coordenadas informadas em 'latlng'*/
    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
    });

    marker.setPosition(latlng);

  /*Parte de loop com banco de dados*/
  /*
    $.ajax({
        url : 'verificaAjax.php',
        success : function(msg){
            if (msg.status == 0) {
                msg.errorMsg.forEach(ShowResults);
                //JSON.parse(msg.errorMsg).forEach(ShowResults);

            }
        },
        error:function (xhr, ajaxOptions, thrownError) {
            alert("Erro no Processamento dos Dados. Entre em contato com o setor de Tecnologia e informe a mensagem abaixo:\n"+xhr.responseText);
        }

    });

  */

  ShowResults({'razao_social': 'Joao Alfredo Jorge Mario Piracicaba do Norte Cinquenta 1993',
               'latitude': -23.24,
               'longitude': -46.22,
              });

  ShowResults({'razao_social': 'Beto Paulo Da Costa Mariani Pindamonhangaba do Leste, noventa 2001',
               'latitude': -23.24,
               'longitude': -45.22,
              });
 

}

// Função para retornar os valores
function ShowResults(value, index, ar) {
    contentString = '<h2>'+value['razao_social']+'</h2>';

    localizacao.push({
        nome: value['razao_social'],
        latlng: new google.maps.LatLng(value['latitude'],value['longitude'])
    });


    /*
    markerPonto.position(localizacao[l].latlng);
    markerPonto.icon('img/marcador.png');
    markerPonto.map(map);
    markerPonto.title(localizacao[l].nome);
    */
/////////transforma endereço em coordenadas
var endereco = "<?php echo $endereco;?>";
geocoder = new google.maps.Geocoder();      
geocoder.geocode({'address':endereco}, function(results, status){ 
    if( status = google.maps.GeocoderStatus.OK){
        latlng = results[0].geometry.location;
        markerInicio = new google.maps.Marker({position: latlng,map: map});     
        map.setCenter(latlng); 
    }           
});
////////
   
    var markerPonto = new google.maps.Marker({
        position: localizacao[l].latlng,
//icon: 'img/marcador.png',
        map: map,
        title: localizacao[l].nome
    });

  (function(contentString) {
    google.maps.event.addListener(markerPonto, 'click', function() {
      infowindow.setContent('<div style="line-height: 1.35;">' + contentString + '</div>');
      infowindow.open(map, markerPonto);
    });
  })(contentString);

    ++l;


}

initialize();
</script>
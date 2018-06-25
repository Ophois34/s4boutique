/* gmaps.js */

//variable pour la carte
var map;
//fonction initMap appelée par l'API Google
function initMap()
{
    //DIV devant recevoir la carte
    var mapDiv = document.getElementById('map');
    //création de la carte
    map = new google.maps.Map(mapDiv, {
        zoom: 14,
        mapTypeId: 'satellite'
    });
    
    // pour centrer la carte avec une adresse réelle
    var geocoder = new google.maps.Geocoder();
    var address = "600 Avenue du Campus Agropolis, 34980 Montferrier-sur-Lez";
    geocoder.geocode({'address': address}, function(results, status) 
    {
        if (status === google.maps.GeocoderStatus.OK)
        {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: 'Nous sommes ici...'
            });
    
            // ajout de la boite et du listener
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
    
        } 
        else 
        {
            alert('Geocode was not successful for the following reason: ' + status);
        }
        
    });
    /* récupération des adresses dans la BDD */
    $.ajax({
			url: 'recupAdr',
			type: "post",
			dataType: 'json',
			success: function(data)
			{
				var marker2;
				geocoder2 = new google.maps.Geocoder();
				$.each(data, function(i, elem)
				{
					//alert(elem);
					geocoder2.geocode({'address': elem.adr}, 
    			function(results2, status2)
    			{
        		if (status2 === google.maps.GeocoderStatus.OK)
        		{
           		marker2 = new google.maps.Marker({
             	map: map,
             	position: results2[0].geometry.location,
             	title: elem.nom
           		});    
        		}
        		else
        		{
           		alert('Geocode was not successful for the following reason: ' + status2);
        		}
    			}); //fin geocoder
				}); //fin each
			},
			error: function(a,b,c)
			{
				alert('oups' + a + b + c);
			}
		});
} //fin initmap

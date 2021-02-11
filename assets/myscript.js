// Initialization table after the page loaded
$(document).ready(
    function () {
        $.getJSON(
            "https://jsonplaceholder.typicode.com/users", function ( data ) {                  
                sessionStorage.setItem("usersData", JSON.stringify(data));
                populateTable(data);   
                           
            }
        ).fail(
            function () {
                var data = JSON.parse(sessionStorage.getItem("usersData"));
                if(data==null) {
                    $('#users_table').html("Data request failed, Please check your internet connection and refresh the page!");
                } else{
                    populateTable(data);   
                }
            }
        );
    }
);

// JSON query for offline access
function search(source, id)
{
    var results;    
    for (var i=0 ; i < source.length ; i++)
    {
        if (source[i]['id'] == id) {
            results=source[i];
            break;
        }   
    }
    return results;
}

// Populate table
function populateTable(data)
{
    var users_data = '<tbody>';
    $.each(
        data,function ( key, value ) { 
            users_data += '<tr>';            
            users_data += '<td><a href="#" class="link">'+value.id+'</a>';
            users_data += '<td><a href="#" class="link">'+value.name+'</a>';
            users_data += '<td><a href="#" class="link">'+value.username+'</a>';
            users_data += '<td>'+value.address.city;
            users_data += '<td>'+value.phone;
            users_data += '<td>'+value.email;
            users_data += '</tr>';
        }
    );    
    users_data += '</tbody>';
    $('#users_table').append(users_data);
}

// show user detail
function showUserDetail(res)
{
    var detail = '<h2>'+  res.name + '</h2>';   
                detail+='ID : '+  res.id + '<br/>';
                detail+='Username : '+  res.username + '<br/>';
                detail+='Address : '+  res.address.street + ' ' + res.address.suite + ' ' + res.address.city + ' ' + res.address.zipcode  + '<br/>';
                detail+='Phone : '+  res.phone + '<br/>';
                detail+='Website : <a href = "http://' + res.website + '" target="_blank">' +  res.website + '</a><br/>';
                detail+='Company : '+  res.company.name + " ( " + res.company.catchPhrase + " ) " + " bs : " + res.company.bs + '<br/>';
                detail+='<button type="button" class="btn btn-primary">Close</button>'     
                
                $('#user_detail').html(detail);

                // Leaflet map setup to show user location
                mymap.eachLayer(
                    function (layer) {
                        mymap.removeLayer(layer);
                    }
                );
                L.tileLayer(
                    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'pk.eyJ1IjoiaWNlOTIiLCJhIjoiY2s0ODRkNmVwMTF0eTNtcGlpdm84ZWw3YyJ9.aDLpIHYM3repwP8nS5aEyA'
                    }
                ).addTo(mymap);
                var marker = L.marker([res.address.geo.lat, res.address.geo.lng]).addTo(mymap);
                marker.bindPopup("<b>Lat:</b>"+ res.address.geo.lat + '<br><b>Lng:</b>'+ res.address.geo.lng).openPopup();
                mymap.setView([res.address.geo.lat, res.address.geo.lng],3);     
                x.style.display = "block";
                mymap.invalidateSize();
}

// map variables
var mymap = L.map('leaflet_map').setView([0, 0], 1);
var x = document.getElementById("leaflet_map");

// function call when link on table is clicked
$(document.body).on(
    "click", ".link", function () { 
       
        var currow = $(this).closest('tr');
        var col1 = currow.find('td:eq(0)').text();
    
        // ajax call for an user with specific id
        $.getJSON(
            "https://jsonplaceholder.typicode.com/users/"+col1, function ( res ) {
                showUserDetail(res);                                 
            }
        ).fail(
            function () {
                var data = JSON.parse(sessionStorage.getItem("usersData"));
                var res = search(data,col1);
                if(data==null) {                
                    $('#user_detail').html("Data request failed, Please check your connection, refresh the page and try again!");
                } else{
                    showUserDetail(res);
                }
            }
        );
    }
);

// function call when close detail button is clicked
$(document.body).on(
    "click", ".btn", function () { 
        $('#user_detail').html('');
        x.style.display = "none";
    }
);










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <!-- setup for offline capability for an hour -->
    <?php
    $seconds_to_cache = 3600;
            $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
            header("Expires: $ts");
            header("Pragma: cache");
            header("Cache-Control: max-age=$seconds_to_cache");?>
    <title>IceTable</title>
</head>
<body>
    <div class="container">  
            <h1>IceTable JSON Table API</h1>
            <hr>
            <div class="row"> 
                <div class ="col-8" id="user_detail"></div>
                <div class ="col-4" id="leaflet_map"></div>
            </div>  
            <br/>
            <div class="table-responsive">          
            <table class="table" id="users_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>                
            </table>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
<!-- Custom script and style -->
<?php
   echo '<link rel="stylesheet" href="' . $this->pluginUrl . 'assets/mystyle.css"></link>';
   echo '<script src="' . $this->pluginUrl . 'assets/myscript.js"></script>'
?>



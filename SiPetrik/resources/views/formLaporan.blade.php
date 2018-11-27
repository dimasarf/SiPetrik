<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <style> 
    
    .form-control::-webkit-input-placeholder { color: white; }  /* WebKit, Blink, Edge */
    .form-control:-moz-placeholder { color: white; }  /* Mozilla Firefox 4 to 18 */
    .form-control::-moz-placeholder { color: white; }  /* Mozilla Firefox 19+ */
    .form-control:-ms-input-placeholder { color: white; }  /* Internet Explorer 10-11 */
    .form-control::-ms-input-placeholder { color: white; }  /* Microsoft Edge */

    body { 
      background: url("/images/bg.jpg") no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .map {
        height: 200px;
        width: 100%;
      }

    .nav-link {
      padding-right: .5rem !important;
      padding-left: .5rem !important;
    }

    a {
      color: white;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    }

    .container{
      padding: 25px;   
    }    
    </style>
    <title>Form Pelaporan</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-end" style="background: transparent; ">
      <a class="navbar-brand" href="#" style="color: white; ">SiPetrik</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" >
          <li class="nav-item active">
            <a class="nav-link" href="#" style="color: white">Home <span class="sr-only">(current)</span></a>            
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#" style="color: white">Tentang Kami <span class="sr-only">(current)</span></a>            
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#" style="color: white">Kontak <span class="sr-only">(current)</span></a>            
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#" style="color: white"><i class="fas fa-search"></i></a>            
          </li>          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background: transparent; display: none;">          
        </form>
      </div>
    </nav>
    
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8">
          <br>
          <br>
          <div class="row">
            <div class="col-md-5" style="background-color: #00E2BC; opacity: 0.8;" >
              
            </div>
            <div class="col-md-7" style="background-color: white; opacity: 0.99999">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                          
                          <form action="">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h5>Form Pelaporan</h5>
                                      <div class="form-group">
                                          <label for="">Nama</label>
                                          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">                                  
                                      </div>
                                     
                                      <div class="form-group">
                                          <label for="">NIK</label>                                     
                                          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">                                      
                                      </div>
    
                                      <div class="form-group">
                                          <label for="">Lokasi</label>                                     
                                          <div id="map" class="map"></div>
                                      </div>
                                    
                                      <div class="form-group">
                                          <label for="">No Telepon</label>
                                          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">                                  
                                      </div>  
                                      <div class="form-group">
                                          <label for="">Deskripsi Kejadian</label>
                                          <textarea type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                                      </div>
                                      <div class="form-group">
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                              <label class="form-check-label" for="gridRadios1">
                                                Saya bersaksi bahwa data yang saya kirimkan benar sesuai dengan kejadian
                                              </label>
                                            </div>
                                      </div>  
                                  </div> 
                                  <button type="button" name="" id="" class="btn ml-auto" style="background-color: #00E2BC; color: azure">Submit</button>                             
                              </div>
                          </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>            
        </div>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        function init()
        {
            alert("Pilih Kota Dari Peta");
        }
          var map = new ol.Map({
            target: 'map',
            layers: [
              new ol.layer.Tile({
                source: new ol.source.OSM()
                })
              ],
              view: new ol.View({
              center: ol.proj.fromLonLat([37.41, 8.82]),
              zoom: 4
              })
          });

          map.on('click', function(evt){
          console.info(evt.pixel);
          console.info(map.getPixelFromCoordinate(evt.coordinate));
          console.info(ol.proj.toLonLat(evt.coordinate));
          var coords = ol.proj.toLonLat(evt.coordinate);
          var lat = coords[1];
          var lon = coords[0];      
        });       
    </script>
  </body>
</html>
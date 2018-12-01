<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Dashboard Dinas</title>
<style>
    body { 
      background: url("/images/bg2.jpg") no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .topBar
    {
        background-color: #182C61;
        
    }

    .panel
    {
        opacity: 1;
    }

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        min-height: 50vh;

    }

    .selected{
        background-color:white;
        color: #182C61;
        
    }
    .laporan {
        font-size: 12px;
    }

    .map {
        height: 200px;
        width: 310px;
        opacity: 1;
      }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #182C61;
        color: white;
        transition: all 0.3s;
        height: 650px;
        
    }
    a, a:hover, a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btnTriase
    {
        border-radius: 15px 15px 15px 15px;
        -moz-border-radius: 15px 15px 15px 15px;
        -webkit-border-radius: 15px 15px 15px 15px;        
        color: white;
        background-color: #3498db;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #6d7fcc;
    }

    #sidebar ul.components {
        padding: 20px 0;
       
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }

    ul li : hover{ 
        back
    }

    #sidebar ul li a:hover {
        color: blue;
        background: #fff;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
        color: red;
        background: red;
        font-weight: bold;
        opacity: 0.5;
        
    }

    ul  :hover{
        background: #eaeaea;
        opacity: 1;
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #6d7fcc;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }
        #sidebar.active {
            margin-left: 0;
        }
    }

    .scrollBar{
        overflow-x: auto;
    }

</style>
</head>
<body style="background-color: #34495e">
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-end " style=" background-color: #1e1e1e;">       
        <a class="navbar-brand" href="/" style="color: white    ; font-weight: bold; ">SI PETRIK</a>
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
            <input class="form-control mr-sm-2" type="white" placeholder="Search" aria-label="Search" style="background: transparent; display: none;">          
          </form>
        </div>
    </nav>

    <div class="container panel" style="margin-left: -15px;">
        <div class="row">
            <div class="col-lg-3">                
                    <div class="wrapper">                            
                        <nav id="sidebar">
                                                        
                            <ul class="list-unstyled components">
                                <li class="selected">                                            
                                    <a href="#"><span><i class="fas fa-check-double"></i></span> Verifikasi Laporan</a>
                                </li>
                                <li>
                                    <a href="#"><span><i class="fas fa-clipboard-list mr-1"></i></span>Laporan Diterima</a>
                                </li>                                        
                                <li>
                                    <a href="#"><span><i class="fas fa-globe-americas mr-1"></i></span>Pemetaan Wilayah</a>
                                </li>                                        
                            </ul>
                        </nav>                                    
                    </div>
            </div>
            <div class="col-lg-4 panel" style="background-color: white; margin-left: -10px;">
               <div class="container">
                   <div class="row">
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="background-color: transparent"><i class="fas fa-search"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari alamat">
                        </div>
                        
                        <ul style="margin-left: -20px; margin-top: 15px;">
                            <li class="">
                                <a href="">
                                    <b>Ngaglik, sleman Yogyakrta</b>
                                    <p class="laporan">  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    </p>    
                                </a>
                            </li>

                            <li class="">
                                <a href="">
                                    <b>Depok, sleman Yogyakrta</b>
                                    <p class="laporan">  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    </p>    
                                </a>
                            </li>
                            <li class="">
                                <a href="">
                                    <b>Kaliurang, sleman Yogyakrta</b>
                                    <p class="laporan">  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    </p>    
                                </a>
                            </li>                            
                            <li class="">
                                <a href="">
                                    <b>Kaliurang, sleman Yogyakrta</b>
                                    <p class="laporan">  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                    </p>    
                                </a>
                            </li>
                        </ul>
                   </div>
                   
                   <div class="row">
                       
                   </div>
               </div>
            </div>
            <div class="col-lg-4 panel " style="margin-left: -4px; ">
                <div class="card scrollBar" style="width: 640px; height: 100%; border: none;">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                    <table class="">
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Pelapor</p></td></tr>
                                        <tr><td><p style="margin-bottom: -5px; font-weight: bold;">Febrianto Eko Syahputro</p></td></tr>
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;">2171112510989004</p></td></tr>
                                        <tr><td><p style="margin-top: 20px; margin-bottom: -5px; font-size: 13px;">Lokasi</p></td></tr>
                                        <tr>
                                            <td><p style="margin-bottom: -5px; font-weight: bold;">Palu, Sulawesi Tengah</p></td>
                                            <td><p style=" margin-bottom: -5px; font-size: 13px; margin-left: 30px; " class="">Dokumentasi Lokasi Bencana</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="map" class="map" ></div>                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a name="" id="" class="btn btn-primary " href="#" role="button" style="margin-top: 5px;">Triase</a>
                                            </td>
                                        </tr>
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Deskripsi</p></td></tr>
                                        <tr>
                                            <td colspan="2">
                                                <p class="float-left laporan" style="width: 55%;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                                </p>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Pelapor</p></td></tr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>200 000 Jiwa</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="button" name="" id="" class="btn btn-primary btn-md ml-auto col-md-5" data-toggle="modal" data-target="#exampleModalCenter">Tangani</button>
                                    <!-- Button trigger modal -->
                                    
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Penugasan Tim Ahli</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <label for=""></label>
                                                <input type="text"
                                                  class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nama tim ahli">
                                              </div>
                                            </div>
                                            <div class="modal-footer">                                              
                                              <button type="button" class="btn btn-primary">Kirim</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    
                                    
                            </div>
                            
                        </div>                        
                    </div>
                </div>
            </div>
                    
        </div>
        
       
    </div>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Document</title>
</head>
<body>
        <div class="col-lg-4 panel " style="margin-left: -15px; ">
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
        
</body>
</html>
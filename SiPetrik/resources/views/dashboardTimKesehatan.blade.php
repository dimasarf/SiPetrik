<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    {{-- <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script> --}}
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

    #map2{
        height: 150px;
        width: 360px;
        opacity: 1;
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
        background: #27489e;
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
        margin-left: 50%;
    }

    @media (max-width: 768px) {
        #sidebar {
            margin-left: 20%px;
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
        <a class="navbar-brand" href="/welcome" style="color: white    ; font-weight: bold; ">SI PETRIK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto" >            
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('logout') }}" style="color: white" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">               
              <i class="fas fa-power-off mr-4"></i>
              
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>           
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
                            <div class="sidebar-header">
                                <table>
                                    <tr>
                                        <td><img src="/images/avatar.jpg" class="img rounded-circle d-flex mr-2 mb-2" alt="" style="height: 60px; width: 60px;"></td>
                                        <td>
                                            <label for="" style="margin-bottom: -100px;">{{ Auth::user()->name }}</label>
                                            <br>                                       
                                            <label for="" class="text-muted" style="margin-top: -5px; font-size: 13.5px;">Dokter</label>
                                        </td>
                                    </tr>
                                </table>
                            </div>                            
                            <ul class="list-unstyled components">
                                <li class="selected">                                            
                                    <a href="/dashboardTim"><span><i class="fas fa-map-marker mr-3"></i></span> Penugasan Saya</a>
                                </li>
                                <li>
                                    <a href="/triase"><span><i class="fas fa-notes-medical mr-3"></i></span>Cara Penanganan Pasien</a>
                                </li>                                        
                                <li>
                                    <a href="/pemetaanTim"><span><i class="fas fa-globe-americas mr-3"></i></span>Pemetaan Wilayah</a>
                                </li>
                                <li>
                                    
                                </li>  
                            </ul>
                        </nav>                                    
                    </div>
            </div>
           @section('konten')
           
           @show
            {{-- <div class="col-lg-4 panel" style="background-color: white; margin-left: -20px; max-height :650px; overflow-y: scroll;" >
               <div class="container">
                   <div class="row">
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text" style="background-color: transparent"><i class="fas fa-search"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari alamat">
                        </div>
                        
                        <ul class="list-group" style="margin-left: -20px; margin-top: 15px;">
                            @foreach ($penugasans as $penugasan)
                                <li class="penugasan list-group-item" value="{{$penugasan->id}}" style="width: 400px">
                                    <a>
                                        <b>{{$penugasan->lokasi}}</b>
                                        <p class="laporan"> 
                                            {{$penugasan->deskripsi}} 
                                        </p>    
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                   </div>
                   
                   <div class="row">
                       
                   </div>
               </div>
            </div> --}}
            <div class="col-lg-4 panel " style="margin-left: -18px; " id="tes">
                {{-- <div class="card scrollBar" style="width: 735px; height: 100%; border: none;">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                    <table class="">
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Penugasan diterima dari</p></td></tr>
                                        <tr><td><p style="margin-bottom: -5px; font-weight: bold;">Kementrian Kesehatan </p></td></tr>
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;"> 021-5201590</p></td></tr>
                                        <tr><td><p style="margin-top: 20px; margin-bottom: -5px; font-size: 13px;">Lokasi</p></td></tr>
                                        <tr>
                                            <td><p style="margin-bottom: -5px; font-weight: bold;">Palu, Sulawesi Tengah</p></td>
                                            <td><p style=" margin-bottom: -5px; font-size: 13px; margin-left: px; margin-top: -30px;" class="">Lokasi Penugasan</p></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="map" class="map" ></div>                                                
                                            </td>
                                            <td>
                                                <div id="map2" class="map" style="margin-top :-64px; "></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a name="" id="" class="btn btn-primary " href="#" role="button" style="margin-top: 5px;">Triase</a>
                                            </td>
                                        </tr>
                                        <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Deskripsi</p></td></tr>
                                        <tr>
                                            <td >
                                                <p class="float-left laporan" style="width: 80%;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                                                </p>
                                                
                                            </td>
                                            <td>
                                                <p style="margin-top: -170px; font-weight: bold;">Jumlah Korban </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Dokumentasi</p></td></tr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -230px">200 jiwa</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -200px; font-weight: bold;">Ditugaskan Sebagai </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -182px; ">Dokter </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -155px; font-weight: bold;">Pos Kesehatan </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                    <p style="margin-top: -135px; ">Pos Kesehatan 1 </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -110px; font-weight: bold;">Jumlah Tim Kesehatan yang ditugaskan </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -90px; ">20 orang </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <p style="margin-top: -65px; font-weight: bold;">Apakah anda bersedia ditugaskan pada lokasi tersebut? </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="form-check" style="margin-top: -15px; ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" >
                                                    Saya bersedia
                                                  </label>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </table>
                                    <button type="button" name="" id="" class="btn btn-primary btn-md ml-auto col-md-5 mt-5" data-toggle="modal" data-target="#exampleModalCenter">Tangani</button>
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
                </div> --}}
            </div>
                    
        </div>
        
       
    </div>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    
        $(".penugasan").click( function() {
        var id =  $(this).val();
            $.ajax({
                method: 'GET',
                url: '/penugasan/' + id,
                success : function (data) {
                    $("#detailPenugasan").html(data).fadeIn("slow");
                }
            });
        });      
</script>
</body>
</html>
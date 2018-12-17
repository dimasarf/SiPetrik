<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
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

    .scrollbar {
    margin-left: 30px;
    float: left;
    height: 300px;
    width: 65px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
    }
    .force-overflow {
    min-height: 450px;
    }

    .scrollbar-primary::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-primary::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #4285F4; }

    .scrollbar-danger::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-danger::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-danger::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #ff3547; }

    .scrollbar-warning::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-warning::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-warning::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #FF8800; }

    .scrollbar-success::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-success::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-success::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #00C851; }

    .scrollbar-info::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-info::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-info::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #33b5e5; }

    .scrollbar-default::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-default::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-default::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #2BBBAD; }

    .scrollbar-secondary::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #F5F5F5;
    border-radius: 10px; }

    .scrollbar-secondary::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-secondary::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
    background-color: #aa66cc; }
    body { 
      
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      height: 100%;
      overflow: scroll;
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
        color: white;
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
<body style="">
        <nav class="navbar navbar-expand-lg navbar-dark justify-content-end " style=" background-color: #1e1e1e;">       
                <a class="navbar-brand" href="/dashboardDinas" style="color: white    ; font-weight: bold; ">SI PETRIK</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto" >            
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo e(route('logout')); ?>" style="color: white" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">               
                      <i class="fas fa-power-off mr-4"></i>
                      
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
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
            
            <div class="col-md-3">                
                    <div class="wrapper">                            
                        <nav id="sidebar">
                            
                            <ul class="list-unstyled components">
                                <li >                                            
                                    <a href="/laporan" ><span><i class="fas fa-check-double mr-1"></i></span> Verifikasi Laporan</a>
                                </li>
                                <li>
                                    <a href="/verifiedLaporan"><span><i class="fas fa-clipboard-list mr-3"></i></span>Laporan Diterima</a>
                                </li>                                        
                                <li>
                                    <a href="/pemetaanDinas"><span><i class="fas fa-globe-americas mr-1"></i></span>Pemetaan Wilayah</a>
                                </li>                                        
                            </ul>
                        </nav>                                    
                    </div>
            </div> 
            <?php $__env->startSection('konten'); ?>

            <?php echo $__env->yieldSection(); ?>
            
            <?php $__env->startSection('detail'); ?>

            <?php echo $__env->yieldSection(); ?>
            <div class="col-md-4 panel " style="margin-left: -15px;  " id="detailKejadian">
              
            </div>
                    
        </div>
        
       
    </div>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });

    // var map = new ol.Map({
    //     target: 'map',
    //         layers: [
    //           new ol.layer.Tile({
    //             source: new ol.source.OSM()
    //             })
    //           ],
    //           view: new ol.View({
    //           center: ol.proj.fromLonLat([37.41, 8.82]),
    //           zoom: 4
    //           })
    //       });
    $(".kejadian").click( function() {
        var id =  $(this).val();
        $.ajax({
            method: 'GET',
            url: '/kejadian/' + id,
            success : function (data) {
                $("#detailKejadian").html(data).fadeIn("slow");
            }
        });
        
    });

    $('#exitMessage').click(function(){
        $('.message').remove();
    })

    
    </script>
</body>
</html>
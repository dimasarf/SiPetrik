<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <div class="col-lg-3">                
                    <div class="wrapper">                            
                        <nav id="sidebar">
                            <div class="sidebar-header">
                                <table>
                                    <tr>
                                        <td><img src="/images/avatar.jpg" class="img rounded-circle d-flex mr-2 mb-2" alt="" style="height: 60px; width: 60px;"></td>
                                        <td>
                                            <label for="" style="margin-bottom: -100px;"><?php echo e(Auth::user()->name); ?></label>
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
           <?php $__env->startSection('konten'); ?>
           
           <?php echo $__env->yieldSection(); ?>
            
            <div class="col-lg-4 panel " style="margin-left: -18px; " id="tes">
                
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
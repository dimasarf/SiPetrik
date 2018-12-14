<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
</head>
<body>
    
 
<div class="card scrollBar" style="width: 640px; height: 100%; border: none;">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <form action="/store" method="POST">        
                        <table class="">                        
                        
                            <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Pelapor</p></td></tr>
                            <tr><td><p style="margin-bottom: -5px; font-weight: bold;">{{$pelapor->nama}}</p></td></tr>
                            <tr><td><p style="margin-bottom: -5px; font-size: 13px;">{{$kejadian->nik}}</p></td></tr>
                            <tr><td><p style="margin-top: 20px; margin-bottom: -5px; font-size: 13px;">Lokasi</p></td></tr>
                            <tr>
                                <td><p style="margin-bottom: -5px; font-weight: bold;">{{$kejadian->lokasi}}</p></td>
                                <td><p style=" margin-bottom: -5px; font-size: 13px; margin-left: 30px; " class="">Dokumentasi Lokasi Bencana</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="map" class="map" ></div>                                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-control" id="triase" name="triase">
                                        <option value="merah">Merah</option>
                                        <option value="kuning">Kuning</option>
                                        <option value="hijau">Hijau</option>
                                        <option value="putih">Putih</option>
                                        <option value="hitam">Hitam</option>
                                    </select>
                                </td>
                            </tr>
                            <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Deskripsi</p></td></tr>
                            <tr>
                                <td colspan="2">
                                    <p class="float-left laporan" style="width: 55%;">
                                        {{$kejadian->deskripsi}}
                                    </p>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Status</p></td></tr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>{{$kejadian->status}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                        {{--  --}}
                                    
                                      {{csrf_field()}}
                                        <input type="hidden" name="idKejadian" id= "idKejadian" value="{{$kejadian->id}}">
                                        <button type="submit" class="btn btn-primary float-right col-md-5" id="btnKirim">Terima Laporan</button>
                                    </form>                                     
                                </td>
                            </tr>                        
                        </table>                    
                      
                                                
                        
                        <!-- Modal -->
                       
                </div>
            </div>                        
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYROYFc-XcfFCMmw5MVlOZc1Tuh_HC2U&callback=initMap"
    async defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
       $.ajaxSetup({
            beforeSend: function(xhr, type) {
                if (!type.crossDomain) {
                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                }
            },
        });
        latitude = {!! json_encode($kejadian->latitude) !!};
        longitude = {!! json_encode($kejadian->longitude) !!};
        
        function initMap() {      
                var myLatlng = new google.maps.LatLng(latitude,longitude);
                map = new google.maps.Map(document.getElementById('map'), {
                center: myLatlng,
                zoom: 8
            });
            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker.setMap(map);
         };         

        
          
        function save(){
            var idKejadian = document.getElementById('idKejadian').value;
            //     $.ajax({
            //         type: 'POST',
            //         url: '/store',
            //         data: {'idKejadian': idKejadian,
            //         success : function(data){
            //             alert("Sukses");
            //         }   
            //     })
            // }
        }   
        
        // $('#btnKirim').click(function(event){
        //     var idKejadian = $('#idKejadian').val();
        //     $.post('store',{'idKejadian': idKejadian,'_token':$('input[name=_token]').val()}, 
        //     function(data){
        //         alert(data);
        //     });
        // });
    </script>
</body>
</html>
<div class="card scrollBar" style="width: 665px; height: 100%; border: none; overflow-x: scroll">
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
                                <td><p style="margin-bottom: -5px; font-weight: bold;"><?php echo e($detail->lokasi); ?></p></td>
                                <td><p style=" margin-bottom: -5px; font-size: 13px; margin-left: px; margin-top: -30px;" class="">Lokasi Penugasan</p></td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="map" class="map" ></div>                                                
                                </td>
                            <td>
                                    <div id="map2" class="map" style="margin-top :-64px; margin-bottom : 5%; margin-left: 1%"></div>
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
                                        <?php echo e($detail->deskripsi); ?>

                                    </p>
                                    
                                </td>
                              
                            </tr>
                            <tr>
                                <td>
                                    <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Dokumentasi</p></td></tr>
                                </td>
                            </tr>
                            <tr>
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
                        <?php if($detail->status == 'Sedang dalam penanganan tim kesehatan'): ?>
                            <button type="button" name="" id="tangani" class="btn btn-success btn-md ml-auto col-md-5 mt-5 selesai">Selesai</button>
                        <?php else: ?>
                            <button type="button" name="" id="tangani" class="btn btn-primary btn-md ml-auto col-md-5 mt-5 tangani">Tangani</button>
                        <?php endif; ?>
                        
                        <!-- Button trigger modal -->
                        
                        
                        <!-- Modal -->
                        <div class="modal fade" id="tqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                
                                <div class="modal-body text-center">
                                    <h5>Terima kasih</h5>                                    
                              </div>
                            </div>
                        </div>                                    
                </div>                            
            </div>                        
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYROYFc-XcfFCMmw5MVlOZc1Tuh_HC2U&callback=initMap"
    async defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        latitude = <?php echo json_encode($detail->latitude); ?>;
        longitude = <?php echo json_encode($detail->longitude); ?>;
        function initMap() {      
                var myLatlng = new google.maps.LatLng(latitude,longitude);
                map = new google.maps.Map(document.getElementById('map'), {
                center: myLatlng,
                zoom: 8
            });

            
                map2 = new google.maps.Map(document.getElementById('map2'), {
                center: myLatlng,
                zoom: 8
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:"Hello World!"
            });
            marker.setMap(map);
         };               
        
        // function save(){
        //     var idKejadian = document.getElementById('idKejadian').value;
        //         $.ajax({
        //             type: 'POST',
        //             url: '/store',
        //             data: {'idKejadian': idKejadian,
        //             success : function(data){
        //                 alert("Sukses");
        //             }   
        //         })
        //     }
        // }   
        $('.tangani').click(function()
        {
            var id = <?php echo json_encode($detail->id, 15, 512) ?>;
            
            $.ajax({
                    type: 'GET',
                    url: '/handleLaporan/'+id,
                    success : function(data){
                        alert('Terima Kasih!!');
                        $("#tangani").removeClass('btn-primary');
                        $("#tangani").html('Selesai');
                        $("#tangani").addClass('btn-success selesai');
                    }   
                })
        });

        $('.btn-success').click(function()
        {
            var id = <?php echo json_encode($detail->id, 15, 512) ?>;
            
            $.ajax({
                    type: 'GET',
                    url: '/finishLaporan/'+id,
                    success : function(data){
                        alert('Terima Kasih!!!!!');
                    }   
                })
        });
    </script>
<?php $__env->startSection('konten'); ?>
<style>
  .map {
        height: 633px;
        width: 1050px;
      }
  .modal {
    position: absolute;
    top: 250px;
    
    bottom: 20px;
    left: 400px;
    z-index: 10040;
    /* overflow-y: hidden!important; */
  }

  .modal-2 {
    position: absolute;
    top: 250px;   
    left: 20px;
    margin-left: 100px;;
    z-index: 10040;
    overflow-y: hidden!important;
    width : 250px;
    height: 350px;
  }

 .modal-dialog{
    overflow-y: initial !important
  }

  .modal-body   {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
  }
</style>



<div class="col-md-9" style=" margin-left: -50px; max-height :633px; overflow-y: false;">
  <div id="map" class="map" ></div>
  <div class="modal modal-lg fade form" id="formModal" tabindex="-1" role="" aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog" role="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="status">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
              <div class="row">
               
                <div class="col-xl-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Keahlian</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <input type="hidden" id="idPenugasan">
                          <?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $petugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            
                            
                              <td class="id"><?php echo e($petugas->id); ?></td>
                              <td class="nama"></td>
                              <td class="jabatan"><?php echo e($petugas->jabatan); ?></td>
                              <td class="kontak"><?php echo e($petugas->kontak); ?></td>
                              <td><button type="button" class="btn btn-primary kirim" id="">Kirim</button></td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                </div>
              </div>
          </div>          
        </div>
      </div>
    </div>

    <div class="modal-2 modal-lg fade form" id="tes"   aria-hidden="true" data-backdrop="false">
      <div class="modal-dialog" role="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="status">Keterangan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
              <table>
                  <tr ><td><b>Lokasi</b></td></tr>    
                  <tr style="margin-bottom : -1000px"><td><p id="lokasi">Palu, Sulawesi</p></td></tr> 
                  <tr style="margin-top : -200px"><td><b>Jumlah Korban</b></td></tr>    
                  <tr style="margin-bottom : -1000px"><td><p id="Korban">Belum ada</p></td></tr> 
                  <tr style="margin-top : -200px"><td><b>Status</b></td></tr>    
                  <tr style="margin-bottom : -1000px"><td><p id="statusLaporan">Belum ada</p></td></tr> 
              </table>
          </div>          
        </div>
      </div>
    </div>
    



</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYROYFc-XcfFCMmw5MVlOZc1Tuh_HC2U&callback=initMap"
    async defer></script>
<script>       
      var lokasi = <?php echo json_encode($kejadians, 15, 512) ?>;
      
      $('#myModal').modal({ show: false})
      var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(-3.77655931, 110.12695313),
      mapTypeId: google.maps.MapTypeId.ROADMAP
      
    });

   

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    // var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';

    var icons = {
                  merah: {
                    icon:  '/images/merah.png'
                  },
                  hijau: {
                    icon:  '/images/hijau.png'
                  },
                  kuning: {
                    icon: '/images/kuning.png'
                  },
                  putih: {
                    icon: '/images/putih.png'
                  },
                  hitam: {
                    icon: '/images/hitam.png'
                  }
                };


    for (i = 0; i < lokasi.length; i++) {  

        marker = new google.maps.Marker({
        
        position: new google.maps.LatLng(lokasi[i].latitude, lokasi[i].longitude),
        icon : icons[lokasi[i].triase].icon,
        map: map
      });
      var idPenugasan;

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          idPenugasan = lokasi[i].id;
          $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/detailMarker/' + lokasi[i].id,
            success : function (data) {
              $('#statusLaporan').html(data.status);
              $('#Korban').html(data.jumlahKorban);
              $('#lokasi').html(data.lokasi);              
            }
          });
          
          $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/findTeam/' + lokasi[i].id,
            success : function (data) {
              $('.nama').each(function(){
                data.name.push($(this).html());
              });
            }
          });

          document.getElementById('status').value = lokasi[i].status;
          $('#formModal').modal('show');
        }
      })(marker, i));
    }
    $(document).on('click', '.kirim', function() {
        
        var nama = $(this).closest("tr")   // Finds the closest row <tr> 
                          .find(".nama")     // Gets a descendent with class="nr"
                          .text();
        var jabatan = $(this).closest("tr")   // Finds the closest row <tr> 
                          .find(".jabatan")     // Gets a descendent with class="nr"
                          .text(); 
        var kontak = $(this).closest("tr")   // Finds the closest row <tr> 
                            .find(".kontak")     // Gets a descendent with class="nr"
                            .text();  
                                 
        var id = $(this).closest("tr")   // Finds the closest row <tr> 
                      .find(".id")     // Gets a descendent with class="nr"
                      .text();
         $.ajax({
            method: 'GET',
            url: '/kirimTim/' + id,
            data:{idPenugasan:idPenugasan}, 
            success : function (data) {
              
              
            }
        });
        $(this).removeClass("btn btn-primary").addClass("btn btn-success")
                .html("Sudah Dikirim");
        $(this).prop('disabled', true);

    });
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboardDinas', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
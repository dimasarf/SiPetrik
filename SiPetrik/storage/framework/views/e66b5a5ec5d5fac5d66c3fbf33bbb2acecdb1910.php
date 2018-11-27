<?php $__env->startSection('content'); ?>

<br>
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">        
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
                                        <label for="">No Telepon</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">                                  
                                    </div>  
                                    <div class="form-group">
                                        <label for="">Deskripsi Kejadian</label>
                                        <textarea type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Lokasi</label>                                     
                                        <div id="map" class="map"></div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masyarakatLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
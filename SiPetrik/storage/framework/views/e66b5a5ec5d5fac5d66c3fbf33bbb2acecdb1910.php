<?php $__env->startSection('content'); ?>

<br>
<div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">        
        <div class="row">
          <div class="col-md-5" style="background-color: #848484; opacity: 0.8;" >
            
          </div>
          <div class="col-md-7" style="background-color: white; opacity: 0.99999">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        
                        <form action="/laporan" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Form Pelaporan</h5>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="helpId">                                  
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">NIK</label>                                     
                                        <input type="text" name="nik" id="" class="form-control" placeholder="" aria-describedby="helpId">                                      
                                    </div>    
                                    
                                    <div class="form-group">
                                        <label for="">No Telepon</label>
                                        <input type="text" name="telepon" id="" class="form-control" placeholder="" aria-describedby="helpId">                                  
                                    </div>  
                                    <div class="form-group">
                                        <label for="">Deskripsi Kejadian</label>
                                        <textarea type="text" name="deskripsi" id="" class="form-control" placeholder="Deskripsikan secara lengkap kondisi korban" aria-describedby="helpId"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Lokasi</label>                                     
                                        <div id="map" class="map"></div>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label for="">Jumlah Korban</label>                                     
                                        <input type="text" name="jumlahKorban" id="" class="form-control" placeholder="" aria-describedby="helpId">                                      
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">                                                    
                                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> Saya bersaksi bahwa data yang saya kirimkan benar sesuai dengan kejadian
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="lokasi" name="lokasi" >
                                    <input type="hidden" id="latitude" name="latitude" >
                                    <input type="hidden" id="longitude" name="longitude" >
                                <button type="submit" class="btn btn-dark float-right">Laporkan</button>
                                </div> 
                                
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

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
    <script type="module">
        function init()
        {
            alert("Pilih Kota Dari Peta");
        
        }
        
        // import Feature from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/Feature.js';
        // import Geolocation from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/Geolocation.js';
        // import Map from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/Map.js';
        // import View from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/View.js';
        // import Point from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/geom/Point.js';
        // import {Tile as TileLayer, Vector as VectorLayer} from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/layer.js';
        // import {OSM, Vector as VectorSource} from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/source.js';
        // import {Circle as CircleStyle, Fill, Stroke, Style} from 'https://dev.jspm.io/npm:ol@5.0.0-beta.12/ol/style.js';

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
          map.getView().getCenter();
          map.on('click', function(evt){
          console.info(evt.pixel);
          console.info(map.getPixelFromCoordinate(evt.coordinate));
          console.info(ol.proj.toLonLat(evt.coordinate));
          var coords = ol.proj.toLonLat(evt.coordinate);         
          var lat = coords[1];
          var lon = coords[0];
          longitude.value = lon;
          latitude.value = lat;
          $.ajax({
                url: 'http://api.openweathermap.org/data/2.5/weather?lat=' +lat+'&lon='+lon+'&APPID=ff3b0bd1aa7525c9ec3cf616ddec61e6',
                type: "GET",
                dataType : "jsonp",
                success : function(data)
                {                    
                    lokasi.value = data.name +', '+ data.sys.country;
                }
            })
        });       
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masyarakatLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
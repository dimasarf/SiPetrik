<div class="card scrollBar" style="width: 640px; height: 100%; border: none;">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <div class="container">
                <div class="row">
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
                                    <a name="" id="" class="btn btn-primary " href="#" role="button" style="margin-top: 5px;">Triase</a>
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
                                    <tr><td><p style="margin-bottom: -5px; font-size: 13px;">Jumlah Korban</p></td></tr>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>200 000 Jiwa</p>
                                </td>
                            </tr>
                        </table>
                        <button type="button" name="" id="" class="btn btn-primary btn-md ml-auto col-md-5" data-toggle="modal" data-target="#exampleModalCenter">Kirim Tim</button>
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
                                <div class="modal-body" >                                  
                                <form action="/kirimTim" id="container" method="POST">
                                    <div>
                                        <input type="hidden" name="idKejadian" value="{{$kejadian->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="text" class="form-control" name="jumlahTim" id="jumlahTim" aria-describedby="helpId" placeholder="Jumlah Tim">
                                        <button type="button" class="btn btn-primary mt-1 float-right" onclick="addFields();">Submit</button>
                                    </div>
                                </form>
                                </div>
                                <div class="modal-footer" id="footer">                                              
                                    
                                </div>
                                  
                              </div>
                            </div>
                        </div>
                </div>
            </div>                        
        </div>
    </div>

    <script>
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
          
        function addFields(){
            var number = document.getElementById("jumlahTim").value;
            var container = document.getElementById("container");
            var footer = document.getElementById("footer");
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Jumlah Tim " + (i+1)+"   "));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "namaTIm" + i;
                input.className = "form-control mb-1";
                container.appendChild(input);
            }

            var button = document.createElement("input");
            button.type = "submit";
            button.value = "Kirim";
            button.className = "btn btn-primary";
            container.appendChild(button);
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "jumlah";
            input.id = "jumlah";
            input.className = "form-control mb-1";
            container.appendChild(input);
            document.getElementById('jumlah').value = document.getElementById("jumlahTim").value;
        }

        
    </script>
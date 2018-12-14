@extends('admin.dashboardDinas')
@section('konten')
<div class="col-md-4 panel" style="background-color: white; margin-left: -20px; max-height :650px; overflow-y: scroll;" >
        <div class="container">
             @if(session()->has('message'))
                 <div class="row message" id="">
                     <div class="alert alert-success col-md-8 mx-auto mt-1">
                         <button type="button" class="close" id="exitMessage">
                             <span aria-hidden="true">&times;</span>
                         </button>
                         {{ session()->get('message') }}
                     </div>
                 </div>
             @elseif(session()->has('warning'))
             <div class="row message" id="">
                    <div class="alert alert-danger col-md-8 mx-auto mt-1">
                        <button type="button" class="close" id="exitMessage">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('warning') }}
                    </div>
                </div>
             @endif
            <div class="row " style="max-height:5%;">
                 <div class="input-group mt-2">
                     <div class="input-group-prepend">
                         <div class="input-group-text" style="background-color: transparent"><i class="fas fa-search"></i></div>
                     </div>
                     <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Cari alamat">
                 </div>
                 
                 <div>
                     <div>
                     <ul class="list-group" style="margin-left: -20px; margin-top: 15px; " class="">                            
                     <table>
                         @foreach ($kejadians as $kejadian)
                            <tr class="force-overflow">
                                <li class="list-group-item  kejadian" value="{{$kejadian->id}}" style="width: 400px"
                                    
                                    <input type="hidden" id="txt"  value="{{$kejadian->id}}">
                                    <a>
                                        <p style="margin-bottom: 0px;" id="lokasi"><b>{{$kejadian->lokasi}}</b></p>
                                        <p class="laporan">  {{str_limit($kejadian->deskripsi, 100)}}</p>
                                    </a>
                                </li>
                            </tr>
                         @endforeach
                     </table>                                                
                 </ul>                                
                     </div>
                 </div>
                 
            </div>
        </div>
     </div>
     <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
        
            });
        
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
@endsection
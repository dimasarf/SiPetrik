@extends('dashboardTimKesehatan')
@section('konten')
<div class="col-lg-4 panel" style="background-color: white; margin-left: -20px; max-height :650px; overflow-y: scroll;" >
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
                    $("#tes").html(data).fadeIn("slow");
                }
            });
        });      
</script>
@endsection
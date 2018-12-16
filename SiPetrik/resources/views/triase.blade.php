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
                            @foreach ($triases as $triase)
                                <li class="triase list-group-item" value="{{$triase->id}}" style="width: 400px">
                                    <a>
                                        <b>{{$triase->warna}}</b>
                                        <p class="laporan"> 
                                            {{str_limit($triase->cara, 100)}}
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
    
        $(".triase").click( function() {
            var warna =  $(this).val();
                $.ajax({
                    method: 'GET',
                    url: '/getCara/' + warna,
                    success : function (data) {
                        $("#tes").html(data).fadeIn("slow");
                    }
                });
        });      
</script>
@endsection
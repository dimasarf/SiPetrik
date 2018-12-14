@extends('admin.dashboardDinas')
@section('konten')
<style>
    .modal {
    display: block;
    overflow-y: hidden!important
  }

 .modal-dialog{
    overflow-y: initial !important
  }

  .card-body   {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
  }
</style>
<div class="col-md-9" style=" margin-left: -10px; max-height :633px; overflow-y: false;">
    <div class="card mb-3 mt-4" style="width : 1000px;">
        <div class="card-header">
            <h3><i class="fa fa-users"></i> Laporan Terverifikasi</h3>
            Lihat laporan-laporan yang sudah diverifikasi
        </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-responsive-xl table-hover display">
                    <thead class="text-center">
                        <tr>
                            <th>Lokasi</th>
                            <th>Pelapor</th>
                            <th>NIK</th>
                            <th>No Telepon</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>													
                    <tbody>
                        @foreach($laporans as $laporan)
                            <tr >
                                <td>{{$laporan->lokasi}}</td>
                                <td>{{$laporan->nama}}</td>
                                <td>{{$laporan->nik}}</td>
                                <td>{{$laporan->telepon}}</td>
                                <td>{{$laporan->deskripsi}}</td>
                                <td>{{$laporan->status}}</td>
                                <td><button type="submit" class="btn btn-danger">Batalkan</button></td>
                            </tr>
                        @endforeach

                        
                        
                        
                    </tbody>
                </table>
            </div>														
        </div><!-- end card-->	           

</div>
@endsection
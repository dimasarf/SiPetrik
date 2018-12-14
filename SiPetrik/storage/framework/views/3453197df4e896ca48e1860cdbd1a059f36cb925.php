<?php $__env->startSection('konten'); ?>
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
                        <?php $__currentLoopData = $laporans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laporan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr >
                                <td><?php echo e($laporan->lokasi); ?></td>
                                <td><?php echo e($laporan->nama); ?></td>
                                <td><?php echo e($laporan->nik); ?></td>
                                <td><?php echo e($laporan->telepon); ?></td>
                                <td><?php echo e($laporan->deskripsi); ?></td>
                                <td><?php echo e($laporan->status); ?></td>
                                <td><button type="submit" class="btn btn-danger">Batalkan</button></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        
                        
                    </tbody>
                </table>
            </div>														
        </div><!-- end card-->	           

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboardDinas', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
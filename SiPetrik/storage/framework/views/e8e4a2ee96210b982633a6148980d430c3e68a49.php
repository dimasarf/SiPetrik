<?php $__env->startSection('content'); ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row mt-5">
      <div class="col-md-4">
        <center>
            <img src="/images/log2.png" alt="" srcset="">
            <p style="color: white ; font-weight: bold">Laporkan Segera Bencana yang Anda Temui </br>
              dan lengkapi data laporan anda agar laporan anda dapat </br> kami proses secepatnya
            </p>
            <a href="/laporan" name="" id="" class="btn ml-auto btn-block" style="background-color : transparent ; color: azure ; border-color: white
            ; font-weight: bold">Laporkan</a>  
        </center>
        
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masyarakatLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
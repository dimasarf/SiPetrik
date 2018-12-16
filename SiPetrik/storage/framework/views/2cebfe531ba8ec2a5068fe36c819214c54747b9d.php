<?php $__env->startSection('konten'); ?>
<style>
.modal-dialog{
    overflow-y: initial !important
  }

  .card-body   {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
  }

  body { 
      
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      height: 100%;
      overflow: scroll;
    }
</style>
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- Bootstrap CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
<!-- Font Awesome CSS -->
<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
<!-- Custom CSS -->
<link href="/css/style.css" rel="stylesheet" type="text/css" />
		
<!-- BEGIN CSS for this page -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
<!-- END CSS for this page -->
<div class="col-md-9" style=" margin-left: -10px; max-height :633px; overflow-y: hidden;">
        <div class="row mt-2 ml-5">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-default">
                                <i class="fa fa-file-text-o float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Laporan</h6>
                        <h1 class="m-b-20 text-white counter"><?php echo e($totalLaporan); ?></h1>
                        <br>
                        <br>
                                <span class="text-white">Laporan ditangani</span>
                        </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-warning">
                                <i class="fa fa-bar-chart float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-2">Korban</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo e($totalKorban); ?></h1>
                                <span class="text-white">Total korban dari <?php echo e($totalLaporan); ?> kejadian  </span>
                        </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-info">
                                <i class="fa fa-user-o float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Tim</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo e($totalTim); ?></h1>
                                <span class="text-white">Total tim</span>
                        </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box noradius noborder bg-danger">
                                <i class="fa fa-bell-o float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Alerts</h6>
                                <h1 class="m-b-20 text-white counter"><?php echo e($urgent); ?></h1>
                                <span class="text-white">Laporan belum ditanggapi</span>
                        </div>
                </div>
        </div>

        <div class="row ml-5">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">						
                        <div class="card mb-3">
                                <div class="card-header">
                                        <h3><i class="fa fa-bar-chart-o"></i> Triase</h3>
                                        persentase keseluruhan triase
                                       
                                </div>
                                        
                                <div class="card-body">
                                        <canvas id="pieChart"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div><!-- end card-->					
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">						
                        <div class="card mb-3">
                                <div class="card-header">
                                        <h3><i class="fa fa-star-o"></i>Lokasi Laporan</h3>
                                        laporan lokasi-lokasi bencana
                                </div>
                                        
                                <div class="modal-body">
                                        <div class="widget-messages nicescroll" style="height: 200px;">
                                                <?php $__currentLoopData = $kejadians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kejadian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p class="font-600 m-b-5"><?php echo e($kejadian->lokasi); ?> <span class="text-primary pull-right"><b>emp</b></span></p>
                                                        <div class="progress">
                                                               
                                                                        <div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 100%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95"></div>

            
                                                        </div>
                                                        <div class="m-b-20"></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                </div>
                                <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                        </div><!-- end card-->					
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">						
                                <div class="card mb-3">
                                        <div class="card-header">
                                                <h3><i class="fa fa-envelope-o"></i> Latest messages</h3>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                                
                                        <div class="card-body">
                                                
                                                <div class="widget-messages nicescroll" style="height: 200px;">
                                                        <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="/images/avatar2.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user"><?php echo e($tim->name); ?></p>
                                                                        <p class="message-item-msg ml-5"><?php echo e($tim->jabatan); ?></p>
                                                                        <p class="message-item-date">11:50 PM</p>
                                                                </div>
                                                        </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                
                                        </div>
                                        <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                                </div><!-- end card-->					
                        </div>
        </div>
</div>
<script src="/js/modernizr.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/moment.min.js"></script>
		
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="/js/detect.js"></script>
<script src="/js/fastclick.js"></script>
<script src="/js/jquery.blockUI.js"></script>
<script src="/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
<script src="/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="/plugins/counterup/jquery.counterup.min.js"></script>
<script>
        var merah = <?php echo json_encode($totalMerah, 15, 512) ?>;
        var kuning = <?php echo json_encode($totalKuning, 15, 512) ?>;
        var hijau = <?php echo json_encode($totalHijau, 15, 512) ?>;
        var putih = <?php echo json_encode($totalPutih, 15, 512) ?>;
        var hitam = <?php echo json_encode($totalHitam, 15, 512) ?>;
        var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
		data: {
				datasets: [{
					data: [merah, kuning, hijau, putih, hitam],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"merah",
					"kuning",
					"hijau",					
                                        "putih",
                                        "hitam",
				]
			},
			options: {
				responsive: true
			}
	 
	});


	var ctx3 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx3, {
		type: 'doughnut',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				
			},
			options: {
				responsive: true
			}
	 
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboardDinas', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
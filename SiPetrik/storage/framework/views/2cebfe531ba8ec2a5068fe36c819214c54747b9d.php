<?php $__env->startSection('konten'); ?>
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
<div class="col-md-9" style=" margin-left: -10px; max-height :633px; overflow-y: false;">
    <div class="row mt-5">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-default">
                        <i class="fa fa-file-text-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                        <h1 class="m-b-20 text-white counter">1,587</h1>
                        <span class="text-white">15 New Orders</span>
                </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-bar-chart float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Visitors</h6>
                        <h1 class="m-b-20 text-white counter">250</h1>
                        <span class="text-white">Bounce rate: 25%</span>
                </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-info">
                        <i class="fa fa-user-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Users</h6>
                        <h1 class="m-b-20 text-white counter">120</h1>
                        <span class="text-white">25 New Users</span>
                </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-danger">
                        <i class="fa fa-bell-o float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">Alerts</h6>
                        <h1 class="m-b-20 text-white counter">58</h1>
                        <span class="text-white">5 New Alerts</span>
                </div>
        </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboardDinas', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
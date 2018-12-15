@extends('admin.dashboardDinas')
@section('konten')
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

        <div class="row ml-5">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">						
                        <div class="card mb-3">
                                <div class="card-header">
                                        <h3><i class="fa fa-bar-chart-o"></i> Colour Analytics</h3>
                                       
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
                                        <h3><i class="fa fa-star-o"></i> Tasks progress</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                        
                                <div class="modal-body">
                                        <div class="widget-messages nicescroll" style="height: 200px;">
                                                @foreach($kejadians as $kejadian)
                                                        <p class="font-600 m-b-5">{{$kejadian->lokasi}} <span class="text-primary pull-right"><b>emp</b></span></p>
                                                        <div class="progress">
                                                               
                                                                        <div class="progress-bar progress-bar-striped progress-xs bg-danger" role="progressbar" style="width: 100%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95"></div>

            
                                                        </div>
                                                        <div class="m-b-20"></div>
                                                @endforeach
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
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
                                                                                <p class="message-item-user">John Doe</p>
                                                                                <p class="message-item-msg">Hello. I want to buy your product</p>
                                                                                <p class="message-item-date">11:50 PM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar5.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Ashton Cox</p>
                                                                        <p class="message-item-msg">Great job for this task</p>
                                                                        <p class="message-item-date">14:25 PM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar6.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Colleen Hurst</p>
                                                                        <p class="message-item-msg">I have a new project for you</p>
                                                                        <p class="message-item-date">13:20 PM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Fiona Green</p>
                                                                        <p class="message-item-msg">Nice to meet you</p>
                                                                        <p class="message-item-date">15:45 PM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Donna Snider</p>
                                                                        <p class="message-item-msg">I have a new project for you</p>
                                                                        <p class="message-item-date">15:45 AM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar5.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Garrett Winters</p>
                                                                        <p class="message-item-msg">I have a new project for you</p>
                                                                        <p class="message-item-date">15:45 AM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                <div class="message-item">
                                                                        <div class="message-user-img"><img src="assets/images/avatars/avatar6.png" class="avatar-circle" alt=""></div>
                                                                        <p class="message-item-user">Herrod Chandler</p>
                                                                        <p class="message-item-msg">Hello! I'm available for this job</p>
                                                                        <p class="message-item-date">15:45 AM</p>
                                                                </div>
                                                        </a>
                                                        <a href="#">
                                                                                                <div class="message-item">
                                                                                                <div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
                                                                                                <p class="message-item-user">Jena Gaines</p>
                                                                                                <p class="message-item-msg">I have a new project for you</p>
                                                                                                <p class="message-item-date">15:45 AM</p>
                                                                                        </div>
                                                                                </a>
                                                                                <a href="#">
                                                                                        <div class="message-item">
                                                                                                <div class="message-user-img"><img src="assets/images/avatars/avatar2.png" class="avatar-circle" alt=""></div>
                                                                                                <p class="message-item-user">Airi Satou</p>
                                                                                                <p class="message-item-msg">I have a new project for you</p>
                                                                                                <p class="message-item-date">15:45 AM</p>
                                                                                        </div>
                                                                                </a>
                                                                                <a href="#">
                                                                                        <div class="message-item">
                                                                                                <div class="message-user-img"><img src="assets/images/avatars/avatar10.png" class="avatar-circle" alt=""></div>
                                                                                                <p class="message-item-user">Brielle Williamson</p>
                                                                                                <p class="message-item-msg">I have a new project for you</p>
                                                                                                <p class="message-item-date">15:45 AM</p>
                                                                                        </div>
                                                                                </a>
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
        var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
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
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
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
@endsection
<?php $__env->startSection('konten'); ?>
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
                            <?php $__currentLoopData = $triases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $triase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="triase list-group-item" value="<?php echo e($triase->id); ?>" style="width: 400px">
                                    <a>
                                        <b><?php echo e($triase->warna); ?></b>
                                        <p class="laporan"> 
                                            <?php echo e(str_limit($triase->cara, 100)); ?>

                                        </p>    
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboardTimKesehatan', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
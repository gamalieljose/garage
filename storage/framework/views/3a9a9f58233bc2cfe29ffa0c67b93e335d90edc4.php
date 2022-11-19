

<?php $__env->startSection('content'); ?>

<!-- page content -->
	<div class="right_col" role="main">
        <div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
    <!-- Modal content-->
				<div class="modal-content modal_data">
				</div>
			</div>
        </div>
		
		<!-- Modal for Coupon Data -->
			<div class="modal fade" id="coupaon_data" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content used_coupn_modal_data">
						
					</div>
				</div>
			</div>
		<!-- End Modal for Coupon Data -->
        <div class="">
           <div class="page-title">
                <div class="nav_menu">
					<nav>
					  <div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Service')); ?></span></a>
					  </div>
						  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
            </div>
			<?php if(session('message')): ?>
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							<?php if(session('message') == 'Successfully Submitted'): ?>
							<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Submitted')); ?>  </label>
						   <?php elseif(session('message')=='Successfully Updated'): ?>
						   <label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Updated')); ?>  </label>
						   <?php elseif(session('message')=='Successfully Deleted'): ?>
						   <label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Deleted')); ?>  </label>
						   <?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="x_content">
						<ul class="nav nav-tabs bar_tabs" role="tablist">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_view')): ?>
								<li role="presentation" class="active"><a href="<?php echo url('/service/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Services List')); ?></b></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_add')): ?>
								<li role="presentation" class=""><a href="<?php echo url('/service/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i> <?php echo e(trans('app.Add Services')); ?> </a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel table_up_div">
						<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo e(trans('app.Job No')); ?></th>
									<th><?php echo e(trans('app.Customer Name')); ?></th>
									<th><?php echo e(trans('app.Date')); ?></th> 
									<th><?php echo e(trans('app.Service Category')); ?></th>
									<th><?php echo e(trans('app.Assign To')); ?></th>
									<th><?php echo e(trans('app.Free Service Coupon')); ?></th>
									<th><?php echo e(trans('app.Number Plate')); ?></th>
									<th><?php echo e(trans('app.Action')); ?></th>
								</tr>
							</thead>
							<tbody>
							<?php if(!empty($service)): ?>
							<?php $i=1;?> 
								<?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i); ?></td>
										<td><?php echo e($services->job_no); ?></td>
										<td><?php echo e(getCustomerName($services->customer_id)); ?></td>
											<?php $date_db = date("Y-m-d", strtotime($services->service_date)); ?>
											<?php if(!empty($current_month) && strpos($available, $date_db) !== false): ?>
											
												 <td><span class="label label-danger" style="font-size:13px;"><?php echo e(date(getDateFormat(),strtotime($date_db))); ?></span></td>
											<?php else: ?>
												 <td> <?php echo e(date(getDateFormat(),strtotime($date_db))); ?></td>
											<?php endif; ?>
										<td><?php echo e($services->service_category); ?></td>
										<td><?php echo e(getAssignTo($services->assign_to)); ?></td>
										<?php $coupon = getAllCoupon($services->customer_id,$services->vehicle_id);
										?>
										<?php if($services->service_type == "free"): ?>
											<td style="width:20%">
												<?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php $useddata = getUsedCoupon($services->customer_id,$services->vehicle_id,$coup->job_no);
													?>
													<?php if($useddata == 1): ?>
														<button class="btn btn-danger btn-xs coupon_btn" data-toggle="modal" data-target="#coupaon_data" id="coup_data" coupon_no="<?php echo e($coup->job_no); ?>" servi_id="<?php echo e($services->id); ?>" url="<?php echo url('/service/used_coupon_data'); ?>"><?php echo e($coup->job_no); ?></span></button>
													<?php elseif($useddata == 'empty'): ?>
														<button class="btn btn-warning btn-xs coupon_btn" data-toggle="modal" data-target="#coupaon_data" id="coup_data" coupon_no="<?php echo e($coup->job_no); ?>" servi_id="<?php echo e($services->id); ?>" url="<?php echo url('/service/used_coupon_data'); ?>"><?php echo e($coup->job_no); ?></span>
													<?php elseif($useddata == 0): ?>
														<button class="btn btn-success btn-xs" disabled ><?php echo e($coup->job_no); ?></span>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											</td>
										<?php else: ?>
											<td><?php echo e(trans('app.Paid Service')); ?></td>
										<?php endif; ?>
										<td><?php echo e(getVehicleNumberPlate($services->vehicle_id)??"Not Added"); ?></td>
										<td> 
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_view')): ?>
												<button type="button" data-toggle="modal" data-target="#myModal" serviceid="<?php echo e($services->id); ?>" url="<?php echo url('/service/list/view'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View')); ?></button>
											<?php endif; ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_edit')): ?>	
												<a href="<?php echo url('/service/list/edit/'.$services->id); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
											<?php endif; ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_delete')): ?>
												<a url="<?php echo url('/service/list/delete/'.$services->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
											<?php endif; ?>
										</td>
									</tr>
									<?php $i++; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>  

<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
<!-- language change in user selected -->	
<script>
$(document).ready(function() {
    $('#datatable').DataTable( {
		responsive: true,
        "language": {
			
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?php echo getLanguageChange(); 
			?>.json"
        }
    } );
} );
</script>
<!-- delete service -->
<script>
 $('body').on('click', '.sa-warning', function() {
	
	  var url =$(this).attr('url');
        swal({   
            title: "Are You Sure?",
			text: "You will not be able to recover this data afterwards!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#297FCA",   
            confirmButtonText: "Yes, delete!",   
            closeOnConfirm: false 
        }, function(){
			window.location.href = url;
             
        });
    }); 
 
</script>

<script type="text/javascript">

$( document ).ready(function(){
$('body').on('click', '.save', function() {
       var servicesid = $(this).attr("serviceid");
       
       var url = $(this).attr('url');
       $.ajax({
       type: 'GET',
       url: url,
       
       data : {servicesid:servicesid},
       success: function (data)
       {            
			
        $('.modal_data').html(data.html);     
		},
   
		error: function(e) {
			   alert("An error occurred: " + e.responseText);
			   console.log(e);  
		}

       });

       });
   });

</script>

<script>
$(document).ready(function(){
$('body').on('click', '.coupon_btn', function() {		
		var coupon_no = $(this).attr('coupon_no');
		var ser_id = $(this).attr('servi_id');
		var url = $(this).attr('url');
		
		$.ajax({
			
			url: url,
			type: 'GET',
			data: {coupon_no:coupon_no,ser_id:ser_id},
		
			success:function(response)
			{
				
				$('.used_coupn_modal_data').html(response.html);     
			},
			erro:function(e)
			{
				console.log(e);
			}
		});
	});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views//service/list.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<!-- page content start -->
	<div class="right_col" role="main">
		<!--gate pass view modal-->
		<div id="myModal-gateview" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
 
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Gate Pass')); ?></h4>
					</div>
					<div class="modal-body">
	
					</div>
				</div>
			</div>
		</div>
		<div class="">
		   <div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Gate Pass')); ?></span></a>
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
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_view')): ?>
								<li role="presentation" class="active"><a href="<?php echo url('/gatepass/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Gatepass List')); ?></b></span></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_add')): ?>
								<li role="presentation" class=""><a href="<?php echo url('/gatepass/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Gatepass')); ?></span></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel table_up_div">
						<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo e(trans('app.Gatepass No')); ?></th>
									<th><?php echo e(trans('app.Job No')); ?></th>
									<th><?php echo e(trans('app.Customer Name')); ?></th>
									<th><?php echo e(trans('app.Vehicle Name')); ?></th>
									<th><?php echo e(trans('app.Action')); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>   
								
								<?php $__currentLoopData = $gatepass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatepasss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($i); ?></td>
										<td><?php echo e($gatepasss->gatepass_no); ?></td>
										<td><?php echo e($gatepasss->jobcard_id); ?></td>
										<td><?php echo e(getCustomerName($gatepasss->customer_id)); ?></td>
										<td><?php echo e(getVehicleName($gatepasss->vehicle_id)); ?></td>
										<td>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_view')): ?>
													<button type="button" data-toggle="modal" data-target="#myModal-gateview" serviceid="" class="btn getgetpass btn-round btn-info" getpassid="<?php echo e($gatepasss->jobcard_id); ?>"><?php echo e(trans('app.View')); ?></button>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_edit')): ?>
													<a href="<?php echo url('/gatepass/list/edit/'.$gatepasss->id); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_delete')): ?>
													<a url="<?php echo url('/gatepass/list/delete/'.$gatepasss->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
												<?php endif; ?>
											
										</td>
									</tr>
									<?php $i++; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- page content end -->


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
		
<script>
$(document).ready(function(){
	$('body').on('click', '.getgetpass', function() {
		var getpassid = $(this).attr('getpassid');
	 var url = "<?php echo url('/gatepass/gatepassview'); ?>";
		$.ajax({
			type:'GET',
			url:url,
			data:{getpassid:getpassid},
			success:function(response)
			{
				$('.modal-body').html(response.html);
			},
		});
	});
});
</script>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/gatepass/list.blade.php ENDPATH**/ ?>
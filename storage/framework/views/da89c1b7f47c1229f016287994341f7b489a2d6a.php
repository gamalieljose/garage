
<?php $__env->startSection('content'); ?>

<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Compliance Management')); ?></span></a> 
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
						<ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_view')): ?>
								<li role="presentation" class="active"><a href="<?php echo url('/rto/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.List Of RTO Taxes')); ?></b></span></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_add')): ?>
								<li role="presentation" class="setTabAddRtoTaxOnSmallDevice"><a href="<?php echo url('/rto/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add RTO Taxes')); ?></span></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel table_up_div">
						<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
							<thead>
								<tr>
									<th><?php echo e(trans('app.#')); ?></th>
									<th><?php echo e(trans('app.Vehicle Name')); ?></th>
									<th><?php echo e(trans('app.RTO / Registration C.R. Temp Tax')); ?></th>
									<th><?php echo e(trans('app.Number Plate charge')); ?></th>
									<th><?php echo e(trans('app.Municipal Road Tax')); ?></th>

								<!-- Custom Field Data Label Name-->
									<?php if(!empty($tbl_custom_fields)): ?>
										<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
											<th><?php echo e($tbl_custom_field->label); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								<!-- Custom Field Data End -->

									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['rto_edit','rto_delete'])): ?>
			                        	<th><?php echo e(trans('app.Action')); ?></th>
			                        <?php endif; ?>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; ?>   
							<?php $__currentLoopData = $rto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rtos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($i); ?></td>
									<td><?php echo e(getVehicleName($rtos->vehicle_id)); ?></td>
									<td><?php echo e($rtos->registration_tax); ?></td>
									<td><?php echo e($rtos->number_plate_charge); ?></td>
									<td><?php echo e($rtos->muncipal_road_tax); ?></td>

								<!-- Custom Field Data Value-->
									<?php if(!empty($tbl_custom_fields)): ?>
				
										<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
											<?php 
												$tbl_custom = $tbl_custom_field->id;
												$userid = $rtos->id;
																						
												$datavalue = getCustomDataRto($tbl_custom,$userid);
											?>
											
											<?php if($tbl_custom_field->type == "radio"): ?>
												<?php if($datavalue != ""): ?>
													<?php
														$radio_selected_value = getRadioSelectedValue($tbl_custom_field->id, $datavalue);
													?>
													<td><?php echo e($radio_selected_value); ?></td>
												<?php else: ?>
													<td><?php echo e(trans('app.Data not available')); ?></td>
												<?php endif; ?>
											<?php else: ?>
												<?php if($datavalue != null): ?>
													<td><?php echo e($datavalue); ?></td>
												<?php else: ?>
													<td><?php echo e(trans('app.Data not available')); ?></td>
												<?php endif; ?>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								<!-- Custom Field Data End -->

									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['rto_edit','rto_delete'])): ?>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_edit')): ?>
											<a href="<?php echo e(url('rto/list/edit/'.$rtos->id)); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_delete')): ?>
											<a url="<?php echo e(url('rto/list/delete/'.$rtos->id)); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger dgr"><?php echo e(trans('app.Delete')); ?></button></a>
										<?php endif; ?>
									</td>
									<?php endif; ?>
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
<!-- page content end-->


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
<!-- delete rto -->
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/rto/list.blade.php ENDPATH**/ ?>
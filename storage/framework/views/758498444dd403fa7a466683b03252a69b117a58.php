
<?php $__env->startSection('content'); ?>
<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Product')); ?></span></a>
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
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_view')): ?>
								<li role="presentation" class="active"><a href="<?php echo url('/product/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Product List')); ?></b></a></li>
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_add')): ?>
								<li role="presentation" class=""><a href="<?php echo url('/product/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Product')); ?> </a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel table_up_div">
						<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px; width:100%;">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo e(trans('app.Product Number')); ?></th>
									<th><?php echo e(trans('app.Manufacturer Name')); ?></th>
									<th><?php echo e(trans('app.Product Name')); ?></th>
									<th><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
									<th><?php echo e(trans('app.Supplier Name')); ?></th>
									<th><?php echo e(trans('app.Company Name')); ?></th>

								<!-- Custom Field Data Label Name-->
									<?php if(!empty($tbl_custom_fields)): ?>
										<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
											<th><?php echo e($tbl_custom_field->label); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								<!-- Custom Field Data End -->

									<th><?php echo e(trans('app.Action')); ?></th>
								</tr>
							</thead>
							<tbody>
							<?php $i = 1; ?>  
							<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($i); ?></td>
									<td><?php echo e($products->product_no); ?></td>
									<td><?php echo e(getProductName($products->product_type_id)); ?></td>
									<td><?php echo e($products->name); ?></td>
									<td><?php echo e($products->price); ?></td>
									<td><?php echo e(getSupplierFullName($products->supplier_id)); ?></td>
									<td><?php echo e(getCompanyNames($products->supplier_id)); ?></td>

								<!-- Custom Field Data Value-->
									<?php if(!empty($tbl_custom_fields)): ?>
				
										<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
											<?php 
												$tbl_custom = $tbl_custom_field->id;
												$userid = $products->id;
																						
												$datavalue = getCustomDataProduct($tbl_custom,$userid);
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

									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_edit')): ?>
											<a href="<?php echo url('/product/list/edit/'.$products->id); ?>" ><button type="button" class="btn btn-round btn-success editBtnCss"><?php echo e(trans('app.Edit')); ?></button></a>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_delete')): ?>
											<a url="<?php echo url('/product/list/delete/'.$products->id); ?>" class="sa-warning"><button type="button" id="deleteBtnCss" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
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

 <!-- /page content --> 
<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/product/list.blade.php ENDPATH**/ ?>
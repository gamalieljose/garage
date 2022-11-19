
<?php $__env->startSection('content'); ?>
<style>
</style>

<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Customer')); ?></span></a>
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
					<ul class="nav nav-tabs bar_tabs" role="tablist">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_view')): ?>
						<li role="presentation" class="active"><a href="<?php echo url('/customer/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Customer List')); ?></b></a></li>
						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_add')): ?>
						 	<li role="presentation" class=""><a href="<?php echo url('/customer/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i> <?php echo e(trans('app.Add Customer')); ?></a></li>
						<?php endif; ?>
					
					</ul>
				</div>
				<div class="x_panel bgr">
					<table id="datatable" class="table datatable table-striped jambo_table" style="margin-top:20px; width:100%;">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo e(trans('app.Image')); ?></th>
								<th><?php echo e(trans('app.First Name')); ?></th>
								<th><?php echo e(trans('app.Last Name')); ?></th>
								<th><?php echo e(trans('app.Email')); ?></th>
								<th><?php echo e(trans('app.Mobile Number')); ?></th>
								<th><?php echo e(trans('app.Action')); ?></th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1;?>
						<?php if(!empty($customer)): ?>
							<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($i); ?></td>
									<td><img src="<?php echo e(url('public/customer/'.$customers->image)); ?>"  width="50px" height="50px" class="img-circle" ></td>
									<td><?php echo e($customers -> name); ?></td>
									<td><?php echo e($customers -> lastname); ?></td>
									<td><?php echo e($customers -> email); ?></td>
									<td><?php echo e($customers -> mobile_no); ?></td>
									<td> 
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_view')): ?>
											<a href="<?php echo url('/customer/list/'.$customers->id); ?>"><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.View')); ?></button></a>
										<?php endif; ?>
										 
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_edit')): ?>
											<a href="<?php echo url ('/customer/list/edit/'.$customers->id); ?>"> <button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_delete')): ?>
											<a  url="<?php echo url('/customer/list/delete/'.$customers->id); ?>" class="deletecustomers"> <button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
										<?php endif; ?>
									
										<?php if(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
											<?php if(!Gate::allows('customer_edit')): ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_owndata')): ?>
													<a href="<?php echo url ('/customer/list/edit/'.$customers->id); ?>"> <button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
												<?php endif; ?>
											<?php endif; ?>	
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

$(document).ready(function(){
	$('body').on('click', '.deletecustomers', function() {
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
  }); 
 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/customer/list.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

<!-- page content -->
<div class="right_col" role="main">
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header"> 
					<a href=""><button type="button" class="close">&times;</button></a>
					<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Invoice')); ?></h4>
				</div>
				<div class="modal-body">

				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="page-title">
			<div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<?php if(getActiveCustomer(Auth::user()->id)=='yes' || getActiveEmployee(Auth::user()->id)=='yes'): ?>
							<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp <?php echo e(trans('app.Part Sales')); ?></span></a>
						<?php else: ?>
							<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp <?php echo e(trans('app.Purchase')); ?></span></a>
						<?php endif; ?>
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
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_content">
					<ul class="nav nav-tabs bar_tabs" role="tablist">
					<?php if(getActiveCustomer(Auth::user()->id)=='yes' || getActiveEmployee(Auth::user()->id)=='yes'): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
							<li role="presentation" class=""><a href="<?php echo url('/sales_part/list'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.List Of Part Sales')); ?></span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_add')): ?>
							<li role="presentation" class=""><a href="<?php echo url('/sales_part/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Part Sales')); ?></span></a></li>
						<?php endif; ?>
					<?php elseif(getCustomersactive(Auth::user()->id) == 'yes'): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
							<li role="presentation" class="active"><a href="<?php echo url('/sales/list'); ?>"><span class="visible-xs"></span> </span><i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Purchase List')); ?></b></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_add')): ?>
							<li role="presentation" class=""><a href="<?php echo url('/sales_part/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Part Sales')); ?></span></a></li>
						<?php endif; ?>
					<?php endif; ?>
					</ul>
				</div>
				<div class="x_panel table_up_div">
					<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
						<thead>
							<tr>
								<th><?php echo e(trans('app.#')); ?></th>
								<th><?php echo e(trans('app.Bill Number')); ?></th>
								<th><?php echo e(trans('app.Customer Name')); ?></th>
								<th><?php echo e(trans('app.Date')); ?></th>
								<th><?php echo e(trans('app.Part Brand')); ?></th>
								<th><?php echo e(trans('app.Salesman')); ?></th>
								<th><?php echo e(trans('app.Action')); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>   
							<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
							<tr>
								<td><?php echo e($i); ?></td>
								<td><?php echo e($sale->bill_no); ?></td>
								<td><?php echo e(getCustomerName($sale->customer_id)); ?></td>
								<td><?php echo e(date(getDateFormat(),strtotime($sale->date))); ?></td>
								<td><?php echo e(getPart($sale->product_id)->name); ?></td>
								<td><?php echo e(getAssignedName($sale->salesmanname)); ?></td>
								<td>
								<?php if(getUserRoleFromUserTable(Auth::User()->id) == 'admin' || getUserRoleFromUserTable(Auth::User()->id) == 'supportstaff' || getUserRoleFromUserTable(Auth::User()->id) == 'accountant' || getUserRoleFromUserTable(Auth::User()->id) == 'employee'): ?>

									<?php $sales_invoice = getInvoiceNumbers($sale->id); ?>

									<?php if($sales_invoice == "No data"): ?>
										<?php if(Gate::allows('salespart_add')): ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_add')): ?>
											<a href="<?php echo url('invoice/sale_part_invoice/add/'.$sale->id); ?>" ><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.Create Invoice')); ?></button></a>
											<?php endif; ?>
										<?php else: ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
											<a href="<?php echo url('invoice/add/'); ?>" ><button type="button" class="btn btn-round btn-info" disabled><?php echo e(trans('app.View Invoices')); ?></button></a>
											<?php endif; ?>
										<?php endif; ?>

									<?php else: ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
											<button type="button" data-toggle="modal" data-target="#myModal" saleid="<?php echo e($sale->id); ?>" invoice_number="<?php echo e(getInvoiceNumbers($sale->id)); ?>" url="<?php echo url('/sales_part/list/modal'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoices')); ?></button>
										<?php endif; ?>
									<?php endif; ?>
									
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_edit')): ?>
										<a href="<?php echo url('sales_part/edit/'.$sale->id); ?>"><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
									<?php endif; ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_delete')): ?>
										
									<?php endif; ?>

								<?php else: ?>

									<?php $sales_invoice = getInvoiceNumbers($sale->id); ?>
									<?php if($sales_invoice == "No data"): ?>
										<?php if(Gate::allows('salespart_add')): ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_add')): ?>
												<a href="<?php echo url('invoice/sale_part_invoice/add/'.$sale->id); ?>" ><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.Create Invoice')); ?></button></a>
											<?php endif; ?>
										<?php else: ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
												<a href="<?php echo url('invoice/add/'); ?>" ><button type="button" class="btn btn-round btn-info" disabled><?php echo e(trans('app.View Invoices')); ?></button></a>
											<?php endif; ?>
										<?php endif; ?>

									<?php else: ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
											<button type="button" data-toggle="modal" data-target="#myModal" saleid="<?php echo e($sale->id); ?>" invoice_number="<?php echo e(getInvoiceNumbers($sale->id)); ?>" url="<?php echo url('/sales_part/list/modal'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoices')); ?></button>
										<?php endif; ?>
									<?php endif; ?>
										
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_edit')): ?>
										<a href="<?php echo url('sales_part/edit/'.$sale->id); ?>"><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
									<?php endif; ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_delete')): ?>
										
									<?php endif; ?>
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
    });
});
</script>
<script>
$('body').on('click', '.sa-warning', function() {
	var url = $(this).attr('url');
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
		$('.modal-body').html("");
		var saleid = $(this).attr("saleid");
		var invoice_number = $(this).attr("invoice_number");
		var url = $(this).attr('url');
		$.ajax({
			type: 'GET',
			url: url,
			data : {saleid:saleid,invoice_number:invoice_number},
			success: function (data)
			{
				$('.modal-body').html(data.html);
			},
			beforeSend:function(){
				$(".modal-body").html("<center><h2 class=text-muted><b>Loading...</b></h2></center>");
			},
			error: function(e) {
				alert("An error occurred: " + e.responseText);
				console.log(e);	
			}
		});
	});
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/sales_part/list.blade.php ENDPATH**/ ?>
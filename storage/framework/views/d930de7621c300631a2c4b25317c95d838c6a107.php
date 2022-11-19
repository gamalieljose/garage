
<?php $__env->startSection('content'); ?>

<style>
.table>thead>tr>th {
    padding: 12px 2px 12px 4px;
}


</style>

<!-- page content -->
        <div class="right_col" role="main">
			<!--invoice modal-->
			<div id="myModal-job" class="modal fade setTableSizeForSmallDevices" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header"> 
							<a href=""><button type="button" data-dismiss="modal" class="close">&times;</button></a>
							<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Invoice')); ?></h4>
						</div>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>
			<!--Payment modal-->
			<div id="myModal-payment" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">
					<!-- Modal content-->
					<div class="modal-content modal-data">
						
					</div>
				</div>
			</div>
          	<div class="">
           		<div class="page-title">
              		<div class="nav_menu">
            			<nav>
              				<div class="nav toggle">
                				<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp; <?php echo e(trans('app.Invoice')); ?></span></a>
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
								<label for="checkbox-10 colo_success"> 
									<?php echo e(trans('app.Successfully Submitted')); ?>  
								</label>
				   			<?php elseif(session('message')=='Successfully Updated'): ?>
				   				<label for="checkbox-10 colo_success"> 
				   					<?php echo e(trans('app.Successfully Updated')); ?>  
				   				</label>
				   			<?php elseif(session('message')=='Successfully Deleted'): ?>
				   				<label for="checkbox-10 colo_success"> 
				   					<?php echo e(trans('app.Successfully Deleted')); ?>  
				   				</label>
						   	<?php elseif(session('message')=='Successfully Sent'): ?>
						   	<label for="checkbox-10 colo_success"> 
						   		<?php echo e(trans('app.Successfully Sent')); ?>  
						   	</label>
						   	<?php elseif(session('message')=='Error! Something went wrong.'): ?>
						   		<label for="checkbox-10 colo_success"> 
						   			<?php echo e(trans('app.Error! Something went wrong.')); ?>  
						   		</label>
						   	<?php endif; ?>
                		</div>
					</div>
				</div>
				<?php endif; ?>
            	<div class="row" >
					<div class="col-md-12 col-sm-12 col-xs-12" >
            			<div class="x_content">
							<ul class="nav nav-tabs bar_tabs" role="tablist">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
									<li role="presentation" class="active"><a href="<?php echo url('/invoice/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Invoice List')); ?></b></a></li>
								<?php endif; ?>

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_add')): ?>
									<li role="presentation" class=""><a href="<?php echo url('/invoice/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Invoice')); ?></a></li>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_add')): ?>
									<li role="presentation" class="setMarginForAddSalePartInvoiceOnSmallDevice"><a href="<?php echo url('/invoice/sale_part'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add Sale Part Invoice')); ?></a></li>
								<?php endif; ?>
							</ul>
						</div>
			 			<div class="x_panel setMarginForXpanelDivOnSmallDevice">
                  			<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
                      			<thead>
                        			<tr>
										<th>#</th>
										<th><?php echo e(trans('app.Invoice Number')); ?></th>
										<th><?php echo e(trans('app.Customer Name')); ?></th>
										<th><?php echo e(trans('app.Invoice For')); ?></th>
				                        <th><?php echo e(trans('app.Number Plate')); ?></th>
				                        <th><?php echo e(trans('app.Status')); ?></th>
										<th><?php echo e(trans('app.Total Amount')); ?> (<?php echo e(getCurrencySymbols()); ?>)</th>
										<th><?php echo e(trans('app.Paid Amount')); ?> (<?php echo e(getCurrencySymbols()); ?>)</th> 
				                        <th><?php echo e(trans('app.Date')); ?></th>
				                        <th><?php echo e(trans('app.Action')); ?></th>
                        			</tr>
                      			</thead>
                      			<tbody>
								<?php $i = 1; ?>   
					  			<?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="texr-left">
									<td><?php echo e($i); ?></td>
									<td><?php echo e($invoices->invoice_number); ?></td>
									<td><?php echo e(getCustomerName($invoices->customer_id)); ?></td>
									<?php if($invoices->type == 2): ?>
										<td><?php echo e(trans('app.Part')); ?></td>
									<?php else: ?>
										<td><?php if(getVehicleName($invoices->job_card) == null): ?><?php echo e($invoices->job_card); ?>

										<?php else: ?><?php echo e(getVehicleName($invoices->job_card)); ?>

										<?php endif; ?>
										</td>
									<?php endif; ?>
									<td> 
										<?php if($invoices->type == 0): ?>
											<?php echo e(getVehicleNumberPlateFromService($invoices->sales_service_id)??'Not Added'); ?>

										<?php else: ?>
											<?php if($invoices->type == 1): ?>
												<?php echo e(getVehicleNumberPlateFromSale($invoices->sales_service_id)??'Not Added'); ?>

											<?php else: ?>
												<?php echo e('N/A'); ?>

											<?php endif; ?>
										<?php endif; ?>
									</td>
									<td>
										<?php if($invoices->payment_status == 0)
											{ echo"Unpaid"; }
										elseif($invoices->payment_status == 1)
											{ echo"Partially Paid"; }
										elseif($invoices->payment_status == 2)
											{ echo"Paid";}
										else
											{echo"Unpaid";}
										?>
									</td>
									<td><?php echo e(number_format($invoices->grand_total, 2)); ?></td>
									<td><?php echo e(number_format($invoices->paid_amount, 2)); ?></td>
									
									<td><?php echo e(date(getDateFormat(),strtotime($invoices->date))); ?></td>
									
									<td>
									<?php if(getUserRoleFromUserTable(Auth::User()->id) == 'admin' || getUserRoleFromUserTable(Auth::User()->id) == 'supportstaff' || getUserRoleFromUserTable(Auth::User()->id) == 'accountant' || getUserRoleFromUserTable(Auth::User()->id) == 'employee'): ?>
										<?php if($invoices->type != 2): ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
												<button type="button" data-toggle="modal" data-target="#myModal-job" type_id ="<?php echo e($invoices->type); ?>" serviceid="<?php echo e($invoices->sales_service_id); ?>" auto_id = "<?php echo e($invoices->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" sale_url="<?php echo url('/sales/list/modal'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?></button>		
											<?php endif; ?>			
										<?php else: ?>
											<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
												<button type="button" data-toggle="modal" data-target="#myModal-job" type_id ="<?php echo e($invoices->type); ?>" serviceid="<?php echo e($invoices->sales_service_id); ?>" auto_id = "<?php echo e($invoices->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" sale_url="<?php echo url('/sales_part/list/modal'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?></button>	
											<?php endif; ?>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_edit')): ?>
											<a href="<?php echo url('/invoice/list/edit/'.$invoices->id); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>	
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete')): ?>
											<a url="<?php echo url('/invoice/list/delete/'.$invoices->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
										<?php endif; ?>

										<?php if(Gate::allows('invoice_edit') || Gate::allows('invoice_delete')): ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['invoice_edit','invoice_delete'])): ?>
											<button type="button" data-toggle="modal" data-target="#myModal-payment" invoice_id ="<?php echo e($invoices->id); ?>" url="<?php echo url('/invoice/payment/paymentview'); ?>"  class="btn btn-round btn-info Payment"> <?php echo e(trans('app.Payment History')); ?></button>
										
											<?php if($invoices->grand_total == $invoices->paid_amount): ?>
												<a href="<?php echo url('/invoice/pay/'.$invoices->id); ?>" ><button type="button" class="btn btn-round btn-success" disabled ><?php echo e(trans('app.Pay')); ?></button></a>
											<?php elseif($invoices->grand_total == 0): ?>
												<a href="<?php echo url('/invoice/pay/'.$invoices->id); ?>" ><button type="button" class="btn btn-round btn-success" disabled ><?php echo e(trans('app.Pay')); ?></button></a>
											<?php else: ?>
												<a href="<?php echo url('/invoice/pay/'.$invoices->id); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Pay')); ?></button></a>
											<?php endif; ?>
										<?php endif; ?>
										<?php endif; ?>
									<?php elseif(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
											<button type="button" data-toggle="modal" data-target="#myModal-job" type_id ="<?php echo e($invoices->type); ?>" serviceid="<?php echo e($invoices->sales_service_id); ?>" auto_id = "<?php echo e($invoices->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" sale_url="<?php echo url('/sales/list/modal'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?> </button>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_edit')): ?>
											<a href="<?php echo url('/invoice/list/edit/'.$invoices->id); ?>" ><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>	
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_delete')): ?>
											<a url="<?php echo url('/invoice/list/delete/'.$invoices->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
										<?php endif; ?>
								
										<?php  
											$grand_total = $invoices->grand_total; 
											$paid_amount =$invoices->paid_amount;
											$amountdue = $grand_total - $paid_amount; 
										?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
											<button type="button" data-toggle="modal" data-target="#myModal-payment" invoice_id ="<?php echo e($invoices->id); ?>" url="<?php echo url('/invoice/payment/paymentview'); ?>"  class="btn btn-round btn-info Payment"> <?php echo e(trans('app.Payment History')); ?></button>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
										<?php if($amountdue != 0 && $amountdue < 999999 && $updatekey->publish_key != null): ?>
											<script src="https://js.stripe.com/v3/"></script>
											<form method="post" action="<?php echo e(url('invoice/stripe')); ?>" class="medium" id="medium">
												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
												<input type='hidden' name="invoice_amount" value="<?php echo e($amountdue); ?>">
												<input type='hidden' name="invoice_id" value="<?php echo e($invoices->id); ?>">
												<input type='hidden' name="invoice_no" value="<?php echo e($invoices->invoice_number); ?>">
										  
										  		<input type="submit" class="submit2  btn btn-round btn-success" value="<?php echo e(trans('app.Pay')); ?>" data-key="<?php echo e($updatekey->publish_key); ?>" data-email="<?php echo e(getCustomerEmail($invoices->customer_id)); ?>" 
											 		data-name="<?php echo e($logo->system_name); ?>"data-description="Invoice Number - <?php echo e($invoices->invoice_number); ?>" data-amount="<?php echo e($amountdue *100); ?>"  />
											 
										  		<script src="https://checkout.stripe.com/v2/checkout.js"></script>
										  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
										  			
										  		<script>
											 		$(document).ready(function() {
														$('.submit2').on('click', function(event) {
															event.preventDefault();
													
															var $button = $(this),
																$form = $button.parents('form');
															var opts = $.extend({}, $button.data(), {
																token: function(result) {
																	$form.append($('<input>').attr({
																		type: 'hidden',
																		name: 'stripeToken',
																		value: result.id
																	})).submit();
																}
															});
																
															StripeCheckout.open(opts);
														});
											 		});
										  		</script>
											</form>
										<?php elseif($amountdue > 999999): ?>
											<input type="submit" class="btn btn-round btn-success payWarning" value="<?php echo e(trans('app.Pay')); ?>"/>
										<?php else: ?>
											<input type="submit" class="btn btn-round btn-success" value="<?php echo e(trans('app.Pay')); ?>" disabled/>		
										<?php endif; ?>
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
<!-- Delete invoice -->
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

 $('body').on('click', '.payWarning', function() {
	
        swal({   
            title: "Stripe Payment Failed",
			text: "You can not pay more than 999999.99 in a single transaction using card!",   
            type: "warning",   
        });
    }); 
</script>
<script type="text/JavaScript">

	$( document ).ready(function(){
	//view invoice 
	$('body').on('click', '.save', function() {	  
		  $('.modal-body').html("");
			var type_id = $(this).attr("type_id");
			var serviceid = $(this).attr("serviceid");
			var auto_id = $(this).attr("auto_id");
			
			if(type_id == 0 )
			{
				var url = $(this).attr('url');
			}
			else
			{
				var url = $(this).attr('sale_url');
			}
			
		   $.ajax({
		   type: 'GET',
		   url: url,
		
		   data : {serviceid:serviceid,auto_id:auto_id},
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
		
	//view Payment 
	$('body').on('click', '.Payment', function() {	  
	
		  $('.modal-data').html("");
		  
			var invoice_id = $(this).attr("invoice_id");
			
			var url = $(this).attr('url');
			
		   $.ajax({
		   type: 'GET',
		   url: url,
			
		   data : {invoice_id:invoice_id},
		   success: function (data)
			{            
			 
				$('.modal-data').html(data.html);	
			},
			beforeSend:function(){
				$(".modal-data").html("<center><h2 class=text-muted><b>Loading...</b></h2></center>");
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/invoice/list.blade.php ENDPATH**/ ?>
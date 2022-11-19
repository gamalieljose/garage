
<?php $__env->startSection('content'); ?>

<style>
	.select2-container {
		width: 100% !important;
	}
</style>

<!-- Code Start -->	
	<div class="right_col" role="main">
        <div class="">
            <div class="page-title">
               <div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Invoice')); ?></span></a>
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
			</div>
        </div>
		<div class="x_content">
         	<ul class="nav nav-tabs bar_tabs" role="tablist">
         		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/invoice/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Invoice List')); ?></a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/invoice/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Invoice')); ?></b></a></li>
				<?php endif; ?>
        	</ul>
		</div>
        <div class="row">
          	<div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="x_panel">
               		<div class="x_content">
                		<form method="post" id="form_add" action="<?php echo e(url('/invoice/store')); ?>" enctype="multipart/form-data"  name="Form" class="form-horizontal upperform saleAddForm" >
							<div class="col-md-12 col-xs-12 col-sm-12">
				  				<h4><b><?php echo e(trans('app.Invoice Details')); ?></b></h4><hr>
							</div>

							<div class="row form-group" id="getid">
								<div class="col-md-12 col-sm-12 col-xs-12">
								  	<div class="col-md-6 col-sm-6 col-xs-12 my-form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Invoice For')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="Invoice_type" class="form-control invoicetype" sales_url="<?php echo url('invoice/sales_customer'); ?>"  >
												<option value=""><?php echo e(trans('app.Select Type')); ?></option>
												<option value="0"><?php echo e(trans('app.Service Invoice')); ?></option>
												<option value="1"><?php echo e(trans('app.Sales Invoice')); ?></option>
											</select>
										</div>
								  	</div>
								</div>
							</div>

            				<div id="form_fields" style="display:none">
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Invoice Number')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" name="Invoice_Number" class="form-control" value="<?php echo e($code); ?>" readonly>
							
											<input type="hidden" name="paymentno" value="<?php echo e($codepay); ?>">
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Customer Name')); ?> <label class="color-danger">*</label></label>						
										<div class="col-md-8 col-sm-8 col-xs-12 ">
											<select name="Customer" class="form-control select_cus customer_name" id="customer_select_box" customer_url="<?php echo url('invoice/get_jobcard_no'); ?>" vehicle_url ="<?php echo url('invoice/get_vehicle'); ?>" required >
											<?php if(!empty($customer)): ?>
													<option><?php echo e(trans('app.Select Customer')); ?></option>
												<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($customers->customer_id); ?>"><?php echo getCustomerName($customers->customer_id);//echo $customers->name.' '.$customers->lastname; ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											<!-- if redirect from jobcard list -->
											<?php if(!empty($customer_job)): ?>
												<option value="<?php echo e($customer_job->customer_id); ?>" id="jobcard_list_job" selected><?php echo getCustomerName($customer_job->customer_id);?></option>
											<?php endif; ?>
											
											<!-- if redirect from sales list -->
											<?php if(!empty($tbl_sales)): ?>
												<option value="<?php echo e($tbl_sales->customer_id); ?>" id="sales_list_id" selected><?php echo getCustomerName($tbl_sales->customer_id);?></option>
											<?php endif; ?>
											</select>
										</div>
									</div>
                				</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group" id="job" style="display:none">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="job_card"><?php echo e(trans('app.Jobcard Number')); ?> <label class="color-danger">*</label></label>						
										
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="Job_card" id="jobcard" class="form-control job_number" job_url="<?php echo url('invoice/get_service_no'); ?>" required>
								
											<?php if(!empty($customer_job)): ?>
												<option value="<?php echo $customer_job->job_no;?>" class="job_no" selected><?php echo $customer_job->job_no; ?></option>
											<?php endif; ?>
											</select>
										</div>
									</div>
									<?php if(!empty($customer_job)): ?>
										<input type="hidden" name="jobcard_no"  value="<?php echo e($customer_job->id); ?>">
										<input type="hidden" name="Invoice_type"  value="<?php echo e(0); ?>">
									<?php elseif(!empty($tbl_sales)): ?>
										<input type="hidden" name="jobcard_no"  value="<?php echo e($tbl_sales->id); ?>">
										<input type="hidden" name="Invoice_type"  value="<?php echo e(1); ?>">
									<?php else: ?>						
									  <input type="hidden" name="jobcard_no" class="servi_id" value="">
									<?php endif; ?>

									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group" id="vehicle" style="display:none">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="job_card"><?php echo e(trans('app.Select Vehicle')); ?> <label class="color-danger">*</label></label>						
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="Vehicle" id="vhi" class="form-control vehi_name" vehicle_amt="<?php echo url('invoice/get_vehicle_total'); ?>" required>
												<?php if(!empty($tbl_sales)): ?>
													<option value="<?php echo $tbl_sales->vehicle_id;?>"class="vehi_id" selected><?php echo getModelName($tbl_sales->vehicle_id); ?></option>
												<?php endif; ?>
											</select>
										</div>
									</div>		  

									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                    					<label class="control-label col-md-4 col-sm-4 col-xs-12 currency" for="cus_name"><?php echo e(trans('app.Total Amount')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>						
                    					
                    					<div class="col-md-8 col-sm-8 col-xs-12 ">
                        					<?php if(!empty($tbl_sales)): ?>							
												<?php    
													$price_sales= $tbl_sales->price;
													$total_sales= $total_rto + $price_sales;
												?>
												<input type="text" name="Total_Amount" class="form-control ttl_amount" value="<?php echo e($total_sales); ?>" readonly>
											
											<?php elseif(!empty($total_amount)): ?>
											
												<input type="text" name="Total_Amount" class="form-control ttl_amount" value="<?php echo e($total_amount); ?>" readonly>
											<?php else: ?>
											
												<input type="text" name="Total_Amount" class="form-control ttl_amount" value="" readonly>
											<?php endif; ?>
										</div>
									</div>				  					
			    				</div>
				
								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Date"><?php echo e(trans('app.Invoice Date')); ?> <label class="color-danger">*</label></label>
							
										<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker" >
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
											<input type="text"  name="Date" autocomplete="off" id="date_of_birth" class="form-control invoiceDate" placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required >
										</div>
				  					</div>
					 				
					 				<div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Discount (%)')); ?> </label>
                    					<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" maxlength="3"  name="Discount" class="form-control discount" id="disc">
                    					</div>
                  					</div>					 				
				  				</div>

								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Details')); ?></label>						
				                        <div class="col-md-8 col-sm-8 col-xs-12">
											<textarea name="Details" class="form-control"></textarea>
				                        </div>
				                    </div>
				  					
                  					<div class="col-md-6 col-sm-6 col-xs-12 form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Tax')); ?>	</label>						
										<div class="col-md-8 col-sm-8 col-xs-12">
											<table>
												<tbody>
												<?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td>
															<input type="checkbox" id="tax" class="checkbox-inline check_tax sele_tax myCheckbox" name="Tax[]" value="<?php 
															echo $taxes->taxname.' '.$taxes->tax;?>" taxrate="<?php echo e($taxes->tax); ?>" style="height:20px; width:20px; margin-right:5px; position: relative; top: 6px; margin-bottom: 12px;" >
															
															<?php 
															echo $taxes->taxname.'&nbsp'.$taxes->tax; ?>%
														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</tbody>
											</table>
										</div>
			                        </div>
			                    </div>

								<div class="col-md-12 col-sm-12 col-xs-12 form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                    					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Status')); ?> <label class="color-danger">*</label></label>						
                    					<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="Status" class="form-control paymentStatusSelect" required>
												<option value=""><?php echo e(trans('app.Select Payment Status')); ?></option>
												<option value="1"><?php echo e(trans('app.Half Paid')); ?></option>
												<option value="2"><?php echo e(trans('app.Full Paid')); ?></option>
												<option value="0"><?php echo e(trans('app.Unpaid')); ?></option>
											</select>
                    					</div>
                  					</div>

									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group paymentTypeMainDiv">
                    					<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Payment Type')); ?> <label class="color-danger">*</label></label>
                    					<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="Payment_type" class="form-control paymentType">
												<option value=""><?php echo e(trans('app.Select Payment Type')); ?></option>
											<?php if(!empty($tbl_payments)): ?>
												<?php $__currentLoopData = $tbl_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_paymentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($tbl_paymentss->id); ?>"><?php echo e($tbl_paymentss->payment); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</select>
                    					</div>
                  					</div>               									
               	 				</div>

								<div class="col-md-12 col-sm-12 col-xs-12 form-group">   
								  	<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group paidAmountMainDiv">
			                        	<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Paid Amount')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>			
			                        	<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" name="paidamount" class="form-control paidamount"   >
			                        	</div>
			                      	</div>
			                    
								  	<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
			                        	<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cus_name"><?php echo e(trans('app.Grand Total')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>						
				                        <div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text"  id="grandtotal" name="grandtotal" class="form-control grandtotal" readonly >
				                        </div>
			                      	</div>
								</div>
			                </div>

	                	<!-- Start Custom Field, (If register in Custom Field Module)  -->
							<?php if(!empty($tbl_custom_fields)): ?>
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Custom Fields')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
								<?php
									$subDivCount = 0;
								?>
								<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCounts => $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php 
									if($tbl_custom_field->required == 'yes')
									{
										$required="required";
										$red="*";
									}else{
										$required="";
										$red="";
									}

									$subDivCount++;
								?>
									<?php if($myCounts%2 == 0): ?>
										<div class="col-md-12 col-sm-6 col-xs-12">
									<?php endif; ?>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">				
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="account-no"><?php echo e($tbl_custom_field->label); ?> <label class="text-danger"><?php echo e($red); ?></label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
										<?php if($tbl_custom_field->type == 'textarea'): ?>
											<textarea  name="custom[<?php echo e($tbl_custom_field->id); ?>]" class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" maxlength="100" <?php echo e($required); ?>></textarea>
										<?php elseif($tbl_custom_field->type == 'radio'): ?>
											
											<?php
												$radioLabelArrayList = getRadiolabelsList($tbl_custom_field->id)
											?>
											<?php if(!empty($radioLabelArrayList)): ?>
											<div style="margin-top: 5px;">
												<?php $__currentLoopData = $radioLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]" value="<?php echo e($k); ?>" <?php if($k == 0) {echo "checked"; } ?> ><?php echo e($val); ?> &nbsp;
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
											<?php endif; ?>
										<?php elseif($tbl_custom_field->type == 'checkbox'): ?>
											
											<?php
												$checkboxLabelArrayList = getCheckboxLabelsList($tbl_custom_field->id);
												$cnt = 0;
											?>

											<?php if(!empty($checkboxLabelArrayList)): ?>
											<div style="margin-top: 5px;">
												<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"> <?php echo e($val); ?> &nbsp;
												<?php $cnt++; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
												<input type="hidden" name="checkboxCount" value="<?php echo e($cnt); ?>">
											<?php endif; ?>											
										<?php elseif($tbl_custom_field->type == 'textbox' || $tbl_custom_field->type == 'date'): ?>
											<input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]"  class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" maxlength="30" <?php echo e($required); ?>>
										<?php endif; ?>
										</div>
									</div>
									<?php if($myCounts%2 != 0): ?>
										</div>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php 
									if ($subDivCount%2 != 0) {
										echo "</div>";
									}
								?>				
							<?php endif; ?>
						<!-- End Custom Field -->

				  			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                 
                  			<div class="form-group col-md-12 col-sm-12 col-xs-12">
                    			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
                     				<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
                      				<button type="submit" class="btn btn-success submit submitButton" ><?php echo e(trans('app.Submit')); ?></button>
                    			</div>
                  			</div>
                  		</form>
					</div>
				</div>                
          	</div>	
        </div>
    </div>	
   

<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<!--datetimepicker -->
	<script>
    $('.datepicker').datetimepicker({
       format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
    });
	</script>
	
	<!--For Tax Validation -->
	
<script type="text/javascript">
		$(document).ready(function(){
			
			$(document).ready(function(){
			// Initialize select2
			$("#selUser").select2();
			}); 
	
		$('#form_add').submit(function(){
			var dis = $('#disc').val();
	
			if(dis > 100)
			{
				//alert('Percentage must be less than or equal to 100');
				swal({   
						title: "Discount Rate",
						text: 'Percentage must be less than or equal to 100'
					});
				return false;
			}
			
        });
    });
</script>
	
	<!-- For JobCard Number -->
	<script>
	$(document).ready(function(){
		$('body').on('change','.select_cus',function(){
			
			var type = $(".invoicetype option:selected").val();
			
			if(type == 0)
			{
				var url = $(this).attr('customer_url');
				var cus_name = $('.select_cus :selected').val();
				
				$.ajax({
					type:'GET',
					url:url,
					data:{ cus_name:cus_name },
					
					success:function(response)
					{
						if($.trim(response) == '')
						{
							//alert("Invoice is already created...");
							swal({   
								title: "Invoice Alert",
								text: 'Invoice is already created...'
							});

							$('.job_number').html('<option value="">Select Jobcard</option>');
							return false;
						}
						$('.job_number').html('<option value="">Select Jobcard</option>');
						$('.job_number').append(response);
						$('.ttl_amount').val('0');
						$('#grandtotal').val('0');
					},
					error:function(e)
					{
						console.log(e);
					}
				});
			}
			else
			{
				var vehi_url = $(this).attr('vehicle_url');
				var cus_name = $('.select_cus :selected').val();
				$.ajax({
					type:"GET",
					url:vehi_url,
					data:{ cus_name:cus_name },
					success:function(response)
					{
						
						if($.trim(response) == '')
						{
							//alert("Invoice is already created...");
							swal({   
								title: "Invoice Alert",
								text: 'Invoice is already created...'
							});

							$('.vehi_name').html('<option value="">Select Vehicle</option>');
							return false;
						}
						$('.vehi_name').html('<option value="">Select Vehicle</option>');
						$('.vehi_name').append(response);
						$('.ttl_amount').val('0');
						$('#grandtotal').val('0');
					},
					error:function(e)
					{
						console.log(e);
					}
				});
			}
			
		});
		
	});
	</script>
	
	<script>
	$(document).ready(function(){
		//change jobcard number
		$('body').on('change','.job_number',function(){
			
			var url = $(this).attr('job_url');
			
			var job_no = $('.job_number :selected').val();

			$.ajax({
				type:'GET',
				url:url,
				data:{ job_no:job_no },
				
				success:function(response)
				{					
					$('.ttl_amount').val(response[1]);
					$('.servi_id').val(response[0]);
					
					var total = $('.ttl_amount').val();
					var disc = $('#disc').val();
					if(disc != '')
					{
					 var discount= ( parseFloat(total) * parseFloat(disc)) / 100;
					 
					}
					else
					{
						var discount = 0;
					}
					
					var final = 0;
						$('.myCheckbox:checked').each(function(){        
							var values = $(this).attr('taxrate');
							final = parseFloat(values) + parseFloat(final);
						});
						
						var totalamount = parseFloat(total) - parseFloat(discount);
						var totaltax = (parseFloat(totalamount) * parseFloat(final)) / 100;
						var grandtotal = parseFloat(totalamount) + parseFloat(totaltax);
					$('#grandtotal').val(grandtotal);
					
					
				},
				error:function(e)
				{
					console.log(e);
				}
			});
		});
		
		//change vehicle name 
		$('body').on('change','.vehi_name',function(){
			
			var vehicle_url = $(this).attr('vehicle_amt');
			var vehi_id = $('.vehi_name :selected').val();
			
			$.ajax({
				type:'GET',
				url:vehicle_url,
				data:{ vehi_id:vehi_id },
				
				success:function(response)
				{
					
					$('.ttl_amount').val(response[1]);
					$('.servi_id').val(response[0]);
					var total = $('.ttl_amount').val();
					var disc = $('#disc').val();
					if(disc != '')
					{
					 var discount= ( parseFloat(total) * parseFloat(disc)) / 100;
					 
					}
					else
					{
						var discount = 0;
					}
					
					var final = 0;
						$('.myCheckbox:checked').each(function(){        
							var values = $(this).attr('taxrate');
							final = parseFloat(values) + parseFloat(final);
						});
						
						var totalamount = parseFloat(total) - parseFloat(discount);
						var totaltax = (parseFloat(totalamount) * parseFloat(final)) / 100;
						var grandtotal = parseFloat(totalamount) + parseFloat(totaltax);
					$('#grandtotal').val(grandtotal);	
				},
				error:function(e)
				{
					console.log(e);
				}
			});
		});
		
		
		/*<!-- on keyup in discount  -->*/

		$('body').on('keyup','#disc',function(){
		
				var total1 = $('.ttl_amount').val();
				if(total1 != '')
				{
					var total =total1;
				}
				else
				{
					var total =0;
				}
					var disc = $('#disc').val();
					if(disc != '')
					{
					 var discount= ( parseFloat(total) * parseFloat(disc)) / 100;
					 
					}
					else
					{
						var discount = 0;
					}
					
					var final = 0;
						$('.myCheckbox:checked').each(function(){        
							var values = $(this).attr('taxrate');
							final = parseFloat(values) + parseFloat(final);
						});
						
						var totalamount = parseFloat(total) - parseFloat(discount);
						var totaltax = (parseFloat(totalamount) * parseFloat(final)) / 100;
						var grandtotal = parseFloat(totalamount) + parseFloat(totaltax);
						
					$('#grandtotal').val(grandtotal); 
		});
		// changes taxt
		$('body').on( 'click','.myCheckbox', function(){
		
			var total1 = $('.ttl_amount').val();
				if(total1 != '')
				{
					var total =total1;
				}
				else
				{
					var total =0;
				}
					var disc = $('#disc').val();
					if(disc != '')
					{
					 var discount= ( parseFloat(total) * parseFloat(disc)) / 100;
					 
					}
					else
					{
						var discount = 0;
					}
					
					var final = 0;
						$('.myCheckbox:checked').each(function(){        
							var values = $(this).attr('taxrate');
							final = parseFloat(values) + parseFloat(final);
						});
						
						var totalamount = parseFloat(total) - parseFloat(discount);
						var totaltax = (parseFloat(totalamount) * parseFloat(final)) / 100;
						var grandtotal = parseFloat(totalamount) + parseFloat(totaltax);
						
					$('#grandtotal').val(grandtotal); 
		});
		
		
	});
</script>

<script>
$(document).ready(function(){
	
		//-------if redirect from jobcard list-------
		var sales_list_id = $('#sales_list_id').val();
		
		if(sales_list_id != null)
		{
			$("#form_fields").show();
			$("#vehicle").show();
			$("#job").hide();
			$("#getid").hide();
			$("#vhi").removeAttr('required',true );
			$("#jobcard").attr('required',false );
		}
		//-------if redirect from jobcard list-------
		var job_list_no = $('#jobcard_list_job').val();	
		if(job_list_no != null)
		{
			$("#form_fields").show();
			$("#vehicle").hide();
			$("#getid").hide();
			$("#job").show();
			$("#vhi").removeAttr('required', false);
			$("#jobcard").attr('required', true);
		}
		
		
		var  ttl_amount = $('.ttl_amount').val();
		var  ttl_amount1 = $('#grandtotal').val(ttl_amount);
		
		//--------------------------------------------
		$('body').on('change','.invoicetype',function(){
			
			var type = $(".invoicetype option:selected").val();
			$('#form_fields').slideDown(900);
			if(type == 0)
			{
				$("#vehicle").hide();
				$("#job").show();
				$("#vhi").removeAttr('required', false);
				$("#jobcard").attr('required', true);
			}
			else
			{
				$("#job").hide();
				$("#vehicle").show();
				$("#jobcard").removeAttr('required', false);
				$("#vhi").attr('required', true);
			}
			var sales_url = $(this).attr('sales_url');
			
			$.ajax({
				type:'GET',
				url:sales_url,
				data:{ type:type },
				success:function(response)
				{
					$('.customer_name').html("");
					$('.customer_name').html('<option value=""><?php echo e(trans('app.Select Customer')); ?></option>');
					$('.customer_name').append(response);
				},
				error:function(e)
				{
					console.log(e);
				}
			});
		});
			
});
</script>


<!-- Customer auto search using select2 package -->
<script>
	$(document).ready(function(){
   		// Initialize select2
   		$("#customer_select_box").select2();
   });
</script>

<script>
	$(document).ready(function(){
			var type = $(".invoicetype option:selected").val();
			if (type == null)
			{
			}
			else{
				$('#customer_select_box').removeClass("select_customer_auto_search");
			}
	});
</script>

<!-- When option selected as an unpaid after paid amount textbox is disable -->
<script>
	$('body').on('change','.paymentStatusSelect',function(){

		var statusValue = $('select[name=Status]').val();
		var grandTotalValue = $('.grandtotal').val();

		if (statusValue != null) 
		{
			if (statusValue == 1) {
				$('.paidAmountMainDiv').css({"display":""});
				$('.paymentTypeMainDiv').css({"display":""});
				$('.paidamount').val(grandTotalValue / 2);
			}
			else if (statusValue == 2){				
				$('.paidAmountMainDiv').css({"display":""});
				$('.paymentTypeMainDiv').css({"display":""});
				$('.paidamount').val(grandTotalValue);
			}
			else if (statusValue == 0)			{
				$('.paidAmountMainDiv').css({"display":"none"});
				$('.paymentTypeMainDiv').css({"display":"none"});
				$('.paidamount').val("");
				$('.paymentType').val("");						
			}
		}
	});

	/* discount field accept only numbers */
	$('body').on('keyup','.discount', function(){

		var discountAmt = $(this).val();
		var rgx = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;

		if (discountAmt > 100) {
			$(this).val(0);
		}
		else if(!discountAmt.replace(/\s/g, '').length){
			$(this).val("");
		}
		else if (!rgx.test(discountAmt)){
			$(this).val("");
		}
	});


	//paid amount
	$('body').on('keyup','.paidamount',function(){

		var paidamount = $(this).val();
		var totalgrand = $('#grandtotal').val();
		var statusValue = $('select[name=Status]').val();

		var rgs = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;

		if (statusValue == 1) {
			if (parseInt(paidamount) > parseInt(totalgrand)) {
				$(this).val(totalgrand/2);
				//alert("Please pay half or less than grand total amount, because you select half pay");
				swal({   
					title: "Pay Amount",
					text: 'Please pay half or less than grand total amount, because you select half pay'
				});
			}
			else if(parseInt(paidamount) == parseInt(totalgrand)){
				$(this).val(totalgrand/2);
				//alert("Please pay half or less than grand total amount, because you select half pay");
				swal({   
					title: "Pay Amount",
					text: 'Please pay half or less than grand total amount, because you select half pay'
				});
			}
			else if(parseInt(paidamount) == 0){
				$(this).val(totalgrand/2);
				swal({   
					title: "Pay Amount",
					text: 'Please pay half or less than grand total amount, because you select half pay'
				});
			}
			else if(!paidamount.replace(/\s/g, '').length){
				$(this).val("");
				/*swal({   
					title: "Invalid Input Alert",
					text: 'Please enter only numeric data'
				});*/
			}
			else if (!rgs.test(paidamount)){
				$(this).val("");
				/*swal({   
					title: "Invalid Input Alert",
					text: 'Please enter only numeric data'
				});*/
			}
		}
		else if(statusValue == 2){
			if (parseInt(paidamount) > parseInt(totalgrand)) {
				$(this).val(totalgrand);
				//alert("Please pay only grand total amount, because you select full pay");
				swal({   
					title: "Pay Amount",
					text: 'Please pay only grand total amount, because you select full pay'
				});
			}
			else if(parseInt(paidamount) < parseInt(totalgrand)){
				$(this).val(totalgrand);
				//alert("Please pay only grand total amount, because you select full pay");
				swal({   
					title: "Pay Amount",
					text: 'Please pay only grand total amount, because you select full pay'
				});
			}
			else if(parseInt(paidamount) == 0){
				$(this).val(totalgrand/2);
				swal({   
					title: "Pay Amount",
					text: 'Please pay only grand total amount, because you select full pay'
				});
			}
			else if(!paidamount.replace(/\s/g, '').length){
				$(this).val("");
				/*swal({   
					title: "Invalid Input Alert",
					text: 'Please enter only numeric data'
				});*/
			}
			else if (!rgs.test(paidamount)){
				$(this).val("");
				/*swal({   
					title: "Invalid Input Alert",
					text: 'Please enter only numeric data'
				});*/
			}
		}

		/*if(parseInt(paidamount) <= parseInt(totalgrand))
		{
			
		}
		else{
			swal({   
				title: "Pay Amount",
				text: 'Please enter an amount less than total amount'  

			});
			var paidamount = $(this).val('');		
			return false;					
		}*/
				
	});

</script>

<script>
	/*If select box have value then error msg and has error class remove*/
	$('body').on('change','.invoiceDate',function(){

		var dateValue = $(this).val();

		if (dateValue != null) {
			$('#date_of_birth-error').css({"display":"none"});
		}

		if (dateValue != null) {
			$(this).parent().parent().removeClass('has-error');
		}
	});

	$(document).ready(function(){

		$('.customer_name').on('change',function(){

			var customerValue = $('select[name=Customer]').val();
			
			if (customerValue != null) {
				$('#customer_select_box-error').css({"display":"none"});
			}

			if (customerValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
	});
</script>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\InvoiceAddEditFormRequest', '#form_add');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.submitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.saleAddForm').submit(function () {
        $('.submitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.saleAddForm').bind('invalid-form.validate', function () {
      $('.submitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/invoice/add.blade.php ENDPATH**/ ?>
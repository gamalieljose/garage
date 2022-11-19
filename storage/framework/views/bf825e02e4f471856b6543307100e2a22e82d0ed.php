
<?php $__env->startSection('content'); ?>
<style>
.bootstrap-datetimepicker-widget table td span {
    width: 0px!important;
}
.table-condensed>tbody>tr>td {
    padding: 3px;
}
</style>

<!-- page content -->
	<div class="right_col" role="main">
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
		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs" role="tablist">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/service/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><?php echo e(trans('app.Services List')); ?></a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_edit')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/service/list/edit/'.$service->id ); ?>"><span class="visible-xs"></span><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i><b><?php echo e(trans('app.Edit Services')); ?></b></a></li>
				<?php endif; ?>
			</ul>
		</div>
            
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<form id="ServiceEdit-Form" method="post" action="update/<?php echo e($service->id); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">

							<div class="form-group">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Jobcard Number')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
									
										<input type="text"  name="jobno"  class="form-control" value="<?php echo e($service->job_no); ?>" placeholder="<?php echo e(trans('app.Enter Job No')); ?>" readonly>
									</div>
								</div>

								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Customer Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<select name="Customername" id="sup_id" class="form-control select_customer_auto_search" required>
											<option value=""><?php echo e(trans('app.Select Select Customer')); ?></option>

											<?php if(!empty($customer)): ?>
												<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												 <option value="<?php echo e($customers->id); ?>" <?php if($customers->id==$service->customer_id){echo"selected"; }?>><?php echo e(getCustomerName($customers->id)); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
						  
							<div class="form-group" style="margin-top: 20px;">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Vehicle Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										  <select  name="vehicalname" class="form-control" >
											 <option value=""><?php echo e(trans('app.Select vehicle Name')); ?></option>
											  <?php if(!empty($vehical)): ?>
													<?php $__currentLoopData = $vehical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($vehicals->id); ?>" <?php if($vehicals->id==$service->vehicle_id){ echo"selected"; }?>><?php echo e($vehicals->modelname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>	
										  </select>
									 </div>
								</div>

								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Date')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="p_date" name="date" autocomplete="off"
										value="<?php  echo date( getDateFormat().' H:i:s',strtotime($service->service_date)); ?>" class="form-control" placeholder="<?php echo getDatepicker();  echo " hh:mm:ss"?>" onkeypress="return false;" required>
									</div>
								</div>
							</div>
						  
							<div class="form-group" style="margin-top: 15px;">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Title')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" name="title" placeholder="<?php echo e(trans('app.Enter Title')); ?>" maxlength="30" value="<?php echo e($service->title); ?>" class="form-control">
									</div>
								</div>

								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Assign To')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<select id="AssigneTo" name="AssigneTo"  class="form-control" required>
											<option value=""><?php echo e(trans('app.Select Assign To')); ?></option>
											<?php if(!empty($employee)): ?>
											<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($employees->id); ?>" <?php if($employees->id==$service->assign_to){ echo"selected";}?>> <?php echo e($employees->name); ?></option>	
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
						  
							<div class="form-group" style="margin-top: 15px;">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Repair Category')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<select name="repair_cat"  class="form-control" required>
											<option value=""><?php echo e(trans('app.-- Select Repair Category--')); ?></option>
											<option value="breakdown" <?php if($service->service_category=='breakdown') { echo 'selected'; } ?> ><?php echo e(trans('app.Breakdown')); ?></option>
											<option value="booked vehicle" <?php if($service->service_category=='booked vehicle') { echo 'selected'; } ?>><?php echo e(trans('app.Booked Vehicle')); ?></option>	
											<option value="repeat job" <?php if($service->service_category=='repeat job') { echo 'selected'; } ?>><?php echo e(trans('app.Repeat Job')); ?></option>	
											<option value="customer waiting" <?php if($service->service_category=='customer waiting') { echo 'selected'; } ?>><?php echo e(trans('app.Customer Waiting')); ?></option>	
										</select>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12"><?php echo e(trans('app.Service Type')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<label class="radio-inline">
											<input type="radio" name="service_type" id="free"  value="free" required <?php if($service->service_type=='free') { echo 'checked'; } ?>><?php echo e(trans('app.Free')); ?></label>
										<label class="radio-inline">
											<input type="radio" name="service_type" id="paid"  value="paid" required <?php if($service->service_type=='paid') { echo 'checked'; } ?>> <?php echo e(trans('app.Paid')); ?></label>
									</div>
								</div>
							</div>
						  
							<div class="form-group" style="margin-top: 15px;">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Details')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<textarea name="details"  class="form-control" maxlength="100"><?php echo e($service->detail); ?></textarea> 
									</div>
								</div>

								<div id="dvCharge" style="display: none" class="has-feedback <?php echo e($errors->has('charge') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12 currency" for="last-name"><?php echo e(trans('app.Fix Service Charge')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  id="charge_required" name="charge" class="form-control fixServiceCharge" placeholder="<?php echo e(trans('app.Enter Fix Service Charge')); ?>" maxlength="8" value="<?php echo e($service->charge); ?>">
										<?php if($errors->has('charge')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('charge')); ?></strong>
										   </span>
										 <?php endif; ?>
									</div>
								</div> 	
							</div>
							
							<div class="form-group" style="margin-top: 15px;">
								<!-- <div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="reg_no"><?php echo e(trans('app.Registration No.')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" name="reg_no" id="reg_no" placeholder="<?php echo e(trans('app.Enter Registration Number')); ?>" class="form-control" maxlength="15" value="<?php echo e($regi_no); ?>">
									</div>
								</div> -->

							<!-- MOt Test Checkbox Start-->
							<?php if($service->mot_status == 1): ?>
								<div class="motMainDiv">
									<label class="control-label col-md-2 col-sm-2 col-xs-12 motTextLabel" for="" ><?php echo e(trans('app.MOT Test')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="checkbox" name="motTestStatusCheckbox" id="motTestStatusCheckbox" <?php if($service->mot_status==1) { echo 'checked'; } ?>>
									</div>
								</div>
							<?php endif; ?>
							<!-- MOt Test Checkbox End-->
							</div>

						<!-- Custom Filed data value -->
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
												$required = "required";
												$red = "*";
											}else{
												$required = "";
												$red = "";
											}
											
											$tbl_custom = $tbl_custom_field->id;
											$userid = $service->id;
											$datavalue = getCustomDataService($tbl_custom,$userid);

											$subDivCount++;
										?>
											<?php if($myCounts%2 == 0): ?>
												<div class="col-md-12 col-sm-6 col-xs-12">
											<?php endif; ?>
											<div class="form-group col-md-6  col-sm-6 col-xs-12">
												<label class="control-label col-md-4 col-sm-4 col-xs-12" for="account-no"><?php echo e($tbl_custom_field->label); ?> <label class="text-danger"><?php echo e($red); ?></label></label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<?php if($tbl_custom_field->type == 'textarea'): ?>
														<textarea  name="custom[<?php echo e($tbl_custom_field->id); ?>]" class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" maxlength="100" <?php echo e($required); ?>><?php echo e($datavalue); ?></textarea>
													<?php elseif($tbl_custom_field->type == 'radio'): ?>
														<?php
															$radioLabelArrayList = getRadiolabelsList($tbl_custom_field->id)
														?>
														<?php if(!empty($radioLabelArrayList)): ?>
														<div style="margin-top: 5px;">
															<?php $__currentLoopData = $radioLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]" value="<?php echo e($k); ?>"    <?php
																		//$formName = "product";
																		$getRadioValue = getRadioLabelValueForUpdateForAllModules($tbl_custom_field->form_name ,$service->id, $tbl_custom_field->id);

																 	if($k == $getRadioValue) { echo "checked"; }?> 

																> <?php echo e($val); ?> &nbsp;
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</div>
														<?php endif; ?>
													<?php elseif($tbl_custom_field->type == 'checkbox'): ?>
														<?php
															$checkboxLabelArrayList = getCheckboxLabelsList($tbl_custom_field->id)
														?>
														<?php if(!empty($checkboxLabelArrayList)): ?>
															<?php
																$getCheckboxValue = getCheckboxLabelValueForUpdateForAllModules($tbl_custom_field->form_name, $service->id, $tbl_custom_field->id);
															?>
															<div style="margin-top: 5px;">
															<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"
																<?php
																 	if($val == getCheckboxValForAllModule($tbl_custom_field->form_name, $service->id, $tbl_custom_field->id,$val)) 
																 			{ echo "checked"; }
																 	?>
																> <?php echo e($val); ?> &nbsp;
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</div>					
														<?php endif; ?>								
													<?php elseif($tbl_custom_field->type == 'textbox' || $tbl_custom_field->type == 'date'): ?>
														<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>]"  class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" value="<?php echo e($datavalue); ?>" maxlength="30" <?php echo e($required); ?>>
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
						<!-- Custom Filed data value End-->

							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="form-group">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="submit" class="btn btn-success"><?php echo e(trans('app.Update')); ?></button>
								</div>
							</div>

						</form>
					</div>
					
					
				</div>
			</div>
		</div>
           
	</div>

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
	
<!--Datetime picker -->
	<script>
    $('.datepicker').datetimepicker({
        format: "<?php echo getDatetimepicker(); ?>",
		autoclose:1,
    });
	</script>
<!--Service type free and paid -->	
	<script>
    $(function() {
        $("input[name='service_type']").html(function () {
            if ($("#paid").is(":checked")) {
                $("#dvCharge").show();
                $("#charge_required").attr('required', true);
            } else {
                $("#dvCharge").hide();
				$("#charge_required").removeAttr('required', false);
            }
        });
		
		$("input[name='service_type']").click(function () {
            if ($("#paid").is(":checked")) {
                $("#dvCharge").show();
                $("#charge_required").attr('required', true);
            } else {
                $("#dvCharge").hide();
				$("#charge_required").removeAttr('required', false);
            }
        });
    });
</script>

<!-- Using Slect2 make auto searchable dropdown -->
<script>
	$(document).ready(function () {
 		
 		var sendUrl = '<?php echo e(url('service/customer_autocomplete_search')); ?>';
    	
    	$('.select_customer_auto_search').select2({
        	ajax: {
            	url: sendUrl,
            	dataType: 'json',
            	delay: 250,
            	processResults: function (data) {
                	return {
                    	results: $.map(data, function (item) {
                        	return {
                            	text: item.name +" "+ item.lastname,
                            	id: item.id
                        	};
                    	})
                	};
            	},
            	cache: true
        	}
    	});
	});

	$(document).ready(function(){
   		// Initialize select2
   		$(".select_customer_auto_search").select2();
   	});
</script>


<script>
	/*If date field have value then error msg and has error class remove*/
	$('body').on('change','#p_date',function(){

		var pDateValue = $(this).val();

		if (pDateValue != null) {
			$('#p_date-error').css({"display":"none"});
		}

		if (pDateValue != null) {
			$(this).parent().parent().removeClass('has-error');
		}
	});
	

	/*If select box have value then error msg and has error class remove*/
	$(document).ready(function(){
		$('#sup_id').on('change',function(){

			var supplierValue = $('select[name=Customername]').val();
			
			if (supplierValue != null) {
				$('#sup_id-error').css({"display":"none"});
			}

			if (supplierValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
	});


	/*Inside fix service text box only enter numbers data*/	
	$('.fixServiceCharge').on('keyup', function(){
	 
		var valueIs = $(this).val();

	 	if (/\D/g.test(valueIs))
		{
			$(this).val("");
		}
		else if(valueIs == 0)
		{
			$(this).val("");
		}
	});
</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\ServiceAddEditFormRequest', '#ServiceEdit-Form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views//service/edit.blade.php ENDPATH**/ ?>
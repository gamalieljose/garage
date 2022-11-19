
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
		<div class="x_content">
            <ul class="nav nav-tabs bar_tabs" role="tablist">
            	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/customer/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Customer List')); ?></a></li>
				<?php endif; ?>

				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_edit')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/customer/list/edit/'.$editid); ?>"><span class="visible-xs"></span><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i> <b><?php echo e(trans('app.Edit Customer')); ?></b></a></li>
				<?php endif; ?>
				
				<?php if(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
					<?php if(!Gate::allows('customer_edit')): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_owndata')): ?>
							<li role="presentation" class="active"><a href="<?php echo url('/customer/list/edit/'.$editid); ?>"><span class="visible-xs"></span><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i> <b><?php echo e(trans('app.Edit Customer')); ?></b></a></li>
						<?php endif; ?>
					<?php endif; ?>	
				<?php endif; ?>
            </ul>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
						<form id="demo-form2" action="update/<?php echo e($customer->id); ?>" method="post" 
					          enctype="multipart/form-data" class="form-horizontal form-label-left input_mask">
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Personal Information')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
						
							<div class="col-md-12 col-sm-6 col-xs-12">  
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12"  for="firstname"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
									  		<input type="text" id="firstname" name="firstname" placeholder="<?php echo e(trans('app.Enter First Name')); ?>" value="<?php echo e($customer->name); ?>" class="form-control" maxlength="50">
											<?php if($errors->has('firstname')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('firstname')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger lastname">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" id="lastname"  name="lastname" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" value="<?php echo e($customer->lastname); ?>"class="form-control" maxlength="50">
											<?php if($errors->has('lastname')): ?>
									    	<span class="help-block">
										    	<strong><?php echo e($errors->first('lastname')); ?></strong>
									    	</span>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="col-md-12 col-sm-6 col-xs-12">  
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('displayname') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="displayname"><?php echo e(trans('app.Display Name')); ?> <label class="color-danger">*</label> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text"  name="displayname" placeholder="<?php echo e(trans('app.Enter Display Name')); ?>" value="<?php echo e($customer->display_name); ?>" maxlength="25" class="form-control displayname">
											<?php if($errors->has('displayname')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('displayname')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('company_name') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="company_name"><?php echo e(trans('app.Company Name')); ?> <label class="color-danger"></label> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text"  name="company_name" placeholder="<?php echo e(trans('app.Enter Company Name')); ?>" value="<?php echo e($customer->company_name); ?>" maxlength="100" class="form-control companyname">
											<?php if($errors->has('company_name')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('company_name')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-6 col-xs-12">  
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
										<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12 gender">
											<input type="radio"  name="gender" value="0"  <?php if($customer->gender ==0) { echo "checked"; }?> checked>  <?php echo e(trans('app.Male')); ?> 
							  
											<input type="radio" name="gender" value="1" <?php if($customer->gender ==1) { echo "checked"; }?>> <?php echo e(trans('app.Female')); ?>

										</div>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
										<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?></label>
										<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker">
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
											<?php if($customer->birth_date): ?>
												<input type="text" id="datepicker" autocomplete="off" class="form-control" placeholder="<?php echo getDateFormat();?>" value="<?php echo e(date(getDateFormat(),strtotime($customer->birth_date))); ?>" name="dob" onkeypress="return false;"  />
											<?php else: ?>
												<input type="text" id="datepicker" autocomplete="off" class="form-control" placeholder="<?php echo getDateFormat();?>" value="" name="dob" onkeypress="return false;" />
											<?php endif; ?>
										</div>
										<!-- <?php if($errors->has('dob')): ?>
										<span class="help-block">
											<strong style="margin-left:27%;"><?php echo e($errors->first('dob')); ?></strong>
										</span>
										<?php endif; ?> -->
									</div>
								</div>
								
								<div class="col-md-12 col-sm-6 col-xs-12">  
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text"  name="email" placeholder="<?php echo e(trans('app.Enter Email')); ?>" value="<?php echo e($customer->email); ?>" class="form-control" maxlength="50" >
											<?php if($errors->has('email')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('email')); ?></strong>
											</span>
									    	<?php endif; ?>
										</div>
									</div>
								
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="password"><?php echo e(trans('app.Password')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="password"  name="password" placeholder="<?php echo e(trans('app.Enter Password')); ?>" maxlength="20" class="form-control col-md-7 col-xs-12" >
											<?php if($errors->has('password')): ?>
												<span class="help-block">
													<strong><?php echo e($errors->first('password')); ?></strong>
												</span>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="col-md-12 col-sm-6 col-xs-12">  
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12 currency" style=""for="Password"><?php echo e(trans('app.Confirm Password')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="password"  name="password_confirmation" placeholder="<?php echo e(trans('app.Enter Confirm Password')); ?>" class="form-control col-md-7 col-xs-12" maxlength="20">
											<?php if($errors->has('password_confirmation')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger">*</label> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text"  name="mobile" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>" value="<?php echo e($customer->mobile_no); ?>" maxlength="16" minlength="6" class="form-control">
											<?php if($errors->has('mobile')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('mobile')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								</div>
							
								<div class="col-md-12 col-sm-6 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('landlineno') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="landlineno"><?php echo e(trans('app.Landline No')); ?> <label class="color-danger"></label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="text" id="landlineno" name="landlineno" placeholder="<?php echo e(trans('app.Enter LandLine No')); ?>" value="<?php echo e($customer->landline_no); ?>" maxlength="16" minlength="6"  class="form-control">
											<?php if($errors->has('landlineno')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('landlineno')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="image"><?php echo e(trans('app.Image')); ?> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<input type="file" id="image" name="image"  class="form-control chooseImage" >
											<img src="<?php echo e(url('public/customer/'.$customer->image)); ?>"  width="50px" height="50px" class="img-circle imageHideShow" >
											
											<?php if($errors->has('image')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('image')); ?></strong>
											</span>
											<?php endif; ?>
										</div>
									</div>
								</div>
								
								<div class="col-md-12 col-xs-12 col-sm-12 space">
									<h4><b><?php echo e(trans('app.Address')); ?></b></h4>
									<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
								</div>

								<div class="col-md-12 col-sm-6 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="country_id" ><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select class="form-control  select_country" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>">
												<option value="">Select Country</option>
													<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($countrys->id); ?>" <?php if($customer->country_id==$countrys->id){ echo "selected"; }?>><?php echo e($countrys->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select>
										</div>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="state_id"><?php echo e(trans('app.State')); ?> </label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select class="form-control  state_of_country" name="state_id" stateurl="<?php echo url('/getcityfromstate'); ?>">
												<?php if($state != null): ?>
													<?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo $states->id; ?>" <?php if($customer->state_id==$states->id){ echo "selected"; }?>><?php echo $states->name; ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
												<option value=""></option>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="col-md-12 col-sm-6 col-xs-12">
									<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="city"><?php echo e(trans('app.Town/City')); ?></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select class="form-control  city_of_state" name="city">
												<?php if($city != null): ?>	
													<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo $citys->id; ?>" <?php if($customer->city_id==$citys->id){ echo "selected"; }?>><?php echo $citys->name; ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php else: ?>
													<option value=""></option>
												<?php endif; ?>
											</select>
										</div>
									</div>

									<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
										<label class="control-label col-md-4 col-sm-4 col-xs-12" for="address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<textarea class="form-control addressTextarea" id="address" name="address" maxlength="100"><?php echo e($customer->address); ?></textarea>
										</div>
									</div>
								</div>

							<!-- Custom field  -->
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
											$userid = $customer->id;
											$datavalue = getCustomData($tbl_custom,$userid);

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
																	$getRadioValue = getRadioLabelValueForUpdate($customer->id, $tbl_custom_field->id);

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
															$getCheckboxValue = getCheckboxLabelValueForUpdate($customer->id, $tbl_custom_field->id);
														?>
														<div style="margin-top: 5px;">
														<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														
															<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"
															<?php
															 	if($val == getCheckboxVal($customer->id, $tbl_custom_field->id,$val)) 
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
							<!-- Custom field  -->

							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
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

   
<script>
$(document).ready(function(){
	
	$('.select_country').change(function(){
		countryid = $(this).val();
		
		var url = $(this).attr('countryurl');
		$.ajax({
			type:'GET',
			url: url,
			data:{ countryid:countryid },
			success:function(response){
				$('.state_of_country').html(response);
			}
		});
	});
	
	$('body').on('change','.state_of_country',function(){
		stateid = $(this).val();
		
		var url = $(this).attr('stateurl');
		$.ajax({
			type:'GET',
			url: url,
			data:{ stateid:stateid },
			success:function(response){
				$('.city_of_state').html(response);
			}
		});
	});
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<script>
    $('.datepicker').datetimepicker({
       	format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
		endDate: new Date(),
    });

    /*If address have any white space then make empty address value*/
   	$('body').on('keyup', '.addressTextarea', function(){

      	var addressValue = $(this).val();

      	if (!addressValue.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	$('body').on('keyup', '#firstname', function(){

      	var firstName = $(this).val();

      	if (!firstName.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	$('body').on('keyup', '#lastname', function(){

      	var lastName = $(this).val();

      	if (!lastName.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	$('body').on('keyup', '.displayname', function(){

      	var displayName = $(this).val();

      	if (!displayName.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	$('body').on('keyup', '.companyname', function(){

      	var companyName = $(this).val();

      	if (!companyName.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	/*$('body').on('change','.chooseImage',function(){
		var imageName = $(this).val();
		var imageExtension = /(\.jpg|\.jpeg|\.png)$/i;

		if (imageExtension.test(imageName)) {
			$('.imageHideShow').css({"display":""});
		}
		else {
			$('.imageHideShow').css({"display":"none"});
		}		
	});*/	
</script>


<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>

<!-- For form validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\CustomerAddEditFormRequest', '#demo-form2');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/customer/update.blade.php ENDPATH**/ ?>
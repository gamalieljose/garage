
<?php $__env->startSection('content'); ?>

<!-- page content -->	
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Employee')); ?></span></a>
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
			</div>
        </div>
		<div class="x_content">
            <ul class="nav nav-tabs bar_tabs" role="tablist">
            	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/employee/list'); ?>" ><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Employee List')); ?></a></li>
				<?php endif; ?>
			
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/employee/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Employee')); ?></b></a></li>
				<?php endif; ?>
            </ul>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
						<form id="employee_add_form" method="post" action="<?php echo url('employee/store'); ?>" enctype="multipart/form-data"  class="form-horizontal upperform employeeAddForm">
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Personal Information')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
						
							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="firstname"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" id="firstname" name="firstname" value="<?php echo e(old('firstname')); ?>"  placeholder="<?php echo e(trans('app.Enter First Name')); ?>" class="form-control" maxlength="50">
												   <?php if($errors->has('firstname')): ?>
										   <span class="help-block">
											 <strong><?php echo e($errors->first('firstname')); ?></strong>
										   </span>
										 <?php endif; ?>
									</div>
								</div>

								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							   	
							   	<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="lastname"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger">*</label> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" id="lastname" name="lastname"  value="<?php echo e(old('lastname')); ?>" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" class="form-control" maxlength="50">
										
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
									<label for="displayname" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Display Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="displayname" class="form-control" value="<?php echo e(old('displayname')); ?>" placeholder="<?php echo e(trans('app.Enter Display Name')); ?>" maxlength="25"  name="displayname">
										<?php if($errors->has('displayname')): ?>
										   <span class="help-block">
											 <strong><?php echo e($errors->first('displayname')); ?></strong>
										   </span>
										 <?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12 gender">
										<input type="radio"  name="gender" value="1" checked><?php echo e(trans('app.Male')); ?> 
										<input type="radio" name="gender" value="2"><?php echo e(trans('app.Female')); ?>

									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker1">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="date_of_birth" autocomplete="off" class="form-control" placeholder="<?php echo getDatepicker();?>" name="dob" value="<?php echo e(old('dob')); ?>" onkeypress="return false;">

										<!-- <?php if($errors->has('dob')): ?>
										<span id="date_of_birth-error" class="help-block">
											<strong ><?php echo e($errors->first('dob')); ?></strong>
										</span>
										<?php endif; ?> -->
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('app.Enter Email')); ?>"class="form-control" maxlength="50">
										<?php if($errors->has('email')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('email')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="password"><?php echo e(trans('app.Password')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="password" id="password" placeholder="<?php echo e(trans('app.Enter Password')); ?>" name="password"  class="form-control" maxlength="20">

										<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>

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
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>"class="form-control" maxlength="16" minlength="6">
										<?php if($errors->has('mobile')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('mobile')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('landlineno') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="landlineno"><?php echo e(trans('app.Landline No')); ?> <label class="color-danger"></label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="landlineno" name="landlineno" value="<?php echo e(old('landlineno')); ?>" placeholder="<?php echo e(trans('app.Enter LandLine No')); ?>" maxlength="16" minlength="6" class="form-control">
										<?php if($errors->has('landlineno')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('landlineno')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('join_date') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="join_date"><?php echo e(trans('app.Join Date')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="join_date" class="form-control leftdate joinDate" placeholder="<?php echo getDatepicker();?>" value="<?php echo e(old('join_date')); ?>"  name="join_date" readonly>

										<?php if($errors->has('join_date')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('join_date')); ?></strong>
										</span>
										<?php endif; ?>
									</div>								
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="designation"><?php echo e(trans('app.Designation')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="" class="form-control" value="<?php echo e(old('designation')); ?>" name="designation" maxlength="30" placeholder="<?php echo e(trans('app.Designation')); ?>">
										<?php if($errors->has('designation')): ?>
										<span class="help-block" style="color:#a94442;">
											<strong><?php echo e($errors->first('designation')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">	
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('left_date') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="left_date"><?php echo e(trans('app.Left Date')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker2">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="left_date" class="form-control" placeholder="<?php echo getDatepicker();?>"  name="left_date" value="<?php echo e(old('left_date')); ?>" readonly >
									</div>

									<?php if($errors->has('left_date')): ?>
										<span class="help-block" style="margin-left: 27%;">
											<strong><?php echo e($errors->first('left_date')); ?></strong>
										</span>
									<?php endif; ?>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="image"><?php echo e(trans('app.Image')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  	<input type="file" id="image" name="image"  class="form-control chooseImage">
									  	<!-- <?php if($errors->has('image')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('image')); ?></strong>
											</span>
										<?php endif; ?> -->

										<img src="#" id="imagePreview" alt="User Image" class="imageHideShow" style="width: 20%; display: none; padding-top: 8px;">
									</div>
								</div>
							</div>

							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Address')); ?></b></h4>
								<p class="colo-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="country_id"><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control col-md-7 col-xs-12 select_country" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>">
											<option value=""><?php echo e(trans('app.Select Country')); ?></option>
											<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($countrys->id); ?>"><?php echo e($countrys->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="state"><?php echo e(trans('app.State')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control col-md-7 col-xs-12 state_of_country" name="state" stateurl="<?php echo url('/getcityfromstate'); ?>">
										</select>								 
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="city"><?php echo e(trans('app.Town/City')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control col-md-7 col-xs-12 city_of_state" name="city">
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<textarea id="address" name="address" class="form-control addressTextarea" maxlength="100"><?php echo e(old('address')); ?></textarea>
									</div>
								</div>
							</div>
					<!-- Custom field -->
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
													<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"> <?php echo e($val); ?>&nbsp;
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
						<!-- Custom field -->
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="submit" class="btn btn-success employeeSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
    

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>  

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

<!-- For image preview at selected image -->
<script>
	function readUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readUrl(this);
        $("#imagePreview").css("display","block");
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<script>
$(document).ready(function(){
	
	$('.datepicker1').datetimepicker({
        format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
		endDate: new Date(),
    });
	
	
    
		$(".datepicker,.input-group-addon").click(function(){	
		var dateend = $('#left_date').val('');
		
		});
		
		$(".datepicker").datetimepicker({
			format: "<?php echo getDatepicker(); ?>",
			 minView: 2,
			autoclose: 1,
		}).on('changeDate', function (selected) {
			var startDate = new Date(selected.date.valueOf());
		
			$('.datepicker2').datetimepicker({
				format: "<?php echo getDatepicker(); ?>",
				 minView: 2,
				autoclose: 1,
			
			}).datetimepicker('setStartDate', startDate); 
		})
		.on('clearDate', function (selected) {
			 $('.datepicker2').datetimepicker('setStartDate', null);
		})
		
			$('.datepicker2').click(function(){
				
			var date = $('#join_date').val(); 
			if(date == '')
			{
				swal('First Select Join Date');
			}
			else{
				$('.datepicker2').datetimepicker({
				format: "<?php echo getDatepicker(); ?>",
				 minView: 2,
				autoclose: 1,
				})
				
			}
			});
});	
	
</script>

<script>
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

   	$('body').on('keyup', '#displayname', function(){

      	var displayName = $(this).val();

      	if (!displayName.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
   	});

   	/*If date field have value then error msg and has error class remove*/
   	$(document).ready(function(){

   		$('.joinDate').on('change',function(){

			var DateValue = $(this).val();

			if (DateValue != null) {
				$('#join_date-error').css({"display":"none"});
			}

			if (DateValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
   	});
	
	$('body').on('change','.chooseImage',function(){
		var imageName = $(this).val();
		var imageExtension = /(\.jpg|\.jpeg|\.png)$/i;

		if (imageExtension.test(imageName)) {
			$('.imageHideShow').css({"display":""});
		}
		else {
			$('.imageHideShow').css({"display":"none"});
		}		
	});
</script>

<!-- For form field validate -->
<?php echo JsValidator::formRequest('App\Http\Requests\EmployeeAddEditFormRequest', '#employee_add_form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>


<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.employeeSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.employeeAddForm').submit(function () {
        $('.employeeSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.employeeAddForm').bind('invalid-form.validate', function () {
      $('.employeeSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/employee/add.blade.php ENDPATH**/ ?>
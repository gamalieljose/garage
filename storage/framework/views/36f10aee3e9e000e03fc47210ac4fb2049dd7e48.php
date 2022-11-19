
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- page content -->
<style>
.theTooltip {
	    position: absolute!important;
-webkit-transform-style: preserve-3d; transform-style: preserve-3d; -webkit-transform: translate(15%, -50%); transform: translate(15%, -50%);
}
</style>

    <div class="right_col" role="main" style="background-color: #e6e6e6;">
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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/customer/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i> <b><?php echo e(trans('app.Add Customer')); ?></b></a></li>
				<?php endif; ?>
            </ul>
		</div>
		<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
						<form id="demo-form2" action="<?php echo url('/customer/store'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left input_mask customerAddForm">
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Personal Information')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
						
							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('firstname') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="firstname"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" id="firstname" name="firstname" class="firstname form-control" value="<?php echo e(old('firstname')); ?>" placeholder="<?php echo e(trans('app.Enter First Name')); ?>" maxlength="50">
									  <?php if($errors->has('firstname')): ?>
									   <span class="help-block">
										   <strong><?php echo e($errors->first('firstname')); ?></strong>
									   </span>
									 <?php endif; ?>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="lastname"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="lastname" name="lastname" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" value="<?php echo e(old('lastname')); ?>" maxlength="50"
										class="form-control lastname">
										<?php if($errors->has('lastname')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('lastname')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">  
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('displayname') ? ' has-error' : ''); ?> ">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="displayname"><?php echo e(trans('app.Display Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text"  name="displayname" placeholder="<?php echo e(trans('app.Enter Display Name')); ?>" value="<?php echo e(old('displayname')); ?>" class="form-control displayname" maxlength="25">
										<?php if($errors->has('displayname')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('displayname')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('company_name') ? ' has-error' : ''); ?> ">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="company_name"><?php echo e(trans('app.Company Name')); ?><label class="color-danger"></label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text"  name="company_name" placeholder="<?php echo e(trans('app.Enter Company Name')); ?>" value="<?php echo e(old('company_name')); ?>" class="form-control companyname" maxlength="100" >
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
									<label class="control-label col-md-4 col-sm-4 col-xs-12"> <?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12 gender">
										<input type="radio"  name="gender" value="0" checked><?php echo e(trans('app.Male')); ?>

										<input type="radio" name="gender" value="1" > <?php echo e(trans('app.Female')); ?>

									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?>

									</label>
									<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="date_of_birth" autocomplete="off" class="form-control" placeholder="<?php echo getDatepicker();?>"  name="dob" value="<?php echo e(old('dob')); ?>" onkeypress="return false;"  />
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
										<input type="text"  name="email" placeholder="<?php echo e(trans('app.Enter Email')); ?>" value="<?php echo e(old('email')); ?>" class="form-control" maxlength="50">
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
										<input type="password"  name="password" placeholder="<?php echo e(trans('app.Enter Password')); ?>" class="form-control col-md-7 col-xs-12" maxlength="20">
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
									<label class="control-label col-md-4 col-sm-4 col-xs-12 currency" style="" for="password_confirmation"><?php echo e(trans('app.Confirm Password')); ?> <label class="color-danger">*</label></label>
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
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger" >*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text"  name="mobile" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>" value="<?php echo e(old('mobile')); ?>" class="form-control" maxlength="16" minlength="6">
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
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="landlineno"><?php echo e(trans('app.Landline No')); ?> <label class="color-danger"></label> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="landlineno" name="landlineno" placeholder="<?php echo e(trans('app.Enter LandLine No')); ?>"  value="<?php echo e(old('landlineno')); ?>" maxlength="16" minlength="6" class="form-control">
										<?php if($errors->has('landlineno')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('landlineno')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="image">
									<?php echo e(trans('app.Image')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="file" id="image" name="image" value="<?php echo e(old('image')); ?>" class="form-control chooseImage" >

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
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('country_id') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="country_id"><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <select class="form-control  select_country" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>">
										<option value=""><?php echo e(trans('app.Select Country')); ?></option>
											<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($countrys->id); ?>"><?php echo e($countrys->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									  </select>
									  	<?php if($errors->has('country_id')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('country_id')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="state_id"><?php echo e(trans('app.State')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control  state_of_country" name="state_id"  stateurl="<?php echo url('/getcityfromstate'); ?>">
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="city"><?php echo e(trans('app.Town/City')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control  city_of_state" name="city">
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group has-feedback <?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <textarea class="form-control addressTextarea" id="address" name="address" maxlength="100"><?php echo e(old('address')); ?></textarea>
										
										<?php if($errors->has('address')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('address')); ?></strong>
										</span>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<!-- Custom field data  -->
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
													<input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]" value="<?php echo e($k); ?>" <?php if($k == 0) {echo "checked"; } ?>><?php echo e($val); ?> &nbsp;
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
						<!-- Custom field data -->
						
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="submit" class="btn btn-success customerAddSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
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
	
<script type="text/javascript">
    $(".datepicker").datetimepicker({
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


<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\CustomerAddEditFormRequest', '#demo-form2');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.customerAddSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.customerAddForm').submit(function () {
        $('.customerAddSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.customerAddForm').bind('invalid-form.validate', function () {
      $('.customerAddSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/customer/add.blade.php ENDPATH**/ ?>
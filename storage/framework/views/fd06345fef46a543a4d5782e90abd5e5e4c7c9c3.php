
<?php $__env->startSection('content'); ?>

<style>
.error_color{color:red; font-weight:bold;}
</style>

<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp <?php echo e(trans('app.General Settings')); ?></span></a>
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
				<?php if(session('message')): ?>
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							 <label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Updated')); ?>  </label>
						</div>
					</div>
				</div>
				<?php endif; ?>
            </div>
			<div class="x_content">
				<ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
					
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generalsetting_view')): ?>
						<li role="presentation" class="active suppo_llng_li floattab"><a href="<?php echo url('setting/general_setting/list'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-cogs">&nbsp;</i><b><?php echo e(trans('app.General Settings')); ?></b></a></li>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('timezone_view')): ?>
						<li role="presentation" class="suppo_llng_li_add floattab"><a href="<?php echo url('setting/timezone/list'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-cog">&nbsp;</i><?php echo e(trans('app.Other Settings')); ?></a></li>
					<?php endif; ?>
					
					<!-- <li role="presentation" class="suppo_llng_li_add floattab"><a href="<?php echo url('setting/accessrights/list'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-universal-access">&nbsp;</i> <?php echo e(trans('app.Access Rights')); ?></a></li> -->
					
				<!-- New Access Rights Starting -->	
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accessrights_view')): ?>				
						<li role="presentation" class="suppo_llng_li_add floattab"><a href="<?php echo url('setting/accessrights/show'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-universal-access">&nbsp;</i><?php echo e(trans('app.Access Rights')); ?></a></li>
					<?php endif; ?>
				<!-- New Access Rights Ending -->
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('businesshours_view')): ?>
						<li role="presentation" class="suppo_llng_li_add floattab"><a href="<?php echo url('setting/hours/list'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-hourglass-end">&nbsp;</i><?php echo e(trans('app.Business Hours')); ?></a></li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stripesetting_view')): ?>
						<li role="presentation" class="suppo_llng_li_add floattab"><a href="<?php echo url('setting/stripe/list'); ?>" class="anchor_tag anchr"><span class="visible-xs"></span><i class="fa fa-cc-stripe">&nbsp;</i><?php echo e(trans('app.Stripe Settings')); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<form id="general_setting_edit_form" method="post" action="<?php echo e(url('setting/general_setting/store')); ?>" enctype="multipart/form-data" class="form-horizontal upperform">
					
								<div class="col-md-12 col-sm-12 col-xs-12">
								  <h4><b><?php echo e(trans('app.Business Information')); ?> </b></h4>
								  <p class="col-md-12 col-sm-12 col-xs-12 ln_solid"></p>
								</div>

								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="System_Name"><?php echo e(trans('app.System Name')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="System_Name" class="form-control" placeholder="<?php echo e(trans('app.Enter System Name/Title')); ?>" required maxlength="50" value="<?php echo e($settings_data->system_name); ?>">
										<?php if($errors->has('System_Name')): ?>
										   <span class="help-block">
											   <span class="error_color"><?php echo e($errors->first('System_Name')); ?></span>
										   </span>
										<?php endif; ?>
									</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="start_year"><?php echo e(trans('app.Starting Year')); ?> </label>
								   <div class="col-md-6 col-sm-6 col-xs-12 input-group date" id="datepicker1">
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" name="start_year" class="form-control" id="" value="<?php echo e($settings_data->starting_year); ?>">
									</div>
								</div>
													
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Phone_Number"><?php echo e(trans('app.Phone Number')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="Phone_Number" class="form-control" placeholder="<?php echo e(trans('app.Enter Phone Number')); ?>" required maxlength="16" minlength="6" value="<?php echo e($settings_data->phone_number); ?>">
										<?php if($errors->has('Phone_Number')): ?>
										   <span class="help-block">
											   <span class="error_color"><?php echo e($errors->first('Phone_Number')); ?></span>
										   </span>
										<?php endif; ?>
									</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label> 
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="Email" class="form-control" placeholder="<?php echo e(trans('app.Enter Email Address')); ?>" required value="<?php echo e($settings_data->email); ?>" maxlength="50">
										<?php if($errors->has('Email')): ?>
										   <span class="help-block">
											   <span class="error_color"><?php echo e($errors->first('Email')); ?></span>
										   </span>
										<?php endif; ?>
									</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea name="address" class="form-control addressTextarea" rows="4" placeholder="<?php echo e(trans('app.Enter Address')); ?>" maxlength="100" required ><?php echo e($settings_data->address); ?></textarea>
									</div>
								</div>
				
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Country"><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="form-control  select_country" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>" required>
											<option value="">Select Country</option>
											<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($countrys->id); ?>" <?php if($settings_data->country_id==$countrys->id){ echo "selected"; }?>><?php echo e($countrys->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="state"><?php echo e(trans('app.State')); ?></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="form-control  state_of_country" name="state_id" stateurl="<?php echo url('/getcityfromstate'); ?>">
											<!-- <option value="">Select State</option> -->
											<?php if(count($state)>0): ?>
											    <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $states): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo $states->id; ?>" <?php if($settings_data->state_id==$states->id){ echo "selected"; }?>><?php echo $states->name; ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									    </select>
									</div>
								</div>

								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="city"><?php echo e(trans('app.City')); ?> 			</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="form-control  city_of_state" name="city">
											<!-- <option value="">Select City</option> -->
											<?php if(count($city) >0): ?>
												<?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo $citys->id; ?>" <?php if($settings_data->city_id==$citys->id){ echo "selected"; }?>><?php echo $citys->name; ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									  </select>
									</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12 my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="image"><?php echo e(trans('app.Logo Image')); ?></label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<input type="file" id="input-file-max-fs" name="Logo_Image" class="form-control dropify" data-max-file-size="5M">
											<?php if($errors->has('Logo_Image')): ?>
											   <span class="help-block">
												   <span class="error_color"><?php echo e($errors->first('Logo_Image')); ?></span>
											   </span>
											<?php endif; ?>
											<div class="col-md-12 col-sm-12 col-xs-12 printimg">
											<img src="<?php echo e(url('public/general_setting/'.$settings_data->logo_image)); ?>" class="logo_img">
											</div>
												<div class="dropify-preview">
													<span class="dropify-render"></span>
													<div class="dropify-infos">
														<div class="dropify-infos-inner">
															<p class="dropify-filename">
																<span class="file-icon"></span> 
																<span class="dropify-filename-inner"></span>
															</p>
														</div>
													</div>
												</div>
										</div>
								</div> 
					  
								<div class="form-group col-md-12 col-sm-12 col-xs-12 my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="image"><?php echo e(trans('app.Cover Image')); ?></label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<input type="file" id="input-file-max-fs"  name="Cover_Image"  class="form-control dropify" data-max-file-size="5M">
											<?php if($errors->has('Cover_Image')): ?>
											   <span class="help-block">
												   <span class="error_color"><?php echo e($errors->first('Cover_Image')); ?></span>
											   </span>
											<?php endif; ?>
											
											<img src="<?php echo e(url('public/general_setting/'.$settings_data->cover_image)); ?>" class="cov_img" height="250px" width="100%">
											
												<div class="dropify-preview ">
													<span class="dropify-render"></span>
													<div class="dropify-infos">
														<div class="dropify-infos-inner">
															<p class="dropify-filename">
																<span class="file-icon"></span> 
																<span class="dropify-filename-inner"></span>
															</p>
														</div>
													</div>
												</div>
										</div>
								</div>
					
								<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Paypal_Id"><?php echo e(trans('app.Paypal Email Id')); ?>

									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="Paypal_Id" class="form-control" placeholder="<?php echo e(trans('app.Enter Paypal Email Address')); ?>" maxlength="50" value="<?php echo e($settings_data->paypal_id); ?>">
										<?php if($errors->has('Paypal_Id')): ?>
										   <span class="help-block">
											   <span class="error_color"><?php echo e($errors->first('Paypal_Id')); ?></span>
										   </span>
										<?php endif; ?>
									</div>
								</div>
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generalsetting_edit')): ?>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">  
									<div class="col-md-9 col-sm-9 col-xs-12 text-center" >
										<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
										<input type="submit" class="btn btn-success"  value="<?php echo e(trans('app.Update')); ?>"/>
									</div>
								</div>
								<?php endif; ?>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
	</div>
<!-- page content end -->


<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script> 
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

	<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<!-- datetimepicker in starting_year  -->
	<script>
    $('#datepicker1').datetimepicker({
        format: "yyyy",
		autoclose: 2,
		minView: 4,
		startView: 4,
    });
</script>

<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
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
</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreGeneralSettingEditFormRequest', '#general_setting_edit_form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/general_setting/list.blade.php ENDPATH**/ ?>
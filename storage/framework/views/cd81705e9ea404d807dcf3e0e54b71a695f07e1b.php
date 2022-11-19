
 
<?php $__env->startSection('content'); ?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Profile Setting')); ?></span></a>
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
                   <label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Updated')); ?>  </label>
                </div>
			</div>
		</div>
	<?php endif; ?>
	<div class="x_content">
		<ul class="nav nav-tabs bar_tabs" role="tablist">
			<li role="presentation" class="active"><a href="<?php echo url('setting/profile'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <b> <?php echo e(trans('app.Profile Setting')); ?></b></a></li>
		</ul>
	</div>
	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
						<form id="profileEditForm"  action="profile/update/<?php echo e($profile->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal upperform">

							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('firstname') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-5 col-sm-5 col-xs-12">
									<input type="text"  name="firstname" placeholder="<?php echo e(trans('app.Enter First Name')); ?>" maxlength="50" value="<?php echo e($profile->name); ?>" class="form-control" required >
											   <?php if($errors->has('firstname')): ?>
											   <span class="help-block">
												   <strong><?php echo e($errors->first('firstname')); ?></strong>
											   </span>
										   <?php endif; ?>
								</div>
							</div>
						  
							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger">*</label>
								</label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="text" id="lastname"  name="lastname" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" maxlength="50" value="<?php echo e($profile->lastname); ?>"
								  class="form-control" >
								  <?php if($errors->has('lastname')): ?>
								   <span class="help-block">
									   <strong><?php echo e($errors->first('lastname')); ?></strong>
								   </span>
							   <?php endif; ?>
								</div>
							</div>
						  
							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-5 col-sm-5 col-xs-12 gender">
								  
								   
									  <input type="radio"  name="gender" value="0"  <?php if($profile->gender ==0) { echo "checked"; }?> checked>  <?php echo e(trans('app.Male')); ?> 
							  
									  <input type="radio" name="gender" value="1" <?php if($profile->gender ==1) { echo "checked"; }?>> <?php echo e(trans('app.Female')); ?>

								   
								</div>
							</div>

							<div class="form-group col-md-12 col-sm-12 col-xs-12 <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?></label>
								<div class="col-md-5 col-sm-5 col-xs-12 input-group date datepicker">
								<?php
								 if($profile->birth_date != '0000-00-00')
								 {
									 $dob =  date(getDateFormat(),strtotime($profile->birth_date)); 
								 }
								 else
								 {
									$dob=''; 
								 }								 
								 ?>
								  
								  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
								  <input type="text" id="datepicker" class="form-control" placeholder="<?php echo getDatepicker();?>" value="<?php echo e($dob); ?>" name="dob" onkeypress="return false;" >
								</div>
								 <?php if($errors->has('dob')): ?>
								   <span class="help-block">
									   <strong style="margin-left:27%;"><?php echo e($errors->first('dob')); ?></strong>
								   </span>
								<?php endif; ?>
							</div>

							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label>
								</label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="text"  name="email" placeholder="<?php echo e(trans('app.Enter Email')); ?>" value="<?php echo e($profile->email); ?>" class="form-control " maxlength="50" required>
												  <?php if($errors->has('email')): ?>
												   <span class="help-block">
													   <strong><?php echo e($errors->first('email')); ?></strong>
												   </span>
											   <?php endif; ?>
								</div>
							</div>
						  
							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password"><?php echo e(trans('app.New Password')); ?> </label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="password"  name="password" placeholder="<?php echo e(trans('app.Enter Password')); ?>" maxlength="20" class="form-control col-md-7 col-xs-12" >
											   <?php if($errors->has('password')): ?>
											   <span class="help-block">
												   <strong><?php echo e($errors->first('password')); ?></strong>
											   </span>
										   <?php endif; ?>
								</div>
							</div>
							
							<div class="form-group has-feedback col-md-12 col-sm-12 col-xs-12 <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Password">
								<?php echo e(trans('app.Confirm Password')); ?></label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="password"  name="password_confirmation" placeholder="<?php echo e(trans('app.Enter Confirm Password')); ?>" maxlength="20" class="form-control col-md-7 col-xs-12" >
											   <?php if($errors->has('password_confirmation')): ?>
											   <span class="help-block">
												   <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
											   </span>
										   <?php endif; ?>
								</div>
							</div>
						  
							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?></label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="text"  name="mobile" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>" value="<?php echo e($profile->mobile_no); ?>" min="6" max="16"  class="form-control">
								   <?php if($errors->has('mobile')): ?>
								   <span class="help-block">
									   <strong><?php echo e($errors->first('mobile')); ?></strong>
								   </span>
							   <?php endif; ?>
								</div>
							</div>
						
							<div class="form-group col-md-12 col-sm-12 col-xs-12 has-feedback <?php echo e($errors->has('image') ? 'has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"><?php echo e(trans('app.Image')); ?> 
								</label>
								<div class="col-md-5 col-sm-5 col-xs-12">
								  <input type="file" id="image" name="image"  class="form-control " >
								<?php if($profile->role == "admin"): ?>
									<img src="<?php echo e(url('public/admin/'.$profile->image)); ?>"  width="50px" height="50px" class="img-circle" >
								<?php elseif($profile->role == "Customer"): ?>
									<img src="<?php echo e(url('public/customer/'.$profile->image)); ?>"  width="50px" height="50px" class="img-circle" >
								<?php elseif($profile->role == "employee"): ?>
									<img src="<?php echo e(url('public/employee/'.$profile->image)); ?>"  width="50px" height="50px" class="img-circle" >
								<?php elseif($profile->role == "supportstaff"): ?>
									<img src="<?php echo e(url('public/supportstaff/'.$profile->image)); ?>"  width="50px" height="50px" class="img-circle" >
								<?php elseif($profile->role == "accountant"): ?>
									<img src="<?php echo e(url('public/accountant/'.$profile->image)); ?>"  width="50px" height="50px" class="img-circle" >
								<?php endif; ?>
								    <?php if($errors->has('image')): ?>
								   <span class="help-block">
									   <strong><?php echo e($errors->first('image')); ?></strong>
								   </span>
							   <?php endif; ?>
								</div>
							</div>
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-9 col-sm-9 col-xs-12 text-center">
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
	<script>
    
    
    $('.datepicker').datetimepicker({
       format: "<?php echo getDatepicker(); ?>",
		autoclose: 2,
		minView: 2,
		endDate: new Date(),
		
    });
</script>


<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreProfileSettingEditFormRequest', '#profileEditForm');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/profile/list.blade.php ENDPATH**/ ?>
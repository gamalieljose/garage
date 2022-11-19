  
<?php $__env->startSection('content'); ?>
<style>
.bootstrap-datetimepicker-widget table td span {
    width: 0px!important;
}
.table-condensed>tbody>tr>td {
    padding: 3px;
}
</style>

<!-- page content starting -->
<?php 
$customer= (isset($user)) ? $user->id : '' ;
?>

	<div class="right_col" role="main">
		<div class="page-title">
			<div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp <?php echo e(trans('app.Gate Pass')); ?></span></a>
					</div>
					  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</nav>
			</div>
		</div>

		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs" role="tablist">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/gatepass/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><?php echo e(trans('app.Gatepass List')); ?></span></a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/gatepass/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Gatepass')); ?></b></span></a></li>
				<?php endif; ?>
			</ul>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<form id="demo-form2" action="<?php echo url('/gatepass/store'); ?>" method="post" 
						enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left input_mask gatepassAddForm">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Customer Information')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('jobcard') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jobcard"><?php echo e(trans('app.JobCard No. ')); ?> <label class="color-danger">*</label>	</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select name="jobcard"  class="form-control" id="selectjobcard" url="<?php echo url('/gatepass/gatedata'); ?>"required >
												<option value=""><?php echo e(trans('app.Select JobCard No')); ?></option>
												<?php if(!empty($jobno)): ?>
													<?php $__currentLoopData = $jobno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobnos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($jobnos->job_card); ?>"><?php echo e($jobnos->job_card); ?>

													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('gatepass_no') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gatepass_no"><?php echo e(trans('app.Gate_no')); ?> <label class="color-danger">*</label> 
						
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <input type="text" id="gatepass_no" name="gatepass_no"  class="form-control"  
									  value="<?php echo e($code); ?>" placeholder="<?php echo e(trans('app.Auto Generated Gate Pass Number')); ?>"  readonly/>
						 
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('firstname') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text"  id="customer" name="Customername" value="<?php echo e($customer); ?>" placeholder="<?php echo e(trans('app.Enter First Name')); ?>"  class="form-control jobcard" required  readonly>
									</div>
								</div>
							   
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" id="lastname" name="lastname" value="" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>"  class="form-control jobcard" readonly>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <input type="text"  id="email" name="email" value="" placeholder="<?php echo e(trans('app.Enter Email')); ?>" class="form-control jobcard"  readonly>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger" >*</label>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <input type="text"  id="mobile" name="mobile" value="" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>"  class="form-control jobcard"  readonly >
									</div>
								</div>
							</div>

								<div class="col-md-12 col-xs-12 col-sm-12 space">
									<h4><b><?php echo e(trans('app.Vehicle Information')); ?></b></h4>
									<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
								</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('model_name') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="model_name"><?php echo e(trans('app.Vehicle Name')); ?> <label class="color-danger" >*</label></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <input type="text"  id="vehicle" name="vehiclename" value=""placeholder="<?php echo e(trans('app.Enter Vehicle Name')); ?>" class="form-control jobcard" readonly >
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('veh_type') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="veh_type"><?php echo e(trans('app.Vehicle Type')); ?> <label class="color-danger" >*</label>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <input type="text"  id="veh_type" name="veh_type" value=""placeholder="<?php echo e(trans('app.Enter Vehicle Type')); ?>" class="form-control jobcard" readonly >
									</div>
								</div>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('chassis') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="chassis"><?php echo e(trans('app.Chassis')); ?> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" id="chassis" name="chassis" value="" placeholder="<?php echo e(trans('app.Enter Chassis No.')); ?>"  class="form-control jobcard" readonly >
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('kms') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="kms"><?php echo e(trans('app.KMs.Run')); ?> <label class="color-danger" >*</label></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" id="kms" name="kms" placeholder="<?php echo e(trans('app.Enter Kms. Run')); ?>" class="form-control jobcard" readonly maxlength="10" >
									</div>
								</div>
							</div>

							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b><?php echo e(trans('app.Other Information')); ?></b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>

							<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('out_date') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12 currency" for="servie_out_date"><?php echo e(trans('app.Vehicle Out Date')); ?> <label class="color-danger" >*</label></label>
									<!-- today date in hidden type -->
									<?php  $currendate= date('Y-m-d H:i:s'); ?>
										<input type="hidden"  id="" name="today" placeholder="YYYY-MM:DD hh:mm:ss" class="form-control" value="<?php echo e($currendate); ?>" >
										
									<div class="col-md-9 col-sm-9 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text"  id="outdate_gatepass" name="out_date" autocomplete="off" placeholder="YYYY-MM:DD hh:mm:ss" class="form-control gatepassOutdate" onkeypress="return false;" required >
									</div>
								</div>
							</div>

							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="submit" class="btn btn-success addGatepassSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

  
<script src="<?php echo e(URL::asset('build/js/jquery.min.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<!--- datetimepicker -->
	<script>
    $('.datepicker').datetimepicker({
       format: "<?php echo getDatetimepicker(); ?>",
		autoclose:1,
    });
</script>
<!-- select jobcard no fill the data -->
<script>

$('body').on('change','#selectjobcard',function(){
	var jobcard = $(this).val();
	
	var url=$(this).attr('url');
	
	$.ajax({
				type: 'GET',
				url: url,
				data : {jobcard:jobcard},
				success: function (data)
				{	
					 var gaterecord = jQuery.parseJSON(data);
								
						$('#customer').attr('value',gaterecord.name);
						$('#lastname').attr('value',gaterecord.lastname);
						$('#email').attr('value',gaterecord.email);
						$('#mobile').attr('value',gaterecord.mobile_no);
						$('#vehicle').attr('value',gaterecord.modelname);
						$('#veh_type').attr('value',gaterecord.vehicle_type);
						$('#chassis').attr('value',gaterecord.chassisno);
						$('#kms').attr('value',gaterecord.kms_run);
				}

			});
});
</script>
<script>
	$('body').on('click','.jobcard',function(){
		var f_name = $('#customer').val();
		var l_name = $('#lastname').val();
		
		if(f_name =="" || l_name=="" )
		{
			swal({   
				title: "Gate Pass",
				text: "Please select JobCard No!"   

				});
				return false;
		}
	});


	/*If date field have value then error msg and has error class should remove*/
	$('body').on('change','.gatepassOutdate',function(){

		var outDateValue = $(this).val();

		if (outDateValue != null) {
			$('#outdate_gatepass-error').css({"display":"none"});
		}

		if (outDateValue != null) {
			$(this).parent().parent().removeClass('has-error');
		}
	});
</script>


<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreGatepassAddEditFormRequest', '#demo-form2');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.addGatepassSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.gatepassAddForm').submit(function () {
        $('.addGatepassSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.gatepassAddForm').bind('invalid-form.validate', function () {
      $('.addGatepassSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/gatepass/gatepass.blade.php ENDPATH**/ ?>
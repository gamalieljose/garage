
<?php $__env->startSection('content'); ?>

<style>
	.select2-container {
		width: 100% !important;
	}
</style>

<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Compliance Management')); ?></span></a> 
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
                </div>
				<?php if(session('message')): ?>
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							<input id="checkbox-10" type="checkbox" checked="">
							<label for="checkbox-10 colo_success">  <?php echo e(session('message')); ?> </label>
						</div>
					</div>
				</div>
				<?php endif; ?>
            </div>
			<div class="x_content">
                <ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
                	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_view')): ?>
						<li role="presentation" class=""><a href="<?php echo url('/rto/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><?php echo e(trans('app.List Of RTO Taxes')); ?></span></a></li>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_add')): ?>
						<li role="presentation" class="setTabAddRtoTaxOnSmallDevice"><a href="<?php echo url('/rto/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add RTO Taxes')); ?></b></span></a></li>
					<?php endif; ?>
				</ul>
			</div>
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<form id="rtoTaxAddForm" method="post" action="<?php echo url('rto/store'); ?>" enctype="multipart/form-data"  class="form-horizontal upperform rtoTaxAddForm">

								<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="v_id"><?php echo e(trans('app.Vehicle Name')); ?>  <label class="color-danger">*</label></label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<select class="form-control vehicleNameSelect" name="v_id" id="vehicle_names" required>
											<option value=""><?php echo e(trans('app.-- Select Vehicle --')); ?></option>
											<?php if(!empty($vehicle)): ?>
												<?php $__currentLoopData = $vehicle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($vehicles->id); ?>"><?php echo e($vehicles->modelname); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							  
								<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback <?php echo e($errors->has('rto_tax') ? ' has-error' : ''); ?> my-form-group" style="margin-top: 1%;">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rto_tax"><?php echo e(trans('app.RTO / Registration C.R. Temp Tax')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="number" id="rto_tax" name="rto_tax"  class="form-control" maxlength="10" value="<?php echo e(old('rto_tax')); ?>" placeholder="<?php echo e(trans('app.Enter RTO Registration Tax')); ?> " required/>
										<?php if($errors->has('rto_tax')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('rto_tax')); ?></strong>
										   </span>
										 <?php endif; ?>
									</div>
								</div>
							  
								<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback <?php echo e($errors->has('num_plate_tax') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="num_plate_tax"><?php echo e(trans('app.Number Plate charge')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="number" id="num_plate_tax" name="num_plate_tax"  class="form-control" placeholder="<?php echo e(trans('app.Enter number plate charge')); ?>" value="<?php echo e(old('num_plate_tax')); ?>" maxlength="10" required>
										<?php if($errors->has('num_plate_tax')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('num_plate_tax')); ?></strong>
										   </span>
										 <?php endif; ?>
									</div>
								</div>

								<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback <?php echo e($errors->has('mun_tax') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mun_tax"><?php echo e(trans('app.Municipal Road Tax')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="number" id="mun_tax" name="mun_tax"  class="form-control" placeholder="<?php echo e(trans('app.Eneter Municipal Road Tax')); ?>" value="<?php echo e(old('mun_tax')); ?>" maxlength="10" required>
										<?php if($errors->has('mun_tax')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('mun_tax')); ?></strong>
										   </span>
										 <?php endif; ?>
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
									<div class="col-md-9 col-sm-9 col-xs-12 text-center">
										<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
										<button type="submit" class="btn btn-success submitButton"><?php echo e(trans('app.Submit')); ?></button>
									</div>
								</div>
							</form>
							<div class="col-md-12 col-sm-12 col-xs-12 form-group">
								<p>* <?php echo e(trans('app.RTO')); ?> = <?php echo e(trans('app.Regional Transport Office')); ?></p>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
	</div>
<!-- page content end-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
   		// Initialize select2
   		$("#vehicle_names").select2();
   	});
</script>


<script>
	/*If select box have value then error msg and has error class remove*/
	$(document).ready(function(){

		$('.vehicleNameSelect').on('change',function(){

			var vehicleValue = $('select[name=v_id]').val();
			
			//alert(vehicleValue);
			if (vehicleValue != null) {
				//$('#vehicle_names-error').css({"display":"none"});				
				//$('#vehicle_names-error').css({"color":"#ffffff"});
				$('#vehicle_names-error').attr('style', 'display: none !important');
			}

			if (vehicleValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
	});
</script>


<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreRtoTaxAddEditFormRequest', '#rtoTaxAddForm');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>


<!-- Form submit at time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $(':submit').removeAttr('disabled'); //re-enable on document ready
    });
    $('form').submit(function () {
        $(':submit').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('form').bind('invalid-form.validate', function () {
      $(':submit').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/rto/add.blade.php ENDPATH**/ ?>
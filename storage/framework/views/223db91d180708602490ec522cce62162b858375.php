
<?php $__env->startSection('content'); ?>
<style>
.step1{color:#5A738E !important;}
.invalid-feedback{color:red;}
</style>

<!-- page content -->	
	<div class="right_col" role="main">
		
		<div class="page-title">
			  <div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp <?php echo e(trans('app.Service')); ?></span></a>
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
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/service/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Services')); ?></b></a></li>
				<?php endif; ?>
			</ul>
		</div>
			  
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="panel panel-default">
							<div class="panel-heading step1 titleup"><?php echo e(trans('app.Step - 1 : Add Service Details...')); ?></div>
								<form id="ServiceAdd-Form" method="post" action="<?php echo e(url('/service/store')); ?>" enctype="multipart/form-data"  class="form-horizontal upperform serviceAddForm" border="10">
				   
									<div class="form-group">
										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Jobcard Number')); ?> <label class="color-danger">*</label></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<input type="text" id="jobno" name="jobno" class="form-control" value="<?php echo e($code); ?>" readonly>
											</div>
										</div>

										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Customer Name')); ?> <label class="color-danger">*</label></label>
											<div class="col-md-3 col-sm-3 col-xs-12">
												<select name="Customername" id="sup_id" class="form-control select_vhi select_customer_auto_search" cus_url = "<?php echo url('service/get_vehi_name'); ?>" required>
												<option value=""><?php echo e(trans('app.Select Customer')); ?></option>
												<?php if(!empty($customer)): ?>
													<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($customers->id); ?>" ><?php echo e(getCustomerName($customers->id)); ?></option>	
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
												</select>
											</div>
											<div class="col-md-1 col-sm-1 col-xs-12 addremove customerAddRemove">
												<button type="button" data-toggle="modal"     data-target="#mymodal" class="btn btn-default openmodel"><?php echo e(trans('app.Add')); ?></button>
											</div>
										</div>
									</div>
					  
								    <div class="form-group" style="margin-top: 20px;">
										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Vehicle Name')); ?> <label class="color-danger">*</label></label>
											<div class="col-md-3 col-sm-3 col-xs-12">
												  <select  name="vehicalname" class="form-control modelnameappend" id="vhi" required>
													<option value=""><?php echo e(trans('app.Select vehicle Name')); ?></option>
														<!-- Option comes from Controller -->
												  </select>
											 </div>
											<div class="col-md-1 col-sm-1 col-xs-12 addremove">
												<button type="button" data-toggle="modal"     data-target="#vehiclemymodel" class="btn btn-default vehiclemodel"><?php echo e(trans('app.Add')); ?></button>
											</div>
										</div>

										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Date"><?php echo e(trans('app.Date')); ?> <label class="color-danger">*</label></label>
											<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
												<input type='text' class="form-control" name="date" autocomplete="off" id='p_date' placeholder="<?php echo getDatepicker();  echo " hh:mm:ss"?>"  value="<?php echo e(old('date')); ?>" onkeypress="return false;"  required  />
											</div>
										</div>
									</div>
					  
									<div class="form-group" style="margin-top: 15px;">
										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Title')); ?></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<input type="text" name="title" placeholder="<?php echo e(trans('app.Enter Title')); ?>"  value="<?php echo e(old('title')); ?>" maxlength="50" class="form-control" >
											</div>
										</div>

										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Assign To')); ?> <label class="color-danger">*</label></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<select id="AssigneTo" name="AssigneTo"  class="form-control" required>
													<option value="">-- <?php echo e(trans('app.Select Assign To')); ?> --</option>
													<?php if(!empty($employee)): ?>
													<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($employees->id); ?>"><?php echo e($employees->name); ?></option>	
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
													<option value="breakdown"><?php echo e(trans('app.Breakdown')); ?></option>
													<option value="booked vehicle"><?php echo e(trans('app.Booked Vehicle')); ?></option>	
													<option value="repeat job"><?php echo e(trans('app.Repeat Job')); ?></option>	
													<option value="customer waiting"><?php echo e(trans('app.Customer Waiting')); ?></option>	
												</select>
											</div>
										</div>

										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12"><?php echo e(trans('app.Service Type')); ?> <label class="color-danger">*</label></label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<label class="radio-inline"><input type="radio" name="service_type" id="free"  value="free" required><?php echo e(trans('app.Free')); ?></label>
													<label class="radio-inline"><input type="radio" name="service_type" checked id="paid"  value="paid" required><?php echo e(trans('app.Paid')); ?></label>
												</div>
										</div>
									</div>
					  
									<div class="form-group" style="margin-top: 15px;">
										<div class="my-form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="details"><?php echo e(trans('app.Details')); ?></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<textarea class="form-control" name="details" id="details" maxlength="100"><?php echo e(old('details')); ?></textarea> 
											</div>
										</div>

										<div class="my-form-group">
											<div id="dvCharge" style="" class="has-feedback <?php echo e($errors->has('charge') ? ' has-error' : ''); ?>">
												<label class="control-label col-md-2 col-sm-2 col-xs-12 currency" for="last-name"><?php echo e(trans('app.Fix Service Charge')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<input type="text"  id="charge_required" name="charge" class="form-control fixServiceCharge"  placeholder="<?php echo e(trans('app.Enter Fix Service Charge')); ?>"  value="<?php echo e(old('charge')); ?>" maxlength="8">
													<?php if($errors->has('charge')): ?>
													   <span class="help-block">
														   <strong><?php echo e($errors->first('charge')); ?></strong>
													   </span>
													 <?php endif; ?>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group" style="margin-top: 15px;">
										<!-- <div class="">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="reg_no"><?php echo e(trans('app.Registration No.')); ?></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<input type="text" name="reg_no" id="reg_no" placeholder="<?php echo e(trans('app.Enter Registration Number')); ?>"  value="<?php echo e(old('reg_no')); ?>" maxlength="15" class="form-control" >
												<?php if($errors->has('charge')): ?>
												<span class="help-block">
													<strong><?php echo e($errors->first('reg_no')); ?></strong>
												</span>
												<?php endif; ?>
											</div>
										</div> -->

							<!-- MOt Test Checkbox Start-->
										<div class="motMainDiv">
											<label class="control-label col-md-2 col-sm-2 col-xs-12 motTextLabel" for="" ><?php echo e(trans('app.MOT Test')); ?></label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<input type="checkbox" name="motTestStatusCheckbox" id="motTestStatusCheckbox">
											</div>
										</div>
							<!-- MOt Test Checkbox End-->						
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
                     
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12 text-center">
											<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
											<button type="submit" class="btn btn-success serviceSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
										</div>
									</div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--customer add model -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-lg">
				<div class="modal-content">
				  	<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Customer Details</h4>
				  	</div>
				    <div class="row massage hide addcustomermsg">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="checkbox checkbox-success checkbox-circle">
								<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Submitted')); ?>  </label>
							</div>
						</div>
				    </div>
			  		
			  		<div class="modal-body">
						<div class="x_content">
							<form id="formcustomer" action="" method="POST" name="formcustomer" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left input_mask">
								
								<div class="col-md-12 col-xs-12 col-sm-12 space">
									<h4><b><?php echo e(trans('app.Personal Information')); ?></b></h4>
									<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"><?php echo e(trans('app.First Name')); ?> <label class="color-danger">*</label> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" id="firstname" name="firstname"  class="form-control"  
									  value="<?php echo e(old('firstname')); ?>" placeholder="<?php echo e(trans('app.Enter First Name')); ?>" maxlength="25"  required />
									  <span class="color-danger" id="errorlfirstname"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name"><?php echo e(trans('app.Last Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="lastname" name="lastname" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" value="<?php echo e(old('lastname')); ?>" maxlength="25"
										class="form-control" required>
										<span class="color-danger" id="errorllastname"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('displayname') ? ' has-error' : ''); ?> ">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name"><?php echo e(trans('app.Display Name')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="displayname" name="displayname" placeholder="<?php echo e(trans('app.Enter Display Name')); ?>" value="<?php echo e(old('displayname')); ?>" class="form-control" maxlength="25">
										<span class="color-danger" id="errorldisplayname"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('company_name') ? ' has-error' : ''); ?> ">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="display-name"><?php echo e(trans('app.Company Name')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="company_name" name="company_name" placeholder="<?php echo e(trans('app.Enter Company Name')); ?>" value="<?php echo e(old('company_name')); ?>" class="form-control" maxlength="25">
										<span class="color-danger" id="errorlcompanyName"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12"> <?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12 gender">
										<input type="radio" class="gender" name="gender" value="0" checked><?php echo e(trans('app.Male')); ?>

										<input type="radio" class="gender" name="gender" value="1" > <?php echo e(trans('app.Female')); ?>

								   
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-8 col-sm-8 col-xs-12 input-group date datepickercustmore">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text" id="datepicker" autocomplete="off" class="form-control" placeholder="<?php echo getDatepicker();?>"  name="dob" value="<?php echo e(old('dob')); ?>" onkeypress="return false;" required />
									</div>
									<span class="color-danger" id="errorldatepicker"></span>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="email" name="email" placeholder="<?php echo e(trans('app.Enter Email')); ?>" value="<?php echo e(old('email')); ?>" class="form-control" maxlength="50" required>
										<span class="color-danger" id="errorlemail"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Password"><?php echo e(trans('app.Password')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="password" id="password" name="password" placeholder="<?php echo e(trans('app.Enter Password')); ?>" class="form-control col-md-7 col-xs-12" maxlength="20" required>
										<span class="color-danger" id="errorlpassword"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12 currency" style="padding-right: 0px;"for="Password"><?php echo e(trans('app.Confirm Password')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="password" id="password_confirmation"  name="password_confirmation" placeholder="<?php echo e(trans('app.Enter Confirm Password')); ?>" class="form-control col-md-7 col-xs-12" maxlength="20" required>
										<span class="color-danger" id="errorlpassword_confirmation"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger" >*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="mobile" name="mobile" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>" value="<?php echo e(old('mobile')); ?>" class="form-control" maxlength="12" minlength="6" required >
										<span class="color-danger" id="errorlmobile"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback <?php echo e($errors->has('landlineno') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="landline-no"><?php echo e(trans('app.Landline No')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" id="landlineno" name="landlineno" placeholder="<?php echo e(trans('app.Enter LandLine No')); ?>"  value="<?php echo e(old('landlineno')); ?>" maxlength="12" minlength="6" class="form-control">
										<span class="color-danger" id="errorllandlineno"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="image">
									<?php echo e(trans('app.Image')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="file" id="image" name="image" value="<?php echo e(old('image')); ?>" class="form-control " >
									</div>
								</div>

								<div class="col-md-12 col-xs-12 col-sm-12 space">
								  <h4><b><?php echo e(trans('app.Address')); ?></b></h4>
								  <p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Country"><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <select class="form-control  select_country" id="country_id" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>" required>
										<option value=""><?php echo e(trans('app.Select Country')); ?></option>
											<?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($countrys->id); ?>"><?php echo e($countrys->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									  	</select>
									  	<span class="color-danger" id="errorlcountry_id"></span>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="State "><?php echo e(trans('app.State')); ?> </label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control  state_of_country" id="state_id" name="state_id"  stateurl="<?php echo url('/getcityfromstate'); ?>">
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Town/City"><?php echo e(trans('app.Town/City')); ?></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control city_of_state" id="city" name="city">
										</select>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
									  <textarea class="form-control" id="address" name="address" maxlength="100" required><?php echo e(old('address')); ?></textarea>
									   	<span class="color-danger" id="errorladdress"></span>
									</div>
								</div>
								
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-12 col-sm-12 col-xs-12 text-center">
										<a class="btn btn-primary" data-dismiss="modal"><?php echo e(trans('app.Cancel')); ?></a>
										<button type="submit" class="btn btn-success addcustomer"><?php echo e(trans('app.Submit')); ?></button>
									</div>
								</div>
							</form>
						</div>	
			  		</div>
			  		<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  		</div>
				</div>
		  	</div>
		</div>


		<!-- vehicle model -->
		<div class="modal fade" id="vehiclemymodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Vehicle Details</h4>
					</div>

					<div class="row massage hide addvehiclemsg">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="checkbox checkbox-success checkbox-circle">
								<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Submitted')); ?>  </label>
							</div>
						</div>
					</div>

					<div class="modal-body">
						<form  action="" method="post" enctype="multipart/form-data"  class="form-horizontal upperform">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<input type="hidden" name="customer_id" value="" class="hidden_customer_id">
							<div class="form-group" style="margin-top:20px;">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Vehicle Type')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<select class="form-control select_vehicaltype" id="vehical_id1" name="vehical_id" 
										 vehicalurl="<?php echo url('/vehicle/vehicaltypefrombrand'); ?>" required>
											<option value=""><?php echo e(trans('app.Select Vehicle Type')); ?></option>
										 	<?php if(!empty($vehical_type)): ?>
												<?php $__currentLoopData = $vehical_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($vehical_types->id); ?>"><?php echo e($vehical_types->vehicle_type); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									    </select> 
										<span class="color-danger" id="errorlvehical_id1"></span>
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal" data-toggle="modal"><?php echo e(trans('app.Add')); ?></button>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Chasic No')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="chasicno" id="chasicno1" value="<?php echo e(old('chasicno')); ?>" placeholder="<?php echo e(trans('app.Enter ChasicNo')); ?>" maxlength="30" class="form-control">
										<span class="color-danger" id="errorlchasicno1"></span>
									</div>
								</div>
							</div>

						    <div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Vehicle Brand')); ?><label class="color-danger">*</label></label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<select class="form-control   select_vehicalbrand" id="vehicabrand1" name="vehicabrand" >
											<option value="">Select Vehical Brand</option>
										 </select> 
										 <span class="color-danger">
											<strong id="errorlvehicabrand1" ></strong>
										</span>
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-brand" data-toggle="modal"><?php echo e(trans('app.Add')); ?></button>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Model Years')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date" id="myDatepicker2">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text"  name="modelyear" id="modelyear1"  class="form-control"/>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Fuel Type')); ?></label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<select class="form-control select_fueltype" id="fueltype1" name="fueltype" >
											<option value=""><?php echo e(trans('app.Select fuel type')); ?> </option>
												<?php if(!empty($fuel_type)): ?>
													<?php $__currentLoopData = $fuel_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($fuel_types->id); ?>"><?php echo e($fuel_types->fuel_type); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
										</select> 
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-fuel" data-toggle="modal"><?php echo e(trans('app.Add')); ?></button>
									</div>									
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.No of Grear')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearno" id="gearno1" value="<?php echo e(old('gearno')); ?>" placeholder="<?php echo e(trans('app.Enter No of Gear')); ?>" maxlength="5" class="form-control">
									</div>
								</div>
							</div>
						  
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Model Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<select class="form-control model_addname" id="modelname1" name="modelname" required>
											<option value=""><?php echo e(trans('app.Select Model Name')); ?></option>
										<?php if(!empty($model_name)): ?>
											<?php $__currentLoopData = $model_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model_names): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($model_names->model_name); ?>"><?php echo e($model_names->model_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</select>
										<span class="color-danger" id="errorlmodelname1"></span>
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-vehi-model" data-toggle="modal"><?php echo e(trans('app.Add')); ?></button>
									</div>
								</div>

								<div class="<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name">
									<?php echo e(trans('app.Price' )); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="price" id="price1"  value="<?php echo e(old('price')); ?>" placeholder="<?php echo e(trans('app.Enter Price')); ?>" class="form-control" maxlength="10">
										<span class="color-danger" id="ppe"></span>
										<?php if($errors->has('price')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('price')); ?></strong>
										   </span>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="<?php echo e($errors->has('odometerreading') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Odometer Reading')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="odometerreading" id="odometerreading1" value="<?php echo e(old('odometerreading')); ?>" placeholder="<?php echo e(trans('app.Enter Odometer Reading')); ?>" maxlength="20"  class="form-control">
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Date Of Manufacturing')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker1">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text"  name="dom" id="dom1" class="form-control" placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Gear Box')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearbox" id="gearbox1" value="<?php echo e(old('gearbox')); ?>" placeholder="<?php echo e(trans('app.Enter Grear Box')); ?>" maxlength="30" class="form-control">
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Gear Box No')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearboxno" id="gearboxno1" value="<?php echo e(old('gearboxno')); ?>" placeholder="<?php echo e(trans('app.Enter Gearbox No')); ?>" maxlength="30" class="form-control" >
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Engine No')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="engineno"  id="engineno1" value="<?php echo e(old('engineno')); ?>" placeholder="<?php echo e(trans('app.Enter Engine No')); ?>" maxlength="30" class="form-control">
										<span class="color-danger" id="errorlengineno1"></span>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Engine Size')); ?></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="enginesize" id="enginesize1" value="<?php echo e(old('enginesize')); ?>" placeholder="<?php echo e(trans('app.Enter Engine Size')); ?>" maxlength="30" class="form-control" >
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Key No')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="keyno"  id="keyno1" value="<?php echo e(old('keyno')); ?>" placeholder="<?php echo e(trans('app.Enter Key No')); ?>" maxlength="30" class="form-control">
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Engine')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="engine" id="engine1" value="<?php echo e(old('engine')); ?>" placeholder="<?php echo e(trans('app.Enter Engine')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Number Plate')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" id="number_plate"  name="number_plate"  value="<?php echo e(old('number_plate')); ?>" placeholder="<?php echo e(trans('app.Enter Number Plate')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
							</div>

							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="button" class="btn btn-success addvehicleservice" ><?php echo e(trans('app.Submit')); ?></button>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>  
		
		<!-- Model Name -->
					<div class="col-md-6">
						<div id="responsive-modal-vehi-model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h4 class="modal-title"><?php echo e(trans('app.Add Model Name')); ?></h4>
									</div>
									<div class="modal-body">
										<form class="form-horizontal" action="" method="post">
											<table class="table vehi_model_class"  align="center" style="width:40em">
												<thead>
													<tr>
														<td class="text-center"><strong><?php echo e(trans('app.Model Name')); ?></strong></td>
														<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
													</tr>
												</thead>
												<tbody>
										
													<?php if(!empty($model_name)): ?>
													<?php $__currentLoopData = $model_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model_names): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr class="mod-<?php echo e($model_names->id); ?>" >
													<td class="text-center "><?php echo e($model_names->model_name); ?></td>
													<td class="text-center">
													
													<button type="button" modelid="<?php echo e($model_names->id); ?>" 
													deletemodel="<?php echo url('/vehicle/vehicle_model_delete'); ?>" class="btn btn-danger btn-xs modeldeletes">X</button>
													</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Model Name :')); ?> <span class="text-danger">*</span></label>
												<input type="text" class="form-control vehi_modal_name" name="model_name" id="model_name" placeholder="<?php echo e(trans('app.Enter Model Name')); ?>" maxlength="20" required />
											</div>
											<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
												
												<button type="button" class="btn btn-success vehi_model_add"  
												modelurl="<?php echo url('/vehicle/vehicle_model_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>	
						</div>
					</div>
				<!-- End Model Name -->
				 <!-- Vehicle Type  -->
					<div class="col-md-6">
						<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h4 class="modal-title"> <?php echo e(trans('app.Add Vehicle Type')); ?></h4>
									</div>
									<div class="modal-body">
									    <form class="form-horizontal formaction" action="" method="">
											<table class="table vehical_type_class"  align="center" style="width:40em">
												<thead>
													<tr>
														<td class="text-center"><strong><?php echo e(trans('app.Vehicle Type')); ?></strong></td>
														<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($vehical_type)): ?>
													<?php $__currentLoopData = $vehical_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr class="del-<?php echo e($vehical_types->id); ?>">
														<td class="text-center "><?php echo e($vehical_types->vehicle_type); ?></td>
														<td class="text-center">
															<button type="button" vehicletypeid="<?php echo e($vehical_types->id); ?>" 
															deletevehical="<?php echo url('/vehicle/vehicaltypedelete'); ?>" class="btn btn-danger btn-xs deletevehicletype">X</button>
														</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Vehicle Type:')); ?> <span class="text-danger">*</span></label>
												<input type="text" class="form-control vehical_type" name="vehical_type" id="vehical_type" placeholder="<?php echo e(trans('app.Enter Vehicle Type')); ?>" maxlength="20" required />
											</div>
											<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
												
												<button type="button" class="btn btn-success vehicaltypeadd" 
												url="<?php echo url('/vehicle/vehicle_type_add'); ?>" ><?php echo e(trans('app.Submit')); ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>	
						</div>
					</div>
				<!-- End  Vehicle Type  -->
			
				<!-- Vehicle Brand -->
					<div class="col-md-6">
						<div id="responsive-modal-brand" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h4 class="modal-title"><?php echo e(trans('app.Add Vehicle Brand')); ?></h4>
									</div>
									<div class="modal-body">
									    <form class="form-horizontal" action="" method="">
											<table class="table vehical_brand_class"  align="center" style="width:40em">
												<thead>
													<tr>
														<td class="text-center"><strong><?php echo e(trans('app.Vehicle Brand')); ?></strong></td>
														<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($vehical_brand)): ?>
													<?php $__currentLoopData = $vehical_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr class="del-<?php echo e($vehical_brands->id); ?>" >
													<td class="text-center "><?php echo e($vehical_brands->vehicle_brand); ?></td>
													<td class="text-center">
													
													<button type="button" brandid="<?php echo e($vehical_brands->id); ?>" 
													deletevehicalbrand="<?php echo url('/vehicle/vehicalbranddelete'); ?>" class="btn btn-danger btn-xs deletevehiclebrands">X</button>
													</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Vehicle Type:')); ?> <span class="text-danger">*</span></label>
												<select class="form-control  vehical_id" name="vehical_id" id="vehicleTypeSelect" vehicalurl="<?php echo url('/vehicle/vehicalformtype'); ?>" required >
													<option><?php echo e(trans('app.Select Vehicle Type')); ?></option>
														 <?php if(!empty($vehical_type)): ?>
															<?php $__currentLoopData = $vehical_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($vehical_types->id); ?>"><?php echo e($vehical_types->vehicle_type); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														<?php endif; ?>
												</select> 
											</div>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Vehicle Brand:')); ?> <span class="text-danger">*</span></label>
												<input type="text" class="form-control vehical_brand" name="vehical_brand" id="vehical_brand" placeholder="<?php echo e(trans('app.Enter Vehicle brand')); ?>" maxlength="25" required />
											</div>
											<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
												
												<button type="button" class="btn btn-success vehicalbrandadd" 
												   vehiclebrandurl="<?php echo url('/vehicle/vehicle_brand_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- End Vehicle Brand -->	
				<!-- Fuel Type -->	
					<div class="col-md-6">
						<div id="responsive-modal-fuel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h4 class="modal-title"><?php echo e(trans('app.Add Fuel Type')); ?></h4>
									</div>
									<div class="modal-body">
									    <form class="form-horizontal" action="" method="post">
											<table class="table fuel_type_class"  align="center" style="width:40em">
												<thead>
													<tr>
														<td class="text-center"><strong><?php echo e(trans('app.Fuel Type')); ?></strong></td>
														<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
													</tr>
												</thead>
												<tbody>
													<?php if(!empty($fuel_type)): ?>
													<?php $__currentLoopData = $fuel_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuel_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr class="del-<?php echo e($fuel_types->id); ?> data_of_type" >
													<td class="text-center "><?php echo e($fuel_types->fuel_type); ?></td>
													<td class="text-center">
													
													<button type="button" fuelid="<?php echo e($fuel_types->id); ?>" 
													deletefuel="<?php echo url('/vehicle/fueltypedelete'); ?>" class="btn btn-danger btn-xs fueldeletes">X</button>
													</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Fuel Type:')); ?> <span class="text-danger">*</span></label>
												<input type="text" class="form-control fuel_type" name="fuel_type" id="fuel_type" placeholder="<?php echo e(trans('app.Enter Fuel Type')); ?>" maxlength="20" required />
											</div>
											<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
												
												<button type="button" class="btn btn-success fueltypeadd"  
												fuelurl="<?php echo url('/vehicle/vehicle_fuel_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
											</div>
										</form>
									</div>
								</div>
							</div>	
						</div>
					</div>
				<!-- end Fuel Type -->       
	</div>

	<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>


<!-- customer add -->
<script>
		$('body').on('click','.openmodel',function(){
			$('#myModal').modal();
			
		});
		
	    $("#formcustomer").on('submit',(function(event) {
			function define_variable()
			{
				return {
				firstname:$("#firstname").val(),
				lastname:$("#lastname").val(),
				datepicker:$("#datepicker").val(),
				email:$("#email").val(),
				password:$("#password").val(),
				password_confirmation:$("#password_confirmation").val(),
				mobile:$("#mobile").val(),
				//landlineno:$("#landlineno").val(),
				image:$("#image").val(),
				country_id:$( "#country_id option:selected" ).val(),
				state_id:$( "#state_id option:selected" ).val(),
				city:$( "#city option:selected" ).val(),
				address:$( "#address" ).val(),
				name_pattern:/^[(a-zA-Z\s)]+$/,
				mobile_pattern:/^[0-9]*$/,
				email_pattern:/^([a-zA-Z0-9_\.\-\+\'])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
				};
			}
		 
			event.preventDefault();
			var call_var_customeradd = define_variable();
			var errro_msg = [];
			//first name
			if(call_var_customeradd.firstname == "")
			{
				var msg = "First name is required";
				$('#errorlfirstname').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlfirstname').html("");
				errro_msg = [];
			}
			
			if (!call_var_customeradd.name_pattern.test(call_var_customeradd.firstname))
			{
				var msg = "First name must be alphabets only";
				$("#firstname").val("");
				$('#errorlfirstname').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlfirstname').html("");
				errro_msg = [];
			}
			
			if(!call_var_customeradd.firstname.replace(/\s/g, '').length){
	        	var msg = "Only blank space not allowed";
	        	$("#firstname").val("");
				$('#errorlfirstname').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#errorlfirstname').html("");
				errro_msg = [];
			}

			//last name
			if(call_var_customeradd.lastname == "")
			{
				var msg = "Last name is required";
				$('#errorllastname').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorllastname').html("");
				errro_msg = [];
			}
			if (!call_var_customeradd.name_pattern.test(call_var_customeradd.lastname))
			{
				var msg = "Last name must be alphabets only";
				$('#errorllastname').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorllastname').html("");
				errro_msg = [];
			}
			
			if(!call_var_customeradd.lastname.replace(/\s/g, '').length){
	        	var msg = "Only blank space not allowed";
	        	$("#lastname").val("");
				$('#errorllastname').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#errorllastname').html("");
				errro_msg = [];
			}

			//Display name
			if (!call_var_customeradd.name_pattern.test(call_var_customeradd.displayname))
			{
				var msg = "Display name must be alphabets only";
				$('#errorldisplayname').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorldisplayname').html("");
				errro_msg = [];
			}
			
			//Date of birth
			if(call_var_customeradd.datepicker == "")
			{
				var msg = "Date of birth is required";
				$('#errorldatepicker').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorldatepicker').html("");
				errro_msg = [];
			}
		    
			//Email 
			if(call_var_customeradd.email == "")
			{
				var msg = "Email is required";
				$('#errorlemail').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlemail').html("");
				errro_msg = [];
			}

			if(!call_var_customeradd.email.replace(/\s/g, '').length){
	        	var msg = "Only blank space not allowed";
	        	$("#email").val("");
				$('#errorlemail').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#errorlfirstname').html("");
				errro_msg = [];
			}

			if (!call_var_customeradd.email_pattern.test(call_var_customeradd.email))
			{
				var msg = "Please enter a valid email address";
				$('#errorlemail').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlemail').html("");
				errro_msg = [];
			}
			

			//Password 
			if(call_var_customeradd.password == "")
			{
				var msg = "password is required";
				$('#errorlpassword').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlpassword').html("");
				errro_msg = [];
			}
			//Confirm Password 
			if(call_var_customeradd.password_confirmation == "")
			{
				var msg = "Confirm password is required";
				$('#errorlpassword_confirmation').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlpassword_confirmation').html("");
				errro_msg = [];
			}
			
			//same Password and password_confirmation  
			if(call_var_customeradd.password != call_var_customeradd.password_confirmation)
			{
				var msg = "confirm password is not matching";
				$('#errorlpassword_confirmation').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlpassword').html("");
				errro_msg = [];
			}
			//Mobile number 
			if(call_var_customeradd.mobile == "")
			{
				var msg = "Mobile number is required";
				$('#errorlmobile').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlmobile').html("");
				errro_msg = [];
			}
			if (!call_var_customeradd.mobile_pattern.test(call_var_customeradd.mobile))
			{
				var msg = "Please enter only number";
				$("#mobile").val("");
				$('#errorlmobile').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlmobile').html("");
				errro_msg = [];
			}
			
			//LandLine number
			/*if (!call_var_customeradd.mobile_pattern.test(call_var_customeradd.landlineno))
			{
				var msg = "Please enter only number";
				$('#errorllandlineno').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorllandlineno').html("");
				errro_msg = [];
			}*/
			
			//Country 
			if(call_var_customeradd.country_id == "")
			{
				var msg = "Country is required";
				$('#errorlcountry_id').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlcountry_id').html("");
				errro_msg = [];
			}
			//Address 
			if(call_var_customeradd.address == "")
			{
				var msg = "Address is required";
				$('#errorladdress').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorladdress').html("");
				errro_msg = [];
			}

			if(!call_var_customeradd.address.replace(/\s/g, '').length){
	        	var msg = "Only blank space not allowed";
	        	$("#address").val("");
				$('#errorladdress').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#errorladdress').html("");
				errro_msg = [];
			}
			
		if(errro_msg =="")
		{
			
		   var firstname =$('#firstname').val();
		   var lastname =$('#lastname').val();
		   var displayname =$('#displayname').val();
		   var company_name =$('#company_name').val();
		   var gender  = $(".gender:checked").val();
		   var dob  = $("#datepicker").val();
		   var email  = $("#email").val();
		   var password  = $("#password").val();
		   var mobile  = $("#mobile").val();
		   var landlineno  = $("#landlineno").val();
		   var image  = $("#image").val();
		   var country_id  = $( "#country_id option:selected" ).val();
		   var state_id  = $( "#state_id option:selected" ).val();
		   var city  = $( "#city option:selected" ).val();
		   var address  = $( "#address" ).val();
		  
		   $.ajax({
			   type: 'POST',
			   url: '<?php echo url('service/customeradd'); ?>',
			    data: new FormData(this), 
				headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
				contentType: false,       
				cache: false,             
				processData:false, 
				
			   success:function(data)
			   {
			   		$('.select_vhi').append('<option value='+data['customerId']+'>'+data['customer_fullname']+'</option>');

				   /*var firstname =$('#firstname').val();
				   $('.select_vhi').append('<option value='+data+'>'+firstname+'</option>');*/

				   	var firstname = $('#firstname').val('');
				   	var lastname =$('#lastname').val('');
				   	var displayname =$('#displayname').val('');
				   	var gender  = $(".gender:checked").val('');
				   	var dob  = $("#datepicker").val('');
				   	var email  = $("#email").val('');
				   	var password  = $("#password").val('');
				   	var mobile  = $("#mobile").val('');
				   	var landlineno  = $("#landlineno").val('');
				   	var image  = $("#image").val('');
				   	var country_id  = $( "#country_id option:selected" ).val('');
				   	var state_id  = $( "#state_id option:selected" ).val('');
				   	var city  = $( "#city option:selected" ).val('');
				   	var address  = $( "#address" ).val('');
				   	var company_name  = $( "#company_name" ).val('');
					$(".addcustomermsg").removeClass("hide");

				   	$('.hidden_customer_id').val(data['customerId']);
			   },
			    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }	  
			   
		   });
			
		}	
		}));
	</script>
<!-- customer model state to city -->
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
<!-- Vehicle add -->
<script>
$('body').on('click','.vehiclemodel',function(){
	$('#vehiclemodel').model();
});
</script>

<!-- vehical Type from brand -->
<script>
$(document).ready(function(){
	
	$('.select_vehicaltype').change(function(){
		vehical_id = $(this).val();
		var url = $(this).attr('vehicalurl');

		$.ajax({
			type:'GET',
			url: url,
			data:{ vehical_id:vehical_id },
			success:function(response){
				$('.select_vehicalbrand').html(response);
			}
		});
	});
	
});
</script>
<!-- images show in multiple in for loop -->

<script>
$(document).ready(function(){
    $(".imageclass").click(function(){
        $(".classimage").empty();
    });
});
</script>
 <script>
		function preview_images() 
		{
		 var total_file=document.getElementById("images").files.length;
		 
		 for(var i=0;i<total_file;i++)
		 {
			 
		  $('#image_preview').append("<div class='col-md-3 col-sm-3 col-xs-12' style='padding:5px;'><img class='uploadImage' src='"+URL.createObjectURL(event.target.files[i])+"' width='100px' height='60px'> </div>");
		 }
		}
		
</script>	

<!-- vehicle add -->
<script>
$('body').on('click','.addvehicleservice',function(event){
	function define_variable()
		{
			return {
				vehical_id1:$("#vehical_id1").val(),
				chasicno1:$("#chasicno1").val(),
				vehicabrand1:$("#vehicabrand1").val(),
				modelname1:$("#modelname1").val(),
				engineno1:$("#engineno1").val(),
				pp:$('#price1').val(),
				pricePattern:/^[0-9]*$/,
			};
		}
			event.preventDefault();
			var call_var_vehicleadd = define_variable();
			var errro_msg = [];
			//Vehicle type
			if(call_var_vehicleadd.vehical_id1 == "")
			{
				var msg = "Vehical type is required";
				$('#errorlvehical_id1').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlvehical_id1').html("");
				errro_msg = [];
			}
			//chasic number
			/*if(call_var_vehicleadd.chasicno1 == "")
			{
				var msg = "Chassis number is required";
				$('#errorlchasicno1').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlchasicno1').html("");
				errro_msg = [];
			}*/
			//Vehical brand
			if(call_var_vehicleadd.vehicabrand1 == "")
			{
				var msg = "Vehical brand is required";
				$('#errorlvehicabrand1').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlvehicabrand1').html("");
				errro_msg = [];
			}
			//Model name
			if(call_var_vehicleadd.modelname1 == "")
			{
				var msg = "Model name is required";
				$('#errorlmodelname1').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlmodelname1').html("");
				errro_msg = [];
			}
			//Engine number
			/*if(call_var_vehicleadd.engineno1 == "")
			{
				var msg = "Engine number is required";
				$('#errorlengineno1').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#errorlengineno1').html("");
				errro_msg = [];
			}*/

			//Price
			if(call_var_vehicleadd.pp == "")
			{
				var msg = "Price is required";
				$('#ppe').html(msg);
				errro_msg.push(msg);
				return false;
			}
			else
			{
				$('#ppe').html("");
				errro_msg = [];
			}

			if(!call_var_vehicleadd.pp.replace(/\s/g, '').length){
	        	var msg = "Only blank space not allowed";
	        	$('#price1').val("");
				$('#ppe').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#ppe').html("");
				errro_msg = [];
			}

			if(!call_var_vehicleadd.pricePattern.test(call_var_vehicleadd.pp)){
	        	var msg = "Only numeric data allowed";
	        	$('#price1').val("");
				$('#ppe').html(msg);
				errro_msg.push(msg);
				return false;
	        }
	        else{
				$('#ppe').html("");
				errro_msg = [];
			}

		if(errro_msg =="")
		{
			var vehical_id1 =$('#vehical_id1').val();
			var chasicno1 =$('#chasicno1').val();
			var vehicabrand1 =$('#vehicabrand1').val();
			var modelyear1 =$('#modelyear1').val();
			var fueltype1 =$('#fueltype1').val();
			var gearno1 =$('#gearno1').val();
			var modelname1 =$('#modelname1').val();
			var price1 =$('#price1').val();
			var odometerreading1 =$('#odometerreading1').val();
			var dom1 =$('#dom1').val();
			var gearbox1 =$('#gearbox1').val();
			var gearboxno1 =$('#gearboxno1').val();
			var engineno1 =$('#engineno1').val();
			var enginesize1 =$('#enginesize1').val();
			var keyno1 =$('#keyno1').val();
			var engine1 =$('#engine1').val();
			var numberPlate =$('#number_plate').val();
			var customer_id =$('.hidden_customer_id').val();
			
			$.ajax({
				type:'get',
				url:'<?php echo url('/service/vehicleadd'); ?>',
				data:{vehical_id1:vehical_id1,chasicno1:chasicno1,vehicabrand1:vehicabrand1,modelyear1:modelyear1,fueltype1:fueltype1,gearno1:gearno1,modelname1:modelname1,price1:price1,odometerreading1:odometerreading1,dom1:dom1,gearbox1:gearbox1,gearboxno1:gearboxno1,engineno1:engineno1,enginesize1:enginesize1,keyno1:keyno1,engine1:engine1,numberPlate:numberPlate,customer_id:customer_id},
				success: function(data){
					
					var modelname1 = $('#modelname1').val();
					
					$('.modelnameappend').append('<option value='+data+'>'+modelname1+'</option>');
					var vehical_id1 =$('#vehical_id1').val('');
					var chasicno1 =$('#chasicno1').val('');
					var vehicabrand1 =$('#vehicabrand1').val('');
					var modelyear1 =$('#modelyear1').val('');
					var fueltype1 =$('#fueltype1').val('');
					var gearno1 =$('#gearno1').val('');
					var modelname1 =$('#modelname1').val('');
					var price1 =$('#price1').val('');
					var odometerreading1 =$('#odometerreading1').val('');
					var dom1 =$('#dom1').val('');
					var gearbox1 =$('#gearbox1').val('');
					var gearboxno1 =$('#gearboxno1').val('');
					var engineno1 =$('#engineno1').val('');
					var enginesize1 =$('#enginesize1').val('');
					var keyno1 =$('#keyno1').val('');
					var engine1 =$('#engine1').val('');
					var number_plate =$('#number_plate').val('');
					$(".addvehiclemsg").removeClass("hide");									   
				},
				error: function(e){
					alert("An error occurred: " + e.responseText);
							console.log(e);
				}
			});
		}
	
});
</script>
<!-- Add Vehicle Model -->

<script>
	$(document).ready(function(){
		$('.vehi_model_add').click(function(){

			var model_name = $('.vehi_modal_name').val();
			var model_url = $(this).attr('modelurl');
			
			function define_variable()
			{
				return {
					vehicle_model_value: $('.vehi_modal_name').val(),
					vehicle_model_pattern: /^[(a-zA-Z0-9\s)]+$/,
				};
			}
		
			var call_var_vehiclemodeladd = define_variable();		 

	        if(model_name == ""){
            	swal('Please enter model name');
        	}
	        else if (!call_var_vehiclemodeladd.vehicle_model_pattern.test(call_var_vehiclemodeladd.vehicle_model_value))
			{
				$('.vehi_modal_name').val("");
				swal('Please enter only alphanumeric data');
			}
	        else if(!model_name.replace(/\s/g, '').length){
				$('.vehi_modal_name').val("");
	        	swal('Only blank space not allowed');
	        }
			else{
				$.ajax({
						
					type:'GET',
					url:model_url,
					data:{model_name:model_name},
					
					success:function(data)
					{						
						var newd = $.trim(data);
						var classname = 'mod-'+newd;									
					if(newd == '01')
					{
						swal("Duplicate Data !!! Please try Another... ");
					}
					else
					{
						$('.vehi_model_class').append('<tr class="'+classname+'"><td class="text-center">'+model_name+'</td><td class="text-center"><button type="button" modelid='+data+' deletemodel="<?php echo url('/vehicle/vehicle_model_delete'); ?>" class="btn btn-danger btn-xs modeldeletes">X</button></a></td><tr>');
						$('.model_addname').append('<option value="'+model_name+'">'+model_name+'</option>');
						$('.vehi_modal_name').val('');
					}
					},
				});
			}
		});
		
	$('body').on('click','.modeldeletes',function(){
			
			var mod_del_id = $(this).attr('modelid');
			var del_url = $(this).attr('deletemodel');
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(isConfirm){
				if (isConfirm) {
					$.ajax({
							type:'GET',
							url:del_url,
							data:{mod_del_id:mod_del_id},
							success:function(data)
							{
								$('.mod-'+mod_del_id).remove();
								$(".model_addname option[value="+mod_del_id+"]").remove();
								swal("Done!","It was succesfully deleted!","success");
							}
						});
					}else{
						swal("Cancelled", "Your imaginary file is safe :)", "error");
						} 
				})
		});	
	});

</script>
<!-- End Add Vehicle Model -->
<!-- vehicle type -->
<script>
    $(document).ready(function(){
		
		$('.vehicaltypeadd').click(function(){
			
		var vehical_type= $('.vehical_type').val();
		var url = $(this).attr('url');

        function define_variable()
		{
			return {
				vehicle_type_value: $('.vehical_type').val(),
				vehicle_type_pattern: /^[(a-zA-Z0-9\s)]+$/,
			};
		}
	
		var call_var_vehicletypeadd = define_variable();		 

        if(vehical_type == ""){
            swal('Please enter vehicle type');
        }
        else if (!call_var_vehicletypeadd.vehicle_type_pattern.test(call_var_vehicletypeadd.vehicle_type_value))
		{
			$('.vehical_type').val("");
			swal('Please enter only alphanumeric data');
		}
        else if(!vehical_type.replace(/\s/g, '').length){
			$('.vehical_type').val("");
        	swal('Only blank space not allowed');
        }
        else{ 
				$.ajax({
						type:'GET',
						url:url,

			   data :{vehical_type:vehical_type},

			   success:function(data)
			   {
				   
				   var newd = $.trim(data);
				   
				   var classname = 'del-'+newd;
				   
				  
				   
				   if (newd == '01')
				   {
					   swal('Duplicate Data !!! Please try Another...');
				   }
				   else
				   {
				   $('.vehical_type_class').append('<tr class="'+classname+'"><td class="text-center">'+vehical_type+'</td><td class="text-center"><button type="button" vehicletypeid='+data+' deletevehical="<?php echo url('/vehicle/vehicaltypedelete'); ?>" class="btn btn-danger btn-xs deletevehicletype">X</button></a></td><tr>');
				   
					$('.select_vehicaltype').append('<option value='+data+'>'+vehical_type+'</option>');
					$('.vehical_type').val('');
					
					$('.vehical_id').append('<option value='+data+'>'+vehical_type+'</option>');
					$('.vehical_type').val('');
				   }
				   
			   },
			   
		 });
		}
	});
	});
</script>
<!-- vehical Type delete-->
<script>
$(document).ready(function(){
	
	$('body').on('click','.deletevehicletype',function(){
		
		var vtypeid = $(this).attr('vehicletypeid');
		
		var url = $(this).attr('deletevehical');
		
		swal({
		     title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
         function(isConfirm){
				if (isConfirm) {
					$.ajax({
							type:'GET',
							url:url,
							data:{vtypeid:vtypeid},
							success:function(data){
		
								$('.del-'+vtypeid).remove();
								$(".select_vehicaltype option[value="+vtypeid+"]").remove();
								swal("Done!","It was succesfully deleted!","success");
					}
					});
				}else{
						swal("Cancelled", "Your imaginary file is safe :)", "error");
						} 
				})
	
		});
	});
</script>
<!-- vehical brand -->


<script>
    $(document).ready(function(){
		
		$('.vehicalbrandadd').click(function(){

	        var vehical_id = $('.vehical_id').val();
			var vehical_brand= $('.vehical_brand').val();
			var url = $(this).attr('vehiclebrandurl');
		
			function define_variable()
			{
				return {
					vehicle_brand_value: $('.vehical_brand').val(),
					vehicle_brand_pattern: /^[(a-zA-Z0-9\s)]+$/,
				};
			}
			
			var call_var_vehiclebrandadd = define_variable();		

			if ($("#vehicleTypeSelect")[0].selectedIndex <= 0) {

				swal('Please first select vehicle type');
			}
			else{
				if(vehical_brand == ""){
		            swal('Please enter vehicle brand');
		        }
		        else if (!call_var_vehiclebrandadd.vehicle_brand_pattern.test(call_var_vehiclebrandadd.vehicle_brand_value))
				{
					$('.vehical_brand').val("");
					swal('Please enter only alphanumeric data');

				}
		        else if(!vehical_brand.replace(/\s/g, '').length){
		       		// var str = "    ";
					$('.vehical_brand').val("");
		        	swal('Only blank space not allowed');
		        }
		        else{
					$.ajax({
					   type:'GET',
					   url:url,
		             
					   data :{vehical_id:vehical_id,
					         vehical_brand:vehical_brand
					   },

					   success:function(data)
		               
		               { 
					       var newd = $.trim(data);
						   var classname = 'del-'+newd;
		                  
					    if (newd == "01")
					       {
					 	     swal('Duplicate Data !!! Please try Another...');
						   }
						   else
						   {
						   	 
							   $('.vehical_brand_class').append('<tr class="'+classname+'"><td class="text-center">'+vehical_brand+'</td><td class="text-center"><button type="button" brandid='+data+' deletevehicalbrand="<?php echo url('vehicle/vehicalbranddelete'); ?>" class="btn btn-danger btn-xs deletevehiclebrands">X</button></a></td><tr>');
								$('.select_vehicalbrand').append('<option value='+data+'>'+vehical_brand+'</option>');
								$('.vehical_brand').val('');
							}
					     
					   },
					   
				 	});
				}
			}
		});
	});
</script>

<!-- vehical brand delete-->

	<script>
	$(document).ready(function(){
		$('body').on('click','.deletevehiclebrands',function(){
			
		var vbrandid = $(this).attr('brandid');
		var url = $(this).attr('deletevehicalbrand');
		swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
         function(isConfirm){
				if (isConfirm) {  
				$.ajax({
						type:'GET',
						url:url,
						data:{vbrandid:vbrandid},
						success:function(data){
							 $('.del-'+vbrandid).remove();
							 $(".select_vehicalbrand option[value="+vbrandid+"]").remove();
							swal("Done!","It was succesfully deleted!","success");
						}
					});
				}else{
						swal("Cancelled", "Your imaginary file is safe :)", "error");
					} 
				})
	});
	});
	</script>
<!-- Datepicker-->
  <script type="text/javascript">

  	var today = new Date();
  	var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    $(".datepicker").datetimepicker({
		 format: "<?php echo getDatetimepicker(); ?>",
		 autoclose:true,
		 todayBtn: true,
		 startDate : dateTime
    });
 </script>    
<script type="text/javascript">
    $(".datepickercustmore").datetimepicker({
		format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
		endDate: new Date(),
	});
</script>	
<script>
    $('.datepicker1').datetimepicker({
       format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
    });
</script>
<script>
    $('#myDatepicker2').datetimepicker({
       format: "yyyy",
		autoclose: 2,
		minView: 4,
		startView: 4,
		
    });
</script>
<script>
    $(function() {
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

<script>

$(document).ready(function(){
	
	$('body').on('change','.select_vhi',function(){
	
		var url = $(this).attr('cus_url');
		var cus_id = $(this).val();
		var modelnms = $(this).val();
	
		$.ajax({
			
			type:'GET',
			url:url,
			data:{cus_id:cus_id,modelnms:modelnms},
			success:function(response)
			{	
			   
				$('.modelnms').remove();
				$('#vhi').append(response);
			}
			
		});
	});

		
	$('body').on('click','#vhi',function(){
	
		var cus_id = $('.select_vhi').val();
		
		if(cus_id =="")
		{
			swal({   
				title: "Alert",
				text: "Please select customer!"   

				});
				return false;
		}
	});	
	
	/*If vehicle add when customer is selected otherwise not add vehicle*/
	$('body').on('click','.vehiclemodel',function(){
	
		var cus_id = $('.select_vhi').val();
		
		if(cus_id =="")
		{
			swal({   
					title: "Alert",
					text: "Please select customer!"   
				});
			return false;
		}
	});

	$('body').on('change','#vhi',function(){
	
		var vehi_id =  $('.modelnms:selected').val();
		var url = '<?php echo e(url('service/getregistrationno')); ?>';
		$.ajax({
			
			type:'GET',
			url:url,
			data:{vehi_id:vehi_id},
			success:function(response)
			{	
				var res = $.trim(response);
				if(res == "")
				{
					$('#reg_no').val(res);
					$('#reg_no').removeAttr('readonly');
				}
				else
				{	
					$('#reg_no').val(res);
					$('#reg_no').attr('readonly',true);
				}
			}
			
		});
		
	});	
});
</script>

<!-- Fuel type -->
<script>
    $(document).ready(function(){
		
		$('.fueltypeadd').click(function(){
			 
		var fuel_type= $('.fuel_type').val();
		var url = $(this).attr('fuelurl');
        
        function define_variable()
		{
			return {
				vehicle_fuel_value: $('.fuel_type').val(),
				vehicle_fuel_pattern: /^[(a-zA-Z0-9\s)]+$/,
			};
		}
		
		var call_var_vehiclefueladd = define_variable();
		
        if(fuel_type == ""){
            swal('Please enter fuel type');
        }
        else if (!call_var_vehiclefueladd.vehicle_fuel_pattern.test(call_var_vehiclefueladd.vehicle_fuel_value))
		{
			$('.fuel_type').val("");
			swal('Please enter only alphanumeric data');

		}
        else if(!fuel_type.replace(/\s/g, '').length){
       		// var str = "    ";
			$('.fuel_type').val("");
        	swal('Only blank space not allowed');
        }
        else{  
			$.ajax({
			   type:'GET',
			   url:url,

			   data :{fuel_type:fuel_type},
			   success:function(data)
			   {
				    
			       var newd = $.trim(data);
				   var classname = 'del-'+newd;
				   
				   if(newd == '01')
				   {
					   swal('Duplicate Data !!! Please try Another...');
				   }
				   else
				   {
				    $('.fuel_type_class').append('<tr class="'+classname+'"><td class="text-center">'+fuel_type+'</td><td class="text-center"><button type="button" fuelid='+data+' deletefuel="<?php echo url('/vehicle/fueltypedelete'); ?>" class="btn btn-danger btn-xs fueldeletes">X</button></a></td><tr>');
					$('.select_fueltype').append('<option value='+data+'>'+fuel_type+'</option>');
					$('.fuel_type').val('');
				   }
			     
			   },
			   
			});
		}
		});
	});
</script>
<!-- Fuel  Type delete-->

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

				/*If select customer after customer id assigned to vehicle add form customer_id inputbox*/
				$('.hidden_customer_id').val(supplierValue);
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
<?php echo JsValidator::formRequest('App\Http\Requests\ServiceAddEditFormRequest', '#ServiceAdd-Form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.serviceSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.serviceAddForm').submit(function () {
        $('.serviceSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.serviceAddForm').bind('invalid-form.validate', function () {
      $('.serviceSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/service/add.blade.php ENDPATH**/ ?>
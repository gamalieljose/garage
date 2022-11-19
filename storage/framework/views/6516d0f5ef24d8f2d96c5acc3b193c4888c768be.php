

<?php $__env->startSection('content'); ?>
<style>
.removeimage{float:left;    padding: 5px; height: 70px;}
.removeimage .text {
position:relative;
bottom: 45px;
display:block;
left: 20px;
font-size:18px;
color:red;
visibility:hidden;
}
.removeimage:hover .text {
visibility:visible;
}
</style>

<!-- page content -->
	<div class="right_col" role="main">
		<div class="page-title">
			 <div class="nav_menu">
				<nav>
				  <div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Vehicle')); ?></span></a>
				  </div>
					  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</nav>
			</div>
		</div>
		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs" role="tablist">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/vehicle/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><?php echo e(trans('app.Vehicle List')); ?></span></a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle_edit')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/vehicle/list/edit/'.$editid); ?>"><span class="visible-xs"></span> <i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i><b><?php echo e(trans('app.Edit Vehicle')); ?></b></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<form id="vehicleEdit-Form"  action="update/<?php echo e($vehicaledit->id); ?>" method="post" enctype="multipart/form-data"  class="form-horizontal upperform">
							
							<div class="form-group">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Vehicle Type')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-2 col-sm-2 col-xs-12">
										<select class="form-control select_vehicaltype" name="vehical_id"
										 vehicalurl="<?php echo url('/vehicle/vehicaltypefrombrand'); ?>">
											<option value=""><?php echo e(trans('app.Select Vehicle Type')); ?></option>
												<?php if(!empty($vehical_type)): ?>
													<?php $__currentLoopData = $vehical_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($vehical_types->id); ?>" <?php if($vehical_types->id == $vehicaledit->vehicletype_id) {echo 'selected'; }?>><?php echo e($vehical_types->vehicle_type); ?></option>	
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
										</select> 
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal" data-toggle="modal"><?php echo e(trans('app.Add Or Remove')); ?></button>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Chasic No')); ?> <label class="text-danger"></label> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="chasicno"  value="<?php echo e($vehicaledit->chassisno); ?>" placeholder="<?php echo e(trans('app.Enter ChasicNo')); ?>" maxlength="30"  class="form-control">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Vehicle Brand')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-2 col-sm-2 col-xs-12">
										<select class="form-control   select_vehicalbrand" name="vehicabrand" >

														<option value=""><?php echo e(trans('app.Select Vehicle Brand')); ?></option>
												  <?php if(!empty($vehical_brand)): ?>
													<?php $__currentLoopData = $vehical_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($vehical_brands->id); ?>" <?php if($vehical_brands->id==$vehicaledit->vehiclebrand_id) { echo "selected"; }?>><?php echo e($vehical_brands->vehicle_brand); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?> 
												  </select> 
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-brand" data-toggle="modal"><?php echo e(trans('app.Add Or Remove')); ?></button>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Model Years')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date" id="myDatepicker2" >
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										<input type="text"  name="modelyear" autocomplete="off" value="<?php echo e($vehicaledit->modelyear); ?>"  class="form-control" readonly  />
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Fuel Type')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-2 col-sm-2 col-xs-12">
										<select class="form-control select_fueltype " name="fueltype" >
											<option value=""><?php echo e(trans('app.Select fuel type')); ?></option>
										<?php if(!empty($fueltype)): ?>
											<?php $__currentLoopData = $fueltype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fueltypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($fueltypes->id); ?>"<?php if($fueltypes->id == $vehicaledit->fuel_id){ echo"selected"; } ?>> <?php echo e($fueltypes->fuel_type); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?> 
										</select> 
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-fuel" data-toggle="modal"><?php echo e(trans('app.Add Or Remove')); ?></button>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.No of Grear')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearno"  value="<?php echo e($vehicaledit->nogears); ?>" placeholder="<?php echo e(trans('app.Enter No of Gear')); ?>" maxlength="30" class="form-control" >
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Model Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-2 col-sm-2 col-xs-12">
									
										<select class="form-control model_addname" name="modelname" required>
											<option value="<?php echo e($vehicaledit->modelname); ?>"><?php echo e($vehicaledit->modelname); ?></option>
										<?php if(!empty($model_name)): ?>
											<?php $__currentLoopData = $model_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model_names): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($model_names->model_name); ?>"><?php echo e($model_names->model_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</select>
									</div>
									
									<div class="col-md-2 col-sm-2 col-xs-12 addremove">
										<button type="button" class="btn btn-default" data-target="#responsive-modal-vehi-model" data-toggle="modal"><?php echo e(trans('app.Add Or Remove')); ?></button>
									</div>
								</div>

								<div class="<?php echo e($errors->has('price') ? ' has-error' : ''); ?> my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="price"  value="<?php echo e($vehicaledit->price); ?>" placeholder="<?php echo e(trans('app.Enter Price')); ?>" maxlength="10"  class="form-control" required>
										<!-- <?php if($errors->has('price')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('price')); ?></strong>
										   </span>
										<?php endif; ?> -->
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="<?php echo e($errors->has('odometerreading') ? ' has-error' : ''); ?>">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Odometer Reading')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="odometerreading"  
										value="<?php echo e($vehicaledit->odometerreading); ?>" placeholder="<?php echo e(trans('app.Enter Odometer Reading')); ?>"  class="form-control" maxlength="30">
										<?php if($errors->has('odometerreading')): ?>
										   <span class="help-block">
											   <strong><?php echo e($errors->first('odometerreading')); ?></strong>
										   </span>
									   <?php endif; ?>
									</div>
								</div>
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Date Of Manufacturing')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
										
										<?php if($vehicaledit->dom): ?>
											<input type="text"  name="dom" autocomplete="off" placeholder="<?php echo getDateFormat();?>" value="<?php echo e(date(getDateFormat(),strtotime($vehicaledit->dom))); ?>" class="form-control" onkeypress="return false;" />
										<?php else: ?>
											<input type="text" id="datepicker" autocomplete="off" class="form-control" placeholder="<?php echo getDateFormat();?>" value="" name="dom" onkeypress="return false;" />
										<?php endif; ?>											
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Gear Box')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearbox"  value="<?php echo e($vehicaledit->gearbox); ?>" placeholder="<?php echo e(trans('app.Enter Grear Box')); ?>" maxlength="20" class="form-control">
									</div>
								</div>
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Gear Box No')); ?> </label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="gearboxno"  value="<?php echo e($vehicaledit->gearboxno); ?>" placeholder="<?php echo e(trans('app.Enter Gearbox No')); ?>" maxlength="20" class="form-control" >
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Engine No')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="engineno"  value="<?php echo e($vehicaledit->engineno); ?>" placeholder="<?php echo e(trans('app.Enter Engine No')); ?>" maxlength="30"  class="form-control">
									</div>
								</div>
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Engine Size')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="enginesize"  value="<?php echo e($vehicaledit->enginesize); ?>" placeholder="<?php echo e(trans('app.Enter Engine Size')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Key No')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="keyno"  value="<?php echo e($vehicaledit->keyno); ?>" placeholder="<?php echo e(trans('app.Enter Key No')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Engine')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="engine"  value="<?php echo e($vehicaledit->engine); ?>" placeholder="<?php echo e(trans('app.Enter Engine')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Number Plate')); ?> <label class="text-danger"></label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text"  name="number_plate"  value="<?php echo e($vehicaledit->number_plate); ?>" placeholder="<?php echo e(trans('app.Enter Number Plate')); ?>" maxlength="30" class="form-control">
									</div>
								</div>
							</div>
							<div class=" col-md-12 col-sm-12 col-xs-12 form-group" style="padding:5px 0px 5px 0px">
							</div>
						<div class="form-group">
			<!-- Vehical images  -->
							<div class="col-md-6 col-sm-12 col-xs-12 form-group my-form-group">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<h2><?php echo e(trans('app.Vehicle Images')); ?></h2>
									<span> <h5 style="margin-left: 10px;"> <?php echo e(trans('app.Select Multiple Images')); ?> </h5> </span>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<input type="file"   name="image[]"   class="form-control imageclass" data-max-file-size="5M" id="images" onchange="preview_images();" multiple >
										
										<div class="row" id="image_preview">
											<?php if(!empty($images1)): ?>
												<?php $__currentLoopData = $images1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="col-md-4 col-sm-4 col-xs-12 removeimage delete_image" id="image_remove_<?php echo $images2->id; ?>"  imgaeid="<?php echo e($images2->id); ?>" delete_image="<?php echo url('vehicle/delete/getImages'); ?>">
															<a href=""><img src="<?php echo e(url('public/vehicle/'.$images2->image)); ?>"  width="100px" height="60px"> 
															<p class="text"><?php echo e(trans('app.Remove')); ?></p> </a>
														</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</div>
								</div>
							</div>
						
				<!--vehical color-->
							<div class="col-md-6 col-sm-12 col-xs-12 form-group" style="padding-right:0px;">
								<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:0px;">
									<h2><?php echo e(trans('app.Vehicle Color')); ?> </h2></span>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6" style="padding-bottom: 33px;">
									<button type="button" id="add_new_color" class="btn btn-default newadd" url="<?php echo url('vehicle/add/getcolor'); ?>"><?php echo e(trans('app.Add New')); ?>

									</button>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12" style="padding-bottom:5px">
									<table class="table table-bordered addtaxtype"  id="tab_color" align="center">
										<thead>
											<tr>
												<th class="all"><?php echo e(trans('app.Colors')); ?></th>
												<th><?php echo e(trans('app.Action')); ?></th>
											</tr>
										</thead>			
										<tbody>
										<?php if(!empty($colors1)): ?>
											<?php $__currentLoopData = $colors1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr id="color_id_<?php echo e($item->id); ?>">
													<td>
														<select name="color[]" class="form-control color" id="tax_<?php echo e($item->id); ?>" data-id="1" >
															<option value="0"><?php echo e(trans('app.Select Color')); ?></option>
															<?php if(!empty($color)): ?>
																<?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($colors->id); ?>"
																	<?php if($colors->id == ($item->color)){ echo"selected"; } ?>><?php echo e($colors->color); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endif; ?>
														</select>
													</td>
													<td>
														<span class="remove_color" data-id="<?php echo e($item->id); ?>" colordelete="<?php echo url('vehicle/delete/getcolor'); ?>"><i class="fa fa-trash"></i> <?php echo e(trans('app.Delete')); ?></span>
													</td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group">	
		 <!-- Vehical Description  -->
							<div class="col-md-6 col-sm-12 col-xs-12 form-group">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h2><?php echo e(trans('app.Vehicle Description')); ?> </h2>
								</div> 
								<div class="col-md-6 col-sm-6 col-xs-6" style="padding-bottom: 33px;">
									<button type="button" id="add_new_description" class="btn btn-default newadd" url="<?php echo url('vehicle/add/getDescription'); ?>"><?php echo e(trans('app.Add New')); ?> </button>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<table class="table table-bordered addtaxtype"  id="tab_decription_detail" align="center">
										<thead>
											<tr>
												<th class="all"><?php echo e(trans('app.Description')); ?></th>
												<th><?php echo e(trans('app.Action')); ?></th>
											</tr>
										</thead>			
										<tbody>
											 <?php if(!empty($vehicaldes)): ?>
												<?php $__currentLoopData = $vehicaldes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicaldess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr id="row_id_<?php echo e($vehicaldess->id); ?>">
														<td>
															<textarea name="description[]" class="form-control"  id="tax_<?php echo e($vehicaldess->id); ?>" maxlength="100"><?php echo e($vehicaldess->vehicle_description); ?></textarea>
														</td>
														<td>
															<span class="delete_description" data-id="<?php echo e($vehicaldess->id); ?>" delete_description="<?php echo url('vehicle/delete/getDescription'); ?>"><i class="fa fa-trash"></i> <?php echo e(trans('app.Delete')); ?></span>
														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>					
							</div>
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
									$userid = $vehicaledit->id;
									$datavalue = getCustomDataVehicle($tbl_custom,$userid);

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
														$getRadioValue = getRadioLabelValueForUpdateForAllModules($tbl_custom_field->form_name ,$vehicaledit->id, $tbl_custom_field->id);

													 	if($k == $getRadioValue) { echo "checked"; }
													?> 
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
														$getCheckboxValue = getCheckboxLabelValueForUpdateForAllModules($tbl_custom_field->form_name, $vehicaledit->id, $tbl_custom_field->id);
													?>
													<div style="margin-top: 5px;">
												<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"
														<?php
														 	if($val == getCheckboxValForAllModule($tbl_custom_field->form_name, $vehicaledit->id, $tbl_custom_field->id,$val)) 
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
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
									<a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									<button type="submit" class="btn btn-success"><?php echo e(trans('app.Update')); ?></button>
								</div>
							</div>
						</form>
					</div>
					
		   <!-- Vehical Type  -->
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
													<tr class="del-<?php echo e($vehical_types->id); ?> data_of_type" >
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
												<label><?php echo e(trans('app.Vehicle Type:')); ?> <span class="color-danger">*</span></label>
												<input type="text" class="form-control vehical_type" name="vehical_type" id="vehical_type" placeholder="Enter Vehical Type" maxlength="20" required />
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
			 <!-- End  Vehical Type  -->
			
			<!-- Vehical Brand -->	
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
													<tr class="del-<?php echo e($vehical_brands->id); ?> data_of_type" >
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
													<label><?php echo e(trans('app.Vehicle Type:')); ?> <span class="color-danger">*</span></label>
														<select class="form-control  vehical_id" id="vehicleTypeSelect" name="vehical_id" vehicalurl="<?php echo url('/vehicle/vehicalformtype'); ?>">
															<option value=""><?php echo e(trans('app.Select Vehicle Type')); ?></option>
															<?php if(!empty($vehical_type)): ?>
																<?php $__currentLoopData = $vehical_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehical_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($vehical_types->id); ?>"><?php echo e($vehical_types->vehicle_type); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															<?php endif; ?>
														</select> 
												</div>
												<div class="col-md-8 form-group data_popup">
													<label><?php echo e(trans('app.Vehicle Brand:')); ?> <span class="color-danger">*</span></label>
													<input type="text" class="form-control vehical_brand" name="vehical_brand" id="vehical_brand" placeholder="Enter Vehical brand" maxlength="30" required />
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
				<!-- End Vehical Brand -->	
		
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
													<?php if(!empty($fueltype)): ?>
													<?php $__currentLoopData = $fueltype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fueltypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr class="del-<?php echo e($fueltypes->id); ?> data_of_type" >
													<td class="text-center "><?php echo e($fueltypes->fuel_type); ?></td>
													<td class="text-center">
													
													<button type="button" fuelid="<?php echo e($fueltypes->id); ?>" 
													deletefuel="<?php echo url('/vehicle/fueltypedelete'); ?>" class="btn btn-danger btn-xs fueldeletes">X</button>
													</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</tbody>
											</table>
											<div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Fuel Type:')); ?> <span class="color-danger">*</span></label>
												<input type="text" class="form-control fuel_type" name="fuel_type" id="fuel_type" placeholder="<?php echo e(trans('app.Enter Fuel Type')); ?>" maxlength="30" required />
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
													<tr class="mod-<?php echo e($model_names->id); ?> data_of_type" >
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
												<label><?php echo e(trans('app.Model Name :')); ?> <span class="color-danger">*</span> </label>
												<input type="text" class="form-control vehi_modal_name" name="model_name" id="model_name" placeholder="<?php echo e(trans('app.Enter Model Name')); ?>" maxlength="30" required />
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
				</div>
			</div>
		</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
	<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
       format: "yyyy",
		autoclose: 2,
		minView: 4,
		startView: 4,
    });
</script>
<script type="text/javascript">
    $(".datepicker").datetimepicker({
		format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
	});
 </script>
<!-- vehical type -->
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
					  
					   if (data == '01')
					   {
						   
						   swal('Duplicate Data !!! Please try Another...');
					   }
					   else
					   {
					   $('.vehical_type_class').append('<tr class="'+classname+' data_of_type"><td class="text-center">'+vehical_type+'</td><td class="text-center"><button type="button" vehicletypeid='+data+' deletevehical="<?php echo url('/vehicle/vehicaltypedelete'); ?>" class="btn btn-danger btn-xs deletevehicletype">X</button></a></td><tr>');
						$('.select_vehicaltype').append('<option value='+data+'>'+vehical_type+'</option>');
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
			else
			{
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
		               
					    if (data == '01')
					       {
					 	      swal('Duplicate Data !!! Please try Another...');
						   }
						   else
						   {
							   $('.vehical_brand_class').append('<tr class="'+classname+' data_of_type"><td class="text-center">'+vehical_brand+'</td><td class="text-center"><button type="button" brandid='+data+' deletevehicalbrand="<?php echo url('/vehicle/vehicalbranddelete'); ?>" class="btn btn-danger btn-xs deletevehiclebrands">X</button></a></td><tr>');
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

<!-- Fuel type -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
					if (data == '01')
					   {
						   swal('Duplicate Data !!! Please try Another...');
					   }
					   else
					   {
						$('.fuel_type_class').append('<tr class="'+classname+' data_of_type"><td class="text-center">'+fuel_type+'</td><td class="text-center"><button type="button" fuelid='+data+' deletefuel="<?php echo url('/vehicle/fueltypedelete'); ?>" class="btn btn-danger btn-xs fueldeletes">X</button></a></td><tr>');
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

<script>
$(document).ready(function(){
	
	$('body').on('click','.fueldeletes',function(){
   
	
	var fueltypeid = $(this).attr('fuelid');
	
	var url = $(this).attr('deletefuel');
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
							data:{fueltypeid:fueltypeid},
							success:function(data){
									$('.del-'+fueltypeid).remove();
									$(".select_fueltype option[value="+fueltypeid+"]").remove();
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
				
					if(data == '01')
					{
						swal("Duplicate Data !!! Please try Another... ");
					}
					else
					{
						$('.vehi_model_class').append('<tr class="'+classname+'"><td class="text-center">'+model_name+'</td><td class="text-center"><button type="button" modelid='+data+' deletemodel="<?php echo url('/vehicle/vehicle_model_delete'); ?>" class="btn btn-danger btn-xs modeldeletes">X</button></a></td><tr>');
						$('.model_addname').append('<option value='+data+'>'+model_name+'</option>');
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




<!-- Vehical Description-->
<script>
$("#add_new_description").click(function(){
		var row_id = $("#tab_decription_detail > tbody > tr").length;
		
		var url = $(this).attr('url');
		
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {row_id:row_id},
                     success: function (response)
                        {	
						
                            $("#tab_decription_detail > tbody").append(response.html);
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
$('body').on('click','.delete_description',function(){
	
		var description = $(this).attr('data-id');
	    var url = $(this).attr('delete_description');
		
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {description:description},
                     beforeSend: function() { 
				      $("#add_new_description").prop('disabled', true); // disable button
				    },
                     success: function (response)
                        {	
						
                           $('table#tab_decription_detail tr#row_id_'+description).remove();
                           $("#add_new_description").prop('disabled', false); // enable button
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
		
	});
</script>

<!-- vehical color -->
<script>
$("#add_new_color").click(function(){
		
		var color_id = $("#tab_color > tbody > tr").length;
		
		var url = $(this).attr('url');
        
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {color_id:color_id},
                     beforeSend: function() { 
				      $("#add_new_color").prop('disabled', true); // disable button
				    },
                     success: function (response)
                        {	
						   
                            $("#tab_color > tbody").append(response.html);
                            $("#add_new_color").prop('disabled', false); // disable button
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
$('body').on('click','.remove_color',function(){
	
		var color_id = $(this).attr('data-id');
		
		var url = $(this).attr('colordelete');
        
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {color_id:color_id},
                     success: function (response)
                        {	
						   $('table#tab_color tr#color_id_'+color_id).remove();	
							
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
		
	});
</script>

<!-- Vehical image-->

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
<!--  show  images in multiple selected -->
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
		  $('#image_preview').append("<div class='col-md-3 col-sm-3 col-xs-12 removeimage delete_image classimage'><img src='"+URL.createObjectURL(event.target.files[i])+"' width='100px' height='60px'> </div>");
		 }
		}
	</script>

<!--  new image append -->
<script>
$("#add_new_images").click(function(){
		//jQuery(this).attr("disabled", "disabled");
		var image_id = $("#tab_images > tbody > tr").length;
		 
		var url = $(this).attr('url');
          
		$.ajax({
                       type: 'GET',
                       url: url,
                     data : {image_id:image_id},
                     success: function (response)
                        {	
						   
                            $("#tab_images > tbody").append(response);
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
$('body').on('click','.delete_image',function(){
	
		var delete_image = $(this).attr('imgaeid');
		var url = $(this).attr('delete_image');
          
		$.ajax({
                       type: 'GET',
                       url: url,
                     data : {delete_image:delete_image},
                     success: function (response)
                        {	
                            $('div#image_preview div#image_remove_'+delete_image).remove();
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
		return false;
	});
</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\VehicleAddEditFormRequest', '#vehicleEdit-Form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/vehicle/edit.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>

<style>
	.select2-container { width: 100% !important; }
</style>

<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Product')); ?></span></a>
              </div>
                  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>
          </div>
    </div>
	<div class="x_content">
        <ul class="nav nav-tabs bar_tabs" role="tablist">
        	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_view')): ?>
				<li role="presentation" class=""><a href="<?php echo url('/product/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-list fa-lg">&nbsp;</i><?php echo e(trans('app.Product List')); ?></a></li>
			<?php endif; ?>
			
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_edit')): ?>
				<li role="presentation" class="active"><a href="<?php echo url('/product/list/edit/'.$editid); ?>"><span class="visible-xs"></span><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i><b><?php echo e(trans('app.Edit Product')); ?></b></a></li>
			<?php endif; ?>
		</ul>
	</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                   <form id="productEdit-Form" method="post" action="update/<?php echo e($product->id); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">
						<div class="form-group">
							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Product Number')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-4 col-sm-4 col-xs-12">
								
									<input type="text" id="p_no" name="p_no"  class="form-control" value="<?php echo e($product->product_no); ?>" placeholder="<?php echo e(trans('app.Enter Product No')); ?>" readonly>
								</div>
							</div>

							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Product Date')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									<input type="text" id="p_date" name="p_date" autocomplete="off" class="form-control productDate" placeholder="<?php echo getDateFormat();?>" value="<?php echo e(date(getDateFormat(),strtotime($product->product_date))); ?>" onkeypress="return false;" required />
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Name')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" id="name" name="name" class="form-control" maxlength="30" value="<?php echo e($product->name); ?>" placeholder="<?php echo e(trans('app.Enter Product Name')); ?>" required>
								</div>
							</div>

							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Product Image')); ?></label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="file" id="input-file-max-fs"  name="image"  class="form-control dropify" data-max-file-size="5M" >
									 <?php if(!empty($product->product_image)): ?>
						
									 <img src="<?php echo e(URL::asset('public/product/'.$product->product_image)); ?>"  width="60px" height="60px" class="img-circle" style="margin-top:10px;">
									 <?php else: ?>
										 <img src="<?php echo e(URL::asset('public/product/avtar.png')); ?>"  width="60px" height="60px" class="img-circle" style="margin-top:10px;">
									 <?php endif; ?>
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
						</div>

						<div class="form-group">
							<div class="">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Manufacturer Name')); ?> </label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<select id="p_type" name="p_type"  class="form-control product_type_data">
										<option value="">--<?php echo e(trans('app.Select Manufacturing Name')); ?>--</option>
											<?php if(!empty($product_type)): ?>
												<?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($product_types->id); ?>" <?php if($product_types->id == $product->product_type_id) {echo 'selected';} ?>><?php echo e($product_types->type); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</select>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12 addremove">
									<button type="button" data-target="#responsive-modal" data-toggle="modal" class="btn btn-default"><?php echo e(trans('app.Add Or Remove')); ?></button>
								</div>
							</div>

							<div class="<?php echo e($errors->has('price') ? ' has-error' : ''); ?> my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>) <label class="color-danger">*</label></label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" id="price" name="price"  class="form-control" value="<?php echo e($product->price); ?>" placeholder="<?php echo e(trans('app.Enter Product Price')); ?>" maxlength="10" required>
									 <?php if($errors->has('price')): ?>
								   <span class="help-block">
									   <strong><?php echo e($errors->first('price')); ?></strong>
								   </span>
								 <?php endif; ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							 <div class="">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Color Name')); ?></label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<select id="color_type" name="color"  class="form-control color_name_data">
										<option value=""><?php echo e(trans('app.-- Select Color --')); ?></option>
											<?php if(!empty($color)): ?>
												<?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($colors->id); ?>" <?php if($colors->id == $product->color_id) { echo 'selected'; } ?> ><?php echo e($colors->color); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</select>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12 addremove">
									<button type="button" data-target="#responsive-modal-color" data-toggle="modal" class="btn btn-default"><?php echo e(trans('app.Add Or Remove')); ?></button>
								</div>
							</div>

							<div class="">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Warranty')); ?> </label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input type="text" id="warranty" name="warranty" class="form-control" value="<?php echo e($product->warranty); ?>" placeholder="<?php echo e(trans('app.Enter Product Warranty')); ?>" maxlength="20">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Unit Of Measurement')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<select  name="unit"  class="form-control unit_product_data" required>
										<option value=""><?php echo e(trans('app.-- Select Unit --')); ?></option>
										<?php $__currentLoopData = $unitproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_product_unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($tbl_product_unit->id); ?>"<?php if($tbl_product_unit->id == $product->unit) { echo 'selected'; } ?>><?php echo e($tbl_product_unit->name); ?>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</option>
									</select>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12 addremove">
									<button type="button" data-target="#responsive-modal-unit" data-toggle="modal" class="btn btn-default"><?php echo e(trans('app.Add Or Remove')); ?></button>
								</div>
							</div>

							<div class="my-form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Supplier')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select  id="sup_id" name="sup_id"  class="form-control select_supplier_auto_search">
									<option value=""><?php echo e(trans('app.-- Select Supplier --')); ?></option>
									<?php if(!empty($supplier)): ?>
										<?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($suppliers->id); ?>" <?php if($suppliers->id == $product->supplier_id) { echo 'selected'; } ?> ><?php echo e($suppliers->company_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
								<label class="control-label col-md-4 col-sm-4 col-xs-12"> <?php echo e(trans('app.Category')); ?> <label class="color-danger">*</label></label>
								<div class="col-md-8 col-sm-8 col-xs-12 gender">
									<input type="radio" name="category" value="0" required <?php if($product->category == '0'): ?> Checked <?php endif; ?>>Vehicle
									<input type="radio" name="category" value="1" <?php if($product->category == '1'): ?> Checked <?php endif; ?>> Part
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
									$userid = $product->id;
									$datavalue = getCustomDataProduct($tbl_custom,$userid);
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
															$getRadioValue = getRadioLabelValueForUpdateForAllModules($tbl_custom_field->form_name ,$product->id, $tbl_custom_field->id);

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
													$getCheckboxValue = getCheckboxLabelValueForUpdateForAllModules($tbl_custom_field->form_name, $product->id, $tbl_custom_field->id);
												?>
												<div style="margin-top: 5px;">
												<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"
													<?php
													 	if($val == getCheckboxValForAllModule($tbl_custom_field->form_name, $product->id, $tbl_custom_field->id,$val)) 
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
			<!-- product type Add or Remove Model-->	
				 <div class="col-md-6 col-sm-12 col-xs-12">
							<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
									<h4 class="modal-title"><?php echo e(trans('app.Manufacturer Name')); ?></h4>
								  </div>
								  <div class="modal-body">
								   <form class="form-horizontal" action="" method="">
										
										<table class="table producttype"  align="center" style="width:40em">
										<thead>
										<tr>
											<td class="text-center"><strong><?php echo e(trans('app.Manufacturer Name')); ?></strong></td>
											<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
										</tr>
										</thead>
										<tbody>
										<?php if(!empty($product_type)): ?>
											<?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr class="del-<?php echo e($product_types->id); ?> data_of_type" >
											<td class="text-center "><?php echo e($product_types->type); ?></td>
											<td class="text-center">
											
											<button type="button" productid="<?php echo e($product_types->id); ?>" deleteproduct="<?php echo url('prodcttypedelete'); ?>" class="btn btn-danger btn-xs deleteproducted">X</button>
											</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</tbody>
										</table>
										 <div class="col-md-8 form-group data_popup">
											<label><?php echo e(trans('app.Manufacturer Name')); ?>: <span class="text-danger">*</span></label>
												<input type="text" class="form-control product_type" name="product_type"  placeholder="<?php echo e(trans('app.Manufacturer Name')); ?>" maxlength="30" />
										</div>
										<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
											<button type="button" class="btn btn-success addtype" producturl="<?php echo url('/product_type_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
										</div>
									</form>
								</div>
							  </div>
							</div>	
						</div>
				</div>
			<!-- Color Add or Remove Model -->
				<div class="col-md-6 col-sm-12 col-xs-12">
							<div id="responsive-modal-color" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
									<h4 class="modal-title"><?php echo e(trans('app.Color')); ?></h4>
								  </div>
								   <div class="modal-body">
								   <form class="form-horizontal" action="" method="">
										
										<table class="table colornametype"  align="center" style="width:40em">
										<thead>
										<tr>
											<td class="text-center"><strong><?php echo e(trans('app.Color Name')); ?></strong></td>
											<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr class="del-<?php echo e($colors->id); ?> data_color_name" >
										<td class="text-center "><?php echo e($colors->color); ?></td>
										<td class="text-center">
										
										<button type="button" id="<?php echo e($colors->id); ?>" deletecolor="<?php echo url('colortypedelete'); ?>" class="btn btn-danger btn-xs deletecolors">X</button>
										</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
										</tbody>
										</table>
										
										 <div class="col-md-8 form-group data_popup">
											<label><?php echo e(trans('app.Color Name')); ?>: <span class="text-danger">*</span></label>
												<input type="text" class="form-control c_name" name="c_name"  placeholder="<?php echo e(trans('app.Enter color name')); ?>" maxlength="20" />
										</div>
										
										<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
												<button type="button" class="btn btn-success addcolor" colorurl="<?php echo url('/color_name_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
										</div>
									</form>
								</div>
								</div>
							 </div>
		                    </div>
					</div>
					<!-- Unit Add or Remove Model-->
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div id="responsive-modal-unit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
									<h4 class="modal-title"><?php echo e(trans('app.Unit Of Measurement')); ?></h4>
								  </div>
								   <div class="modal-body">
								   <form class="form-horizontal" action="" method="">
								   
										<table class="table unitproductname"  align="center" style="width:40em">
										<thead>
										<tr>
											<td class="text-center"><strong><?php echo e(trans('app.Unit Name')); ?></strong></td>
											<td class="text-center"><strong><?php echo e(trans('app.Action')); ?></strong></td>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $unitproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unitproducts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr class="delete-<?php echo e($unitproducts->id); ?> data_unit_name" >
										<td class="text-center "><?php echo e($unitproducts->name); ?></td>
										<td class="text-center">
										
										<button type="button" unitid="<?php echo e($unitproducts->id); ?>" u_url="<?php echo url('product/unitdelete'); ?>" class="btn btn-danger btn-xs unitdelete">X</button>
										</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
										</tbody>
										</table>
										
										<div class="form-group" style="margin-top:20px;">
											<div class="col-md-10 form-group data_popup">
												<label><?php echo e(trans('app.Unit Of Measurement')); ?>: <span class="text-danger">*</span></label>
												<input type="text" class="form-control u_name" name="unit_measurement"  placeholder="<?php echo e(trans('app.Enter Unit Of Measurement')); ?>" maxlength="30" />
											</div>
										
											<div class="col-md-2 form-group data_popup" style="margin-top:24px;">
												<button type="button" class="btn btn-success addunit" uniturl="<?php echo url('product/unit'); ?>"><?php echo e(trans('app.Submit')); ?></button>
											</div>
										</div>
									</form>
								</div>
								</div>
							 </div>
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
		autoclose: 1,
		minView: 2,
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

<!-- color add  model -->
<script>
$(document).ready(function(){
	$('.addcolor').click(function(){
		
		var c_name = $('.c_name').val();		
		var url = $(this).attr('colorurl');

		function define_variable()
		{
			return {
				addcolor_value: $('.c_name').val(),
				addcolor_pattern: /^[(a-zA-Z0-9\s)]+$/,
			};
		}
		
		var call_var_addcoloradd = define_variable();		 

	        if(c_name == ""){
	            swal('Please enter color name');
	        }
	        else if (!call_var_addcoloradd.addcolor_pattern.test(call_var_addcoloradd.addcolor_value))
			{
				$('.c_name').val("");
				swal('Please enter only alphanumeric data');
			}
	        else if(!c_name.replace(/\s/g, '').length){
				$('.c_name').val("");
	        	swal('Only blank space not allowed');
	    }
        else
        {
			$.ajax({
			    type: 'GET',
						url: url,
						data : {c_name:c_name},
						success:function(data)
					  {
						  var newd = $.trim(data);
				          var classname = 'del-'+newd;
						  
						if(data == '01')
								{
									swal('This Record is Duplicate');
								}else
								{
									$('.colornametype').append('<tr class="'+classname+' data_color_name"><td class="text-center">'+c_name+'</td><td class="text-center"><button type="button" id='+data+' deletecolor="<?php echo url('colortypedelete'); ?>" class="btn btn-danger btn-xs">X</button></a></td><tr>');
									$('.color_name_data').append('<option value='+data+'>'+c_name+'</option>');
									$('.c_name').val('');
								}
						},
						 error: function(e) {
                 
                }
						  
	              });
		}
		    
        });
  });
</script>
<!-- color Delete  model -->
<script>
$(document).ready(function(){
	
	$('body').on('click','.btn-xs',function(){
	var colorid = $(this).attr('id');
	var url = $(this).attr('deletecolor');
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
				data:{colorid:colorid},
				success:function(data){
					$('.del-'+colorid).remove();
					$(".color_name_data option[value="+colorid+"]").remove();
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

<!-- Product type add add  model -->
<script>
$(document).ready(function(){
	$('.addtype').click(function(){

		var product_type = $('.product_type').val();
		var url = $(this).attr('producturl');

		function define_variable()
		{
			return {
				product_type_value: $('.product_type').val(),
				product_type_pattern: /^[(a-zA-Z0-9\s)]+$/,
			};
		}
		
		var call_var_product_typeadd = define_variable();		 

	        if(product_type == ""){
	            swal('Please enter product type');
	        }
	        else if (!call_var_product_typeadd.product_type_pattern.test(call_var_product_typeadd.product_type_value))
			{
				$('.product_type').val("");
				swal('Please enter only alphanumeric data');
			}
	        else if(!product_type.replace(/\s/g, '').length){
				$('.product_type').val("");
	        	swal('Only blank space not allowed');
	    }
        else
        {
           	$.ajax({
               	type: 'GET',
				url: url,
				data : {product_type:product_type},
				success:function(data)
                {
					var newd = $.trim(data);
		            var classname = 'del-'+newd;
					
					if(data == '01')
					{
						swal('This Record is Duplicate');
					}
					else
					{
						$('.producttype').append('<tr class="'+classname+' data_of_type"><td class="text-center">'+product_type+'</td><td class="text-center"><button type="button" id='+data+' deleteproduct="<?php echo url('prodcttypedelete'); ?>" class="btn btn-danger btn-xs">X</button></a></td><tr>');
						$('.product_type_data').append('<option value='+data+'>'+product_type+'</option>');
						$('.product_type').val('');
					}
				},
                error: function(e) {
            	}
   			});            
        }
	});
});
</script>

<script>
$(document).ready(function(){
	
	$('body').on('click','.deleteproducted',function(){
		var ptypeid = $(this).attr('productid');
		var url = $(this).attr('deleteproduct');
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
				data:{ptypeid:ptypeid},
				success:function(data){
						$('.del-'+ptypeid).remove();
						$(".product_type_data option[value="+ptypeid+"]").remove();
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

<!-- Unit add  model -->
<script>
$(document).ready(function(){
	$('.addunit').click(function(){
		
		var unit_measurement = $('.u_name').val();
		var url = $(this).attr('uniturl');
		
		function define_variable()
		{
			return {
				unit_measurement_value: $('.u_name').val(),
				unit_measurement_pattern: /^[(a-zA-Z0-9\s)]+$/,
			};
		}

		var call_var_unit_measurementadd = define_variable();		 

        if(unit_measurement == ""){
            swal('Please enter unit of measurement');
        }
        else if (!call_var_unit_measurementadd.unit_measurement_pattern.test(call_var_unit_measurementadd.unit_measurement_value))
		{
			$('.u_name').val("");
			swal('Please enter only alphanumeric data');
		}
        else if(!unit_measurement.replace(/\s/g, '').length){
			$('.u_name').val("");
        	swal('Only blank space not allowed');
	    }
        else
        {
			$.ajax({
			    type: 'GET',
						url: url,
						data : {unit_measurement:unit_measurement},
						success:function(data)
						{
						   var newd = $.trim(data);
						  
				           var deleteclass = 'delete-'+newd;
				           
						if(data == '01')
								{
									swal('This Record is Duplicate');
								}else
								{
								$('.unitproductname').append('<tr class="'+deleteclass+' data_unit_name"><td class="text-center">'+unit_measurement+'</td><td class="text-center"><button type="button" unitid='+data+' u_url="<?php echo url('product/unitdelete'); ?>" class="btn btn-danger btn-xs unitdelete">X</button></a></td></tr>');
								$('.unit_product_data').append('<option value='+data+'>'+unit_measurement+'</option>');
								$('.u_name').val('');
								}
						},
						 error: function(e) {
                }	  
	              });
		}
        });
   $('body').on('click','.unitdelete',function(){     
	
		var unitid = $(this).attr('unitid');
	   
		var url = $(this).attr('u_url');
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
					data:{unitid:unitid},
					success:function(data){
						$('.delete-'+unitid).remove();
						$(".unit_product_data option[value="+unitid+"]").remove();
						swal("Done!","It was succesfully deleted!","success");
					}
					});
				}
				else
				{
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				} 
				})
		});
	
	});
 
</script>

<!-- Using Slect2 make auto searchable dropdown for supplier select -->
<script>
	$(document).ready(function(){
   		// Initialize select2
   		$(".select_supplier_auto_search").select2();
   	});

	/*If date field have value then error msg and has error class remove*/
	$('body').on('change','.productDate',function(){

		var outDateValue = $(this).val();

		if (outDateValue != null) {
			$('#p_date-error').css({"display":"none"});
		}

		if (outDateValue != null) {
			$(this).parent().parent().removeClass('has-error');
		}
	});

	

	/*If select box have value then error msg and has error class remove*/
	$(document).ready(function(){
		$('#sup_id').on('change',function(){

			var supplierValue = $('select[name=sup_id]').val();
			
			if (supplierValue != null) {
				$('#sup_id-error').css({"display":"none"});
			}

			if (supplierValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
	});
</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\ProductAddEditFormRequest', '#productEdit-Form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/product/edit.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
<style>
.first_width,.second_width{width:82%;}
.table{margin-bottom:0px;}
.all{width:42%;}
</style>

<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Part Sales')); ?></span></a>
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
                <ul class="nav nav-tabs bar_tabs" role="tablist">
                	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
						<li role="presentation" class=""><a href="<?php echo url('/sales_part/list'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Part Sales')); ?></span></a></li>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_edit')): ?>
						<!-- <li role="presentation" class="active"><a href="<?php echo url('/sales/list/edit/'.$editid); ?>"><span class="visible-xs"></span> <i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i><b><?php echo e(trans('app.Edit Part Sales')); ?></b></span></a></li> -->

						<li role="presentation" class="active"><a href="<?php echo url('/sales_part/edit/'.$editid); ?>"><span class="visible-xs"></span> <i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;</i><b><?php echo e(trans('app.Edit Part Sales')); ?></b></span></a></li>					
					<?php endif; ?>
				</ul>
			</div>
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<form method="post" action="update/<?php echo e($sales->id); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">
								<div class="form-group">
									<div class="div_bill_no_error">
										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Bill No')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<input type="text" id="bill_no" name="bill_no" class="form-control" value="<?php echo e($sales->bill_no); ?>" readonly>

											<span id="bill_no-error" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Bill number is required.')); ?></span>
										</div>
									</div>

									<div class="div_date_error">
										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Sales Date')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
										 <?php 
										   if($sales->date == '0000-00-00')
										   {
											$salesdate=getDatepicker();
										   }
										   else
										   {
											$salesdate=date(getDateFormat(),strtotime($sales->date));
										   }
										   ?>
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
											<input type="text" id="salesDate" name="date" class="form-control dateValue" autocomplete="off" placeholder="<?php echo getDateFormat();?>" value="<?php echo e($salesdate); ?>" onkeypress="return false;" required>
										</div>
										<span id="salesDate-error" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Date is required.')); ?></span>
									</div>
								</div>

								<div class="form-group">
									<div class="div_customer_select_error">
										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Customer Name')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<select class="form-control customer_select" id="customer_select_box" name="cus_name" required>
												<option value=""><?php echo e(trans('app.Select Customer')); ?></option>
												<?php if(!empty($customer)): ?>
													<?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($customers->id); ?>" <?php if($customers->id==$sales->customer_id) { echo 'selected';}?>><?php echo e($customers->name.' '.$customers->lastname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</select>

											<span id="customer_select_box-error" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Customer name is required.')); ?></span>
										</div>
									</div>
									
									<div class="div_salesmanname_error">
										<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Salesman')); ?> <label class="color-danger">*</label></label>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<select class="form-control salesmanname" name="salesmanname" id="salesmanname" required>
												<option value=""><?php echo e(trans('app.Select Name')); ?></option>
												<?php if(!empty($employee)): ?>
													<?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($employees->id); ?>" <?php if($employees->id == $sales->salesmanname) {echo 'selected';} ?>><?php echo e($employees->name.' '.$employees->lastname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</select>

											<span id="salesmanname-error" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Salesman name is required.')); ?></span>
										</div>
									</div>
								</div>
							<div class="col-md-12 col-xs-12 col-sm-12 form-group" style="margin-top:20px;">
								<div class="col-md-10 col-sm-8 col-xs-8 header">
									<h4><b><?php echo e(trans('app.Sale Part')); ?></b></h4>
								</div>
								<div class="col-md-2 col-sm-4 col-xs-4">
									<button type="button" id="add_new_product" class="btn btn-default " url="<?php echo url('sales_part/add/getproductname'); ?>" style="margin:5px 0px;"><?php echo e(trans('app.Add New')); ?> </button>
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12 form-group">
								<table class="table table-bordered adddatatable" id="tab_taxes_detail" align="center" style="font-size:14px;" width="100%">
									<thead>
										<tr>
											<th class="actionre"><?php echo e(trans('app.Manufacturer Name')); ?></th>
											<th class="actionre"><?php echo e(trans('app.Product Name')); ?></th>
											<th class="actionre"><?php echo e(trans('app.Quantity')); ?></th>
											<th class="actionre" style="width:10%;"><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
											<th class="actionre" style="width:13%;"><?php echo e(trans('app.Amount')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
											<th class="actionre"><?php echo e(trans('app.Action')); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php $row_id = 0;?>
									<?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stocks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr id="row_id_<?php echo $row_id;?>">
											<td class="tbl_td_selectManufac_error_<?php echo $row_id;?>">
												<!-- <input type="hidden" value="1" name="product[tr_id][]"/> -->
												<select class="form-control select_producttype select_producttype_<?php echo $row_id;?>" name="product[Manufacturer_id][]" m_url="<?php echo url('/purchase/producttype/names'); ?>" row_did="<?php echo $row_id;?>" data-id="<?php echo $row_id;?>" style="width:100%;" required="true">
													<option value="">-<?php echo e(trans('app.Select Manufacturing Name')); ?>-</option>
													<?php if(!empty($manufacture_name)): ?>
													<?php $__currentLoopData = $manufacture_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacture_nm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													 <option value="<?php echo e($manufacture_nm->id); ?>"  <?php if($manufacture_nm->id == $stocks->product_type_id){ echo"selected";} ?> ><?php echo e($manufacture_nm->type); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</select>

												<span id="select_producttype_error_<?php echo $row_id;?>" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Manufacturer name is required.')); ?></span>
											</td>

											<td class="tbl_td_selectProductname_error_<?php echo $row_id;?>">
											<input type="hidden" name="product[tr_id][]" value="<?php echo $stocks->id;?>" class="" form-control" data-id ="<?php echo $row_id;?>"  id="<?php echo $row_id;?>"> 
												<select name="product[product_id][]" class="form-control  productid select_productname_<?php echo $row_id;?>"  url="<?php echo url('purchase/add/getproduct'); ?>" row_did="<?php echo $row_id;?>" data-id="<?php echo $row_id;?>" style="width:100%;" required="true">
													<option value=""><?php echo e(trans('app.--Select Product--')); ?></option>
													<?php if(!empty($brand)): ?>
														<?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($brands->id); ?>" <?php if($brands->id ==$stocks->product_id) {echo "selected";}?>><?php echo e($brands->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</select>

												<span id="select_productname_error_<?php echo $row_id;?>" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Product name is required.')); ?></span>
											</td>
											<td class="tbl_td_quantity_error_<?php echo $row_id;?>">
												<input type="text" name="product[qty][]" url="<?php echo url('purchase/add/getqty'); ?>" class="quantity form-control qty qty_<?php echo $row_id;?>" prd_url="<?php echo e(url('/sale_part/get_available_product')); ?>" id="qty_<?php echo $row_id;?>" autocomplete="off" row_id="<?php echo $row_id;?>" value="<?php echo e($stocks->quantity); ?>" maxlength="8" style="width: 50%;" required="true">
												<span class="qty_<?php echo $row_id;?>"><?php echo e(getProductcode($stocks->product_id)); ?></span>

												<span id="quantity_error_<?php echo $row_id;?>" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Quantity is required.')); ?></span>
											</td>
											<td class="tbl_td_price_error_<?php echo $row_id;?>">
												<!-- <input type="text" name="product[price][]" class="product form-control prices price_<?php echo $row_id;?>" value="<?php echo e($stocks->price); ?>" id="price_<?php echo $row_id;?>" style="width:100%;"  readonly="true"> -->
												<input type="text" name="product[price][]" class="product form-control prices price_<?php echo $row_id;?>" value="<?php echo e($stocks->price); ?>" autocomplete="off" id="price_<?php echo $row_id;?>" row_id="<?php echo $row_id;?>" style="width:100%;" required="true" >

												<span id="price_error_<?php echo $row_id;?>" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Price is required.')); ?></span>
											</td>
											<td class="tbl_td_totaPrice_error_<?php echo $row_id;?>">
												<input type="text" name="product[total_price][]" class="product form-control total_price total_price_<?php echo $row_id;?>"  value="<?php echo e($stocks->total_price); ?>"  id="total_price_<?php echo $row_id;?>" style="width:100%;" readonly="true" required="true">

												<span id="total_price_error_<?php echo $row_id;?>" class="help-block error-help-block color-danger" style="display: none"><?php echo e(trans('app.Total price is required.')); ?></span>
											</td>
											<td align="center">
												<span class="product_delete" data-id="<?php echo $row_id;?>" 
												pid="<?php echo $stocks->id;?>" url="<?php echo url('/sale_part/deleteproduct'); ?>" ><i class="fa fa-trash"></i></span>
											</td>
										</tr>
										<?php 
										$row_id++;?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
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
										$userid = $sales->id;
										$datavalue = getCustomDataSalepart($tbl_custom,$userid);

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
																$getRadioValue = getRadioLabelValueForUpdateForAllModules($tbl_custom_field->form_name ,$sales->id, $tbl_custom_field->id);

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
														$getCheckboxValue = getCheckboxLabelValueForUpdateForAllModules($tbl_custom_field->form_name, $sales->id, $tbl_custom_field->id);
													?>
													<div style="margin-top: 5px;">
													<?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"
														<?php
														 	if($val == getCheckboxValForAllModule($tbl_custom_field->form_name, $sales->id, $tbl_custom_field->id,$val))
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
								  <button type="submit" class="btn btn-success salesPartEditSubmitButton"><?php echo e(trans('app.Update')); ?></button>
								</div>
							</div>
							</form>
						</div>
				 
						<!-- Color Add or Remove Model-->
							<div class="col-md-6">
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
											
											<button type="button" colorid="<?php echo e($colors->id); ?>" deletecolor="<?php echo url('sales/colortypedelete'); ?>" class="btn btn-danger btn-xs colordelete">X</button>
											</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											</tbody>
											</table>
											
											 <div class="col-md-8 form-group data_popup">
												<label><?php echo e(trans('app.Color Name')); ?>: <span class="text-danger">*</span></label>
													<input type="text" class="form-control c_name" name="c_name"  placeholder="<?php echo e(trans('app.Enter color name')); ?>" />
											</div>
											
											<div class="col-md-4 form-group data_popup" style="margin-top:24px;">
													<button type="button" class="btn btn-success addcolor" colorurl="<?php echo url('sales/color_name_add'); ?>"><?php echo e(trans('app.Submit')); ?></button>
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
        </div>
	</div>
<!-- page content end-->

  
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script type="text/javascript">
	$(function(){
			$('#vehi_bra_name').change(function(){
			
				var vehicale_id = $(this).val();
				var url = $(this).attr('bran_url');
				var qty= $('#qty').val();
					$.ajax({
						type: 'GET',
						url: url,
						data : {vehicale_id:vehicale_id},
					
						success: function (response)
							 {	
								var price_dta = $('#price').val(response.price);
								if(response.qty == "not available")
								{
									$('#qty').attr('max',0);
								}
								else
								{
									$('#qty').attr('max',response.qty);
								}
								var total_price =  response.price * qty;
								
								$('#total_price').val(total_price); 
								
							},

					    beforeSend:function()
							{
								$('#price').attr('value','Loading...');
							},

					    error: function(e) 
							{
							 alert("An error occurred: " + e.responseText);
								console.log(e);
							}
						});


			});
			
			$('#vehicale_select').change(function(){
				
				
				
				var url = $(this).attr('chasisurl');
				var	modelname = $('option:selected', this).attr('modelname');
				var	vehicle_id = $('option:selected', this).val();
				
				
				
					$.ajax({
						type: 'GET',
						url: url,
						data : {modelname:modelname,vehicle_id:vehicle_id},
					
						success: function (response)
							 {	
								$('#chassis_num').html(response);
							 },

					    beforeSend:function()
							{
								$('#price').attr('value','Loading...');
							},

					    error: function(e) 
							{
							 alert("An error occurred: " + e.responseText);
								console.log(e);
							}
						});
			});
	});
</script>

<script>
 $('body').on('click','#qty',function(){
			
            var qty= $(this).val();
			var price= $('#price').val();
			var url = $(this).attr('url');
			$.ajax({
						type: 'GET',
						url: url,
						data : {qty:qty,price:price},
						success: function (response)
							 {	
								
								total_price =  price * qty;
								 $('#total_price').val(total_price);
								
							},

							beforeSend:function()
							{
								
							},

					    error: function(e) 
							{
							 alert("An error occurred: " + e.responseText);
								console.log(e);
							}
						});

			


        });
</script>

<script>
	$(document).ready(function(){
		
		
		$("#no_of_service").change(function(){
			
			var interval=$("#interval").val();
			
			var date_gape=$("#date_gape").val();
			var no_service=$("#no_of_service").val();
			var url = $(this).attr('url');
			
			if(interval!='' || date_gape!='' || no_service!='')
			{
				if($("#interval").val() == ''){
				  swal({   
							title: "Interval",
							text: "Please select Interval!"   

						});
				  $('#no_of_service').html('<option value="0">No of service </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>');
				  return false;
				}
			 
			if(interval!='' && date_gape!='' && no_service!='') {
			 
					$("#date_gape").change(function(){
						$("#load_service_data").css("display", "none");
						 $('#no_of_service').html('<option value="0">No of service </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>');
				  
					});
					
					$("#interval").change(function(){
						$("#load_service_data").css("display", "none");
						 $('#no_of_service').html('<option value="0">No of service </option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>');
				 
					});
					
					
					$("#no_of_service").change(function(){
						$("#load_service_data").css("display", "block");
					});
			 
			$.ajax({
                       type: 'GET',
                      url: url,
                     data : {interval:interval,date_gape:date_gape,no_service:no_service},
                     success: function (response)
                        {
							
                            $("#load_service_data").html(response);
						},
                    error: function(e) {
                   alert("An error occurred: " + e.responseText);
                    console.log(e);
                },
				beforeSend:function(){
					$("#load_service_data").html("<center><h3>Loading...</h3></center>");
				}
				
			}); 
			 
			 
			}
			}
			
			
		});
	});
</script>

<!-- color add  model -->
<script>
$(document).ready(function(){
	$('.addcolor').click(function(){
		
		var c_name = $('.c_name').val();
		
		var url = $(this).attr('colorurl');

		if(c_name == ""){
            swal('Please Enter Color Name!');
			}else{
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
									swal("Duplicate Data !!! Please try Another... ");
								}else
								{
									$('.colornametype').append('<tr class="'+classname+' data_color_name"><td class="text-center">'+c_name+'</td><td class="text-center"><button type="button" colorid='+data+' deletecolor="<?php echo url('sales/colortypedelete'); ?>" class="btn btn-danger btn-xs colordelete">X</button></a></td><tr>');
									$('.color_name_data').append('<option value='+data+'>'+c_name+'</option>');
									$('.c_name').val('');
									
								}
							},
							error: function(e) {
							alert("An error occurred: " + e.responseText);
							console.log(e);
						}
	              });
			}
		    
        });
  });
</script>
<!-- color Delete  model -->
<script>
$(document).ready(function(){
	
	$('body').on('click','.colordelete',function(){
		
	var colorid = $(this).attr('colorid');
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
<script>
/*$(document).ready(function(){
	
	$('body').on('change','.select_producttype',function(){	
		
		var row_id = $(this).attr('row_did');
		var m_id = $(this).val();
		var url = $(this).attr('m_url');
		
		$.ajax({
			type:'GET',
			url: url,
			data:{ m_id:m_id },
			success:function(response){
				
				$('.select_productname_'+row_id).html(response);
			}
		});
	});
	
});*/

</script>
<script type="text/javascript">
	$(function(){
			$('#supplier_select').change(function(){
				
				var supplier_id = $(this).val();
				var url = $(this).attr('url');
				
					$.ajax({
						type: 'GET',
						url: url,
						data : {supplier_id:supplier_id},
						success: function (response)
							 {	
								
								 var res_supplier = jQuery.parseJSON(response);
								
								$('#mobile').attr('value',res_supplier.mobile_no);
								$('#email').attr('value',res_supplier.email);
								$('#address').text(res_supplier.address);
								
							},

							beforeSend:function()
							{
								$('#mobile').attr('value','Loading..');
								$('#email').attr('value','Loading..');
								$('#address').attr('value','Loading..');
							},

					    error: function(e) 
							{
							 alert("An error occurred: " + e.responseText);
								console.log(e);
							}
						});
			});
	});
</script>

<script type="text/javascript">
$("#add_new_product").click(function(){
		
		var row_id = $("#tab_taxes_detail > tbody > tr").length;
		var url = $(this).attr('url');
		
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {row_id:row_id},
                     beforeSend : function () {
					 	$("#add_new_product").prop('disabled', true);
					 },
                     success: function (response)
                        {	
							
							$('#tab_taxes_detail').DataTable().row.add($(response.html)).draw();
							$("#add_new_product").prop('disabled', false);
							return false;
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
	
	$('body').on('click','.product_delete',function(){
	
		var procuctid = $(this).attr('pid');
		
		var row_id = $(this).attr('data-id');
		
		var url = $(this).attr('url');
        
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {procuctid:procuctid},
                     success: function (response)
                        {	
		
							$('table#tab_taxes_detail tr#row_id_'+row_id).remove();	
							
						},
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
       });
	
	$('body').on('change','.productid','.qty',function(){		
		var row_id = $(this).attr('row_did');
	   
		var p_id = $(this).val();
		 var qty= $('.qty_'+row_id).val();
			
		var price= $('.price_'+row_id).val();
		
		var url = $(this).attr('url');
		
		$.ajax({
                       type: 'GET',
                      url: url,
                     data : {p_id:p_id},
                     success: function (response)
                        {	
							  var json_obj = jQuery.parseJSON(response);

							var price = json_obj['price'];
							
							var total_price =  price * qty;
							$('.price_'+row_id).val(price);				
							$('.total_price_'+row_id).val(total_price);
							var product_no = json_obj['product_no'];
							$('.qty_'+row_id).html(product_no);
						},
						
                    error: function(e) {
                 alert("An error occurred: " + e.responseText);
                    console.log(e);
                }
       });
	});
</script>


<script type="text/javascript">
 $('body').on('keyup','.qty',function(){
	 
			var row_id = $(this).attr('row_id');
			var p_id = $('.select_productname_'+row_id).val();
			var qtyVal = $('.qty_'+row_id).val(); 
			if(p_id == '')
			{
				 alert('first select product name');
				 $('.qty_'+row_id).val('');
			}
			else
			{
				if (/\D/g.test(this.value))
				{
				    $('.qty_'+row_id).val('');

				    $('#quantity_error_'+row_id).css({"display":""});
					$('.tbl_td_quantity_error_'+row_id).addClass('has-error');
				}
				else if(this.value <= 0)
				{
					$('.qty_'+row_id).val('');

					$('#quantity_error_'+row_id).css({"display":""});
					$('.tbl_td_quantity_error_'+row_id).addClass('has-error');
				}
				else
				{
					var qty= $('.qty_'+row_id).val();					
					var price= $('.price_'+row_id).val();					
					var url = $(this).attr('url');

					$('#quantity_error_'+row_id).css({"display":"none"});
					$('.tbl_td_quantity_error_'+row_id).removeClass('has-error');

					$.ajax({
							type: 'GET',
							url: url,
							data : {qty:qty,price:price},
							success: function (response)
								 {	
									
									total_price =  price * qty;
									
									 $('.total_price_'+row_id).val(total_price);
									
								},

								beforeSend:function()
								{
									
								},

							error: function(e) 
								{
								 alert("An error occurred: " + e.responseText);
									console.log(e);
								}
							});
				}
			}
        });
</script>

<!-- Customer auto search using select2 package -->
<script>
	$(document).ready(function(){
   		// Initialize select2
   		$("#customer_select_box").select2();
   });
</script>

<!-- Get product name when changing manufacturer name -->
<script>
$(document).ready(function(){
	
	$('body').on('change','.select_producttype',function(){	
		
		var row_id = $(this).attr('row_did');
		var m_id = $(this).val();
		var url = $(this).attr('m_url');
		//alert(url);
		$.ajax({
			type:'GET',
			url: url,
			data:{ m_id:m_id },
			success:function(response){
				$('.select_productname_'+row_id).html(response);
				//alert(html(response));
			}
		});
	});	
});
</script>


<script>
	$('body').on('blur','.qty',function(){

		var row_id = $(this).attr('row_id');
		var productid = $('.select_productname_'+row_id).find(":selected").val();
        var qty= $(this).val();
        var url = $(this).attr('prd_url');
        
        $.ajax({
            type: 'GET',
            url: url,
            data : {qty:qty,productid:productid},
            success: function (response)
            { 
                //var newd = $.trim(response);
                if(response.success == '1')
                {
                    //swal('No Product Available');
                    swal('Product Not Available \nCurrent Stock : ' +response.currentStock);
                    jQuery('.qty_'+row_id).val('');
                    jQuery('.total_price_'+row_id).val('');
                }
            },
        });
	});
</script>

<script>
	$('body').on('click','.productid',function(){
		var rowId = $(this).attr('row_did');
		var url = $(this).attr('url');
		var manufacture_selected = $('.select_producttype_'+rowId).val();

		if (manufacture_selected == "") 
		{
			swal("First Select Manufacturer");
		}			
	});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<!-- datetimepicker-->
	<script>
    $('.datepicker').datetimepicker({
       format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
    });
</script>


<!-- Price field should editable and editable price should change the Total-Amount (on-time editable price ) -->
<script>
   $(document).ready(function(){
      	$('body').on('change','.prices',function(){

         	var row_id = $(this).attr('row_id');
         	var qty = $('.qty_'+row_id).val();
         	var price = $('.price_'+row_id).val();
         	var total_price =  price * qty;

         	var regex = /^\d*(.\d{2})?$/;

	        if (!regex.test(price)) {
	        	$('.price_'+row_id).val("");
	            $('.price_'+row_id).attr('required', true);

	            $('#price_error_'+row_id).css({"display":""});
				$('.tbl_td_price_error_'+row_id).addClass('has-error');
	        }
         	else if (price == 0 || price == null) {
            	$('.price_'+row_id).val("");
            	$('.price_'+row_id).attr('required', true);

            	$('#price_error_'+row_id).css({"display":""});
				$('.tbl_td_price_error_'+row_id).addClass('has-error');
         	}
         	else
         	{
            	$('.price_'+row_id).val(price);
            	$('.total_price_'+row_id).val(total_price);

            	$('#price_error_'+row_id).css({"display":"none"});
				$('.tbl_td_price_error_'+row_id).removeClass('has-error');
         	}             
      	});
   	});
</script>


<!-- Foe submit time specific field value changes time make validation using Jquery -->
<script>
	$(document).ready(function(){

		$('.salesPartEditSubmitButton').click(function(){

			var bill_no = $('#bill_no').val();
			var date = $('.dateValue').val();
			var selectCustomer = $('#customer_select_box').val();
			var salesmanname = $('#salesmanname').val();
			
			var count_row = $("#tab_taxes_detail > tbody > tr").length;

			if (bill_no == "") {
				$('#bill_no-error').css({"display":""});
				$('.div_bill_no_error').addClass('has-error');				
			}
			else{
				$('#bill_no-error').css({"display":"none"});
				$('.div_bill_no_error').removeClass('has-error');
			}

			if (date == "") {
				$('#salesDate-error').css({"display":""});
				$('.div_date_error').addClass('has-error');
			}
			else{
				$('#salesDate-error').css({"display":"none"});
				$('.div_date_error').removeClass('has-error');
			}

			if (selectCustomer == "" ) {
				$('#customer_select_box-error').css({"display":""});
				$('.div_customer_select_error').addClass('has-error');
				$('.select2-selection--single').addClass('has-error');
			}
			else{
				$('#customer_select_box-error').css({"display":"none"});
				$('.div_customer_select_error').removeClass('has-error');
			}

			if (salesmanname == "" ) {
				$('#salesmanname-error').css({"display":""});
				$('.div_salesmanname_error').addClass('has-error');
			}
			else{				
				$('#salesmanname-error').css({"display":"none"});
				$('.div_salesmanname_error').removeClass('has-error');
			}


			/*Table data validation*/
			for (var i = 1; i <= count_row; i++) {

				var selectPrd = $('.select_producttype_'+i).val();
				var selectPrdQty = $('.qty_'+i).val();
				var selectPrdId = $('.select_productname_'+i).val();				
				//var selectPrdPrice = $('.price_'+i).val();
				//var selectPrdTotalPrice = $('.total_price_'+i).val();

				if (selectPrd == "") {
					$('#select_producttype_error_'+i).css({"display":""});
					$('.tbl_td_selectManufac_error_'+i).addClass('has-error');
				}
				else{
					$('#select_producttype_error_'+i).css({"display":"none"});
					$('.tbl_td_selectManufac_error_'+i).removeClass('has-error');
				}

				if (selectPrdQty == "" ) {
					$('#quantity_error_'+i).css({"display":""});
					$('.tbl_td_quantity_error_'+i).addClass('has-error');
				}
				else{
					$('#quantity_error_'+i).css({"display":"none"});
					$('.tbl_td_quantity_error_'+i).removeClass('has-error');
				}

				if (selectPrdId == "") {
					$('#select_productname_error_'+i).css({"display":""});
					$('.tbl_td_selectProductname_error_'+i).addClass('has-error');
				}
				else{
					$('#select_productname_error_'+i).css({"display":"none"});
					$('.tbl_td_selectProductname_error_'+i).removeClass('has-error');
				}
			}

			/*if (selectPrdId == "") {
				$('#select_productname_error_1').css({"display":""});
				$('.tbl_td_selectProductname_error_1').addClass('has-error');
			}
			else{
				$('#select_productname_error_1').css({"display":"none"});
				$('.tbl_td_selectProductname_error_1').removeClass('has-error');
			}*/

			/*if (selectPrdPrice == "" ) {
				$('#price_error_1').css({"display":""});
				$('.tbl_td_price_error_1').addClass('has-error');
			}
			else{				
				$('#price_error_1').css({"display":"none"});
				$('.tbl_td_price_error_1').removeClass('has-error');
			}*/

			/*if (selectPrdTotalPrice == "" ) {
				$('#total_price_error_1').css({"display":""});
				$('.tbl_td_totaPrice_error_1').addClass('has-error');
			}
			else{				
				$('#total_price_error_1').css({"display":"none"});
				$('.tbl_td_totaPrice_error_1').removeClass('has-error');
			}*/

		});
	});


	$('body').on('change','.dateValue',function(){

		var dateValue = $(this).val();

		if (dateValue == "") {
			$('#salesDate-error').css({"display":""});
			$('.div_date_error').addClass('has-error');
		}
		else {
			$('#salesDate-error').css({"display":"none"});
			$('.div_date_error').removeClass('has-error');
		}
	});


	$(document).ready(function(){

		$('.customer_select').on('change',function(){

			var customerValue = $('select[name=cus_name]').val();
			
			if (customerValue == "") {
				$('#customer_select_box-error').css({"display":""});
				$('.div_customer_select_error').addClass('has-error');
			}
			else {
				$('#customer_select_box-error').css({"display":"none"});
				$('.div_customer_select_error').removeClass('has-error');
			}

		});
	});

	$(document).ready(function(){

		$('.salesmanname').on('change',function(){

			var salesmanValue = $('select[name=salesmanname]').val();
			
			if (salesmanValue == "" ) {
				$('#salesmanname-error').css({"display":""});
				$('.div_salesmanname_error').addClass('has-error');
			}
			else{				
				$('#salesmanname-error').css({"display":"none"});
				$('.div_salesmanname_error').removeClass('has-error');
			}
		});
	});



	/*for table field validation*/
	$(document).ready(function(){

		$('body').on('change','.select_producttype',function(){

			var row_id = $(this).attr("row_did");
			var manufactureValue = $('.select_producttype_'+row_id).val();
			
			if (manufactureValue == "") {
				$('#select_producttype_error_'+row_id).css({"display":""});
				$('.tbl_td_selectManufac_error_'+row_id).addClass('has-error');
			}
			else{
				$('#select_producttype_error_'+row_id).css({"display":"none"});
				$('.tbl_td_selectManufac_error_'+row_id).removeClass('has-error');
			}
		});
	});


	$(document).ready(function(){

		$('body').on('change','.productid',function(){

			var row_id = $(this).attr("row_did");
			var prdValue = $('.select_productname_'+row_id).val();
			
			if (prdValue == "") {
				$('#select_productname_error_'+row_id).css({"display":""});
				$('.tbl_td_selectProductname_error_'+row_id).addClass('has-error');
			}
			else{
				$('#select_productname_error_'+row_id).css({"display":"none"});
				$('.tbl_td_selectProductname_error_'+row_id).removeClass('has-error');
			}
		});
	});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/sales_part/edit.blade.php ENDPATH**/ ?>
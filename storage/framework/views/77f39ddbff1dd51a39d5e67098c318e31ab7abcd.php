
<?php $__env->startSection('content'); ?>
<style>
.table>tbody>tr>td { padding:5px;}
.price {
 font-size: 15px; coloe:#555 !important;}
 
	.select2-container { width: 100% !important; }
</style>

<!-- page content -->
	<div class="right_col" role="main">
		<div class="page-title">
			<div class="nav_menu">
				<nav>
				  <div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Purchase')); ?></span></a>
				  </div>
					  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</nav>
			</div>
		</div>
		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs" role="tablist">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/purchase/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Purchase List')); ?></a></li>
				<?php endif; ?>

				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_add')): ?>
					<li role="presentation" class="active"><a href="<?php echo url('/purchase/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Purchase')); ?></b></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<form id="purchaseAdd-Form" method="post" action="<?php echo e(url('/purchase/store')); ?>" enctype="multipart/form-data"  class="form-horizontal upperform purchaseAddForm">

							<div class="form-group">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Purchase No')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" id="p_no" name="p_no" value="<?php echo e($code); ?>" class="form-control" value="" readonly>
									</div>
								</div>

								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Purchase Date')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12 input-group date datepicker">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										<input type="text" id="pur_date" name="p_date" autocomplete="off" class="form-control purchaseDate" placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required />
									</div>
									
									</style>
								</div>
							</div>

							<div class="form-group mobileNumberDivPurchasePage" style="margin-top: 15px;">
								<div class="my-form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Supplier Name')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<select class="form-control col-md-7 col-xs-12 select_supplier_auto_search" name="s_name" id="supplier_select" url="<?php echo url('purchase/add/getrecord'); ?>" required>
										  <option value=""><?php echo e(trans('app.select supplier')); ?></option>
										  <?php if(!empty($supplier)): ?>
											<?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->company_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
										</select>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" id="mobile" name="mobile"  class="form-control" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>" readonly>
									</div>
								</div>
							</div>

							<div class="form-group" style="margin-top: 20px;">
								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="text" id="email" name="email" class="form-control" placeholder="<?php echo e(trans('app.Enter Email')); ?> " readonly>
									</div>
								</div>

								<div class="">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="last-name"><?php echo e(trans('app.Billing Address')); ?> <label class="color-danger">*</label></label>
									<div class="col-md-4 col-sm-4 col-xs-12">
										<textarea  id="address" name="address" class="form-control"  readonly></textarea>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-xs-12 col-sm-12 form-group" style="margin-top:20px;">
								<div class="col-md-10 col-sm-8 col-xs-8 header">
									<h4><b><?php echo e(trans('app.Purchase Details')); ?></b></h4>
								</div>
								<div class="col-md-2 col-sm-4 col-xs-4">
									<button type="button" id="add_new_product" class="btn btn-default" url="<?php echo url('purchase/add/getproductname'); ?>" style="margin:5px 0px;"><?php echo e(trans('app.Add New')); ?> </button>
								</div>
							</div>

							<div class="col-md-12 col-xs-12 col-sm-12 form-group">
								<table class="table table-bordered adddatatable" id="tab_taxes_detail" align="center">
									<thead>
										<tr>
											<th class="actionre"><?php echo e(trans('app.Category')); ?></th>
											<th class="actionre"><?php echo e(trans('app.Manufacturer Name')); ?></th>
											<th class="actionre"><?php echo e(trans('app.Product Name')); ?></th>
											<th class="actionre"><?php echo e(trans('app.Quantity')); ?></th>
											<th class="actionre" style="width:10%;"><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
											<th class="actionre" style="width:13%;"><?php echo e(trans('app.Amount')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
											<th class="actionre"><?php echo e(trans('app.Action')); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr id="row_id_1">
											<td>
												<select class="form-control select_categorytype" name="product[category_id][]" row_did="1" data-id="1" style="width:100%;" required>
													<option value="0"><?php echo e(trans('app.Vehicle')); ?></option>
													<option value="1"><?php echo e(trans('app.Part')); ?></option>
												</select>
											</td>
											<td class="my-form-group">
												<input type="hidden" value="1" name="product[tr_id][]"/>
												<select required class="form-control select_producttype" name="product[Manufacturer_id][]" m_url="<?php echo url('/purchase/producttype/name'); ?>" man_sel_url="<?php echo url('purchase/getfirstproductdata'); ?>" row_did="1" row_id="1" data-id="1" style="width:100%;" >
													<!-- <option value="">-<?php echo e(trans('app.Select item')); ?>-</option> -->
													<?php if(!empty($Select_product)): ?>
													<?php $__currentLoopData = $Select_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Select_products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													 <option value="<?php echo e($Select_products->id); ?>" ><?php echo e($Select_products->type); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>
												</select>
											</td>
											<td class="my-form-group">
												<select name="product[product_id][]" class="form-control  productid select_productname_1"  url="<?php echo url('purchase/add/getproduct'); ?>" row_did="1" data-id="1" style="width:100%;" required="required">
													<!-- <option value=""><?php echo e(trans('app.--Select Product--')); ?></option> -->
													  <?php if(!empty($product)): ?>
													  <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													  <option value="<?php echo e($products->id); ?>"><?php echo e($products->name); ?></option>
													  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													  <?php endif; ?>		
												</select>
											</td>
											<td>
												<input type="number" name="product[qty][]" url="<?php echo url('purchase/add/getqty'); ?>" class="quantity form-control qty qty_1" id="qty_1" row_id="1" value="1" maxlength="8" style="width: 50%;">
												<span class="qty_1"><?php echo e($first_product->product_no); ?></span>
											</td>
											<td>
												<!-- <input type="text" name="product[price][]" class="product form-control prices price_1" value="" id="price_1" style="width:100%;" readonly="true"> -->
												<input required type="text" name="product[price][]" class="product form-control prices price_1" value="<?php echo e($first_product->price); ?>" id="price_1" style="width:100%;" row_id="1" style="width:100%;" >
											</td>
											<td>
												<input type="text" name="product[total_price][]" class="product form-control total_price total_price_1"  value="<?php echo e($first_product->price); ?>" style="width:100%;" id="total_price_1" readonly="true">
											</td>
											<td align="center">
												<span class="product_delete" style="width:100%;" data-id="0"><i class="fa fa-trash fa-2x"></i> </span>
											</td>
										</tr>
									</tbody>
								</table>
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
							<div class="form-group" style="margin-top:30px;">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center">
								  <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
								  <button type="submit" class="btn btn-success purchaseSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
								</div>
							</div>
						</form>
					</div>		
				</div>
			</div>
		</div>
	</div>

   
<script src="<?php echo e(URL::asset('build/js/jquery.min.js')); ?>"></script>

<script>
		 $(document).ready(function() {
		$('.adddatatable').DataTable({
			/*Solved by Arjun [Bug list row number: 670]*/
			responsive: true,
			paging: false,
			lengthChange: false,
			searching: false,
			ordering: false,
			info: false,
			autoWidth: true,
			sDom: 'lfrtip'
		
		});
	});
</script>
<script>
$(document).ready(function(){
	
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
			   // $("#tab_taxes_detail > tbody").append(response.html);
				$('.adddatatable').DataTable().row.add($(response.html)).draw();
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
		
		var row_id = $(this).attr('data-id');
		
		$('table#tab_taxes_detail tr#row_id_'+row_id).fadeOut();
		$('table#tab_taxes_detail tr#row_id_'+row_id).html('<option value="">Select product</option>');
		$('table#tab_taxes_detail tr#row_id_'+row_id).html('<input type="text" name="" class="form-control qty" value="" id="tax_1" readonly="true">');
		$('table#tab_taxes_detail tr#row_id_'+row_id).html('<input type="text" name="" class="form-control price" value="" id="tax_1" readonly="true">');
		$('table#tab_taxes_detail tr#row_id_'+row_id).html('<input type="text" name="" class="form-control total_price" value="" id="tax_1" readonly="true">');
		$('table#tab_taxes_detail tr#row_id_'+row_id).html('<span class="product_delete" data-id="0"></span>');
		return false;
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

 $('body').on('change','.qty',function(){
	 
			var row_id = $(this).attr('row_id');			
            var p_id = $('.select_productname_'+row_id).val();
			var priceVal = $('.price_'+row_id).val();

			if(p_id == '')
			{
				alert('first select product name');
				$('.qty_'+row_id).val('1');
			}
			else if(this.value == ""){
				$('.qty_'+row_id).val('1');
				$('.total_price_'+row_id).val(priceVal * 1);
			}
			else
			{
				if (/\D/g.test(this.value))
				{
				    $('.qty_'+row_id).val('1');
				    $('.total_price_'+row_id).val(priceVal * 1);
				}
				else
				{
					var qty= $('.qty_'+row_id).val();
					
					var price= $('.price_'+row_id).val();
					
					var url = $(this).attr('url');
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
 
<script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
	<script>
     $(".datepicker").datetimepicker({
		
		format: "<?php echo getDatepicker(); ?>",
		autoclose: 1,
		minView: 2,
	});
</script>


<!-- Using Slect2 make auto searchable dropdown for supplier select -->
<script>
	$(document).ready(function(){
   		// Initialize select2
   		$(".select_supplier_auto_search").select2();
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

         	if (price == 0 || price == null) {
            	$('.price_'+row_id).val("");
            	$('.price_'+row_id).attr('required', true);
         	}
         	else
         	{
            	$('.price_'+row_id).val(price);
            	$('.total_price_'+row_id).val(total_price);
         	}             
      	});
   	});
</script>


<!-- Select product type time chages all value of selected product -->
<script>
   $(document).ready(function(){

      	$('body').on('change','.select_producttype',function(){

      		var row_id = $(this).attr('row_id');
      		var selected_option_value = $(this,':selected').val();      		
      		var url = $(this).attr('man_sel_url');

      		$.ajax({
      			type: "GET",
      			url: url,
      			data:{productTypeId:selected_option_value},
      			success: function(response){
      				//alert(response.success +"----" + response.data +"-----"+response.product_number);
      				if (response.success == 'yes') {
      					$('.price_'+row_id).val(response.data);
      					$('.total_price_'+row_id).val(response.data);
      					$('.qty_'+row_id).val(1);
      					$('.qty_'+row_id).text(response.product_number);      					
      				}
      			}
      		});     
      	});
   	});
</script>

<!-- Key up time price field should value with 1 -->
<script>
	$('body').on('keyup','.prices',function(){
	 
		var row_id = $(this).attr('row_id');		
        var price = $('.price_'+row_id).val();
		
		if(price == '')
		{
			$('.price_'+row_id).val(1);
		}
		else
		{
			if (/\D/g.test(this.value))
			{
			    $('.price_'+row_id).val(1);
			}
		}
	});


	/*If date field have value then error msg and has error class remove*/
	$('body').on('change','.purchaseDate',function(){

		var pDateValue = $(this).val();

		if (pDateValue != null) {
			$('#pur_date-error').css({"display":"none"});
		}

		if (pDateValue != null) {
			$(this).parent().parent().removeClass('has-error');
		}
	});

	

	/*If select box have value then error msg and has error class remove*/
	$(document).ready(function(){
		$('#supplier_select').on('change',function(){

			var supplierValue = $('select[name=s_name]').val();
			
			if (supplierValue != null) {
				$('#supplier_select-error').css({"display":"none"});
			}

			if (supplierValue != null) {
				$(this).parent().parent().removeClass('has-error');
			}
		});
	});

</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\PurchaseAddEditFormRequest', '#purchaseAdd-Form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.purchaseSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.purchaseAddForm').submit(function () {
        $('.purchaseSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.purchaseAddForm').bind('invalid-form.validate', function () {
      $('.purchaseSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/purchase/add.blade.php ENDPATH**/ ?>
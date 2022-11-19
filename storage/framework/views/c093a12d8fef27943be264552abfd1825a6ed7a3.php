
<?php $__env->startSection('content'); ?>
<style>
input[type=radio] {
    margin: 10px 0 0!important;
    margin-top: 1px\9;
    width: 25px;
    line-height: normal;
}
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
						<a id="menu_toggle"><i class="fa fa-bars"> </i><span class="titleup">&nbsp 
						<?php echo e(trans('app.Custom Field')); ?></span></a>
					  </div>
						  <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
				<?php if(session('message')): ?>
					<div class="row massage">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="checkbox checkbox-success checkbox-circle">
							
							  <label for="checkbox-10 colo_success">  <?php echo e(session('message')); ?> </label>
							</div>
						</div>
					</div>
				<?php endif; ?>
            </div>
			<div class="x_content">
                <ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
                	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customfield_view')): ?>
						<li role="presentation" class=""><a href="<?php echo url('setting/custom/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.List Custom Field')); ?></a></li>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customfield_add')): ?>
						<li role="presentation" class="active setSizeForAddCustomFieldForSmallDevice"><a href="<?php echo url('setting/custom/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b> <?php echo e(trans('app.Add Custom Field')); ?></b></a></li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<form id="customFieldAddForm" method="post" action="<?php echo e(url('setting/custom/store')); ?>" enctype="multipart/form-data"  class="form-horizontal upperform customAddForm">

								<div class="form-group has-feedback my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Country"><?php echo e(trans('app.Form Name')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<select class="form-control col-md-9 col-xs-12" id="select_form_name" name="formname" required>
											<option value=""><?php echo e(trans('app.Select Form Name')); ?>

											<option value="customer"><?php echo e(trans('app.Customer')); ?></option>
											<option value="employee"><?php echo e(trans('app.Employee')); ?></option>
											<option value="supportstaff"><?php echo e(trans('app.Support Staff')); ?></option>
											<option value="accountant"><?php echo e(trans('app.Accountant')); ?></option>
											<option value="supplier"><?php echo e(trans('app.Supplier')); ?></option>
											<option value="product"><?php echo e(trans('app.Product')); ?></option>
											<option value="purchase"><?php echo e(trans('app.Purchase')); ?></option>
											<option value="vehicle"><?php echo e(trans('app.Vehicle')); ?></option>
											<option value="vehicletype"><?php echo e(trans('app.Vehicle Type')); ?></option>
											<option value="vehiclebrand"><?php echo e(trans('app.Vehicle Brand')); ?></option>
											<option value="color"><?php echo e(trans('app.Color')); ?></option>
											<option value="service"><?php echo e(trans('app.Service')); ?></option>
											<option value="invoice"><?php echo e(trans('app.Invoice')); ?></option>
											<option value="income"><?php echo e(trans('app.Income')); ?></option>
											<option value="expense"><?php echo e(trans('app.Expense')); ?></option>
											<option value="sales"><?php echo e(trans('app.Sales')); ?></option>
											<option value="salepart"><?php echo e(trans('app.Sale Part')); ?></option>
											<option value="rto"><?php echo e(trans('app.RTO')); ?></option>
										</select>
									</div>
								</div>

								<div class="form-group has-feedback my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo e(trans('app.Label')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="text" name="labelname" class="form-control labelname" placeholder="<?php echo e(trans('app.Enter Label Name')); ?>" required value="" maxlength="50">
									</div>
								</div>

								<div class="form-group has-feedback my-form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Country"><?php echo e(trans('app.Type')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<select class="form-control col-md-9 col-xs-12 selectType selectTypeIs" name="typename" required>
											<option value=""><?php echo e(trans('app.Select Type')); ?>

											<option value="textbox"><?php echo e(trans('app.TextBox')); ?></option>
											<option value="date"><?php echo e(trans('app.Date')); ?></option>
											<option value="textarea"><?php echo e(trans('app.Textarea')); ?> </option>
											<option value="radio"><?php echo e(trans('app.Radio')); ?></option>
											<option value="checkbox"><?php echo e(trans('app.Checkbox')); ?> </option>
										</select>
									</div>
								</div>

							<!-- If Selected radio then show this Add radio label part -->
								<div class="form-group radio_add_part_div" style="margin-top: 10px margin-bottom: 10px; display: none;">									
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="radio_add_part"><?php echo e(trans('app.Radio Field Label')); ?> <label class="color-danger">*</label></label>									
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="" name="radios_add" class="form-control r_label r_label_inputbox" placeholder="<?php echo e(trans('app.Enter radio label name')); ?>" maxlength="25">
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12  add_more_radio">
										<button type="button" data-toggle="modal"     data-target="#mymodal" class="btn btn-default"><?php echo e(trans('app.Add')); ?></button>
									</div>		
								</div>

								<div class="form-group radio_label_view_part_div">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="radio_add_part"></label>	
									<div class="col-md-5 col-sm-5 col-xs-12" id="radio_label" >
								        <div class="radio_label">
								        	<input type="hidden" value=""  name="r_label[]" class="radioLabelArray duplicate_radio" style="">
										</div>
					            	</div>
				            	</div>
							<!-- If Select radio then show this -->

							<!-- If Selected checkbox then show this Add checkbox label part -->
								<div class="form-group checkbox_add_part_div" style="display: none;">						
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="checkbox_add_part"><?php echo e(trans('app.Checkbox Field Label')); ?> <label class="color-danger">*</label></label>							
									<div class="col-md-4 col-sm-4 col-xs-12">
										<input type="" name="checkboxs_add" class="form-control c_label c_label_inputbox" placeholder="<?php echo e(trans('app.Enter checkbox label name')); ?>" maxlength="25">
									</div>
									<div class="col-md-1 col-sm-1 col-xs-12">
										<button type="button" data-toggle="modal" data-target="#mymodal" class="btn btn-default add_more_checkbox"><?php echo e(trans('app.Add')); ?></button>
									</div>
								</div>

								<div class="form-group checkbox_label_view_part_div">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="checkbox_add_part"></label>
									<div class="col-md-5 col-sm-5 col-xs-12" id="checkbox_label" >
								        <div class="checkbox_label">
								        	<input type="hidden" value=""  name="c_label[]" class="checkboxLabelArray duplicate_checkbox" style="">
										</div>
					            	</div>
				            	</div>
							<!-- If Select checkbox then show this -->

								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo e(trans('app.Required')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="radio"  name="required" value="yes" ><?php echo e(trans('app.Yes')); ?> 
										<input type="radio" name="required" checked value="no" > <?php echo e(trans('app.No')); ?>

									</div>
								</div>

								<div class="form-group has-feedback">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo e(trans('app.Always visible')); ?> <label class="color-danger">*</label>
									</label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<input type="radio"  name="visable" checked value="yes" ><?php echo e(trans('app.Yes')); ?> 
										<input type="radio" name="visable" value="no" > <?php echo e(trans('app.No')); ?>

									</div>
								</div>

								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<div class="col-md-9 col-sm-9 col-xs-12 text-center">
									 <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
									  <button type="submit" class="btn btn-success customAddSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
<!-- page content end -->	


<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- <script>
	$(document).ready(function(){
   		// Initialize select2
   		$("#select_form_name").select2();
   	});
</script> -->

<!-- For add radio labels and delete it -->
<script>
	$('body').on('change','.selectType',function(){
		var valueIs = $(this).val();

		if (valueIs == 'radio') 
		{
			$('.radio_add_part_div').css({"display":""});
			$('.radio_label_view_part_div').css({"display":""});

			$('.checkbox_add_part_div').css({"display":"none"});
			$('.checkbox_label_view_part_div').css({"display":"none"});
		}
		else if(valueIs == 'checkbox')
		{
			$('.checkbox_add_part_div').css({"display":""});
			$('.checkbox_label_view_part_div').css({"display":""});

			$('.radio_add_part_div').css({"display":"none"});
			$('.radio_label_view_part_div').css({"display":"none"});
		}
		else
		{
			$('.radio_add_part_div').css({"display":"none"});
			$('.radio_label_view_part_div').css({"display":"none"});
			$('.checkbox_add_part_div').css({"display":"none"});
			$('.checkbox_label_view_part_div').css({"display":"none"});			
		}
	});


	/*For add radio label*/
	$('body').on('click','.add_more_radio',function(){
		
		var text = $('.r_label').val();

		if(text!='')
		{
			var valueString = $('input[name="r_label[]"]').map(function () {
			    return this.value;
			}).get();

			var len=valueString.length;

			if (len >= 2) 
			{	
				var flag = 0;
				for(i=0; i<len; i++)
				{					
			  		if(valueString[i] == text)
			  		{
			      		swal("Duplicate data are not allowed"+text);
			      		$('.r_label').val('');
			      		flag = 1;
			  		}
				}

				if(flag == 0)
				{
			        $('.radio_label').append('<div class="col-md-12 label_radio" id="demo" ><div class=""><i class="fa fa-trash delete_r_label text-danger" aria-hidden="true"></i>  <input type="hidden" value="'+text+'"  name="r_label[]" class="radioLabelArray"><label>'+text+'</label></div></div>');
					$('.r_label').val('');
					$('.duplicate_radio').remove();
			  	}
			}
			else
			{
				if (valueString == text) {
					swal("Duplicate data are not allowed");
					$('.r_label').val('');
				}
				else 
				{
					$('.radio_label').append('<div class="col-md-12 label_radio" id="demo" ><div class=""><i class="fa fa-trash delete_r_label text-danger" aria-hidden="true"></i>  <input type="hidden" value="'+text+'"  name="r_label[]" class="radioLabelArray"><label>'+text+'</label></div></div>');
					$('.r_label').val('');
					$('.duplicate_radio').remove();
				}
			}
		}
		else
		{
			swal("Enter radio label name");
		}
	});

	/*For Delete radio label*/
	$('body').on('click','.delete_r_label',function(){
		$(this).parents('.label_radio').remove();
	});



	/*For add checkbox labels and delete it*/
	$('body').on('click','.add_more_checkbox',function(){
		var text = $('.c_label').val();

		/*if(text!=''){
			$('.checkbox_label').append('<div class="col-md-12 label_checkbox" id="demo" ><div class=""><i class="fa fa-trash delete_c_label text-danger" aria-hidden="true"></i>  <input type="hidden" value="'+text+'"  name="c_label[]" class="checkboxLabelArray"><label>'+text+'</label></div></div>');
			$('.c_label').val('');
			$('.duplicate_checkbox').remove();
		}
		else
		{
			swal("Enter checkbox label name");
		}*/

		if(text!='')
		{
			var valueString = $('input[name="c_label[]"]').map(function () {
			    return this.value;
			}).get();

			var len=valueString.length;

			if (len >= 2) 
			{	
				var flag = 0;
				for(i=0; i<len; i++)
				{					
			  		if(valueString[i] == text)
			  		{
			      		swal("Duplicate data are not allowed"+text);
			      		$('.c_label').val('');
			      		flag = 1;
			  		}
				}

				if(flag == 0)
				{
			        $('.checkbox_label').append('<div class="col-md-12 label_checkbox" id="demo" ><div class=""><i class="fa fa-trash delete_c_label text-danger" aria-hidden="true"></i>  <input type="hidden" value="'+text+'"  name="c_label[]" class="checkboxLabelArray"><label>'+text+'</label></div></div>');
					$('.c_label').val('');
					$('.duplicate_checkbox').remove();
			  	}
			}
			else
			{
				if (valueString == text) {
					swal("Duplicate data are not allowed");
					$('.c_label').val('');
				}
				else 
				{
					$('.checkbox_label').append('<div class="col-md-12 label_checkbox" id="demo" ><div class=""><i class="fa fa-trash delete_c_label text-danger" aria-hidden="true"></i>  <input type="hidden" value="'+text+'"  name="c_label[]" class="checkboxLabelArray"><label>'+text+'</label></div></div>');
					$('.c_label').val('');
					$('.duplicate_checkbox').remove();
				}
			}
		}
		else
		{
			swal("Enter checkbox label name");
		}

	});

	$('body').on('click','.delete_c_label',function(){
		$(this).parents('.label_checkbox').remove();
	});

	
	/*Submit time check if radio or checkbox selected then label value should not empty*/
	$('body').on('click','.customAddSubmitButton',function(e){

		var selectTepyIs = $('select[name=typename]').val();
		var selectFormNameIs = $('select[name=formname]').val();
		var labelNameIs = $('.labelname').val();
		var radioLabelVal = $('.radioLabelArray').val();
		var checkboxLabelVal = $('.checkboxLabelArray').val();

		var options = $('.selectTypeIs :selected').val();


		var msg1 = "<?php echo e(trans('app.Please enter radio label name on textbox after click on Add button.')); ?>";
		var msg2 = "<?php echo e(trans('app.Please enter checkbox label name on textbox after click on Add button.')); ?>";

		if(options == "radio") {
			if (selectFormNameIs != "" && labelNameIs != "") {
				if (radioLabelVal == "" || radioLabelVal == null) {
					//alert("radio" + 1);
					swal("Please enter radio label name on textbox after click on Add button.");
					$('.duplicate_checkbox').remove();
					e.preventDefault();									
				}
				else{
					//alert("radio else" + 2);
					$('.duplicate_radio').remove();
					//$('.customAddSubmitButton').attr("disabled","disabled");
				}			
			}
		}
		else if(options == "checkbox"){
			if (selectFormNameIs != "" && labelNameIs != "") {
				if (checkboxLabelVal == "" || checkboxLabelVal == null) {
					//alert("checkbox" + 1);
					swal("Please enter checkbox label name on textbox after click on Add button.");
					$('.duplicate_radio').remove();
					e.preventDefault();
				}
				else{
					//alert("checkbox else" + 2);
					$('.duplicate_radio').remove();
					//$('.customAddSubmitButton').attr("disabled","disabled");
				}				
			}
		}
		else{
			if (options != "") 
			{
				//alert("else of radio and checkbox");
				$('.duplicate_checkbox').remove();
				$('.duplicate_radio').remove();
				//$('.customAddSubmitButton').attr("disabled","disabled");
			}			
		}		
	});

	/*radion label add time check for special symbols*/
	$('body').on('keyup', '.r_label_inputbox', function(){

      	var inputText = $(this).val();

      	var msg3 = "<?php echo e(trans('app.At first position only alphabets are allowed.')); ?>";
		var msg4 = "<?php echo e(trans('app.Special symbols are not allowed.')); ?>";

      	if (!inputText.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
      	else if(!inputText.match(/^[a-zA-Z][a-zA-Z0-9\s\.\@\-\_]*$/)){
      		if(inputText.match(/^[0-9]*$/)){
      			$(this).val("");
      			swal("At first position only alphabets are allowed.");
      		}
      		else {
      			$(this).val("");
      			swal("Special symbols are not allowed.");
      		}
      	}
   	});


	/*checkbox label add time check for special symbols*/
   	$('body').on('keyup', '.c_label_inputbox', function(){

      	var inputText = $(this).val();

      	var msg5 = "<?php echo e(trans('app.At first position only alphabets are allowed.')); ?>";
		var msg6 = "<?php echo e(trans('app.Special symbols are not allowed.')); ?>";

      	if (!inputText.replace(/\s/g, '').length) {
         	$(this).val("");
      	}
      	else if(!inputText.match(/^[a-zA-Z][a-zA-Z0-9\s\.\@\-\_]*$/)){
      		if(inputText.match(/^[0-9]*$/)){
      			$(this).val("");
      			swal("At first position only alphabets are allowed.");
      		}
      		else {
      			$(this).val("");
      			swal("Special symbols are not allowed.");
      		}
      	}
   	});
</script>

<!-- Form field validation -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreCustomFieldAddEditFormRequest', '#customFieldAddForm');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>


<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.customAddSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.customAddForm').submit(function () {
        $('.customAddSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.customAddForm').bind('invalid-form.validate', function () {
      $('.customAddSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/Customfields/addcustom.blade.php ENDPATH**/ ?>
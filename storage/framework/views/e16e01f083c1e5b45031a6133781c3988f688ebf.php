
<?php $__env->startSection('content'); ?>
	
<script src="<?php echo e(URL::asset('js/jquery.min.js')); ?>"></script>

<?php include("vendors/chart/GoogleCharts.class.php"); ?>
<?php
$options = Array(
			'title' => $title_report,
			'titleTextStyle' => Array('color' => '#73879C','fontSize' => 14,'bold'=>true,'italic'=>false,'fontName' =>'"Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif'),
			'legend' =>Array('position' => 'right',
					'textStyle'=> Array('color' => '#73879C','fontSize' => 14,'bold'=>true,'italic'=>false,'fontName' =>'"Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif')),
				
			'hAxis' => Array(
					'title' => $date_report,
					'titleTextStyle' => Array('color' => '#73879C','fontSize' => 14,'bold'=>true,'italic'=>false,'fontName' =>'"Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif'),
					'textStyle' => Array('color' => '#73879C','fontSize' => 14),
					'maxAlternation' =>2,
					

			),
			'vAxis' => Array(
					'title' => $title,
					'width'=> 100,
				 'format' => '#',
					'titleTextStyle' => Array('color' => '#73879C','fontSize' => 16,'bold'=>true,'italic'=>false,'fontName' =>'"Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif'),
					'textStyle' => Array('color' => '#73879C','fontSize' => 12)
			),
			 'colors'=>array(
				'#26b99a'
				),
			'bar' =>array(
				'groupWidth'=>'100'
				),
    


	);
foreach($service as $data)
{
	$datas = $data->counts;
}
	
$GoogleCharts = new GoogleCharts;
$chart_array=array();
		$chart_array[] = array('date','counts');
		foreach($service as $services)
			{
				
				$chart_array[] = array($services->date,(int)$services->counts);
			}
			
$chart = $GoogleCharts->load('column','service_report')->get($chart_array,$options);
	
?>

<!-- CSS For Chart -->
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/util.css')); ?>">

<style>
	.select2-container { width: 100% !important; }
	.customer_select_padding { padding-top: 0px !important; }
</style>

	<div class="right_col servi" role="main">
		<div class="page-title">
			<div class="nav_menu">
			<nav>
				<div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Report')); ?></span></a>
				</div>
				<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</nav>
			</div>
		</div>
		
		<div class="x_content">
			<ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
					<li role="presentation" class=""><a href="<?php echo url('/report/salesreport'); ?>" class="anchor_tag"><span class="visible-xs"></span><i class="fa fa-tty image_icon"> </i> <?php echo e(trans('app.Vehicle Sales')); ?> </a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
					<li class="active setMarginForReportOnSmallDeviceService"><a href="<?php echo url('/report/servicereport'); ?>" class="anchor_tag anchr"><i class="fa fa-slack image_icon"> </i> <b><?php echo e(trans('app.Services')); ?></b> </a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
					<li class="setMarginForReportOnSmallDeviceProductStock"><a href="<?php echo url('/report/productreport'); ?>" class="anchor_tag anchr"><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo e(trans('app.Product Stock')); ?> </a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
					<li class="setMarginForReportOnSmallDeviceProductUsage"><a href="<?php echo url('/report/productuses'); ?>" class="anchor_tag anchr"><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo e(trans('app.Product Usage')); ?> </a></li>
				<?php endif; ?>
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
					<li class="setMarginForReportOnSmallDeviceServiceByEmployee"><a href="<?php echo url('/report/servicebyemployee'); ?>" class="anchor_tag anchr"><i class="fa fa-slack image_icon"> </i> <?php echo e(trans('app.Emp. Services')); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<form method="post" action="<?php echo url('/report/record_service'); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">
						
						<div class="col-md-4 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
							<label class="control-label col-md-3 col-sm-5 col-xs-12 currency" for="Country"><?php echo e(trans('app.Start Date')); ?> <label class="color-danger">*</label>
							</label>
							</label>
							<div class="col-md-9 col-sm-7 col-xs-12 input-group date start_date">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							  
							 <input type="text" name="start_date" id="start_date" autocomplete="off"  class="form-control" value="<?php if(!empty($s_date)) { echo date(getDateFormat(),strtotime($s_date));}else{ echo old('start_date'); }?>" placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required />
							</div>
							 <?php if($errors->has('start_date')): ?>
							<span class="help-block denger" style="margin-left: 27%;">
								<strong><?php echo e($errors->first('start_date')); ?></strong>
									</span>
								<?php endif; ?>
						</div>
						  
						<div class="col-md-4 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
							<label class="control-label col-md-3 col-sm-5 col-xs-12 currency" for="Country"><?php echo e(trans('app.End Date')); ?> <label class="color-danger">*</label>
							</label>
							
							<div class="col-md-9 col-sm-7 col-xs-12 input-group date end_date">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							  
							 <input type="text" name="end_date" id="end_date" autocomplete="off" class="form-control" value="<?php if(!empty($e_date)) { echo date(getDateFormat(),strtotime($e_date));}else{ echo old('end_date'); }?>" placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required />
							</div>
							 <?php if($errors->has('end_date')): ?>
									<span class="help-block denger" style="margin-left: 27%;">
										<strong><?php echo e($errors->first('end_date')); ?></strong>
									</span>
								<?php endif; ?>
						</div>   
							  
						<div class="col-md-4 col-sm-6 col-xs-12 form-group">
						   <label class="control-label col-md-5 col-sm-5 col-xs-12"  for="option"><?php echo e(trans('app.Select Service')); ?> </label>
							<div class="col-md-7 col-sm-7 col-xs-12">
								<select class="form-control" name="service_select">
									<option value="all" <?php if($all_service == 'all'){ echo "selected";} ?>><?php echo e(trans('app.All')); ?></option>
									
									 <option value="free" <?php if($all_service == 'free'){ echo "selected";} ?>><?php echo e(trans('app.Free')); ?></option>
									 <option value="paid" <?php if($all_service == 'paid'){ echo "selected";} ?>><?php echo e(trans('app.Paid')); ?></option>
								</select>
							</div>
						</div>

					<!-- Filter for select customer Start-->
						<div class="col-md-4 col-sm-6 col-xs-12 form-group">
						   <label class="control-label col-md-3 col-sm-5 col-xs-12 currency customer_select_padding"  for="option"><?php echo e(trans('app.Select Customer')); ?> </label>
							<div class="col-md-9 col-sm-7 col-xs-12">
								<select class="form-control customername_selectbox" name="select_customername" id="customerNameOptions" cus_url = "<?php echo url('report/get_cust_name'); ?>">
									<option value=""><?php echo e(trans('app.Select Customer')); ?></option>
										<?php if(!empty($customers)): ?>
											<?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($customer->id); ?>" <?php if($customer->id == $select_customerId) { echo  'selected'; } ?> > <?php echo e(getCustomerName($customer->id)); ?></option>	
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
								</select>
							</div>
						</div>
					<!-- Filter for select customer End-->

						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<div class="form-group">
							 <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-2 text-right">
								<button type="submit" class="btn btn-success colorname"><?php echo e(trans('app.Go')); ?></button>
								<button type="button" onclick="myFunction()" class="btn btn-success" id="chartshow"><?php echo e(trans('app.View Chart')); ?></button>
							</div>
						</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<?php if(!empty($datas)): ?>
		<div class="row">
			<div id="chartdiv" style="visibility:hidden;height:0;float:left;width:100%;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel tab_bottom">
						<div id="service_report"></div>
					</div>
				</div>
			</div>
		</div>
		
		<?php endif; ?>
		
						
		
		<div class="row" >
			<div class="col-md-12 col-sm-12 col-xs-12">
			
				 <div class="x_panel table_up_div">
					   <table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
						  <thead>
							<tr>
								<th>#</th>
								<th><?php echo e(trans('app.Job No')); ?></th>
								<th><?php echo e(trans('app.Customer Name')); ?></th>
								<th><?php echo e(trans('app.Date')); ?></th>
								<th><?php echo e(trans('app.Vehicle Name')); ?></th>
								<th><?php echo e(trans('app.Service Type')); ?></th>
								<th><?php echo e(trans('app.Paid Amount')); ?> (<?php echo e(getCurrencySymbols()); ?>)</th>
								<th><?php echo e(trans('app.Assign To')); ?></th>
							</tr>
						  </thead>

						  <tbody>
						  <?php $i = 1; ?>   
							<?php if(!empty($servicereport)): ?>
							<?php $__currentLoopData = $servicereport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicereports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							<tr>
								<td><?php echo e($i); ?></td>
								<td><?php echo e($servicereports->job_no); ?></td>
								<td><?php echo e(getCustomerName($servicereports->customer_id)); ?></td>
								<td><?php echo e(date(getDateFormat(),strtotime($servicereports->service_date))); ?></td>
								<td><?php echo e(getVehicleName($servicereports->vehicle_id)); ?></td>
								<td><?php echo e(ucfirst($servicereports->service_type)); ?></td>
								<td><?php echo e(number_format(getPaidAmount($servicereports->job_no), 2)); ?></td>
								<td><?php echo e(getAssignedName($servicereports->assign_to)); ?></td>
							</tr>
							 <?php $i++; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
						  </tbody>
						</table>
					  </div>
				
			</div>
			 
		</div>
		
	</div>
<!-- content page end -->

<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>

<!-- <script src="<?php echo e(URL::asset('build/js/jszip/3.1.3/jszip.min.js')); ?>" defer="defer"></script>
<script src="<?php echo e(URL::asset('build/js/pdfmake.min.js')); ?>" defer="defer"></script>
<script src="<?php echo e(URL::asset('build/js/vfs_fonts.js')); ?>" defer="defer"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="<?php echo e(URL::asset('build/js/vfs_fonts.js')); ?>"></script>

<!-- language change in user selected -->	
<script>
$(document).ready(function() {
    $('#datatable').DataTable( {
		responsive: true,
		dom: 'Bfrtip',
        buttons: [
            'pdf', 'print', 'excel'
        ],
        "language": {
			
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?php echo getLanguageChange(); 
			?>.json"
        }
    } );
} );
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>  -->
<!-- All Js file for Charts -->
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/loader.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/loader.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_default_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_graphics_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_ui_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_corechart_module.js')); ?>" defer="defer"></script>

<script type="text/javascript">
	<?php if(!empty($chart)) {echo $chart; }?>
</script>

<script>

$(document).ready(function(){
	
   
	$(".start_date,.input-group-addon").click(function(){		
		var dateend = $('#end_date').val('');
		
		});
		
		$(".start_date").datetimepicker({
			format: "<?php echo getDatepicker(); ?>",
			 minView: 2,
			autoclose: 1,
		}).on('changeDate', function (selected) {
			var startDate = new Date(selected.date.valueOf());
		
			$('.end_date').datetimepicker({
				format: "<?php echo getDatepicker(); ?>",
				 minView: 2,
				autoclose: 1,
			
			}).datetimepicker('setStartDate', startDate); 
		})
		.on('clearDate', function (selected) {
			 $('.end_date').datetimepicker('setStartDate', null);
		})
		
			$('.end_date').click(function(){
				
			var date = $('#start_date').val(); 
			if(date == '')
			{
				swal('First Select Start Date');
			}
			else{
				$('.end_date').datetimepicker({
				format: "<?php echo getDatepicker(); ?>",
				 minView: 2,
				autoclose: 1,
				})
			}
			});
	
	});	
	function myFunction() {
				var x = document.getElementById("chartdiv");
				if (x.style.visibility === "hidden") {
					x.style.visibility = "inherit";
					x.style.height = "auto";
					x.style.float = "left";
					x.style.width = "100%";
					
				} else {
					x.style.visibility = "hidden";
					x.style.height = "0";
					x.style.float = "left";
					x.style.width = "100%";
				}
			}
</script>

<script>
	$(document).ready(function(){
   		// Initialize select2
   		$("#customerNameOptions").select2();
   	});
</script>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/report/service/list.blade.php ENDPATH**/ ?>
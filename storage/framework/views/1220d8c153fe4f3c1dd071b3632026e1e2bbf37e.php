
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
				    'minValue' => 0,
					'maxValue' => 4,
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
foreach($product as $data)
{
	$datas = $data->counts;
}
	
	
$GoogleCharts = new GoogleCharts;
$chart_array=array();
		$chart_array[] = array('date','counts');
		foreach($product as $products)
			{
				
				$chart_array[] = array($products->date,(int)$products->counts);
			}
			
$chart = $GoogleCharts->load('column','product_report')->get($chart_array,$options);
	
?>
	
<style>
	body .top_nav .right_col.servi{
		min-height: 1150px!important;
	}
</style>

<!-- CSS For Chart -->
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/util.css')); ?>">

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
				<li role="presentation" class=""><a href="<?php echo url('/report/salesreport'); ?>" class="anchor_tag "><span class="visible-xs"></span><i class="fa fa-tty image_icon"> </i> <?php echo e(trans('app.Vehicle Sales')); ?> </a></li>
			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
            	<li class=""><a href="<?php echo url('/report/servicereport'); ?>" class="anchor_tag anchr"><i class="fa fa-slack image_icon"> </i> <?php echo e(trans('app.Services')); ?> </a></li>
			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
				<li class="active setMarginForReportOnSmallDeviceProductStock"><a href="<?php echo url('/report/productreport'); ?>" class="anchor_tag anchr"><i class="fa fa-product-hunt" aria-hidden="true"></i> <b><?php echo e(trans('app.Product Stock')); ?></b> </a></li>
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
                    <form method="post" action="<?php echo url('/report/record_product'); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">
					  
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
						   <label class="control-label col-md-3 col-sm-5 col-xs-12"  for="option"><?php echo e(trans('app.Manufacturer Name')); ?> <label class="color-danger">*</label> </label>
							<div class="col-md-9 col-sm-7 col-xs-12">
								<select class="form-control select_producttype" name="s_product" m_url="<?php echo url('/report/producttype/name'); ?>" required>
									<option value="all"<?php if($all_product=='all'){ echo 'selected'; } ?>><?php echo e(trans('app.All')); ?></option>
									<?php if(!empty($Select_product)): ?>
									<?php $__currentLoopData = $Select_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Select_products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									 <option value="<?php echo e($Select_products->id); ?>" <?php if($Select_products->id == $all_product) { echo  'selected'; } ?>><?php echo e($Select_products->type); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							 
							</div>
						</div> 
						
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
						   <label class="control-label col-md-3 col-sm-5 col-xs-12"  for="option"><?php echo e(trans('app.Product Name')); ?> <label class="color-danger">*</label> </label>
							<div class="col-md-9 col-sm-7 col-xs-12">
								<select class="form-control select_productname" name="product_name" required>
									<option value="item"<?php if($all_item=='item'){ echo 'selected'; } ?>><?php echo e(trans('app.Items')); ?></option>
									<?php if(!empty($productname)): ?>
									<?php $__currentLoopData = $productname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productreports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									 <option value="<?php echo e($productreports->id); ?>" <?php if($productreports->id == $all_item) { echo  'selected'; } ?>><?php echo e($productreports->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</select>
							 
							</div>
						</div> 
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<div class="form-group">
							<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-2 text-right">
								<button type="submit" class="btn btn-success"><?php echo e(trans('app.Go')); ?></button>
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
					<div id="product_report"></div>
				</div>
			</div>
		</div>
	</div>
	
	<?php endif; ?>
	
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
	
	<div class="row" >
        <div class="col-md-12 col-sm-12 col-xs-12">
		
			 <div class="x_panel table_up_div">
                  <table id="datatable" class="table table-striped jambo_table" style="margin-top:20px; width:100%;">
                      <thead>
                        <tr>
							<th>#</th>
							<th><?php echo e(trans('app.Purchase Number')); ?></th>
							<th><?php echo e(trans('app.Product Number')); ?></th>
							<th><?php echo e(trans('app.Manufacturer Name')); ?></th>
							<th><?php echo e(trans('app.Product Name')); ?></th>
							<th><?php echo e(trans('app.Purchase Date')); ?></th>
							<th><?php echo e(trans('app.Supplier Name')); ?></th>
							<th><?php echo e(trans('app.Price')); ?> (<?php echo getCurrencySymbols(); ?>)</th>
							<th><?php echo e(trans('app.Stock')); ?> </th>
                        </tr>
                      </thead>


                      <tbody>
					  <?php $i = 1; ?>   
						<?php if(!empty($productreport)): ?>
						<?php $__currentLoopData = $productreport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productreports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                        <tr>
							<td><?php echo e($i); ?></td>
							<td>
								<a href="<?php echo url('/purchase/list/pview/'.$productreports->purchase_id); ?>">
									<?php echo e(getPurchaseCode($productreports->purchase_id)); ?>

								</a>
							</td>
							
							<td> 
								<a href="<?php echo url('/product/list/'.$productreports->id); ?>" >
								<?php echo e($productreports->product_no); ?>

								</a>
							</td>
							<td><?php echo e(getProductName($productreports->product_type_id)); ?></td>
							<td><?php echo e($productreports->name); ?></td>
							<td><?php echo e(date(getDateFormat(),strtotime(getPurchaseDate($productreports->purchase_id)))); ?></td>
							<td><?php echo e(getSupplierName(getPurchaseSupplier($productreports->purchase_id))); ?></td>
							<td><?php echo e($productreports->price); ?></td>
							<td><?php echo e(getTotalStock($productreports->id)); ?></td>
							
							
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
<!-- content page code -->  

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

<script>
$(document).ready(function(){
	
	$('.select_producttype').change(function(){
		var m_id = $(this).val();
		
		var url = $(this).attr('m_url');

		$.ajax({
			type:'GET',
			url: url,
			data:{ m_id:m_id },
			success:function(response){
				$('.select_productname').html(response);
			}
		});
	});
	
});

</script>
<!-- datetimepicker-->
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
				swal('First Select Strat Date');
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/report/product/list.blade.php ENDPATH**/ ?>
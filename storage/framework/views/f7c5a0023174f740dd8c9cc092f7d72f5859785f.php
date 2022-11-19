
<?php $__env->startSection('content'); ?>

<style>
body .top_nav .right_col.servi{
	min-height: 1150px!important;
}

</style>
<div class="right_col servi" role="main">

	<div id="stockview" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
		<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<button type="button" data-dismiss="modal" class="close" >&times;</button>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Stock History')); ?></h4>
						
					</div>
					<div class="modal-body">
					
					</div>
				</div>
			</div>
	</div>
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
				<li class="setMarginForReportOnSmallDeviceProductStock"><a href="<?php echo url('/report/productreport'); ?>" class="anchor_tag anchr"><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php echo e(trans('app.Product Stock')); ?> </a></li>
			<?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
				<li class="active setMarginForReportOnSmallDeviceProductUsage"><a href="<?php echo url('/report/productuses'); ?>" class="anchor_tag anchr"><i class="fa fa-product-hunt" aria-hidden="true"></i> <b><?php echo e(trans('app.Product Usage')); ?></b> </a></li>
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
                    <form method="post" action="<?php echo url('/report/uses_product'); ?>" enctype="multipart/form-data"  class="form-horizontal upperform">
						<div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
							<label class="control-label col-md-3 col-sm-5 col-xs-12" for="Country"><?php echo e(trans('app.Start Date')); ?> <label class="color-danger">*</label>
							</label>
							<div class="col-md-9 col-sm-7 col-xs-12 input-group date start_date" id="start_dates">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							  
							 <input type="text" name="start_date" id="start_date" autocomplete="off" class="form-control" value="<?php if(!empty($s_date)) { echo date(getDateFormat(),strtotime($s_date));}else{ echo old('start_date'); }?>"  placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required />
							</div>
							<?php if($errors->has('start_date')): ?>
									<span class="help-block denger" style="margin-left: 27%;">
										<strong><?php echo e($errors->first('start_date')); ?></strong>
									</span>
								<?php endif; ?>
						</div>
					  
						<div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
							<label class="control-label col-md-3 col-sm-5 col-xs-12" for="Country"><?php echo e(trans('app.End Date')); ?> <label class="color-danger">*</label>
							</label>
							<div class="col-md-9 col-sm-7 col-xs-12 input-group date end_date">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
							  
							 <input type="text" name="end_date" id="end_date" autocomplete="off" class="form-control" value="<?php if(!empty($e_date)) { echo date(getDateFormat(),strtotime($e_date));}else{ echo old('end_date'); }?>"  placeholder="<?php echo getDatepicker();?>" onkeypress="return false;" required/>
							</div>
							<?php if($errors->has('end_date')): ?>
									<span class="help-block denger" style="margin-left: 27%;">
										<strong><?php echo e($errors->first('end_date')); ?></strong>
									</span>
								<?php endif; ?>
						</div>   
                          
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
						   <label class="control-label col-md-3 col-sm-5 col-xs-12"  for="option"><?php echo e(trans('app.Manufacturer Name')); ?> </label>
							<div class="col-md-9 col-sm-7 col-xs-12">
								<select class="form-control select_producttype" name="m_product" m_url="<?php echo url('/report/producttype/name'); ?>">
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
						   <label class="control-label col-md-3 col-sm-5 col-xs-12"  for="option"><?php echo e(trans('app.Product Name')); ?> </label>
							<div class="col-md-9 col-sm-7 col-xs-12">
								<select class="form-control select_productname" name="product_name">
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
	<div class="row" >
        <div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="x_panel table_up_div">
                <table id="datatable" class="table table-striped jambo_table" style="margin-top:20px; width:100%;">
                    <thead>
                        <tr>
							<th>#</th>
							<th><?php echo e(trans('app.Product Number')); ?></th>
							<th><?php echo e(trans('app.Manufacturer Name')); ?></th>
							<th><?php echo e(trans('app.Product Name')); ?></th>
						   <!-- <th><?php echo e(trans('app.Date')); ?></th> -->
							<th><?php echo e(trans('app.Total Stock')); ?></th>
							<th><?php echo e(trans('app.Product Sales')); ?></th>
							<th><?php echo e(trans('app.Product Service')); ?></th>
						    <!--<th><?php echo e(trans('app.Current Stock')); ?> </th> -->
						    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
								<th><?php echo e(trans('app.Action')); ?> </th>
							<?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
					  <?php $i = 1; ?>   
						<?php if(!empty($productreport)): ?>
						<?php $__currentLoopData = $productreport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productreports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
                        <tr>
							<td><?php echo e($i); ?></td>
							<td><?php echo e($productreports->product_no); ?></td>
							<td><?php echo e(getProductName($productreports->product_type_id)); ?></td>
							<td><?php echo e($productreports->name); ?></td>
							<td><?php echo e(getTotalProduct($productreports->id,$s_date,$e_date)); ?></td>
							<?php if($productreports->category == 0): ?>
								<td><?php echo e(getCellProduct($productreports->id,$s_date,$e_date)); ?></td>
							<?php else: ?>
								<td><?php echo e(getCellProductSale($productreports->id,$s_date,$e_date)); ?></td>
							<?php endif; ?>
							<?php if($productreports->category != 0): ?>
								<td><?php echo e(getTotalServiceProduct($productreports->id,$s_date,$e_date)); ?></td>
							<?php else: ?>
								<td>0</td>
							<?php endif; ?>	
							<?php if($productreports->category == 0): ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
									<td><button type="button" data-toggle="modal" data-target="#stockview" productid="<?php echo e($productreports->product_id); ?>" s_date="<?php echo e($s_date); ?>" e_date="<?php echo e($e_date); ?>" url="<?php echo url('/report/stock/modalview'); ?>" class="btn btn-round btn-info stocksave"><?php echo e(trans('app.View')); ?></button></td>
								<?php endif; ?>
							<?php else: ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
									<td><button type="button" data-toggle="modal" data-target="#stockview" productid="<?php echo e($productreports->product_id); ?>" s_date="<?php echo e($s_date); ?>" e_date="<?php echo e($e_date); ?>" url="<?php echo url('/report/stock/modalviewPart'); ?>" class="btn btn-round btn-info stocksave"><?php echo e(trans('app.View')); ?></button></td>
								<?php endif; ?>
							<?php endif; ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

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
	}).on('changeDate', function (selected){
		var startDate = new Date(selected.date.valueOf());
		$('.end_date').datetimepicker({
			format: "<?php echo getDatepicker(); ?>",
			minView: 2,
			autoclose: 1,
		}).datetimepicker('setStartDate', startDate); 
	})
	.on('clearDate', function (selected){
		$('.end_date').datetimepicker('setStartDate', null);
	})
	
	$('.end_date').click(function(){
		var date = $('#start_date').val(); 
		if(date == '')
		{
			swal('First Select Start Date');
		}
		else
		{
			$('.end_date').datetimepicker({
				format: "<?php echo getDatepicker(); ?>",
				minView: 2,
				autoclose: 1,
			})
		}
	});
});	

$( document ).ready(function(){
	$('body').on('click', '.stocksave', function() {	  
		$('.modal-body').html("");
		var productid = $(this).attr("productid");
		var s_date = $(this).attr("s_date");
		var e_date = $(this).attr("e_date");
		var url = $(this).attr('url');
		$.ajax({
			type: 'GET',
			url: url,
			data : {productid:productid,s_date:s_date,e_date:e_date},
			success: function (data)
			{            
				$('.modal-body').html(data.html);
			},
			beforeSend:function()
			{
				$(".modal-body").html("<center><h2 class=text-muted><b>Loading...</b></h2></center>");
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/report/product/product_uses.blade.php ENDPATH**/ ?>
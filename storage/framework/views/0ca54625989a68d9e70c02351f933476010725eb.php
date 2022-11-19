
<?php $__env->startSection('content'); ?>

<!-- page content -->	
    <div class="right_col" role="main">
		<div id="purchaseview" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
		<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Purchase')); ?></h4>
						
					</div>
					<div class="modal-body">
					
					</div>
				</div>
			</div>
		</div>
        <div class="">
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
        </div>
            <?php if(session('message')): ?>
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							<?php if(session('message') == 'Successfully Submitted'): ?>
									<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Submitted')); ?>  </label>
								<?php elseif(session('message')=='Successfully Updated'): ?>
									<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Updated')); ?>  </label>
								<?php elseif(session('message')=='Successfully Deleted'): ?>
									<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Successfully Deleted')); ?>  </label>
								<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_content">
						<ul class="nav nav-tabs bar_tabs" role="tablist">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_view')): ?>
								<li role="presentation" class="active"><a href="<?php echo url('/purchase/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b> <?php echo e(trans('app.Purchase List')); ?></b></a></li>
							<?php endif; ?>

							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_add')): ?>
								<li role="presentation" class=""><a href="<?php echo url('/purchase/add'); ?>"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i> <?php echo e(trans('app.Add Purchase')); ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel bgr">
						<table id="datatable" class="example table table-striped responsive-utilities jambo_table" style="margin-top:20px; width:100%;">
							<thead>
								<tr>
									<th><?php echo e(trans('app.#')); ?></th>
									<th><?php echo e(trans('app.Purchase Code')); ?></th>
									<th><?php echo e(trans('app.Supplier Name')); ?></th>
									<th><?php echo e(trans('app.Email')); ?></th>
									<th><?php echo e(trans('app.Mobile')); ?></th>
									<th><?php echo e(trans('app.Date')); ?></th>
									<th><?php echo e(trans('app.Action')); ?></th>
								</tr>
							</thead>
							<tbody>
							<?php $i=1;?>
							<?php $__currentLoopData = $purchase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchases): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($i); ?></td>
								<td><?php echo e($purchases->purchase_no); ?></td>
								<td><?php echo e(getCompanyNames($purchases->supplier_id)); ?></td>
								<td><?php echo e($purchases->email); ?></td>
								<td><?php echo e($purchases->mobile); ?></td>
								<td><?php echo e(date(getDateFormat(),strtotime($purchases->date))); ?></td>
								<td> 
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_view')): ?>
										<button type="button" data-toggle="modal" data-target="#purchaseview" purchaseid="<?php echo e($purchases->id); ?>" url="<?php echo url('/purchase/list/modalview'); ?>" class="btn btn-round btn-info purchasesave"><?php echo e(trans('app.View')); ?></button>
									<?php endif; ?>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_edit')): ?>
										<a href="<?php echo url ('/purchase/list/edit/'.$purchases->id); ?>"> <button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
									<?php endif; ?>

									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_delete')): ?>
										<a url="<?php echo url('/purchase/list/delete/'.$purchases->id); ?>" class="sa-warning buttonOfAtag"> <button type="button" class="btn btn-round btn-danger threeBtnInOneLine"><?php echo e(trans('app.Delete')); ?></button></a>
									<?php endif; ?>
								</td>
							</tr>
							<?php $i++; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
                </div>
            </div>
    </div>

<!-- /page content -->
<script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
<!-- language change in user selected -->	
<script>
$(document).ready(function() {
    $('#datatable').DataTable( {
		responsive: true,
        "language": {
			
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/<?php echo getLanguageChange(); 
			?>.json"
        }
    } );
} );
</script>

<script>
$('body').on('click', '.sa-warning', function() {
    var url =$(this).attr('url');
	  swal({   
            title: "Are You Sure?",
			text: "You will not be able to recover this data afterwards!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#297FCA",   
            confirmButtonText: "Yes, delete!",   
            closeOnConfirm: false 
        }, function(){
			window.location.href = url;
             
        });
    }); 
 
</script>
<script type="text/javascript">

$( document ).ready(function(){

$('body').on('click', '.purchasesave', function() {	  
	  $('.modal-body').html("");
	   
       var purchaseid = $(this).attr("purchaseid");
	   
	   var url = $(this).attr('url');
	
       $.ajax({
       type: 'GET',
       url: url,
       data : {purchaseid:purchaseid},
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
		}
		});

       });
   });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/purchase/list.blade.php ENDPATH**/ ?>
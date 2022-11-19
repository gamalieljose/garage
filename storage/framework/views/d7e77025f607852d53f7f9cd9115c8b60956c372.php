
<?php $__env->startSection('content'); ?>

<!-- page content -->
	<div class="right_col" role="main">
		<div id="myModal-job" class="modal fade setTableSizeForSmallDevices" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" data-dismiss="modal" class="close">&times;</button></a>
							<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.JobCard')); ?></h4>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
	<!--gate pass-->

		<div id="myModal-gate" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
 
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Gate Pass')); ?></h4>
					</div>
					<div class="modal-body">
	
					</div>
				</div>
			</div>
		</div>
		
		<script  type="text/javascript">
			  
			function PrintElem(elem)
			{
				Popup($(elem).html());
			}
			function Popup(data) 
			{
				var mywindow = window.open('', 'Print Expense Invoice', 'height=600,width=1000');
			   
				mywindow.document.write(data);
			   

				mywindow.document.close();
				mywindow.focus();

				mywindow.print();
				mywindow.close();

				return true;
			}
		</script>
	<!--end of gate pass-->

		<div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
				  		<div class="nav toggle">
							<a id="menu_toggle">
								<i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.JobCard')); ?></span>
							</a>
				  		</div>
					  	<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
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
			
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="x_content">
						<ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>
							<li role="presentation" class="active">
								<a href="<?php echo url('/jobcard/list'); ?>">
									<span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.List Of Job Cards')); ?></b></span>
								</a>
							</li>				
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_add')): ?>			
							<li role="presentation" class="setMarginForAddJobcardForSmallDevices">
								<a href="<?php echo url('/service/add'); ?>">
									<span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><?php echo e(trans('app.Add JobCard')); ?></span>
								</a>
							</li>						
							<?php endif; ?>
						</ul>
					</div>
					<div class="x_panel table_up_div">
						<table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
							<thead>
								<tr>
									<th><?php echo e(trans('app.#')); ?></th>
									<th><?php echo e(trans('app.Job Card No')); ?></th>
									<th><?php echo e(trans('app.Service Type')); ?></th>
									<th><?php echo e(trans('app.Customer Name')); ?></th>
									<th><?php echo e(trans('app.Service Date')); ?></th>
									<th><?php echo e(trans('app.Status')); ?></th>
									<th><?php echo e(trans('app.Action')); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($services)): ?>
								   	<?php $i = 1; ?>   
										<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
									
										<tr>
											<td><?php echo e($i); ?></td>
											<td><?php echo e($servicess->job_no); ?></td>
											<td><?php echo e(ucfirst($servicess->service_type)); ?></td>
											<td><?php echo e(getCustomerName($servicess->customer_id)); ?></td>
											<?php $dateservice = date("Y-m-d", strtotime($servicess->service_date)); ?>
											<?php if(strpos($available, $dateservice) !== false): ?>
												<td><span class="label  label-danger" style="font-size:13px;"><?php echo e(date(getDateFormat(),strtotime($dateservice))); ?></span></td>
											<?php else: ?>
												<td><?php echo e(date(getDateFormat(),strtotime($dateservice))); ?></td>
											<?php endif; ?>
											<td><?php if($servicess->done_status == 0)
												 { echo"Open";}
												 else if($servicess->done_status == 1)
												 { echo"Completed";}
												 elseif($servicess->done_status == 2){
													 echo"Progress";
												 } ?>
											</td>

											<td>
											<?php if(getUserRoleFromUserTable(Auth::User()->id) == 'admin' || getUserRoleFromUserTable(Auth::User()->id) == 'supportstaff' || getUserRoleFromUserTable(Auth::User()->id) == 'accountant' || getUserRoleFromUserTable(Auth::User()->id) == 'employee'): ?>
												<?php if(Gate::allows('jobcard_view') && Gate::allows('jobcard_edit') && Gate::allows('jobcard_add')): ?>
													
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>
													<?php
													$view_data = getInvoiceStatus($servicess->job_no);
												
													if($view_data == "No")
													{
														if($servicess->done_status == '1')
														{
														?>
															<a href="<?php echo e(url('jobcard/list/add_invoice/'.$servicess->id)); ?>"><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.Create Invoice')); ?> </button></a>			
														<?php 
														}
														elseif($servicess->done_status != '1'  )
														{		
														?>
															<a href="<?php echo e(url('jobcard/list/add_invoice/'.$servicess->id)); ?>"><button type="button" class="btn btn-round btn-info" disabled><?php echo e(trans('app.Create Invoice')); ?> </button></a>	
														<?php
														}
													}
													else
													{ 
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php
													}	
													?>
													<?php endif; ?>

													<?php  $jobcard = getJobcardStatus($servicess->job_no);
														$view_data = getInvoiceStatus($servicess->job_no);
													?>
												
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_edit')): ?>
													<?php if($jobcard == 1): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>
													<?php elseif($view_data == "Yes"): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>  
													<?php else: ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Process Job')); ?></button></a> 
													<?php endif; ?>
													
													<?php if(getAlreadypasss($servicess->job_no) == 0 && $view_data =='Yes'): ?>
														<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif($view_data =='No'): ?>
													<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif(getAlreadypasss($servicess->job_no) == 1): ?>
														<button type="button" data-toggle="modal" data-target="#myModal-gate" 
														serviceid="" class="btn getgetpass btn-round btn-info" getid="<?php echo e($servicess->job_no); ?>"><?php echo e(trans('app.Gate Receipt')); ?></button>
													<?php endif; ?>
												  	<?php endif; ?>	
												<?php elseif(getUserRoleFromUserTable(Auth::User()->id) == 'supportstaff' || getUserRoleFromUserTable(Auth::User()->id) == 'accountant' || getUserRoleFromUserTable(Auth::User()->id) == 'employee'): ?>
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>	
													<?php
													$view_data = getInvoiceStatus($servicess->job_no);
												
													if($view_data == "Yes")
													{	
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php
													}
													else{
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save" disabled><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php 
													}
													?>
													<?php endif; ?>

													<?php  
														$jobcard = getJobcardStatus($servicess->job_no);
														$view_data = getInvoiceStatus($servicess->job_no);
													?>
													
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_edit')): ?>
													<?php if($jobcard == 1): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>
													<?php elseif($view_data == "Yes"): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>  
													<?php else: ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Process Job')); ?></button></a> 
													<?php endif; ?>

													<?php if(getAlreadypasss($servicess->job_no) == 0 && $view_data =='Yes'): ?>
														<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif($view_data =='No'): ?>
													<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif(getAlreadypasss($servicess->job_no) == 1): ?>
														<button type="button" data-toggle="modal" data-target="#myModal-gate" 
														serviceid="" class="btn getgetpass btn-round btn-info" getid="<?php echo e($servicess->job_no); ?>"><?php echo e(trans('app.Gate Receipt')); ?></button>
													<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											<?php elseif(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
												<?php if(Gate::allows('jobcard_view') && Gate::allows('jobcard_add') && Gate::allows('jobcard_edit')): ?>
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>
													<?php
													$view_data = getInvoiceStatus($servicess->job_no);
												
													if($view_data == "No")
													{
														if($servicess->done_status == '1')
														{
														?>
															<a href="<?php echo e(url('jobcard/list/add_invoice/'.$servicess->id)); ?>"><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.Create Invoice')); ?> </button></a>
															
														<?php 
														}
														elseif($servicess->done_status != '1'  )
														{		
														?>
															<a href="<?php echo e(url('jobcard/list/add_invoice/'.$servicess->id)); ?>"><button type="button" class="btn btn-round btn-info" disabled><?php echo e(trans('app.Create Invoice')); ?> </button></a>	
														<?php
														}
													}
													else
													{ 
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php
													}	
													?>
													<?php endif; ?>

													<?php  $jobcard = getJobcardStatus($servicess->job_no);
														$view_data = getInvoiceStatus($servicess->job_no);
													?>
												
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_edit')): ?>
													<?php if($jobcard == 1): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>
													<?php elseif($view_data == "Yes"): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>  
													<?php else: ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Process Job')); ?></button></a> 
													<?php endif; ?>
													
													<?php if(getAlreadypasss($servicess->job_no) == 0 && $view_data =='Yes'): ?>
														<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif($view_data =='No'): ?>
													<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif(getAlreadypasss($servicess->job_no) == 1): ?>
														<button type="button" data-toggle="modal" data-target="#myModal-gate" 
														serviceid="" class="btn getgetpass btn-round btn-info" getid="<?php echo e($servicess->job_no); ?>"><?php echo e(trans('app.Gate Receipt')); ?></button>
													<?php endif; ?>
													<?php endif; ?>	
												
												<?php else: ?>
													
													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>
													<?php

													$view_data = getInvoiceStatus($servicess->job_no);
													
													if($view_data == "Yes")
													{	
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save"><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php
													}
													else{
													?>
														<button type="button" data-toggle="modal" data-target="#myModal-job" serviceid="<?php echo e($servicess->id); ?>" url="<?php echo url('/jobcard/modalview'); ?>" class="btn btn-round btn-info save" disabled><?php echo e(trans('app.View Invoice')); ?> </button>
													<?php 
													}
													?>
													<?php endif; ?>

													<?php  $jobcard = getJobcardStatus($servicess->job_no);
														$view_data = getInvoiceStatus($servicess->job_no);
													?>

													<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_edit')): ?>
													<?php if($jobcard == 1): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>
													<?php elseif($view_data == "Yes"): ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Process Job')); ?></button></a>  
													<?php else: ?>
														<a href="<?php echo e(url('jobcard/list/'.$servicess->id)); ?>" ><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Process Job')); ?></button></a> 
													<?php endif; ?>
													
													<?php if(getAlreadypasss($servicess->job_no) == 0 && $view_data =='Yes'): ?>
														<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" ><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif($view_data =='No'): ?>
													<a href="<?php echo url('/jobcard/gatepass/'.$servicess->id); ?>"><button type="button" class="btn btn-round btn-success" disabled><?php echo e(trans('app.Gate Pass')); ?></button></a>
													
													<?php elseif(getAlreadypasss($servicess->job_no) == 1): ?>
														<button type="button" data-toggle="modal" data-target="#myModal-gate" 
														serviceid="" class="btn getgetpass btn-round btn-info" getid="<?php echo e($servicess->job_no); ?>"><?php echo e(trans('app.Gate Receipt')); ?></button>
													<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
											</td>
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
	</div>


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
$(document).ready(function(){
	$('body').on('click', '.getgetpass', function() {
		var getid = $(this).attr('getid');
	 var url = "<?php echo url('/getpassdetail'); ?>";
		$.ajax({
			type:'GET',
			url:url,
			data:{getid:getid},
			success:function(response)
			{
				$('.modal-body').html(response.html);
			},
		});
	});
});
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
	
<!-- Gate Pass Script -->

<script  type="text/JavaScript">
	  
		function PrintElem(elem)
			{
					Popup($(elem).html());
			}
			function Popup(data) 
    {
        var mywindow = window.open('', 'Print Expense Invoice', 'height=600,width=1000');
       
        mywindow.document.write(data);
       

        mywindow.document.close();
        mywindow.focus();

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>

<!-- End Of Gate Pass Script -->
<script type="text/JavaScript">

$( document ).ready(function(){
$('body').on('click', '.save', function() {
   	  
	  $('.modal-body').html("");
	   
       var serviceid = $(this).attr("serviceid");
	 
		var url = $(this).attr('url');
	
       $.ajax({
       type: 'GET',
       url: url,
	
       data : {serviceid:serviceid},
       success: function (data)
       {            
				console.log(data.html);
			  $('.modal-body').html(data.html);
				
   },
   beforeSend:function(){
						$(".modal-body").html("<center><h2 class=text-muted><b>Loading...</b></h2></center>");
					},
error: function(e) {
       alert("An error occurred: " + e.responseText);
       console.log(e);	
}

       });

       });
	      

   });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/jobcard/list.blade.php ENDPATH**/ ?>
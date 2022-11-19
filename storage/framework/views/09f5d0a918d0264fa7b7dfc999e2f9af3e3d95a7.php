
<?php $__env->startSection('content'); ?>
<style>
.right_side .table_row, .member_right .table_row {
    border-bottom: 1px solid #dedede;
    float: left;
    width: 100%;
	padding: 1px 0px 4px 2px;
}
.table_row .table_td {
  padding: 8px 8px !important;
}
.report_title {
    float: left;
    font-size: 20px;
    width: 100%;
}
</style>

<!-- page content -->
    <div class="right_col" role="main">
	<!-- free service  model-->
		<div id="myModal_free_service" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href="<?php echo url('/employee/view/'.$viewid); ?>"><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Free Service Details')); ?></h4>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
	<!-- Paid service  model-->
		<div id="myModal_paid_service" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href="<?php echo url('/employee/view/'.$viewid); ?>"><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Paid Service Details')); ?></h4>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
	<!-- Repeat job service  model-->
		<div id="myModal_repeat_service" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href="<?php echo url('/employee/view/'.$viewid); ?>"><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Repeat Job Service Details')); ?></h4>
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
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Employee')); ?></span></a>
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
					<input id="checkbox-10" type="checkbox" checked="">
					<label for="checkbox-10 colo_success">  <?php echo e(session('message')); ?> </label>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
					<ul class="nav nav-tabs bar_tabs" role="tablist">
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_view')): ?>
							<li role="presentation" class=""><a href="<?php echo url('/employee/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Employee List')); ?></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_view')): ?>
							<li role="presentation" class="active"><a href="<?php echo url('/employee/view/'.$viewid); ?>"><span class="visible-xs"></span> <i class="fa fa-user">&nbsp; </i><b><?php echo e(trans('app.View Employee')); ?></b></a></li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12 main_left">
						<div class="x_panel">
							<div class="col-md-6 col-sm-12 col-xs-12 left_side">
								<img src="<?php echo e(URL::asset('public/employee/'.$user->image)); ?>" class="cimg">
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12 right_side">
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td">
										<i class="fa fa-user"></i> 
											<b><?php echo e(trans('app.Name')); ?></b>	
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">
										<span class="txt_color">
										<?php echo e($user->name.' '.$user->lastname); ?>

										</span>
									</div>
								</div>
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td">
										<i class="fa fa-envelope"></i> 
										<b><?php echo e(trans('app.Email')); ?></b> 	
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">
										<span class="txt_color"><?php echo e($user->email); ?></span>
									</div>
								</div>
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td"><i class="fa fa-phone"></i> <b><?php echo e(trans('app.Mobile No')); ?></b>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">
										<span class="txt_color">
											<span class="txt_color"><?php echo e($user->mobile_no); ?> </span>
										</span>
									</div>
								</div>
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td">
										<i class="fa fa-calendar"></i><b> <?php echo e(trans('app.Date Of Birth')); ?></b>	
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">					<span class="txt_color">
											<?php if(!empty($user->birth_date)): ?>
												<?php echo e(date(getDateFormat(),strtotime($user->birth_date))); ?>

											<?php else: ?>
												<?php echo e(trans('app.Not Added')); ?>

											<?php endif; ?>
										</span>
									</div>
								</div>
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td">
										<i class="fa fa-mars"></i> <b><?php echo e(trans('app.Gender')); ?> </b>
									</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">
										<span class="txt_color">
										<?php if($user->gender =='1'): ?>
										  <?php echo"male ";?>
										  <?php else: ?>
											<?php echo"female";?>
										<?php endif; ?>
										 </span>
									</div>
								</div>
								<div class="table_row">
									<div class="col-md-5 col-sm-12 col-xs-12 table_td">
										<i class="fa fa-map-marker"></i> <b><?php echo e(trans('app.Address')); ?></b>		</div>
									<div class="col-md-7 col-sm-12 col-xs-12 table_td">
										<span class="txt_color">
										  <?php echo e($user->address); ?>,<br/>
										  <?php echo (getCityName($user->city_id) != null) ? getCityName($user->city_id) .",<br>" : "";?>
										  <?php echo e(getStateName($user->state_id)); ?>, <?php echo e(getCountryName($user->country_id)); ?>.
										</span>
									</div>
								</div>
							</div>
                        </div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 morinfo">
                        <div class="x_panel">
                            <div class="col-md-12 col-sm-12 col-xs-12 right_side">
								<span class="report_title">
									<span class="fa-stack cutomcircle">
										<i class="fa fa-align-left fa-stack-1x"></i>
									</span> 
									<span class="shiptitle"><?php echo e(trans('app.More Info')); ?></span>		
								</span>
						 
							<?php if(!empty($tbl_custom_fields)): ?>		
								<?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
									<?php 
									$tbl_custom=$tbl_custom_field->id;
									$userid=$user->id;
								
									$datavalue=getCustomData($tbl_custom,$userid);
									?>
									<?php if($tbl_custom_field->type == "radio"): ?>
										<?php if($datavalue != ""): ?>
											<?php
												$radio_selected_value = getRadioSelectedValue($tbl_custom_field->id, $datavalue);
											?>
										
											<div class="table_row">									
												<div class="col-md-6 col-sm-12 table_td">
													<b><?php echo e($tbl_custom_field->label); ?></b>
												</div>
												<div class="col-md-6 col-sm-12 table_td">
													<span class="txt_color"><?php echo e($radio_selected_value); ?></span>
												</div>						
											</div>
										<?php endif; ?>
									<?php else: ?>
										<?php if($datavalue != ""): ?>
											<div class="table_row">									
												<div class="col-md-6 col-sm-12 table_td">
													<b><?php echo e($tbl_custom_field->label); ?></b>
												</div>
												<div class="col-md-6 col-sm-12 table_td">
													<span class="txt_color"><?php echo e($datavalue); ?></span>
												</div>						
											</div>
										<?php endif; ?>
									<?php endif; ?>													
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo e(trans('app.Free Service Details')); ?> </h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li class="dropdown">
							<form method="get" action="<?php echo e(action('JobCardcontroller@index')); ?>">
						
								<input type="hidden" name="free"  value="<?php  echo'free';?>"/>
								<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
							</form>
						</li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  
				  <?php if(!empty($emp_free_service)): ?>
				  <?php $__currentLoopData = $emp_free_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="x_content">
				 
				    <?php
                        $date=$services->service_date;
						$month=date("M", strtotime($date));
						$day=date("d", strtotime($date));
						
					?>

                    <article class="media event">
						<a class="pull-left date">
							<p class="month"><?php echo $month; ?></p>
							<p class="day"><?php echo $day; ?></p>
						</a>
						<?php $view_data = getInvoiceStatus($services->job_no); ?>
							<?php if($view_data == "Yes"): ?>
								<a href="" data-toggle="modal" emp_free="<?php echo e($services->id); ?>"  url="<?php echo url('/employee/free_service'); ?>"  data-target="#myModal_free_service" print="20" class="emp_freeservice">
							<?php else: ?>
									<a href="<?php echo url('/jobcard/list/'.$services->id); ?>">
							<?php endif; ?>
						<div class="media-body">
							<?php $dateservicefree = date("Y-m-d", strtotime($services->service_date)); ?>
							<span class="jobdetails"><?php echo e($services->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicefree))); ?></span></br> 
							<span> <?php echo e(getCustomerName($services->customer_id)); ?> | <?php echo e(getRegistrationNo($services->vehicle_id)); ?> | <?php echo e(getVehicleName($services->vehicle_id)); ?></span>
						</div>
						<?php if($view_data == "Yes"): ?>
							 <i class="fa fa-eye eye" style="color:#5FCE9B;" aria-hidden="true"></i></a>		  
						<?php else: ?>
							 <i class="fa fa-eye eye" style="color:#f0ad4e;" aria-hidden="true"></i></a>
						<?php endif; ?>
                    </article>
					</div>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<h2><?php echo e(trans('app.Paid Service Details')); ?> </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li class="dropdown">
								<form method="get" action="<?php echo e(action('JobCardcontroller@index')); ?>">
									<input type="hidden" name="paid"  value="<?php  echo'paid';?>"/>
									<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
								</form>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<?php if(!empty($emp_paid_service)): ?>
					<?php $__currentLoopData = $emp_paid_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp_paid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="x_content">
						<?php
							$date=$emp_paid->service_date;
							$month=date("M", strtotime($date));
							$day=date("d", strtotime($date));
						?>
						<article class="media event">
							<a class="pull-left date">
								<p class="month"><?php echo $month; ?></p>
								<p class="day"><?php echo $day; ?></p>
							</a>
							 <?php   $view_data = getInvoiceStatus($emp_paid->job_no); ?>
								<?php if($view_data == "Yes"): ?>
									<a href="" data-toggle="modal" emp_paid="<?php echo e($emp_paid->id); ?>"  url="<?php echo url('/employee/paid_service'); ?>"  data-target="#myModal_paid_service" print="20" class="emp_paidservice">
								<?php else: ?>
									<a href="<?php echo url('/jobcard/list/'.$emp_paid->id); ?>">
								<?php endif; ?>
						
							<div class="media-body">
								<?php $dateservicepaid = date("Y-m-d", strtotime($emp_paid->service_date)); ?>
								<span class="jobdetails"><?php echo e($emp_paid->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicepaid))); ?> </span></br> 
								<span> <?php echo e(getCustomerName($emp_paid->customer_id)); ?> | <?php echo e(getRegistrationNo($emp_paid->vehicle_id)); ?> | <?php echo e(getVehicleName($emp_paid->vehicle_id)); ?></span>
							</div>
							<?php if($view_data == "Yes"): ?>
								<i class="fa fa-eye eye" style="color:#5FCE9B;" aria-hidden="true"></i></a>		  
							<?php else: ?>
								<i class="fa fa-eye eye" style="color:#f0ad4e;" aria-hidden="true"></i></a>
							<?php endif; ?>
						</article>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_title">
						<h2><?php echo e(trans('app.Repeat Job Service Details')); ?> </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li class="dropdown">
								<form method="get" action="<?php echo e(action('JobCardcontroller@index')); ?>">
							
									<input type="hidden" name="repeatjob"  value="<?php  echo'repeat job';?>"/>
									<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
								</form>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				<?php if(!empty($emp_repeatjob)): ?>
				<?php $__currentLoopData = $emp_repeatjob; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repeatjobs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="x_content">
						<?php
							$date=$repeatjobs->service_date;
							$month=date("M", strtotime($date));
							$day=date("d", strtotime($date));
							
						?>
						<article class="media event">
							<a class="pull-left date">
								<p class="month"><?php echo $month; ?></p>
								<p class="day"><?php echo $day; ?></p>
							</a>
							<?php $view_data = getInvoiceStatus($repeatjobs->job_no); ?>
							<?php if($view_data == "Yes"): ?>
								<a href="" data-toggle="modal" emp_repeat="<?php echo e($repeatjobs->id); ?>"  url="<?php echo url('/employee/repeat_service'); ?>"  data-target="#myModal_repeat_service" print="20" class="emp_repeatjob">
							<?php else: ?>
								<a href="<?php echo url('/jobcard/list/'.$repeatjobs->id); ?>">
							<?php endif; ?>
							<div class="media-body">
							    <?php $dateservicerepeat = date("Y-m-d", strtotime($repeatjobs->service_date)); ?>
								<span class="jobdetails"><?php echo e($repeatjobs->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicerepeat))); ?> </span></br> 
								<span> <?php echo e(getCustomerName($repeatjobs->customer_id)); ?> | <?php echo e(getRegistrationNo($repeatjobs->vehicle_id)); ?> | <?php echo e(getVehicleName($repeatjobs->vehicle_id)); ?></span>
							</div>
							<?php if($view_data == "Yes"): ?>
								<i class="fa fa-eye eye" style="color:#5FCE9B;" aria-hidden="true"></i></a>		  
							<?php else: ?>
								<i class="fa fa-eye eye" style="color:#f0ad4e;" aria-hidden="true"></i></a>
							<?php endif; ?>
						</article>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
                </div>
			</div>
        </div>
    </div>
<!-- /page content -->

 <script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
 <!-- Free Service only -->
  <script type="text/javascript">
  
$(document).ready(function(){
   
    $(".emp_freeservice").click(function(){ 
	  
	  $('.modal-body').html("");
	   
       var emp_free = $(this).attr("emp_free");
	  
		var url = $(this).attr('url');
	      
       $.ajax({
       type: 'GET',
       url: url,
	
       data : {emp_free:emp_free},
       success: function (data)
       {            

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
	

<!-- Paid Service only -->
  <script type="text/javascript">
  
$(document).ready(function(){
   
    $(".emp_paidservice").click(function(){ 
	  
	  $('.modal-body').html("");
	   
       var emp_paid = $(this).attr("emp_paid");
	  
		var url = $(this).attr('url');
	      
       $.ajax({
       type: 'GET',
       url: url,
	
       data : {emp_paid:emp_paid},
       success: function (data)
       {            

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
  
<!-- Repeat job Service only -->
  <script type="text/javascript">
  
$(document).ready(function(){
   
    $(".emp_repeatjob").click(function(){ 
	  
	  $('.modal-body').html("");
	   
       var emp_repeat = $(this).attr("emp_repeat");
	  
		var url = $(this).attr('url');
	      
       $.ajax({
       type: 'GET',
       url: url,
	
       data : {emp_repeat:emp_repeat},
       success: function (data)
       {            

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/employee/show.blade.php ENDPATH**/ ?>
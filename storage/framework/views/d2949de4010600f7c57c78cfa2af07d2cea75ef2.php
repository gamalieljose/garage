
<?php $__env->startSection('content'); ?>
<Style>
	
</style>

<!-- For Dashborad Page all parts to make proper border for this css  -->
<link type="text/css" href="<?php echo e(URL::asset('public/css/dashboard_page_all_part_styles.css')); ?>" rel="stylesheet" >

<!-- CSS For Chart -->
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/js/49/css/util.css')); ?>">

<script src="<?php echo e(URL::asset('build/js/jscharts.js')); ?>" defer="defer"></script>
<!-- <script src="<?php echo e(URL::asset('build/js/Chart.min.js')); ?>" defer="defer"></script> -->
	<div class="right_col" role="main">
	<!--  Free service view -->
		<div id="myModal-open-modal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<!-- <h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Free Service Details')); ?></h4> -->
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(__('Free Service Details')); ?></h4>
					</div>
					<div class="modal-body">
					
					</div>
				</div>
			</div>
		</div>
		
	<!--  Paid service view -->
		<div id="myModal-com-service" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
			<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Paid Service Details')); ?></h4>
					</div>
					<div class="modal-body">
	                   
					</div>
				</div>
			</div>
		</div>
	<!--  Repeat Job Service view -->
		<div id="myModal-serviceup" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
		<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header"> 
						<a href=""><button type="button" class="close">&times;</button></a>
						<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Repeat Job Service Details')); ?></h4>
					</div>
					<div class="modal-body">
	                   
					</div>
				</div>
			</div>
		</div>
	<!--  Free service customer view -->
		<div id="myModal-customer-modal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg modal-xs">
				<!-- Modal content-->
				<div class="modal-content">
					
					<div class="modal-body">
					
					</div>
				</div>
			</div>
		</div>
        <div class="page-title">
			
			<div class="nav_menu hidden-lg hidden-md" style="background-color: #2a3f54;">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars" style="color:#fff;"></i></a>
							<span class="titleup"> <a href="<?php echo url('/'); ?>"> <img src="<?php echo e(URL::asset('public/general_setting/'.getLogoSystem())); ?>" width="140px" height="45px" style="background-color: #2a3f54;" ></a>
							<!-- ( <?php echo e(trans('app.Dashboard')); ?> ) -->
							</span>
						
					</div>
					
					<ul class="nav navbar-nav navbar-right ulprofile">
						<li class="">
							<a href="javascript:;" class=" dropdown-toggle mobilefocus" data-toggle="dropdown" aria-expanded="false">
							<?php if(!empty(Auth::user()->id)): ?>
								<?php if(Auth::user()->role=='admin'): ?>
									<img src="<?php echo e(URL::asset('public/admin/'.Auth::user()->image)); ?>" alt="admin"  width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								<?php if(Auth::user()->role=='Customer'): ?>
									<img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="customer" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='Supplier'): ?>
									<img src="<?php echo e(URL::asset('public/supplier/'.Auth::user()->image)); ?>" alt="supplier" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='employee'): ?>
									<img src="<?php echo e(URL::asset('public/employee/'.Auth::user()->image)); ?>" alt="employee" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								
								<?php if(Auth::user()->role=='accountant'): ?>
									<img src="<?php echo e(URL::asset('public/accountant/'.Auth::user()->image)); ?>" alt="accountant" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='supportstaff'): ?>
									<img src="<?php echo e(URL::asset('public/supportstaff/'.Auth::user()->image)); ?>" alt="supportstaff" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								
								<?php if(Auth::user()->role==''): ?>
									<img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="customer" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							<?php endif; ?>
							<?php if(!empty(Auth::user()->id)): ?>
								<span style="color:#fff;"><?php echo e(Auth::user()->name); ?></span>
							<?php endif; ?>
								<span class="fa fa-angle-down" style="color:#fff;"></span>
							</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="<?php echo url('setting/profile'); ?>"> <?php echo e(trans('app.Profile')); ?></a></li>
								<?php $userid=Auth::User()->id;?>
										 <?php if(getAccessStatusUser('Settings',$userid)=='yes'): ?>
											<?php if(getActiveAdmin($userid)=='yes'): ?>
												<li> <a href="<?php echo url('setting/general_setting/list'); ?>"><span><?php echo e(trans('app.Settings')); ?></span></a></li>
											<?php else: ?>
												<li> <a href="<?php echo url('setting/timezone/list'); ?>"><span><?php echo e(trans('app.Settings')); ?></span></a></li>
											<?php endif; ?>
										<?php endif; ?>
									<li><a href="#" onclick="event.preventDefault();document.getElementById('logout-dash').submit();"><i class="fa fa-sign-out pull-right"></i> <?php echo e(trans('app.Log Out')); ?></a></li>
									<form id="logout-dash" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
											<?php echo csrf_field(); ?>
									</form>
								</ul>
						</li>
					</ul>
				</nav>
			</div>
			<div class="nav_menu hidden-xs hidden-sm">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						<span class="titleup"><?php echo e(getNameSystem()); ?> </span>

					</div>
					
					<ul class="nav navbar-nav navbar-right ulprofile">
						<li class="">
							<a href="javascript:;" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<?php if(!empty(Auth::user()->id)): ?>
								<?php if(Auth::user()->role=='admin'): ?>
									<img src="<?php echo e(URL::asset('public/admin/'.Auth::user()->image)); ?>" alt="admin" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								<?php if(Auth::user()->role=='Customer'): ?>
									<img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="customer" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='Supplier'): ?>
									<img src="<?php echo e(URL::asset('public/supplier/'.Auth::user()->image)); ?>" alt="supplier" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='employee'): ?>
									<img src="<?php echo e(URL::asset('public/employee/'.Auth::user()->image)); ?>" alt="employee" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								
								<?php if(Auth::user()->role=='accountant'): ?>
									<img src="<?php echo e(URL::asset('public/accountant/'.Auth::user()->image)); ?>" alt="accountant" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							
								<?php if(Auth::user()->role=='supportstaff'): ?>
									<img src="<?php echo e(URL::asset('public/supportstaff/'.Auth::user()->image)); ?>" alt="supportstaff" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
								
								<?php if(Auth::user()->role==''): ?>
									<img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="customer" width="40px" height="40px" class="img-circle">
								<?php endif; ?>
							<?php endif; ?>
							<?php if(!empty(Auth::user()->id)): ?>
								<?php echo e(Auth::user()->name); ?>

							<?php endif; ?>
								<span class=" fa fa-angle-down"></span>
							</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="<?php echo url('setting/profile'); ?>"> <?php echo e(trans('app.Profile')); ?></a></li>
								<?php $userid=Auth::User()->id;?>
										 <?php if(getAccessStatusUser('Settings',$userid)=='yes'): ?>
											<?php if(getActiveAdmin($userid)=='yes'): ?>
												<li> <a href="<?php echo url('setting/general_setting/list'); ?>"><span><?php echo e(trans('app.Settings')); ?></span></a></li>
											<?php else: ?>
												<li> <a href="<?php echo url('setting/timezone/list'); ?>"><span><?php echo e(trans('app.Settings')); ?></span></a></li>
											<?php endif; ?>
										<?php endif; ?>
									<li><a href="#" onclick="event.preventDefault();document.getElementById('logout-dash1').submit();"><i class="fa fa-sign-out pull-right"></i> <?php echo e(trans('app.Log Out')); ?></a></li>
									<form id="logout-dash1" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
											<?php echo csrf_field(); ?>
									</form>
								</ul>
						</li>
					</ul>
				</nav>
			</div>
        </div> 
       
       	<!-- <div class="row">
        	<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2 ">
				<a href="employee/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body member">
						
						<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Green.png')); ?>" class="dashboard_background" alt="" height="20px" width="20px">	
							 <div class="info-box-stats info-box-statss">
							 	<p class="info-box-title"><?php echo e(trans('app.Employees')); ?></p>
								<span class="info-box-title"><?php echo e(trans('app.Employees name')); ?></span>
							</div>
							
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-1 col-md-1 col-xs-6 col-sm-2 ">
				<a href="employee/list" target="blank">
					<div class="panel info-box circless">
						<div class="panel-body">
						
						<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Green.png')); ?>" class="dashboard_background img1" alt="" height="20px" width="20px">	
							 <div class="info-box-stats info-box-statss">
							 	<p class="info-box-title"><?php echo e(trans('app.Employees')); ?></p>
								<span class="info-box-title"><?php echo e(trans('app.Employees name')); ?></span>
							</div>
							
						</div>
					</div>
				</a>
			</div>
        </div> -->

        <!-- For Garage wizard steps start -->
        <?php if(getUsersRole(Auth::user()->role_id) != 'Customer'): ?>
        <div class="row mainRowDiv" style="">
        	<?php if($Customer != 0): ?>
	       	<div class="steps step step-one greenCircle step-oneGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Customer')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-one blueCircle step-oneBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Customer')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($employee != 0): ?>
			<div class="steps step step-two greenCircle step-twoGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Employee-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Employee')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-two blueCircle step-twoBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Employee-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Employee')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($have_supportstaff != 0): ?>
			<div class="steps step step-three greenCircle step-threeGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Support-Staff-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Support Staff')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-three blueCircle step-threeBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Support-Staff-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Support Staff')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($Supplier != 0): ?>
			<div class="steps step step-four greenCircle step-fourGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Supplier-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Supplier')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-four blueCircle step-fourBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Supplier-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Supplier')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($have_vehicle != 0): ?>
			<div class="steps step step-five greenCircle step-fiveGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Vehicle-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Vehicles')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-five blueCircle step-fiveBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Vehicle-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Vehicles')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($have_product != 0): ?>
			<div class="steps step step-six greenCircle step-sixGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Product-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Products')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-six blueCircle step-sixBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Product-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Products')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($have_purchase != 0): ?>
			<div class="steps step step-seven greenCircle step-sevenGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Purchase-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Purchase')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-seven blueCircle step-sevenBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Purchase-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Purchase')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>

			<?php if($have_observationCount != 0): ?>
			<div class="steps step step-eight greenCircle step-eightGreen"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Observation-Green.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_green"><?php echo e(trans('app.Observation Library')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php else: ?>
			<div class="steps step step-eight blueCircle step-eightBlue"><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Observation-Blue.png')); ?>" alt="Avatar" class="main-image">
				<span class="name-text_blue"><?php echo e(trans('app.Observation Library')); ?></span>
				<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" alt="Avatar" class="imgs">
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

    <!-- For Garage wizard steps start -->
    	<!-- <?php if(getUsersRole(Auth::user()->role_id) != 'Customer'): ?>
		<div class="row wizard_image_main_class" style="display: none;">
			<?php if($Customer != 0): ?>
				<li class="wizard_image_green">					
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Green.png')); ?>" class="green_img"  alt="">					
					<span class="marker-text_green"><?php echo e(trans('app.Customer')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Customer-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Customer')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>	
				</li>
			<?php endif; ?>

			<?php if($employee != 0): ?>
				<li class="wizard_image_green">					
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Employee-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Employee')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Employee-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Employee')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>
				</li>
			<?php endif; ?>

			<?php if($have_supportstaff != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Support-Staff-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Supportstaff')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Support-Staff-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Supportstaff')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>
				</li>
			<?php endif; ?>

			<?php if($Supplier != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Supplier-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Supplier')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Supplier-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Supplier')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>
				</li>
			<?php endif; ?>

			<?php if($have_vehicle != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Vehicle-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Vehicles')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Vehicle-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Vehicles')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>				
				</li>
			<?php endif; ?>

			<?php if($have_product != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Product-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Products')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Product-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Products')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>
				</li>
			<?php endif; ?>

			<?php if($have_purchase != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Purchase-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Purchase')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Purchase-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Purchase')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>				
				</li>
			<?php endif; ?>

			<?php if($have_observationCount != 0): ?>
				<li class="wizard_image_green">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Observation-Green.png')); ?>" class="green_img" alt="">
					<span class="marker-text_green"><?php echo e(trans('app.Observation')); ?></span>
					<span class="span_img_green" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Check.png')); ?>" class="green"  alt=""></span>
				</li>
			<?php else: ?>
				<li class="wizard_image_blue">
					<img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/Observation-Blue.png')); ?>" class="blue_img" alt="">
					<span class="marker-text_blue"><?php echo e(trans('app.Observation')); ?></span>
					<span class="span_img_blue" style=""><img src="<?php echo e(URL::asset('public/img/dashboard/wizard_setup_image/3-dot.png')); ?>" class=""  alt=""></span>
				</li>
			<?php endif; ?>
		</div>
		<?php endif; ?> -->
	<!-- For Garage wizard steps end -->

		<br/>
<!-- Active(login) in show admin , supportstaff,accountant -->
	<?php if(getUsersRole(Auth::user()->role_id) == 'Super Admin' || getUsersRole(Auth::user()->role_id) == 'Support Staff' || getUsersRole(Auth::user()->role_id) == 'Accountant'): ?>		
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_view')): ?>
		<div class="row calculationBoxes">
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 ">
				<a href="employee/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body member">
						
						<img src="<?php echo e(URL::asset('public/img/dashboard/team.png')); ?>" class="dashboard_background" alt="">	
							 <div class="info-box-stats">
								<p class="counter">
									<?php if(isset($employee)): ?>
									  <?php  echo $employee; ?>
									<?php else: ?>
									<?php  echo "0"; ?>
									<?php endif; ?>
								</p>
								<span class="info-box-title"><?php echo e(trans('app.Employees')); ?></span>
							</div>
							
						</div>
					</div>
				</a>
			</div>			
			
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3">
				<a href="customer/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body staff-member">
						<img src="<?php echo e(URL::asset('public/img/dashboard/client.png')); ?>" class="dashboard_background" alt="">	
							<div class="info-box-stats">
								<p class="counter">
									
								<?php if(isset($Customer)): ?>
									<?php echo $Customer; ?>
								<?php else: ?>
									<?php  echo "0"; ?>
								<?php endif; ?>
														  </p>
									<span class="info-box-title"><?php echo e(trans('app.Customers')); ?></span>
							</div>
							
							
						</div>
					</div>
					</a>
			</div>
			
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3">
				<a href="supplier/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body group">
						<img src="<?php echo e(URL::asset('public/img/dashboard/telemarketer.png')); ?>" class="dashboard_background" alt="">						<div class="info-box-stats">
								<p class="counter">
									<?php if(isset($Supplier)): ?>
									<?php echo $Supplier; ?>
								<?php else: ?>
									<?php  echo "0"; ?>
									<?php endif; ?>
									</p>
								
								<span class="info-box-title"><?php echo e(trans('app.Supplier')); ?> </span>
							</div>
							
							
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3">
				<a href="product/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body message">
						<img src="<?php echo e(URL::asset('public/img/dashboard/industrial-robot.png')); ?>" class="dashboard_background" alt="">	
							<div class="info-box-stats">
								<p class="counter">
								  <?php if($product): ?>
									<?php echo $product; ?>
								<?php else: ?>
									<?php  echo "0"; ?>
								  <?php endif; ?>
								</p>
								<span class="info-box-title"><?php echo e(trans('app.Products')); ?></span>
							</div>
							
							
						</div>
					</div>
				</a>
			</div>
			
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3">
				<a href="sales/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body member">
						<img src="<?php echo e(URL::asset('public/img/dashboard/contract.png')); ?>" class="dashboard_background" alt="">						<div class="info-box-stats">
								<p class="counter">
								<?php if($sales): ?>
								 <?php echo $sales; ?>
							 <?php else: ?>
									<?php  echo "0"; ?>
							   <?php endif; ?>
								 </p>
								
								<span class="info-box-title"> <?php echo e(trans('app.Sales')); ?></span>
							</div>
						
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-2 col-md-2 col-xs-6 col-sm-3">
				<a  href="service/list" target="blank">
					<div class="panel info-box panel-white">
						<div class="panel-body staff-member">
						<img src="<?php echo e(URL::asset('public/img/dashboard/tasks.png')); ?>" class="dashboard_background" alt="">						<div class="info-box-stats">
								<p class="counter">
								<?php if($service): ?>
									<?php echo $service; ?>
								<?php else: ?>
									<?php  echo "0"; ?>
								<?php endif; ?>
								</p>
								
								<span class="info-box-title"><?php echo e(trans('app.Services')); ?></span>
							</div>
							
							
						</div>
					</div>
				</a>
			</div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
<!-- end Active(login) in show admin , supportstaff,accountant -->

	
<!-- Active(login) in show customer , employee -->
	<?php if(getUsersRole(Auth::user()->role_id) == 'Customer' || getUsersRole(Auth::user()->role_id) == 'Employee'): ?>

	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_view')): ?>
	<!-- free service -->
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_owndata')): ?>
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel freebuttom">
					<div class="x_title">
						<h2><?php echo e(trans('app.Free Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<form method="get" action="jobcard/list">
									<input type="hidden" name="free"  value="<?php  echo'free';?>"/>
										<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
								</form>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				  <?php $userid=Auth::User()->id; ?>
				<?php if(!empty($sale)): ?>
				   <?php $__currentLoopData = $sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saless): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="x_content">
							<?php
								$date=$saless->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
							<article class="media event">
							  <a class="pull-left date">
								<p class="month"><?php echo $month; ?></p>
								<p class="day"><?php echo $day; ?></p>
							  </a>
							<?php   $view_data = getInvoiceStatus($saless->job_no); ?>
							<?php if($view_data == "Yes"): ?>
							  <a href="" data-toggle="modal" open_id="<?php echo e($saless->id); ?>"  url="<?php echo url('/dashboard/open-modal'); ?>"  data-target="#myModal-open-modal" print="20" class="openmodel">
							<?php else: ?>
								<?php if(!empty(getActiveEmployee($userid)=='yes')): ?>
									<a href="<?php echo url('/jobcard/list/'.$saless->id); ?>">
								<?php else: ?>
									<a href="" data-toggle="modal" open_customer_id="<?php echo e($saless->id); ?>"  url="<?php echo url('/service/list/view'); ?>"  data-target="#myModal-customer-modal" print="20" class="customeropenmodel">
								<?php endif; ?>
								
							<?php endif; ?>
							  <div class="media-body">
								<?php $dateservicefree = date("Y-m-d", strtotime($saless->service_date)); ?>
								<span class="jobdetails"><?php echo e($saless->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicefree))); ?> </span></br> 
								<span> <?php echo e(getCustomerName($saless->customer_id)); ?> | <?php echo e(getRegistrationNo($saless->vehicle_id)); ?> |
								<?php echo e(getVehicleName($saless->vehicle_id)); ?></span>
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

		<!-- paid service --> 
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel paidbuttom">
					<div class="x_title">
						<h2> <?php echo e(trans('app.Paid Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
					
							<form method="get" action="jobcard/list">
								<input type="hidden" name="paid"  value="<?php  echo'paid';?>"/>
									<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?>	</button>
							</form>
						</ul>
						<div class="clearfix"></div>
					</div>
				   <?php if(!empty($sale1)): ?>
					   <?php $__currentLoopData = $sale1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale1s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="x_content">
							<?php
								$date=$sale1s->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
								<article class="media event">
								  <a class="pull-left date">
									<p class="month"><?php echo $month ?></p>
									<p class="day"><?php echo $day; ?></p>
								  </a>
								<?php $view_data = getInvoiceStatus($sale1s->job_no); ?>
								<?php if($view_data == "Yes"): ?>
									<a href="" data-toggle="modal" c_service="<?php echo e($sale1s->id); ?>"  url="<?php echo url('/dashboard/view/com-modal'); ?>"  data-target="#myModal-com-service" print="20" class="completedservice">
							    <?php else: ?>
									<?php if(!empty(getActiveEmployee($userid)=='yes')): ?>
										<a href="<?php echo url('/jobcard/list/'.$sale1s->id); ?>">
									<?php else: ?>
									<a href="" data-toggle="modal" open_customer_id="<?php echo e($sale1s->id); ?>"  url="<?php echo url('/service/list/view'); ?>"  data-target="#myModal-customer-modal" print="20" class="customeropenmodel">
									<?php endif; ?>
								<?php endif; ?>
								  <div class="media-body">
									<?php $dateservicepaid = date("Y-m-d", strtotime($sale1s->service_date)); ?>
									<span class="jobdetails"><?php echo e($sale1s->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicepaid))); ?> </span></br> 
									<span> <?php echo e(getCustomerName($sale1s->customer_id)); ?> | <?php echo e(getRegistrationNo($sale1s->vehicle_id)); ?> |
									<?php echo e(getVehicleName($sale1s->vehicle_id)); ?></span>
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

		<!-- Repeat job service -->
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel repeatbuttom">
					<div class="x_title">
						<h2><?php echo e(trans('app.Repeat Job Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<form method="get" action="jobcard/list">
								<input type="hidden" name="repeatjob"  value="<?php  echo'repeat job';?>"/>
								<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
							</form>
						</ul>
						<div class="clearfix"></div>
					</div>
					<?php if(!empty($sale2)): ?>
						<?php $__currentLoopData = $sale2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale2s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="x_content">
							<?php
								$date=$sale2s->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
								<article class="media event">
									<a class="pull-left date">
										<p class="month"><?php echo $month ?></p>
										<p class="day"><?php echo $day; ?></p>
									</a>
								<?php $view_data = getInvoiceStatus($sale2s->job_no); ?>
								<?php if($view_data == "Yes"): ?>
									<a href="" data-toggle="modal" u_service="<?php echo e($sale2s->id); ?>"  url="<?php echo url('/dashboard/view/up-modal'); ?>"  data-target="#myModal-serviceup" print="20" class="service-up">
								<?php else: ?>
									<?php if(!empty(getActiveEmployee($userid)=='yes')): ?>
										<a href="<?php echo url('/jobcard/list/'.$sale2s->id); ?>">
									<?php else: ?>
									<a href="" data-toggle="modal" open_customer_id="<?php echo e($sale2s->id); ?>"  url="<?php echo url('/service/list/view'); ?>"  data-target="#myModal-customer-modal" print="20" class="customeropenmodel">
									<?php endif; ?>
								<?php endif; ?>
									<div class="media-body">
										<?php $dateservicerepeat = date("Y-m-d", strtotime($sale2s->service_date)); ?>
										<span class="jobdetails"><?php echo e($sale2s->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicerepeat))); ?> </span></br> 
										
										<span> <?php echo e(getCustomerName($sale2s->customer_id)); ?> | <?php echo e(getRegistrationNo($sale2s->vehicle_id)); ?> |
										<?php echo e(getVehicleName($sale2s->vehicle_id)); ?></span>
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
		<?php endif; ?>
		
		<div class="row">	
		<!-- Upcoming service  service -->
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_owndata')): ?>
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel freebuttom">
					<div class="x_title">
						<h2><?php echo e(trans('app.Upcoming Service Details')); ?></h2>
						
						<div class="clearfix"></div>
					</div>
				  <?php $userid=Auth::User()->id; ?>
				<?php if(!empty($upcomingservice)): ?>
				   <?php $__currentLoopData = $upcomingservice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingservices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="x_content">
							<?php
								$date=$upcomingservices->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
							<article class="media event">
							  <a class="pull-left date">
								<p class="month"><?php echo $month; ?></p>
								<p class="day"><?php echo $day; ?></p>
							  </a>
							  <div class="media-body">
								<?php $upcomingservicesdate = date("Y-m-d", strtotime($upcomingservices->service_date)); ?>
								<span class="jobdetails"><?php echo e($upcomingservices->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($upcomingservicesdate))); ?> </span></br> 
								<span> <?php echo e(getCustomerName($upcomingservices->customer_id)); ?> | 
								<?php echo e(getVehicleName($upcomingservices->vehicle_id)); ?></span>
							  </div>
							 
							</article>
						</div>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

		<!-- Opening Hours -->
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel tmm"> 
					<div class="x_title">
						<h2><?php echo e(trans('app.Opening Hours')); ?></h2>
						<div class="clearfix"></div>
					</div>
						<?php if(!empty($openinghours)): ?>
						<?php $__currentLoopData = $openinghours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $openinghourss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="bessuhours" id="bessuhours">	
								<div class="col-md-4 col-sm-12 bessuhoursday leftSideDay">
									<b><?php echo e(getDayName($openinghourss->day)); ?></b>
								</div>
								<div class="col-md-8 col-sm-12 bessuhoursday rightSideDay">
								<?php if($openinghourss->from == $openinghourss->to): ?>
									<span class="dayhours">- - - - - - Day off - - - - - - </span>
								<?php else: ?>
									<span>
										<span class="dayhours"><?php echo e(getOpenHours($openinghourss->from)); ?></span>
										<span class="dayhours">To</span>
										<span class="dayhours"><?php echo e(getCloseHours($openinghourss->to)); ?></span>
									</span>
								<?php endif; ?>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
				</div>
			</div>

		<!-- Holiday List -->
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel repeatbuttom"> 
						<div class="x_title">
							<h2><?php echo e(trans('app.Holiday List')); ?></h2>
							<div class="clearfix"></div>
						</div>
							<?php if(!empty($holiday)): ?>
								<?php $__currentLoopData = $holiday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holidays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="bessuhours">	
										<div class="col-md-4 col-sm-12 bessuhoursday">
											<b><?php echo e(date(getDateFormat(),strtotime($holidays->date))); ?></b>
										</div>
										<div class="col-md-8 col-sm-12 bessuhoursday">
											<span class="dayhours"><?php echo e($holidays->title); ?></span>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
				</div>	
			</div>
		</div>
		

		<div class="row">
		<!-- Calendar Events -->
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="x_panel cld">
                  <div class="x_title">
                    <h2><?php echo e(trans('app.Calendar Events')); ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="calendarevent"></div>

                  </div>
                </div>
			</div>
		</div>
	<?php endif; ?>
	<?php endif; ?>
<!-- end Active(login) in show customer , employee -->
	
	
<!--- Active(login) in show admin,supportstaff,accountant -->
	<?php if(getUsersRole(Auth::user()->role_id) == 'Super Admin' || getUsersRole(Auth::user()->role_id) == 'Support Staff' || getUsersRole(Auth::user()->role_id) == 'Accountant'): ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_view')): ?>
		<div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                <div class="x_panel cld">
                  <div class="x_title">
                    <h2><?php echo e(trans('app.Calendar Events')); ?></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="calendarevent"></div>

                  </div>
                </div>
			</div>
           
            <div class="col-md-4 col-sm-12 col-xs-12">
					<div class="x_panel rjc"> 
						<div class="x_title">
							
		
								<h2><?php echo e(trans('app.Recently Joined customer')); ?></h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a href="<?php echo url('/customer/list'); ?>"><button type="button" class="btn  btn-default"><?php echo e(trans('app.View All')); ?></button></a>
									</li>
								</ul>
							<div class="clearfix"></div>
						</div>
						
						<ul class="list-unstyled top_profiles scroll-view">
						<?php $__currentLoopData = $Customere; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <li class="media event">
							<a class="userpic">
							 <img src="<?php echo e(URL::asset('public/customer/'.$user->image)); ?>" style="width: 40px; height: 40px;margin-right: 18px;" class="img-circle" > 
							</a>
							<div class="media-body">
							  <a class="title" href="customer/list/<?php echo e($user->id); ?>"><strong><?php echo e($user->name); ?>&nbsp;<?php echo e($user->lastname); ?></a> </strong>
							  <p> <?php echo e($user->email); ?> </p>
							  </p>
							</div>
						  </li>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div class="x_panel tmm">
						<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="x_title">
							<h2 style="margin:0"><?php echo e(trans('app.Top Mechanics This Month')); ?></h2>
							
							<div class="clearfix"></div>
						 </div>
							
							<div id="donutchartperformance" style="margin-top:15px;" dir="<?php if(getValue() =='rtl') {echo 'rtl';} else{echo'ltr';}?>"></div>
						</div> 
					</div>
            </div> 
        </div>

    <!-- Monthly Service Summary -->
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
				<div class="x_panel mss">
					<div class="x_title">
						<h2 style="width:100%;"><?php echo e(trans('app.Monthly Service Summary')); ?> - <?php echo e($nowmonth); ?></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-md-8 col-xs-12 col-sm-12">
								<div id="barchart" dir="<?php if(getValue() =='rtl') {echo 'rtl';} else{echo'ltr';}?>" style="width:100%;padding:0px;margin:0">
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-12">
								<div class="row" align="center" >
									<div class="col-md-6 col-xs-12 col-sm-12">
										<h4 class="onservicess"><?php echo e(trans('app.Ontime Service')); ?></h4>
										<div id="donutchartontime"  dir="<?php if(getValue() =='rtl') {echo 'rtl';} else{echo'ltr';}?>" style="padding-bottom:15px;"></div>
									</div>
									<div class="col-md-6 col-xs-12 col-sm-12">
									
										<h4 style="margin:0"><?php echo e(trans('app.Top Five Serviced Vehicles')); ?></h4>
										<div id="donutchart" dir="<?php if(getValue() =='rtl') {echo 'rtl';} else{echo'ltr';}?>"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!-- Free service details -->
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel freebuttom">
					<div class="x_title">
						<h2><?php echo e(trans('app.Free Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<form method="get" action="jobcard/list">
									<input type="hidden" name="free"  value="<?php  echo'free';?>"/>
										<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
								</form>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				  <?php $userid=Auth::User()->id; ?>
				<?php if(!empty($sale)): ?>
				   <?php $__currentLoopData = $sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saless): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="x_content">
							<?php
								$date=$saless->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
							<article class="media event">
							  <a class="pull-left date">
								<p class="month"><?php echo $month; ?></p>
								<p class="day"><?php echo $day; ?></p>
							  </a>
							<?php $view_data = getInvoiceStatus($saless->job_no); ?>
							<?php if($view_data == "Yes"): ?>
							  <a href="" data-toggle="modal" open_id="<?php echo e($saless->id); ?>"  url="<?php echo url('/dashboard/open-modal'); ?>"  data-target="#myModal-open-modal" print="20" class="openmodel" >
							<?php else: ?>
								<a href="<?php echo url('/jobcard/list/'.$saless->id); ?>"   >
							<?php endif; ?>
							  <div class="media-body">
								<?php $dateservicefree = date("Y-m-d", strtotime($saless->service_date)); ?>
								<span class="jobdetails"><?php echo e($saless->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicefree))); ?> </span></br> 
								<span> <?php echo e(getCustomerName($saless->customer_id)); ?> | <?php echo e(getRegistrationNo($saless->vehicle_id )); ?> |
								<?php echo e(getVehicleName($saless->vehicle_id)); ?></span> 
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

		 <!-- paid service --> 
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel paidbuttom">
					<div class="x_title">
						<h2> <?php echo e(trans('app.Paid Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
					
							<form method="get" action="jobcard/list">
								<input type="hidden" name="paid"  value="<?php  echo'paid';?>"/>
									<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?>	</button>
							</form>
						</ul>
						<div class="clearfix"></div>
					</div>
				   <?php if(!empty($sale1)): ?>
					   <?php $__currentLoopData = $sale1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale1s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="x_content">
							<?php
								$date=$sale1s->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
								<article class="media event">
								  <a class="pull-left date">
									<p class="month"><?php echo $month ?></p>
									<p class="day"><?php echo $day; ?></p>
								  </a>
								<?php $view_data = getInvoiceStatus($sale1s->job_no); ?>
								<?php if($view_data == "Yes"): ?>
									<a href="" data-toggle="modal" c_service="<?php echo e($sale1s->id); ?>"  url="<?php echo url('/dashboard/view/com-modal'); ?>"  data-target="#myModal-com-service" print="20" class="completedservice">
								<?php else: ?>
									<a href="<?php echo url('/jobcard/list/'.$sale1s->id); ?>">
								<?php endif; ?>
								  <div class="media-body">
									<?php $dateservicepaid = date("Y-m-d", strtotime($sale1s->service_date)); ?>
									
									<span class="jobdetails"><?php echo e($sale1s->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicepaid))); ?> </span></br> 
									<span> <?php echo e(getCustomerName($sale1s->customer_id)); ?> | <?php echo e(getRegistrationNo($sale1s->vehicle_id)); ?> |
									<?php echo e(getVehicleName($sale1s->vehicle_id)); ?></span>
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

		<!-- Repeat job service -->
			<div class="col-md-4 col-xs-12 col-sm-12">
				<div class="x_panel repeatbuttom">
					<div class="x_title">
						<h2><?php echo e(trans('app.Repeat Job Service Details')); ?></h2>
						<ul class="nav navbar-right panel_toolbox">
							<form method="get" action="jobcard/list">
								<input type="hidden" name="repeatjob"  value="<?php  echo'repeat job';?>"/>
								<button type="submit"  class="btn  btn-default1 freeservice"><?php echo e(trans('app.View All')); ?></button>
							</form>
						</ul>
						<div class="clearfix"></div>
					</div>
					<?php if(!empty($sale2)): ?>
						<?php $__currentLoopData = $sale2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale2s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="x_content">
							<?php
								$date=$sale2s->service_date;
								$month=date("M", strtotime($date));
								$day=date("d", strtotime($date));
								
							?>
								<article class="media event">
									<a class="pull-left date">
										<p class="month"><?php echo $month ?></p>
										<p class="day"><?php echo $day; ?></p>
									</a>
									<?php $view_data = getInvoiceStatus($sale2s->job_no); ?>
									<?php if($view_data == "Yes"): ?>
										<a href="" data-toggle="modal" u_service="<?php echo e($sale2s->id); ?>"  url="<?php echo url('/dashboard/view/up-modal'); ?>"  data-target="#myModal-serviceup" print="20" class="service-up">
									<?php else: ?>
										<a href="<?php echo url('/jobcard/list/'.$sale2s->id); ?>">
									<?php endif; ?>
									<div class="media-body">
										<?php $dateservicerepeat = date("Y-m-d", strtotime($sale2s->service_date)); ?>
										<span class="jobdetails"><?php echo e($sale2s->job_no); ?> | <?php echo e(date(getDateFormat(),strtotime($dateservicerepeat))); ?> </span></br> 
										
										<span> <?php echo e(getCustomerName($sale2s->customer_id)); ?> |  <?php echo e(getRegistrationNo($sale2s->vehicle_id)); ?> |
										<?php echo e(getVehicleName($sale2s->vehicle_id)); ?></span>
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
		<?php endif; ?>
	<?php endif; ?>
<!---end Active(login) in show admin,supportstaff,accountant-->

    </div>
	<div id="myModal-job" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header"> 
					<a href=""><button type="button" class="close">&times;</button></a>
					<h4 id="myLargeModalLabel" class="modal-title"><?php echo e(trans('app.Invoice')); ?></h4>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
	

 <script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script> 
 <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" defer="defer"></script>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script> -->

<!-- All Js file for Charts -->
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/loader.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/loader.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_default_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_graphics_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_ui_module.js')); ?>" defer="defer"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/49/jsapi_compiled_corechart_module.js')); ?>" defer="defer"></script>

 <!-- service event in calendarevent -->
 <?php if(!empty($serviceevent))
	{
		foreach($serviceevent as $serviceevents)
		{	
			
			$i=1;
			$n_start_date=date("Y-m-d", strtotime($serviceevents->service_date));
			$n_end_date=date("Y-m-d", strtotime($serviceevents->service_date));
			$sid=$serviceevents->job_no; 
			$userid=Auth::User()->id;
			if(!empty(getActiveCustomer($userid)=='yes' || getActiveEmployee($userid)=='yes'))
			{
				$view_data = getInvoiceStatus($serviceevents->job_no);
												
				if($view_data == "No")
				{
					$service_data_array[]=array('title'=>$serviceevents->job_no,
					'title1'=>$serviceevents->job_no,
					'dates'=>date(getDateFormat(),strtotime($serviceevents->service_date)),
					'customer'=>getCustomerName($serviceevents->customer_id),
					'vehicle'=>getVehicleName($serviceevents->vehicle_id),
					'plateno'=>getRegistrationNo($serviceevents->vehicle_id),
					'url'=> 'jobcard/list/'.$serviceevents->id,
					'start'=>$n_start_date,
					'end'=>$n_end_date,
					'color'=>'#f0ad4e',
					);
				}
				else
				{
					$service_data_array[]=array('title'=>$serviceevents->job_no,
					'title1'=>$serviceevents->job_no,
					'dates'=>date(getDateFormat(),strtotime($serviceevents->service_date)),
					'customer'=>getCustomerName($serviceevents->customer_id),
					'vehicle'=>getVehicleName($serviceevents->vehicle_id),
					'plateno'=>getRegistrationNo($serviceevents->vehicle_id),
					's_id'=>$serviceevents->id,
					'url1'=> 'dashboard/open-modal',
					'start'=>$n_start_date,
					'end'=>$n_end_date,
					'color'=>'#5FCE9B',
					);
				}
					
			}
			else
			{
				$view_data = getInvoiceStatus($serviceevents->job_no);
				
				if($view_data == "No")
				{
					$service_data_array[]=array('title'=>$serviceevents->job_no,
					'title1'=>$serviceevents->job_no,
					'dates'=>date(getDateFormat(),strtotime($serviceevents->service_date)),
					'customer'=>getCustomerName($serviceevents->customer_id),
					'vehicle'=>getVehicleName($serviceevents->vehicle_id),
					'plateno'=>getRegistrationNo($serviceevents->vehicle_id),
					's_id'=>$serviceevents->id,
					'url11'=>'service/list/view',
					'start'=>$n_start_date,
					
					'end'=>$n_end_date,
					'color'=>'#f0ad4e',
					);
				}
				else
				{
					$service_data_array[]=array('title'=>$serviceevents->job_no,
					'title1'=>$serviceevents->job_no,
					'dates'=>date(getDateFormat(),strtotime($serviceevents->service_date)),
					'customer'=>getCustomerName($serviceevents->customer_id),
					'vehicle'=>getVehicleName($serviceevents->vehicle_id),
					'plateno'=>getRegistrationNo($serviceevents->vehicle_id),
					's_id'=>$serviceevents->id,
					'url1'=> 'dashboard/open-modal',
					'start'=>$n_start_date,
					'end'=>$n_end_date,
					'color'=>'#5FCE9B',
					);
				}
			}
			
		}
	
	} 
	
	//Holiday Event
	if(!empty($holiday))
	{
		foreach($holiday as $holidays)
		{	
			$i=1;
			$n_start_date=date("Y-m-d", strtotime($holidays->date));
			$n_end_date=date("Y-m-d", strtotime($holidays->date));
			$service_data_array[]=array('title'=>substr($holidays->title,0,10),
			'title1'=>$holidays->title,
			'dates'=>date(getDateFormat(),strtotime($holidays->date)),
			'description'=>$holidays->description,
			'customer'=>'Holiday',
			'vehicle'=>"",
			'plateno'=>"",
			'start'=>$n_start_date,
			'end'=>$n_end_date,
			'color'=>'#3a87ad',
			);
		}
	} 
	if(!empty($service_data_array)) {
		$data1 = json_encode($service_data_array);
	}
	else{
		$data1=json_encode('0');
	}
?>
 <!-- Calendar Event in Dashboard-->
 <script>
	$(document).ready(function() {
		$('#calendarevent').fullCalendar({
		height: 620,
		 header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: new Date(),
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			editable: true,
			toolkip:true,
			events: <?php  if(!empty($data1)){ echo $data1;} ?>,
			eventMouseover: function (data, event, view) {
			   tooltip = '<div class="col-md-12 col-sm-12 col-xs-12 tooltiptopicevent" style="width:auto;height:auto;background:black;color:#fff;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;border-radius:5px;  line-height: 200%;">';
			   // alert(data.vehicle);
				if(data.title1 != '')
					tooltip = tooltip + data.title1 ; 
				if(data.dates != '')
					tooltip = tooltip + ' | ' + data.dates + '</br>' + ' ';  
				if(data.customer != '')
					tooltip = tooltip  + data.customer;
				if(data.plateno != '')
					tooltip = tooltip + ' | ' + data.plateno;
				if(data.vehicle != '')
					tooltip = tooltip + ' | ' + data.vehicle;
			
				tooltip = tooltip + '</div>';
			
            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });
			},
			eventMouseout: function (data, event, view) {
				$(this).css('z-index', 8);
				$('.tooltiptopicevent').remove();
			},
			dayClick: function () {
				tooltip.hide()
			},
			eventResizeStart: function () {
				tooltip.hide()
			},
			eventDragStart: function () {
				tooltip.hide()
			},
			viewDisplay: function () {
				tooltip.hide()
			},
			
			eventClick: function(event) {
				if (event.url) {
					window.location(event.url);
				}
				if (event.url1)
				{
					$('#myModal-job').modal();

					$('.modal-body').html("");
					
					var serviceid = (event.s_id);					
									
											
					var url = (event.url1);
				
					   $.ajax({
					   type: 'GET',
					   url: url,
					
					   data : {open_id:serviceid},
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
				}
				if (event.url11)
				{
					$('#myModal-customer-modal').modal();
					$('.modal-body').html("");
					var servicesid = (event.s_id);
					var url = (event.url11);
					
				   $.ajax({
				   type: 'GET',
				   url: url,
				   data : {servicesid:servicesid},
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
				}
			}
      
		});
	});	
	
	</script>
	
 <!-- Monthly service in barchart-->
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
          ['Date', 'Service',{ role: 'style' },{ role: 'annotation' }],
		  <?php
		     for($i=1;$i<=sizeof($dates);$i++)
			 {
				$count =  getNumberOfService($i);
				
			 ?>
			 ['<?php echo $i;?>',<?php echo $count;?>,'',''],
			<?php 
			
			 }
		   ?>
 ]);
 var options = {
	legend:'none',
	heigth:150,
	chartArea:{left:40,'width':'90%',top:20,bottom:50,},
	fontSize :10,
	color:'#73879C',
	hAxis: {
			title: 'Dates',
			titleTextStyle: {fontSize:12,color:'#4E5E6A',fontName: 'Roboto'},
						
			},
    vAxis: {
			title: ' Number Of Service',
			titleTextStyle: {fontSize:12,color:'#4E5E6A',fontName: 'Roboto'},
			
			format:'decimal',
			},
 };
 var chart = new google.visualization.ColumnChart(document.getElementById("barchart"));
 chart.draw(data, options);
 }
 </script>
 
 <!-- Ontime   donutchart-->
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Hours', 'No of service'],
          ['24-Hours',<?php if(!empty($one_day)){echo $one_day;}else{echo"0";}?> ],
		
          ['48-Hours',<?php if(!empty($two_day)){echo $two_day;}else{echo"0";}?> ],
          ['48-Hours After',<?php if(!empty($more)){echo $more;}else{echo"0";}?> ],
       
        ]);
        var options = {
			
			fontSize:10,
			fontName:'sans-serif',
			height:150,
		 chartArea:{left:1,right:2,bottom:30,top:30},
		legend: { position: 'right', maxLines: 5,textStyle: {fontSize: 10,color:'#73879C',bold:true}},
		isStacked: 'relative',
		 vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }	
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchartontime'));
        chart.draw(data, options);
      }
    </script>
<!-- Vehicle  donutchart-->
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Vehicle', 'Number of service'],
		  <?php $__currentLoopData = $vehical; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $v_name = getVehicleName($vehicals->vid);?>
          ['<?php echo $v_name;?>',    <?php echo $vehicals->count;?> ],
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);

        var options = {
			is3D: true, 
			fontSize:10,
			fontName:'sans-serif',
			height:150,
			chartArea:{left:3,right:3,bottom:30,top:10},
			legend: { position: 'right', maxLines: 5,textStyle: {fontSize: 10,color:'#73879C',bold:true}},
			isStacked: 'relative',
			vAxis: {
					minValue: 0,
					ticks: [0, .3, .6, .9, 1]
					}	
			};

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

<!-- Performance  donutchart-->
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Employee', 'No of service'],
           <?php $__currentLoopData = $performance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $performances): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $assigne=getAssignedName($performances->a_id); ?>
          ['<?php echo $assigne;?>',    <?php echo $performances->count;?> ],
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);

        var options = {
			is3D: true, 
			fontSize:10,
			fontName:'sans-serif',
			height:180,
		 chartArea:{left:5,right:5,bottom:5,top:15},
		legend: { position: 'right', maxLines: 15,textStyle: {fontSize: 12,padding:'5px',color:'#73879C',bold:true}},
		isStacked: 'relative',
		 vAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
          }	
		};
        var chart = new google.visualization.PieChart(document.getElementById('donutchartperformance'));
        chart.draw(data, options);
      }
</script>

<!--  Free service -->
<!-- <script src="<?php echo e(URL::asset('public/js/Dashboard/Free_service.js')); ?>" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
   
    	$(".openmodel").click(function(){ 
	  
	  		$('.modal-body').html("");
	    	var open_id= $(this).attr("open_id");
		
			var url = $(this).attr('url');
       		$.ajax({
		       	type: 'GET',
		       	url: url,
			   	data : {open_id:open_id},
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

<!-- Paid service -->
<!-- <script src="<?php echo e(URL::asset('public/js/Dashboard/Paid_service.js')); ?>" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
   
    	$(".completedservice").click(function(){ 
	  
	  		$('.modal-body').html("");
	   
       		var c_service = $(this).attr("c_service");
	    
			var url = $(this).attr('url');
	     
       		$.ajax({
       			type: 'GET',
       			url: url,
       			data : {open_id:c_service},
       
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

<!-- Repeat Job service  -->
<!-- <script src="<?php echo e(URL::asset('public/js/Dashboard/Repeat_Job_service.js')); ?>" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
   
    	$(".service-up").click(function(){ 
	  
	  		$('.modal-body').html("");
	   
       		var u_service = $(this).attr("u_service");
	   
			var url = $(this).attr('url');
	     
       		$.ajax({
       			type: 'GET',
       			url: url,
       			data : {open_id:u_service},
       
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

<!--  Free customer model service -->
<!-- <script src="<?php echo e(URL::asset('public/js/Dashboard/Free_customer_model_service.js')); ?>" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
   
    	$(".customeropenmodel").click(function(){ 
	  
	  		$('.modal-body').html("");
	    	
	    	var open_customer_id= $(this).attr("open_customer_id");
			var url = $(this).attr('url');
		
       		$.ajax({
       			type: 'GET',
       			url: url,
	   			data : {servicesid:open_customer_id},
       			
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\garage\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>
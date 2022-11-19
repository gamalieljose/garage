<!DOCTYPE html>
<html dir="" lang="en" >
<head>
    <meta content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	
	<link rel="icon" href="<?php echo e(URL::asset('fevicol.png')); ?>" type="image/gif" sizes="16x16">
    <title><?php echo e(getNameSystem()); ?></title>
	
	
    <!-- Bootstrap -->
    <link href= "<?php echo e(URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(URL::asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(URL::asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
	 <!-- iCheck -->
    <link href="<?php echo e(URL::asset('vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <!-- <link href="<?php echo e(URL::asset('vendors/google-code-prettify/bin/prettify.min.css')); ?>" rel="stylesheet"> -->
    <!-- Select2 -->
    <link href="<?php echo e(URL::asset('vendors/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
   
    
	<!-- FullCalendar -->
    <link href="<?php echo e(URL::asset('vendors/fullcalendar/dist/fullcalendar.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::asset('vendors/fullcalendar/dist/fullcalendar.print.css')); ?>" rel="stylesheet" media="print">
	<!-- bootstrap-daterangepicker -->
    <link href="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.css')); ?> " rel="stylesheet">
    <link href="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet">
	<!-- dropify CSS -->
	<link rel="stylesheet" href="<?php echo e(URL::asset('vendors/dropify/dist/css/dropify.min.css')); ?>">
	
    <!-- Custom Theme Style -->
    <link href="<?php echo e(URL::asset('build/css/custom.min.css')); ?> " rel="stylesheet">
	
	 <!-- Own Theme Style -->
    <link href="<?php echo e(URL::asset('build/css/own.css')); ?> " rel="stylesheet">
	

	<!-- Our Custom stylesheet -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/css/responsive_styles.css')); ?>">

	<!-- MoT Custom stylesheet -->
	<link rel="stylesheet" type="text/css" href=" <?php echo e(URL::asset('public/css/custom_mot_styles.css')); ?> ">
   <!-- Datatables -->
    
    <link href="<?php echo e(URL::asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
	 <link href="<?php echo e(URL::asset('build/css/dataTables.responsive.css')); ?> " rel="stylesheet">
	 <link href="<?php echo e(URL::asset('build/css/dataTables.tableTools.css')); ?> " rel="stylesheet">
    <!-- <link href="<?php echo e(URL::asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet"> -->
    
    <link href="<?php echo e(URL::asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
	
	 <!-- AutoComplete CSS -->
	<link href="<?php echo e(URL::asset('build/css/themessmoothness.css')); ?>" rel="stylesheet">
	 <!-- Multiselect CSS -->
	<link href="<?php echo e(URL::asset('build/css/multiselect.css')); ?>" rel="stylesheet">
	 <!-- Slider Style -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('public/css/google_api_font.css')); ?>">
	<?php if(getValue()=='rtl'): ?>
	<link href="<?php echo URL::asset('build/css/bootstrap-rtl.min.css');; ?>" rel="stylesheet" id="rtl"/>
	<?php else: ?>
		
	<?php endif; ?>
	
	<!-- sweetalert -->
	<link href="<?php echo e(URL::asset('vendors/sweetalert/sweetalert.css')); ?>" rel="stylesheet" type="text/css">
	
	<!-- <link href="<?php echo URL::asset('build/dist/css/select2.min.css');; ?>" rel='stylesheet' type='text/css'> -->
	<style>
	@media  print
   {
     
      .noprint
      {
        display:none
      }
   }
	</style>
  </head>

<body id="app-layout" class="nav-md">
   <div class="container body">
    <div class="main_container">
       <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title hidden-xs" style="border: 0; ">
              <a href="<?php echo url('/'); ?>" class="site_title">
			  <img src="<?php echo e(URL::asset('public/general_setting/'.getLogoSystem())); ?>"
			   class="profilepic" ></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
				 <?php if(!empty(Auth::user()->id)): ?>
					 <?php if(Auth::user()->role=='admin'): ?>
						  <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/admin/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
					 <?php if(Auth::user()->role=='Customer'): ?>
						 <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
					
					<?php if(Auth::user()->role=='Supplier'): ?>
						 <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/supplier/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
					
					<?php if(Auth::user()->role=='employee'): ?>
						 <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/employee/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
					
					 <?php if(Auth::user()->role=='accountant'): ?>
						 <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/accountant/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
					
					<?php if(Auth::user()->role=='supportstaff'): ?>
						 <a href="<?php echo url('/setting/profile'); ?>"><img src="<?php echo e(URL::asset('public/supportstaff/'.Auth::user()->image)); ?>" alt="..." class="img-circle profile_img"></a>
					<?php endif; ?>
				<?php endif; ?>
              </div>
              <div class="profile_info">
                <span><?php echo e(trans('app.Welcome')); ?></span>
				 <?php if(!empty(Auth::user()->id)): ?>
                <h2><?php echo e(Auth::user()->name); ?></h2>
				<?php endif; ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_view')): ?>
                  		<li><a href="<?php echo url('/'); ?>"><i class="fa fa-home"></i> <?php echo e(trans('app.Dashboard')); ?> </a> </li>
				  	<?php endif; ?>
				  
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['supplier_view','product_view','purchase_view','stock_view'])): ?>
				   	<li><a><i class="fa fa-user image_icon"></i> <?php echo e(trans('app.Inventory')); ?> <span class="fa fa-chevron-down"></span></a>
                    	<ul class="nav child_menu">
                    		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier_view')): ?>
							<li><a href="<?php echo url('/supplier/list'); ?>"><?php echo e(trans('app.Supplier')); ?></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_view')): ?>
							<li><a href="<?php echo url('/product/list'); ?>"><?php echo e(trans('app.Product')); ?></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_view')): ?>
							<li><a href="<?php echo url('/purchase/list'); ?>"><?php echo e(trans('app.Purchase')); ?></a></li>
							<?php endif; ?>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stock_view')): ?>
							<li><a href="<?php echo url('/stoke/list'); ?>"><?php echo e(trans('app.Stock')); ?></a></li>
							<?php endif; ?>
                    	</ul>
				  	</li>
				 	<?php endif; ?>
				 	
				 
                	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer_view','employee_view','supportstaff_view','accountant_view'])): ?>
				 	<li><a><i class="fa fa-edit"></i> <?php echo e(trans('app.Users')); ?> <span class="fa fa-chevron-down"></span></a>
	                    <ul class="nav child_menu">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_view')): ?>
	                      	<li><a href="<?php echo url('/customer/list'); ?>"><?php echo e(trans('app.Customers')); ?></a></li>
						 	<?php endif; ?>

						 	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_view')): ?>
	                      		<li><a href="<?php echo url('/employee/list'); ?>"><?php echo e(trans('app.Employees')); ?></a></li>
	                      	<?php endif; ?>
					     
						 	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_view')): ?>
						  	<li><a href="<?php echo url('/supportstaff/list'); ?>"><?php echo e(trans('app.Support Staff')); ?></a></li>
					     	<?php endif; ?>
						 
						 	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accountant_view')): ?>
	                      		<li><a href="<?php echo url('/accountant/list'); ?>"><?php echo e(trans('app.Accountant')); ?></a></li>
					     	<?php endif; ?>					  
	                    </ul>
                  	</li>
                	<?php endif; ?>
				
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['vehicle_view','vehicletype_view','vehiclebrand_view','colors_view'])): ?>
                	<li><a><i class="fa fa-motorcycle"></i> <?php echo e(trans('app.Vehicles')); ?> <span class="fa fa-chevron-down"></span></a>
                    	<ul class="nav child_menu">
                    		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicle_view')): ?>
                      			<li><a href="<?php echo url('/vehicle/list'); ?>"><?php echo e(trans('app.List Vehicle')); ?></a></li>
                      		<?php endif; ?>
                      		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehicletype_view')): ?>
                      			<li><a href="<?php echo url('/vehicletype/list'); ?>"><?php echo e(trans('app.List Vehicle Type')); ?></a></li>
                      		<?php endif; ?>
                      		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vehiclebrand_view')): ?>
                      			<li><a href="<?php echo url('/vehiclebrand/list'); ?>"><?php echo e(trans('app.List Vehicle Brand')); ?></a></li>
                      		<?php endif; ?>
                      		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('colors_view')): ?>
					   			<li><a href="<?php echo url('/color/list'); ?>"> <?php echo e(trans('app.Colors')); ?></a></li>
					   		<?php endif; ?>
                    	</ul>
                	</li>
                	<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service_view')): ?>
                  		<li><a href="<?php echo url('/service/list'); ?>"><i class="fa fa-slack image_icon"></i><?php echo e(trans('app.Services')); ?></a></li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('quotation_view')): ?>
						<li><a href="<?php echo url('/quotation/list'); ?>"><i class="fa fa-file-text-o"></i> <?php echo e(trans('app.Quotation')); ?> </a> </li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_view')): ?>
                  		<li><a href="<?php echo url('/invoice/list'); ?>" ><i class="fa fa-file-text-o"></i><?php echo e(trans('app.Invoices')); ?></a></li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['jobcard_view','gatepass_view'])): ?>			
                	<li><a><i class="fa fa-table"></i> <?php echo e(trans('app.Job Card')); ?> <span class="fa fa-chevron-down"></span></a>
                    	<ul class="nav child_menu">
                      	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobcard_view')): ?>
                      		<li><a href="<?php echo url('/jobcard/list'); ?>"><?php echo e(trans('app.Job Card')); ?></a></li>
                      	<?php endif; ?>
                      	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('gatepass_view')): ?>
                      		<li><a href="<?php echo url('/gatepass/list'); ?>"><?php echo e(trans('app.Gate Pass')); ?></a></li>
                      	<?php endif; ?>
                    	</ul>
                	</li>
                	<?php endif; ?>
				
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['taxrate_view','paymentmethod_view','income_view','expense_view'])): ?>
					<li><a><i class="fa fa-tasks image_icon"></i><?php echo e(trans('app.Accounts & Tax Rates')); ?> <span class="fa fa-chevron-down"></span></a>
                    	<ul class="nav child_menu">
                    	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxrate_view')): ?>
                      		<li><a href="<?php echo url('/taxrates/list'); ?>"><?php echo e(trans('app.List Tax Rates')); ?></a></li>
                      	<?php endif; ?>
                      	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('paymentmethod_view')): ?>
                      		<li><a href="<?php echo url('/payment/list'); ?>"><?php echo e(trans('app.List Payment Method')); ?> </a></li>
                      	<?php endif; ?>
                      	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('income_view')): ?>
					  		<li><a href="<?php echo url('/income/list'); ?>"><?php echo e(trans('app.Income')); ?></a></li>
					  	<?php endif; ?>
					  	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_view')): ?>
                      		<li><a href="<?php echo url('/expense/list'); ?>"><?php echo e(trans('app.Expenses')); ?></a></li>
                      	<?php endif; ?>
                    	</ul>
                	</li>
                	<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_view')): ?>
						<li><a href="<?php echo url('/sales/list'); ?>"><i class="fa fa-tty image_icon"></i><?php echo e(trans('app.Vehicle Sale')); ?> </a> </li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('salespart_view')): ?>
						<li><a href="<?php echo url('/sales_part/list'); ?>"><i class="fa fa-tty image_icon"></i><?php echo e(trans('app.Part Sales')); ?> </a> </li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rto_view')): ?>
				  		<li><a href="<?php echo url('/rto/list'); ?>"><i class="fa fa-clone"></i><?php echo e(trans('app.Compliance')); ?></a></li>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_view')): ?>
				  		<li><a href="<?php echo url('/report/salesreport'); ?>"><i class="fa fa-bar-chart-o"></i><?php echo e(trans('app.Reports')); ?> </a></li>
					<?php endif; ?>
				 
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('emailtemplate_view')): ?>
				  		<li><a href="<?php echo url('/mail/mail'); ?>"><i class="fa fa-envelope"></i><?php echo e(trans('app.Email Templates')); ?></a></li>
					<?php endif; ?>
				 
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customfield_view')): ?>
				  		<li><a href="<?php echo url('/setting/custom/list'); ?>"><i class="fa fa-user"></i><?php echo e(trans('app.Custom Fields')); ?></a> </li>
					<?php endif; ?>
				
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('observationlibrary_view')): ?>
				 		<li><a href="<?php echo url('/observation/list'); ?>" ><i class="fa fa-universal-access"></i><?php echo e(trans('app.Observation library')); ?></a></li> 
					<?php endif; ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			
				<?php if(getActiveAdmin(Auth::User()->id) == 'yes'): ?>
					<a data-toggle="tooltip" data-placement="top" href="<?php echo url('/setting/general_setting/list'); ?>" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
				<?php else: ?>
					<?php if(Gate::allows('generalsetting_view')): ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('generalsetting_view')): ?>
						<a data-toggle="tooltip" data-placement="top" href="<?php echo url('/setting/general_setting/list'); ?>" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
						<?php endif; ?>
					<?php else: ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('timezone_view')): ?>
							<a data-toggle="tooltip" data-placement="top" href="<?php echo url('/setting/timezone/list'); ?>" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
             
              <a title="Logout" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
						<?php echo csrf_field(); ?>
				</form>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
         
        <!-- /top navigation -->
		<?php echo $__env->yieldContent('content'); ?>
		 
	   <footer>
          <div>
             <span class="footerbottom"><?php echo e(trans('app.All rights reserved by Garage System.')); ?></span>
          </div>
         
        </footer>
   </div>
	
  </div>
 <!-- jQuery -->
    
    <script src="<?php echo e(URL::asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('build/js/jquery-ui.js')); ?>" defer="defer"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(URL::asset('vendors/bootstrap/dist/js/bootstrap.min.js')); ?>" defer="defer"></script>
    <!-- FastClick -->
    <script src="<?php echo e(URL::asset('vendors/fastclick/lib/fastclick.js')); ?>" defer="defer"></script>
    <!-- NProgress -->
    <script src="<?php echo e(URL::asset('vendors/nprogress/nprogress.js')); ?>" defer="defer"></script>
    <!-- Chart.js -->
    <script src="<?php echo e(URL::asset('vendors/Chart.js/dist/Chart.min.js')); ?>" defer="defer"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo e(URL::asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>" defer="defer"></script>
    <!-- Flot -->
    <script src="<?php echo e(URL::asset('vendors/Flot/jquery.flot.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/Flot/jquery.flot.pie.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/Flot/jquery.flot.time.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/Flot/jquery.flot.stack.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/Flot/jquery.flot.resize.js')); ?>" defer="defer"></script>
    <!-- Flot plugins -->
    <script src="<?php echo e(URL::asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/flot.curvedlines/curvedLines.js')); ?>" defer="defer"></script>
    <!-- DateJS -->
    <script src="<?php echo e(URL::asset('vendors/DateJS/build/date.js')); ?>" defer="defer"></script>
    <!-- FullCalendar -->
    <script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/fullcalendar/dist/fullcalendar.min.js')); ?>" defer="defer"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(URL::asset('build/js/custom.min.js')); ?>" defer="defer"></script>
	<script src="<?php echo e(URL::asset('vendors/sweetalert/sweetalert.min.js')); ?>" defer="defer"></script>
	
	<script src="<?php echo e(URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
	
    <script src="<?php echo e(URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>" defer="defer"></script>
	<!-- dropify scripts-->
	<script src="<?php echo e(URL::asset('vendors/dropify/dist/js/dropify.min.js')); ?>" defer="defer"></script>
	<script src="<?php echo e(URL::asset('vendors/iCheck/icheck.min.js')); ?>" defer="defer"></script>
	<!-- slider scripts-->
	
	<script src="<?php echo e(URL::asset('vendors/slider/jssor.slider.mini.js')); ?>" defer="defer"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>" defer="defer"></script>
	<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>" defer="defer"></script>
    <script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>" defer="defer"></script>
    
	
	 <!-- Filter  -->
	
    <script src="<?php echo e(URL::asset('build/js/jszip.min.js')); ?>" defer="defer"></script>
    
	 <!-- Autocomplete Js  -->
	<script src="<?php echo e(URL::asset('build/js/jquery.circliful.min.js')); ?>" defer="defer"></script>
	
	<!-- Multiselect Js  -->
	<script src="<?php echo e(URL::asset('build/js/bootstrap-multiselect.js')); ?>" defer="defer"></script>

	<script src="<?php echo e(URL::asset('build/dist/js/select2.min.js')); ?>" type='text/javascript' defer="defer"></script>
	
	<!-- For form field validate Using Proengsoft -->
	<script type="text/javascript" src="<?php echo e(URL::asset('build/jquery-validate/1.19.2/jquery.validate.min.js')); ?>"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('form').bind("keypress", function(e) {
			  if (e.keyCode == 13) {               
				e.preventDefault();
				return false;
			  }
			});
		});
	</script>

	<script type="text/javascript">
	    var csrf_token = document.querySelector("meta[name='csrf-token']").getAttribute("content");
	    function csrfSafeMethod(method) {
	        // these HTTP methods do not require CSRF protection
	        return (/^(GET|HEAD|OPTIONS)$/.test(method));
	    }
	    var o = XMLHttpRequest.prototype.open;
	    XMLHttpRequest.prototype.open = function(){
	        var res = o.apply(this, arguments);
	        var err = new Error();
	        if (!csrfSafeMethod(arguments[0])) {
	            this.setRequestHeader('anti-csrf-token', csrf_token);
	        }
	        return res;
	    };
 	</script>
</body>
</html>
<?php /**PATH C:\laragon\www\garage\resources\views/layouts/app.blade.php ENDPATH**/ ?>
<ul class="nav navbar-nav navbar-right">
		<li class="">
		  <a href="javascript:;" class=" dropdown-toggle authpic" data-toggle="dropdown" aria-expanded="false">
			<?php if(!empty(Auth::user()->id)): ?>
			 <?php if(Auth::user()->role=='admin'): ?>
				<img src="<?php echo e(URL::asset('public/admin/'.Auth::user()->image)); ?>" alt="admin"  width="40px" height="40px" class="img-circle">
			 <?php endif; ?>
			
			 <?php if(Auth::user()->role=='Customer'): ?>
				<img src="<?php echo e(URL::asset('public/customer/'.Auth::user()->image)); ?>" alt="customer"  width="40px" height="40px" class="img-circle">
			<?php endif; ?>
			
			<?php if(Auth::user()->role=='Supplier'): ?>
				<img src="<?php echo e(URL::asset('public/supplier/'.Auth::user()->image)); ?>" alt="supplier"  width="40px" height="40px" class="img-circle">
			<?php endif; ?>
			
			<?php if(Auth::user()->role=='employee'): ?>
				<img src="<?php echo e(URL::asset('public/employee/'.Auth::user()->image)); ?>" alt="employee"  width="40px" height="40px" class="img-circle">
			<?php endif; ?>
			
			<?php if(Auth::user()->role=='supportstaff'): ?>
				<img src="<?php echo e(URL::asset('public/supportstaff/'.Auth::user()->image)); ?>" alt="supportstaff"  width="40px" height="40px" class="img-circle">
			<?php endif; ?>
			
			<?php if(Auth::user()->role=='accountant'): ?>
				<img src="<?php echo e(URL::asset('public/accountant/'.Auth::user()->image)); ?>" alt="accountant"  width="40px" height="40px" class="img-circle">
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
			<li><a href="#" onclick="event.preventDefault();document.getElementById('logout-profile').submit();"><i class="fa fa-sign-out pull-right"></i> <?php echo e(trans('app.Log Out')); ?></a>
			<form id="logout-profile" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
						<?php echo csrf_field(); ?>
				</form>
			</li>
		  </ul>
		</li>

</ul><?php /**PATH C:\xampp\htdocs\garage\resources\views/dashboard/profile.blade.php ENDPATH**/ ?>
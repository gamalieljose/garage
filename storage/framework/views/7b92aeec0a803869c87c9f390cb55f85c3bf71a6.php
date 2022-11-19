
<?php $__env->startSection('content'); ?>

<!-- Start page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="nav_menu">
                  <nav>
                      <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Support Staff')); ?></span></a>
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
                    <ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_view')): ?>
                        <li role="presentation" class="active">
                            <a href="<?php echo url('/supportstaff/list'); ?>">
                                <span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b><?php echo e(trans('app.Supportstaff List')); ?></b>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_add')): ?>
                        <li role="presentation" class=" setTabAddSupportStaffOnSmallDevice">
                            <a href="<?php echo url('/supportstaff/add'); ?>">
                                <span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i> <?php echo e(trans('app.Add Supportstaff')); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="x_panel bgr">
                    <table id="datatable" class="table table-striped jambo_table" style="margin-top:20px;">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th><?php echo e(trans('app.Image')); ?></th>
                              <th ><?php echo e(trans('app.First Name')); ?></th>
                              <th><?php echo e(trans('app.Last Name')); ?></th>
                              <th><?php echo e(trans('app.Email')); ?></th>
                              <th><?php echo e(trans('app.Mobile Number')); ?></th>
                              
                            <?php if(getUserRoleFromUserTable(Auth::User()->id) != 'Customer'): ?>
                              <th><?php echo e(trans('app.Action')); ?></th> 
                            <?php elseif(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
                              <?php if(Gate::allows('supportstaff_add') || Gate::allows('supportstaff_edit') || Gate::allows('supportstaff_delete')): ?>
                                <th><?php echo e(trans('app.Action')); ?></th>
                              <?php endif; ?>
                            <?php endif; ?>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i=1;?>
                              <?php $__currentLoopData = $supportstaff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supportstaffs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td>
                                        <img src="<?php echo e(url('public/supportstaff/'.$supportstaffs->image)); ?>"  width="50px" height="50px" class="img-circle" >
                                    </td>
                                    <td><?php echo e($supportstaffs -> name); ?></td>
                                    <td><?php echo e($supportstaffs -> lastname); ?></td>
                                    <td><?php echo e($supportstaffs -> email); ?></td>
                                    <td><?php echo e($supportstaffs -> mobile_no); ?></td>
                                     
                                  <?php if(getUserRoleFromUserTable(Auth::User()->id) != 'Customer'): ?>
                                    <td>
                                    <?php if(getUserRoleFromUserTable(Auth::User()->id) == 'admin' ||  getUserRoleFromUserTable(Auth::User()->id) == 'supportstaff' || getUserRoleFromUserTable(Auth::User()->id) == 'accountant' || getUserRoleFromUserTable(Auth::User()->id) == 'employee'): ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_view')): ?>
                                        <a href="<?php echo url('/supportstaff/list/'.$supportstaffs->id); ?>"><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.View')); ?></button></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_edit')): ?>
                                        <a href="<?php echo url ('/supportstaff/list/edit/'.$supportstaffs->id); ?>"><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_delete')): ?>
                                        <a url="<?php echo url('/supportstaff/list/delete/'.$supportstaffs->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
                                      <?php endif; ?>
                                      
                                      <?php if(Auth::User()->id == $supportstaffs->id): ?>
                                        <?php if(!Gate::allows('supportstaff_edit')): ?>
                                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_owndata')): ?>
                                            <a href="<?php echo url ('/supportstaff/list/edit/'.$supportstaffs->id); ?>"><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    </td>
                                  <?php endif; ?>

                                  <?php if(getUserRoleFromUserTable(Auth::User()->id) == 'Customer'): ?>
                                    <?php if(Gate::allows('supportstaff_add') || Gate::allows('supportstaff_edit') || Gate::allows('supportstaff_delete')): ?>
                                    <td>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_view')): ?>
                                        <a href="<?php echo url('/supportstaff/list/'.$supportstaffs->id); ?>"><button type="button" class="btn btn-round btn-info"><?php echo e(trans('app.View')); ?></button></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_edit')): ?>
                                        <a href="<?php echo url ('/supportstaff/list/edit/'.$supportstaffs->id); ?>"><button type="button" class="btn btn-round btn-success"><?php echo e(trans('app.Edit')); ?></button></a>
                                      <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supportstaff_delete')): ?>
                                        <a url="<?php echo url('/supportstaff/list/delete/'.$supportstaffs->id); ?>" class="sa-warning"><button type="button" class="btn btn-round btn-danger"><?php echo e(trans('app.Delete')); ?></button></a>
                                      <?php endif; ?>
                                    </td>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                </div>
          </div>
        </div>
    </div>
<!-- End page content -->

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/supportstaff/list.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
<style>
.checkbox-success{
	background-color: #cad0cc!important;
	 color:red;
}
</style>

<!-- page content start-->
	<div class="right_col" role="main">
        <div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Account Tax')); ?></span></a>
						</div>
						<?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</nav>
				</div>
				<?php if(session('message')): ?>
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							<label for="checkbox-10 colo_success"> <?php echo e(trans('app.Duplicate Data')); ?> </label>
						</div>
					</div>
				</div>
				<?php endif; ?>
            </div>
          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_content">
                  <div class="">
                    <ul class="nav nav-tabs bar_tabs tabconatent" role="tablist">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxrate_view')): ?>
                        <li role="presentation" class=""><a href="<?php echo url('/taxrates/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.List Account Tax')); ?></a></li>
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxrate_add')): ?>
                        <li role="presentation" class="active setMarginForAddAccountTaxForSmallDevices"><a href="<?php echo url('/taxrates/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Account Tax')); ?></b></a></li>
                      <?php endif; ?>
                    </ul>  
                    <div class="clearfix"></div>
                  </div>
				   <div class="x_panel">
                    <br />
                    <form action="<?php echo e(url('/taxrates/store')); ?>" method="post"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left" id="tax-rates-add-form">

                      <div class="form-group col-md-12 col-sm-12 col-xs-12 my-form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><?php echo e(trans('app.Tax name')); ?> <label class="color-danger">*</label>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text"  required="required" name="taxrate" placeholder="<?php echo e(trans('app.Enter Tax Rate Name')); ?>" value="<?php echo e(old('taxrate')); ?>" class="form-control col-md-7 col-xs-12" maxlength="20">
                        </div>
                      </div>
                       <div class="form-group col-md-12 col-sm-12 col-xs-12 my-form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                        <?php echo e(trans('app.Tax Rates')); ?> (%) <label class="color-danger">*</label>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <input type="text"  required="required" name="tax" placeholder="<?php echo e(trans('app.Enater Tax')); ?>" class="form-control col-md-7 col-xs-12">
                           <?php if($errors->has('tax')): ?>
               <span class="help-block">
                 <strong><?php echo e($errors->first('tax')); ?></strong>
               </span>
             <?php endif; ?>
                        </div>
                      </div>
                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-9 col-sm-9 col-xs-12 text-center">
                         <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
              
                          <button type="submit" class="btn btn-success"><?php echo e(trans('app.Submit')); ?></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div> 
 <!-- page content end-->        

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- For form field validate -->
<?php echo JsValidator::formRequest('App\Http\Requests\StoreAccountTaxRatesRequest', '#tax-rates-add-form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $(':submit').removeAttr('disabled'); //re-enable on document ready
    });
    $('form').submit(function () {
        $(':submit').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('form').bind('invalid-form.validate', function () {
      $(':submit').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/taxrates/add.blade.php ENDPATH**/ ?>
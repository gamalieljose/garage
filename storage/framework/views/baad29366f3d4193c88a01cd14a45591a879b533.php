
<?php $__env->startSection('content'); ?>

<!-- page content -->
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="nav_menu">
            <nav>
               <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp <?php echo e(trans('app.Supplier')); ?></span></a>
               </div>
               <?php echo $__env->make('dashboard.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>
         </div>
      </div>
   </div>
   <div class="x_content">
      <ul class="nav nav-tabs bar_tabs" role="tablist">
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier_view')): ?>
            <li role="presentation" class=""><a href="<?php echo url('/supplier/list'); ?>"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> <?php echo e(trans('app.Supplier List')); ?></a></li>
         <?php endif; ?>

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier_add')): ?>
            <li role="presentation" class="active"><a href="<?php echo url('/supplier/add'); ?>"><span class="visible-xs"></span> <i class="fa fa-plus-circle fa-lg">&nbsp;</i><b><?php echo e(trans('app.Add Supplier')); ?></b></a></li>
         <?php endif; ?>
      </ul>
   </div>
   <div class="clearfix"></div>
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_content">
               <form id="supplier_add_form" method="post" action="<?php echo e(url('/supplier/store')); ?>" enctype="multipart/form-data"  class="form-horizontal upperform supplierAddForm">
                  <div class="col-md-12 col-xs-12 col-sm-12 space">
                     <h4><b><?php echo e(trans('app.Personal Information')); ?></b></h4>
                     <p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
                  </div>

               <!-- FirstName and LastName Field -->                  
                  <div class="col-md-12 col-sm-6 col-xs-12">
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="firstname"><?php echo e(trans('app.First Name')); ?></label>
                        
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="firstname" name="firstname" max="5" class="form-control" value="<?php echo e(old('firstname')); ?>"  placeholder="<?php echo e(trans('app.Enter First Name')); ?>" maxlength="50" >

                           <?php if($errors->has('firstname')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('firstname')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div>
                  
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="lastname"><?php echo e(trans('app.Last Name')); ?></label>
                        
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo e(old('lastname')); ?>" placeholder="<?php echo e(trans('app.Enter Last Name')); ?>" maxlength="50" >
                        
                           <?php if($errors->has('lastname')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('lastname')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <!-- FirstName and LastName Field End-->
            
               <!-- CompanyName and Email Field -->
                  <div class="col-md-12 col-sm-6 col-xs-12">  
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                        <label for="displayname" class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Company Name')); ?> <label class="color-danger">*</label></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="displayname" class="form-control companyname"  name="displayname" value="<?php echo e(old('displayname')); ?>" placeholder="<?php echo e(trans('app.Enter Company Name')); ?>" maxlength="100">
                  
                           <?php if($errors->has('displayname')): ?>
                              <span class="help-block" style="color:#a94442">
                                 <strong><?php echo e($errors->first('displayname')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="email"><?php echo e(trans('app.Email')); ?> <label class="color-danger">*</label></label>
                        
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(trans('app.Enter Email')); ?>"  maxlength="50">
                        
                           <?php if($errors->has('email')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('email')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <!-- CompanyName and Email Field End-->

               <!-- Mobile and Landline Field -->
                  <div class="col-md-12 col-sm-6 col-xs-12">
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="mobile"><?php echo e(trans('app.Mobile No')); ?> <label class="color-danger">*</label></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo e(old('mobile')); ?>" maxlength="16" minlength="6" placeholder="<?php echo e(trans('app.Enter Mobile No')); ?>">
                        
                           <?php if($errors->has('mobile')): ?>
                           <span class="help-block">
                              <strong><?php echo e($errors->first('mobile')); ?></strong>
                           </span>
                           <?php endif; ?>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('landlineno') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="landlineno"><?php echo e(trans('app.Landline No')); ?><label class="color-danger"></label></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="landlineno" name="landlineno" class="form-control" value="<?php echo e(old('landlineno')); ?>" maxlength="16" minlength="6" placeholder="<?php echo e(trans('app.Enter LandLine No')); ?>">
                        
                           <?php if($errors->has('landlineno')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('landlineno')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div>   
                  </div>
               <!-- Mobile and Landline Field End -->

               <!-- Gender and DoB Field -->
                  <!-- <div class="col-md-12 col-sm-6 col-xs-12"> -->
                     <!-- Remove Gender from Supplier Module -->
                     <!-- <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Gender')); ?> <label class="color-danger">*</label></label>
                        <div class="col-md-8 col-sm-8 col-xs-12 gender">
                           <input type="radio"  name="gender" value="1" checked><?php echo e(trans('app.Male')); ?> 
                           <input type="radio" name="gender" value="2" ><?php echo e(trans('app.Female')); ?>

                        </div>
                     </div> -->

                     <!-- Remove DOB Field from Supplier Module -->
                     <!-- <div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Date Of Birth')); ?> </label>
                        <div class="col-md-8 col-sm-8 col-xs-12 input-group date datepicker">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                           <input type="text" id="date_of_birth" class="form-control"  name="dob" value="<?php echo e(old('dob')); ?>"   placeholder="<?php echo getDatepicker();?>" readonly />
                        </div>
                     
                        <?php if($errors->has('dob')): ?>
                        <span class="help-block">
                           <strong style="margin-left:27%;"><?php echo e($errors->first('dob')); ?></strong>
                        </span>
                        <?php endif; ?>
                     </div> -->
                  <!-- </div> -->
               <!-- Gender and DoB Field End -->

               <!-- ContactPerson and Image Field -->
                  <div class="col-md-12 col-sm-6 col-xs-12">
                     <!-- Remove ContactPerson Field from Supplier Module -->
                     <!-- <div class="col-md-6 col-sm-6 col-xs-12 form-group <?php echo e($errors->has('contact_person') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo e(trans('app.Contact Person')); ?></label>
                     
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <input type="text" id="" class="form-control"  name="contact_person" value="<?php echo e(old('contact_person')); ?>" placeholder="<?php echo e(trans('app.Enter Contact Person Name')); ?>" maxlength="25">
                        
                           <?php if($errors->has('contact_person')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('contact_person')); ?></strong>
                              </span>
                           <?php endif; ?>
                        </div>
                     </div> -->

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="image"><?php echo e(trans('app.Image')); ?> </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <!--  <input type="file" id="input-file-max-fs"  name="image"  class="form-control dropify" data-max-file-size="5M"> -->
                              <input type="file" id="image" name="image" value="<?php echo e(old('image')); ?>" class="form-control chooseImage">

                           <!-- <?php if($errors->has('image')): ?>
                              <span class="help-block">
                                 <strong><?php echo e($errors->first('image')); ?></strong>
                              </span>
                           <?php endif; ?> -->
                           
                           <!-- <div class="dropify-preview">
                              <span class="dropify-render"></span>
                              <div class="dropify-infos">
                                 <div class="dropify-infos-inner">
                                    <p class="dropify-filename">
                                       <span class="file-icon"></span> 
                                       <span class="dropify-filename-inner"></span>
                                    </p>
                                 </div>
                              </div>
                           </div> -->
                              <img src="#" id="imagePreview" alt="User Image" class="imageHideShow" style="width: 20%; display: none; padding-top: 8px;">
                        </div>
                     </div>
                  </div>
               <!-- ContactPerson and Image Field -->
               
               <!-- Address Part -->
                  <div class="col-md-12 col-xs-12 col-sm-12 space">
                     <h4><b><?php echo e(trans('app.Address')); ?></b></h4>
                     <p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
                  </div>
               
                  <div class="col-md-12 col-sm-6 col-xs-12">
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="country_id"><?php echo e(trans('app.Country')); ?> <label class="color-danger">*</label></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <select class="form-control select_country" name="country_id" countryurl="<?php echo url('/getstatefromcountry'); ?>">
                              <option value=""><?php echo e(trans('app.Select Country')); ?></option>
                                 <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countrys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($countrys->id); ?>"><?php echo e($countrys->name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="state"><?php echo e(trans('app.State')); ?> </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <select class="form-control state_of_country" name="state" stateurl="<?php echo url('/getcityfromstate'); ?>">
                           </select>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-12 col-sm-6 col-xs-12">
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="city"><?php echo e(trans('app.Town/City')); ?></label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <select class="form-control city_of_state" name="city" value="<?php echo e(old('firstname')); ?>">
                           </select>
                        </div>
                     </div>
                     
                     <div class="col-md-6 col-sm-6 col-xs-12 form-group my-form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="address"><?php echo e(trans('app.Address')); ?> <label class="color-danger">*</label>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <textarea id="address" name="address" class="form-control addressTextarea" maxlength="100"><?php echo e(old('address')); ?></textarea>
                        </div>
                     </div>
                  </div>
                  <!-- Address Part End-->

               <!-- CustomField Part -->
                  <?php if(!empty($tbl_custom_fields)): ?>
                     <div class="col-md-12 col-xs-12 col-sm-12 space">
                        <h4><b><?php echo e(trans('app.Custom Fields')); ?></b></h4>
                        <p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
                     </div>
                     <?php
                        $subDivCount = 0;
                     ?>
                        <?php $__currentLoopData = $tbl_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myCounts => $tbl_custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                           if($tbl_custom_field->required == 'yes')
                           {
                              $required="required";
                              $red="*";
                           }else{
                              $required="";
                              $red="";
                           }

                           $subDivCount++;
                        ?>
                           
                           <?php if($myCounts%2 == 0): ?>
                              <div class="col-md-12 col-sm-6 col-xs-12">
                           <?php endif; ?>

                           <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="account-no"><?php echo e($tbl_custom_field->label); ?> <label class="text-danger"><?php echo e($red); ?></label></label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                              <?php if($tbl_custom_field->type == 'textarea'): ?>
                                 <textarea  name="custom[<?php echo e($tbl_custom_field->id); ?>]" class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" maxlength="100" <?php echo e($required); ?>></textarea>
                              <?php elseif($tbl_custom_field->type == 'radio'): ?>
                                 
                                 <?php
                                    $radioLabelArrayList = getRadiolabelsList($tbl_custom_field->id)
                                 ?>
                                 <?php if(!empty($radioLabelArrayList)): ?>
                                    <div style="margin-top: 5px;">
                                    <?php $__currentLoopData = $radioLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]" value="<?php echo e($k); ?>" <?php if($k == 0) {echo "checked"; } ?> ><?php echo e($val); ?> &nbsp;
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                 <?php endif; ?>
                              <?php elseif($tbl_custom_field->type == 'checkbox'): ?>
                                 
                                 <?php
                                    $checkboxLabelArrayList = getCheckboxLabelsList($tbl_custom_field->id);
                                    $cnt = 0;
                                 ?>

                                 <?php if(!empty($checkboxLabelArrayList)): ?>
                                 <div style="margin-top: 5px;">
                                    <?php $__currentLoopData = $checkboxLabelArrayList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <input type="<?php echo e($tbl_custom_field->type); ?>" name="custom[<?php echo e($tbl_custom_field->id); ?>][]" value="<?php echo e($val); ?>"> <?php echo e($val); ?> &nbsp;
                                    <?php $cnt++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <input type="hidden" name="checkboxCount" value="<?php echo e($cnt); ?>">
                                 <?php endif; ?>                                 
                              <?php elseif($tbl_custom_field->type == 'textbox' || $tbl_custom_field->type == 'date'): ?>
                                 <input type="<?php echo e($tbl_custom_field->type); ?>"  name="custom[<?php echo e($tbl_custom_field->id); ?>]"  class="form-control" placeholder="<?php echo e(trans('app.Enter')); ?> <?php echo e($tbl_custom_field->label); ?>" maxlength="30" <?php echo e($required); ?>>
                              <?php endif; ?>
                              </div>
                           </div>

                           <?php if($myCounts%2 != 0): ?>
                              </div>
                           <?php endif; ?>                                                     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                           if ($subDivCount%2 != 0) {
                              echo "</div>";
                           }
                        ?>            
                     <?php endif; ?>
               <!-- Custom Field Part End-->

               <!-- Submit and Cancel Part -->
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                     <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('app.Cancel')); ?></a>
                        <button type="submit" class="btn btn-success supplierSubmitButton"><?php echo e(trans('app.Submit')); ?></button>
                     </div>
                  </div>
               <!-- Submit and Cancel Part End-->
               </form>
            <!-- Form Part End-->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Content page end -->
  
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>  
<script>
   $(document).ready(function(){
      
      $('.select_country').change(function(){
         countryid = $(this).val();
         var url = $(this).attr('countryurl');
         $.ajax({
            type:'GET',
            url: url,
            data:{ countryid:countryid },
            success:function(response){
               $('.state_of_country').html(response);
            }
         });
      });
      
      $('body').on('change','.state_of_country',function(){
         stateid = $(this).val();
         
         var url = $(this).attr('stateurl');
         $.ajax({
            type:'GET',
            url: url,
            data:{ stateid:stateid },
            success:function(response){
               $('.city_of_state').html(response);
            }
         });
      });
   });
</script>
<script>
   $(document).ready(function(){
       // Basic
       $('.dropify').dropify();
   
       // Translated
       $('.dropify-fr').dropify({
           messages: {
               default: 'Glissez-déposez un fichier ici ou cliquez',
               replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
               remove:  'Supprimer',
               error:   'Désolé, le fichier trop volumineux'
           }
       });
   
       // Used events
       var drEvent = $('#input-file-events').dropify();
   
       drEvent.on('dropify.beforeClear', function(event, element){
           return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
       });
   
       drEvent.on('dropify.afterClear', function(event, element){
           alert('File deleted');
       });
   
       drEvent.on('dropify.errors', function(event, element){
           console.log('Has Errors');
       });
   
       var drDestroy = $('#input-file-to-destroy').dropify();
       drDestroy = drDestroy.data('dropify')
       $('#toggleDropify').on('click', function(e){
           e.preventDefault();
           if (drDestroy.isDropified()) {
               drDestroy.destroy();
           } else {
               drDestroy.init();
           }
       })
   });
   
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('vendors/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<script>
   $('.datepicker').datetimepicker({
      format: "<?php echo getDatepicker(); ?>",
      autoclose: 1,
      minView: 2,
      endDate: new Date(),
   });

   /*If address have any white space then make empty address value*/
   $('body').on('keyup', '.addressTextarea', function(){

      var addressValue = $(this).val();

      if (!addressValue.replace(/\s/g, '').length) {
         $(this).val("");
      }
   });
</script>

<!-- For image preview at selected image -->
<script>
   function readUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#image").change(function(){
        readUrl(this);
        $("#imagePreview").css("display","block");
    });

   $('body').on('change','.chooseImage',function(){
      var imageName = $(this).val();
      var imageExtension = /(\.jpg|\.jpeg|\.png)$/i;

      if (imageExtension.test(imageName)) {
         $('.imageHideShow').css({"display":""});
      }
      else {
         $('.imageHideShow').css({"display":"none"});
      }     
   });

   $('body').on('keyup', '.companyname', function(){

      var companyName = $(this).val();

      if (!companyName.replace(/\s/g, '').length) {
         $(this).val("");
      }
   });

   $('body').on('keyup', '#firstname', function(){

      var firstName = $(this).val();

      if (!firstName.replace(/\s/g, '').length) {
         $(this).val("");
      }
   });

   $('body').on('keyup', '#lastname', function(){

      var lastName = $(this).val();

      if (!lastName.replace(/\s/g, '').length) {
         $(this).val("");
      }
   });
</script>

<!-- For form field validate -->
<?php echo JsValidator::formRequest('App\Http\Requests\SupplierAddEditFormRequest', '#supplier_add_form');; ?>

<script type="text/javascript" src="<?php echo e(asset('public/vendor/jsvalidation/js/jsvalidation.js')); ?>"></script>

<!-- Form submit at a time only one -->
<script type="text/javascript">
    /*$(document).ready(function () {
        $('.supplierSubmitButton').removeAttr('disabled'); //re-enable on document ready
    });
    $('.supplierAddForm').submit(function () {
        $('.supplierSubmitButton').attr('disabled', 'disabled'); //disable on any form submit
    });

    $('.supplierAddForm').bind('invalid-form.validate', function () {
      $('.supplierSubmitButton').removeAttr('disabled'); //re-enable on form invalidation
    });*/
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\garage\resources\views/supplier/add.blade.php ENDPATH**/ ?>
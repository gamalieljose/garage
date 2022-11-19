<div id="stockprint" style="margin-left:10px;">

	<table width="100%" border="0">
		<tbody>
			<tr>
				<td align="center">
					<h4><?php echo e(ucfirst(getProduct($id))); ?>  -  <?php echo e(getProductName(getproducttyid($id))); ?></h4>
				</td>					
			</tr>				
		</tbody>
	</table>			
	<table class="table table-bordered adddatatable" width="100%" border="1" style="border-collapse:collapse;">			
		<thead>
			<tr>
				<th class="text-center"><?php echo e(trans('app.Date')); ?></th>
				<th class="text-center"><?php echo e(trans('app.Type')); ?></th>
				<th class="text-center"><?php echo e(trans('app.Reference Details')); ?></th>
				<th class="text-center"><?php echo e(trans('app.Employee')); ?></th>
				<th class="text-center"><?php echo e(trans('app.Quantity')); ?></th>
			</tr>
		</thead>
		<tbody>
		
			<?php  $total=0;
			      $total1=0;
			if(!empty($totalstock))
			{
				
			 foreach($totalstock as $totalstocks)
			 { ?>
			<tr>
				
				<td class="text-center"> <?php echo e(date(getDateFormat(),strtotime($totalstocks->date))); ?></td>
				<td class="text-center"><?php if(!empty($totalstocks->purchase_no)){echo"Purchase";}else{echo"Sales";} ?> </td>
			<?php if(!empty($totalstocks->purchase_no)){ ?>
				<td class="text-center">
					<a  href="<?php echo url('/purchase/list/pview/'.$totalstocks->id); ?>"> <?php echo e($totalstocks->purchase_no); ?>

					</a>  
				</td>
				<td class="text-center"> <?php echo e(getSupplierName($totalstocks->supplier_id)); ?> </td>
				<td class="text-center"> + <?php echo e($totalstocks->qty); ?> </td>
				<?php $total += $totalstocks->qty;	?>
			<?php }else{ ?>
				<td class="text-center"> 
					<?php echo e(getCustomerName($totalstocks->customer_id)); ?> 
				</td>
				<td class="text-center"> <?php echo e(getAssignedName($totalstocks->salesmanname)); ?></td>
				<td class="text-center"> - <?php echo e($totalstocks->quantity); ?></td>
				<?php $total1 += $totalstocks->quantity;	?>	
				<?php } ?>
			</tr>
			<?php } } ?>
			<tr>
				<td colspan="4" class="text-right" align="right"><b><?php echo e(trans('app.Total Stock:')); ?></b></td>	
				<?php $totalstock=$total - $total1;?>
				<td class="text-center"><?php echo e($totalstock); ?></td>
			</tr>
		</tbody>			
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('app.Close')); ?></button>
</div><?php /**PATH C:\xampp\htdocs\garage\resources\views/report/product/modelsale.blade.php ENDPATH**/ ?>
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2><?php echo @ucwords($service[0]->sTitle);?> - <?php echo @ucwords($serviceitem[0]->sTitle);?> - Edit Content</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/services">Services</a>
				</li>
				<li class="active">
					<strong>Add Content</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/viewServiceItemContent/<?php echo @$itemid;?>/<?php echo @$serviceid;?>" class="btn btn-w-m btn-default pull-right">Back to List</a>
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox">
							
							<div class="ibox-content">
								<form method="POST" action="<?php echo base_url()?>index.php/home/updateServiceItemContent/<?php echo @$itemid;?>/<?php echo @$serviceid;?>" class="form-horizontal" enctype="multipart/form-data">	
								
									<div class="form-group">
										<label class="col-sm-2 control-label">Full Description</label>
										<div class="col-sm-10">
											<textarea name="sDesc" id="sDesc" class="form-control txtcls" rows="5" required><?php echo @$item[0]->sDesc;?></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>														
									<div class="form-group">
										<label class="col-sm-2 control-label">Upload Image</label>
										<div class="col-sm-5">
										<?php
										if(@$item[0]->sImage != '')
										{
										?>
										<img src="<?php echo base_url();?>uploads/services/<?php echo @$item[0]->sImage;?>" style="width:200px;" /><br />
										<?php	
										}
										?>
											<input type="file" name="sImage" id="sImage" class="form-control" />
											<input type="hidden" name="hiddensImage" id="hiddensImage" class="form-control" value="<?php echo @$item[0]->sImage;?>" />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-2">
											<input type="hidden" name="rowid" id="rowid" class="form-control" value="<?php echo @$rowid;?>" />
											<button class="btn btn-white" type="reset">Reset</button>
											<button class="btn btn-primary" type="submit">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="<?php echo base_url()?>externals/js/plugins/summernote/summernote.min.js"></script>
  
<script>
$(document).ready(function(){

	$('.txtcls').summernote();

});
var edit = function() {
	$('.click2edit').summernote({focus: true});
};
var save = function() {
	var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
	$('.click2edit').destroy();
}; 
$("#page_title").blur(function(){
	var pageTitle=$(this).val();
	if(pageTitle !='')
	{
		$.ajax({
			type:"POST",
			url:"<?php echo base_url(); ?>index.php/home/pageExists",
			data:"pageTitle="+pageTitle,
			async:false,
			success:function(response)
			{
				//alert(response);
				if(response == 1)
				{
					$("#page_title").val("");
					alert("Service Already Exists");
					$("#page_title").attr("placeholder","Service Already Exists");
					$("#page_title").css("border","1px solid red");
				}
				else
				{
					$("#page_title").css("border","1px solid #ccc");
				}
			}			
		});
	}
});
</script>
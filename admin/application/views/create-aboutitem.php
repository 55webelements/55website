<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2><?php echo @ucwords($aType);?> - Add Content</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li class="active">
					<strong>Add Content</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/aboutItem/<?php echo @$aType;?>" class="btn btn-w-m btn-default pull-right">Back to List</a>
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="col-lg-7">
						<div class="ibox">
							
							<div class="ibox-content">
								<form method="POST" action="<?php echo base_url()?>index.php/home/saveAboutItem/<?php echo @$aType;?>" class="form-horizontal" enctype="multipart/form-data">																	
									<?php
									if(@$aType == 'process')
									{
									?>
									<div class="form-group">
										<label class="col-sm-4 control-label">Title</label>
										<div class="col-sm-8">
											<input type="text" name="aTitle" id="aTitle" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload ICon</label>
										<div class="col-sm-8">
											<input type="file" name="aIcon" id="aIcon" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<?php
									}
									?>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<textarea name="aDesc" id="aDesc" class="txtcls form-control" rows="8"></textarea>
										</div>
									</div>
									
									
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-2">
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
					alert("Page Already Exists");
					$("#page_title").attr("placeholder","Page Already Exists");
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
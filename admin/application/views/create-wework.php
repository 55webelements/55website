<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Add How We Work?</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/pages">Pages</a>
				</li>
				<li class="active">
					<strong>Add How We Work?</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/wework" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
								<form method="POST" action="<?php echo base_url()?>index.php/home/saveWework" class="form-horizontal" enctype="multipart/form-data">																	
									<div class="form-group">
										<label class="col-sm-4 control-label">Title</label>
										<div class="col-sm-8">
											<input type="text" name="wTitle" id="wTitle" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<textarea name="wDesc" id="wDesc" class="form-control txtcls" required></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>		
															
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Image</label>
										<div class="col-sm-8">
											<input type="file" name="wImage" id="wImage" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Image Alt Text</label>
										<div class="col-sm-8">
											<input type="altTitle" name="altTitle" id="altTitle" class="form-control" />
										</div>
									</div>
									<div class="hr-line-dashed"></div>			
								
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
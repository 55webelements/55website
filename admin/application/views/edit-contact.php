<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Edit Contact Details</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li class="active">
					<strong>Edit Contact Details</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/contact" class="btn btn-w-m btn-default pull-right">Back to List</a>
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="col-lg-9">
						<div class="ibox">
							
							<div class="ibox-content">
								<form method="POST" action="<?php echo base_url()?>index.php/home/updateContact" class="form-horizontal" enctype="multipart/form-data">																	
									<div class="form-group">
										<label class="col-sm-2 control-label">Address</label>
										<div class="col-sm-8">
											<textarea name="cAddress" id="cAddress" class="form-control txtcls" required><?php echo @$item[0]->cAddress;?></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>															
									<div class="form-group">
										<label class="col-sm-2 control-label">Contact Email ID</label>
										<div class="col-sm-8">
											<input type="text" name="cEmail" id="cEmail" class="form-control" value="<?php echo @$item[0]->cEmail;?>" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>														
									<div class="form-group">
										<label class="col-sm-2 control-label">Contact Number</label>
										<div class="col-sm-8">
											<input type="text" name="cContact" id="cContact" class="form-control" value="<?php echo @$item[0]->cContact;?>" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>											
									<div class="form-group">
										<label class="col-sm-2 control-label">Google Map Ifram</label>
										<div class="col-sm-8">
											<textarea name="cLatlang" id="cLatlang" class="form-control" rows="10" required /><?php echo @$item[0]->cLatlang;?></textarea><br /><br />
											<?php echo @$item[0]->cLatlang;?>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-2">
											<input type="hidden" name="rowid" id="rowid" value="<?php echo @$rowid;?>" />
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
					alert("Career Already Exists");
					$("#page_title").attr("placeholder","Career Already Exists");
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
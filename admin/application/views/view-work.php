<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>View Work</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/work">Works</a>
				</li>
				<li class="active">
					<strong>View Work</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/work" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
								<form method="POST" action="<?php echo base_url()?>index.php/home/updateWork" class="form-horizontal" enctype="multipart/form-data">
							
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Select Work Category</label>
										<div class="col-sm-8">
											<?php echo @$item[0]->tCategory;?>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Select Work Type</label>
										<div class="col-sm-8">
											<?php echo @$item[0]->tType;?>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Title</label>
										<div class="col-sm-8">
											<?php echo @$item[0]->tTitle;?>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<?php echo @$item[0]->tDesc;?>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Website URL</label>
										<div class="col-sm-8">
											<a href="<?php echo @$item[0]->tURL;?>" target="_blank"><?php echo @$item[0]->tURL;?></a>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Cover Image</label>
										<div class="col-sm-8">
										<?php
										if(@$item[0]->tSImage != '')
										{
										?>
											<img style="width:100px" src="<?php echo base_url();?>uploads/works/<?php echo @$item[0]->tSImage;?>" style="width:200px;">
										<?php
										}
										?>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Main Image</label>
										<div class="col-sm-8">
										<?php
										if(@$item[0]->tImage != '')
										{
										?>
											<img style="width:100px" src="<?php echo base_url();?>uploads/works/<?php echo @$item[0]->tImage;?>" style="width:200px;">
										<?php
										}
										?>
											
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									
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
function bannerImage(){
//alert('fdxsghbdf');
	//Get reference of FileUpload.
	var fileUpload = $("#mainImage")[0];
	//Check whether HTML5 is supported.
	if (typeof (fileUpload.files) != "undefined") {
		//Initiate the FileReader object.
		var reader = new FileReader();
		//Read the contents of Image File.
		reader.readAsDataURL(fileUpload.files[0]);
		reader.onload = function (e) {
			//Initiate the JavaScript Image object.
			var image = new Image();
			//Set the Base64 string return from FileReader as source.
			image.src = e.target.result;
			image.onload = function () {
				//Determine the Height and Width.
				var height = this.height;
				var width = this.width;
				   if (height != width){
					alert("Width and Height should be same");
					$("#mainImage").val('');
					return false;
				}
				//alert("Uploaded image has valid Height and Width.");
				return true;
			};
		}
	} else {
		alert("This browser does not support HTML5.");
		return false;
	}
}

</script>

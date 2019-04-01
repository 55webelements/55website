<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Add Blog</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/blog">Blog</a>
				</li>
				<li class="active">
					<strong>Add Blog</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/blog" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
								<form method="POST" action="<?php echo base_url()?>index.php/home/saveBlog" class="form-horizontal" enctype="multipart/form-data">
							
									<div class="form-group">
										<label class="col-sm-2 control-label">Title</label>
										<div class="col-sm-8">
											<textarea name="bTitle" id="bTitle" class="form-control" required /></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label">Description</label>
										<div class="col-sm-8">
											<textarea rows="5" name="bDesc" id="bDesc" class="form-control txtcls" required></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Image</label>
										<div class="col-sm-8">
											<input type="file" name="bImage" id="bImage" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<div class="col-sm-2 col-sm-offset-2">
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
				   if (height < 790 || height > 810 && width < 590 || width >  610){
					alert("Width and Height 600 X 800px");
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

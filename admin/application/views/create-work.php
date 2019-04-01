<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Add Work</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/work">Works</a>
				</li>
				<li class="active">
					<strong>Add Work</strong>
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
								<form method="POST" action="<?php echo base_url()?>index.php/home/saveWork" class="form-horizontal" enctype="multipart/form-data">
							
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Select Work Category</label>
										<div class="col-sm-8">
											<select name="tCategory" id="tCategory" class="form-control" required>
												<option value="">Choose Work Type</option>
												<option value="Application">Application</option>
												<option value="Architecture">Architecture</option>
												<option value="Corporate">Corporate</option>
												<option value="Conferences">Conferences</option>
												<option value="Entertainment">Entertainment</option>
												<option value="Education">Education</option>
												<option value="Gaming">Gaming</option>
												<option value="Health-Care">Health Care</option>
												<option value="Industries">Industries</option>
												<option value="E-Commerce">E-Commerce</option>
												<option value="CRM">CRM</option>
												<option value="Static-Website">Static Website</option>
												<option value="CMS">CMS</option>
												<option value="Real-Estates">Real Estates</option>
												<option value="Portal">Portal</option>
												<option value="Mobile-Application">Mobile Application</option>
												<option value="Custom-Application">Custom Application</option>
											</select>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Select Work Type</label>
										<div class="col-sm-8">
											<select name="tType" id="tType" class="form-control" required>
												<option value="">Choose Work Type</option>
												<option value="UI">UI</option>
												<option value="UX">UX</option>
												<option value="UI-UX">UI/UX</option>
												<option value="Application">Application</option>
											</select>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Title</label>
										<div class="col-sm-8">
											<input type="text" name="tTitle" id="tTitle" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<textarea name="tDesc" id="tDesc" class="form-control txtcls" required></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Website URL</label>
										<div class="col-sm-8">
											<input type="text" name="tURL" id="tURL" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Cover Image</label>
										<div class="col-sm-8">
											<input type="file" accept="image/*" name="tSImage" id="tSImage" class="form-control" required />
											<span id="cond" style="color: red;font-size:13px;">*Square Image recommended.</span>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Main Image</label>
										<div class="col-sm-8">
											<input type="file" accept="image/*" name="tImage" id="tImage" class="form-control" required />
											<span id="cond" style="color: red;font-size:13px;">*Square Image recommended.</span>
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

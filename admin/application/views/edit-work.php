<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Edit Work</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/work">Works</a>
				</li>
				<li class="active">
					<strong>Edit Work</strong>
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
											<select name="tCategory" id="tCategory" class="form-control" required>
												<option value="">Choose Work Type</option>
												<option <?php if(@$item[0]->tCategory == 'Application'){echo 'selected="selected"';}?> value="Application">Application</option>
												<option <?php if(@$item[0]->tCategory == 'Architecture'){echo 'selected="selected"';}?> value="Architecture">Architecture</option>
												<option <?php if(@$item[0]->tCategory == 'Corporate'){echo 'selected="selected"';}?> value="Corporate">Corporate</option>
												<option <?php if(@$item[0]->tCategory == 'Conferences'){echo 'selected="selected"';}?> value="Conferences">Conferences</option>
												<option <?php if(@$item[0]->tCategory == 'Entertainment'){echo 'selected="selected"';}?> value="Entertainment">Entertainment</option>
												<option <?php if(@$item[0]->tCategory == 'Education'){echo 'selected="selected"';}?> value="Education">Education</option>
												<option <?php if(@$item[0]->tCategory == 'Gaming'){echo 'selected="selected"';}?> value="Gaming">Gaming</option>
												<option <?php if(@$item[0]->tCategory == 'Health-Care'){echo 'selected="selected"';}?> value="Health-Care">Health Care</option>
												<option <?php if(@$item[0]->tCategory == 'Industries'){echo 'selected="selected"';}?> value="Industries">Industries</option>
												<option <?php if(@$item[0]->tCategory == 'E-Commerce'){echo 'selected="selected"';}?> value="E-Commerce">E-Commerce</option>
												<option <?php if(@$item[0]->tCategory == 'CRM'){echo 'selected="selected"';}?> value="CRM">CRM</option>
												<option <?php if(@$item[0]->tCategory == 'Static-Website'){echo 'selected="selected"';}?> value="Static-Website">Static Website</option>
												<option <?php if(@$item[0]->tCategory == 'CMS'){echo 'selected="selected"';}?> value="CMS">CMS</option>
												<option <?php if(@$item[0]->tCategory == 'Real-Estates'){echo 'selected="selected"';}?> value="Real-Estates">Real Estates</option>
												<option <?php if(@$item[0]->tCategory == 'Portal'){echo 'selected="selected"';}?> value="Portal">Portal</option>
												<option <?php if(@$item[0]->tCategory == 'Mobile-Application'){echo 'selected="selected"';}?> value="Mobile-Application">Mobile Application</option>
												<option <?php if(@$item[0]->tCategory == 'Custom-Application'){echo 'selected="selected"';}?> value="Custom-Application">Custom Application</option>
											</select>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Select Work Type</label>
										<div class="col-sm-8">
											<select name="tType" id="tType" class="form-control" required>
												<option value="">Choose Work Type</option>
												<option value="UI" <?php if(@$item[0]->tType == 'UI'){echo 'selected="selected"';}?>>UI</option>
												<option value="UX" <?php if(@$item[0]->tType == 'UX'){echo 'selected="selected"';}?>>UX</option>
												<option value="UI-UX" <?php if(@$item[0]->tType == 'UI-UX'){echo 'selected="selected"';}?>>UI/UX</option>
												<option value="Application" <?php if(@$item[0]->tType == 'Application'){echo 'selected="selected"';}?>>Application</option>
											</select>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Title</label>
										<div class="col-sm-8">
											<input type="text" name="tTitle" id="tTitle" class="form-control" value="<?php echo @$item[0]->tTitle;?>" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<textarea name="tDesc" id="tDesc" class="form-control txtcls" required><?php echo @$item[0]->tDesc;?></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Website URL</label>
										<div class="col-sm-8">
											<input type="text" name="tURL" id="tURL" class="form-control" value="<?php echo @$item[0]->tURL;?>" required />
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
											<input type="file" accept="image/*" name="tSImage" id="tSImage" class="form-control" />
											<input type="hidden" name="hiddentSImage" id="hiddentSImage" class="form-control" value="<?php echo @$item[0]->tSImage;?>" />
											<span id="cond" style="color: red;font-size:13px;">*Square Image recommended.</span>
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
											<input type="file" accept="image/*" name="tImage" id="tImage" class="form-control"  />
											<input type="hidden" name="hiddentImage" id="hiddentImage" class="form-control" value="<?php echo @$item[0]->tImage;?>" />
											<span id="cond" style="color: red;font-size:13px;">*Square Image recommended.</span>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
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

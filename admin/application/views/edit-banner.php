<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-8">
		<h2>Add Banner</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Dashboard</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/home/banners">Banners</a>
			</li>
			<li class="active">
				<strong>Edit Banner</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-4 pull-right">
		<h2>
			<a href="<?php echo base_url()?>index.php/home/banners" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
							<form method="POST" action="<?php echo base_url()?>index.php/home/updateBanner" class="form-horizontal" enctype="multipart/form-data">
														
								<div class="form-group">
									<label class="col-sm-4 control-label">Banner Title</label>
									<div class="col-sm-8">
										<input type="text" name="bTitle" id="bTitle" class="form-control" value="<?php echo @$item[0]->bTitle;?>" required />
										<!--<span id="cond" style="color: red;font-size:13px;">*Banner Width and Height should be 2000 X 1000px.</span>-->
									</div>
								</div>
								<div class="hr-line-dashed"></div>	
								<div class="form-group">
									<label class="col-sm-4 control-label">Content</label>
									<div class="col-sm-8">
										<textarea name="bDesc" id="bDesc" class="form-control" required><?php echo @$item[0]->bDesc;?></textarea>
									</div>
								</div>
								<div class="hr-line-dashed"></div>

								<div class="form-group">
									<label class="col-sm-4 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" name="bLocation" id="bLocation" class="form-control" value="<?php echo @$item[0]->bLocation;?>" required />
										<!--<span id="cond" style="color: red;font-size:13px;">*Banner Width and Height should be 2000 X 1000px.</span>-->
									</div>
								</div>
								<div class="hr-line-dashed"></div>								
								<div class="form-group">
									<label class="col-sm-4 control-label">Upload Banner Image</label>
									<div class="col-sm-8">
									<?php
									if(@$item[0]->bImage != '')
									{
									?>
										<img style="width:200px;" src="<?php echo base_url();?>uploads/banners/<?php echo @$item[0]->bImage?>">
									<?php
									}
									?>
									<input type="hidden" name="hiddenbImage" id="hiddenbImage" value="<?php echo @$item[0]->bImage?>" />
										<input type="file" accept="image/*" name="bImage" id="bImage" class="form-control" >
										<!--<span id="cond" style="color: red;font-size:13px;">*Banner Width and Height should be 2000 X 1000px.</span>-->
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

<script type="text/javascript">

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
				if (height < 990 || height > 1010 && width < 1990 || width >  2010){
					alert("width and height should be 2000x1000px");
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

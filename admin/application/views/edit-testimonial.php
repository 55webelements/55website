	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2>Edit Testimonial</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/testimonials">Testimonials</a>
				</li>
				<li class="active">
					<strong>Edit Testimonial</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/testimonials" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
								
								<form method="POST" action="<?php echo base_url()?>index.php/home/updateTestimonial" class="form-horizontal" enctype="multipart/form-data">
													
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Message</label>
										<div class="col-sm-8">
											<textarea name="tTitle" id="tTitle" class="form-control" required><?php echo @$item[0]->tTitle;?></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Image Alt Text</label>
										<div class="col-sm-8">
											<textarea name="altTitle" id="altTitle" class="form-control"><?php echo @$item[0]->altTitle;?></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
								
									<div class="form-group">
										<label class="col-sm-4 control-label">Upload Image</label>
										<div class="col-sm-8">
											<input type="file" accept="image/*" name="tImage" id="tImage" class="form-control" />
											<span id="cond" style="color: red;font-size:13px;">*Square Image recommended.</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<img class="img-responsive" src="<?php echo base_url();?>uploads/files/<?php echo @$item[0]->tImage;?>">
										</div>
									</div>
									<div class="hr-line-dashed"></div>									
									
									<div class="form-group">
										<div class="col-sm-4 col-sm-offset-2">
											<!--<button class="btn btn-white" type="reset">Reset</button>-->
											<input type="hidden" name="rowid" id="rowid" value="<?php echo @$rowid;?>">
											<input type="hidden" name="hiddentImage" id="hiddentImage" value="<?php echo @$item[0]->tImage;?>">
											<button class="btn btn-primary" type="submit">Save</button>
										</div>
									</div>
								</form>
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

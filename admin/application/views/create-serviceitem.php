
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-8">
			<h2><?php echo @ucwords($service[0]->sTitle);?> - Add Item</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Dashboard</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/home/services">Services</a>
				</li>
				<li class="active">
					<strong>Add Service Item</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/viewServiceItems/<?php echo @$serviceid;?>" class="btn btn-w-m btn-default pull-right">Back to List</a>
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
								<form method="POST" action="<?php echo base_url()?>index.php/home/saveServiceItem/<?php echo @$serviceid;?>" class="form-horizontal" enctype="multipart/form-data">																	
									<div class="form-group">
										<label class="col-sm-4 control-label">Service Name</label>
										<div class="col-sm-8">
											<input type="text" name="sTitle" id="sTitle" class="form-control" required />
											<span id="cond" style="color: red;font-size:13px;">*Don't use special charaters, spaces and capital letters.</span>
										</div>
									</div>
									<div class="hr-line-dashed"></div>															
									<div class="form-group">
										<label class="col-sm-4 control-label">Service Description</label>
										<div class="col-sm-8">
											<textarea name="sDesc" id="sDesc" class="form-control" rows="5" required></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>														
									<div class="form-group">
										<label class="col-sm-4 control-label">Service Image</label>
										<div class="col-sm-8">
											<input type="file" name="sImage" id="sImage" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>														
									<div class="form-group">
										<label class="col-sm-4 control-label">Banner Image</label>
										<div class="col-sm-8">
											<input type="file" name="sBanner" id="sBanner" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">SEO Custom URL</label>
										<div class="col-sm-8">
											<input type="text" name="seoCustomURL" id="seoCustomURL" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Meta Title</label>
										<div class="col-sm-8">
											<input type="text" name="metaTitle" id="metaTitle" class="form-control" required />
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Description</label>
										<div class="col-sm-8">
											<textarea name="metaDesc" id="metaDesc" class="form-control" required></textarea>
										</div>
									</div>
									<div class="hr-line-dashed"></div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Key Words</label>
										<div class="col-sm-8">
											<textarea name="metaKeys" id="metaKeys" class="form-control" required></textarea>
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

<script type="text/javascript">
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
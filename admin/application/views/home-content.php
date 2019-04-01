<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-8">
		<h2>Home Page Content</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Dashboard</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/home/banners">Home Page Content</a>
			</li>
			<li class="active">
				<strong>Home Page Content</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content">
			<div class="row">
				<?php
				if(@$this->session->userdata("success") != '')
				{
				?>
					<div class="alert alert-success alert-dismissable">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<?php
						echo @$this->session->userdata("success");
						@$this->session->unset_userdata("success");
						?>
					</div>
				<?php
				}
				if(@$this->session->userdata("fail") != '')
				{
				?>
					<div class="alert alert-danger alert-dismissable">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<?php
						echo @$this->session->userdata("fail");
						@$this->session->unset_userdata("fail");
						?>
					</div>
				<?php
				}
				?>
				<div class="col-lg-7">
					<div class="ibox">
						
						<div class="ibox-content">
							
							<form method="POST" action="<?php echo base_url()?>index.php/home/savehomeContent" class="form-horizontal" enctype="multipart/form-data">
								<?php
								if(@sizeOf($banners) > 0)
								{
								?>
								<div class="row">
									<div class="col-sm-12" style="margin-bottom:2%">
										<a class="btn btn-info pull-right" href="<?php echo base_url();?>index.php/home/deletehomeContent">Delete	</a>
									</div>
								</div>
								<?php
								}
								?>
								<div class="form-group">
									<label class="col-sm-4 control-label">Main Title</label>
									<div class="col-sm-8">
										<input type="text" name="content_title" id="content_title" class="form-control" value="<?php echo @$banners[0]->content_title;?>" required />
									</div>
								</div>
								<div class="hr-line-dashed"></div>	
								
								<div class="form-group">
									<label class="col-sm-4 control-label">Sub Title</label>
									<div class="col-sm-8">
										<input type="text" name="sub_title" id="sub_title" class="form-control" value="<?php echo @$banners[0]->sub_title;?>"/>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<label class="col-sm-4 control-label">Short Description</label>
									<div class="col-sm-8">
										<textarea rows="5" name="short_desc" id="short_desc" class="form-control"><?php echo @$banners[0]->short_desc;?></textarea>
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<!--<button class="btn btn-white" type="reset">Reset</button>-->
										<input type="hidden" name="bannersid" id="bannersid" value="<?php echo @$banners[0]->id;?>">
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
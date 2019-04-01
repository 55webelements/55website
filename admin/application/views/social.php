<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-8">
		<h2>Social Links</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Dashboard</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>index.php/home/social">Social Links</a>
			</li>
			<li class="active">
				<strong>Update Social Links</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox">
						
						<div class="ibox-content">
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
							<form method="POST" action="<?php echo base_url()?>index.php/home/savesocial" class="form-horizontal" enctype="multipart/form-data">
							
								<div class="form-group">
									<label class="col-sm-2 control-label">Facebook</label>
									<div class="col-sm-8">
										<input type="text" name="content_title" id="content_title" class="form-control txtcls" value="<?php echo @$info[0]->content_title;?>" />
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Twitter</label>
									<div class="col-sm-8">
										<input type="text" name="sub_title" id="sub_title" class="form-control txtcls" value="<?php echo @$info[0]->sub_title;?>" >
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Linkedin</label>
									<div class="col-sm-8">
										<input type="text" name="short_desc" id="short_desc" class="form-control" value="<?php echo @$info[0]->short_desc;?>" />
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Google plus</label>
									<div class="col-sm-8">
										<input type="text" name="long_desc" id="long_desc" class="form-control txtcls" value="<?php echo @$info[0]->long_desc;?>" />
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">Youtube</label>
									<div class="col-sm-8">
										<input type="text" name="cms_logo" id="cms_logo" class="form-control txtcls" value="<?php echo @$info[0]->cms_logo;?>" />
									</div>
								</div>
								<div class="hr-line-dashed"></div>
								
								<div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
										<!--<button class="btn btn-white" type="reset">Reset</button>-->
										<input type="hidden" name="bannersid" id="bannersid" value="<?php echo @$info[0]->id;?>">
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
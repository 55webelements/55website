<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>55Web Elements | Dashboard</title>

    <link href="<?php echo base_url()?>externals/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>externals/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url()?>externals/css/plugins/chosen/chosen.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo base_url()?>externals/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>externals/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
	<link href="<?php echo base_url()?>externals/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url()?>externals/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>externals/css/style.css" rel="stylesheet">	
	<script src="<?php echo base_url()?>externals/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>externals/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>externals/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>externals/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>externals/css/jquery.mCustomScrollbar.css">
	<script type="text/javascript">
		var baseurl="<?php echo base_url()?>";
	</script>
</head>


<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
					<li class="nav-header" style="padding:10px;">
                        <div class="dropdown profile-element"> <span>
                            <!--<img alt="image" class="img-circle" src="<?php echo base_url()?>externals/img/profile_small.jpg" />-->
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo @$this->session->userdata("firstname")." ".@$this->session->userdata("lastname");?></strong>
							<?php
							if(@$this->session->userdata("usertype") == "1" )
							{
								$reso="Super Admin";
							}
							elseif(@$this->session->userdata("usertype") == "2")
							{
								$reso="Admin";
							}								
							?>
                             </span> <span class="text-muted text-xs block"><?php echo @$reso;?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url()?>index.php/home/changepassword">Change Password</a></li>
                                <li><a href="<?php echo base_url()?>index.php/home/logout">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                   
				<?php				
				if(@$this->session->userdata("usertype") == "1" || @$this->session->userdata("usertype") == "2")			
				{
				?>	
					<li class="<?php if(@$menu == "hban" || @$menu == "homecontent"|| @$menu == "wework"){echo "active";}?>">
						<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Home Page</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">							
							<li class="<?php if(@$menu == "hban"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/banners"><i class="fa fa-image"></i><span class="nav-label">Banners</span> </a>
							</li>
							<li class="<?php if(@$menu == "homecontent"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/homecontent"><i class="fa fa-file"></i><span class="nav-label">Home Content</span> </a>
							</li>
							<li class="<?php if(@$menu == "wework"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/wework"><i class="fa fa-file"></i><span class="nav-label">How we work?</span> </a>
							</li>
							
						</ul>
					</li>
					<li class="<?php if(@$menu == "pages"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/pages"><i class="fa fa-comments"></i><span class="nav-label">Pages</span> </a>
					</li>
					<li class="<?php if(@$menu == "about" || @$menu == "careers" || @$menu == "contact"){echo "active";}?>">
						<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">CMS</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">							
							<li class="<?php if(@$menu == "about"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/about"><i class="fa fa-file"></i><span class="nav-label">About Us</span> </a>
							</li>
							<li class="<?php if(@$menu == "careers"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/careers"><i class="fa fa-file"></i><span class="nav-label">Careers</span> </a>
							</li>
							<li class="<?php if(@$menu == "contact"){echo "active";}?>">
								<a href="<?php echo base_url()?>index.php/home/contact"><i class="fa fa-info"></i><span class="nav-label">Contact</span> </a>
							</li>
							
						</ul>
					</li>
					<li class="<?php if(@$menu == "work"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/work"><i class="fa fa-database"></i><span class="nav-label">Our Work</span> </a>
					</li>
					<li class="<?php if(@$menu == "services"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/services"><i class="fa fa-cogs"></i><span class="nav-label">Services</span> </a>
					</li>
					<li class="<?php if(@$menu == "testimonials"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/testimonials"><i class="fa fa-comments"></i><span class="nav-label">Testimonials</span> </a>
					</li>
					<li class="<?php if(@$menu == "blog"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/blog"><i class="fa fa-rss"></i><span class="nav-label">Blog</span> </a>
					</li>
					<li class="<?php if(@$menu == "enqAct"){echo "active";}?>">
						<a href="<?php echo base_url()?>index.php/home/enquiries"><i class="fa fa-question-circle"></i><span class="nav-label">Enquiries</span> </a>
					</li>
					
				<?php
				}
				?>
                </ul>
            </div>
        </nav>
		
		

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<span class="m-r-sm text-muted welcome-message">Welcome to 55Web Elements Admin Panel.</span>
						</li>
						<li>
							<a href="<?php echo base_url()?>index.php/home/logout">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>
				</nav>
			</div>
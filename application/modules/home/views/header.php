<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1"><!--<title>
	Website Designing  | Development Company in New York, USA -55web
</title>-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />

<meta name="ROBOTS" content="all, follow, index" />
<meta name="ROBOTS" content="INDEX,FOLLOW" />
<meta name="Author" content="55 WEB ELEMENTS PVT LTD" />

<meta name="description" content="<?php echo @$metatags[0]->metaDesc; ?>" />
<meta name="keywords" content="<?php echo @$metatags[0]->metaKeys; ?>" />
<title><?php echo @$metatags[0]->metaTitle; ?></title>

<link href="<?php echo base_url()?>includes/css/styles.css" rel="stylesheet"/>
<link href="<?php echo base_url()?>includes/css/responsive.css" rel="stylesheet"/>

<link rel="author" href="https://plus.google.com/105522862347500660003/posts" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
<link rel="canonical" href="http://www.55web.co/" />
    <!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen" /><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><link href="http://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet" type="text/css" /><link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
  <![endif]-->
  <style>
.spinner { position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 9999; }
</style>

<!--
<script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-88671011-1', 'auto');
 ga('send', 'pageview');

</script>

<script type='application/ld+json'>
{
"@context": "http://schema.org/",
"@type": "Organization",
"name": "55 Web Web Designing and Development Company",
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "4.8",
"ratingCount": "2500",
"reviewCount": "85"
}
}
</script>

-->
</head>
<body>
    <div class="spinner">
   
    </div>
    <!-- header -->
    <header style="background-color:#000";>
        <div class="container clearfix">
            <div class="row">
                <div class="span12">
                    <div class="navbar navbar_">
                        <div class="container">
                            <a id="homelog" class="brand brand_" href="<?php echo base_url()?>">
                                <img src="<?php echo base_url()?>includes/img/logo-55.png" alt="web designing company in hyderabad" title="website design and web development company" /></a>
                            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
                            <div class="nav-collapse nav-collapse_  collapse">
                                <ul class="nav sf-menu">
									<li class="<?php if(@$menu == 'home'){echo 'active';}?>"> 
                                       <a id="home" href="<?php echo base_url();?>">Home</a>
									</li>
									<li class="<?php if(@$menu == 'work'){echo 'active';}?>"> 
                                       <a id="work" href="<?php echo base_url('web-design-portfolio');?>">Portfolio</a>
									</li>
									<?php
									if(@sizeOf($services) > 0)
									{
										for($p=0;$p<sizeOf($services);$p++)
										{
											if(@$serviceid == @$services[$p]->id)
											{
												$hact='active';
											}
											else
											{
												$hact='';
											}
									?>
									  <li class="<?php echo @$hact;?>"> 
										   <a id="home" href="<?php echo base_url().''.@$services[$p]->seoCustomURL;?>"><?php echo @strtoupper($services[$p]->sTitle);?></a>
										</li>
									<?php
										}
									}
									?>
					                <li class="<?php if(@$menu == 'blogs'){echo 'active';}?>"> 
                                       <a id="blogs" href="<?php echo base_url('blog');?>">Blog</a>
									</li>
					                <li class="<?php if(@$menu == 'about'){echo 'active';}?>"> 
                                       <a id="about" href="<?php echo base_url('professional-web-design');?>">Company</a>
									</li>
									<li class="<?php if(@$menu == 'contact'){echo 'active';}?>"> 
                                       <a id="contact" href="<?php echo base_url('contact-us');?>">Contact</a>
									</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
    </header>
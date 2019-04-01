<?php
$type=3;
?>


<?php include('header.php');?>
<body>
    <div class="spinner"></div>
    <!-- header -->
    <header>
        <div class="container clearfix">
            <div class="row">
                <div class="span12">
                    <div class="navbar navbar_">
                        <div class="container">
                            <a id="homelog" class="brand brand_" href="./">
                                <img src="images/logo-55.png" alt="55 web - web design and web development company" title="55 web - web design and web development company" /></a>
                            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
                            <div class="nav-collapse nav-collapse_  collapse">
                                <ul class="nav sf-menu">
                                    <li>
                                        <a id="home" href="index.php">Home</a></li>
                                    <li>
                                        <a id="portfolio" href="web-design-portfolio.php">Work</a></li>
                                    <li class="active">
                                        <a id="web" href="web-design-development.php">Web</a>
                                    </li>
                                    <li>
                                        <a id="mobile" href="mobile-applications.php">Mobile</a></li>
                                    <li>
                                        <a id="print" href="brochure-design-hyderabad.php">Print</a>
                                    </li>
                                    <!--<li>
                                        <a id="pricing" href="low-cost-web-design">Pricing</a>
                                    </li>-->
                                    <li>
                                        <a id="about" href="professional-web-design.php">About</a>
                                    </li>
                                     <li>
                                    <a id="blog" href="blog.php">Blog</a>
                                    </li>
                                    <li>
                                        <a id="contact" href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 cus-app-dev-bg">
            <div class="row">
             <?php include('connect.php');?>
            	<?php
				$query="select *from 55web_webdesign where web_id=6";
				$result=mysqli_query($conn,$query)or die(mysqli_error());
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_object($result)){
			?>
                <div class="ic"></div>
                <div class="container banner">
                    <!--<img src="images/custom-application-dev.png" alt="custom-web-development">-->
                    <img src="administrator/includes/uploads/banner/<?php echo $row->banner;?>" alt="custom-web-development">
                </div>
            </div>
        </div>
        <div class="row-1">
            <div class="row">
                <div class="ic"></div>
                <div class="container services-exp">
                    <div class="row-fluid internal">
                        <div class="span12">
                            <div class="span9">
                                <h3>Custom Application Development</h3>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                        <p><?php echo $row->short_dec;?>
                                        <!--Does your website do something impressive, or does it just occupy space on the web? Does it attract users and get them to tell everyone they know? Web applications are critical when it comes to setting your website apart from others. It is the defining line between something to read, and taking action. </p>
                                        <p>Don’t sell yourself short. You are sitting on an idea that can knock the socks off your prospects, and we have the tools and resources to make it a reality. Ideas that become reality separate the mediocre from the professionals. 55 Web’ development team is just waiting to try out new ideas. Share your vision, and we will make it happen.--> </p>
                                    </div>
                                    <div class="span5 last">
                                        <img src="administrator/includes/uploads/web/<?php echo $row->image;?>" alt="custom application" class="imgright" />
                                    </div>
                                </div>
                                <?php
				}
				}?>
                            </div>
                            <div class="span3 nav last">
                                <ul class="sidenav">
                                    <h3>Web Development</h3>
                                     <?php include('connect.php');?>
                                    <?php
									$query="select *from 55web_web";
									$result=mysqli_query($conn,$query) or die(mysqli_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){
											if($row->id==1){
												@$urlpath="website-design.php";
												
											}elseif($row->id==2){
												@$urlpath="website-redesign.php";
											}elseif($row->id==3){
												@$urlpath="best-web-design.php";
											}elseif($row->id==4){
												@$urlpath="ecommerce-website-design.php";
											}elseif($row->id==5){
												@$urlpath="custom-web-development.php";
											}elseif($row->id==6){
												@$urlpath="custom-application-development.php";
											}
									
									
									?>
                                   <!-- <li>
                                        <a id="sitedesign" href="website-design.php">Website Design</a></li>
                                    <li>
                                        <a id="redesign" href="website-redesign.php">Website Redesign</a></li>
                                    <li>
                                        <a id="infoweb" href="best-web-design.php">Informational Websites</a></li>
                                    <li>
                                        <a id="ecomweb" href="ecommerce-website-design.php">E-Commerce Websites</a></li>
                                    <li>
                                        <a id="customweb" href="custom-web-development.php">Custom Web Development</a></li>-->
                                    <li class="">
                                        <a id="appdevelop" href="<?php echo @$urlpath;?>"><?php echo $row->title;?></a></li>
                                        <?php
										}
									}
									?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include('footer2.php');?>
    <script src="js/script.js"></script>

    <script type="text/javascript" src="Scripts/jquery.preloader.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function () {
            $x = $(window).width(); if ($x > 1024) { jQuery("#content .row").preloader(); }
            jQuery('.magnifier').touchTouch();
            jQuery('.spinner').animate({ 'opacity': 0 }, 1000, 'easeOutCubic', function () { jQuery(this).css('display', 'none') });
        });
    </script> 
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-32382319-1']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>
</html>


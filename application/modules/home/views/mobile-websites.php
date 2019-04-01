<?php
$type=4;
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
                                    <li>
                                        <a id="web" href="web-design-development.php">Web</a>
                                    </li>
                                    <li class="active">
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
        <div class="row-2 mobile-web-bg">
            <div class="row">
            <?php include('connect.php');?>
                                        <?php
										$query="select *from 55web_windowapp where mobile_id=2";
										$result=mysqli_query($conn,$query) or die($mysqli_error());
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_object($result)){
										
										?>
                <div class="ic"></div>
                <div class="container banner">
                    <img src="administrator/includes/uploads/banner/<?php echo $row->banner;?>" alt="mobile_websites">
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
                                <h3>Mobile App Development</h3>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                        <p><?php echo $row->short_dec;?>
                                        <!--There is no doubt, the whole world is shifting towards mobile movement. Are you still waiting to call off a mobile apps development services? When everybody is going towards the mobile applications, then why not you. Do not translate your business to missed sales just because your website loads slowly.</p>
                                        <p>55 Web has highly skilled analysts, designers and developers who are well versed in building apps for all major platforms. Our team of professionals has the experience, knowledge and tools to make effective mobile website. With an effective mobile website, you can give the best opportunity to view your offering to your customers.--></p>
                                    </div>
                                    <div class="span5 last">
                                        <img src="administrator/includes/uploads/mobile/<?php echo $row->image;?>" class="imgright" />
                                    </div>
                                </div>
                                <?php
				}
			}
								?>
                            </div>
                            <div class="span3 nav last">
                                <ul class="sidenav">
                                    <h3>Mobile Apps</h3>
                                    <li>
                                        <a href="windows-app-development.php">Windows App Development</a></li>
                                    <li class="active">
                                        <a href="mobile-websites.php">Mobile Websites</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include('footer2.php');?>
    <!---->
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
    <script src="js/script.js"></script>

    <script type="text/javascript" src="Scripts/jquery.preloader.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function () {
            $x = $(window).width(); if ($x > 1024) { jQuery("#content .row").preloader(); }
            jQuery('.magnifier').touchTouch();
            jQuery('.spinner').animate({ 'opacity': 0 }, 1000, 'easeOutCubic', function () { jQuery(this).css('display', 'none') });
        });
    </script>
</body>
</html>

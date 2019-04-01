<?php 
$type=1;
include('header.php');?>
<link href="http://55web.in/bundles/style?v=1d_19ThkkbWsty5xxE6tU7jWHnfoi9Ir1vl3xC0zmlM1" rel="stylesheet"/>
<link href="<?php echo base_url()?>includes/css/owl.carousel.css" rel="stylesheet">
<body>
    <div class="spinner">
    </div>
    <!-- header -->
    <header>
        <div class="container clearfix">
            <div class="row">
                <div class="span12">
                    <div class="navbar navbar_">
                        <div class="container">
                            <a id="homelog" class="brand brand_" href="./">
                                <img src="http://55webusa.com/images/logo-55.png" alt="web designing company in hyderabad" title="website design and web development company" /></a>
                            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span></a>
                            <div class="nav-collapse nav-collapse_  collapse">
                                <ul class="nav sf-menu">
                                    <li class="active">
                                        <a id="home" href="index.php">Home</a></li>
                                    <li>
                                        <a id="portfolio" href="web-design-portfolio.php">Work</a></li>
                                    <li>
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
    <div itemscope itemtype="http://schema.org/LocalBusiness" class="bg-content">
        <!-- content -->
        <div class="row-fluid">
        <?php include('connect.php');?>
        <?php
        $r="SELECT * from 55web_home";
								$g=mysqli_query($conn,$r)or die(mysql_error());
								if(mysqli_num_rows($g)>0){
								while($row=mysqli_fetch_object($g))
										{
											?>
            <div class="container-fluid">
            	<div class="row">
                	<img src="administrator/includes/uploads/banner/<?php echo $row->memberimage;?>" class="img-responsive">
                </div>
            </div>
            <?php
										}
										}
										?>
            <div class="quote">
            
            <?php include('connect.php');?>
            <?php
            $r="SELECT * from 55web_home";
			$g=mysqli_query($conn,$r)or die(mysql_error());
			if(mysqli_num_rows($g)>0){
			$row=mysqli_fetch_object($g);
								?>
                                
                <h1>
                <?php echo $row->maintitle;?><br/>
                <?php echo $row->subtitle;?>
                   <!-- 55 WEB ELEMENTS<br />
                    Web Design &amp; Development Services--></h1>
                <h2><?php echo $row->location;?>
                     <!--in Newyork--></h2>
            </div>
        </div>
          
        <div class="row-1 banner-bg">
            <div class="row-fluid">
                <div class="container">
                    <h3 class="blockquote">
                    <?php echo $row->description;?>
                       <!-- We are passionate, established and a professional web design and web development
                        company that builds and delivers successful websites-->
                    </h3>
                      <?php
			}
						?>
                    <div class="down-arrow">
                        <a href="#" title="scroll down">
                            <img src="http://55webusa.com/images/down-arrow.png" alt="web designing company in hyderabad" title="scroll down to learn more about our web design and web development services" /></a>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="row-1">
            <div class="row-fluid">
                <div class="container">
                    <ul class="thumbnails thumbnails-1 comp">
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3>
                                    Why 55web?</h3>
                                <p>
                                  <?php include('connect.php');
								$r="SELECT * from 55web_why";
								$g=mysqli_query($conn,$r)or die(mysql_error());
								if(mysqli_num_rows($g)>0)
										{
										while($row=mysqli_fetch_object($g))
										{
											?>
                               <?php echo $row->description;?><br>
                                    <!--55 Web is a Web Design & Web Development company based in Hyderabad, India. Our
                                    dynamic and professional team allows us to be customer focused and to offer web
                                    design and web development services that are both efficient and inexpensive. You
                                    will be able to make your websites stand out from the rest of the competition in
                                    the industry.-->
                                     
                                </p>
                             
                               
                                
                               <!-- <p>
                                    We assure comprehensive services to match the global standard of excellence, and
                                    cost effective solutions for your company.</p>-->
                                     <?php
										}
										}else{
											echo 'no rows';
										}
										$conn->close();
										?>
                                   
                            </div>
                            
                        </li>
                       
                       
                       <!--<div id="owl-demo4" class="owl-carousel owl4">
        
						<div class="item"><img src="img/product-4-200x170(3).png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-55-200x170(1).png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-55-200x170(1).png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-55-200x170(2).png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-55-200x170.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-55-200x170.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-1.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-2.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-25-200x170.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-1.png" alt="OwlImage"></div>
						<div class="item"><img src="img/product-1.png" alt="OwlImage"></div>
						</div>-->
                       
                       
                       
                        <li class="span3" style ="padding:0px 10px;">
                            <div class="thumbnail thumbnail-1">
                                <h3>
                                    How we work</h3>
                                <section>
                                <?php include('connect.php');?>
                           				 <?php
							 
									$query="SELECT * from 55web_howwork";
									$result=mysqli_query($conn,$query)or die(mysql_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){
									?>
                                
                                
                                    <div id="cbp-qtrotator" class="cbp-qtrotator">
                                    
                                  
                                        <div class="cbp-qtcontent">
                                         
                               
                                        
                                          <div id="owl-demo4" class="owl-carousel owl4">
<!--<img src="administrator/includes/uploads/howwork/<?php// echo $row->image;?>" alt="website design" title="web designing company in hyderabad"/>-->
                                            <img src="http://55webusa.com/images/blog-1.jpg" alt="website design" title="web designing company in hyderabad" />
                                            <img src="http://55webusa.com/images/blog-3.jpg" alt="website design" title="web designing company in hyderabad" />
                                            </div>
                                           
                                            <h4>We listen</h4>
                                            <blockquote>
                                                <p>We take the time to fully understand your business and objectives.</p>
                                            </blockquote>
                                        </div>
                                        
                                        <!--<div class="cbp-qtcontent">
                                            <img src="http://55webusa.com/images/blog-2.jpg" alt="website design" title="web designing company in hyderabad" />
                                            <h4>Advise</h4>
                                            <blockquote>
                                                <p>Add value with our knowledge and experience</p>
                                            </blockquote>
                                        </div>-->
                                        <!--<div class="cbp-qtcontent">
                                            <img src="http://55webusa.com/images/blog-3.jpg" alt="website design" title="web designing company in hyderabad" />
                                            <h4>Turn ideas into reality</h4>
                                            <blockquote>
                                                <p>
                                                    We will build the website to the latest web standards, and semantically code the site to be search engine friendly
                                                </p>
                                            </blockquote>
                                        </div>-->
										
                                          </div>
                                          
                                </section>
                                <?php
										}
									}
									?>
                            </div>
                        </li>
                       
                       
                       
                       
                       
                       
                       
                       
                        
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3>
                                    How can we help?</h3>
                                <section>
                                    <ul>
                                    <?php include('connect.php');?>
                           				 <?php
							 
									$query="SELECT * from 55web_howcanwe";
									$result=mysqli_query($conn,$query)or die(mysql_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){
									?>
                                       
                                       
                                       <li><?php echo $row->description;?></li> 
                                       <!-- <li>Making your company look professional and established, while extending your brand.</li>
                                        <li>Increase sales of your online store?</li>
                                        <li>Helping you find and connect with new clients</li>
                                        <li>Discover new opportunities for business through the internet?</li>
                                        <li>Redesign your website?</li>
                                        <li>Increase hits to your site?</li>
                                        <li>Giving new contacts an easy way to learn more about you.</li>-->
                                    </ul>
                                     <?php
										}
									}
									?>
                                    
                                </section>
                            </div>
                        </li>
                          
                        <li class="span3 testimonials">
                        
                            <h3 class="title-1 extra">
                                &nbsp;&nbsp;Testimonials</h3>
                            <div id="slides">
                            
                             <?php include('connect.php');?>
                           				 <?php
							 
									$query="SELECT * from 55web_testimonials";
									$result=mysqli_query($conn,$query)or die(mysql_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){
									?>
                                    
                                <div class="thumbnail thumbnail-1">
                                    <img src="administrator/includes/uploads/testimonials/<?php echo $row->memberimage;?>" alt="website design pepboyz" title="web designing company in hyderabad" />
                                    <hr />
                                    <section>
                                        <div class="testimonial quote-text">
                                            <blockquote><!--Team 55Web has done an excellent job for me. They delivered my website that was way beyond my expectations.--><?php echo $row->description;?>
                                            </blockquote>
                                        </div>
                                    </section>
                                </div>
                                
                                <?php
									}
									}
								?>
                                
                                <!--<div class="thumbnail thumbnail-1">
                                    <img src="http://55webusa.com/images/ananly-testimonial.gif" alt="website design ananya" title="web designing company in hyderabad" />
                                    <hr />
                                    <section>
                                        <div class="testimonial quote-text">
                                            <blockquote>We found 55Web to be very professional, efficient & designed an effective web site for us.</blockquote>
                                        </div>
                                    </section>
                                </div>-->
                            </div>
                        </li>
                    </ul>
                 
                </div>
            </div>
        </div>
        
        
        <div class="row-1">
            <div class="row-fluid">
                <div class="container">
                    <ul class="thumbnails thumbnails-1">
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3 class="latest">
                                    Latest Web Design Projects</h3>
                                <p>
                                    Few of our latest web design and web development projects completed is shown here.</p>
                            </div>
                        </li>
                        <li class="span3">
                            <a href="web-design-portfolio.php">
                            <div class="thumbnail thumbnail-1">
                                <img src="http://55webusa.com/images/works/sqy-large.jpg" alt="website design portfolio" title="Website design portfolio" />
                                <section>
                                    <h3>Sqy!</h3>
                                </section>
                            </div>
                            </a></li>
                        <li class="span3">
                            <a href="web-design-portfolio.php">
                            <div class="thumbnail thumbnail-1">
                                <img src="http://55webusa.com/images/works/vstar-large.jpg" alt="website design portfolio" title="Website design portfolio" />
                                <section>
                                    <h3>V star</h3>
                                </section>
                            </div>
                            </a></li>
                        <li class="span3">
                            <a href="web-design-portfolio.php">
                            <div class="thumbnail thumbnail-1">
                                <img src="images/works/nikishop-large.jpg" alt="responsive web website design portfolio" title="Website design portfolio" />
                                <!--<img src="administrator/includes/uploads/work/<?php echo $row->projectimage; ?>" class="img-responsive">-->
                                <section>
                                    <h3>Nikishop</h3>
                                </section>
                            </div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
      <?php include('footer.php');?>
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
    
   
 <script src="http://55web.in/bundles/Web55Js?v=emmeFW_ofmIhaTBXbkYJY6Y-v9ukzeTUOBwhi3tz4TY1"></script>
    <script type="text/javascript" src="js/jquery.preloader.js"></script>
    <script type="text/javascript" src="js/jquery.cbpQTRotator.js"></script>
    <script type="text/javascript" src="js/jquery.slides.js"></script>
    <script type="text/javascript">
        jQuery(window).load(function () {
            $x = $(window).width(); if ($x > 1024) { jQuery("#content .row").preloader(); }
            jQuery('.magnifier').touchTouch(); jQuery('.spinner').animate({ 'opacity': 0 }, 1000, 'easeOutCubic', function () { jQuery(this).css('display', 'none') });
        });
    </script>
    <script type="text/javascript">
        $(function () { $('#cbp-qtrotator').cbpQTRotator(); });
        $(document).ready(function () { $('#slides').slidesjs({ width: 270, height: 380 }); });
    </script>
    
    
    
    <script type="text/javascript">
       //var $ = win
    </script>
    
    <!---changes of script-->
    <script src="js/owl.carousel.js" type="text/javascript"></script>
    
	<script>
    $(document).ready(function() {
      $("#owl-demo4").owlCarousel({
        autoPlay: 2000,
        items :1,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>
	
	
	
	
	
</body>
</html>

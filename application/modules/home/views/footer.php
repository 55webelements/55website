<div class="row-fluid" style="background-color:#000">
            <div class="container">
                <div class="page-margins cust-page">
                    <div id="getintouch">
                        <h4 class="getin">
                            Get in touch</h4>
                        <p style="margin-bottom:0px;" class="plzcont">
                            Please contact us with ideas, thoughts, questions or anything else by email <a href="mailto:<?php echo @$contact[0]->cEmail;?>">
                                <?php echo @$contact[0]->cEmail;?></a>
                        </p>
						<style>
						ul.list-style{    float:left;width:80%;margin-top: -22px; margin-left: 55px;}
						ul.list-style li {
							font-size: 16px;
						}
						ul.list-style li {
							list-style: none;
							float: left;
							padding: 0 5px;
							color: #676767;
							font-size: 16px;
							font-family: OPENSANS-REGULAR;
						}
						ul.list-style a {
							color: #BCBCBC;
							text-decoration: none;
							font-size: 12px;
							margin-right:10px;
							font-family:'Open Sans', sans-serif;
						}
						</style>
						<!--<div style="float:left;width:100%;margin-top:10px;">
							<span style="float:left;width:20%;font-size:18px;font-weight:bold;margin:0;color:#df0000;">India : </span>
							<ul class="list-style">
								<li><a href="http://55web.in/web-designing-in-delhi.html">New Delhi</a><img src="http://www.55web.in/img/divid line.png"></li>
								<li><a href="http://55web.in/web-designing-in-mumbai.html">Mumbai</a><img src="http://www.55web.in/img/divid line.png"></li>
								<li><a href="http://55web.in/web-designing-in-banglore.html">Banglore</a><img src="img/divid line.png"></li>
								<li><a href="http://55web.in/web-designing-in-chennai.html">Chennai</a><img src="http://www.55web.in/img/divid line.png"></li>
								<li><a href="http://55web.in/web-designing-in-kolkata.html">Kolkata</a><img src="http://www.55web.in/img/divid line.png"></li>
								<li><a href="http://55web.in/">Hyderabad</a><img src="http://www.55web.in/img/divid line.png"></li>
								<li><a href="http://55web.in/web-designing-in-amaravathi.html">Amaravathi</a></li>
							</ul>
						</div>-->
                    </div>
                  
                    <div>
                        <h4 class="getin">
                            Careers</h4>
                        <p class="plzcont">
                           <?php echo @$careers[0]->cDesc;?>
                        </p>
                    </div>
                    <h4 class="getin">
                        Useful links</h4>
                    <div class="subcolumns">
                        <div class="footer-links span6">
                            <ul>
							<?php 
							if(@sizeOf($aservices) > 0)
							{
								for($a=0;$a<sizeOf($aservices);$a++)
								{
							?>
								<li class="span6">
                                    <a href="<?php echo base_url(); ?><?php echo @$aservices[$a]->seoCustomURL;?>"><?php echo @ucwords($aservices[$a]->sTitle);?></a>
								</li>
							<?php
								}
							}
							?>
                                
                                
                            </ul>
                        </div>
                       
                        <div class="footer-links span3">
                            <ul>
                               <li class=""> 
								   <a id="work" href="<?php echo base_url('web-design-portfolio');?>">PORTFOLIO</a>
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
								  <li class=""> 
									   <a id="home" href="<?php echo base_url().''.@$services[$p]->seoCustomURL;?>"><?php echo @strtoupper($services[$p]->sTitle);?></a>
									</li>
								<?php
									}
								}
								?>
								<li class=""> 
								   <a id="blogs" href="<?php echo base_url('blog');?>">BLOG</a>
								</li>
								<li class=""> 
								   <a id="about" href="<?php echo base_url('professional-web-design');?>">COMPANY</a>
								</li>
								<li class=""> 
								   <a id="contact" href="<?php echo base_url('contact-us');?>">CONTACT</a>
								</li>
                            </ul>
                        </div>
                        <div class="footer-links span3">
                            <!--<p>
                                <span itemprop="name">55 Web Elements Pvt Ltd.</span><br />
                                <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span
                                    itemprop="streetAddress">Flat No 302,The Gateway, 
                                    <br />
                                   Sri Swamy Ayyappa Society</span> <span itemprop="addressLocality"> Madhapur,Hyderabad </span>,<br />
                                    <span itemprop="addressRegion">Telangana</span>, <span itemprop="addressCountry">
                                        India- 500081</span></span><br />
                                Phone: <span itemprop="telephone">+914040268570</span><br />
                                Mail:<a href="mailto:information@55web.in">
                                    <meta itemprop="email" content="information@55web.in">
                                    info@55web.in</a>
                            </p>-->
							<?php echo @$contact[0]->cAddress;?>
							Phone: <span itemprop="telephone"><?php echo @$contact[0]->cContact;?></span><br />
                                Mail:<a href="mailto:<?php echo @$contact[0]->cEmail;?>">
                                    <meta itemprop="email" content="<?php echo @$contact[0]->cEmail;?>">
                                    <?php echo @$contact[0]->cEmail;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <meta itemprop="url" content="http://www.55web.in" />
    </div>
    <!-- footer -->
    
<footer>
        <div class="container clearfix">
            <ul class="list-social pull-right">
                <li><a href="" rel="publisher" class="icon-1" style="margin:10px 25px  0px 0px" >Google+</a></li>
                <!--<li><a class="icon-2" href="#"></a></li>
                <li><a class="icon-3" href="#"></a></li>
                <li><a class="icon-4" href="#"></a></li>-->
            </ul>
            <div class="privacy pull-left">&copy; <?php echo @date("Y");?> | <a href="http://www.55web.in">55web.in</a></div>
			
        </div>
    </footer>

    <script src="<?php echo base_url()?>includes/js/script.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>includes/js/scripts/jquery.preloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>includes/js/scripts/jquery.cbpqtrotator.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>includes/js/scripts/jquery.slides.js"></script>
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
      // var $ = win
    </script>
	    
  
</body>
</html>

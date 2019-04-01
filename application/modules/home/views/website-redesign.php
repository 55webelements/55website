

<body>
    <div class="spinner"></div>
    <!-- header -->
   
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 redesign-bg">
            <div class="row">
             <?php include('connect.php');?>
            	<?php
				$query="select *from 55web_webdesign where web_id=2";
				$result=mysqli_query($conn,$query)or die(mysqli_error());
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_object($result)){
			?>
                <div class="ic"></div>
                <div class="container banner">
                    <!--<img src="images/redesign.png" alt="website-redesign" />-->
                    
                    <img src="administrator/includes/uploads/banner/<?php echo $row->banner;?>" alt="website-redesign"/>
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
                                <h3>Website Redesign</h3>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                        <p><?php echo $row->short_dec;?>
                                         </p>
                        
                                    </div>
                                    <div class="span5 last">
                                        <img src="administrator/includes/uploads/web/<?php echo $row->image;?>" alt="website-redesign" class="imgright" />
                                    </div>
                                </div>
                                                 <?php
													}
													}
													?>
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
                                   <!--<li>
                                        <a id="sitedesign" href="website-design.php">Website Design</a></li>-->
                                    <li class="">
                                        <a id="redesign" href="<?php echo @$urlpath;?>"><?php echo $row->title;?></a></li>
                                    <!-- <li>
                                        <a id="infoweb" href="best-web-design.php">Informational Websites</a></li>
                                    <li>
                                        <a id="ecomweb" href="ecommerce-website-design.php">E-Commerce Websites</a></li>
                                    <li>
                                        <a id="customweb" href="custom-web-development.php">Custom Web Development</a></li>
                                    <li>
                                        <a id="appdevelop" href="custom-application-development.php">Custom Application Development</a></li>-->
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

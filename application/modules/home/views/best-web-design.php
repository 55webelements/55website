

<body>
    <div class="spinner"></div>
    <!-- header -->
  
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 info-web-bg">
            <div class="row">
            <?php include('connect.php');?>
            	<?php
				$query="select *from 55web_webdesign where web_id=3";
				$result=mysqli_query($conn,$query)or die(mysqli_error());
				if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_object($result)){
			?>
                <div class="ic"></div>
                <div class="container">
                   <div class="row banner">
						<!--<img src="images/informational-websites.png" alt="informational-websites" />-->
                        <img src="administrator/includes/uploads/banner/<?php echo $row->banner;?>" alt="informational-websites"/>
				   </div>
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
                                <h3>Informational Websites</h3>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                        <p><?php echo $row->short_dec;?>
                                        <!--Knowledge is a power to do evil or power to do good. But you need information to gain the knowledge. 55 Web designs, develops and delivers the best informational websites to clients based on their requirement. We make the world know about their business, events and organizations through different practices. </p>
                                        <p>In this Google age, your website is always your first impression and you always need to keep on with the new trends to win new customers. You should also make the visitors have the best experience that they will never ever forget. </p>
										<p>55 Web keeps track of what users are looking for and what keeps them glued to a page. We use latest technology and has knowledge to create an amazing informational or custom designed website for our client's business.--></p>
              
                                    </div>
                                    <div class="span5 last">
                                        <img src="administrator/includes/uploads/web/<?php echo $row->image;?>" alt="informational-website" class="imgright" />
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
                                        <a id="sitedesign" href="website-design.php">Website Design</a></li>
                                    <li>
                                        <a id="redesign" href="website-redesign.php">Website Redesign</a></li>-->
                                    <li class="">
                                        <a id="infoweb" href="<?php echo @$urlpath;?> "><?php echo $row->title;?></a></li>
                                   <!-- <li>
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
       
</body>
</html>

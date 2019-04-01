
    <div class="bg-content">
        <!-- content -->
        <div class="row-2">
            <div id="content" class="row">
                <div class="ic"></div>
                <div class="container">
                    <div class="row-fluid work mobile_app">
                        <ul class="block">
                            <div class="span12">
                           <?php // include('connect.php');?>
                                <?php
                                /*$query="SELECT * from 55web_mobile";
								$result=mysqli_query($conn,$query)or die(mysql_error());
								if(mysqli_num_rows($result)>0){
									while($row=mysqli_fetch_object($result)){
										if($row->id==1){
											$urlpath="windows-app-development.php";
										}elseif($row->id==2){
											$urlpath="mobile-websites.php";
										}else{
										}*/
										
										if(@sizeof($mobile)>0){
											for($i=0;$i<sizeof($mobile);$i++){
												
												$urlpath="home/mobile/".@str_replace(" ","-",strtolower($mobile[$i]->title));
										
								?>
                            
                                <li class="custom-web-development span4">
                        <a id="cwd" class="image" href="<?php echo base_url(); ?>index.php/<?php echo @$urlpath; ?>/<?php echo @str_replace("=","_",base64_encode($mobile[$i]->id)); ?>">
                                   
                               <img src="<?php echo base_url();?>administrator/includes/uploads/mobile/<?php echo $mobile[$i]->memberimage;?>" class="img-responsive"  />
                                    </a>
                                    <h3>
                                        <a id="cwd1" href="<?php // echo @$urlpath;?>"><!--Mobile Application Development-->
                                        <?php echo $mobile[$i]->title;?>
                                        </a></h3>
                                    <p><!--Take mobile phone app to grande level by creating awesome web apps.-->
                                    <?php echo $mobile[$i]->description;?>
                                    
                                     </p>
           <a id="cwd2" class="btn btn-1" href="<?php echo base_url(); ?>index.php/<?php echo @$urlpath; ?>/<?php echo @str_replace("=","_",base64_encode($mobile[$i]->id)); ?>">read more</a>
                                </li>
                                <!--<li class="custom-application-development span4">
                                    <a id="mws" class="image" href="mobile-websites.php">
                                    <img src="images/Mobile-Websites.png" alt="mobile web sites" /></a>
                                    <h3>
                                        <a id="mws1" href="mobile-websites.php">Mobile Websites</a></h3>
                                    <p>When mobile browsing is about to excel normal browsers, why not go with the mobile? </p>
                                    <a id="mws2" class="btn btn-1" href="mobile-websites.php">read more</a>
                                </li>-->
                                <?php
									}
								}
								?>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
    
</body>
</html>



<body>
    <div class="spinner"></div>
    <!-- header -->
    
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 windows-app-bg">
            <div class="row">
                <div class="ic"></div>
                
                                        <?php
										
											if(@sizeof($windowapp)>0){
												for($i=0;$i<sizeof($windowapp);$i++){
										
										?>
                <div class="container banner">
                    <img src="<?php echo base_url();?>administrator/includes/uploads/banner/<?php echo $windowapp[$i]->banner;?>" alt="window-app-development">
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
                                <h3><?php echo @ucwords($pagetitle); ?></h3>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                    
                                        <!--<h5>Windows Mobile App Development</h5>-->
                                        <?php echo $windowapp[$i]->short_dec;?>
                                        <p><!--Microsoft in the recent years has positioned its OS as the golden mean between the openness of Android and closeness of IOS. Great Windows Mobile Application require well experienced team. At 55 Web, we have experienced blend of interface designers and software developers who can develop engaging applications and help you connect with your end users. Windows Mobile Phone Development Process.</p>
                                        <!--<h5>Windows Mobile App Development Process</h5>-->
                                        <!--<p><!--Is it time to develop your Windows Phone App! Is finding a top notch Windows phone app developer a challenging task! Well, we are there for you. Tell your ideas to our team, 55 web engineers will put your ideas into action. We also map out various wire-frames and functionalities in one smart application. Our windows mobile application development service encompass the following process.</p>-->
										<!--<ul class="fiveusa">
											<li>Ideation</li>
											<li>Case building</li>
											<li>Process mapping</li>
											<li>Integrating windows phone</li>
											<li>Building user interface</li>
											<li>Writing a robust code</li>
											<li>Quality Verification</li>
										</ul>-->
                                        <!--<h5>Submitting your Windows App to the Windows Marketplace</h5>-->
                                        <!--<p>Once we complete your Windows mobile app, it is thoroughly tested. Our 55 web project manager will help you with the submission of your app to the Windows Mobile Marketplace. Contact Us today and tell us your idea.</p>-->
                                       <!-- <p>Tell us your app idea. <a href="contact.php">Contact us</a> today.</p>-->
                                    </div>
                                    <div class="span5 last">
                                        <img src="<?php echo base_url()?>administrator/includes/uploads/mobile/<?php echo $windowapp[$i]->image;?>" alt="windows app devlopment" class="imgright" />
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
							 <?php
							 
							 if(@sizeof($mobile)>0){
								 for($i=0;$i<sizeof($mobile);$i++){		
												$urlpath="home/mobile/".@str_replace(" ","-",strtolower($mobile[$i]->title));
			if(@$mobileid == $mobile[$i]->id){
			$clsname = "active";
			}else{
			$clsname = "";
			}																
												?>
                                
                               
                               
                                    <li class="<?php echo @$clsname; ?>">
                            <a id="design" href="<?php echo base_url(); ?>index.php/<?php echo @$urlpath; ?>/<?php echo @str_replace("=","_",base64_encode($mobile[$i]->id)); ?>"><?php echo @$mobile[$i]->title ; ?></a></li>
							
                                    
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
   
    
</body>
</html>


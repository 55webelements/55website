    <div class="bg-content">
        <!-- content -->
        <div class="row-2 print-bg">
            <div class="row">
                <div class="ic"></div>
                <div class="container banner">
                 <?php // include('connect.php');?>
                            <?php
							 if(@sizeof($pribanner)>0){
								 for($i=0;$i<sizeof($pribanner);$i++){
									/*$query="SELECT * from 55web_pribanner";
									$result=mysqli_query($conn,$query)or die(mysql_error());
									if(mysqli_num_rows($result)>0){
										$row=mysqli_fetch_object($result)*/
									?>
                    <!--<img src="images/prin.png" alt="print" />-->
                   <img src="<?php echo base_url();?>administrator/includes/uploads/banner/<?php echo @$pribanner[$i]->banner;?>" class="img-responsive" alt="print"/>
                    <?php
					}
					}
				?>
                
                
                
                    <!--<img src="images/print.png" alt="print" />-->
                </div>
            </div>
        </div>
        <div class="row-1">
            <div class="row">
                <div class="ic"></div>
                <div class="container services-exp">
                    <div class="row-fluid internal">
                        <div class="span12">
                            <div class="row-fluid img-cont">
                                <div class="span4">
                                    <h3>Print Design</h3>
                                     <?php //include('connect.php');?>
                                    <?php
									/*$query="select *from 55web_pridesign";
									$result=mysqli_query($conn,$query)or die(mysqli_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){*/
										if(@sizeof($pridesign)>0){
											for($i=0;$i<sizeof($pridesign);$i++){
									?>
                                    
                                   <p> <?php echo $pridesign[$i]->description;?>
                                    <!--Do you have a large volume of printing job that has to be done ASAP? Yes, you need to choose a company that can handle your project of any size and specification. 55 Web is that company, that has a talented team of designers who can work with you to ensure that your printing project is a successful one. We offer a complete range of print design services from black & white to full color printing. Our print design solutions include Brochures, catalogs and fliers.</p>
									<p>
									Contact us today for print design solutions that will work best for your organization-->.</p>
									
                                </div>
                                <div class="span4">
                                <img src="<?php echo base_url();?>administrator/includes/uploads/print/<?php echo $pridesign[$i]->memberimage;?>" alt="print" class="imgright" style="margin-top: 40px;" />
                                    <!--<img src="images/print.jpg" alt="print" class="imgright" style="margin-top: 40px;" />-->
                                     <?php
										}
										}
									?>
                                </div>
                                <div class="span4 last">
                                    <h3>Brand Identity</h3>
                                   <?php //include('connect.php');?>
                                    <?php
									if(@sizeof($brand)>0){
										for($i=0;$i<sizeof($brand);$i++){
									/*$query="select *from 55web_brand";
									$result=mysqli_query($conn,$query)or die(mysqli_error());
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_object($result)){*/
									?>
                                    <p><?php echo $brand[$i]->description;?>
                                    <!--Designing a logo is not the only element of brand identity. There is much more that comes under brand identity. A brand is a promise and a unique combination of logo, words, typefaces, colors, personality, price, customer service, voice & many more. A strong brand identity delivers a clear, credible and memorable message to your customer. </p>
									<p>55 Web follows a true methodology to create a successful corporate brands. We are very skilled at weaving the brand stories that helps to raise the bar of performance index. We have enough expertise to connect with you and implant a clear perception, credibility and loyalty to your business.--></p>
                                    <?php
										}
									}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    <!-- -->
   
</body>
</html>


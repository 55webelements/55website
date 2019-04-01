<?php
$data=@json_decode($rec);
$whoweare=$data->whoweare;
$whatwedo=$data->whatwedo;
$process=$data->process;
?>
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 banner-bg">
     
            <div class="row-fluid about">
                <div class="ic"></div>
                <div class="container">
                    <div class="row-fluid internal">
                        <div class="span12">
                            <div class="span6">
                                <h3>Who we are</h3>
                                <?php
								if(@sizeOf($whoweare) > 0)
								{
									for($w=0;$w<sizeOf($whoweare);$w++)
									{
										echo @$whoweare[$w]->aDesc;
									}
								}
								
								?>
                              
                            </div>
                            	
                            <div class="span6 last">
                                <h3>What we do</h3>
                                <?php
								if(@sizeOf($whatwedo) > 0)
								{
									for($w1=0;$w1<sizeOf($whatwedo);$w1++)
									{
										echo @$whatwedo[$w1]->aDesc;
									}
								}
								
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-1">
            <div class="row">
                <div class="ic"></div>
                <div class="container services-exp">
                    <div class="row-fluid internal">
                   
                        <h2>Our Process</h2>
					
                        <ul class="approach">
                        <?php
								if(@sizeOf($process) > 0)
								{
									for($p=0;$p<sizeOf($process);$p++)
									{
									?>

									<li class="left">
										<div class="item-inner">
											<span class="decimal"><?php echo @($p+1);?></span>
											<img src="<?php echo base_url();?>admin/uploads/files/<?php echo @$process[$p]->aIcon;?>" class="img-responsive icon ">


											<div class="content">
												<h3><!--Research-->
													<?php echo @$process[$p]->aTitle;?>
												</h3>

												<p><?php echo @$process[$p]->aDesc;?>
												</p>
											</div>
										</div>
									</li>

									<?php								
									}
								}
								
								?>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
       
    
  
</body>
</html>

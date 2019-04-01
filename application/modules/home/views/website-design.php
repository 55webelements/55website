<?php
$data=@json_decode($rec);
$contents=$data->contents;
$allitems=$data->allitems;
?>
    <div class="spinner"></div>
    
    <div class="bg-content">
        <!-- content -->
        <div class="row-2 web-design-bg">
            <div class="row">
           
                <div class="ic"></div>
				<div class="container banner">
                   <img src="<?php echo base_url();?>admin/uploads/services/<?php echo @$serviceitem[0]->sBanner;?>" alt="website-design"/>
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
                                <h3><?php echo @ucwords($serviceitem[0]->sTitle); ?></h3>
							<?php
							if(@sizeOf($contents) > 0)
							{
								for($c=0;$c<sizeOf($contents);$c++)
								{
							?>
                                <div class="row-fluid img-cont">
                                    <div class="span6">
                                        <?php echo @$contents[$c]->sDesc;?>
                                    </div>
                                    <div class="span5 last">
										<img src="<?php echo base_url('admin/uploads/services/'.@$contents[$c]->sImage);?>" alt="<?php echo @$contents[$c]->sTitle;?>" class="imgright" />
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
                                      <?php
							 
									if(@sizeof($allitems)>0)
									{
										for($i=0;$i<sizeof($allitems);$i++)
										{		
											
											if(@$itemid== $allitems[$i]->id)
											{
												$clsname = "active";
											}else{
												$clsname = "";
											}												
									?>
                                    
										<li class="<?php echo @$clsname; ?>">
											<a id="design" href="<?php echo base_url().''.@$allitems[$i]->seoCustomURL; ?>"><?php echo @$allitems[$i]->sTitle ; ?></a>
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
            </div>
        </div>
      
  
</body>
</html>

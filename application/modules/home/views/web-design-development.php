<?php
$data=@json_decode($rec);
$serviceitems=$data->serviceitems;
?>
    <div class="bg-content">
        <!-- content -->
        <div class="row-2">
            <div id="content" class="row">
                <div class="ic"></div>
                <div class="container">
                    <div class="row-fluid work web_dev">
                        <ul class="block">
                            <div class="span12">
                            
                            <?php
							 
							 if(@sizeof($serviceitems)>0)
							 {
								 for($i=0;$i<sizeof($serviceitems);$i++)
								 {
								     if($i % 3 == 0)
								     {
								         echo '</div></ul><ul class="block"><div class="span12">';
								     }
								?>
                                <li class="<?php echo @$serviceitems[$i]->seoCustomURL; ?> span4">
									<a id="wd" class="image" href="<?php echo base_url().''.@$serviceitems[$i]->seoCustomURL; ?>">
										<img src="<?php echo base_url('admin/uploads/services/'.$serviceitems[$i]->sImage);?>" class="img-responsive" onClick="getData<?php //echo $row->id; ?>" style="curspr:pointer"   />
									</a>
                                    <h3>
										<a id="sitedesign" href="<?php //echo @$urlpath; ?>" class="atags"><!--Website Design--><?php echo @$serviceitems[$i]->sTitle;?></a>
                                    </h3>
                                    <p class="webe" ><!-- your website.--><?php echo @$serviceitems[$i]->sDesc;?></p>
                                    <a class="btn btn-1 atags1" href="<?php echo base_url().''.@$serviceitems[$i]->seoCustomURL; ?>">read more</a>
                                </li>
                                <?php
									}
									}	?>
								
								
                               
                            </div>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      
    <!---->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	
	<script type="text/javascript">
	function getData(oVal){
	
	$.ajax({
		type:"POST",
		url:"website-redesign.php?id="+oVal,
		async:false,
		success:function(resp){  
		alert(resp);
			
		}
	});
	}
	



 

</script>

   
	
	
	
    



</body>
</html>

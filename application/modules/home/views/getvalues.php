

<style>
           .g{
			   margin:0px;
			   padding:0px;
		   }
		   .txt {
                    font-size:13px!important;
                    color: #828282!important;
                   text-align:justify;
          			font-family: 'opensans-semibold' !important;
                }    
				
			

.nor{font-size:medium;}
.cr{color:#000;}
				
				
		.ram{
			
			margin:-190px 0px 0px 0px;
			
			}
			
			.ra{
				
			padding:0px 0px 0px 45px;
				
			}
				
                </style>

							<div class="container">
							<div class="row ra">
                            <?php
							if(@sizeof($blogs)>0){
								for($i=0;$i<sizeof($blogs);$i++){
							?>

                                        <section style="width:85%" >
											<h3 class="cr"><?php  echo $blogs[$i]->blog_title;?></h3>
											<p class="txt"><?php echo $blogs[$i]->blog_desc;?></p>
                                            <span style="font-weight:bold;font-family:'opensans-semibold';">creaded on&nbsp;:&nbsp;<?php echo @date('Y-m-d', strtotime($blogs[$i]->created_date));?></span>
                                            </section>
                                         	
                               <section class="pull-right ram">
                                		
                              			<img src="<?php echo base_url();?>administrator/includes/uploads/blog/<?php echo $blogs[$i]->blog_image; ?>" style="margin-top:40px";class="img-responsive " >
                               			</section>
                                        <hr />
                              

                    <?php
								}
							}
							?>
                    
				
                
                	</div> 
                        
                        </div>
			
				
               
		
      
      
					
                 
                 
                 


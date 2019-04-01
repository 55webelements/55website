

<link href="<?php echo base_url();?>includes/css2/main.css" rel="stylesheet">
<link href="<?php echo base_url();?>includes/css/styles.css" rel="stylesheet">



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

    <div class="spinner"></div>
    <!-- header -->
    
   <div class="container-fluid g">
		<div class="row g">
			<div class="digital">
            
             <?php // include('connect.php');
			 					/*$r="SELECT * from 55web_blogbanner";
								$g=mysqli_query($conn,$r)or die(mysql_error());
								if(mysqli_num_rows($g)>0)
										{
										while($row=mysqli_fetch_object($g))
										{*/
										if(@sizeof($blogbanner)>0){
											for($i=0;$i<sizeof($blogbanner);$i++){
												
											?>
			 <img src="<?php echo base_url();?>administrator/includes/uploads/banner/<?php echo $blogbanner[$i]->blogbanner; ?>" class="img-responsive">
             <?php
                                }
                                }
                               
							?>
				
                
                
			</div>
		</div>
        </div>
			
		<div class="row" style="margin-top:60px;">
			<div class="container">
				<div class="col-sm-12 col-xs-12">
					<div class="col-xs-12">
						<h1>Blog
							<span class="pull-right" style="font-size:22px;"><a href="<?php echo base_url('blog');?>">Back to list</a></span>
						</h1>
					</div>
				</div>
                
                
                
                
				<div class="row ra">
					
                    <?php 
						if(@sizeof($blog)>0)
						{
							for($i=0;$i<sizeof($blog);$i++)
							{
							?>
                            
                                	
						   <div class="span12" style="text-align:center;">
									
								<img src="<?php echo base_url();?>admin/uploads/files/<?php echo @$blog[$i]->bImage; ?>" style="margin-top:40px;"; class="img-responsive" >
							</div>
							<div class="span12">
								<h3 class="cr"><?php  echo @$blog[$i]->bTitle;?></h3>
								<p class="txt"><?php echo @$blog[$i]->bDesc;?></p>
								<span style="font-weight:bold;font-family:'opensans-semibold';">creaded on&nbsp;:&nbsp;<?php echo @date('Y-m-d', strtotime(@$blog[$i]->createDate));?></span>
							</div>
                                    
							<hr>
					  
					   <?php
							}
						}
						?>
                	</div>
				</div>
			
				
                
				<div class="row" id="vijay">
					<div class="view-older">
						<!--<h4 class="nor" ><a style="cursor:pointer;"  onclick="loadDoc()" >View older articles</a></h4>-->
					</div>
				</div>
                <div id="totalBlog">
                </div>
                  </div>
		
     
      
    
    
  <script>
function loadDoc(){
	var baseurl = "<?php echo base_url() ?>index.php/home/blogInfo";
	//alert(baseurl);
			$.ajax({
		   type:'POST',
		   url:baseurl,
		   async:false,
			
		  success:function(resp){  
		 
   			 if(resp != '') {
				 $('#vijay').css('display','none');
				 $('#totalBlog').html('');
				  $('#totalBlog').html(resp);
         
    		}else{
				$('#totalBlog').html('');
   			 }

 		  }
 		 });
		 }
 </script>


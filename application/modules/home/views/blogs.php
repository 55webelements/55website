<section>
	<div class="row">
		<div class="container">
			
			<div class="col-sm-12">
			   
				<div class="mt-8p">
					<div class="col-sm-12 col-xs-12">
						<h1>Blog</h1>
						
							<?php
							 
							 if(@sizeof($blogs)>0)
							 {
								 for($i=0;$i<sizeof($blogs);$i++)
								 {
							
								?>
								<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 <?php echo @$blogs[$i]->seoCustomURL; ?> mb-20" >
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<h3>
											<a id="sitedesign" href="<?php //echo @$urlpath; ?>" class="atags"><!--Website Design--><?php echo @$blogs[$i]->bTitle;?></a>
										</h3>
									</div>
									<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
										<?php echo @substr(strip_tags($blogs[$i]->bDesc),0,400);?>
									</div>
								   <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
									<a class="btn btn-1 atags1 mt-20" href="<?php echo base_url().''.@$blogs[$i]->seoCustomURL; ?>">read more</a>
									</div>
									<hr />
								</div>
								<?php
								}
							}
							?>
					
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
      
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

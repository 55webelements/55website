<?php
$data=@json_decode($rec);
$works=$data->works;
?>
    <div class="bg-content work-bg">
        <!-- Content -->
        <div id="content">
            <div class="ic"></div>
            <div class="container">
                <div class="row work">
                    <article class="span12">
                        <h4>Portfolio</h4>
                    </article>
                    <div class="clear"></div>
					
                    <ul id="og-grid" class="og-grid">
                    <?php 
					if(@sizeOf($works) > 0)
					{
						for($i=0;$i<sizeOf($works);$i++)
						{ 
				?>
                    	 <li>
							<a href="<?php echo @$works[$i]->tURL;?>" data-largesrc="<?php echo base_url() ?>admin/uploads/works/<?php echo @$works[$i]->tImage; ?>" data-title="<?php echo @$works[$i]->tTitle;?>" data-description="TYPE OF WORK: <?php echo @strip_tags($works[$i]->tDesc);?>">
								<img src="<?php echo base_url() ?>admin/uploads/works/<?php echo @$works[$i]->tSImage;?>" alt="<?php echo @$works[$i]->tTitle;?>" title="<?php echo @$works[$i]->tCategory;?>" class="port-img-sm" />
							</a>
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
    <script src="<?php echo base_url() ?>includes/js/script.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>includes/js/scripts/grid.js"></script>
       
    <script type="text/javascript">
        $(function () {
            Grid.init();
        });
    </script>
    <script type="text/javascript">
        var $ = win
    </script>
</body>
</html>

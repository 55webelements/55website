<?php
$data=@json_decode($rec);
$banners=$data->banners;$sections=$data->sections;
$wework=$data->wework;
$blogs=$data->blogs;
$testimonials=$data->testimonials;
$works=$data->works;
?>
    <div itemscope itemtype="http://schema.org/LocalBusiness" class="bg-content">
        <!-- content -->
        <div class="row-fluid">
            <div class="banner-home">
				<img src="<?php echo base_url()?>admin/uploads/banners/<?php echo @$banners[0]->bImage;?>" class="img-responsive" />
            </div>
            <div class="quote">
                <h1><?php echo @$banners[0]->bTitle;?>
                    <!--55 WEB ELEMENTS-->
                    <br />
                    <!--Web Design &amp; Development Services--><?php echo @$banners[0]->bDesc;?> <br />
					<!--in Newyork--><span><?php echo @$banners[0]->bLocation;?></span></h1>
            </div>
            
        </div>
        <div class="row-1 banner-bg">
            <div class="row-fluid">
                <div class="container">
                    <h2 class="blockquote">
                       
                        <?php echo @$sections[0]->sDesc;?>
                    </h2>
                    <div class="down-arrow">
                        <a href="#" title="scroll down">
                            <img src="<?php echo base_url()?>includes/img/down-arrow.png" alt="web designing company in hyderabad" title="scroll down to learn more about our web design and web development services" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-1">
            <div class="row-fluid">
                <div class="container">
                    <ul class="thumbnails thumbnails-1 comp">
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3>
                                    Why 55web?</h3>
                                <p>
                                    <?php echo @$sections[1]->sDesc;?>
                                </p>
                              
                            </div>
                        </li>
                        <li class="span3" style="padding:0px 20px;">
                            <div class="thumbnail thumbnail-1">
                                <h3>
                                    How we work</h3>
                                <section>
                                    <div id="cbp-qtrotator" class="cbp-qtrotator">
                                    <?php
									if(@sizeof($wework)>0)
									{
										for($i=0;$i<sizeof($wework);$i++)
										{
									?>
                                        <div class="cbp-qtcontent">
											<img src="<?php echo base_url();?>admin/uploads/files/<?php echo @$wework[$i]->wImage;?>" alt="website design" title="<?php echo @$wework[$i]->altTitle;?>" />
                                           <h4><?php echo @$wework[$i]->wTitle;?></h4>
                                            <blockquote>
												<p><?php echo @$wework[$i]->wDesc;?></p>
                                            </blockquote>
                                        </div>
                                       
                                        <?php
										}
									}
										?>
                                    </div>
                                </section>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3>Our Blog</h3>
                                <section>
                                    <ul>
									<?php
									if(@sizeOf($blogs) > 0)
									{
										for($b=0;$b<sizeOf($blogs);$b++)
										{
									?>
										<li>
											<a href="<?php echo base_url().$blogs[$b]->seoCustomURL;?>">												<?php echo @$blogs[$b]->bTitle;?>
											</a>
										</li>
									<?php
										}
									}
									?>
                                    </ul>
                                </section>
                            </div>
                        </li>						
                        <li class="span3 testimonials">
                            <h3 class="title-1 extra">
                                &nbsp;&nbsp;Testimonials</h3>
                            <div id="slides">
                            <?php
							if(@sizeof($testimonials)>0)
							{
								for($t=0;$t<sizeof($testimonials);$t++)
								{ 
							?>
                                <div class="thumbnail thumbnail-1">
									<img src="<?php echo base_url()?>admin/uploads/files/<?php echo @$testimonials[$t]->tImage;?>" alt="<?php echo @$testimonials[$t]->tImage;?>" title="<?php echo @$testimonials[$t]->altTitle;?>" />
                                    <hr />
                                    <section>
                                        <div class="testimonial quote-text">
                                            <blockquote><i><?php echo @$testimonials[$t]->tTitle;?></i></blockquote>
                                        </div>
                                    </section>
                                </div>
                               
                                <?php
								}
							}?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row-1">
            <div class="row-fluid">
                <div class="container">
                    <ul class="thumbnails thumbnails-1">
                        <li class="span3">
                            <div class="thumbnail thumbnail-1">
                                <h3 class="latest">
                                    Latest Web Design Projects</h3>
                               <?php echo @$sections[2]->sDesc;?>
                            </div>
                        </li>
						<?php
						if(@sizeOf($works) > 0)
						{
							for($w=0;$w<sizeOf($works);$w++)
							{
						?>
						 <li class="span3">
                            <a href="web-design-portfolio">
                            <div class="thumbnail thumbnail-1">
                                <img src="<?php echo base_url()?>admin/uploads/works/<?php echo @$works[$w]->tSImage;?>" alt="<?php echo @$works[$w]->tTitle;?>" title="<?php echo @$works[$w]->tTitle;?>" />
                                <section>
                                    <h3><?php echo @$works[$w]->tTitle;?></h3>
                                </section>
                            </div>
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
        
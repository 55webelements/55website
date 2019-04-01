    <div class="bg-content banner-bg">
        <!-- content -->
        <div id="content">
            <div class="ic"></div>
            <div class="container">
                <div class="row">
                    <article class="span6">
                        <h3>Contact us</h3>
                        <div class="inner-1">
          
                            <form method="POST" action="<?php echo base_url()?>index.php/home/storeContactInfo" id="contactform" enctype="multipart/form-data">
								
								<?php
								if(@$this->session->userdata('scontact') != '')
								{
								?>
								<div class="alert alert-success">
									<?php
									echo @$this->session->userdata('scontact');
									@$this->session->unset_userdata('scontact');
									?>
								</div>
								<?php
								}
								if(@$this->session->userdata('fcontact') != '')
								{
								?>
								<div class="alert alert-success">
									<?php
									echo @$this->session->userdata('fcontact');
									@$this->session->unset_userdata('fcontact');
									?>
								</div>
								<?php
								}
								?>
								
								<div class="success">Your message has been sent succesfuly!<strong> We will be in touch soon.</strong> </div>
                                 <div id="dvError"><strong> Please wait for a moment, Your request is under process!!!</strong> </div>
                                <fieldset>
                                    <div>
                                        <label class="name">
                                            <input type="text" placeholder="Your name" name="cName" id="cName" />
                                            <br />
                                            <span class="error">*This is not a valid name.</span> <span class="empty">*This field is required.</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="phone">
                                            <input type="tel" placeholder="Telephone"  name="cMobile" id="cMobile" onkeypress="tel(this.value)">
                                            <br />
                                            <span class="error">*This is not a valid phone number.</span> <span class="empty">*This field is required.</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="email">
                                            <input type="email" placeholder="email" name="cEmail" id="cEmail"/>
                                            <br />
                                            <span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="message">
                                            <textarea type="text" name="cMessage" id="cMessage" placeholder="Message"></textarea>
                                            <br />
                                            <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span>
                                        </label>
                                    </div>
                                    <div class="buttons-wrapper"><a class="btn btn-1" data-type="reset">Clear</a> <button class="btn btn-1" name="submit" type="submit" >Send</a></div>
                                </fieldset>
                            </form>
                              </div>
                    </article>
                            
                            
           

                      
                   <article class="span6">
                        <h3>Contact info</h3>
						<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script>
						<script src="http://maps.googleapis.com/maps/api/js"></script>
						<script>
						function initialize() {
						  var mapProp = {
							center:new google.maps.LatLng(<?php echo @$contact[0]->cLat;?>,<?php echo @$contact[0]->cLang;?>),
							zoom:17,
							mapTypeId:google.maps.MapTypeId.ROADMAP
						  };
						  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
						  var marker = new google.maps.Marker({
								  position: mapProp,
								  map: map,
								  title: 'Hello World!'
							  });

						}
						google.maps.event.addDomListener(window, 'load', initialize);
						</script>
						<h2>&nbsp;</h2>
						
                       <div class="map">
                            <div class="address">
                              <?php echo @$contact[0]->cLatlang;?>
                            </div>
                        </div>
                        <address class="address-1">
                            <?php echo @$contact[0]->cAddress;?>
							Phone: <span itemprop="telephone"><?php echo @$contact[0]->cContact;?></span><br />
                            Mail:<a href="mailto:<?php echo @$contact[0]->cEmail;?>">
                            <meta itemprop="email" content="<?php echo @$contact[0]->cEmail;?>">
                            <?php echo @$contact[0]->cEmail;?>
							</a>
                        </address>
                    </article>
                </div>
            </div>
         
    
    
    
</body>
</html>
<script>
function tel()
{

  $("#telephone").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      $("#telephone").val("");
      $("#telephone").css({"border":"1px solid none"});
    $("#telephone").attr("placeholder","Enter Phone Number")
      return false;
    }
    
  });
} 


</script>


<?php
if($_SERVER["HTTPS"]!="on")
	{
	header("Location:https://".
			$_SERVER["HTTP_HOST"].
			$_SERVER["REQUEST_URI"]);
			exit();
			}
?>			
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sanjeevini Hospital</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		 <!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		 <!---- start-smoth-scrolling---->
		<!----webfonts--->
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
	</head>
	<body>
		<!----- start-header---->
			<div id="home" class="header">
					<div class="top-header">
						<div class="container">
						<div class="logo">
							<a href="#"><img src="images/logo.png"  /></a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li class="active"><a href="#home" class="scroll">Home </a></li>
								<li><a href="#about" class="scroll">Facilities</a></li>
								
								<li><a href="#contact" class="scroll">Contact</a></li>
								<li><a href="login.php" >LOGIN</a></li>
								<li><a href="reg.php" >APPLY FOR A JOB</a></li>
							</ul>
							<a href="#" id="pull"><img src="images/menu-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		<!----- //End-header---->
		<!----start-slider-script---->
			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!----//End-slider-script---->
			<!-- Slideshow 4 -->
			    <div  id="top" class="callbacks_container">
			      <ul class="rslides" id="slider4">
			        <li>
			          <img src="images/slide3.jpg" alt="">
			          <div class="caption">
			          	<div class="slide-text-info">
			          		
			          		
			          </div>
			        </li>
			       <!-- <li>
			          <img src="images/logo2.jpg" alt="">
			          <div class="caption">
			          	<div class="slide-text-info">
			          		
			          		
			          	</div>
			          </div>
			        </li>-->
			        <li>
			          <img src="images/slide1.jpg" alt="">
			           <div class="caption">
			           	<div class="slide-text-info">
			           		<h1>providing</h1>
			          		<label>highest standards of excellence in medical care</label>
			          		
			          		
			          	</div>
			          </div>
			        </li>
			      </ul>
			    </div>
			    <div class="clearfix"> </div>
			<!----- //End-slider---->
			<!---- about ---->
			<div id="about" class="about">
				<div class="container">
					<div class="header about-header text-center">
						<h2>FACILITIES</h2>
						<p>Sanjeevni Hospitals is deeply committed to the highest standards of excellence in medical care. At the same time we place a lot of importance on the traditional values of hospitality and compassionate patient care. Our primary concern is to ensure that your health and comfort receives special attention and that you are given the best possible care once you enter the portals of our hospital.

We give you here a few details about our hospital so that your experience at our hospital is comfortable and pleasant.</p>
					</div>
					<!---- About-grids ---->
					<div class="about-grids">
						<div class="col-md-4">
							<div class="about-grid">
								<img src="images/ambulance.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">
Ambulance Services</a></h3>
									<p>24 hours patient transport vehicle available. Patients are transported from home (on campus) to Sanjeevni hospital and patients referred by emergency duty doctor to empanelled hospital for specialized case.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid1">
								<img src="images/lab.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Laboratory services</a></h3>
									<p>Trained laboratory staff are providing best services which includes painless blood withdrawal Services of one NABL accredited laboratory are also available for carrying out specialised tests.Sample collection time for Sanjeevni laboratory is 8 am to 10.30 am while emergency tests like Blood sugar, platelet count & Hb & blood grouping done in emergent cases throughout OPD hours.
</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid2">
								<img src="images/pharmacy.jpg" title="name" />
								<span class="t-icon2"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Pharmacy</a></h3>
									<p>Free reliable quality medicines are available to beneficiaries on doctor prescription during OPD hours. Medicines not available are provided by S.O. signed by prescribing Doctor and Head and collected from on campus chemist shop.
</p>
								</div>
							</div>
						</div>
						
					</div>
					<!---- About-grids ---->
				</div>
				
			</div>

			<div id="about" class="about">
				<div class="container">
					<div class="header about-header text-center">	
					</div>
					<!---- About-grids ---->
					<div class="about-grids">
						<div class="col-md-4">
							<div class="about-grid">
								<img src="images/xray.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Radiology/X-ray facility</a></h3>
									<p>X-Ray pleophos-D, 300 MA Siemens available, X-rays done on all working days during OPD hour. Sonoline G-50 U/S machine, Siemens. Ultrasounds are done once a week.</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid1">
								<img src="images/ward.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Ward/ Indoor facility</a></h3>
									<p>Ward facilities for observation and management of medical problem like typhoid, acute gastroenteritis, COPD, bronchial asthma, malaria, viral fever, pneumonias etc. There are 3 wards, one special room and one well equipped emergency.
</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid2">
								<img src="images/physio.gif" title="name" />
								<span class="t-icon2"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Physiotherapy</a></h3>
									<p>Range of physiotherapy services to assist the patients to recover from wide range of musculoskeletal pain-ful disorders. Available modalities are MWD, SWD, U/S, TENS, IFC laser therapy traction unit.</p>
</p>
								</div>
							
					
						<div class="clearfix"> </div>

					</div>
					<!---- About-grids ---->
				</div>
				
			</div>


			<div id="about" class="about">
				<div class="container">
					<div class="header about-header text-center">
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>

					</div>
					<!---- About-grids ---->
					<div class="about-grids">
						<div class="col-md-4">
							<div class="about-grid">
								<img src="images/ecg.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">ECG Services</a></h3>
									<p>24hours ECG services including machine report, done by trained staff.
</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid1">
								<img src="images/Ot.jpg" title="name" />
								<span class="t-icon1"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Minor OT</a></h3>
									<p>Provides services for minor surgical procedure like dressing of lacerated wound, suturing of minor lacerations & resuturing, excision of corns and sebaceous cysts (done under local anesthesia.).

</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="about-grid n-about-grid n-about-grid2">
								<img src="images/dental.jpg" title="name" />
								<span class="t-icon2"> </span>
								<div class="about-grid-info text-center">
									<h3><a href="#">Dental facility</a></h3>
									<p>An experienced Dental surgeon provides procedures like Dental Extractions, RCT, Scaling /Cleaning, Fillings, Local curettage..</p>
</p>
								</div>

							
					
						<div class="clearfix"> </div>
						<div class="clearfix"> </div>

<div class="clearfix"> </div>



					</div>
					<!---- About-grids ---->
				</div>
				
			</div>
			
			
					
						</div>
						<div class="clearfix"> </div>
					</div>
					<!---//teammember-grids ---->
				</div>
			</div>
			<!--- team --->
			<!---- contact ---->
			<div id="contact" class="contact">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1600186.2619317076!2d-102.69625001610805!3d38.43306521805143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1404490159176" > </iframe>
					<div class="contact-info">
						<div class="container">
						<!---- contact-grids ---->
						<div class="contact-grids">
							<h3>contact us</h3>
							<div class="col-md-5 contact-grid-left">
								<h4>contact information</h4>
								<ul>
									<li><span class="cal"> </span><label>Monday - Friday :</label><small>9:30 AM to 6:30 PM</small></li>
									<li><span class="pin"> </span><label>Address :</label><small>Sanjeevni Hospital,100 Feet Ring Road,BSK 3rd Stage,Hoskerehalli,Bangalore-560 085</small></li>
									<li><span class="phone"> </span><label>Phone :</label><small>(080)-123456</small></li>
									<li><span class="fax"> </span><label>Fax :</label><small>(123) 984-1234</small></li>f
									<li><span class="mail"> </span><label>Email :</label><small> info@sanjeevnihospitals.com</small></li>
								</ul>
							</div>
							<div class="col-md-7 contact-grid-right">
								<h4>leave us a message</h4>f
								<form>
									<input type="text" value="Name:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name:';}">
									<input type="text" value="Email:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email:';}">
									<input type="text" value="Phone No:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone No:';}">
									<textarea rows="2" cols="70" onfocus="if(this.value == 'Message:') this.value='';" onblur="if(this.value == '') this.value='Message:';">Message:</textarea>
									<input type="submit" value="SEND MESSAGE" />
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<!---- contact-grids ---->
					</div>
					</div>
				</div>
			</div>
			<!---- contact ---->
			<div class="clearfix"> </div>
			<!--- copy-right ---->
			<div class="copy-right">
				<div class="container">
				<div class="copy-right-left">
					
					<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
					<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				</div>
				<div class="copy-right-right">
					<ul>
						<li><a class="facebook" href="#"><span> </span></a></li>
						<li><a class="twitter" href="#"><span> </span></a></li>
						<li><a class="skype" href="#"><span> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<!--- copy-right ---->
	</body>
</html>


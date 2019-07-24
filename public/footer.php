
  <!-- News Letter Start -->
  <section>
    <div class="newsletter">
      <div class="container">
        <div class="newsletter-inner center-sm">
          <div class="row">
            <div class=" col-xl-10 col-md-12 push-xl-1">
              <div class="newsletter-bg">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="newsletter-title">
                      <h2 class="main_title">Subscribe to our newsletter</h2>
                      <div class="sub-title">Sign up for newsletter and Get upto 50% off</div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <form>
                      <div class="newsletter-box">
                        <input type="email" placeholder="Email Here...">
                        <button title="Subscribe" class="btn-color">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News Letter End --> 

  <!-- FOOTER START -->
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo"> 
                  <a href="index-2.html" class=""> 
                    <img src="images/footer-logo.png" alt="Stylexpo"> 
                  </a> 
                </div>
                <div class="footer-block-contant">
                    <p>Online shopping site - Shop Electronics, Mobile, Men & Women Clothing, Shoes, Home  appliances online on nalla in India. ☆ Next 7 Day Delivery .
</p>
                    <p>Shop for Lifestyle Apparel, Footwear, Accessories, Personal Care & more! 5 Lakhs Styles. 30 Days Return. 2000+ Brands. Premium Brands.</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Help <span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="#">Gift Cards</a></li>
                  <li><a href="#">Order Status</a></li>
                  <li><a href="#">Free Shipping</a></li>
                  <li><a href="#">Return & Exchange </a></li>
                  <li><a href="#">International</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Guidance <span></span></h3>
                <ul class="footer-block-contant link">
                  <li><a href="#"> Delivery information</a></li>
                  <li><a href="#"> Privacy Policy</a></li>
                  <li><a href="#"> Terms & Conditions</a></li>
                  <li><a href="#"> Contact</a></li>
                  <li><a href="#"> Sitemap</a></li>
                </ul>
              </div>
            </div>
            <div class="col-xl-3 f-col">
              <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">address<span></span></h3>
              <?php 
			  $address=$obj_m->fetch_all("address");
			  //print_r($address);
			  if($address !=null){
				  foreach($address as $addres){
					  //print_r($addres);
					  
				  
			  ?>               
			   <ul class="footer-block-contant address-footer">
                  <li class="item"> <i class="fa fa-map-marker"> </i>
                    <p><?php echo $addres->address;?></p>
                  </li>
                  <li class="item"> <i class="fa fa-envelope"> </i>
                    <p> <a href="#"><?php echo $addres->email;?> </a> </p>
                  </li>
                  <li class="item"> <i class="fa fa-phone"> </i>
                    <p><?php echo $addres->number;?></p>
                  </li>
                </ul>
				<?php }}?>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="footer-bottom ">
          <div class="row mtb-30">
            <div class="col-lg-6 ">
              <div class="copy-right ">© 2018  All Rights Reserved. Design By <a href="#">Aaryaweb</a></div>
            </div>
            <div class="col-lg-6 ">
              <div class="footer_social pt-xs-15 center-sm">
                <ul class="social-icon">
                  <li><div class="title">Follow us on :</div></li>
                  <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          <div class="row align-center mtb-30 ">
            <div class="col-12 ">
              <div class="site-link">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Customer </a></li>
                  <li><a href="#">Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Policy </a></li>
                  <li><a href="#">Accessibility</a></li>
                  <li><a href="#">Directory </a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row align-center">
            <div class="col-12 ">
              <div class="payment">
                <ul class="payment_icon">
                  <li class="visa"><a href="#"><img src="images/pay1.png" alt="Stylexpo"></a></li>
                  <li class="discover"><a href="#"><img src="images/pay2.png" alt="Stylexpo"></a></li>
                  <li class="paypal"><a href="#"><img src="images/pay3.png" alt="Stylexpo"></a></li>
                  <li class="vindicia"><a href="#"><img src="images/pay4.png" alt="Stylexpo"></a></li>
                  <li class="atos"><a href="#"><img src="images/pay5.png" alt="Stylexpo"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <div class="scrollup"></div>
  </div>
  <!-- FOOTER END --> 
</div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script> 
<script src="js/bootstrap.min.js"></script>  
<script src="js/tether.min.js"></script> 
<script src="js/jquery.downCount.js"></script>
<script src="js/fotorama.js"></script>
<script src="js/highlight.js"></script>
<script src="js/app.js"></script>
<script src="js/jquery.magnific-popup.js"></script> 
<script src="js/owl.carousel.min.js"></script>  
<script src="js/custom.js"></script>

<script>
$(function(){
  $(".wishlist_btn").click(function(){
    var pid=$(this).attr("id");
//alert(pid);   
   $.ajax({
      url:"wishlist.php",
      method:"POST",
      data:{"pid":pid},
      success:function(res){
		  //alert(res);
		 //alert(pid);
        if(res==0){
          window.location.href="customer-login.php";
		  //alert("hello");
        }
        else if(res==11){
          alert("Product add into wishlist");
        }
        else if(res==12){
          alert("Product already in wislist");
        }
      }
    });
  });
});
</script>
  <script>
    /*var tag = document.createElement('script');
    tag.src = "js/player_api.js";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubePlayerAPIReady() {
      player = new YT.Player('player', {
        playerVars: { 'rel': 0, 'autoplay': 1, 'controls': 0,'autohide':1,'showinfo': 0, 'wmode':'opaque' },
        videoId: 'Lgitw016T44',
        //suggestedQuality: 'hd720',
        events: {
          'onReady': onPlayerReady}
      });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
      event.target.mute();
      event.target.setPlaybackQuality('hd720');
      //$(".video").fitVids();
      
      $('.video i').on('click',function() {
        if ($('.video').hasClass('on')) {
          event.target.mute();
          $('.video').removeClass('on');
        } else {
          event.target.unMute();
          $('.video').addClass('on');
        }
      });
      
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.BUFFERING) {
            event.target.setPlaybackQuality('hd720');
        }
    }

    */
    </script>
<script>
    $( "#tags" ).autocomplete({
      source:'product_search.php'
    });
	   

  </script>

	 <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 8000,
      max: 20000,
      values: [ 8000, 20000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ] );
		//ajax code
		$.ajax({
			type:"POST",
			url:"product_ajax.php",
			data:{min:ui.values[ 0 ],max:ui.values[ 1 ]}
		})
      }
    });
    $( "#amount" ).val( "Rs." + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs." + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>
	</body>
</html>


<!-- BANNER STRAT -->
  <section class="">
    <div id="owl-example" class="banner owl-carousel">
      <div class="main-banner">
	  <?php $slider=$obj_m->fetch_all("slider");
	    // print_r($slider);
		 if($slider !=null){
			 foreach($slider as $sliders){
				 
				 
	  ?>
        <div class="item">
          <div class="banner-1"> <img src="<?php echo $sliders->path;?>" alt="Stylexpo">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-4"></div>
                  <div class="co-8">
                    <div class="banner-detail-inner"> 
                      <span class="slogan"><?php echo $sliders->title;?></span>
                      <h1 class="banner-title"><?php echo $sliders->title1;?></h1>
                      <span class="offer"><?php echo $sliders->title2;?></span>
                    </div>
                    <a class="btn btn-color" href="shop.html">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
				<?php  }
		 } ?>
        
      </div>
    </div>
  </section>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->

    <!-- SUB-BANNER START -->
    <div class="sub-banner-block ">
      <div class="">
        <div class=" center-sm">
          <div class="row m-0">
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="sub-banner sub-banner1" >
                <img alt="Stylexpo" src="images/sub-banner1.jpg">
                <div class="sub-banner-detail">
                  <div class="sub-banner-title sub-banner-title-color">Most Popular Sunglasses</div>
                  <div class="sub-banner-subtitle">Latest, Stylish and Trendy Collection</div>
                  <a class="btn btn-color" href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="">
                <div class="sub-banner sub-banner2">
                  <img alt="Stylexpo" src="images/sub-banner2.jpg">
                  <div class="sub-banner-detail">
                    <div class="sub-banner-title sub-banner-title-color">Shoes & Footwear</div>
                    <div class="sub-banner-subtitle"> range of footwea & shoes for men & women</div>
                    <a class="btn btn-color " href="shop.html">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="sub-banner sub-banner3" >
                <img alt="Stylexpo" src="images/sub-banner3.jpg">
                <div class="sub-banner-detail">
                  <div class="sub-banner-title sub-banner-title-color">Shop Watches Online</div>
                  <div class="sub-banner-subtitle">Latest range of Digital & Analog Watches</div>
                  <a class="btn btn-color " href="shop.html">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SUB-BANNER END -->

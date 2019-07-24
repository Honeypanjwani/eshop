<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?> 
<?php include("header.php");?>
<?php include("navbar.php");?>

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
                    <a class="btn btn-color">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
				<?php  } } ?>
        <!--<div class="item">
          <div class="banner-2"> <img src="images/banner2.jpg" alt="Stylexpo">
            <div class="banner-detail">
              <div class="container">
                <div class="row">
                  <div class="col-8">
                    <div class="banner-detail-inner"> 
                      <span class="slogan">new look</span>
                      <h1 class="banner-title">Smart Watches For<br><span> Men & Women</span></h1>
                      <span class="offer">Most Popular Brand Products 20% off</span> 
                    </div> 
                      <a class="btn btn-color" href="shop.html">Shop Now!</a>
                  </div>
                  <div class="col-4"></div>              
                </div>
              </div>
            </div>
          </div>
        </div>-->
        
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
                  <div class="sub-banner-title sub-banner-title-color">Most Popular Fans</div>
                  <div class="sub-banner-subtitle">Latest, Stylish and Trendy Collection</div>
                  <a class="btn btn-color">Shop Now!</a>
                </div>
              </div>
            </div>
			
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="">
                <div class="sub-banner sub-banner2">
                  <img alt="Stylexpo" src="images/sub-banner2.jpg">
                  <div class="sub-banner-detail">
                    <div class="sub-banner-title sub-banner-title-color">Shoes & Footwear</div>
                    <div class="sub-banner-subtitle"> Range of footwea & shoes for men & women</div>
                    <a class="btn btn-color ">Shop Now!</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-xs-30 p-0">
              <div class="sub-banner sub-banner3" >
                <img alt="Stylexpo" src="images/sub-banner3.jpg">
                <div class="sub-banner-detail">
                  <div class="sub-banner-title sub-banner-title-color">Most Popular Clothes</div>
                  <div class="sub-banner-subtitle">Latest range of Digital & Latest Clothes</div>
                  <a class="btn btn-color ">Shop Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SUB-BANNER END -->
    
    <!--  New arrivals Products Slider Block Start  -->
    <section class="pt-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>New Arrivals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div class="owl-carousel pro-cat-slider ">
<!-------------------------------------------------------------------------------->
<!--$img = ltrim(strchr($bag_image->path , "/") , "/");
$inputwidth = 250;
 $inputheight = 250;
 list($width,$height) = getimagesize($img);

           if (($width/$height) > ($inputwidth/$inputheight)) {
            $outputwidth = $inputwidth;
            $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }										 ?>
									<img src="<?php //echo $img;  ?>" width="<?php //echo $outputwidth ?>" height="<?php //echo $outputheight  ?>" alt="">-->


<!-------------------------------------------------------------------------------->			 
			 
			 
               
              <?php 	
			 $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>19]);
              
 
			   //$products=$obj_m->fetch_all("products");
	     //print_r($products);
		 if($products !=null){
			 foreach($products as $product){
				 		 
				
				
				 
	  ?>
			   <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                     <div class="product-image" > <a href="product-detail.php?p_id=<?php echo $product->id?>"> 
					 <?php
					  $img = $obj_c->get_front_image($product->id);
					 
                   $inputwidth = 300;
                  $inputheight = 300;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>

					 
					 <center><img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"></center>
                         
					 </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <!--<li class="pro-cart-icon">
                              <form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
							  
                                <button title="Add to Cart"  name="add_to_cart"><span></span>Add to Cart</button>
                              </form>
                            </li>-->
                            <li class="pro-wishlist-icon active"><a class="wishlist_btn"  id="<?php echo $product->id?>" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                  
                </div>
		 <?php  }} ?>
               
              </div>
			  <!----->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->

	
	<!---------------------------------------------------------------------------->
	
    <!--  New arrivals Products Slider Block Start  -->
    <section class="pt-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
           <!-- <div class="col-12">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>New Arrivals</span></h2>
              </div>
            </div>-->
          </div>
          <div class="pro_cat">
            <div class="row">
              <div class="owl-carousel pro-cat-slider ">
<!-------------------------------------------------------------------------------->
<!--$img = ltrim(strchr($bag_image->path , "/") , "/");
$inputwidth = 250;
 $inputheight = 250;
 list($width,$height) = getimagesize($img);

           if (($width/$height) > ($inputwidth/$inputheight)) {
            $outputwidth = $inputwidth;
            $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }										 ?>
									<img src="<?php //echo $img;  ?>" width="<?php //echo $outputwidth ?>" height="<?php //echo $outputheight  ?>" alt="">-->


<!-------------------------------------------------------------------------------->			 
			 
			 
               
              <?php 	
			 $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>32]);
              
 
			   //$products=$obj_m->fetch_all("products");
	     //print_r($products);
		 if($products !=null){
			 foreach($products as $product){
				 		 
				
				
				 
	  ?>
			   <div class="item">
                  <div class="product-item mb-30">
                    <div class="main-label new-label"><span>New</span></div>
                     <div class="product-image" > <a href="product-detail.php?p_id=<?php echo $product->id?>"> 
					 <?php
					  $img = $obj_c->get_front_image($product->id);
					 
                   $inputwidth = 300;
                  $inputheight = 300;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>

					 
					 <center><img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"></center>
                         
					 </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>

                            <!--<li class="pro-cart-icon">
                              <form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
							  
                                <button title="Add to Cart"  name="add_to_cart"><span></span>Add to Cart</button>
                              </form>
                            </li>-->
				             <li class="pro-wishlist-icon active"><a class="wishlist_btn"  id="<?php echo $product->id?>" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                  
                </div>
		 <?php  }} ?>
               
              </div>
			  <!----->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  New arrivals Products Slider Block End  -->

	
	<!----------------------------------------------------------------------------->
    <!-- Top Categories Start-->
    <section class=" ptb-70">
      <div class="top-cate-bg ptb-70">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>Top Categories</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="top-cat-pro" class="owl-carousel sell-pro align-center">
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_1.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Women tops</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_2.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Men’s jackets</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/ceiling-fan.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Fans</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_4.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>shoes</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_7.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Women t-shirt</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_6.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>kid's wear</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    
					<div class="item-inner">
                        <img src="images/ceiling-fan.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Fans</span>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="item ">
                  <a href="shop.html">
                    <div class="item-inner">
                        <img src="images/cate_2.jpg" alt="Stylexpo">
                      <div class="cate-detail">
                        <span>Men’s jackets</span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Top Categories End-->

    <!-- perellex-banner Start -->
    <section>
      <div class="perellex-banner">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 offset-xl-2 ptb-70 client-box">
              <div class="perellex-delail align-center">
                <div class="perellex-offer"><span class="line-bottom">Up to 50% Off on Electronics,Clothes</span></div>
                <div class="perellex-title ">New Design Clothes are releasing </div> 
                <p>New Design Clothes are releasing and Electronics products are available here...</p>         
                <a class="btn btn-color">Shop Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- perellex-banner End -->

    <!-- Daily Deals Start -->
    <section class=" ptb-70">
      <div class="container">
        <div class="daily-deals">
          <div class="row m-0">
            <div class="col-12 p-0">
              <div class="heading-part mb-30 mb-xs-15">
                <h2 class="main_title heading"><span>Daily Deals</span></h2>
              </div>
            </div>
          </div>
          <div class="pro_cat">
            <div class="row">
              <div id="daily_deals" class="owl-carousel ">
                
				
                     <?php 	
			 $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>19]);
              
 
			   //$products=$obj_m->fetch_all("products");
	     //print_r($products);
		 if($products !=null){
			 foreach($products as $product){		
				 
	  ?>
			
					 <?php
					  $img = $obj_c->get_front_image($product->id);
					 
                   $inputwidth = 350;
                  $inputheight = 350;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>

<div class="item">
                  <div class="product-item">
                    <div class="row ">
                      <div class="col-md-6 col-12 deals-img ">
                        <div class="product-image"> 
                          <a href="product-detail.php?p_id=<?php echo $product->id?>"> 
                            <img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"> 
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-12 mt-xs-30">
                        <div class="product-item-details">
                          <div class="product-item-name"> 
							<a href="product-detail.php?p_id=<?php echo $product->id?>"><?php echo $product->title;?></a>
                          </div>
                          <div class="price-box"> 
						  <span class="price">Rs:-<?php echo $product->sale_price?></span> 
						  <del class="price old-price">Rs:-<?php echo $product->price;?></del>
                            
                          </div>
                          <p><?php echo substr($product->descriptions,0,100)?></p>
                        </div>
                        <div class="product-detail-inner">
                          <div class="detail-inner-left">
                            <ul>
                              <!--<li class="pro-cart-icon">
								<form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
                                <button title="Add to Cart"  name="add_to_cart"><span></span>Add to Cart</button>
                              </form>
                              </li>-->
							  <li class="pro-wishlist-icon active"><a class="wishlist_btn"  id="<?php echo $product->id?>" title="Wishlist"></a></li>
                              <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="item-offer-clock">
                          <ul class="countdown-clock">
                            <li>
                              <span class="days">00</span>
                              <p class="days_ref">days</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="hours">00</span>
                              <p class="hours_ref">hrs</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="minutes">00</span>
                              <p class="minutes_ref">min</p>
                            </li>
                            <li class="seperator">:</li>
                            <li>
                              <span class="seconds">00</span>
                              <p class="seconds_ref">sec</p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   
		 <?php  }} ?>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Daily Deals End -->

    <!--  Site Services Features Block Start  -->
    <div class="ser-feature-block">
      <div class="container">
        <div class="center-xs">
          <div class="row">
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature1"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free Delivery</div>
                  <div class="ser-subtitle">From $59.89</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box">
                <div class="feature-icon feature2"></div>
                <div class="feature-detail">
                  <div class="ser-title">Support 24/7</div>
                  <div class="ser-subtitle">Online 24 hours</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature3"></div>
                <div class="feature-detail">
                  <div class="ser-title">Free return</div>
                  <div class="ser-subtitle">365 a day</div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 service-box">
              <div class="feature-box ">
                <div class="feature-icon feature4"></div>
                <div class="feature-detail">
                  <div class="ser-title">Big Saving</div>
                  <div class="ser-subtitle">Weeken Sales</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  Site Services Features Block End  -->

    <!--small banner Block Start-->
    <section class="pt-70"> 
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="sub-banner small-banner small-banner1">
              <a href="#">
                <img src="images/small-banner1.jpg" alt="Stylexpo">
              </a>
            </div>
          </div>
          <div class="col-lg-6 mt-sm-30">
            <div class="sub-banner small-banner small-banner2">
              <a href="#">
                <img src="images/small-banner2.jpg" alt="Stylexpo">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--small banner Block Start-->
<!---------------------------------------------------->
	
<!---------------------------------------------------->
    <!--  Special products Products Slider Block Start  -->
    <section class="ptb-70">
      <div class="container">
        <div class="product-listing">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30 mb-xs-15">
                    <h2 class="main_title heading"><span>Best seller</span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
               


<!--                    <div class="item">
                      <div class="product-item">
                        <div class="main-label new-label"><span>New</span></div>
                        <div class="main-label sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.html"> <img src="images/7.jpg" alt="Stylexpo"> </a>
                          <div class="product-detail-inner">
                            <div class="detail-inner-left align-center">
                              <ul>
                                <li class="pro-cart-icon">
                                  <form>
                                    <button title="Add to Cart"><span></span>Add to Cart</button>
                                  </form>
                                </li>
                                <li class="pro-wishlist-icon active"><a href="wishlist.html" title="Wishlist"></a></li>
                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                          <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$100.00</del> </div>
                        </div>
                      </div>
                    </div>
--->

              <?php 	
			 $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>32]);
              
 
			   //$products=$obj_m->fetch_all("products");
	     //print_r($products);
		 if($products !=null){
			 foreach($products as $product){
				 		 
				
				
				 
	  ?>
			   <div class="item">
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
				   <div class="main-label sale-label"><span>Sale</span></div>
                     <div class="product-image" > <a href="product-detail.php?p_id=<?php echo $product->id?>"> 
					 <?php
					  $img = $obj_c->get_front_image($product->id);
					 
                   $inputwidth = 300;
                  $inputheight = 300;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>

					 
					 <center><img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"></center>
                         
					 </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                            <!--<li class="pro-cart-icon">
                              <form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
							  
                                <button title="Add to Cart"  name="add_to_cart"><span></span>Add to Cart</button>
                              </form>
                            </li>-->
							 <li class="pro-wishlist-icon active"><a class="wishlist_btn"  id="<?php echo $product->id?>" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                  
                </div>
		 <?php  }} ?>
<!--------------------------------------->


                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mt-xs-30">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part mb-30 mb-xs-15">
                    <h2 class="main_title heading"><span>New products </span></h2>
                  </div>
                </div>
              </div>
              <div class="pro_cat">
                <div class="row">
                  <div class="owl-carousel best-seller-pro">
                     <?php 	
			 $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>19]);
              
 
			  // $products=$obj_m->fetch_all("products");
	     //print_r($products);
		 if($products !=null){
			 foreach($products as $product){
				 		 
				
				
				 
	  ?>
			   <div class="item">
                  <div class="product-item">
                    <div class="main-label new-label"><span>New</span></div>
				   <div class="main-label sale-label"><span>Sale</span></div>
                     <div class="product-image" > <a href="product-detail.php?p_id=<?php echo $product->id?>"> 
					 <?php
					  $img = $obj_c->get_front_image($product->id);
					 
                   $inputwidth = 300;
                  $inputheight = 300;
                 list($width,$height) = getimagesize($img);

             if (($width/$height) > ($inputwidth/$inputheight)) {
             $outputwidth = $inputwidth;
             $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }
			?>

					 
					 <center><img  id="scream" src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"></center>
                         
					 </a>
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
							
                            <!--<li class="pro-cart-icon">
                              <form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
							  
                                <button title="Add to Cart"  name="add_to_cart"><span></span>Add to Cart</button>
                              </form>
                            </li>-->
							 <li class="pro-wishlist-icon active"><a class="wishlist_btn"  id="<?php echo $product->id?>" title="Wishlist"></a></li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                  
                </div>
		 <?php  }} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  Special products Products Slider Block End  -->

    <!--Blog Block Start -->
    <section class="pb-70">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30 mb-xs-15">
              <h2 class="main_title heading"><span>Latest News</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="blog" class="owl-carousel">
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="">
                <div class="blog-media"> 
                  <img src="images/blog_img1.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div> 
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a> 
                </div>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item mb-md-30">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="images/blog_img2.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="images/blog_img3.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>  
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="images/blog_img4.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="images/blog_img5.jpg" alt="Stylexpo">
                  <div class="blog-effect"></div>  
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-item">
                <div class="blog-media"> 
                  <img src="images/blog_img6.jpg" alt="Stylexpo"> 
                  <div class="blog-effect"></div>
                  <a href="single-blog.html" title="Click For Read More" class="read">&nbsp;</a>
                </div>
                <div class="mt-30">
                  <div class="blog-detail"> 
                    <div class="blog-title"><a href="single-blog.html">MAURIS LACINIA LECTUS</a></div>
                    <div class="post-info">
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.</p>
                      <ul>
                        <li>
                          <a href="#">0 comment(s)</a>
                        </li>
                        <li>
                          <a href="single-blog.html">Read more 
                            <i class="fa fa-angle-double-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Blog Block End -->

    <!-- Brand logo block Start  -->
    <div class="brand-logo">
      <div class="container">
        <div class="row">
          <div class="col-12 ">
            <div class="heading-part mb-30 mb-xs-15">
              <h2 class="main_title heading"><span>Our Brands</span></h2>
            </div>
          </div>
        </div>
        <div class="row brand">
          <div class="col-md-12">
            <div id="brand-logo" class="owl-carousel align_center">
              <div class="item"><a href="#"><img src="images/brand1.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand2.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand3.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand4.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand5.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand6.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand7.png" alt="Stylexpo"></a></div>
              <div class="item"><a href="#"><img src="images/brand8.png" alt="Stylexpo"></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Brand logo block End  -->
  <!-- CONTAINER END -->
<?php include("footer.php");?>

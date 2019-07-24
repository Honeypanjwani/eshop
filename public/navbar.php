<?php ob_start();?>
<div id="newslater-popup" class="mfp-hide white-popup-block open align-center">
  <div class="nl-popup-main">
    <div class="nl-popup-inner">
      <div class="newsletter-inner">
        <span>Sign up & get 10% off</span>
        <h2 class="main_title">Subscribe Emails</h2>
        <form>
          <input type="email" placeholder="Email Here...">
          <button class="btn-black" title="Subscribe">Subscribe</button>
        </form>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
    </div>
  </div>
</div>
<div class="main">


  <!-- HEADER START -->
  <header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="top-link top-link-left select-dropdown">
			
              <fieldset>
			    <!---------------google translater code start----------------->			

<!---------------google translater code end----------------->
                <!--<select name="speed"  class="countr option-drop">
                  <option  selected="selected"></option>
                    <div id="google_translate_element" style="position:initial;"></div>
                </select>-->

              </fieldset>
            </div>
          </div>
          <div class="col-6">
            <div class="top-right-link right-side">
              <ul>
                <li class="login-icon content">
                  <a class="content-link">
                  <span class="content-icon"></span> 
                  </a> 
				  <!------------------------------------------>
				                       <!-- <li class="login-icon"><a href="login.html" title="Login"><i class="fa fa-user"></i> Login</a></li>
                      <li class="register-icon"><a href="register.html" title="Register"><i class="fa fa-user-plus"></i> Register</a></li>-->
				  <!------------------------------------->
                  <a href="customer-login.php" title="Login">Login</a> or
                  <a href="customer-register.php" title="Register">Register</a>

                  <div class="content-dropdown">
                    <ul>

					  <?php if(isset($_SESSION["customer_token"])){ ?>
<li class="myaccount-icon"><a href="my-account.php" title="My Account" style="font-size:12px;"> <i class="fa fa-user"></i> My Account</a></li>
<li class="logout-icon"><a href="logout.php" title="Logout"><i class="fa fa-share-square-o"></i>Logout</a></li>

<?php }else{?>
<li class="login-icon">
<a href="customer-login.php" title="Login"><i class="fa fa-user"></i>Login</a>

</li>
<li class="register-icon">
<a href="customer-register.php" title="Register"><i class="fa fa-user-plus"></i>Register</a>
</li>
<?php }?>
	
                    </ul>
                  </div>
                </li>
                <li class="track-icon">
                  <a href="#" title="Track your order"><span></span> Track your order</a>
                </li>
                <li class="gift-icon">
                  <a href="#" title="Gift card"><span></span> Gift card</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle">
      <div class="container">
        <hr>
        <div class="row">
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="header-middle-left">
              <div class="navbar-header float-none-sm">
                <a class="navbar-brand page-scroll" href="index.php">
                  <img alt="Stylexpo" src="images/logo.png">
                </a> 
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-lgmd-60per">
            <div class="header-right-part">
              <div class="category-dropdown select-dropdown">
                <fieldset>
                  <select id="search-category" class="option-drop" name="search-category">
                    <option value="">All Categories</option>
                    <?php $category=$obj_m->fetch_all("categories");

					if($category!=null){
						
						foreach($category as $cats){
							
					?>                   
				   <option value="20"><?php echo $cats->name;?></option>
				   <?php }}?>
				   </select>
                </fieldset>
              </div>
              <div class="main-search">
                <div class="header_search_toggle desktop-view">
                  <form action="search.php"  method="post">
                    <div class="search-box">
                      <input class="input-text" name="product" id="tags" type="text" placeholder="Search entire store here...">
                      <button class="search-btn"></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
              <ul>
                <li class="compare-icon">
                  <a href="compare.html">
                    <span></span>
                  </a>
                </li>
                <li class="wishlist-icon">
                  <a href="wishlist1.php">
                    <span></span>
                  </a>
                </li>
                <li class="cart-icon"> <a href="cart.php"> 
				
				 				<!------------------------------->
							<?php if(isset($_SESSION["customer_token"])){ 
								$cid=isset($_SESSION["id"])?$_SESSION["id"]:null;
							?>
			<span> 
				<small class="cart-notification">

				<?php// echo isset($_SESSION['cart_item'])?count($_SESSION['cart_item']):0;?>
				<?php echo $obj_m->countCart($cid); ?>
				</small> </span>
			
			<?php } ?>
				<!------------------------------->
				 </a>
                  <div class="cart-dropdown header-link-dropdown">
                    <ul class="cart-list link-dropdown-list">
                      <!-------------------------->
					  
					<?php 
					$items=$obj_m->fetch_where("cart",["p_id","quantity","size","color"],["c_id"=>$cid]);
					//print_r($items);
					$prices=[];
					if(isset($items)){
					foreach ($items as $row) {
						$pid=$row->p_id;
						$quantity=$row->quantity;
						$size=$row->size;
						$color=$row->color;
					
					$p_info=$obj_m->fetch_where("products",["title","sale_price","price"],["id"=>$pid]);
					?>
						<li>
							<?php foreach ($p_info as $p) {?>
											  <a class="close-cart" href="cart-product-remove.php?pid=<?php echo $pid ?>&cid=<?php echo $cid ?>" style="color:red;"><i class="fa fa-times-circle" title="Remove Item From Cart"></i></a>
					</a>
                        <div class="media"> <a class="pull-left"> <img src="<?php echo $obj_c->get_front_image($pid)?>" width="70" style="padding:10px 25px;"></a>
                          <div class="media-body"> <span><a href="#"><?php echo $p->title?></a></span>
                            <p class="cart-price"><?php echo $p->sale_price?></p>
                            <div class="product-qty">
                              <label>Qty:</label>

                              <div class="custom-qty">
							  <p><?php echo $row->quantity?></p>
                                
                              </div>
                            </div>
                          </div>
                        </div>
						

							
							<?php } ?>
						</li>
					<?php } ?>
						<!--<tr>
							<td colspan="2"><strong>Grand Total</strong></td>
							<td colspan="4" align="right"><h4><i class="fa fa-rupee"></i>&nbsp;<?php echo array_sum($prices)?>/-</h4></td>
						</tr>-->
						
					<?php }else{?>	
						<li>
							<p align="center">Product not in cart</p>
						</li>
					<?php }?>
					  <!------------------------------>
                      <!--<li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                        <div class="media"> <a class="pull-left"> <img alt="Stylexpo" src="images/2.jpg"></a>
                          <div class="media-body"> <span><a href="#">Black African Print Skirt</a></span>
                            <p class="cart-price">$14.99</p>
                            <div class="product-qty">
                              <label>Qty:</label>
                              <div class="custom-qty">
                                <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>-->
                    </ul>						 <p class="cart-sub-totle"> <span class="pull-left"><!--Cart Subtotal--></span> <span class="pull-right"><strong class="price-box"><?php 
								 ($row->quantity*$p->sale_price);
								$prices[]=($row->quantity*$p->sale_price);
								 array_sum($prices)
								?></strong></span> </p>
                    <div class="clearfix"></div>
                    <div class="mt-20"> <a href="cart.html" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
                  </div>
                </li>
                <li class="side-toggle">
                  <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom"> 
      <div class="container">
        <div class="row position-r">
          <div class="col-xl-2 col-lg-3 col-lgmd-20per position-initial">
            <div class="sidebar-menu-dropdown home">
              <a class="btn-sidebar-menu-dropdown"><span></span> Categories </a>
              <div id="cat" class="cat-dropdown">
                <div class="sidebar-contant">
                  <div id="menu" class="navbar-collapse collapse" >
                    <div class="top-right-link mobile right-side">
                      <ul>
                        <li class="login-icon content">
                          <a class="content-link">
                          <span class="content-icon"></span> 
                          </a> 
                          <a href="customer-login.php" title="Login">Login</a> or
                          <a href="customer-register.php" title="Register">Register</a>
                         <!-- <div class="content-dropdown">
                            <ul>
                              <li class="login-icon"><a href="login.php" title="Login"><i class="fa fa-user"></i> Login2</a></li>
                              <li class="register-icon"><a href="register.html" title="Register"><i class="fa fa-user-plus"></i> Register</a></li>
                            </ul>
                          </div>-->
						  <!------------------>
						  <div class="content-dropdown">
                    <ul>

					  <?php if(isset($_SESSION["customer_token"])){ ?>
<li class="myaccount-icon"><a href="my-account.php" title="My Account" style="font-size:13px;"> <i class="fa fa-user"></i> My Account</a></li>
<li class="logout-icon"><a href="logout.php" title="Logout"><i class="fa fa-share-square-o"></i>Logout</a></li>

<?php }else{?>
<li class="login-icon">
<a href="customer-login.php" title="Login"><i class="fa fa-user"></i>Login</a>

</li>
<li class="register-icon">
<a href="customer-register.php" title="Register"><i class="fa fa-user-plus"></i>Register</a>
</li>
<?php }?>
	
                    </ul>
                  </div>
						  <!------------------>
                        </li>
                        <li class="track-icon">
                          <a title="Track your order"><span></span> Track your order</a>
                        </li>
                        <li class="gift-icon">
                          <a href="#" title="Gift card"><span></span> Gift card</a>
                        </li>
                      </ul>
                    </div>
                    <ul class="nav navbar-nav "><!--
                      <li class="level sub-megamenu">
                        <span class="opener plus"></span>
                        <a href="shop.html" class="page-scroll"><i class="fa fa-female"></i>Fashion (10)</a>
                        <div class="megamenu mobile-sub-menu">
                          <div class="megamenu-inner-top">
                            <ul class="sub-menu-level1">
                              <li class="level2">
                                <a href="shop.html"><span>Kids Fashion</span></a>
                                <ul class="sub-menu-level2 ">
                                  <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                                  <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                                </ul>
                              </li>
                              <li  class="level2">
                                <div class="sub-menu-slider d-none d-lg-block ">
                                  <div class="row">
                                    <div class="owl-carousel sub_menu_slider">
                                      <div class="product-item">
                                        <div class="product-image"> 
                                          <a href="product-page.html"> 
                                            <img src="images/2.jpg" alt="Stylexpo"> 
                                          </a>
                                          <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                              <ul>
                                                <li class="pro-cart-icon">
                                                  <form>
                                                    <button title="Add to Cart"><span></span></button>
                                                  </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>
                                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="product-item-details">
                                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> 
                                          </div>
                                          <div class="price-box"> <span class="price">$80.00</span>  
                                          </div>
                                          <div class="rating-summary-block right-side">
                                            <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="product-item">
                                        <div class="product-image"> 
                                          <a href="product-page.html"> 
                                            <img src="images/6.jpg" alt="Stylexpo"> 
                                          </a>
                                          <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                              <ul>
                                                <li class="pro-cart-icon">
                                                  <form>
                                                    <button title="Add to Cart"><span></span></button>
                                                  </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>
                                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="product-item-details">
                                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                          <div class="price-box"> <span class="price">$80.00</span>              
                                          </div>
                                          <div class="rating-summary-block right-side">
                                            <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="product-item">
                                        <div class="product-image"> 
                                          <a href="product-page.html"> 
                                            <img src="images/8.jpg" alt="Stylexpo"> 
                                          </a>
                                          <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                              <ul>
                                                <li class="pro-cart-icon">
                                                  <form>
                                                    <button title="Add to Cart"><span></span></button>
                                                  </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>
                                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="product-item-details">
                                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                          <div class="price-box"> <span class="price">$80.00</span>  
                                          </div>
                                          <div class="rating-summary-block right-side">
                                            <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="product-item">
                                        <div class="product-image"> 
                                          <a href="product-page.html"> 
                                            <img src="images/10.jpg" alt="Stylexpo"> 
                                          </a>
                                          <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                              <ul>
                                                <li class="pro-cart-icon">
                                                  <form>
                                                    <button title="Add to Cart"><span></span></button>
                                                  </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>
                                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                                              </ul>
                                            </div>
                                          </div>                  
                                        </div>
                                        <div class="product-item-details">
                                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                          <div class="price-box"> <span class="price">$80.00</span> 
                                          </div>
                                          <div class="rating-summary-block right-side">
                                            <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="product-item">
                                        <div class="product-image"> 
                                          <a href="product-page.html"> 
                                            <img src="images/16.jpg" alt="Stylexpo"> 
                                          </a>
                                          <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                              <ul>
                                                <li class="pro-cart-icon">
                                                  <form>
                                                    <button title="Add to Cart"><span></span></button>
                                                  </form>
                                                </li>
                                                <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"></a></li>
                                                <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="product-item-details">
                                          <div class="product-item-name"> <a href="product-page.html">Defyant Reversible Dot Shorts</a> </div>
                                          <div class="price-box"> <span class="price">$80.00</span>
                                          </div>
                                          <div class="rating-summary-block right-side">
                                            <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li class="level">
                        <a href="shop.html" class="page-scroll"><i class="fa fa-camera-retro"></i>Cameras (70)</a>
                      </li>
                      <li class="level">
                        <a href="shop.html" class="page-scroll">
                          <i class="fa fa-desktop"></i>computers (10)<div class="menu-label"><span class="hot-menu"> Hot </span></div> 
                        </a>
                      </li>
                      <li class="level sub-megamenu">
                        <span class="opener plus"></span>
                        <a href="shop.html" class="page-scroll"><i class="fa fa-clock-o"></i>Wathches (15)</a>
                          <div class="megamenu mobile-sub-menu">
                            <div class="megamenu-inner-top">
                              <ul class="sub-menu-level1">
                                <li class="level2">
                                  <a href="shop.html"><span>Men Fashion</span></a>
                                  <ul class="sub-menu-level2">
                                    <li class="level3"><a href="shop.html"><span>■</span>Dresses</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                                  </ul>
                                </li>
                                <li class="level2">
                                  <a href="shop.html"><span>Women Fashion</span></a>
                                  <ul class="sub-menu-level2 ">
                                    <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                                  </ul>
                                </li>
                                <li class="level2 d-none d-lg-block">
                                  <a href="shop.html">
                                    <img src="images/drop_banner.jpg" alt="Stylexpo">
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                      </li>
                      <li class="level">
                        <a href="shop.html" class="page-scroll">
                          <i class="fa fa-shopping-bag"></i>Bags (18)<div class="menu-label"><span class="new-menu"> New </span></div>
                        </a>
                      </li>-->
					                      <?php $category=$obj_m->fetch_all("categories");

					if($category!=null){
						
						foreach($category as $cat){
							
					?>  
                      <li class="level sub-megamenu ">
                        <span class="opener plus"></span>
                                         
				   
						<a href="shop.html" class="page-scroll"><i class="fa fa fa-female"></i>
						<?php echo $cat->name;?>
						</a>

                        <div class="megamenu mobile-sub-menu">
                            <div class="megamenu-inner-top">
                              <ul class="sub-menu-level1">



<?php $sub_categories=$obj_m->fetch_where("sub_categories",array("*"),array("cat_id"=>$cat->id));
					  if($sub_categories!=null){
						  
						  foreach($sub_categories as $subcat){
							  

					  ?>                              
							  <li class="level2">

							   <a href="product.php?subcatid=<?php echo $subcat->id;?>"><span><?php echo $subcat->name;?></span></a>
                                  <ul class="sub-menu-level2">
								  <?php $brand=$obj_m->fetch_where("brands",array("*"),array("sub_cat_id"=>$subcat->id));
								  if($brand!=null){
									  foreach($brand as $brnds){
										  // print_r($brand);
									
								  
								   ?>
								    <li class="level3">
									<a href="product.php?subcatid=<?php echo $brnds->id;?>"><span>■</span><?php echo $brnds->name;?></a>

									</li>
								  <?php }} ?>
                                   	<!--<li><a href="shop.html"><span>■</span>Dresses</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>-->
                                  </ul>
                                </li>
					<?php }}?>
								<!----

								
                                <li class="level2">
                                  <a href="shop.html"><span>Men Clothings</span></a>
                                  <ul class="sub-menu-level2 ">
                                    <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                                  </ul>
                                </li>
                                <li class="level2">
                                  <a href="shop.html"><span>Juniors kid</span></a>
                                  <ul class="sub-menu-level2 ">
                                    <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                                    <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                                  </ul>
                                </li>-->
                              </ul>
                            </div>
                        </div>
                      </li>
					  						<?php }}?>
                      <!--<li class="level">
                        <a href="shop.html" class="page-scroll"><i class="fa fa-heart"></i>Software</a>
                      </li>
                      <li class="level "><a href="shop.html" class="page-scroll"><i class="fa fa-headphones"></i>Headphone (12)</a></li>
                      <li class="level">
                        <a href="shop.html" class="page-scroll"><i class="fa fa-microphone"></i>Accessories (70)</a>
                      </li>
                      <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-bolt"></i>Printers & Ink</a></li>-->
                      <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-plus-square"></i>More Categories</a></li>
                    </ul>
                    <div class="header-top mobile">
                      <div class="">
                        <div class="row">
                          <div class="col-12">
                            <div class="top-link top-link-left select-dropdown ">

                              <!--<fieldset>
							  <div  style="position:initial;"></div>
                                <select name="speed" class="country option-drop">
                                  <option selected="selected" id="google_translate_element">English</option>
                                  <option>Frence</option>
                                  <option>German</option>
                                </select>
                                <select name="speed" class="currency option-drop">
                                  <option selected="selected">USD</option>
                                  <option>EURO</option>
                                  <option>POUND</option>
                                </select>
                              </fieldset>-->
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="top-link right-side">
							<?php $address= $obj_m->fetch_all("address");
			     if($address !=null){
					 foreach($address as $addres){
						 
						
			?>
              <div class="help-num" >Need Help? : <?php echo $addres->number;?></div>
				 <?php }}?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-lgmd-60per">
            <div class="bottom-inner">
              <div class="position-r">          
                <div class="nav_sec position-r">
                  <div class="mobilemenu-title mobilemenu">
                    <span>Menu</span>
                    <i class="fa fa-bars pull-right"></i>
                  </div>
                  <div class="mobilemenu-content">
                    <ul class="nav navbar-nav" id="menu-main">
                      <?php $categories=$obj_m->fetch_all("categories");
					  if($categories!=null){
						  
						  foreach($categories as $cat){
							  

					  ?>
                 <li class="level dropdown ">
                        <span class="opener plus"></span>
                        <a href="#" class="page-scroll"><span><?php echo $cat->name;?></span></a>
                        <div class="megamenu mobile-sub-menu">
                          <div class="megamenu-inner-top">
                            <ul class="sub-menu-level1">
                              <li class="level2">
                                <ul class="sub-menu-level2">
                                  <?php 
			$sub_categories=$obj_m->fetch_where("sub_categories",array("*"),array("cat_id"=>$cat->id));
			if($sub_categories!=null){
				foreach($sub_categories as $subcat){
			?>
								  <li class="level3"><a href="product.php?subcatid=<?php echo $subcat->id;?>"><span>■</span><?php echo $subcat->name;?></a></li>
			<?php }}?>
                                </ul>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </li>
					  <?php }} ?>
                           
					  
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-3 col-lgmd-20per">
            <div class="right-side float-left-xs header-right-link">
            <div class="right-side">
			<?php $address= $obj_m->fetch_all("address");
			     if($address !=null){
					 foreach($address as $addres){
						 
						
			?>
              <div class="help-num" >Need Help? : <?php echo $addres->number;?></div>
				 <?php }}?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="popup-links ">
      <div class="popup-links-inner">
        <ul>
          <li class="categories">
            <a class="popup-with-form" href="#categories_popup"><span class="icon"></span><span class="icon-text">Categories</span></a>
          </li>
          <li class="cart-icon">
            <a class="popup-with-form" href="#cart_popup"><span class="icon"></span><span class="icon-text">Cart</span></a>
          </li>
          <li class="account">
            <a class="popup-with-form" href="#account_popup"><span class="icon"></span><span class="icon-text">Account</span></a>
          </li>
          <li class="search">
            <a class="popup-with-form" href="#search_popup"><span class="icon"></span><span class="icon-text">Search</span></a>
          </li>
          <li class="scroll scrollup">
            <a href="#"><span class="icon"></span><span class="icon-text">Scroll-top</span></a>
          </li>
        </ul>
      </div>
      <div id="popup_containt">
        <div id="categories_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>categories</span></h2>
          </div>
          <div class="popup-detail">
		  
		    <?php $category=$obj_m->fetch_all("categories");

					if($category!=null){
						
						foreach($category as $cat){
							
							  
							
					?>  
                    
            <ul class="cate-inner">
              <li class="level sub-megamenu">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-female"></i><?php echo $cat->name;?></a>
                <div class="megamenu  mega-sub-menu">
                  <div class="megamenu-inner-top">
				  <?php
				  
							$sub_categories=$obj_m->fetch_where("sub_categories",array("*"),array("cat_id"=>$cat->id));
					  if($sub_categories!=null){
						  
						  foreach($sub_categories as $subcat){
				  ?>
                    <ul class="sub-menu-level1">
                      <li class="level2">
                        <ul class="sub-menu-level2 ">
                          <li class="level3"><a href="#"><span>■</span><?php echo $subcat->name;?></a></li>
                          <!--<li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                          <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>-->
                        </ul>
                      </li>
                    </ul>
					  <?php }}?>
                  </div>
                </div>
              </li>
              <!--<li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-camera-retro"></i>Cameras (70)</a>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-desktop"></i>computers (10)</a>
              </li>
              <li class="level sub-megamenu">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-clock-o"></i>Wathches (15)</a>
                  <div class="megamenu mega-sub-menu">
                    <div class="megamenu-inner-top">
                      <ul class="sub-menu-level1">
                        <li class="level2">
                          <ul class="sub-menu-level2">
                            <li class="level3"><a href="shop.html"><span>■</span>Dresses</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-shopping-bag"></i>Bags (18)</a>
              </li>
              <li class="level sub-megamenu ">
                <span class="opener plus"></span>
                <a href="shop.html" class="page-scroll"><i class="fa fa-tablet"></i>Smartphones (20)</a>
                <div class="megamenu mega-sub-menu">
                    <div class="megamenu-inner-top">
                      <ul class="sub-menu-level1">
                        <li class="level2">
                          <ul class="sub-menu-level2">
                            <li class="level3"><a href="shop.html"><span>■</span>Dresses</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Jeans</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Skirts</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Tops</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sleepwear</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Jeans</a></li>
                          </ul>
                        </li>
                        <li class="level2">
                          <ul class="sub-menu-level2 ">
                            <li class="level3"><a href="shop.html"><span>■</span>Blazer & Coat</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Sport Shoes</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Phone Cases</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Trousers</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Purse</a></li>
                            <li class="level3"><a href="shop.html"><span>■</span>Wallets</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                </div>
              </li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-heart"></i>Software</a>
              </li>
              <li class="level "><a href="shop.html" class="page-scroll"><i class="fa fa-headphones"></i>Headphone (12)</a></li>
              <li class="level">
                <a href="shop.html" class="page-scroll"><i class="fa fa-microphone"></i>Accessories (70)</a>
              </li>
              <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-bolt"></i>Printers & Ink</a></li>
              <li class="level"><a href="shop.html" class="page-scroll"><i class="fa fa-plus-square"></i>More Categories</a></li>-->
            </ul>
					<?php }}?>
          </div>  
        </div>
        <div id="cart_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>cart</span></h2>
          </div>
          <div class="popup-detail">
            <div class="cart-dropdown ">
              <ul class="cart-list link-dropdown-list">
                <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                  <div class="media"> <a class="pull-left"> <img alt="Stylexpo" src="images/1.jpg"></a>
                    <div class="media-body"> <span><a href="#">Black African Print Skirt</a></span>
                      <p class="cart-price">$14.99</p>
                      <div class="product-qty">
                        <label>Qty:</label>
                        <div class="custom-qty">
                          <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                  <div class="media"> <a class="pull-left"> <img alt="Stylexpo" src="images/2.jpg"></a>
                    <div class="media-body"> <span><a href="#">Black African Print Skirt</a></span>
                      <p class="cart-price">$14.99</p>
                      <div class="product-qty">
                        <label>Qty:</label>
                        <div class="custom-qty">
                          <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">$29.98</strong></span> </p>
              <div class="clearfix"></div>
              <div class="mt-20"> <a href="cart.html" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
            </div>
          </div>
        </div>
        <div id="account_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Account</span></h2>
          </div>
          <div class="popup-detail">
            <div class="row">
              <div class="col-lg-4">
                <a href="my-account.php">
                  <div class="account-inner mb-30">
                    <i class="fa fa-user"></i><br/>
                    <span>Account</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="register.html">
                  <div class="account-inner mb-30">
                    <i class="fa fa-user-plus"></i><br/>
                    <span>Register</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="cart.html">
                  <div class="account-inner mb-30">
                    <i class="fa fa-shopping-bag"></i><br/>
                    <span>Shopping</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="account.html#step4">
                  <div class="account-inner">
                    <i class="fa fa-key"></i><br/>
                    <span>Change Pass</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="account.html#step3">
                  <div class="account-inner">
                    <i class="fa fa-history"></i><br/>
                    <span>history</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4">
                <a href="login.html">
                  <div class="account-inner">
                    <i class="fa fa-share-square-o"></i><br/>
                    <span>log out</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="search_popup" class="white-popup-block mfp-hide popup-position">
          <div class="popup-title">
            <h2 class="main_title heading"><span>Search</span></h2>
          </div>            
          <div class="popup-detail">
            <div class="main-search">
              <div class="header_search_toggle desktop-view">
                <form>
                  <div class="search-box">
                    <input class="input-text"  type="text" placeholder="Search entire store here...">
                    <button class="search-btn"></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- HEADER END -->  
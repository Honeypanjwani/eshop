<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php 
if(!isset($_GET["p_id"]) || empty($_GET["p_id"])){
	die("error 404");
}
$id=$_GET["p_id"];
ini_set('display_errors', 1);
?>


<?php include("header.php");?>
<?php include("navbar.php");?>
<!-------------------------->
 <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title"><?php echo $obj_c->get_name_where_id("brands",$id);?></h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index-2.html">Home</a>/</li>
            <li><span>Women</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END --> 

  <!-- CONTAIN START -->
  <section class="pt-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
			            <div class="col-lg-5 col-md-5 mb-xs-30">
						              <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
			
			
			<!-------------->
							
				<?php $product_media=$obj_m->fetch_where("media",array("path"),array("product_id"=>$id));
			//print_r($product_media);
			//if($product_media !=null){
				//foreach($product_media as $image){
						
			?>
			
			<!---------------------------honney--------------------------------------->
			<?php $ima = $obj_m->fetch_where("media",array("path"),array("product_id"=>$id));
                                     if(isset($ima)){  
									 foreach($ima as $bag_image){
										// print_r($bag_image);
  $img = $bag_image->path;
  //$img=ltrim(strchr($bag_image->path , "/") , "/");
 // print_r($img);
  $inputwidth = 300;
  $inputheight = 300;
  list($width,$height) = getimagesize($img);

           if (($width/$height) > ($inputwidth/$inputheight)) {
            $outputwidth = $inputwidth;
            $outputheight = ($inputwidth * $height)/ $width;
            }
	 	
	     	 elseif (($width/$height) < ($inputwidth/$inputheight)) {
            $outputwidth = ($inputheight * $width)/ $height;
            $outputheight = $inputheight;   }										 ?>
									<!--<img src="<?php// echo $img;  ?>" width="<?php //echo $outputwidth ?>" height="<?php //echo $outputheight  ?>" alt="">-->
												  <a href="<?php echo $img; ?>"><img src="<?php echo $img?>" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>" alt="Stylexpo"></a> 
									 <?php  }}?>
			
			<!------------------------honney--------------------------------------->
			
			

				
			<?php //}} ?>			

			<!------------->
			</div>
			</div>
            <div class="col-lg-7 col-md-7">
              <div class="row">
			  <?php $products=$obj_m->fetch_where("products",array("*"),array("id"=>$id));
                        if($products !=null){
							foreach($products as $product){
								
										 
					// print_r($products);
							       			
							?>
							<form action="addtocart.php?action=add&code=<?php echo $product->product_code;?>" method="post">
                <div class="col-12">
                  <div class="product-detail-main">
                    <div class="product-item-details">
				   
					  <h1 class="product-item-name" name="title_name"><?php echo $product->title;?></h1>
					  
                      <div class="rating-summary-block">
                        <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                      </div>
                      <div class="price-box"> 
					  <span class="price" name="price">Rs:-<?php echo $product->sale_price;?></span> 
					  <del class="price old-price">Rs:- <?php echo $product->price?></del>
                       <input type="hidden" name="hidden_price" value="<?php echo $product->sale_price;?>">
					    
						<input type="hidden" name="hidden_name" value="<?php echo $product->title; ?>" />

						<input type="hidden" name="hidden_id" value="<?php echo $product->id; ?>" />
					  </div>
                      <div class="product-info-stock-sku">
                        <div>
                          <label>Availability: </label>
                          <span class="info-deta"> In stock<?php $product->status;?></span> 
                        </div>
                        <div>
                          <label>SKU: </label>
                          <span class="info-deta">20MVC-18</span> 
                        </div>
                      </div>
                      <p><?php echo $product->descriptions?></p>
					  
                      <?php /*
					  $category=$obj_m->fetch_all("categories");
					if($category!=null){
						
						foreach($category as $cat){
							
					If($cat =="shirt" || $cat == "jeans" || $cat == "kurta" || $cat == "Ethnic Wear"){*/
					  ?>
               					  <!---------------------->
					  <div class="product-size select-arrow input-box select-dropdown mb-20 mt-30">

						  

                        <label>Size</label>
                        <fieldset>
                          <select class="selectpicker form-control option-drop" id="select-by-size">

						  	  <?php 
						 //$product_size=$obj_m->fetch_all("size");
						  //id sizes product_id 
						  $product_size = $obj_m->fetch_where_2("size",array("*"),array("product_id"=>$id));
	
						  
						 // $product_size=$obj_m->fetch_where("size",array("*"),array("id"=>$id));
						 
						  
						   if($product_size !=
						   null){
							   foreach($product_size as $sizes){
								  	   
						  ?>
                            <option selected="selected" value="#"><?php echo $sizes->sizes;?></option>
						<?php }}?>
						  
                          </select>
                        </fieldset>
						
                      </div>
					  <?php //}}}?>
					  <!---------------------->
					
                      <div class="product-color select-arrow input-box select-dropdown mb-20">
                        <label>Color</label>
                        <fieldset>
                          <select class="selectpicker form-control option-drop" id="select-by-color" name="color">
						  <?php $product_color=$obj_m->fetch_where("colors",array("name","id"),array("product_id"=>$id));
						  //print_r($product_color);
						   if($product_color !=null){
							   foreach($product_color as $color){
								   //print_r($color);
								   
						  ?>
                            <option selected="selected" value="#"><?php echo $color->name;?></option>
						<?php }}?>
                          </select>
                        </fieldset>
                      </div>
                      <div class="mb-20">
                        <div class="product-qty">
                          <label for="qty">Qty:</label>
                          <div class="custom-qty">
						  <fieldset>
                          <select class="selectpicker form-control" id="qty" name="quantity">
						  
						     <?php for($i=1;$i<=$product->stock;$i++){?>
							 
                            <option><?php echo $i;?></option>
							 <?php }?>
                          </select>
						  <!------------------>
						 
                        </fieldset>
                            <!--<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
							<input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">

                            <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>-->
                          </div>
						  <!--------->
						  <!---------->
                        </div>
                        <div class="bottom-detail cart-button">
                          <ul>
                            <li class="pro-cart-icon">
                              
                                <button title="Add to Cart" value="Add to Cart" name="add_to_cart" class="btn-color"><span></span>Add to Cart</button>
                              
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="bottom-detail">
                        <ul>
                          <li class="pro-wishlist-icon"><a href="wishlist.html"><span></span>Wishlist</a></li>
                          <li class="pro-compare-icon"><a href="compare.html"><span></span>Compare</a></li>
                          <li class="pro-email-icon"><a href="#"><span></span>Email to Friends</a></li>
                        </ul>
                      </div>
                      <div class="share-link">
                        <label>Share This : </label>
                        <div class="social-link">
                          <ul class="social-icon">
                          <ul class="social-icon">
                            <li><a class="facebook" title="Facebook" href="#"><i class="fa fa-facebook"> </i></a></li>
                            <li><a class="twitter" title="Twitter" href="#"><i class="fa fa-twitter"> </i></a></li>
                            <li><a class="linkedin" title="Linkedin" href="#"><i class="fa fa-linkedin"> </i></a></li>
                            <li><a class="rss" title="RSS" href="#"><i class="fa fa-rss"> </i></a></li>
                            <li><a class="pinterest" title="Pinterest" href="#"><i class="fa fa-pinterest"> </i></a></li>
                          </ul>
                        </div>
                      </div>
					  

                    </div>
                  </div>
                </div>
				</form>
									  <?php } }     ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="brand-logo-pro align-center mb-30">
            <img src="images/brand5.png" alt="Stylexpo">
          </div>
          <div class="sub-banner-block align-center">
            <img src="images/pro-banner.jpg" alt="Stylexpo">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ptb-70">
    <div class="container">
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-lg-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" title="Description">Description</a></li>
                <li><a class="tab-Product-Tags" title="Product-Tags">Product-Tags</a></li>
                <li><a class="tab-Reviews" title="Reviews">Reviews</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected ">
                      <div class="Description"> <strong>The standard Lorem Ipsum passage, used since the 1500s</strong><br />
                        <p>Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into Stylexponic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets</p>
                        <p>Tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="items-Product-Tags"><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong><br />
                      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</div>
                  </li>
                  <li>
                    <div class="items-Reviews">
                      <div class="comments-area">
                        <h4>Comments<span>(2)</span></h4>
                        <ul class="comment-list mt-30">
                          <li>
                            <div class="comment-user"> <img src="images/comment-user.jpg" alt="Stylexpo"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                            <ul class="comment-list child-comment">
                              <li>
                                <div class="comment-user"> <img src="images/comment-user.jpg" alt="Stylexpo"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                              <li>
                                <div class="comment-user"> <img src="images/comment-user.jpg" alt="Stylexpo"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <div class="comment-user"> <img src="images/comment-user.jpg" alt="Stylexpo"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="main-form mt-30">
                        <h4>Leave a comments</h4>
                        <form >
                          <div class="row mt-30">
                            <div class="col-md-4 mb-30">
                              <input type="text" placeholder="Name" required>
                            </div>
                            <div class="col-md-4 mb-30">
                              <input type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-4 mb-30">
                              <input type="text" placeholder="Website" required>
                            </div>
                            <div class="col-12 mb-30">
                              <textarea cols="30" rows="3" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 mb-30">
                              <button class="btn btn-color" name="submit" type="submit">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-70">
    <div class="container">
      <div class="product-listing">
        <div class="row">
          <div class="col-12">
            <div class="heading-part mb-40">
              <h2 class="main_title heading"><span>Related Products</span></h2>
            </div>
          </div>
        </div>
        <div class="pro_cat">
          <div class="row">
            <div class="owl-carousel pro-cat-slider">
              <div class="item">
                <div class="product-item">
                  <div class="main-label new-label"><span>New</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/10.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/13.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label new-label"><span>New</span></div>
                  <div class="main-label sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/4.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="product-image"> <a href="product-page.html"> <img src="images/5.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/6.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="product-image"> <a href="product-page.html"> <img src="images/8.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label new-label"><span>New</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/9.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/11.jpg" alt="Stylexpo"> </a>
                    <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
              <div class="item">
                <div class="product-item">
                  <div class="main-label new-label"><span>New</span></div>
                  <div class="main-label sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.html"> <img src="images/2.jpg" alt="Stylexpo"> </a>
                  <div class="product-detail-inner">
                      <div class="detail-inner-left align-center">
                        <ul>
                          <li class="pro-cart-icon">
                            <form>
                              <button title="Add to Cart"><span></span>Add to Cart</button>
                            </form>
                          </li>
                          <li class="pro-wishlist-icon "><a href="wishlist.html" title="Wishlist"></a></li>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<!-------------------------->

  
  <?php include("footer.php");?>
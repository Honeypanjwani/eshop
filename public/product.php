<?php 
include("../autoload.php");
$db=new Db;
$obj_m=new Model($db);
$obj_c=new Controller($obj_m);
?>
<?php include("header.php");?>
<?php include("navbar.php");?>

<?php 
if(!isset($_GET["subcatid"]) || empty($_GET["subcatid"])){	
	die("try again something wrong");	
}
$id=$_GET["subcatid"];
$cid=isset($_SESSION["id"])?$_SESSION["id"]:null;
?>  
  <!-- Bread Crumb STRAT -->
  <div class="banner inner-banner1 ">
    <div class="container">
      <section class="banner-detail center-xs">
        <h1 class="banner-title"><?php echo $obj_c->get_name_where_id("sub_categories",$id); ?></h1>
        <div class="bread-crumb right-side float-none-xs">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span><?php echo $obj_c->get_name_where_id("sub_categories",$id); ?></span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- Bread Crumb END -->  
  <!-- CONTAIN START -->
  <section class="ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-3 mb-sm-30 col-lgmd-20per">
          <div class="sidebar-block">
            <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3><span>Categories</span></h3>
              </div>
              <div class="sidebar-contant">
               <?php $catgory=$obj_m->fetch_all("categories");
			    if($catgory !=null){
					foreach($catgory as $catgorys){
						//print_r($catgorys);
			   ?>
			   <ul>
                  <li><a href="#"><?php echo $catgorys->name;?> <span>(21)</span></a></li>
                  
                </ul>
				<?php 	}}?>
              </div>
            </div>
            <div class="sidebar-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3><span>Shop by</span></h3> 
              </div>
              <div class="sidebar-contant">
               <!-- <div class="price-range mb-30">
                  <div class="inner-title">Price range</div>
				  	
				    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                  <input class="price-txt" type="text" id="amount">
                  <div id="slider-range"></div>
				  
                </div>-->
				<div class="list-group">
					<h3>Price</h3>
					<!--<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="slider-range"></div>-->
					<p>
				  <label for="amount">Price range:</label>
				  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
				</p>
				 
				<div id="slider-range"></div>
 
                </div>	
                <div class="size mb-20">
                  <div class="inner-title">Size</div>
  <?php

$product_id="";
					//$category=$obj_m->fetch_all("categories");
					  //$result = $obj_m->fetch_all("brands");
					  //$result = $obj_m->fetch_where("size",["*"],["product_id"=>$id]);
					 
					 // print_r($result);
                   /*
					if($result!=null){

                    foreach($result as $row)
                    {*/
                    ?>
                <!--    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php //echo $row->sizes; ?>"  > <?php //echo $row->sizes; ?></label>
                    </div>-->
                    <?php
                  //  }}

                    ?>                
				<ul >
                    <li><a href="#">S (10)</a></li>
                    <li><a href="#">M (05)</a></li>
                    <li><a href="#">L (10)</a></li>
                    <li><a href="#">XL (08)</a></li>
                    <li><a href="#">XXL (05)</a></li>
                  </ul>
                </div>
                <div class="mb-20">
                  <div class="inner-title">Color</div>
                  <?php
					  $results = $obj_m->fetch_where_2("colors",array("*"),array("product_id"=>$id));
					//  print_r($results);
                   
					if($results!=null){

                    foreach($results as $rows)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $rows->name; ?>"  > <?php echo $rows->name; ?></label>
                    </div>
                    <?php
                    }}

                    ?>
                  
				  <ul>
                    <li><a href="#">Black <span>(0)</span></a></li>
                    <li><a href="#">Blue <span>(05)</span></a></li>
                    <li><a href="#">Brown <span>(10)</span></a></li>
                  </ul>
                </div>
                <div class="mb-20">
                  <div class="inner-title" >Manufacture</div>
				  <?php


					//$category=$obj_m->fetch_all("categories");
					  //$result = $obj_m->fetch_all("brands");
					  $result = $obj_m->fetch_where("brands",["*"],["sub_cat_id"=>$id]);
					  //print_r($result);
                   
					if($result!=null){

                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row->name; ?>"  > <?php echo $row->name; ?></label>
                    </div>
                    <?php
                    }}

                    ?>
                  <!--<ul>
                    <li><a href="#">Augue congue <span>(0)</span></a></li>
                    <li><a href="#">Eu magna <span>(05)</span></a></li>
                    <li><a href="#">Ipsum sit <span>(10)</span></a></li>
                  </ul>-->
                </div>
                <a href="#" class="btn btn-color">Refine</a> </div>
            </div>
            <div class="sidebar-box mb-40 d-none d-lg-block"> 
              <a href="#"> 
                <img src="images/left-banner.jpg" alt="Stylexpo"> 
              </a> 
            </div>
            <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
              <!--<div class="sidebar-title">
                <h3><span>Best Selle</span>r</h3> 
              </div>-->
              <div class="sidebar-contant">
                <ul>
                  <!--<li>
                    <div class="pro-media"> <a href="#"><img alt="T-shirt" src="images/1.jpg"></a> </div>
                    <div class="pro-detail-info"> <a href="#">Black African Print</a>
                      <div class="rating-summary-block">
                        <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                      </div>
                      <div class="price-box"> <span class="price">$80.00</span> </div>
                      <div class="cart-link">
                        <form>
                          <button title="Add to Cart">Add To Cart</button>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="pro-media"> <a href="#"><img alt="T-shirt" src="images/1.jpg"></a> </div>
                    <div class="pro-detail-info"> <a href="#">Black African Print</a>
                      <div class="rating-summary-block">
                        <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                      </div>
                      <div class="price-box"> <span class="price">$80.00</span> </div>
                      <div class="cart-link">
                        <form>
                          <button title="Add to Cart">Add To Cart</button>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="pro-media"> <a href="#"><img alt="T-shirt" src="images/1.jpg"></a> </div>
                    <div class="pro-detail-info"> <a href="#">Black African Print</a>
                      <div class="rating-summary-block">
                        <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                      </div>
                      <div class="price-box"> <span class="price">$80.00</span> </div>
                      <div class="cart-link">
                        <form>
                          <button title="Add to Cart">Add To Cart</button>
                        </form>
                      </div>
                    </div>
                  </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-lgmd-80per"> 
          <div class="shorting mb-30">
            <div class="row">
              <div class="col-lg-6">
                <div class="view">
                  <div class="list-types grid active "> <a href="shop.html">
                    <div class="grid-icon list-types-icon"></div>
                    </a> 
                  </div>
                  <div class="list-types list"> <a href="shop-list.html">
                    <div class="list-icon list-types-icon"></div>
                    </a> 
                  </div>
                </div>
                <div class="short-by float-right-sm"> <span>Sort By :</span>
                  <div class="select-item select-dropdown">
                    <fieldset>
                      <select  name="speed" id="sort-price" class="option-drop">
                        <option value="" selected="selected">Name (A to Z)</option>
                        <option value="">Name(Z - A)</option>
                        <option value="">price(low&gt;high)</option>
                        <option value="">price(high &gt; low)</option>
                        <option value="">rating(highest)</option>
                        <option value="">rating(lowest)</option>
                      </select>
                    </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="show-item right-side float-left-sm"> <span>Show :</span>
                  <div class="select-item select-dropdown">
                    <fieldset>
                      <select  name="speed" id="show-item" class="option-drop">
                        <option value="" selected="selected">24</option>
                        <option value="">12</option>
                        <option value="">6</option>
                      </select>
                    </fieldset>
                  </div>
                  <span>Per Page</span>
                  <div class="compare float-right-sm"> <a href="#" class="btn btn-color">Compare (0)</a> </div>
                </div>
              </div>
            </div>
          </div>
		  
		  <!-------------//-........................///////////////////----------->
		  
		  
          <div class="product-listing">
            <div class="inner-listing">
			 <div class="row filter_data">
                  
                </div>
              <div class="row">
               				<!----------//---->
              <?php  /* $products=$obj_m->fetch_where("products",["*"],["sub_cat_id"=>$id]);
			   if($products !=null){
					foreach($products as $product){
						 */
			  ?>
			  <?php  $per_page="10";
		     $count = $obj_m->page_where("products" , ["*"] , ["sub_cat_id"=>$id]);
		    if(isset($count)){
			 $pages=floor($count / $per_page);
             $page=(isset($_GET['page'])) ? intval($_GET['page']) : 1;
             $start=($page-1) * $per_page;
			 $products = $obj_m->fetch_where_pagination("products" , ["*"] , ["sub_cat_id"=>$id] , $start ,$per_page);	
               if($products != null){
				foreach($products as $product){		 
		       ?>
                <div class="col-md-4 col-6 item-width mb-30">
                  <div class="product-item">
                   <!-- <div class="main-label sale-label"><span>Sale</span></div>-->
					
                    <div class="product-image">
					<!------------------------------------------------->
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
                   <center>
				   
				   <a href="product-detail.php?p_id=<?php echo $product->id;?>">
				   <img src="<?php echo $img;?>" alt="Stylexpo" width="<?php echo $outputwidth ?>" height="<?php echo $outputheight  ?>"> </a></center>
					 
					 <!--<center><img  id="scream" src="<?php //echo $img;?>" alt="Stylexpo" width="<?php //echo $outputwidth ?>" height="<?php// echo $outputheight  ?>"></center>-->
					<!------------------------------------------------->
					<!--<a href="product-detail.php?p_id=<?php //echo $product->id;?>"> <img src="<?php //echo $obj_c->get_front_image($product->id);?>" alt="Stylexpo"> </a>-->
					
                      <div class="product-detail-inner">
                        <div class="detail-inner-left align-center">
                          <ul>
                           <!-- <li class="pro-cart-icon">
                              <form>
                                <button title="Add to Cart"><span></span>Add to Cart</button>
                              </form>
                            </li>-->
                            <li class="pro-wishlist-icon ">
							<a id="<?php echo $product->id;?>" class="wishlist_btn" title="Wishlist"></a>
							</li>
                            <li class="pro-compare-icon"><a href="compare.html" title="Compare"></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="product-item-details">
                      <div class="product-item-name"> <a href="product-detail.php?p_id=<?php echo $product->id;?>"><?php echo $product->title;?></a> </div>
                      <div class="price-box"> <span class="price">Rs:-<?php echo $product->sale_price;?></span> <del class="price old-price">Rs:-<?php echo $product->price;?></del> </div>
                    </div>
                  </div>
                </div>
			<?php }}  }?>
				<!----------//---->
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="pagination-bar">
				    <?php  
//previous button coading
$previous=$page-1;
if($page>1){ ?>
	<a class="button" href="product.php?subcatid=<?php echo $id ?>&page=<?php echo $previous ?>subcatid=<?php echo $id; ?>">Previous</a>&nbsp;
	<?php } 
	       else{
		echo " ";
		} ?>
<?php
//for($x=1;$x<$pages;$x++){
for($i = $page; $i <= min($page + 11, $pages); $i++){
	echo ($i==$page) ? '<a class="active button" href="?page='.$i.'&subcatid='.$id.'& subcatid='.$id.'">'. $i . '</a></b> ' : '<a class="button" href="?page='.$i.'&subcatid='.$id.'& subcatid='.$id.'">'. $i . '</a> '  ;
}
?>
<?php
//next button coading
$next=$page+1;
if($page!=$pages){ ?>
       <a class="button" href="product.php?subcatid=<?php echo $id; ?>page=<?php echo $next; ?>subcatid=<?php echo $id; ?>">Next</a>&nbsp;
	<?php  }
	else{
		echo " ";
		}
 ?>
				  <!--
                    <ul>
                      <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  <!-----------------/////---------->
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  <?php include("footer.php");?>
	
<?php
$this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/header');
?>
<!---->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="" contenteditable="false"></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active" contenteditable="false"></li>
        <li data-target="#myCarousel" data-slide-to="2" class="" contenteditable="false"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item" style="">
            <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 's1.jpg' ?>" alt="" class="">
            <div class="carousel-caption">
                <h4 class="">First Slide Title</h4>
                <p class="">
                   Description for First Slide, this First Slide.
                </p>
            </div>
        </div>
        <div class="item active">
           <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 's2.jpg' ?>" alt="" class="">
            <div class="carousel-caption">
                <h4 class="">Second Slide Title</h4>

                <p class="">
                   Description for Second Slide, this is Second Slide.
                </p>
            </div>
        </div>
        <div class="item" style="">
           <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 's1.jpg' ?>" alt="" class="">
            <div class="carousel-caption">
                <h4 class="">Third Slide Title</h4>

                            <p class="">
                   Description for Third Slide, this is Third Slide.
                </p>
            </div>
        </div>
    </div>    

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
   <i class="fa fa-angle-right" aria-hidden="true"></i>
    </a>


</div>

<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
<script src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_JS_PATH . 'jquery.vide.min.js' ?>"></script>

<!--content-->
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Special Offers</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <!--<div class="tab-head ">
            <nav class="nav-sidebar">
                <ul class="nav tabs ">
                    <?php $i = 0;
                    foreach ($sub_categories as $sub) {
                        $i++; ?>
                        <li class="<?php if($i==1){ echo "active"; } ?>"><a href="#tab<?php echo $i; ?>" id="gf" data-toggle="tab"><?php echo $sub['subServiceTitle'];?></a></li>
                        <?php
                        if ($i == 3) {
                            break;
                        }
                    } ?>
                </ul>
            </nav>
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class=" con-w3l">
                        <?php $i = 0;
                         foreach ($products1 as $product) {
                            $i++; ?>
                            <div class="col-md-3 pro-1">
                                <div class="col-m">
                                    <button data-toggle="modal" data-target="#myModal" class="offer-img"
                                            onclick="show_poll_popup('<?php echo $product['productName']; ?>','<?php echo $product['productDesc']; ?>','<?php echo $product['productOfferPrice']; ?>','<?php echo $product['productWeightGm']; ?>','<?php echo $product['productImageName']; ?>','<?php echo $product['productShortDescription']; ?>');">
                                        <img src="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>"
                                             class="img-responsive" alt="" style="height:200px; width:100%;object-fit: cover;">
                                    </button>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?php echo BASE_URL.$product['subServiceCode'].'/'.$product['productModel']?>"><?php echo $product['productName']; ?></a>(<?php echo $product['productWeightGm']; ?> g)</h6>
                                        </div>
                                        <div class="mid-2">
                                            <p><label> ₹<?php echo $product['productDesc']; ?></label><em class="item_price">
                                                    ₹<?php echo $product['productOfferPrice']; ?></em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add add-2">
                                            <button onclick="addtoCart('<?php echo $product['PKProductID']; ?>','<?php echo $product['productOfferPrice']; ?>');" class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo $product['PKProductID']; ?>"
                                                    data-name="<?php echo $product['productName']; ?>" data-summary="summary 1" data-price="<?php echo $product['productOfferPrice']; ?>"
                                                    data-quantity="1" data-image="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>">Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($i == 4) {
                                break;
                            }
                        } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab2">
                    <div class=" con-w3l">
                        <?php $i = 0;
                          foreach ($products2 as $product) {
                            $i++; ?>
                            <div class="col-md-3 pro-1">
                                <div class="col-m">
                                    <button data-toggle="modal" data-target="#myModal" class="offer-img"
                                            onclick="show_poll_popup('<?php echo $product['productName']; ?>','<?php echo $product['productDesc']; ?>','<?php echo $product['productOfferPrice']; ?>','<?php echo $product['productWeightGm']; ?>','<?php echo $product['productImageName']; ?>','<?php echo $product['productShortDescription']; ?>');">
                                        <img src="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>"
                                             class="img-responsive" alt="" style="height:200px; width:100%;object-fit: cover;">
                                    </button>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?php echo BASE_URL.$product['subServiceCode'].'/'.$product['productModel']?>"><?php echo $product['productName']; ?></a>(<?php echo $product['productWeightGm']; ?> g)</h6>
                                        </div>
                                        <div class="mid-2">
                                            <p><label> ₹<?php echo $product['productDesc']; ?></label><em class="item_price">
                                                    ₹<?php echo $product['productOfferPrice']; ?></em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add add-2">
                                            <button onclick="addtoCart('<?php echo $product['PKProductID']; ?>','<?php echo $product['productOfferPrice']; ?>');" class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo $product['PKProductID']; ?>"
                                                    data-name="<?php echo $product['productName']; ?>" data-summary="summary 1" data-price="<?php echo $product['productOfferPrice']; ?>"
                                                    data-quantity="1" data-image="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>">Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($i == 4) {
                                break;
                            }
                        } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab3">
                    <div class=" con-w3l">
                        <?php $i = 0;
                          foreach ($products3 as $product) {
                            $i++; ?>
                            <div class="col-md-3 pro-1">
                                <div class="col-m">
                                    <button data-toggle="modal" data-target="#myModal" class="offer-img"
                                            onclick="show_poll_popup('<?php echo $product['productName']; ?>','<?php echo $product['productDesc']; ?>','<?php echo $product['productOfferPrice']; ?>','<?php echo $product['productWeightGm']; ?>','<?php echo $product['productImageName']; ?>','<?php echo $product['productShortDescription']; ?>');">
                                        <img src="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>"
                                             class="img-responsive" alt="" style="height:200px; width:100%;object-fit: cover;">
                                    </button>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="<?php echo BASE_URL.$product['subServiceCode'].'/'.$product['productModel']?>"><?php echo $product['productName']; ?></a>(<?php echo $product['productWeightGm']; ?> g)</h6>
                                        </div>
                                        <div class="mid-2">
                                            <p><label> ₹<?php echo $product['productDesc']; ?></label><em class="item_price">
                                                    ₹<?php echo $product['productOfferPrice']; ?></em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add add-2">
                                            <button onclick="addtoCart('<?php echo $product['PKProductID']; ?>','<?php echo $product['productOfferPrice']; ?>');" class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo $product['PKProductID']; ?>"
                                                    data-name="<?php echo $product['productName']; ?>" data-summary="summary 1" data-price="<?php echo $product['productOfferPrice']; ?>"
                                                    data-quantity="1" data-image="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>">Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($i == 4) {
                                break;
                            }
                        } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class=" con-w3l">
            <?php $i = 0;
            foreach ($offer_products as $product) {
                $i++; ?>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <button data-toggle="modal" data-target="#myModal" class="offer-img"
                                onclick="show_poll_popup('<?php echo $product['productName']; ?>','<?php echo $product['productDesc']; ?>','<?php echo $product['productOfferPrice']; ?>','<?php echo $product['productWeightGm']; ?>','<?php echo $product['productImageName']; ?>','<?php echo $product['productShortDescription']; ?>');">
                            <img src="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>"
                                 class="img-responsive" alt="" style="height:200px; width:100%;object-fit: cover;">
                                  <div class="offer"><p><span>Offer</span></p></div>
                        </button>
                        <div class="mid-1">
                            <div class="women">
                                <h6  style="min-height: 30px;"><a href="<?php echo BASE_URL.$product['subServiceCode'].'/'.$product['productModel']?>"><?php echo $product['productName']; ?></a>(<?php echo $product['productWeightGm']; ?> g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label> ₹<?php echo $product['productDesc']; ?></label><em class="item_price">
                                        ₹<?php echo $product['productOfferPrice']; ?></em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add add-2">
                                <button onclick="addtoCart('<?php echo $product['PKProductID']; ?>','<?php echo $product['productOfferPrice']; ?>');" class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo $product['PKProductID']; ?>"
                                        data-name="<?php echo $product['productName']; ?>" data-summary="summary 1" data-price="<?php echo $product['productOfferPrice']; ?>"
                                        data-quantity="1" data-image="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>

<!--content-->
<div class="content-mid">
    <div class="container">

        <div class="col-md-4 m-w3ls">
            <div class="col-md1 ">
                <a href="kitchen.html">
                    <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'co1.jpg' ?>"
                         class="img-responsive img" alt="">
                    <div class="big-sa">
                        <h6>New Collections</h6>
                        <h3>Season<span>ing </span></h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls1">
            <div class="col-md ">
                <a href="hold.html">
                    <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'co.jpg' ?>"
                         class="img-responsive img" alt="">
                    <div class="big-sale">
                        <div class="big-sale1">
                            <h3>Big <span>Sale</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 m-w3ls">
            <div class="col-md2 ">
                <a href="kitchen.html">
                    <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'co2.jpg' ?>"
                         class="img-responsive img1" alt="">
                    <div class="big-sale2">
                        <h3>Cooking <span>Oil</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
            <div class="col-md3 ">
                <a href="hold.html">
                    <img src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'co3.jpg' ?>"
                         class="img-responsive img1" alt="">
                    <div class="big-sale3">
                        <h3>Vegeta<span>bles</span></h3>
                        <p>It is a long established fact that a reader </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--content-->
<!-- Carousel
  ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="kitchen.html"> <img class="first-slide"
                                         src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'ba.jpg' ?>"
                                         alt="First slide"></a>
        </div>
        <div class="item">
            <a href="care.html"> <img class="second-slide "
                                      src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'ba1.jpg' ?>"
                                      alt="Second slide"></a>
        </div>
        <div class="item">
            <a href="hold.html"><img class="third-slide "
                                     src="<?php echo BASE_URL . WEBSITE_DESIGN_FRONTEND_IMAGE_PATH . 'ba2.jpg' ?>"
                                     alt="Third slide"></a>
        </div>
    </div>

</div><!-- /.carousel -->

<!--content-->
<div class="product">
    <div class="container">
        <div class="spec ">
            <h3>Latest Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class=" con-w3l">
            <?php $i = 0;
            foreach ($products as $product) {
                $i++; ?>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <button data-toggle="modal" data-target="#myModal" class="offer-img"
                                onclick="show_poll_popup('<?php echo $product['productName']; ?>','<?php echo $product['productDesc']; ?>','<?php echo $product['productOfferPrice']; ?>','<?php echo $product['productWeightGm']; ?>','<?php echo $product['productImageName']; ?>','<?php echo $product['productShortDescription']; ?>');">
                            <img src="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>"
                                 class="img-responsive" alt="" style="height:200px; width:100%;object-fit: cover;">
                        </button>
                        <div class="mid-1">
                            <div class="women">
                                <h6 style="min-height: 30px;"><a href="<?php echo BASE_URL.$product['subServiceCode'].'/'.$product['productModel']?>"><?php echo $product['productName']; ?></a>(<?php echo $product['productWeightGm']; ?> g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label> ₹<?php echo $product['productDesc']; ?></label><em class="item_price">
                                        ₹<?php echo $product['productOfferPrice']; ?></em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add add-2">
                                <button onclick="addtoCart('<?php echo $product['PKProductID']; ?>','<?php echo $product['productOfferPrice']; ?>');" class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo $product['PKProductID']; ?>"
                                        data-name="<?php echo $product['productName']; ?>" data-summary="summary 1" data-price="<?php echo $product['productOfferPrice']; ?>"
                                        data-quantity="1" data-image="<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH . $product['productImageName'] ?>">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($i == 8) {
                    break;
                }
            } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<a data-toggle="modal" data-target="#showPopupModal" id="showPopupButton" style="display: none;"></a>
<style>
    
        .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        height: 500px;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        line-height: 1;
    }
.carousel-caption h4{
    font-size:30px;
}
</style>
<script>
    
    $('#myCarousel').carousel();
    var winWidth = $(window).innerWidth();
    $(window).resize(function () {

        if ($(window).innerWidth() < winWidth) {
            $('.carousel-inner>.item>img').css({
                'min-width': winWidth, 'width': winWidth
            });
        }
        else {
            winWidth = $(window).innerWidth();
            $('.carousel-inner>.item>img').css({
                'min-width': '', 'width': ''
            });
        }
    });
</script>
<?php
$this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/footer');
?>
<script>
    function show_poll_popup(name, mrp, offcerprice, weight, image, desc) {
        $('#showPopupButton').click();
        $("#pdtName").html(name);
        $("#pricemrp").html('₹ '+mrp);
        $("#priceoffer").html('₹ '+offcerprice);
        $("#quick_desc").html(desc);
        var url='<?php echo BASE_URL . UPLOAD_PRODUCT_IMAGE_PATH ;?>'+image;
        $("#popupImage").attr("src",url);
    }
</script>

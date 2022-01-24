<?php include('/home/l0i584ahalj4/PTS.palmterracesselect.com/model/class.expert.php');

$ModelCall->where("id",$_REQUEST['eid']);
$ModelCall->where("status",1);
$HomeEvents = $ModelCall->get("tbl_events");

foreach($HomeEvents as $HomeEventsVal)
{
    ?>
<!DOCTYPE html>
<html class="html" lang="en" itemscope="" itemtype="http://schema.org/WebPage"><head>
	<meta charset="UTF-8">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title>Cart – Isquare</title>
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="dns-prefetch" href="//s.w.org">
<link rel="alternate" type="application/rss+xml" title="Isquare » Feed" href="http://www.palmterracesselect.com/uipet/feed/">
<link rel="alternate" type="application/rss+xml" title="Isquare » Comments Feed" href="http://www.palmterracesselect.com/uipet/comments/feed/">
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/www.palmterracesselect.com\/uipet\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.2.4"}};
			!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
		</script><script src="http://www.palmterracesselect.com/uipet/wp-includes/js/wp-emoji-release.min.js?ver=5.2.4" type="text/javascript" defer=""></script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
	<link rel="stylesheet" id="wp-block-library-css" href="http://www.palmterracesselect.com/uipet/wp-includes/css/dist/block-library/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-block-library-theme-css" href="http://www.palmterracesselect.com/uipet/wp-includes/css/dist/block-library/theme.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wc-block-style-css" href="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/style.css?ver=2.3.0" type="text/css" media="all">
<link rel="stylesheet" id="coblocks-frontend-css" href="http://www.palmterracesselect.com/uipet/wp-content/plugins/coblocks/dist/blocks.style.build.css?ver=1.12.0" type="text/css" media="all">
<link rel="stylesheet" id="font-awesome-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/third/font-awesome.min.css?ver=4.7.0" type="text/css" media="all">
<link rel="stylesheet" id="contact-form-7-css" href="http://www.palmterracesselect.com/uipet/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.4" type="text/css" media="all">
<link rel="stylesheet" id="select2-css" href="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/css/select2.css?ver=3.7.1" type="text/css" media="all">
<style id="woocommerce-inline-inline-css" type="text/css">
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel="stylesheet" id="simple-line-icons-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/third/simple-line-icons.min.css?ver=2.4.0" type="text/css" media="all">
<link rel="stylesheet" id="magnific-popup-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/third/magnific-popup.min.css?ver=1.0.0" type="text/css" media="all">
<link rel="stylesheet" id="slick-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/third/slick.min.css?ver=1.6.0" type="text/css" media="all">
<link rel="stylesheet" id="oceanwp-style-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/style.min.css?ver=1.7.1" type="text/css" media="all">
<link rel="stylesheet" id="oceanwp-woo-mini-cart-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/woo/woo-mini-cart.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="oceanwp-woocommerce-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/woo/woocommerce.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="oceanwp-woo-star-font-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/woo/woo-star-font.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="oceanwp-woo-quick-view-css" href="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/css/woo/woo-quick-view.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="oe-widgets-style-css" href="http://www.palmterracesselect.com/uipet/wp-content/plugins/ocean-extra/assets/css/widgets.css?ver=5.2.4" type="text/css" media="all">
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p>Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
<link rel="https://api.w.org/" href="http://www.palmterracesselect.com/uipet/wp-json/">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.palmterracesselect.com/uipet/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.palmterracesselect.com/uipet/wp-includes/wlwmanifest.xml"> 
<meta name="generator" content="WordPress 5.2.4">
<meta name="generator" content="WooCommerce 3.7.1">
<link rel="canonical" href="http://www.palmterracesselect.com/uipet/cart/">
<link rel="shortlink" href="http://www.palmterracesselect.com/uipet/?p=404">
<link rel="alternate" type="application/json+oembed" href="http://www.palmterracesselect.com/uipet/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.palmterracesselect.com%2Fuipet%2Fcart%2F">
<link rel="alternate" type="text/xml+oembed" href="http://www.palmterracesselect.com/uipet/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.palmterracesselect.com%2Fuipet%2Fcart%2F&amp;format=xml">
	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
	<meta name="robots" content="noindex,follow">
		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		<!-- OceanWP CSS -->
<style type="text/css">
/* Header CSS */#site-header.has-header-media .overlay-header-media{background-color:rgba(0,0,0,0.5)}/* WooCommerce CSS */#owp-checkout-timeline .timeline-step{color:#cccccc}#owp-checkout-timeline .timeline-step{border-color:#cccccc}
</style><style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></head>

<body class="page-template-default page page-id-404 wp-embed-responsive theme-oceanwp woocommerce-cart woocommerce-page woocommerce-js oceanwp-theme sidebar-mobile default-breakpoint has-sidebar content-right-sidebar has-topbar page-header-disabled has-breadcrumbs has-grid-list account-original-style elementor-default">

	
	<div id="outer-wrap" class="site clr">

		
		<div id="wrap" class="clr">

			

<div id="top-bar-wrap" class="clr">

	<div id="top-bar" class="clr container has-no-content">

		
		<div id="top-bar-inner" class="clr">

			

		</div><!-- #top-bar-inner -->

		
	</div><!-- #top-bar -->

</div><!-- #top-bar-wrap -->


			
<header id="site-header" class="minimal-header clr" data-height="74" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

	
		
			
			<div id="site-header-inner" class="clr container">

				
				

<div id="site-logo" class="clr" itemscope="" itemtype="http://schema.org/Brand">

	
	<div id="site-logo-inner" class="clr">

		
			<a href="http://www.palmterracesselect.com/uipet/" rel="home" class="site-title site-logo-text">Isquare</a>

		
	</div><!-- #site-logo-inner -->

	
	
</div><!-- #site-logo -->

			<div id="site-navigation-wrap" class="clr">
		
			
			
			<nav id="site-navigation" class="navigation main-navigation clr" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

				<ul id="menu-primary-menu" class="main-menu dropdown-menu sf-menu sf-js-enabled" style="touch-action: pan-y;">
			<li class="woo-menu-icon wcmenucart-toggle-custom_link toggle-cart-widget">
				
			
			<a href="http://www.palmterracesselect.com/uipet/cart/" class="wcmenucart">
				<span class="wcmenucart-count"><i class="icon-handbag"></i><span class="wcmenucart-details count">6</span></span>
			</a>

		

									</li>

			<li class="search-toggle-li"><a href="#" class="site-search-toggle search-dropdown-toggle"><span class="icon-magnifier"></span></a></li></ul>
<div id="searchform-dropdown" class="header-searchform-wrap clr">
	
<form method="get" class="searchform" id="searchform" action="http://www.palmterracesselect.com/uipet/">
	<input type="text" class="field" name="s" id="s" placeholder="Search">
	</form></div><!-- #searchform-dropdown -->
			</nav><!-- #site-navigation -->

			
			
					</div><!-- #site-navigation-wrap -->
		
		
	
				
	<div class="oceanwp-mobile-menu-icon clr mobile-right">

		
		
		
			
			<a href="http://www.palmterracesselect.com/uipet/cart/" class="wcmenucart">
				<span class="wcmenucart-count"><i class="icon-handbag"></i><span class="wcmenucart-details count">6</span></span>
			</a>

		

		
		<a href="#" class="mobile-menu">
							<i class="fa fa-bars"></i>
							<span class="oceanwp-text">Menu</span>

						</a>

		
		
		
	</div><!-- #oceanwp-mobile-menu-navbar -->


			</div><!-- #site-header-inner -->

			
			
		
				
	
</header><!-- #site-header -->


						
			<main id="main" class="site-main clr">

				
	
	<div id="content-wrap" class="container clr">

		
		<div id="primary" class="content-area clr">

			
			<div id="content" class="site-content clr">

				
				
<article class="single-page-article clr">

	
<div class="entry clr" itemprop="text">
		<div class="woocommerce"><div class="woocommerce-notices-wrapper">
	<div class="woocommerce-message" role="alert">
		<a href="http://www.palmterracesselect.com/uipet/shop/" tabindex="1" class="button wc-forward">Continue shopping</a> “Adult Pass for <?php echo $HomeEventsVal['event_name']; ?>” has been added to your cart.	</div>
</div>
<form class="woocommerce-cart-form" action="http://www.palmterracesselect.com/uipet/cart/" method="post">
	
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name">Product</th>
				<th class="product-price">Price</th>
				<th class="product-quantity">Quantity</th>
				<th class="product-subtotal">Total</th>
			</tr>
		</thead>
		<?php if($HomeEventsVal['no_of_tickets_cat_1'] != '')
		{
		?>
		<tbody>
			
								<tr class="woocommerce-cart-form__cart-item cart_item">

						<td class="product-remove">
							<a href="http://www.palmterracesselect.com/uipet/cart/?remove_item=1068c6e4c8051cfd4e9ea8072e3189e2&amp;_wpnonce=162e2e5196" class="remove" aria-label="Remove this item" data-product_id="410" data-product_sku="">×</a>						</td>

						<td class="product-thumbnail">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/" class="no-lightbox"><img width="300" height="300" src="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" sizes="(max-width: 300px) 100vw, 300px"></a>						</td>

						<td class="product-name" data-title="Product">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/">Senior Citizen Pass for <?php echo $HomeEventsVal['event_name']; ?></a>						</td>

						<td class="product-price" data-title="Price">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?php echo $HomeEventsVal['price_of_ticket_before_cat_1']; ?></span>						</td>

						<td class="product-quantity" data-title="Quantity">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
				<label class="screen-reader-text" for="quantity_5dc1abd125549">Senior Citizen Pass for <?php echo $HomeEventsVal['event_name']; ?> quantity</label>
		<input type="number" id="quantity_5dc1abd125549" class="input-text qty text" step="1" min="0" max="" name="cart[1068c6e4c8051cfd4e9ea8072e3189e2][qty]" value="6" title="Qty" size="4" inputmode="numeric"><a href="javascript:void(0)" class="plus">+</a>
			</div>
							</td>

						<td class="product-subtotal" data-title="Total">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>3,594.00</span>						</td>
					</tr>
					
			
			<tr>
				<td colspan="6" class="actions">

											<div class="coupon">
							<label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
													</div>
					
					<button type="submit" class="button" name="update_cart" value="Update cart" disabled="">Update cart</button>

					
					<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="162e2e5196"><input type="hidden" name="_wp_http_referer" value="/uipet/cart/">				</td>
			</tr>

					</tbody>
					<?php } ?>

		<?php if($HomeEventsVal['no_of_tickets_cat_2'] != '')
		{
		?>
		<tbody>
			
								<tr class="woocommerce-cart-form__cart-item cart_item">

						<td class="product-remove">
							<a href="http://www.palmterracesselect.com/uipet/cart/?remove_item=1068c6e4c8051cfd4e9ea8072e3189e2&amp;_wpnonce=162e2e5196" class="remove" aria-label="Remove this item" data-product_id="410" data-product_sku="">×</a>						</td>

						<td class="product-thumbnail">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/" class="no-lightbox"><img width="300" height="300" src="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" sizes="(max-width: 300px) 100vw, 300px"></a>						</td>

						<td class="product-name" data-title="Product">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/">Adult Pass for <?php echo $HomeEventsVal['event_name']; ?></a>						</td>

						<td class="product-price" data-title="Price">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?php echo $HomeEventsVal['price_of_ticket_before_cat_2']; ?></span>						</td>

						<td class="product-quantity" data-title="Quantity">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
				<label class="screen-reader-text" for="quantity_5dc1abd125549">Adult Pass for <?php echo $HomeEventsVal['event_name']; ?> quantity</label>
		<input type="number" id="quantity_5dc1abd125549" class="input-text qty text" step="1" min="0" max="" name="cart[1068c6e4c8051cfd4e9ea8072e3189e2][qty]" value="6" title="Qty" size="4" inputmode="numeric"><a href="javascript:void(0)" class="plus">+</a>
			</div>
							</td>

						<td class="product-subtotal" data-title="Total">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>3,594.00</span>						</td>
					</tr>
					
			
			<tr>
				<td colspan="6" class="actions">

											<div class="coupon">
							<label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
													</div>
					
					<button type="submit" class="button" name="update_cart" value="Update cart" disabled="">Update cart</button>

					
					<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="162e2e5196"><input type="hidden" name="_wp_http_referer" value="/uipet/cart/">				</td>
			</tr>

					</tbody>
					<?php } ?>
					<?php if($HomeEventsVal['no_of_tickets_cat_3'] != '')
		{
		?>
		<tbody>
			
								<tr class="woocommerce-cart-form__cart-item cart_item">

						<td class="product-remove">
							<a href="http://www.palmterracesselect.com/uipet/cart/?remove_item=1068c6e4c8051cfd4e9ea8072e3189e2&amp;_wpnonce=162e2e5196" class="remove" aria-label="Remove this item" data-product_id="410" data-product_sku="">×</a>						</td>

						<td class="product-thumbnail">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/" class="no-lightbox"><img width="300" height="300" src="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="/RWAVendor/events/photo/<?php echo $HomeEventsVal['event_pic'];?>" sizes="(max-width: 300px) 100vw, 300px"></a>						</td>

						<td class="product-name" data-title="Product">
						<a href="http://www.palmterracesselect.com/uipet/product/adult-pass-for-diwali/">Kids Pass for <?php echo $HomeEventsVal['event_name']; ?></a>						</td>

						<td class="product-price" data-title="Price">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><?php echo $HomeEventsVal['price_of_ticket_before_cat_3']; ?></span>						</td>

						<td class="product-quantity" data-title="Quantity">
							<div class="quantity buttons_added"><a href="javascript:void(0)" class="minus">-</a>
				<label class="screen-reader-text" for="quantity_5dc1abd125549">Kids Pass for <?php echo $HomeEventsVal['event_name']; ?> quantity</label>
		<input type="number" id="quantity_5dc1abd125549" class="input-text qty text" step="1" min="0" max="" name="cart[1068c6e4c8051cfd4e9ea8072e3189e2][qty]" value="6" title="Qty" size="4" inputmode="numeric"><a href="javascript:void(0)" class="plus">+</a>
			</div>
							</td>

						<td class="product-subtotal" data-title="Total">
							<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>3,594.00</span>						</td>
					</tr>
					
			
			<tr>
				<td colspan="6" class="actions">

											<div class="coupon">
							<label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
													</div>
					
					<button type="submit" class="button" name="update_cart" value="Update cart" disabled="">Update cart</button>

					
					<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="162e2e5196"><input type="hidden" name="_wp_http_referer" value="/uipet/cart/">				</td>
			</tr>

					</tbody>
					<?php } ?>
	</table>
	</form>


<div class="cart-collaterals">
	<div class="cart_totals ">

	
	<h2>Cart totals</h2>

	<table cellspacing="0" class="shop_table shop_table_responsive">

		<tbody><tr class="cart-subtotal">
			<th>Subtotal</th>
			<td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>3,594.00</span></td>
		</tr>

		
		
		
		
		
		<tr class="order-total">
			<th>Total</th>
			<td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>3,594.00</span></strong> </td>
		</tr>

		
	</tbody></table>

	<div class="wc-proceed-to-checkout">
		
<a href="http://www.palmterracesselect.com/uipet/checkout/" class="checkout-button button alt wc-forward">
	Proceed to checkout</a>
	</div>

	
</div>
</div>

</div>
	</div> 
</article>
				
			</div><!-- #content -->

			
		</div><!-- #primary -->


	</div><!-- #content-wrap -->

	

        </main><!-- #main -->

        
        
        
            
<footer id="footer" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

    
    <div id="footer-inner" class="clr">

        

<div id="footer-widgets" class="oceanwp-row clr">

	
	<div class="footer-widgets-inner container">

        			<div class="footer-box span_1_of_4 col col-1">
							</div><!-- .footer-one-box -->

							<div class="footer-box span_1_of_4 col col-2">
									</div><!-- .footer-one-box -->
						
							<div class="footer-box span_1_of_4 col col-3 ">
									</div><!-- .footer-one-box -->
			
							<div class="footer-box span_1_of_4 col col-4">
									</div><!-- .footer-box -->
			
		
	</div><!-- .container -->

	
</div><!-- #footer-widgets -->



<div id="footer-bottom" class="clr no-footer-nav">

	
	<div id="footer-bottom-inner" class="container clr">

		
		
			<div id="copyright" class="clr" role="contentinfo">
				Copyright 2019 - Isquare website			</div><!-- #copyright -->

		
	</div><!-- #footer-bottom-inner -->

	
</div><!-- #footer-bottom -->

        
    </div><!-- #footer-inner -->

    
</footer><!-- #footer -->            
        
                        
    </div><!-- #wrap -->

    
</div><!-- #outer-wrap -->



<a id="scroll-top" class="scroll-top-right" href="#"><span class="fa fa-angle-up"></span></a>


<div id="sidr-close">
	<a href="#" class="toggle-sidr-close">
		<i class="icon icon-close"></i><span class="close-text">Close Menu</span>
	</a>
</div>
    
    
<div id="mobile-menu-search" class="clr">
	<form method="get" action="http://www.palmterracesselect.com/uipet/" class="mobile-searchform">
		<input type="search" name="s" autocomplete="off" placeholder="Search">
		<button type="submit" class="searchform-submit">
			<i class="icon icon-magnifier"></i>
		</button>
			</form>
</div><!-- .mobile-menu-search -->


<div id="owp-qv-wrap">
	<div class="owp-qv-container">
		<div class="owp-qv-content-wrap">
			<div class="owp-qv-content-inner">
				<a href="#" class="owp-qv-close">×</a>
				<div id="owp-qv-content" class="woocommerce single-product"></div>
			</div>
		</div>
	</div>
	<div class="owp-qv-overlay"></div>
</div><div id="oceanwp-cart-sidebar-wrap"><div class="oceanwp-cart-sidebar"><a href="#" class="oceanwp-cart-close">×</a><p class="owp-cart-title">Cart</p><div class="divider"></div><div class="owp-mini-cart"></div></div><div class="oceanwp-cart-sidebar-overlay"></div></div>	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
			<script type="text/javascript">
			var wc_product_block_data = JSON.parse( decodeURIComponent( '%7B%22min_columns%22%3A1%2C%22max_columns%22%3A6%2C%22default_columns%22%3A3%2C%22min_rows%22%3A1%2C%22max_rows%22%3A6%2C%22default_rows%22%3A1%2C%22thumbnail_size%22%3A300%2C%22placeholderImgSrc%22%3A%22http%3A%5C%2F%5C%2Fwww.palmterracesselect.com%5C%2Fuipet%5C%2Fwp-content%5C%2Fuploads%5C%2Fwoocommerce-placeholder.png%22%2C%22min_height%22%3A500%2C%22default_height%22%3A500%2C%22isLargeCatalog%22%3Afalse%2C%22limitTags%22%3Afalse%2C%22hasTags%22%3Afalse%2C%22productCategories%22%3A%5B%7B%22term_id%22%3A17%2C%22name%22%3A%22Uncategorized%22%2C%22slug%22%3A%22uncategorized%22%2C%22term_group%22%3A0%2C%22term_taxonomy_id%22%3A17%2C%22taxonomy%22%3A%22product_cat%22%2C%22description%22%3A%22%22%2C%22parent%22%3A0%2C%22count%22%3A0%2C%22filter%22%3A%22raw%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fwww.palmterracesselect.com%5C%2Fuipet%5C%2Fproduct-category%5C%2Funcategorized%5C%2F%22%7D%2C%7B%22term_id%22%3A21%2C%22name%22%3A%22Diwali%22%2C%22slug%22%3A%22diwali%22%2C%22term_group%22%3A0%2C%22term_taxonomy_id%22%3A21%2C%22taxonomy%22%3A%22product_cat%22%2C%22description%22%3A%22%22%2C%22parent%22%3A0%2C%22count%22%3A1%2C%22filter%22%3A%22raw%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fwww.palmterracesselect.com%5C%2Fuipet%5C%2Fproduct-category%5C%2Fdiwali%5C%2F%22%7D%5D%2C%22homeUrl%22%3A%22http%3A%5C%2F%5C%2Fwww.palmterracesselect.com%5C%2Fuipet%5C%2F%22%7D' ) );
		</script>
		<script type="text/javascript">
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"http:\/\/www.palmterracesselect.com\/uipet\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.4"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/uipet\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/uipet\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/www.palmterracesselect.com\/uipet\/cart\/","is_cart":"1","cart_redirect_after_add":"yes"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4"></script>
<script type="text/javascript">
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/uipet\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/uipet\/?wc-ajax=%%endpoint%%"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.7.1"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_country_select_params = {"countries":"{\"AF\":[],\"AO\":{\"BGO\":\"Bengo\",\"BLU\":\"Benguela\",\"BIE\":\"Bi\\u00e9\",\"CAB\":\"Cabinda\",\"CNN\":\"Cunene\",\"HUA\":\"Huambo\",\"HUI\":\"Hu\\u00edla\",\"CCU\":\"Kuando Kubango\",\"CNO\":\"Kwanza-Norte\",\"CUS\":\"Kwanza-Sul\",\"LUA\":\"Luanda\",\"LNO\":\"Lunda-Norte\",\"LSU\":\"Lunda-Sul\",\"MAL\":\"Malanje\",\"MOX\":\"Moxico\",\"NAM\":\"Namibe\",\"UIG\":\"U\\u00edge\",\"ZAI\":\"Zaire\"},\"AR\":{\"C\":\"Ciudad Aut\u00f3noma de Buenos Aires\",\"B\":\"Buenos Aires\",\"K\":\"Catamarca\",\"H\":\"Chaco\",\"U\":\"Chubut\",\"X\":\"C\u00f3rdoba\",\"W\":\"Corrientes\",\"E\":\"Entre R\u00edos\",\"P\":\"Formosa\",\"Y\":\"Jujuy\",\"L\":\"La Pampa\",\"F\":\"La Rioja\",\"M\":\"Mendoza\",\"N\":\"Misiones\",\"Q\":\"Neuqu\u00e9n\",\"R\":\"R\u00edo Negro\",\"A\":\"Salta\",\"J\":\"San Juan\",\"D\":\"San Luis\",\"Z\":\"Santa Cruz\",\"S\":\"Santa Fe\",\"G\":\"Santiago del Estero\",\"V\":\"Tierra del Fuego\",\"T\":\"Tucum\u00e1n\"},\"AT\":[],\"AU\":{\"ACT\":\"Australian Capital Territory\",\"NSW\":\"New South Wales\",\"NT\":\"Northern Territory\",\"QLD\":\"Queensland\",\"SA\":\"South Australia\",\"TAS\":\"Tasmania\",\"VIC\":\"Victoria\",\"WA\":\"Western Australia\"},\"AX\":[],\"BD\":{\"BD-05\":\"Bagerhat\",\"BD-01\":\"Bandarban\",\"BD-02\":\"Barguna\",\"BD-06\":\"Barishal\",\"BD-07\":\"Bhola\",\"BD-03\":\"Bogura\",\"BD-04\":\"Brahmanbaria\",\"BD-09\":\"Chandpur\",\"BD-10\":\"Chattogram\",\"BD-12\":\"Chuadanga\",\"BD-11\":\"Cox's Bazar\",\"BD-08\":\"Cumilla\",\"BD-13\":\"Dhaka\",\"BD-14\":\"Dinajpur\",\"BD-15\":\"Faridpur \",\"BD-16\":\"Feni\",\"BD-19\":\"Gaibandha\",\"BD-18\":\"Gazipur\",\"BD-17\":\"Gopalganj\",\"BD-20\":\"Habiganj\",\"BD-21\":\"Jamalpur\",\"BD-22\":\"Jashore\",\"BD-25\":\"Jhalokati\",\"BD-23\":\"Jhenaidah\",\"BD-24\":\"Joypurhat\",\"BD-29\":\"Khagrachhari\",\"BD-27\":\"Khulna\",\"BD-26\":\"Kishoreganj\",\"BD-28\":\"Kurigram\",\"BD-30\":\"Kushtia\",\"BD-31\":\"Lakshmipur\",\"BD-32\":\"Lalmonirhat\",\"BD-36\":\"Madaripur\",\"BD-37\":\"Magura\",\"BD-33\":\"Manikganj \",\"BD-39\":\"Meherpur\",\"BD-38\":\"Moulvibazar\",\"BD-35\":\"Munshiganj\",\"BD-34\":\"Mymensingh\",\"BD-48\":\"Naogaon\",\"BD-43\":\"Narail\",\"BD-40\":\"Narayanganj\",\"BD-42\":\"Narsingdi\",\"BD-44\":\"Natore\",\"BD-45\":\"Nawabganj\",\"BD-41\":\"Netrakona\",\"BD-46\":\"Nilphamari\",\"BD-47\":\"Noakhali\",\"BD-49\":\"Pabna\",\"BD-52\":\"Panchagarh\",\"BD-51\":\"Patuakhali\",\"BD-50\":\"Pirojpur\",\"BD-53\":\"Rajbari\",\"BD-54\":\"Rajshahi\",\"BD-56\":\"Rangamati\",\"BD-55\":\"Rangpur\",\"BD-58\":\"Satkhira\",\"BD-62\":\"Shariatpur\",\"BD-57\":\"Sherpur\",\"BD-59\":\"Sirajganj\",\"BD-61\":\"Sunamganj\",\"BD-60\":\"Sylhet\",\"BD-63\":\"Tangail\",\"BD-64\":\"Thakurgaon\"},\"BE\":[],\"BG\":{\"BG-01\":\"Blagoevgrad\",\"BG-02\":\"Burgas\",\"BG-08\":\"Dobrich\",\"BG-07\":\"Gabrovo\",\"BG-26\":\"Haskovo\",\"BG-09\":\"Kardzhali\",\"BG-10\":\"Kyustendil\",\"BG-11\":\"Lovech\",\"BG-12\":\"Montana\",\"BG-13\":\"Pazardzhik\",\"BG-14\":\"Pernik\",\"BG-15\":\"Pleven\",\"BG-16\":\"Plovdiv\",\"BG-17\":\"Razgrad\",\"BG-18\":\"Ruse\",\"BG-27\":\"Shumen\",\"BG-19\":\"Silistra\",\"BG-20\":\"Sliven\",\"BG-21\":\"Smolyan\",\"BG-23\":\"Sofia\",\"BG-22\":\"Sofia-Grad\",\"BG-24\":\"Stara Zagora\",\"BG-25\":\"Targovishte\",\"BG-03\":\"Varna\",\"BG-04\":\"Veliko Tarnovo\",\"BG-05\":\"Vidin\",\"BG-06\":\"Vratsa\",\"BG-28\":\"Yambol\"},\"BH\":[],\"BI\":[],\"BO\":{\"B\":\"Chuquisaca\",\"H\":\"Beni\",\"C\":\"Cochabamba\",\"L\":\"La Paz\",\"O\":\"Oruro\",\"N\":\"Pando\",\"P\":\"Potos\\u00ed\",\"S\":\"Santa Cruz\",\"T\":\"Tarija\"},\"BR\":{\"AC\":\"Acre\",\"AL\":\"Alagoas\",\"AP\":\"Amap\u00e1\",\"AM\":\"Amazonas\",\"BA\":\"Bahia\",\"CE\":\"Cear\u00e1\",\"DF\":\"Distrito Federal\",\"ES\":\"Esp\u00edrito Santo\",\"GO\":\"Goi\u00e1s\",\"MA\":\"Maranh\u00e3o\",\"MT\":\"Mato Grosso\",\"MS\":\"Mato Grosso do Sul\",\"MG\":\"Minas Gerais\",\"PA\":\"Par\u00e1\",\"PB\":\"Para\u00edba\",\"PR\":\"Paran\u00e1\",\"PE\":\"Pernambuco\",\"PI\":\"Piau\u00ed\",\"RJ\":\"Rio de Janeiro\",\"RN\":\"Rio Grande do Norte\",\"RS\":\"Rio Grande do Sul\",\"RO\":\"Rond\u00f4nia\",\"RR\":\"Roraima\",\"SC\":\"Santa Catarina\",\"SP\":\"S\u00e3o Paulo\",\"SE\":\"Sergipe\",\"TO\":\"Tocantins\"},\"CA\":{\"AB\":\"Alberta\",\"BC\":\"British Columbia\",\"MB\":\"Manitoba\",\"NB\":\"New Brunswick\",\"NL\":\"Newfoundland and Labrador\",\"NT\":\"Northwest Territories\",\"NS\":\"Nova Scotia\",\"NU\":\"Nunavut\",\"ON\":\"Ontario\",\"PE\":\"Prince Edward Island\",\"QC\":\"Quebec\",\"SK\":\"Saskatchewan\",\"YT\":\"Yukon Territory\"},\"CH\":{\"AG\":\"Aargau\",\"AR\":\"Appenzell Ausserrhoden\",\"AI\":\"Appenzell Innerrhoden\",\"BL\":\"Basel-Landschaft\",\"BS\":\"Basel-Stadt\",\"BE\":\"Bern\",\"FR\":\"Fribourg\",\"GE\":\"Geneva\",\"GL\":\"Glarus\",\"GR\":\"Graub\u00fcnden\",\"JU\":\"Jura\",\"LU\":\"Luzern\",\"NE\":\"Neuch\u00e2tel\",\"NW\":\"Nidwalden\",\"OW\":\"Obwalden\",\"SH\":\"Schaffhausen\",\"SZ\":\"Schwyz\",\"SO\":\"Solothurn\",\"SG\":\"St. Gallen\",\"TG\":\"Thurgau\",\"TI\":\"Ticino\",\"UR\":\"Uri\",\"VS\":\"Valais\",\"VD\":\"Vaud\",\"ZG\":\"Zug\",\"ZH\":\"Z\u00fcrich\"},\"CN\":{\"CN1\":\"Yunnan \\\/ \u4e91\u5357\",\"CN2\":\"Beijing \\\/ \u5317\u4eac\",\"CN3\":\"Tianjin \\\/ \u5929\u6d25\",\"CN4\":\"Hebei \\\/ \u6cb3\u5317\",\"CN5\":\"Shanxi \\\/ \u5c71\u897f\",\"CN6\":\"Inner Mongolia \\\/ \u5167\u8499\u53e4\",\"CN7\":\"Liaoning \\\/ \u8fbd\u5b81\",\"CN8\":\"Jilin \\\/ \u5409\u6797\",\"CN9\":\"Heilongjiang \\\/ \u9ed1\u9f99\u6c5f\",\"CN10\":\"Shanghai \\\/ \u4e0a\u6d77\",\"CN11\":\"Jiangsu \\\/ \u6c5f\u82cf\",\"CN12\":\"Zhejiang \\\/ \u6d59\u6c5f\",\"CN13\":\"Anhui \\\/ \u5b89\u5fbd\",\"CN14\":\"Fujian \\\/ \u798f\u5efa\",\"CN15\":\"Jiangxi \\\/ \u6c5f\u897f\",\"CN16\":\"Shandong \\\/ \u5c71\u4e1c\",\"CN17\":\"Henan \\\/ \u6cb3\u5357\",\"CN18\":\"Hubei \\\/ \u6e56\u5317\",\"CN19\":\"Hunan \\\/ \u6e56\u5357\",\"CN20\":\"Guangdong \\\/ \u5e7f\u4e1c\",\"CN21\":\"Guangxi Zhuang \\\/ \u5e7f\u897f\u58ee\u65cf\",\"CN22\":\"Hainan \\\/ \u6d77\u5357\",\"CN23\":\"Chongqing \\\/ \u91cd\u5e86\",\"CN24\":\"Sichuan \\\/ \u56db\u5ddd\",\"CN25\":\"Guizhou \\\/ \u8d35\u5dde\",\"CN26\":\"Shaanxi \\\/ \u9655\u897f\",\"CN27\":\"Gansu \\\/ \u7518\u8083\",\"CN28\":\"Qinghai \\\/ \u9752\u6d77\",\"CN29\":\"Ningxia Hui \\\/ \u5b81\u590f\",\"CN30\":\"Macau \\\/ \u6fb3\u95e8\",\"CN31\":\"Tibet \\\/ \u897f\u85cf\",\"CN32\":\"Xinjiang \\\/ \u65b0\u7586\"},\"CZ\":[],\"DE\":[],\"DK\":[],\"EE\":[],\"ES\":{\"C\":\"A Coru\u00f1a\",\"VI\":\"Araba\\\/\u00c1lava\",\"AB\":\"Albacete\",\"A\":\"Alicante\",\"AL\":\"Almer\u00eda\",\"O\":\"Asturias\",\"AV\":\"\u00c1vila\",\"BA\":\"Badajoz\",\"PM\":\"Baleares\",\"B\":\"Barcelona\",\"BU\":\"Burgos\",\"CC\":\"C\u00e1ceres\",\"CA\":\"C\u00e1diz\",\"S\":\"Cantabria\",\"CS\":\"Castell\u00f3n\",\"CE\":\"Ceuta\",\"CR\":\"Ciudad Real\",\"CO\":\"C\u00f3rdoba\",\"CU\":\"Cuenca\",\"GI\":\"Girona\",\"GR\":\"Granada\",\"GU\":\"Guadalajara\",\"SS\":\"Gipuzkoa\",\"H\":\"Huelva\",\"HU\":\"Huesca\",\"J\":\"Ja\u00e9n\",\"LO\":\"La Rioja\",\"GC\":\"Las Palmas\",\"LE\":\"Le\u00f3n\",\"L\":\"Lleida\",\"LU\":\"Lugo\",\"M\":\"Madrid\",\"MA\":\"M\u00e1laga\",\"ML\":\"Melilla\",\"MU\":\"Murcia\",\"NA\":\"Navarra\",\"OR\":\"Ourense\",\"P\":\"Palencia\",\"PO\":\"Pontevedra\",\"SA\":\"Salamanca\",\"TF\":\"Santa Cruz de Tenerife\",\"SG\":\"Segovia\",\"SE\":\"Sevilla\",\"SO\":\"Soria\",\"T\":\"Tarragona\",\"TE\":\"Teruel\",\"TO\":\"Toledo\",\"V\":\"Valencia\",\"VA\":\"Valladolid\",\"BI\":\"Bizkaia\",\"ZA\":\"Zamora\",\"Z\":\"Zaragoza\"},\"FI\":[],\"FR\":[],\"GP\":[],\"GR\":{\"I\":\"\\u0391\\u03c4\\u03c4\\u03b9\\u03ba\\u03ae\",\"A\":\"\\u0391\\u03bd\\u03b1\\u03c4\\u03bf\\u03bb\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1 \\u03ba\\u03b1\\u03b9 \\u0398\\u03c1\\u03ac\\u03ba\\u03b7\",\"B\":\"\\u039a\\u03b5\\u03bd\\u03c4\\u03c1\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"C\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u039c\\u03b1\\u03ba\\u03b5\\u03b4\\u03bf\\u03bd\\u03af\\u03b1\",\"D\":\"\\u0389\\u03c0\\u03b5\\u03b9\\u03c1\\u03bf\\u03c2\",\"E\":\"\\u0398\\u03b5\\u03c3\\u03c3\\u03b1\\u03bb\\u03af\\u03b1\",\"F\":\"\\u0399\\u03cc\\u03bd\\u03b9\\u03bf\\u03b9 \\u039d\\u03ae\\u03c3\\u03bf\\u03b9\",\"G\":\"\\u0394\\u03c5\\u03c4\\u03b9\\u03ba\\u03ae \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"H\":\"\\u03a3\\u03c4\\u03b5\\u03c1\\u03b5\\u03ac \\u0395\\u03bb\\u03bb\\u03ac\\u03b4\\u03b1\",\"J\":\"\\u03a0\\u03b5\\u03bb\\u03bf\\u03c0\\u03cc\\u03bd\\u03bd\\u03b7\\u03c3\\u03bf\\u03c2\",\"K\":\"\\u0392\\u03cc\\u03c1\\u03b5\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"L\":\"\\u039d\\u03cc\\u03c4\\u03b9\\u03bf \\u0391\\u03b9\\u03b3\\u03b1\\u03af\\u03bf\",\"M\":\"\\u039a\\u03c1\\u03ae\\u03c4\\u03b7\"},\"GF\":[],\"HK\":{\"HONG KONG\":\"Hong Kong Island\",\"KOWLOON\":\"Kowloon\",\"NEW TERRITORIES\":\"New Territories\"},\"HU\":{\"BK\":\"B\\u00e1cs-Kiskun\",\"BE\":\"B\\u00e9k\\u00e9s\",\"BA\":\"Baranya\",\"BZ\":\"Borsod-Aba\\u00faj-Zempl\\u00e9n\",\"BU\":\"Budapest\",\"CS\":\"Csongr\\u00e1d\",\"FE\":\"Fej\\u00e9r\",\"GS\":\"Gy\\u0151r-Moson-Sopron\",\"HB\":\"Hajd\\u00fa-Bihar\",\"HE\":\"Heves\",\"JN\":\"J\\u00e1sz-Nagykun-Szolnok\",\"KE\":\"Kom\\u00e1rom-Esztergom\",\"NO\":\"N\\u00f3gr\\u00e1d\",\"PE\":\"Pest\",\"SO\":\"Somogy\",\"SZ\":\"Szabolcs-Szatm\\u00e1r-Bereg\",\"TO\":\"Tolna\",\"VA\":\"Vas\",\"VE\":\"Veszpr\\u00e9m\",\"ZA\":\"Zala\"},\"ID\":{\"AC\":\"Daerah Istimewa Aceh\",\"SU\":\"Sumatera Utara\",\"SB\":\"Sumatera Barat\",\"RI\":\"Riau\",\"KR\":\"Kepulauan Riau\",\"JA\":\"Jambi\",\"SS\":\"Sumatera Selatan\",\"BB\":\"Bangka Belitung\",\"BE\":\"Bengkulu\",\"LA\":\"Lampung\",\"JK\":\"DKI Jakarta\",\"JB\":\"Jawa Barat\",\"BT\":\"Banten\",\"JT\":\"Jawa Tengah\",\"JI\":\"Jawa Timur\",\"YO\":\"Daerah Istimewa Yogyakarta\",\"BA\":\"Bali\",\"NB\":\"Nusa Tenggara Barat\",\"NT\":\"Nusa Tenggara Timur\",\"KB\":\"Kalimantan Barat\",\"KT\":\"Kalimantan Tengah\",\"KI\":\"Kalimantan Timur\",\"KS\":\"Kalimantan Selatan\",\"KU\":\"Kalimantan Utara\",\"SA\":\"Sulawesi Utara\",\"ST\":\"Sulawesi Tengah\",\"SG\":\"Sulawesi Tenggara\",\"SR\":\"Sulawesi Barat\",\"SN\":\"Sulawesi Selatan\",\"GO\":\"Gorontalo\",\"MA\":\"Maluku\",\"MU\":\"Maluku Utara\",\"PA\":\"Papua\",\"PB\":\"Papua Barat\"},\"IE\":{\"CW\":\"Carlow\",\"CN\":\"Cavan\",\"CE\":\"Clare\",\"CO\":\"Cork\",\"DL\":\"Donegal\",\"D\":\"Dublin\",\"G\":\"Galway\",\"KY\":\"Kerry\",\"KE\":\"Kildare\",\"KK\":\"Kilkenny\",\"LS\":\"Laois\",\"LM\":\"Leitrim\",\"LK\":\"Limerick\",\"LD\":\"Longford\",\"LH\":\"Louth\",\"MO\":\"Mayo\",\"MH\":\"Meath\",\"MN\":\"Monaghan\",\"OY\":\"Offaly\",\"RN\":\"Roscommon\",\"SO\":\"Sligo\",\"TA\":\"Tipperary\",\"WD\":\"Waterford\",\"WH\":\"Westmeath\",\"WX\":\"Wexford\",\"WW\":\"Wicklow\"},\"IN\":{\"AP\":\"Andhra Pradesh\",\"AR\":\"Arunachal Pradesh\",\"AS\":\"Assam\",\"BR\":\"Bihar\",\"CT\":\"Chhattisgarh\",\"GA\":\"Goa\",\"GJ\":\"Gujarat\",\"HR\":\"Haryana\",\"HP\":\"Himachal Pradesh\",\"JK\":\"Jammu and Kashmir\",\"JH\":\"Jharkhand\",\"KA\":\"Karnataka\",\"KL\":\"Kerala\",\"MP\":\"Madhya Pradesh\",\"MH\":\"Maharashtra\",\"MN\":\"Manipur\",\"ML\":\"Meghalaya\",\"MZ\":\"Mizoram\",\"NL\":\"Nagaland\",\"OR\":\"Orissa\",\"PB\":\"Punjab\",\"RJ\":\"Rajasthan\",\"SK\":\"Sikkim\",\"TN\":\"Tamil Nadu\",\"TS\":\"Telangana\",\"TR\":\"Tripura\",\"UK\":\"Uttarakhand\",\"UP\":\"Uttar Pradesh\",\"WB\":\"West Bengal\",\"AN\":\"Andaman and Nicobar Islands\",\"CH\":\"Chandigarh\",\"DN\":\"Dadra and Nagar Haveli\",\"DD\":\"Daman and Diu\",\"DL\":\"Delhi\",\"LD\":\"Lakshadeep\",\"PY\":\"Pondicherry (Puducherry)\"},\"IR\":{\"KHZ\":\"Khuzestan  (\\u062e\\u0648\\u0632\\u0633\\u062a\\u0627\\u0646)\",\"THR\":\"Tehran  (\\u062a\\u0647\\u0631\\u0627\\u0646)\",\"ILM\":\"Ilaam (\\u0627\\u06cc\\u0644\\u0627\\u0645)\",\"BHR\":\"Bushehr (\\u0628\\u0648\\u0634\\u0647\\u0631)\",\"ADL\":\"Ardabil (\\u0627\\u0631\\u062f\\u0628\\u06cc\\u0644)\",\"ESF\":\"Isfahan (\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646)\",\"YZD\":\"Yazd (\\u06cc\\u0632\\u062f)\",\"KRH\":\"Kermanshah (\\u06a9\\u0631\\u0645\\u0627\\u0646\\u0634\\u0627\\u0647)\",\"KRN\":\"Kerman (\\u06a9\\u0631\\u0645\\u0627\\u0646)\",\"HDN\":\"Hamadan (\\u0647\\u0645\\u062f\\u0627\\u0646)\",\"GZN\":\"Ghazvin (\\u0642\\u0632\\u0648\\u06cc\\u0646)\",\"ZJN\":\"Zanjan (\\u0632\\u0646\\u062c\\u0627\\u0646)\",\"LRS\":\"Luristan (\\u0644\\u0631\\u0633\\u062a\\u0627\\u0646)\",\"ABZ\":\"Alborz (\\u0627\\u0644\\u0628\\u0631\\u0632)\",\"EAZ\":\"East Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u0634\\u0631\\u0642\\u06cc)\",\"WAZ\":\"West Azarbaijan (\\u0622\\u0630\\u0631\\u0628\\u0627\\u06cc\\u062c\\u0627\\u0646 \\u063a\\u0631\\u0628\\u06cc)\",\"CHB\":\"Chaharmahal and Bakhtiari (\\u0686\\u0647\\u0627\\u0631\\u0645\\u062d\\u0627\\u0644 \\u0648 \\u0628\\u062e\\u062a\\u06cc\\u0627\\u0631\\u06cc)\",\"SKH\":\"South Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u062c\\u0646\\u0648\\u0628\\u06cc)\",\"RKH\":\"Razavi Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0631\\u0636\\u0648\\u06cc)\",\"NKH\":\"North Khorasan (\\u062e\\u0631\\u0627\\u0633\\u0627\\u0646 \\u0634\\u0645\\u0627\\u0644\\u06cc)\",\"SMN\":\"Semnan (\\u0633\\u0645\\u0646\\u0627\\u0646)\",\"FRS\":\"Fars (\\u0641\\u0627\\u0631\\u0633)\",\"QHM\":\"Qom (\\u0642\\u0645)\",\"KRD\":\"Kurdistan \\\/ \\u06a9\\u0631\\u062f\\u0633\\u062a\\u0627\\u0646)\",\"KBD\":\"Kohgiluyeh and BoyerAhmad (\\u06a9\\u0647\\u06af\\u06cc\\u0644\\u0648\\u06cc\\u06cc\\u0647 \\u0648 \\u0628\\u0648\\u06cc\\u0631\\u0627\\u062d\\u0645\\u062f)\",\"GLS\":\"Golestan (\\u06af\\u0644\\u0633\\u062a\\u0627\\u0646)\",\"GIL\":\"Gilan (\\u06af\\u06cc\\u0644\\u0627\\u0646)\",\"MZN\":\"Mazandaran (\\u0645\\u0627\\u0632\\u0646\\u062f\\u0631\\u0627\\u0646)\",\"MKZ\":\"Markazi (\\u0645\\u0631\\u06a9\\u0632\\u06cc)\",\"HRZ\":\"Hormozgan (\\u0647\\u0631\\u0645\\u0632\\u06af\\u0627\\u0646)\",\"SBN\":\"Sistan and Baluchestan (\\u0633\\u06cc\\u0633\\u062a\\u0627\\u0646 \\u0648 \\u0628\\u0644\\u0648\\u0686\\u0633\\u062a\\u0627\\u0646)\"},\"IS\":[],\"IT\":{\"AG\":\"Agrigento\",\"AL\":\"Alessandria\",\"AN\":\"Ancona\",\"AO\":\"Aosta\",\"AR\":\"Arezzo\",\"AP\":\"Ascoli Piceno\",\"AT\":\"Asti\",\"AV\":\"Avellino\",\"BA\":\"Bari\",\"BT\":\"Barletta-Andria-Trani\",\"BL\":\"Belluno\",\"BN\":\"Benevento\",\"BG\":\"Bergamo\",\"BI\":\"Biella\",\"BO\":\"Bologna\",\"BZ\":\"Bolzano\",\"BS\":\"Brescia\",\"BR\":\"Brindisi\",\"CA\":\"Cagliari\",\"CL\":\"Caltanissetta\",\"CB\":\"Campobasso\",\"CE\":\"Caserta\",\"CT\":\"Catania\",\"CZ\":\"Catanzaro\",\"CH\":\"Chieti\",\"CO\":\"Como\",\"CS\":\"Cosenza\",\"CR\":\"Cremona\",\"KR\":\"Crotone\",\"CN\":\"Cuneo\",\"EN\":\"Enna\",\"FM\":\"Fermo\",\"FE\":\"Ferrara\",\"FI\":\"Firenze\",\"FG\":\"Foggia\",\"FC\":\"Forl\\u00ec-Cesena\",\"FR\":\"Frosinone\",\"GE\":\"Genova\",\"GO\":\"Gorizia\",\"GR\":\"Grosseto\",\"IM\":\"Imperia\",\"IS\":\"Isernia\",\"SP\":\"La Spezia\",\"AQ\":\"L'Aquila\",\"LT\":\"Latina\",\"LE\":\"Lecce\",\"LC\":\"Lecco\",\"LI\":\"Livorno\",\"LO\":\"Lodi\",\"LU\":\"Lucca\",\"MC\":\"Macerata\",\"MN\":\"Mantova\",\"MS\":\"Massa-Carrara\",\"MT\":\"Matera\",\"ME\":\"Messina\",\"MI\":\"Milano\",\"MO\":\"Modena\",\"MB\":\"Monza e della Brianza\",\"NA\":\"Napoli\",\"NO\":\"Novara\",\"NU\":\"Nuoro\",\"OR\":\"Oristano\",\"PD\":\"Padova\",\"PA\":\"Palermo\",\"PR\":\"Parma\",\"PV\":\"Pavia\",\"PG\":\"Perugia\",\"PU\":\"Pesaro e Urbino\",\"PE\":\"Pescara\",\"PC\":\"Piacenza\",\"PI\":\"Pisa\",\"PT\":\"Pistoia\",\"PN\":\"Pordenone\",\"PZ\":\"Potenza\",\"PO\":\"Prato\",\"RG\":\"Ragusa\",\"RA\":\"Ravenna\",\"RC\":\"Reggio Calabria\",\"RE\":\"Reggio Emilia\",\"RI\":\"Rieti\",\"RN\":\"Rimini\",\"RM\":\"Roma\",\"RO\":\"Rovigo\",\"SA\":\"Salerno\",\"SS\":\"Sassari\",\"SV\":\"Savona\",\"SI\":\"Siena\",\"SR\":\"Siracusa\",\"SO\":\"Sondrio\",\"SU\":\"Sud Sardegna\",\"TA\":\"Taranto\",\"TE\":\"Teramo\",\"TR\":\"Terni\",\"TO\":\"Torino\",\"TP\":\"Trapani\",\"TN\":\"Trento\",\"TV\":\"Treviso\",\"TS\":\"Trieste\",\"UD\":\"Udine\",\"VA\":\"Varese\",\"VE\":\"Venezia\",\"VB\":\"Verbano-Cusio-Ossola\",\"VC\":\"Vercelli\",\"VR\":\"Verona\",\"VV\":\"Vibo Valentia\",\"VI\":\"Vicenza\",\"VT\":\"Viterbo\"},\"IL\":[],\"IM\":[],\"JP\":{\"JP01\":\"Hokkaido\",\"JP02\":\"Aomori\",\"JP03\":\"Iwate\",\"JP04\":\"Miyagi\",\"JP05\":\"Akita\",\"JP06\":\"Yamagata\",\"JP07\":\"Fukushima\",\"JP08\":\"Ibaraki\",\"JP09\":\"Tochigi\",\"JP10\":\"Gunma\",\"JP11\":\"Saitama\",\"JP12\":\"Chiba\",\"JP13\":\"Tokyo\",\"JP14\":\"Kanagawa\",\"JP15\":\"Niigata\",\"JP16\":\"Toyama\",\"JP17\":\"Ishikawa\",\"JP18\":\"Fukui\",\"JP19\":\"Yamanashi\",\"JP20\":\"Nagano\",\"JP21\":\"Gifu\",\"JP22\":\"Shizuoka\",\"JP23\":\"Aichi\",\"JP24\":\"Mie\",\"JP25\":\"Shiga\",\"JP26\":\"Kyoto\",\"JP27\":\"Osaka\",\"JP28\":\"Hyogo\",\"JP29\":\"Nara\",\"JP30\":\"Wakayama\",\"JP31\":\"Tottori\",\"JP32\":\"Shimane\",\"JP33\":\"Okayama\",\"JP34\":\"Hiroshima\",\"JP35\":\"Yamaguchi\",\"JP36\":\"Tokushima\",\"JP37\":\"Kagawa\",\"JP38\":\"Ehime\",\"JP39\":\"Kochi\",\"JP40\":\"Fukuoka\",\"JP41\":\"Saga\",\"JP42\":\"Nagasaki\",\"JP43\":\"Kumamoto\",\"JP44\":\"Oita\",\"JP45\":\"Miyazaki\",\"JP46\":\"Kagoshima\",\"JP47\":\"Okinawa\"},\"KR\":[],\"KW\":[],\"LB\":[],\"LR\":{\"BM\":\"Bomi\",\"BN\":\"Bong\",\"GA\":\"Gbarpolu\",\"GB\":\"Grand Bassa\",\"GC\":\"Grand Cape Mount\",\"GG\":\"Grand Gedeh\",\"GK\":\"Grand Kru\",\"LO\":\"Lofa\",\"MA\":\"Margibi\",\"MY\":\"Maryland\",\"MO\":\"Montserrado\",\"NM\":\"Nimba\",\"RV\":\"Rivercess\",\"RG\":\"River Gee\",\"SN\":\"Sinoe\"},\"LU\":[],\"MD\":{\"C\":\"Chi\u0219in\u0103u\",\"BL\":\"B\u0103l\u021bi\",\"AN\":\"Anenii Noi\",\"BS\":\"Basarabeasca\",\"BR\":\"Briceni\",\"CH\":\"Cahul\",\"CT\":\"Cantemir\",\"CL\":\"C\u0103l\u0103ra\u0219i\",\"CS\":\"C\u0103u\u0219eni\",\"CM\":\"Cimi\u0219lia\",\"CR\":\"Criuleni\",\"DN\":\"Dondu\u0219eni\",\"DR\":\"Drochia\",\"DB\":\"Dub\u0103sari\",\"ED\":\"Edine\u021b\",\"FL\":\"F\u0103le\u0219ti\",\"FR\":\"Flore\u0219ti\",\"GE\":\"UTA G\u0103g\u0103uzia\",\"GL\":\"Glodeni\",\"HN\":\"H\u00eence\u0219ti\",\"IL\":\"Ialoveni\",\"LV\":\"Leova\",\"NS\":\"Nisporeni\",\"OC\":\"Ocni\u021ba\",\"OR\":\"Orhei\",\"RZ\":\"Rezina\",\"RS\":\"R\u00ee\u0219cani\",\"SG\":\"S\u00eengerei\",\"SR\":\"Soroca\",\"ST\":\"Str\u0103\u0219eni\",\"SD\":\"\u0218old\u0103ne\u0219ti\",\"SV\":\"\u0218tefan Vod\u0103\",\"TR\":\"Taraclia\",\"TL\":\"Telene\u0219ti\",\"UN\":\"Ungheni\"},\"MQ\":[],\"MT\":[],\"MX\":{\"DF\":\"Ciudad de M\u00e9xico\",\"JA\":\"Jalisco\",\"NL\":\"Nuevo Le\u00f3n\",\"AG\":\"Aguascalientes\",\"BC\":\"Baja California\",\"BS\":\"Baja California Sur\",\"CM\":\"Campeche\",\"CS\":\"Chiapas\",\"CH\":\"Chihuahua\",\"CO\":\"Coahuila\",\"CL\":\"Colima\",\"DG\":\"Durango\",\"GT\":\"Guanajuato\",\"GR\":\"Guerrero\",\"HG\":\"Hidalgo\",\"MX\":\"Estado de M\u00e9xico\",\"MI\":\"Michoac\u00e1n\",\"MO\":\"Morelos\",\"NA\":\"Nayarit\",\"OA\":\"Oaxaca\",\"PU\":\"Puebla\",\"QT\":\"Quer\u00e9taro\",\"QR\":\"Quintana Roo\",\"SL\":\"San Luis Potos\u00ed\",\"SI\":\"Sinaloa\",\"SO\":\"Sonora\",\"TB\":\"Tabasco\",\"TM\":\"Tamaulipas\",\"TL\":\"Tlaxcala\",\"VE\":\"Veracruz\",\"YU\":\"Yucat\u00e1n\",\"ZA\":\"Zacatecas\"},\"MY\":{\"JHR\":\"Johor\",\"KDH\":\"Kedah\",\"KTN\":\"Kelantan\",\"LBN\":\"Labuan\",\"MLK\":\"Malacca (Melaka)\",\"NSN\":\"Negeri Sembilan\",\"PHG\":\"Pahang\",\"PNG\":\"Penang (Pulau Pinang)\",\"PRK\":\"Perak\",\"PLS\":\"Perlis\",\"SBH\":\"Sabah\",\"SWK\":\"Sarawak\",\"SGR\":\"Selangor\",\"TRG\":\"Terengganu\",\"PJY\":\"Putrajaya\",\"KUL\":\"Kuala Lumpur\"},\"NG\":{\"AB\":\"Abia\",\"FC\":\"Abuja\",\"AD\":\"Adamawa\",\"AK\":\"Akwa Ibom\",\"AN\":\"Anambra\",\"BA\":\"Bauchi\",\"BY\":\"Bayelsa\",\"BE\":\"Benue\",\"BO\":\"Borno\",\"CR\":\"Cross River\",\"DE\":\"Delta\",\"EB\":\"Ebonyi\",\"ED\":\"Edo\",\"EK\":\"Ekiti\",\"EN\":\"Enugu\",\"GO\":\"Gombe\",\"IM\":\"Imo\",\"JI\":\"Jigawa\",\"KD\":\"Kaduna\",\"KN\":\"Kano\",\"KT\":\"Katsina\",\"KE\":\"Kebbi\",\"KO\":\"Kogi\",\"KW\":\"Kwara\",\"LA\":\"Lagos\",\"NA\":\"Nasarawa\",\"NI\":\"Niger\",\"OG\":\"Ogun\",\"ON\":\"Ondo\",\"OS\":\"Osun\",\"OY\":\"Oyo\",\"PL\":\"Plateau\",\"RI\":\"Rivers\",\"SO\":\"Sokoto\",\"TA\":\"Taraba\",\"YO\":\"Yobe\",\"ZA\":\"Zamfara\"},\"NL\":[],\"NO\":[],\"NP\":{\"BAG\":\"Bagmati\",\"BHE\":\"Bheri\",\"DHA\":\"Dhaulagiri\",\"GAN\":\"Gandaki\",\"JAN\":\"Janakpur\",\"KAR\":\"Karnali\",\"KOS\":\"Koshi\",\"LUM\":\"Lumbini\",\"MAH\":\"Mahakali\",\"MEC\":\"Mechi\",\"NAR\":\"Narayani\",\"RAP\":\"Rapti\",\"SAG\":\"Sagarmatha\",\"SET\":\"Seti\"},\"NZ\":{\"NL\":\"Northland\",\"AK\":\"Auckland\",\"WA\":\"Waikato\",\"BP\":\"Bay of Plenty\",\"TK\":\"Taranaki\",\"GI\":\"Gisborne\",\"HB\":\"Hawke\u2019s Bay\",\"MW\":\"Manawatu-Wanganui\",\"WE\":\"Wellington\",\"NS\":\"Nelson\",\"MB\":\"Marlborough\",\"TM\":\"Tasman\",\"WC\":\"West Coast\",\"CT\":\"Canterbury\",\"OT\":\"Otago\",\"SL\":\"Southland\"},\"PE\":{\"CAL\":\"El Callao\",\"LMA\":\"Municipalidad Metropolitana de Lima\",\"AMA\":\"Amazonas\",\"ANC\":\"Ancash\",\"APU\":\"Apur\u00edmac\",\"ARE\":\"Arequipa\",\"AYA\":\"Ayacucho\",\"CAJ\":\"Cajamarca\",\"CUS\":\"Cusco\",\"HUV\":\"Huancavelica\",\"HUC\":\"Hu\u00e1nuco\",\"ICA\":\"Ica\",\"JUN\":\"Jun\u00edn\",\"LAL\":\"La Libertad\",\"LAM\":\"Lambayeque\",\"LIM\":\"Lima\",\"LOR\":\"Loreto\",\"MDD\":\"Madre de Dios\",\"MOQ\":\"Moquegua\",\"PAS\":\"Pasco\",\"PIU\":\"Piura\",\"PUN\":\"Puno\",\"SAM\":\"San Mart\u00edn\",\"TAC\":\"Tacna\",\"TUM\":\"Tumbes\",\"UCA\":\"Ucayali\"},\"PH\":{\"ABR\":\"Abra\",\"AGN\":\"Agusan del Norte\",\"AGS\":\"Agusan del Sur\",\"AKL\":\"Aklan\",\"ALB\":\"Albay\",\"ANT\":\"Antique\",\"APA\":\"Apayao\",\"AUR\":\"Aurora\",\"BAS\":\"Basilan\",\"BAN\":\"Bataan\",\"BTN\":\"Batanes\",\"BTG\":\"Batangas\",\"BEN\":\"Benguet\",\"BIL\":\"Biliran\",\"BOH\":\"Bohol\",\"BUK\":\"Bukidnon\",\"BUL\":\"Bulacan\",\"CAG\":\"Cagayan\",\"CAN\":\"Camarines Norte\",\"CAS\":\"Camarines Sur\",\"CAM\":\"Camiguin\",\"CAP\":\"Capiz\",\"CAT\":\"Catanduanes\",\"CAV\":\"Cavite\",\"CEB\":\"Cebu\",\"COM\":\"Compostela Valley\",\"NCO\":\"Cotabato\",\"DAV\":\"Davao del Norte\",\"DAS\":\"Davao del Sur\",\"DAC\":\"Davao Occidental\",\"DAO\":\"Davao Oriental\",\"DIN\":\"Dinagat Islands\",\"EAS\":\"Eastern Samar\",\"GUI\":\"Guimaras\",\"IFU\":\"Ifugao\",\"ILN\":\"Ilocos Norte\",\"ILS\":\"Ilocos Sur\",\"ILI\":\"Iloilo\",\"ISA\":\"Isabela\",\"KAL\":\"Kalinga\",\"LUN\":\"La Union\",\"LAG\":\"Laguna\",\"LAN\":\"Lanao del Norte\",\"LAS\":\"Lanao del Sur\",\"LEY\":\"Leyte\",\"MAG\":\"Maguindanao\",\"MAD\":\"Marinduque\",\"MAS\":\"Masbate\",\"MSC\":\"Misamis Occidental\",\"MSR\":\"Misamis Oriental\",\"MOU\":\"Mountain Province\",\"NEC\":\"Negros Occidental\",\"NER\":\"Negros Oriental\",\"NSA\":\"Northern Samar\",\"NUE\":\"Nueva Ecija\",\"NUV\":\"Nueva Vizcaya\",\"MDC\":\"Occidental Mindoro\",\"MDR\":\"Oriental Mindoro\",\"PLW\":\"Palawan\",\"PAM\":\"Pampanga\",\"PAN\":\"Pangasinan\",\"QUE\":\"Quezon\",\"QUI\":\"Quirino\",\"RIZ\":\"Rizal\",\"ROM\":\"Romblon\",\"WSA\":\"Samar\",\"SAR\":\"Sarangani\",\"SIQ\":\"Siquijor\",\"SOR\":\"Sorsogon\",\"SCO\":\"South Cotabato\",\"SLE\":\"Southern Leyte\",\"SUK\":\"Sultan Kudarat\",\"SLU\":\"Sulu\",\"SUN\":\"Surigao del Norte\",\"SUR\":\"Surigao del Sur\",\"TAR\":\"Tarlac\",\"TAW\":\"Tawi-Tawi\",\"ZMB\":\"Zambales\",\"ZAN\":\"Zamboanga del Norte\",\"ZAS\":\"Zamboanga del Sur\",\"ZSI\":\"Zamboanga Sibugay\",\"00\":\"Metro Manila\"},\"PK\":{\"JK\":\"Azad Kashmir\",\"BA\":\"Balochistan\",\"TA\":\"FATA\",\"GB\":\"Gilgit Baltistan\",\"IS\":\"Islamabad Capital Territory\",\"KP\":\"Khyber Pakhtunkhwa\",\"PB\":\"Punjab\",\"SD\":\"Sindh\"},\"PL\":[],\"PT\":[],\"PY\":{\"PY-ASU\":\"Asunci\u00f3n\",\"PY-1\":\"Concepci\u00f3n\",\"PY-2\":\"San Pedro\",\"PY-3\":\"Cordillera\",\"PY-4\":\"Guair\u00e1\",\"PY-5\":\"Caaguaz\u00fa\",\"PY-6\":\"Caazap\u00e1\",\"PY-7\":\"Itap\u00faa\",\"PY-8\":\"Misiones\",\"PY-9\":\"Paraguar\u00ed\",\"PY-10\":\"Alto Paran\u00e1\",\"PY-11\":\"Central\",\"PY-12\":\"\u00d1eembuc\u00fa\",\"PY-13\":\"Amambay\",\"PY-14\":\"Canindey\u00fa\",\"PY-15\":\"Presidente Hayes\",\"PY-16\":\"Alto Paraguay\",\"PY-17\":\"Boquer\u00f3n\"},\"RE\":[],\"RO\":{\"AB\":\"Alba\",\"AR\":\"Arad\",\"AG\":\"Arge\u0219\",\"BC\":\"Bac\u0103u\",\"BH\":\"Bihor\",\"BN\":\"Bistri\u021ba-N\u0103s\u0103ud\",\"BT\":\"Boto\u0219ani\",\"BR\":\"Br\u0103ila\",\"BV\":\"Bra\u0219ov\",\"B\":\"Bucure\u0219ti\",\"BZ\":\"Buz\u0103u\",\"CL\":\"C\u0103l\u0103ra\u0219i\",\"CS\":\"Cara\u0219-Severin\",\"CJ\":\"Cluj\",\"CT\":\"Constan\u021ba\",\"CV\":\"Covasna\",\"DB\":\"D\u00e2mbovi\u021ba\",\"DJ\":\"Dolj\",\"GL\":\"Gala\u021bi\",\"GR\":\"Giurgiu\",\"GJ\":\"Gorj\",\"HR\":\"Harghita\",\"HD\":\"Hunedoara\",\"IL\":\"Ialomi\u021ba\",\"IS\":\"Ia\u0219i\",\"IF\":\"Ilfov\",\"MM\":\"Maramure\u0219\",\"MH\":\"Mehedin\u021bi\",\"MS\":\"Mure\u0219\",\"NT\":\"Neam\u021b\",\"OT\":\"Olt\",\"PH\":\"Prahova\",\"SJ\":\"S\u0103laj\",\"SM\":\"Satu Mare\",\"SB\":\"Sibiu\",\"SV\":\"Suceava\",\"TR\":\"Teleorman\",\"TM\":\"Timi\u0219\",\"TL\":\"Tulcea\",\"VL\":\"V\u00e2lcea\",\"VS\":\"Vaslui\",\"VN\":\"Vrancea\"},\"RS\":[],\"SG\":[],\"SK\":[],\"SI\":[],\"TH\":{\"TH-37\":\"Amnat Charoen\",\"TH-15\":\"Ang Thong\",\"TH-14\":\"Ayutthaya\",\"TH-10\":\"Bangkok\",\"TH-38\":\"Bueng Kan\",\"TH-31\":\"Buri Ram\",\"TH-24\":\"Chachoengsao\",\"TH-18\":\"Chai Nat\",\"TH-36\":\"Chaiyaphum\",\"TH-22\":\"Chanthaburi\",\"TH-50\":\"Chiang Mai\",\"TH-57\":\"Chiang Rai\",\"TH-20\":\"Chonburi\",\"TH-86\":\"Chumphon\",\"TH-46\":\"Kalasin\",\"TH-62\":\"Kamphaeng Phet\",\"TH-71\":\"Kanchanaburi\",\"TH-40\":\"Khon Kaen\",\"TH-81\":\"Krabi\",\"TH-52\":\"Lampang\",\"TH-51\":\"Lamphun\",\"TH-42\":\"Loei\",\"TH-16\":\"Lopburi\",\"TH-58\":\"Mae Hong Son\",\"TH-44\":\"Maha Sarakham\",\"TH-49\":\"Mukdahan\",\"TH-26\":\"Nakhon Nayok\",\"TH-73\":\"Nakhon Pathom\",\"TH-48\":\"Nakhon Phanom\",\"TH-30\":\"Nakhon Ratchasima\",\"TH-60\":\"Nakhon Sawan\",\"TH-80\":\"Nakhon Si Thammarat\",\"TH-55\":\"Nan\",\"TH-96\":\"Narathiwat\",\"TH-39\":\"Nong Bua Lam Phu\",\"TH-43\":\"Nong Khai\",\"TH-12\":\"Nonthaburi\",\"TH-13\":\"Pathum Thani\",\"TH-94\":\"Pattani\",\"TH-82\":\"Phang Nga\",\"TH-93\":\"Phatthalung\",\"TH-56\":\"Phayao\",\"TH-67\":\"Phetchabun\",\"TH-76\":\"Phetchaburi\",\"TH-66\":\"Phichit\",\"TH-65\":\"Phitsanulok\",\"TH-54\":\"Phrae\",\"TH-83\":\"Phuket\",\"TH-25\":\"Prachin Buri\",\"TH-77\":\"Prachuap Khiri Khan\",\"TH-85\":\"Ranong\",\"TH-70\":\"Ratchaburi\",\"TH-21\":\"Rayong\",\"TH-45\":\"Roi Et\",\"TH-27\":\"Sa Kaeo\",\"TH-47\":\"Sakon Nakhon\",\"TH-11\":\"Samut Prakan\",\"TH-74\":\"Samut Sakhon\",\"TH-75\":\"Samut Songkhram\",\"TH-19\":\"Saraburi\",\"TH-91\":\"Satun\",\"TH-17\":\"Sing Buri\",\"TH-33\":\"Sisaket\",\"TH-90\":\"Songkhla\",\"TH-64\":\"Sukhothai\",\"TH-72\":\"Suphan Buri\",\"TH-84\":\"Surat Thani\",\"TH-32\":\"Surin\",\"TH-63\":\"Tak\",\"TH-92\":\"Trang\",\"TH-23\":\"Trat\",\"TH-34\":\"Ubon Ratchathani\",\"TH-41\":\"Udon Thani\",\"TH-61\":\"Uthai Thani\",\"TH-53\":\"Uttaradit\",\"TH-95\":\"Yala\",\"TH-35\":\"Yasothon\"},\"TR\":{\"TR01\":\"Adana\",\"TR02\":\"Ad\u0131yaman\",\"TR03\":\"Afyon\",\"TR04\":\"A\u011fr\u0131\",\"TR05\":\"Amasya\",\"TR06\":\"Ankara\",\"TR07\":\"Antalya\",\"TR08\":\"Artvin\",\"TR09\":\"Ayd\u0131n\",\"TR10\":\"Bal\u0131kesir\",\"TR11\":\"Bilecik\",\"TR12\":\"Bing\u00f6l\",\"TR13\":\"Bitlis\",\"TR14\":\"Bolu\",\"TR15\":\"Burdur\",\"TR16\":\"Bursa\",\"TR17\":\"\u00c7anakkale\",\"TR18\":\"\u00c7ank\u0131r\u0131\",\"TR19\":\"\u00c7orum\",\"TR20\":\"Denizli\",\"TR21\":\"Diyarbak\u0131r\",\"TR22\":\"Edirne\",\"TR23\":\"Elaz\u0131\u011f\",\"TR24\":\"Erzincan\",\"TR25\":\"Erzurum\",\"TR26\":\"Eski\u015fehir\",\"TR27\":\"Gaziantep\",\"TR28\":\"Giresun\",\"TR29\":\"G\u00fcm\u00fc\u015fhane\",\"TR30\":\"Hakkari\",\"TR31\":\"Hatay\",\"TR32\":\"Isparta\",\"TR33\":\"\u0130\u00e7el\",\"TR34\":\"\u0130stanbul\",\"TR35\":\"\u0130zmir\",\"TR36\":\"Kars\",\"TR37\":\"Kastamonu\",\"TR38\":\"Kayseri\",\"TR39\":\"K\u0131rklareli\",\"TR40\":\"K\u0131r\u015fehir\",\"TR41\":\"Kocaeli\",\"TR42\":\"Konya\",\"TR43\":\"K\u00fctahya\",\"TR44\":\"Malatya\",\"TR45\":\"Manisa\",\"TR46\":\"Kahramanmara\u015f\",\"TR47\":\"Mardin\",\"TR48\":\"Mu\u011fla\",\"TR49\":\"Mu\u015f\",\"TR50\":\"Nev\u015fehir\",\"TR51\":\"Ni\u011fde\",\"TR52\":\"Ordu\",\"TR53\":\"Rize\",\"TR54\":\"Sakarya\",\"TR55\":\"Samsun\",\"TR56\":\"Siirt\",\"TR57\":\"Sinop\",\"TR58\":\"Sivas\",\"TR59\":\"Tekirda\u011f\",\"TR60\":\"Tokat\",\"TR61\":\"Trabzon\",\"TR62\":\"Tunceli\",\"TR63\":\"\u015eanl\u0131urfa\",\"TR64\":\"U\u015fak\",\"TR65\":\"Van\",\"TR66\":\"Yozgat\",\"TR67\":\"Zonguldak\",\"TR68\":\"Aksaray\",\"TR69\":\"Bayburt\",\"TR70\":\"Karaman\",\"TR71\":\"K\u0131r\u0131kkale\",\"TR72\":\"Batman\",\"TR73\":\"\u015e\u0131rnak\",\"TR74\":\"Bart\u0131n\",\"TR75\":\"Ardahan\",\"TR76\":\"I\u011fd\u0131r\",\"TR77\":\"Yalova\",\"TR78\":\"Karab\u00fck\",\"TR79\":\"Kilis\",\"TR80\":\"Osmaniye\",\"TR81\":\"D\u00fczce\"},\"TZ\":{\"TZ01\":\"Arusha\",\"TZ02\":\"Dar es Salaam\",\"TZ03\":\"Dodoma\",\"TZ04\":\"Iringa\",\"TZ05\":\"Kagera\",\"TZ06\":\"Pemba North\",\"TZ07\":\"Zanzibar North\",\"TZ08\":\"Kigoma\",\"TZ09\":\"Kilimanjaro\",\"TZ10\":\"Pemba South\",\"TZ11\":\"Zanzibar South\",\"TZ12\":\"Lindi\",\"TZ13\":\"Mara\",\"TZ14\":\"Mbeya\",\"TZ15\":\"Zanzibar West\",\"TZ16\":\"Morogoro\",\"TZ17\":\"Mtwara\",\"TZ18\":\"Mwanza\",\"TZ19\":\"Coast\",\"TZ20\":\"Rukwa\",\"TZ21\":\"Ruvuma\",\"TZ22\":\"Shinyanga\",\"TZ23\":\"Singida\",\"TZ24\":\"Tabora\",\"TZ25\":\"Tanga\",\"TZ26\":\"Manyara\",\"TZ27\":\"Geita\",\"TZ28\":\"Katavi\",\"TZ29\":\"Njombe\",\"TZ30\":\"Simiyu\"},\"LK\":[],\"SE\":[],\"US\":{\"AL\":\"Alabama\",\"AK\":\"Alaska\",\"AZ\":\"Arizona\",\"AR\":\"Arkansas\",\"CA\":\"California\",\"CO\":\"Colorado\",\"CT\":\"Connecticut\",\"DE\":\"Delaware\",\"DC\":\"District Of Columbia\",\"FL\":\"Florida\",\"GA\":\"Georgia\",\"HI\":\"Hawaii\",\"ID\":\"Idaho\",\"IL\":\"Illinois\",\"IN\":\"Indiana\",\"IA\":\"Iowa\",\"KS\":\"Kansas\",\"KY\":\"Kentucky\",\"LA\":\"Louisiana\",\"ME\":\"Maine\",\"MD\":\"Maryland\",\"MA\":\"Massachusetts\",\"MI\":\"Michigan\",\"MN\":\"Minnesota\",\"MS\":\"Mississippi\",\"MO\":\"Missouri\",\"MT\":\"Montana\",\"NE\":\"Nebraska\",\"NV\":\"Nevada\",\"NH\":\"New Hampshire\",\"NJ\":\"New Jersey\",\"NM\":\"New Mexico\",\"NY\":\"New York\",\"NC\":\"North Carolina\",\"ND\":\"North Dakota\",\"OH\":\"Ohio\",\"OK\":\"Oklahoma\",\"OR\":\"Oregon\",\"PA\":\"Pennsylvania\",\"RI\":\"Rhode Island\",\"SC\":\"South Carolina\",\"SD\":\"South Dakota\",\"TN\":\"Tennessee\",\"TX\":\"Texas\",\"UT\":\"Utah\",\"VT\":\"Vermont\",\"VA\":\"Virginia\",\"WA\":\"Washington\",\"WV\":\"West Virginia\",\"WI\":\"Wisconsin\",\"WY\":\"Wyoming\",\"AA\":\"Armed Forces (AA)\",\"AE\":\"Armed Forces (AE)\",\"AP\":\"Armed Forces (AP)\"},\"VN\":[],\"YT\":[],\"ZA\":{\"EC\":\"Eastern Cape\",\"FS\":\"Free State\",\"GP\":\"Gauteng\",\"KZN\":\"KwaZulu-Natal\",\"LP\":\"Limpopo\",\"MP\":\"Mpumalanga\",\"NC\":\"Northern Cape\",\"NW\":\"North West\",\"WC\":\"Western Cape\"}}","i18n_select_state_text":"Select an option\u2026","i18n_no_matches":"No matches found","i18n_ajax_error":"Loading failed","i18n_input_too_short_1":"Please enter 1 or more characters","i18n_input_too_short_n":"Please enter %qty% or more characters","i18n_input_too_long_1":"Please delete 1 character","i18n_input_too_long_n":"Please delete %qty% characters","i18n_selection_too_long_1":"You can only select 1 item","i18n_selection_too_long_n":"You can only select %qty% items","i18n_load_more":"Loading more results\u2026","i18n_searching":"Searching\u2026"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js?ver=3.7.1"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_address_i18n_params = {"locale":"{\"AE\":{\"postcode\":{\"required\":false,\"hidden\":true},\"state\":{\"required\":false}},\"AF\":{\"state\":{\"required\":false}},\"AO\":{\"postcode\":{\"required\":false,\"hidden\":true},\"state\":{\"label\":\"Province\"}},\"AT\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"AU\":{\"city\":{\"label\":\"Suburb\"},\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"State\"}},\"AX\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"BD\":{\"postcode\":{\"required\":false},\"state\":{\"label\":\"District\"}},\"BE\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false,\"label\":\"Province\"}},\"BH\":{\"postcode\":{\"required\":false},\"state\":{\"required\":false}},\"BI\":{\"state\":{\"required\":false}},\"BO\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"BS\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"CA\":{\"postcode\":{\"label\":\"Postal code\"},\"state\":{\"label\":\"Province\"}},\"CH\":{\"postcode\":{\"priority\":65},\"state\":{\"label\":\"Canton\",\"required\":false}},\"CL\":{\"city\":{\"required\":true},\"postcode\":{\"required\":false},\"state\":{\"label\":\"Region\"}},\"CN\":{\"state\":{\"label\":\"Province\"}},\"CO\":{\"postcode\":{\"required\":false}},\"CZ\":{\"state\":{\"required\":false}},\"DE\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"DK\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"EE\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"FI\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"FR\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"GP\":{\"state\":{\"required\":false}},\"GF\":{\"state\":{\"required\":false}},\"GR\":{\"state\":{\"required\":false}},\"HK\":{\"postcode\":{\"required\":false},\"city\":{\"label\":\"Town \\\/ District\"},\"state\":{\"label\":\"Region\"}},\"HU\":{\"state\":{\"label\":\"County\"}},\"ID\":{\"state\":{\"label\":\"Province\"}},\"IE\":{\"postcode\":{\"required\":false,\"label\":\"Eircode\"},\"state\":{\"label\":\"County\"}},\"IS\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"IL\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"IM\":{\"state\":{\"required\":false}},\"IT\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":true,\"label\":\"Province\"}},\"JP\":{\"postcode\":{\"priority\":65},\"state\":{\"label\":\"Prefecture\",\"priority\":66},\"city\":{\"priority\":67},\"address_1\":{\"priority\":68},\"address_2\":{\"priority\":69}},\"KR\":{\"state\":{\"required\":false}},\"KW\":{\"state\":{\"required\":false}},\"LV\":{\"state\":{\"label\":\"Municipality\",\"required\":false}},\"LB\":{\"state\":{\"required\":false}},\"MQ\":{\"state\":{\"required\":false}},\"MT\":{\"state\":{\"required\":false}},\"MZ\":{\"postcode\":{\"required\":false,\"hidden\":true},\"state\":{\"label\":\"Province\"}},\"NL\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false,\"label\":\"Province\"}},\"NG\":{\"postcode\":{\"label\":\"Postcode\",\"required\":false,\"hidden\":true},\"state\":{\"label\":\"State\"}},\"NZ\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"required\":false,\"label\":\"Region\"}},\"NO\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"NP\":{\"state\":{\"label\":\"State \\\/ Zone\"},\"postcode\":{\"required\":false}},\"PL\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"PT\":{\"state\":{\"required\":false}},\"RE\":{\"state\":{\"required\":false}},\"RO\":{\"state\":{\"label\":\"County\",\"required\":true}},\"RS\":{\"state\":{\"required\":false,\"hidden\":true}},\"SG\":{\"state\":{\"required\":false},\"city\":{\"required\":false}},\"SK\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"SI\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"SR\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"ES\":{\"postcode\":{\"priority\":65},\"state\":{\"label\":\"Province\"}},\"LI\":{\"postcode\":{\"priority\":65},\"state\":{\"label\":\"Municipality\",\"required\":false}},\"LK\":{\"state\":{\"required\":false}},\"LU\":{\"state\":{\"required\":false}},\"MD\":{\"state\":{\"label\":\"Municipality \\\/ District\"}},\"SE\":{\"postcode\":{\"priority\":65},\"state\":{\"required\":false}},\"TR\":{\"postcode\":{\"priority\":65},\"state\":{\"label\":\"Province\"}},\"UG\":{\"postcode\":{\"required\":false,\"hidden\":true},\"city\":{\"label\":\"Town \\\/ Village\",\"required\":true},\"state\":{\"label\":\"District\",\"required\":true}},\"US\":{\"postcode\":{\"label\":\"ZIP\"},\"state\":{\"label\":\"State\"}},\"GB\":{\"postcode\":{\"label\":\"Postcode\"},\"state\":{\"label\":\"County\",\"required\":false}},\"ST\":{\"postcode\":{\"required\":false,\"hidden\":true},\"state\":{\"label\":\"District\"}},\"VN\":{\"state\":{\"required\":false},\"postcode\":{\"priority\":65,\"required\":false,\"hidden\":false},\"address_2\":{\"required\":false,\"hidden\":true}},\"WS\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"YT\":{\"state\":{\"required\":false}},\"ZA\":{\"state\":{\"label\":\"Province\"}},\"ZW\":{\"postcode\":{\"required\":false,\"hidden\":true}},\"default\":{\"first_name\":{\"label\":\"First name\",\"required\":true,\"class\":[\"form-row-first\"],\"autocomplete\":\"given-name\",\"priority\":10},\"last_name\":{\"label\":\"Last name\",\"required\":true,\"class\":[\"form-row-last\"],\"autocomplete\":\"family-name\",\"priority\":20},\"company\":{\"label\":\"Company name\",\"class\":[\"form-row-wide\"],\"autocomplete\":\"organization\",\"priority\":30,\"required\":false},\"country\":{\"type\":\"country\",\"label\":\"Country\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\",\"update_totals_on_change\"],\"autocomplete\":\"country\",\"priority\":40},\"address_1\":{\"label\":\"Street address\",\"placeholder\":\"House number and street name\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line1\",\"priority\":50},\"address_2\":{\"placeholder\":\"Apartment, suite, unit etc. (optional)\",\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line2\",\"priority\":60,\"required\":false},\"city\":{\"label\":\"Town \\\/ City\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-level2\",\"priority\":70},\"state\":{\"type\":\"state\",\"label\":\"State \\\/ County\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"state\"],\"autocomplete\":\"address-level1\",\"priority\":80},\"postcode\":{\"label\":\"Postcode \\\/ ZIP\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\",\"priority\":90}},\"IN\":{\"first_name\":{\"label\":\"First name\",\"required\":true,\"class\":[\"form-row-first\"],\"autocomplete\":\"given-name\",\"priority\":10},\"last_name\":{\"label\":\"Last name\",\"required\":true,\"class\":[\"form-row-last\"],\"autocomplete\":\"family-name\",\"priority\":20},\"company\":{\"label\":\"Company name\",\"class\":[\"form-row-wide\"],\"autocomplete\":\"organization\",\"priority\":30,\"required\":false},\"country\":{\"type\":\"country\",\"label\":\"Country\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\",\"update_totals_on_change\"],\"autocomplete\":\"country\",\"priority\":40},\"address_1\":{\"label\":\"Street address\",\"placeholder\":\"House number and street name\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line1\",\"priority\":50},\"address_2\":{\"placeholder\":\"Apartment, suite, unit etc. (optional)\",\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-line2\",\"priority\":60,\"required\":false},\"city\":{\"label\":\"Town \\\/ City\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"autocomplete\":\"address-level2\",\"priority\":70},\"state\":{\"type\":\"state\",\"label\":\"State \\\/ County\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"state\"],\"autocomplete\":\"address-level1\",\"priority\":80},\"postcode\":{\"label\":\"Postcode \\\/ ZIP\",\"required\":true,\"class\":[\"form-row-wide\",\"address-field\"],\"validate\":[\"postcode\"],\"autocomplete\":\"postal-code\",\"priority\":90}}}","locale_fields":"{\"address_1\":\"#billing_address_1_field, #shipping_address_1_field\",\"address_2\":\"#billing_address_2_field, #shipping_address_2_field\",\"state\":\"#billing_state_field, #shipping_state_field, #calc_shipping_state_field\",\"postcode\":\"#billing_postcode_field, #shipping_postcode_field, #calc_shipping_postcode_field\",\"city\":\"#billing_city_field, #shipping_city_field, #calc_shipping_city_field\"}","i18n_required_text":"required","i18n_optional_text":"optional"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min.js?ver=3.7.1"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_cart_params = {"ajax_url":"\/uipet\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/uipet\/?wc-ajax=%%endpoint%%","update_shipping_method_nonce":"ed77113d3c","apply_coupon_nonce":"8498f469fb","remove_coupon_nonce":"ab8a4ad2b4"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/cart.min.js?ver=3.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/selectWoo/selectWoo.full.min.js?ver=1.0.6"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/uipet\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/uipet\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_b20afb09a0aa3dfb464819a5be563728","fragment_name":"wc_fragments_b20afb09a0aa3dfb464819a5be563728","request_timeout":"5000"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/imagesloaded.min.js?ver=3.2.0"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/third/woo/woo-scripts.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/third/magnific-popup.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/third/lightbox.min.js?ver=1.7.1"></script>
<script type="text/javascript">
/* <![CDATA[ */
var oceanwpLocalize = {"isRTL":"","menuSearchStyle":"drop_down","sidrSource":"#sidr-close, #site-navigation, #mobile-menu-search","sidrDisplace":"1","sidrSide":"left","sidrDropdownTarget":"icon","verticalHeaderTarget":"icon","customSelects":".woocommerce-ordering .orderby, #dropdown_product_cat, .widget_categories select, .widget_archive select, .single-product .variations_form .variations select","wooCartStyle":"custom_link","ajax_url":"http:\/\/www.palmterracesselect.com\/uipet\/wp-admin\/admin-ajax.php","cart_url":"http:\/\/www.palmterracesselect.com\/uipet\/cart\/","cart_redirect_after_add":"yes","view_cart":"View cart","floating_bar":"on","grouped_text":"View products"};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/main.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/third/woo/woo-quick-view.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/underscore.min.js?ver=1.8.3"></script>
<script type="text/javascript">
/* <![CDATA[ */
var _wpUtilSettings = {"ajax":{"url":"\/uipet\/wp-admin\/admin-ajax.php"}};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/wp-util.min.js?ver=5.2.4"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wc_add_to_cart_variation_params = {"wc_ajax_url":"\/uipet\/?wc-ajax=%%endpoint%%","i18n_no_matching_variations_text":"Sorry, no products matched your selection. Please choose a different combination.","i18n_make_a_selection_text":"Please select some product options before adding this product to your cart.","i18n_unavailable_text":"Sorry, this product is unavailable. Please choose a different combination."};
/* ]]> */
</script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js?ver=3.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/plugins/woocommerce/assets/js/flexslider/jquery.flexslider.min.js?ver=2.7.2"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js/third/woo/woo-mini-cart.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="http://www.palmterracesselect.com/uipet/wp-includes/js/wp-embed.min.js?ver=5.2.4"></script>
<!--[if lt IE 9]>
<script type='text/javascript' src='http://www.palmterracesselect.com/uipet/wp-content/themes/oceanwp/assets/js//third/html5.min.js?ver=1.7.1'></script>
<![endif]-->

<div id="sidr" class="sidr left" style="transition: left 0.3s ease 0s;"><div class="sidr-inner">
	<a href="#" class="sidr-class-toggle-sidr-close">
		<i class="sidr-class-icon icon-close"></i><span class="sidr-class-close-text">Close Menu</span>
	</a>
</div><div class="sidr-inner">

				<ul id="sidr-id-menu-primary-menu" class="sidr-class-main-menu sidr-class-dropdown-menu sidr-class-sf-menu">
			<li class="sidr-class-woo-menu-icon sidr-class-wcmenucart-toggle-custom_link sidr-class-toggle-cart-widget">
				
			<a href="http://www.palmterracesselect.com/uipet/cart/" class="sidr-class-wcmenucart">
				<span class="sidr-class-wcmenucart-count"><i class="icon-handbag"></i><span class="sidr-class-wcmenucart-details sidr-class-count">6</span></span>
			</a>

									</li>

			<li class="sidr-class-search-toggle-li"><a href="#" class="sidr-class-site-search-toggle sidr-class-search-dropdown-toggle"><span class="icon-magnifier"></span></a></li></ul>
<div id="sidr-id-searchform-dropdown" class="sidr-class-header-searchform-wrap sidr-class-clr">
	
<form method="get" class="sidr-class-searchform" id="sidr-id-searchform" action="http://www.palmterracesselect.com/uipet/">
	<input type="text" class="sidr-class-field" name="s" id="sidr-id-s" placeholder="Search">
	</form></div><!-- #searchform-dropdown -->
			</div><div class="sidr-inner">
	<form method="get" action="http://www.palmterracesselect.com/uipet/" class="sidr-class-mobile-searchform">
		<input type="search" name="s" autocomplete="off" placeholder="Search">
		<button type="submit" class="sidr-class-searchform-submit">
			<i class="sidr-class-icon icon-magnifier"></i>
		</button>
			</form>
</div></div></body></html>
<?php } ?>
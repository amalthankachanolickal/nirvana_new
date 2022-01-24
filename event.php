<?php include('model/class.expert.php');


$ModelCall->where("id",$_REQUEST['eid']);
$ModelCall->where("status",1);
$HomeEvents = $ModelCall->get("tbl_events");
$HomeEventsVal=$HomeEvents[0];
$ModelCall->where("eid",$_REQUEST['eid']);
$getimage = $ModelCall->get("tbl_event_photo");
$ModelCall->where("eid",$_REQUEST['eid']);
$geteventinvInfo = $ModelCall->get("tbl_event_ticket_inventory");
$today=strtotime(date("Y-m-d"));
$last=strtotime($geteventinvInfo[0]['lastdate']);

$i=0;
function dateDiffInDays($date1, $date2)  
{ 
// Calulating the difference in timestamps 
$diff = strtotime($date2) - strtotime($date1); 

// 1 day = 24 hours 
// 24 * 60 * 60 = 86400 seconds 
return abs(round($diff / 86400)); 
} 
foreach($getimage as $arrays){
if($arrays['image']!=""){
$images[$i]=SITE_URL."RWAVendor/events/photo/".$arrays['image'];
$i++;
}
}
//print_r($images);
$dateDiff = dateDiffInDays(date("d-m-Y"), $HomeEvents[0]['event_date']);
$year=date_format(date_create($HomeEvents[0]['event_date']),'Y');
$month= date_format(date_create($HomeEvents[0]['event_date']),'m');
$day= date_format(date_create($HomeEvents[0]['event_date']),'d');
$time=explode(':',$HomeEvents[0]['event_time']);
$hour=$time[0];
$min=$time[1];

?>
<html lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">
<title>Nirvana Country Events</title>
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//s.w.org">
<link rel="alternate" type="application/rss+xml" title="Event Star » Feed" href="https:////demo.acmethemes.com/event-star/feed/">
<link rel="alternate" type="application/rss+xml" title="Event Star » Comments Feed" href="https:////demo.acmethemes.com/event-star/comments/feed/">

<script type="text/javascript">
    window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https://\/\/demo.acmethemes.com\/event-star\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.2.4"}};
    !function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
</script><script src="https:////demo.acmethemes.com/event-star/wp-includes/js/wp-emoji-release.min.js?ver=5.2.4" type="text/javascript" defer=""></script>
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
.card-pricing.popular {
z-index: 1;
border: 3px solid #007bff;
}
.card-pricing .list-unstyled li {
padding: .5rem 0;
color: #6c757d;
}
</style>
<link rel="stylesheet" id="wp-block-library-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/block-library/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-block-library-theme-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/block-library/theme.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="slick-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/slick/slick.min.css?ver=1.7.1" type="text/css" media="all">
<link rel="stylesheet" id="slick-theme-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/slick/slick-theme.min.css?ver=1.7.1" type="text/css" media="all">
<link rel="stylesheet" id="animate-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/animatecss/animate.min.css?ver=3.7.2" type="text/css" media="all">
<link rel="stylesheet" id="magnific-popup-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/magnific-popup/magnific-popup.min.css?ver=1.8.0" type="text/css" media="all">
<link rel="stylesheet" id="wpness-grid-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/wpness-grid/wpness-grid.min.css?ver=1.0.0" type="text/css" media="all">
<link rel="stylesheet" id="fontawesome-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/fontawesome/css/all.min.css?ver=5" type="text/css" media="all">
<link rel="stylesheet" id="wp-components-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/components/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-editor-font-css" href="https://fonts.googleapis.com/css?family=Noto+Serif%3A400%2C400i%2C700%2C700i&amp;ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-block-editor-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/block-editor/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-nux-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/nux/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="wp-editor-css" href="https:////demo.acmethemes.com/event-star/wp-includes/css/dist/editor/style.min.css?ver=5.2.4" type="text/css" media="all">
<link rel="stylesheet" id="gutentor-css-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//dist/blocks.style.build.css?ver=1.1.3" type="text/css" media="all">
<link rel="stylesheet" id="contact-form-7-css" href="https:////demo.acmethemes.com/event-star/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.4" type="text/css" media="all">
<link rel="stylesheet" id="event-star-googleapis-css" href="//fonts.googleapis.com/css?family=Open+Sans:400,700|Lato:400,700" type="text/css" media="all">
<!--<link rel="stylesheet" id="bootstrap-css" href="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/library/bootstrap/css/bootstrap.min.css?ver=3.3.6" type="text/css" media="all">-->
<link rel="stylesheet" id="font-awesome-css" href="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/library/Font-Awesome/css/font-awesome.min.css?ver=4.7.0" type="text/css" media="all">
<link rel="stylesheet" id="event-star-style-css" href="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/style.css?ver=5.2.4" type="text/css" media="all">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<style id="event-star-style-inline-css" type="text/css">

        .inner-main-title {
        background-image:url('https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/img/audience.jpg');
        background-repeat:no-repeat;
        background-size:cover;
        background-attachment:fixed;
        background-position: center; 
        height: 300px;
    }
    .top-header{
        background-color: #933cdf;
    }
    .site-footer{
        background-color: #112134;
    }
    .copy-right{
        background-color: #0D1D31;
    }
    .site-title,
    .site-title a,
    .site-description,
    .site-description a,
    a:hover,
    a:active,
    a:focus,
    .widget li a:hover,
    .posted-on a:hover,
    .author.vcard a:hover,
    .cat-links a:hover,
    .comments-link a:hover,
    .edit-link a:hover,
    .tags-links a:hover,
    .byline a:hover,
    .main-navigation .acme-normal-page .current_page_item a,
    .main-navigation .acme-normal-page .current-menu-item a,
    .main-navigation .active a,
    .main-navigation .navbar-nav >li a:hover,
    .team-item h3 a:hover,
    .news-notice-content .news-content a:hover,
    .single-item .fa,
        .at-social .socials li a,
        .primary-color,
        article.post .entry-header .cat-links a,
        #event-star-breadcrumbs a:hover,
        .woocommerce .star-rating, 
    .woocommerce ul.products li.product .star-rating,
    .woocommerce p.stars a,
    .woocommerce ul.products li.product .price,
    .woocommerce ul.products li.product .price ins .amount,
    .woocommerce a.button.add_to_cart_button:hover,
    .woocommerce a.added_to_cart:hover,
    .woocommerce a.button.product_type_grouped:hover,
    .woocommerce a.button.product_type_external:hover,
    .woocommerce .cart .button:hover,
    .woocommerce .cart input.button:hover,
    .woocommerce #respond input#submit.alt:hover,
    .woocommerce a.button.alt:hover,
    .woocommerce button.button.alt:hover,
    .woocommerce input.button.alt:hover,
    .woocommerce .woocommerce-info .button:hover,
    .woocommerce .widget_shopping_cart_content .buttons a.button:hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li a,
    .woocommerce-message::before{
        color: #fd367e;
    }
    .navbar .navbar-toggle:hover,
    .main-navigation .current_page_ancestor > a:before,
    .comment-form .form-submit input,
    .btn-primary,
    .wpcf7-form input.wpcf7-submit,
    .wpcf7-form input.wpcf7-submit:hover,
    i.slick-arrow:hover,
    .sm-up-container,
    .btn-primary.btn-reverse:before,
    #at-shortcode-bootstrap-modal .modal-header,
    .primary-bg,
    .schedule-title-wrapper .schedule-title.active a,
    .schedule-title-wrapper .schedule-title.active a i,
    .schedule-title-wrapper .schedule-title:hover a,
    .team-item:hover,
    .at-event-count-down,
    .navigation.pagination .nav-links .page-numbers.current,
    .navigation.pagination .nav-links a.page-numbers:hover,
    .widget-title::after,
    .woocommerce .product .onsale,
    .woocommerce a.button.add_to_cart_button,
    .woocommerce a.added_to_cart,
    .woocommerce a.button.product_type_grouped,
    .woocommerce a.button.product_type_external,
    .woocommerce .single-product #respond input#submit.alt,
    .woocommerce .single-product a.button.alt,
    .woocommerce .single-product button.button.alt,
    .woocommerce .single-product input.button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce .widget_shopping_cart_content .buttons a.button,
    .woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
    .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
    .woocommerce .cart .button,
    .woocommerce .cart input.button,
    .woocommerce input.button:disabled, 
    .woocommerce input.button:disabled[disabled],
    .woocommerce input.button:disabled:hover, 
    .woocommerce input.button:disabled[disabled]:hover,
        .woocommerce nav.woocommerce-pagination ul li a:focus, 
        .woocommerce nav.woocommerce-pagination ul li a:hover, 
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .woocommerce a.button.wc-forward,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
        .navbar .cart-wrap .acme-cart-views a span{
        background-color: #fd367e;
        color:#fff;
    }
    .woocommerce .cart .button, 
    .woocommerce .cart input.button,
    .woocommerce a.button.add_to_cart_button,
    .woocommerce a.added_to_cart,
    .woocommerce a.button.product_type_grouped,
    .woocommerce a.button.product_type_external,
    .woocommerce .cart .button,
    .woocommerce .cart input.button
    .woocommerce .single-product #respond input#submit.alt,
    .woocommerce .single-product a.button.alt,
    .woocommerce .single-product button.button.alt,
    .woocommerce .single-product input.button.alt,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce .widget_shopping_cart_content .buttons a.button,
    .woocommerce div.product .woocommerce-tabs ul.tabs:before{
        border: 1px solid #fd367e;
    }
    .blog article.sticky{
        border-bottom: 2px solid #fd367e;
    }
</style>
<link rel="stylesheet" id="event_star-block-front-styles-css" href="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/acmethemes/gutenberg/gutenberg-front.css?ver=1.0" type="text/css" media="all">
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
<!--[if lt IE 9]>
<script type='text/javascript' src='https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/library/html5shiv/html5shiv.min.js?ver=3.7.3'></script>
<![endif]-->
<!--[if lt IE 9]>
<script type='text/javascript' src='https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/library/respond/respond.min.js?ver=1.1.2'></script>
<![endif]-->
<link rel="https://api.w.org/" href="https:////demo.acmethemes.com/event-star/wp-json/">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https:////demo.acmethemes.com/event-star/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https:////demo.acmethemes.com/event-star/wp-includes/wlwmanifest.xml"> 
<meta name="generator" content="WordPress 5.2.4">
<link rel="canonical" href="https:////demo.acmethemes.com/event-star/">
<link rel="shortlink" href="https:////demo.acmethemes.com/event-star/">
<link rel="alternate" type="application/json+oembed" href="https:////demo.acmethemes.com/event-star/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fdemo.acmethemes.com%2Fevent-star%2F">
<link rel="alternate" type="text/xml+oembed" href="https:////demo.acmethemes.com/event-star/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fdemo.acmethemes.com%2Fevent-star%2F&amp;format=xml">
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

 <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL;?>assets/img/favicon.ico">
<!-- Bootstrap css -->
<link href="<?php echo SITE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">
<!--Font Awesome css -->
<link href="<?php echo SITE_URL;?>css/font-awesome.min.css" rel="stylesheet">
<!-- Owl Carousel css -->
<link href="<?php echo SITE_URL;?>assets/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo SITE_URL;?>assets/css/owl.transitions.css" rel="stylesheet">
<!-- Site css -->
<link href="<?php echo SITE_URL;?>assets/css/home-style.css" rel="stylesheet">
<!-- Responsive css -->
<link href="<?php echo SITE_URL;?>assets/css/responsive.css" rel="stylesheet">
<?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
•Universal Analytics Tracking Code
•ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
•Google Analytics Code<?php */?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-55877669-17');
</script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-55877669-17');
</script>	
<script type = "text/javascript">
var i = 1; 			// Start Point

var images = <?php echo json_encode($images); ?>;	// Images Array
console.log(images[i]);
var time = 50;	// Time Between Switch
// Change Image
function changeImg1(){

document.getElementById("slide").style.backgroundImage= "url('"+images[i]+"')";
// Check If Index Is Under Max
 if(i < images.length - 1){
 // Add 1 to Index
 i++; 
 } else { 
// // Reset Back To O
 i = 0;
}

// // Run function every x seconds
 setTimeout("changeImg1()", time);
}


// Run function when page loads
window.onload=changeImg1;
</script>
</head>
<body class="home page-template-default page page-id-5 wp-custom-logo gutentor-active acme-animate right-sidebar">
<?php include(ROOTACCESS."front_header.php");?>

<section id="event_star_about-3" class="at-widgets acme-abouts ">
        <div class="container">
                            <div class="row">
        
        </div></div>
    </section>
<div class="site" id="page">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <div class="image-slider-wrapper home-fullscreen full-screen-bg">
            <div class="featured-slider slick-initialized slick-slider" style="display: block;">
                <div class="slick-list draggable" style="height: 742px;"><div class="slick-track" style="opacity: 1; width: 80%;"><div class="item slick-slide slick-current slick-active" id='slide' style=" background-repeat: no-repeat; background-size: cover; background-position: center center; width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1; background-image: url('<?php echo $images[0];?>');" onload="changeImg()" data-slick-index="0" aria-hidden="false" tabindex="0">
                    <div class="slider-content text-center">
                        <div class="container">
                            <div class="banner-title init-animate fadeInDown" style="visibility: visible; animation-name: fadeInDown;">Let’s Celebrate <br><?php echo $HomeEventsVal['event_name']; ?></div>
                            <div class="image-slider-caption init-animate fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
                            <p>with Nirvana country </p>
                            </div>
                            <section class="feature-event clearfix init-animate fadeInDown" data-year="<?php echo $year?> " data-month="<?php echo $month ?> " data-day="<?php echo $day?> " data-hour=" <?php echo $hour?> " data-minutes="<?php echo $min?> " style="visibility: visible; animation-name: fadeInDown;">
                            <div class="feature-col col-xs-3">
                            <span class="day countdown-time"><?php echo $dateDiff?></span>
                            <span class="day-text countdown-label">Days                                                            </span> </div><div class="feature-col col-xs-3"><span class="hour countdown-time">19</span>
                            <span class="hour-text countdown-label">Hours </span></div>
                            <div class="feature-col col-xs-3"><span class="min countdown-time">21</span>
                            <span class="min-text countdown-label"> Mins</span>
                            </div> 
                            <div class="feature-col col-xs-3"><span class="sec countdown-time">18</span>
                            <span class="sec-text countdown-label">  Seconds </span>
                            </div>
                            </section>
                           <!-- <?php if($last>=$today){?>
                            <a href="<?php echo SITE_URL;?>event_ticket.php?eid=<?php echo $HomeEventsVal['id'];?>&back_tracker=event_ticket.php?eid=<?php echo $HomeEventsVal['id'];?>" class="init-animate fadeInDown btn btn-default outline-outward banner-btn" style="visibility: visible; animation-name: fadeInDown; background-color: green;" tabindex="0">
                            Pay Contribution  </a>
                            <?php } ?> -->
                            <a href="#event_star_about" class="init-animate fadeInDown btn btn-primary outline-outward banner-btn" style="visibility: visible; animation-name: fadeInDown;" tabindex="0">
                            View Details   </a>
</div>
</div></div></div></div></div><!--acme slick carousel-->
<div class="info-icon-box-wrapper"><div class="container primary-bg"><div class="row">
 <div class="info-icon-box col-md-2 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
                            <div class="info-icon">
                <i class="fa fa-calendar"></i>
            </div>
               <div class="info-icon-details">
                <h6 class="icon-title">Event Date</h6><span class="icon-desc"><?php echo $HomeEventsVal['event_date']; ?></span>                    </div>
                        </div>
                <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
                            <div class="info-icon">
                            <a href="https://www.google.com/maps/dir//<?php echo  str_replace(' ', '+', $HomeEventsVal['event_location']); ?>/@28.4175004,77.0625661,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x390d227a6f58c4e7:0x9c607994294c1139!2m2!1d77.0658004!2d28.4173826"  data-toggle="tooltip" title="Click here to find directions to Event." target="_blank" style="color:white;"> <i class="fa fa-map-marker"></i></a>
            </div>
            <a href="https://www.google.com/maps/dir//<?php echo  str_replace(' ', '+', $HomeEventsVal['event_location']); ?>/@28.4175004,77.0625661,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x390d227a6f58c4e7:0x9c607994294c1139!2m2!1d77.0658004!2d28.4173826"  data-toggle="tooltip" title="Click here to find directions to Nirvana." target="_blank"> <div class="info-icon-details">
                <h6 class="icon-title">Event Location</h6><span class="icon-desc" style="color:white;"><?php echo $HomeEventsVal['event_location']; ?></span> </div></a>
                        </div>
                <div class="info-icon-box col-md-3 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
                            <div class="info-icon">
                <i class="fa fa-phone"></i>
            </div>
                                <div class="info-icon-details">
                <h6 class="icon-title">Click to Call</h6>
                <a href="tel:<?php echo  $HomeEventsVal['event_contact_number'];?>" style="color:white;"> <span class="icon-desc">
                <?php echo $HomeEventsVal['event_contact_number']; ?></span></a>
                 </div>
                        </div>
                <div class="info-icon-box col-md-4 init-animate zoomIn" style="visibility: visible; animation-name: zoomIn;">
                            <div class="info-icon">
                <i class="fa fa-envelope-o"></i>
            </div>
                                <div class="info-icon-details">
                <h6 class="icon-title">Click to  Mail</h6>
                <a href="mailto:office.nrwa@nirvanacountry.co.in" style="color:white;"><span class="icon-desc" ></span>office.nrwa@nirvanacountry.co.in </a></div>
                        </div>
    </div></div></div>                </div><!--.image slider wrapper-->
        <aside id="event_star_about" class="widget widget_event_star_about">           
        <section id="event_star_about" class="at-widgets acme-abouts ">
        <div class="container" >
            <h2 class="widget-title init-animate zoomIn" style="visibility: hidden; animation-name: none;"><span>ABOUT THIS EVENT</span></h2>                    <div class="row" >
                        <?php 
                $ModelCall->where("eid",$_REQUEST['eid']);

$HomeEventssection = $ModelCall->get("tbl_event_sections");
foreach($HomeEventssection as $sections){
?>
                                                    <div class="col-sm-12 col-md-4 column">
                                <div class="single-item init-animate zoomIn" style="visibility: hidden; animation-name: none;">
                                    <div class="icon clearfix">
                                                                                            
                                            <a href="<?php echo SITE_URL;?>event_ticket.php?eid=<?php echo $HomeEventsVal['id'];?>">    <i class="fa fa-calendar-check-o"></i>
                                            </a>
                                                                                        <h3 class="title">
                                            <a title="What is events?" href="<?php echo SITE_URL;?>event_ticket.php?eid=<?php echo $HomeEventsVal['id'];?>">
                                                <?php echo $sections['section'];?>                                                    </a>
                                        </h3>
                                    </div>
                                    <div class="content">
                                        <div class="details">
                                            <p><?php echo $sections['content'];?></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php }?>           
                    
                            <div class="clearfix"></div>                    </div>
        </div>
    </section>
    <div class="clearfix"></div>  
    <div class="col-md-12">
     <div class="item text-center">
         
   <!-- <p><h4 style="color: green;">You may click the advertisement to call/ email or visit the advertiser's website.</h4></p> -->
    </div>
    </div>
    <br> <br> 
<!------ Include the above in your HEAD tag ---------->
<?php include(ROOTACCESS."Advertisments.php");?>
<br>
</div>               
<?php include(ROOTACCESS."HomefooterCall.php");?>    
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/countUp/countUp.min.js?ver=1.9.3"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/wow/wow.min.js?ver=1.2.1"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/waypoints/jquery.waypoints.min.js?ver=4.0.1"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/jquery-easypiechart/jquery.easypiechart.min.js?ver=2.1.7"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/slick/slick.min.js?ver=1.7.1"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-includes/js/imagesloaded.min.js?ver=3.2.0"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-includes/js/masonry.min.js?ver=3.3.2"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/isotope/isotope.pkgd.min.js?ver=3.0.6"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/library/magnific-popup/jquery.magnific-popup.min.js?ver=1.1.0"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/gutentor//assets/js/gutentor.min.js?ver=1.1.3"></script>
<script type="text/javascript">
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https://\/\/demo.acmethemes.com\/event-star\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.4"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/acmethemes/core/js/skip-link-focus-fix.js?ver=20130115"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/library/bootstrap/js/bootstrap.min.js?ver=3.3.6"></script>
<script type="text/javascript">
/* <![CDATA[ */
var event_star_ajax = {"ajaxurl":"https://\/\/demo.acmethemes.com\/event-star\/wp-admin\/admin-ajax.php","event_expire_text":"Expired"};
/* ]]> */
</script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-content/themes/event-star/assets/js/event-star-custom.js?ver=1.0.5"></script>
<script type="text/javascript" src="https:////demo.acmethemes.com/event-star/wp-includes/js/wp-embed.min.js?ver=5.2.4"></script>

</body></html>

<?php include('model/class.expert.php');
//include('CheckCustomerLogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Discussion</title>
<link rel="icon" href="<?php echo SITE_URL;?>images/fav.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/main.min.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/style.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/color.css">
<link rel="stylesheet" href="<?php echo SITE_URL;?>css/responsive.css">
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


</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
<?php $ModelCall->PagesCall(ROOTACCESS."login_feed_header.php");
//print_r($_SESSION);
?>
  <!-- responsive header -->
  <!-- topbar -->
  <div class="fixed-sidebar right">
    <div class="chat-friendz">
      <ul class="chat-users">
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend1.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend2.jpg" alt=""> <span class="status f-away"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend3.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend4.jpg" alt=""> <span class="status f-offline"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend5.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend6.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend7.jpg" alt=""> <span class="status f-offline"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend8.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend9.jpg" alt=""> <span class="status f-away"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend10.jpg" alt=""> <span class="status f-away"></span> </div>
        </li>
        <li>
          <div class="author-thmb"> <img src="<?php echo SITE_URL;?>images/resources/side-friend8.jpg" alt=""> <span class="status f-online"></span> </div>
        </li>
      </ul>
      <div class="chat-box">
        <div class="chat-head"> <span class="status f-online"></span>
          <h6>Bucky Barnes</h6>
          <div class="more"> <span class="more-optns"><i class="ti-more-alt"></i>
            <ul>
              <li>block chat</li>
              <li>unblock chat</li>
              <li>conversation</li>
            </ul>
            </span> <span class="close-mesage"><i class="ti-close"></i></span> </div>
        </div>
        <div class="chat-list">
          <ul>
            <li class="me">
              <div class="chat-thumb"><img src="<?php echo SITE_URL;?>images/resources/chatlist1.jpg" alt=""></div>
              <div class="notification-event"> <span class="chat-message-item"> Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks </span> <span class="notification-date">
                <time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time>
                </span> </div>
            </li>
            <li class="you">
              <div class="chat-thumb"><img src="<?php echo SITE_URL;?>images/resources/chatlist2.jpg" alt=""></div>
              <div class="notification-event"> <span class="chat-message-item"> Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks </span> <span class="notification-date">
                <time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time>
                </span> </div>
            </li>
            <li class="me">
              <div class="chat-thumb"><img src="<?php echo SITE_URL;?>images/resources/chatlist1.jpg" alt=""></div>
              <div class="notification-event"> <span class="chat-message-item"> Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks </span> <span class="notification-date">
                <time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time>
                </span> </div>
            </li>
          </ul>
          <form class="text-box">
            <textarea placeholder="Post enter to post..."></textarea>
            <div class="add-smiles"> <span title="add icon" class="em em-expressionless"></span> </div>
            <div class="smiles-bunch"> <i class="em em---1"></i> <i class="em em-smiley"></i> <i class="em em-anguished"></i> <i class="em em-laughing"></i> <i class="em em-angry"></i> <i class="em em-astonished"></i> <i class="em em-blush"></i> <i class="em em-disappointed"></i> <i class="em em-worried"></i> <i class="em em-kissing_heart"></i> <i class="em em-rage"></i> <i class="em em-stuck_out_tongue"></i> </div>
            <button type="submit"></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- right sidebar user chat -->
  <div class="fixed-sidebar left">
    <div class="menu-left">
      <ul class="left-menu">
        <li><a href="" title="Newsfeed" data-toggle="tooltip" data-placement="right"><i class="ti-magnet"></i></a></li>
        <li><a href="" title="Favourit" data-toggle="tooltip" data-placement="right"><i class="fa fa-star-o"></i></a></li>
        <li><a href="" title="Account Stats" data-toggle="tooltip" data-placement="right"><i class="ti-stats-up"></i></a></li>
        <li><a href="" title="inbox" data-toggle="tooltip" data-placement="right"><i class="ti-import"></i></a></li>
        <li><a href="messages.html" title="Messages" data-toggle="tooltip" data-placement="right"><i class="ti-comment-alt"></i></a></li>
        <li><a href="" title="Setting" data-toggle="tooltip" data-placement="right"><i class="ti-panel"></i></a></li>
        <li><a href="" title="Faq's" data-toggle="tooltip" data-placement="right"><i class="ti-light-bulb"></i></a></li>
        <li><a href="" title="Friends" data-toggle="tooltip" data-placement="right"><i class="ti-themify-favicon"></i></a></li>
        <li><a href="" title="Widgets" data-toggle="tooltip" data-placement="right"><i class="ti-eraser"></i></a></li>
        <li><a href="" title="Notification" data-toggle="tooltip" data-placement="right"><i class="ti-bookmark-alt"></i></a></li>
      </ul>
    </div>
  </div>
  <!-- left sidebar menu -->
  <section>
  <div class="gap2 gray-bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="row merged20" id="page-contents">
            <div class="col-lg-3">
              <aside class="sidebar static left">
                <div class="widget">
                  <h4 class="widget-title">Your page <i class="la la-ellipsis-v wid-ico"></i></h4>
                  <div class="your-page">
                    <figure> <a href="#" title=""><img src="<?php echo SITE_URL;?>images/resources/friend-avatar9.jpg" alt=""></a> </figure>
                    <div class="page-meta"> <a href="#" title="" class="underline"><?php echo $GetCustomerInfo['first_name']; ?> <?php echo $GetCustomerInfo['last_name']; ?></a> <span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>0</em></a></span> <span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>0</em></a></span> </div>
                    <div class="page-likes">
                      <ul class="nav nav-tabs likes-btn">
                        <li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
                        <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active fade show " id="link1" > <span><i class="ti-heart"></i>0</span> <a href="#" title="weekly-likes">35 new likes this week</a>
                          <?php /*?><div class="users-thumb-list"> <a href="#" title="Anderw" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-1.jpg" alt=""> </a> <a href="#" title="frank" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-2.jpg" alt=""> </a> <a href="#" title="Sara" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-3.jpg" alt=""> </a> <a href="#" title="Amy" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-4.jpg" alt=""> </a> <a href="#" title="Ema" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-5.jpg" alt=""> </a> <a href="#" title="Sophie" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-6.jpg" alt=""> </a> <a href="#" title="Maria" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-7.jpg" alt=""> </a> </div><?php */?>
                        </div>
                        <div class="tab-pane fade" id="link2" > <span><i class="ti-eye"></i>0</span> <a href="#" title="weekly-likes">0 new views this week</a>
                          <?php /*?><div class="users-thumb-list"> <a href="#" title="Anderw" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-1.jpg" alt=""> </a> <a href="#" title="frank" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-2.jpg" alt=""> </a> <a href="#" title="Sara" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-3.jpg" alt=""> </a> <a href="#" title="Amy" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-4.jpg" alt=""> </a> <a href="#" title="Ema" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-5.jpg" alt=""> </a> <a href="#" title="Sophie" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-6.jpg" alt=""> </a> <a href="#" title="Maria" data-toggle="tooltip"> <img src="<?php echo SITE_URL;?>images/resources/userlist-7.jpg" alt=""> </a> </div><?php */?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Shortcuts -->
                <!-- recent activites -->
                <div class="widget stick-widget">
                  <h4 class="widget-title">Who's follownig <i class="la la-ellipsis-v wid-ico"></i></h4>
                  <ul class="followers">
                    <li>
                      <figure><img src="<?php echo SITE_URL;?>images/resources/friend-avatar2.jpg" alt=""></figure>
                      <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a> </div>
                    </li>
                    <li>
                      <figure><img src="<?php echo SITE_URL;?>images/resources/friend-avatar4.jpg" alt=""></figure>
                      <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Issabel</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a> </div>
                    </li>
                    <li>
                      <figure><img src="<?php echo SITE_URL;?>images/resources/friend-avatar6.jpg" alt=""></figure>
                      <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Andrew</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a> </div>
                    </li>
                    <li>
                      <figure><img src="<?php echo SITE_URL;?>images/resources/friend-avatar8.jpg" alt=""></figure>
                      <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Sophia</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a> </div>
                    </li>
                    <li>
                      <figure><img src="<?php echo SITE_URL;?>images/resources/friend-avatar3.jpg" alt=""></figure>
                      <div class="friend-meta">
                        <h4><a href="time-line.html" title="">Allen</a></h4>
                        <a href="#" title="" class="underline">Add Friend</a> </div>
                    </li>
                  </ul>
                </div>
                <!-- who's following -->
              </aside>
            </div>
            <!-- sidebar -->
            <div class="col-lg-6">
              <div class="central-meta">
                <div class="new-postbox">
                  <figure> <img src="<?php echo SITE_URL;?>images/resources/admin2.jpg" alt=""> </figure>
                  <div class="newpst-input">
                    <form method="post">
                      <textarea rows="2" placeholder="write something" style="border-radius:0;"></textarea>
                      <div class="attachments">
                        <ul>
                          <li> <i class="fa fa-music"></i>
                            <label class="fileContainer">
                            <input type="file">
                            </label>
                          </li>
                          <li> <i class="fa fa-image"></i>
                            <label class="fileContainer">
                            <input type="file">
                            </label>
                          </li>
                          <li> <i class="fa fa-video-camera"></i>
                            <label class="fileContainer">
                            <input type="file">
                            </label>
                          </li>
                          <li> <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                            <input type="file">
                            </label>
                          </li>
                          <li>
                            <button type="submit" class="btn btn-success" style="padding:2px 8px;"> Post Status</button>
                          </li>
                        </ul>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- add post new box -->
              <div class="loadMore">
                <div id="accordion">
                  <div class="central-meta item">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                        <div class="user-post">
                        <div class="friend-info">
                        <figure> <img src="<?php echo SITE_URL;?>images/resources/friend-avatar10.jpg" alt=""> </figure>
                        <div class="friend-name">
                        <ins><a href="" title=""><?php echo $GetCustomerInfo['first_name']; ?> <?php echo $GetCustomerInfo['last_name']; ?></a></ins> <span>published: Janaury, 24 2019 10:00 PM</span> </div>
                    </div>
                  </div>
                  <div class="NorapT">Please share any content that you would like to contribute to your nirvana website -  photos, articles, etc. send email toCorporate@innovatuslimited.com</div>
                  </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="clearfix">
                    <div class="user-post">
                      <div class="friend-info">
                        <div class="post-meta"> <img src="<?php echo SITE_URL;?>images/resources/user-post.jpg" alt="">
                          <div class="we-video-info">
                            <ul>
                              <li> <span class="views" data-toggle="tooltip" title="views"> <i class="fa fa-eye"></i> <ins>1.2k</ins> </span> </li>
                              <li> <span class="comment" data-toggle="tooltip" title="Comments"> <i class="fa fa-comments-o"></i> <ins>52</ins> </span> </li>
                              <li> <span class="like" data-toggle="tooltip" title="like"> <i class="ti-heart"></i> <ins>2.2k</ins> </span> </li>
                              <li> <span class="dislike" data-toggle="tooltip" title="dislike"> <i class="ti-heart-broken"></i> <ins>200</ins> </span> </li>
                              <li class="social-media">
                                <div class="menu">
                                  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a> </div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a> </div>
                                  </div>
                                  <div class="rotater">
                                    <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a> </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="description">
                            <p> World's most beautiful car in Curabitur <a href="#" title="">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website </p>
                          </div>
                        </div>
                      </div>
                      <div class="coment-area">
                        <ul class="we-comet">
                          <li>
                            <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-1.jpg" alt=""> </div>
                            <div class="we-comment">
                              <div class="coment-head">
                                <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                <span>1 year ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                              <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                            </div>
                            <ul>
                              <li>
                                <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-2.jpg" alt=""> </div>
                                <div class="we-comment">
                                  <div class="coment-head">
                                    <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                    <span>1 month ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                                  <p>yes, really very awesome car i see the features of this car in the official website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)</p>
                                </div>
                              </li>
                              <li>
                                <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-3.jpg" alt=""> </div>
                                <div class="we-comment">
                                  <div class="coment-head">
                                    <h5><a href="time-line.html" title="">Olivia</a></h5>
                                    <span>16 days ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                                  <p>i like lexus cars, lexus cars are most beautiful with the awesome features, but this car is really outstanding than lexus</p>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-1.jpg" alt=""> </div>
                            <div class="we-comment">
                              <div class="coment-head">
                                <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                <span>1 week ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                              <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel <i class="em em-smiley"></i> </p>
                            </div>
                          </li>
                          <li> <a href="#" title="" class="showmore underline">more comments</a> </li>
                          <li class="post-comment">
                            <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-1.jpg" alt=""> </div>
                            <div class="post-comt-box">
                              <form method="post">
                                <textarea placeholder="Post your comment"></textarea>
                                <div class="add-smiles"> <span class="em em-expressionless" title="add icon"></span> </div>
                                <div class="smiles-bunch"> <i class="em em---1"></i> <i class="em em-smiley"></i> <i class="em em-anguished"></i> <i class="em em-laughing"></i> <i class="em em-angry"></i> <i class="em em-astonished"></i> <i class="em em-blush"></i> <i class="em em-disappointed"></i> <i class="em em-worried"></i> <i class="em em-kissing_heart"></i> <i class="em em-rage"></i> <i class="em em-stuck_out_tongue"></i> </div>
                                <button type="submit"></button>
                              </form>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="central-meta item">
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                  aria-controls="collapseTwo">
                  <div class="user-post">
                  <div class="friend-info">
                  <figure> <img src="<?php echo SITE_URL;?>images/resources/friend-avatar10.jpg" alt=""> </figure>
                  <div class="friend-name">
                  <ins><a href="" title=""><?php echo $GetCustomerInfo['first_name']; ?> <?php echo $GetCustomerInfo['last_name']; ?></a></ins> <span>published: Janaury, 24 2019 10:00 PM</span> </div>
              </div>
            </div>
            <div class="NorapT">Please share any content that you would like to contribute to your nirvana website -  photos, articles, etc. send email toCorporate@innovatuslimited.com</div>
            </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="clearfix">
              <div class="user-post">
                <div class="friend-info">
                  <div class="post-meta"> <img src="<?php echo SITE_URL;?>images/resources/user-post.jpg" alt="">
                    <div class="we-video-info">
                      <ul>
                        <li> <span class="views" data-toggle="tooltip" title="views"> <i class="fa fa-eye"></i> <ins>1.2k</ins> </span> </li>
                        <li> <span class="comment" data-toggle="tooltip" title="Comments"> <i class="fa fa-comments-o"></i> <ins>52</ins> </span> </li>
                        <li> <span class="like" data-toggle="tooltip" title="like"> <i class="ti-heart"></i> <ins>2.2k</ins> </span> </li>
                        <li> <span class="dislike" data-toggle="tooltip" title="dislike"> <i class="ti-heart-broken"></i> <ins>200</ins> </span> </li>
                        <li class="social-media">
                          <div class="menu">
                            <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a> </div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a> </div>
                            </div>
                            <div class="rotater">
                              <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a> </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="description">
                      <p> World's most beautiful car in Curabitur <a href="#" title="">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website </p>
                    </div>
                  </div>
                </div>
                <div class="coment-area">
                  <ul class="we-comet">
                    <li>
                      <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-1.jpg" alt=""> </div>
                      <div class="we-comment">
                        <div class="coment-head">
                          <h5><a href="" title="">Jason borne</a></h5>
                          <span>1 year ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                        <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel</p>
                      </div>
                    </li>
                    <li>
                      <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-2.jpg" alt=""> </div>
                      <div class="we-comment">
                        <div class="coment-head">
                          <h5><a href="" title="">Sophia</a></h5>
                          <span>1 week ago</span> <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a> </div>
                        <p>we are working for the dance and sing songs. this video is very awesome for the youngster. <i class="em em-smiley"></i> </p>
                      </div>
                    </li>
                    <li> <a href="#" title="" class="showmore underline">more comments</a> </li>
                    <li class="post-comment">
                      <div class="comet-avatar"> <img src="<?php echo SITE_URL;?>images/resources/comet-2.jpg" alt=""> </div>
                      <div class="post-comt-box">
                        <form method="post">
                          <textarea placeholder="Post your comment"></textarea>
                          <div class="add-smiles"> <span class="em em-expressionless" title="add icon"></span> </div>
                          <div class="smiles-bunch"> <i class="em em---1"></i> <i class="em em-smiley"></i> <i class="em em-anguished"></i> <i class="em em-laughing"></i> <i class="em em-angry"></i> <i class="em em-astonished"></i> <i class="em em-blush"></i> <i class="em em-disappointed"></i> <i class="em em-worried"></i> <i class="em em-kissing_heart"></i> <i class="em em-rage"></i> <i class="em em-stuck_out_tongue"></i> </div>
                          <button type="submit"></button>
                        </form>
                      </div>
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
</div>
<!-- centerl meta -->
<div class="col-lg-3">
  <aside class="sidebar static right">
    <!-- page like widget -->
    <div class="widget">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active"> <img src="<?php echo SITE_URL;?>nirwana-img/slider1.jpg" alt="Los Angeles" width="1100" height="500"> </div>
          <div class="carousel-item"> <img src="<?php echo SITE_URL;?>nirwana-img/slider1.jpg" alt="Chicago" width="1100" height="500"> </div>
        </div>
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"> <img src="<?php echo SITE_URL;?>nirwana-img/pre.png"> </a> <a class="carousel-control-next" href="#myCarousel" data-slide="next"> <img src="<?php echo SITE_URL;?>nirwana-img/next.png"> </a> </div>
    </div>
    <div class="widget">
      <h4 class="widget-title">Recent Activity <i class="la la-ellipsis-v wid-ico"></i></h4>
      <ul class="activitiez">
        <li>
          <div class="activity-meta"> <i>10 hours Ago</i> <span><a href="#" title="">Commented on Video posted </a></span>
            <h6>by <a href="">black demon.</a></h6>
          </div>
        </li>
        <li>
          <div class="activity-meta"> <i>30 Days Ago</i> <span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span> </div>
        </li>
        <li>
          <div class="activity-meta"> <i>2 Years Ago</i> <span><a href="#" title="">Share a video on her timeline.</a></span>
            <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
          </div>
        </li>
      </ul>
    </div>
  </aside>
</div>
<!-- sidebar -->
</div>
</div>
</div>
</div>
</div>
</section>
<div class="bottombar">
  <div class="container">
    <div class="row">
      <div class="col-md-12"> <span class="copyright">
        <p>Copyright ©<a href="" style="color:#37a000;"> Innovatus Technologies Pvt. Ltd.</a> All rights reserved.</p>
        </span> </div>
    </div>
  </div>
</div>
</div>
<div class="side-panel">
  <h4 class="panel-title">General Setting</h4>
  <form method="post">
    <div class="setting-row"> <span>use night mode</span>
      <input type="checkbox" id="nightmode1"/>
      <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Notifications</span>
      <input type="checkbox" id="switch22" />
      <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Notification sound</span>
      <input type="checkbox" id="switch33" />
      <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>My profile</span>
      <input type="checkbox" id="switch44" />
      <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Show profile</span>
      <input type="checkbox" id="switch55" />
      <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
    </div>
  </form>
  <h4 class="panel-title">Account Setting</h4>
  <form method="post">
    <div class="setting-row"> <span>Sub users</span>
      <input type="checkbox" id="switch66" />
      <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>personal account</span>
      <input type="checkbox" id="switch77" />
      <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Business account</span>
      <input type="checkbox" id="switch88" />
      <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Show me online</span>
      <input type="checkbox" id="switch99" />
      <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Delete history</span>
      <input type="checkbox" id="switch101" />
      <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
    </div>
    <div class="setting-row"> <span>Expose author name</span>
      <input type="checkbox" id="switch111" />
      <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
    </div>
  </form>
</div>
<!-- side panel -->
<script src="<?php echo SITE_URL;?>js/main.min.js"></script>
<script src="<?php echo SITE_URL;?>js/script.js"></script>
<script src="<?php echo SITE_URL;?>js/map-init.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
</body>
</html>

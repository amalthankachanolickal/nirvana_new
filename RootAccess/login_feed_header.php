<div class="responsive-header">
  <div class="mh-head first Sticky"> <span class="mh-btns-left"> <a class="" href="#menu"><i class="fa fa-align-justify"></i></a> </span> <span class="mh-text"> <a href="<?php echo SITE_URL;?>" title=""><img src="<?php echo SITE_URL.MAINADMIN.SITELOGO;?>" alt=""></a> </span> <span class="mh-btns-right"> <a class="fa fa-sliders" href="#shoppingbag"></a> </span> </div>
  <div class="mh-head second">
    <form class="mh-form">
      <input placeholder="search" />
      <a href="" class="fa fa-search"></a>
    </form>
  </div>
  <nav id="menu" class="res-menu">
    <ul>
      <li><span>Home</span></li>
      <!--<li><span>Time Line</span>
					<ul>
						<li><a href="" title="">timeline</a></li>
						<li><a href="" title="">timeline friends</a></li>
						<li><a href="" title="">timeline groups</a></li>
						<li><a href="" title="">timeline pages</a></li>
						<li><a href="" title="">timeline photos</a></li>
						<li><a href="" title="">timeline videos</a></li>
						<li><a href="" title="">favourit page</a></li>
						<li><a href="" title="">groups page</a></li>
						<li><a href="" title="">Likes page</a></li>
						<li><a href="" title="">people nearby</a></li>
						
						
					</ul>
				</li>-->
      <!--<li><span>Account Setting</span>
					<ul>
						<li><a href="" title="">create fav page</a></li>
						<li><a href="" title="">edit account setting</a></li>
						<li><a href="" title="">edit-interest</a></li>
						<li><a href="" title="">edit-password</a></li>
						<li><a href="" title="">edit profile basics</a></li>
						<li><a href="" title="">edit work educations</a></li>
						<li><a href="" title="">message box</a></li>
						<li><a href="" title="">Inbox</a></li>
						<li><a href="" title="">notifications page</a></li>
					</ul>
				</li>
				<li><span>forum</span>
					<ul>
						<li><a href="" title="">Forum Page</a></li>
						<li><a href="" title="">Fourm Category</a></li>
						<li><a href="" title="">Forum Open Topic</a></li>
						<li><a href="" title="">Forum Create Topic</a></li>
					</ul>
				</li>-->
      <li><a href="" title="">Discussion</a></li>
      <li><a href="" title="">Messages</a></li>
      <li><a href="" title="">Notifications</a></li>
      <li><a href="" title="">Notice Board</a></li>
      <li><a href="" title="">My Account</a></li>
    </ul>
  </nav>
  <nav id="shoppingbag">
    <div>
      <div class="">
        <form method="post">
          <div class="setting-row"> <span>use night mode</span>
            <input type="checkbox" id="nightmode"/>
            <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Notifications</span>
            <input type="checkbox" id="switch2"/>
            <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Notification sound</span>
            <input type="checkbox" id="switch3"/>
            <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>My profile</span>
            <input type="checkbox" id="switch4"/>
            <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Show profile</span>
            <input type="checkbox" id="switch5"/>
            <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
          </div>
        </form>
        <h4 class="panel-title">Account Setting</h4>
        <form method="post">
          <div class="setting-row"> <span>Sub users</span>
            <input type="checkbox" id="switch6" />
            <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>personal account</span>
            <input type="checkbox" id="switch7" />
            <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Business account</span>
            <input type="checkbox" id="switch8" />
            <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Show me online</span>
            <input type="checkbox" id="switch9" />
            <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Delete history</span>
            <input type="checkbox" id="switch10" />
            <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
          </div>
          <div class="setting-row"> <span>Expose author name</span>
            <input type="checkbox" id="switch11" />
            <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
          </div>
        </form>
      </div>
    </div>
  </nav>
</div>
<div class="topbar stick">
  <div class="logo"> <a title="" href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/home-logo.png" alt=""></a> </div>
  <div class="top-area">
    <div class="top-search">
      <form method="post" class="">
        <input type="text" placeholder="Search Friend">
        <button data-ripple><i class="ti-search"></i></button>
      </form>
    </div>
    <ul class="setting-area">
      <li><a href="" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
      <li> <a href="#" title="Notification" data-ripple=""> <i class="ti-bell"></i> <span class="badge badge-pill badge-default badge-info badge-default badge-up">0</span> </a>
        <div class="dropdowns"> <span>0 New Notifications</span>
          <?php /*?><ul class="drops-menu">
              <li> <a href="" title=""> <img src="<?php echo SITE_URL;?>images/resources/thumb-1.jpg" alt="">
                <div class="mesg-meta">
                  <h6>sarah Loren</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag green">New</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-2.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Jhon doe</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag red">Reply</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-3.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Andrew</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag blue">Unseen</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-4.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Tom cruse</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag">New</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-5.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Amy</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag">New</span> </li>
            </ul><?php */?>
          <!--<a href="" title="" class="more-mesg">view more</a>-->
        </div>
      </li>
      <li> <a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up">0</span></a>
        <div class="dropdowns"> <span>0 New Messages</span>
          <?php /*?><ul class="drops-menu">
              <li> <a href="" title=""> <img src="images/resources/thumb-1.jpg" alt="">
                <div class="mesg-meta">
                  <h6>sarah Loren</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag green">New</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-2.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Jhon doe</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag red">Reply</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-3.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Andrew</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag blue">Unseen</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-4.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Tom cruse</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag">New</span> </li>
              <li> <a href="" title=""> <img src="images/resources/thumb-5.jpg" alt="">
                <div class="mesg-meta">
                  <h6>Amy</h6>
                  <span>Hi, how r u dear ...?</span> <i>2 min ago</i> </div>
                </a> <span class="tag">New</span> </li>
            </ul><?php */?>
          <!-- <a href="" title="" class="more-mesg">view more</a>-->
        </div>
      </li>
      <li> <a href="#" title="Group" data-ripple=""><i class="la la-users" style="font-size: 22px;"></i></a> </li>
    </ul>
    <div class="user-img"> <img src="<?php echo SITE_URL;?>images/resources/admin.jpg" alt=""> <span class="status f-online"></span>
      <div class="user-setting"> <a href="#" title=""><span class="status f-online"></span>online</a> <a href="#" title=""><span class="status f-away"></span>away</a> <a href="#" title=""><span class="status f-off"></span>offline</a> <a href="#" title=""><i class="ti-user"></i> view profile</a> <a href="#" title=""><i class="ti-pencil-alt"></i>edit profile</a> <a href="#" title=""><i class="ti-target"></i>activity log</a> <a href="#" title=""><i class="ti-settings"></i>account setting</a> <a href="#" title=""><i class="ti-power-off"></i>log out</a> </div>
    </div>
    <span class="ti-menu main-menu" data-ripple=""></span> </div>
</div>

<!doctype html>
<html class="no-js" lang="en">

<?php
$this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/headinclude');
?>
<body>
<?php
$this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/menu');
?>
<!-- header end -->
<!-- Start breadcumb Area -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Gallery</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcumb Area -->
<div class="project-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h5><?php echo $g_name; ?></h5>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Portfolio -page -->
            <div class="awesome-project fix">

            </div>
            <div class="project-content" style="position: relative; height: 583.626px;">
                <!-- single-awesome-project start -->
                <?php foreach ($files as $file){ ?>
                    <div class="col-md-4 col-sm-6 col-xs-12 construction">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#">
                                    <img src="<?php echo BASE_URL . UPLOAD_DEPT_GALLERY_IMAGE_PATH . $file['fileName'] . '?' . time();?>" alt="" />
                                </a>
                                <div class="add-actions">
                                    <a class="venobox" data-gall="myGallery" href="<?php echo BASE_URL . UPLOAD_DEPT_GALLERY_IMAGE_PATH . $file['fileName'] . '?' . time();?>">
                                        <i class="port-icon icon icon-picture"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="project-dec">
                                <h4><a href="#"><?php echo $file['fileTitle'] ?></a></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End main content -->
</div>

</div>

<!-- Start Footer bottom Area -->
<?php
$this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/footer');
?>
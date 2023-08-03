<?php echo view('includes/header.php'); ?>


<body>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }

</style>


<script type="text/javascript" src="<?php echo base_url('assets/widgets/wow/wow.js');?>"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<img src="<?php echo base_url('assets/image-resources/blurred-bg/blurred-bg-3.jpg');?>" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content row">

        <div class="col-md-3 center-margin">


            <form method="post" action="<?php echo base_url();?>/SigninController/loginAuth">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-cog"></i>
                        </span>
                        <span class="header-wrapper">
                            <!-- JCCM MANAGEMENT SYSTEM -->
                            <small>Login to your account.</small>
                            <!-- <small><</small> -->
                        </span>
                        <span class="header-buttons">
                            <a href="<?php echo base_url('register');?>" class="btn btn-sm btn-primary" title="">Sign Up</a>
                        </span>
                    </h3>
                    <?php if(session()->getFlashdata('msg')):?>
	                    <div class="alert alert-warning">
	                       <?= session()->getFlashdata('msg') ?>
	                    </div>
	                <?php endif;?>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control"  placeholder="Enter email">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control"  placeholder="Password">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="" title="Recover password">Forgot Your Password?</a>
                        </div>
                        <button class="btn btn-success btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?php echo view('includes/footer.php'); ?>


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


            <form method="post" action="<?php echo base_url(); ?>/SignupController/store">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-cog"></i>
                        </span>
                        <span class="header-wrapper">
                            
                            <small>Register new accounts</small>
                            <!-- <small></small> -->
                        </span>
                        <span class="header-buttons">
                            <a href="<?php echo base_url('/');?>" class="btn btn-sm btn-primary" title="">Sign In</a>
                        </span>
                    </h3>

                    <?php if(isset($success)):?>
                        <div class="alert alert-success">
                           <?= $success ?>
                        </div>
                    <?php endif;?>
                    
                    <?php if(isset($validation)):?>
                    <div class="alert alert-warning">
                       <?= $validation->listErrors() ?>
                    </div>
                    <?php endif;?>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="firstname" placeholder="Firstname" value="" class="form-control" >
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-linecons-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="lastname" placeholder="Lastname" value="" class="form-control" >
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-linecons-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" name="email" placeholder="Email" value="" class="form-control" >
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" placeholder="Password" class="form-control" >
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-linecons-lock"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-linecons-lock"></i>
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<?php echo view('includes/footer.php'); ?>
<footer class="pt-5 pb-1 bg-dark">
    <div class="footer-top pb-3">
        <div class="container">
            <div class="row">

                <div class="col-md-3 footer-info">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>

                <div class="col-md-3 footer-links">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>

                <div class="col-md-3 footer-links">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>
                <div class="col-md-3 footer-contact text-white">
                    <?php dynamic_sidebar('footer_4'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top pt-3 pb-3">
        <div class="container">
            <div class="row">
                <?php /* <div class="col">
                    <p class="m-0 text-white">
                        <?php echo bloginfo('name'); ?> / <?php echo  bloginfo('description'); ?> © All Rights Reserved
                </p>
            </div> */ ?>
            <div class="col">
                <p class="m-0 text-white text-center">Copyright © <strong><?php echo bloginfo('name'); ?></strong>
                    <?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>

    <a href="#header" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <?php wp_footer(); ?>
</footer>
</div>
<!---ENDS WRAP--->

<?php if(!empty(CT_SETTINGS['CT_last_menuItem_button']) && CT_SETTINGS['CT_last_menuItem_button'] == 'yes'):?>    
<!---last menuitem button---><script>(function($) {
    $(document).ready(function() {
        console.log('jQuery Loaded..');
        $('header .navbar-nav a').last().addClass('btn btn-primary');
    });
})(jQuery);</script>
<?php endif;?>

</body>

</html>
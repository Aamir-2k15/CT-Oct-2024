<?php


function custom_search_form()
{
    ob_start(); ?>
    <form role="search" method="get" class="search-form wpl-search-form" action="<?php echo home_url('/'); ?>">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Type Something...." value="<?php echo get_search_query() ?>" name="s">
            <div class="input-group-append">
                <button class="btn button" type="submit">Search</button>
            </div>
        </div>
    </form>
    <?php
  $html = ob_get_clean();
return $html;
}

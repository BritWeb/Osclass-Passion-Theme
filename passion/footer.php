<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
</div><!-- content -->
<?php osc_run_hook('after-main'); ?>
</div>
<?php if( osc_is_home_page() ) { ?>
<div class="wrapper bordered-box">
<!-- top searches nav tabs -->
<section>
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-justified hoempage_tab_content_position">
                  <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="lat-search-tab" data-toggle="tab" href="#lat-search" role="tab" aria-controls="lat-search" aria-selected="true"><i class="fa fa-search" aria-hidden="true"></i> Searches</a>
                    <a class="nav-item nav-link" id="pop-location-tab" data-toggle="tab" href="#pop-location" role="tab" aria-controls="pop-location" aria-selected="false"><i class="fa fa-map-marker" aria-hidden="true"></i> Location</a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="lat-search" role="tabpanel" aria-labelledby="lat-search-tab">
                        <div class="pt-3"></div>
<!-- latest searches -->
 <div class="category-block-content">
	<div class="category-block-content scroll-popular" style="padding:5px">
     <?php if(osc_save_latest_searches()=='1' ) : ?>
                                    <ol-ht>
                                        <?php $i = 1;
                                        osc_get_latest_searches(12);
                                        while(osc_has_latest_searches()) : ?>
                                        <li class="top_search"><a class="truncate-line" href="<?php echo osc_search_url(array('sPattern' => osc_latest_search_text())); ?>"><?php echo osc_latest_search_text(); ?></a></li>
                                        <?php if($i>0&&$i%3==0) : ?>
                                                </ol-ht>
                                                <ul>
                                        <?php endif;
                                        endwhile; ?>
                                    </ul>
                                    <div class="clearfix"></div>
                          <?php endif; ?>
</div>
</div>
<!-- /latest searches --></div>
                  <div class="tab-pane fade" id="pop-location" role="tabpanel" aria-labelledby="pop-location-tab">
                       <div class="pt-3"></div>
<!-- top location -->
 <div class="category-block-content">
	<div class="category-block-content scroll-popular" style="padding:5px">
<?php if(osc_count_list_regions() > 0 ) { ?>
            <ol-ht>
            <?php while(osc_has_list_regions() ) { ?>
                <li class="top_search"><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?> <em>(<?php echo osc_list_region_items() ; ?>)</em></a></li>
            <?php } ?>
            </ol-ht>
        <?php } ?>
</div>
</div>  
<!-- /top location -->  
                  </div>
            </div>
        </div>
    </div>
</section><!-- /top searches nav tabs --> 

</div><!-- /wrapper bordered-box -->
<?php } ?>
<div id="responsive-trigger"></div>
<!-- footer -->
<div class="clear"></div>
<?php osc_show_widgets('footer');?>
<div id="footer">
    <div class="wrapper">
        <ul class="resp-toggle">
            <?php if( osc_users_enabled() ) { ?>
            <?php if( osc_is_web_user_logged_in() ) { ?>
                <li>
                    <?php echo sprintf(__('Hi %s', 'passion'), osc_logged_user_name() . '!'); ?>  &middot;
                    <strong><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'passion'); ?></a></strong> &middot;
                    <a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'passion'); ?></a>
                </li>
            <?php } else { ?>
                <li><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'passion'); ?></a></li>
                <?php if(osc_user_registration_enabled()) { ?>
                    <li>
                        <a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'passion'); ?></a>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
            <li class="publish">
                <a href="<?php echo osc_item_post_url_in_category(); ?>"><?php _e("Publish your ad for free", 'passion');?></a>
            </li>
            <?php } ?>
        </ul>
        <ul>
        <?php
        osc_reset_static_pages();
        while( osc_has_static_pages() ) { ?>
            <li>
                <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
            </li>
        <?php
        }
        ?>
            <li>
                <a href="<?php echo osc_contact_url(); ?>"><?php _e('Contact', 'passion'); ?></a>
            </li>
        </ul>
				<div>&copy; 2019 DealTalk.cn - Allright reserved</div>
      <?php if(file_exists(THEMES_PATH . 'passion/assets/social_links_home_page.php')) { ?> 
        		<div class="footer_social"><?php osc_current_web_theme_path('assets/social_links_home_page.php'); ?></div>
		<?php } ?> 
        <?php if ( osc_count_web_enabled_locales() > 1) { ?>
            <?php osc_goto_first_locale(); ?>
            <strong><?php _e('Language:', 'passion'); ?></strong>
            <?php $i = 0;  ?>
            <?php while ( osc_has_web_enabled_locales() ) { ?>
            <span><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><?php echo osc_locale_name(); ?></a></span><?php if( $i == 0 ) { echo " &middot; "; } ?>
                <?php $i++; ?>
            <?php } ?>
        <?php } ?>
    </div>
</div>

<script src="<?php echo osc_current_web_theme_url('css/bootstrap/js/bootstrap.min.js') ; ?>"></script>
<!-- slidenav -->
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "280px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
 <!-- /slidenav -->
<?php osc_run_hook('footer'); ?>
</body></html>
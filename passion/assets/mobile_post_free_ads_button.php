<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
<a class="post_ad_Button" href="<?php echo osc_item_post_url_in_category() ; ?>"><h2><i class="fa fa-thumb-tack btn-ico" aria-hidden="true"></i>&nbsp;&nbsp;<?php _e("Post Free Classified Ads", 'passion');?></h2></a>
<?php } ?>
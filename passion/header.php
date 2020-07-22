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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo passion_default_direction()=='0' ? 'ltr': 'rtl'; ?>" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php') ; ?>
    </head>
<body <?php passion_body_class(); ?>>
<div class="wrapper">
    <!-- header ad 728x60-->
    <div class="ads_header">
    <?php echo osc_get_preference('header-728x90', 'passion'); ?>
    <!-- /header ad 728x60-->
    </div>
  </div>
<div id="header">
 <div class="top_nav_strip"><!-- top navigation strip -->
    <div class="wrapper">
<?php if(file_exists(THEMES_PATH . 'passion/assets/social_links_home_page.php')) { ?> 
  <div class="header_social"><?php osc_current_web_theme_path('assets/social_links_home_page.php'); ?></div>
<?php } ?>  
        <ul class="nav">
            <?php if( osc_users_enabled() ) { ?>
            <?php if( osc_is_web_user_logged_in() ) { ?>
                <li class="first logged">
                    <span>&nbsp;&nbsp;<i class="fa fa-smile-o" aria-hidden="true" style="color:#C00; font-weight:bold"></i> <?php echo sprintf(__('Hi %s', 'passion'), osc_logged_user_name() . '!'); ?></span>
             <strong><a href="<?php echo osc_user_dashboard_url(); ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php _e('My account', 'passion'); ?></a></strong>
                    <a href="<?php echo osc_user_logout_url(); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php _e('Logout', 'passion'); ?></a>
                </li>
            <?php } else { ?>
                <li><a id="login_open" href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php _e('Login', 'passion') ; ?></a></li><?php if(osc_user_registration_enabled()) { ?>
                    <li><a href="<?php echo osc_register_account_url() ; ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php _e('Register', 'passion'); ?></a></li>
                <?php }; ?>
            <?php } ?>
            <?php } ?>
            <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
          <li class="publish"><a href="<?php echo osc_item_post_url_in_category() ; ?>"><i class="fa fa-thumb-tack btn-ico" aria-hidden="true"></i> <?php _e("Post Free Ads", 'passion');?></a></li>
            <?php } ?>
      <li class="slidenav"><a style="font-size:30px;cursor:pointer; margin-right:10px" onClick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></a></li>          
        </ul>
    </div>
 </div><!-- /top navigation strip -->
 
<!-- SlideNav Navigation --> 
 <div id="mySidenav" class="sidenav">
<table width="100%">
  <tr class="slidenav_header">
    <td width="250px"><a href="<?php echo osc_base_url(); ?>"><h4><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;<?php _e('Home', 'passion'); ?></h4></a></td>
    <td align="center">  <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a></td>
  </tr>
</table>
<ul style="padding-left: 5px">
<li><ul>
    <li><a href="<?php echo osc_item_post_url_in_category() ; ?>"><i class="fa fa-thumb-tack btn-ico" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php _e("Post Free Ads", 'passion');?></a></li>
    </ul></li>
  </ul>
 <ul>
       <li class="mtitle"><i class="fa fa-folder-open btn-ico-right"></i>&nbsp;&nbsp;&nbsp;My Acount<li>
 <li><ul style="padding-left: 12px">
                        <?php if(!osc_is_web_user_logged_in()) { ?>
                        <li><a href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php _e('Login', 'passion'); ?></a></li>
                        <?php } else { ?>
                        <li><ul class="list-inline"><li><span class="navbar_text"><i class="fa fa-user btn-ico-right"></i>&nbsp;&nbsp;<?php printf(__('Hi %s!', 'passion'), osc_logged_user_name()); ?></span> </li><li><a style="color:#C00" href="<?php echo osc_user_logout_url(); ?>"><?php _e('(Logout)', 'passion'); ?></a></li></ul></li>
                        <?php } ?>
                        <li>       
       <li><a href="<?php echo osc_user_list_items_url(); ?>"><i class="fa fa-folder-open btn-ico-right"></i>&nbsp;&nbsp;<?php _e('Manage My Ads', 'passion'); ?></a></li>
        <li><a href="<?php echo osc_user_alerts_url(); ?>"><i class="fa fa-floppy-o btn-ico-right"></i>&nbsp;&nbsp;<?php _e('Saved Searches', 'passion'); ?></a></li>
        <li><a href="<?php echo osc_user_profile_url(); ?>"><i class="fa fa-user btn-ico-right"></i>&nbsp;&nbsp;<?php _e('My Details', 'passion'); ?></a></li>
            <?php if(!osc_is_web_user_logged_in()) { ?>
         <li><a href="<?php echo osc_register_account_url(); ?>"><i class="fa fa-user-plus btn-ico-right"></i>&nbsp;&nbsp;<?php _e('Create Account', 'passion'); ?></a></li><?php } ?>  
         </ul></li>  
     </ul>
          
 <ul>
      <li class="mtitle"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Help & Information</li> 
  <li> 
  <ul style="padding-left: 12px"><li><a href="<?php echo osc_contact_url(); ?>"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php _e('Contact', 'passion'); ?></a></li>
       </ul>
    </li>
 </ul>
 
      <ul>
       <li class="mtitle"><i class="fa fa-user-plus"></i></i>&nbsp;&nbsp;&nbsp;Follow us</li>
       <li>
          <ul style="padding-left: 12px"> 
            <li><a href="https://www.facebook.com/passion_theme/" target="_blank"><i style="color:#3b5998" class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php _e('Facebook', 'passion'); ?></a></li>
            <li><a href="https://twitter.com/passion_theme/" target="_blank"><i style="#00acee" class="fa fa-twitter-square"></i>&nbsp;&nbsp;&nbsp;<?php _e('Twitter', 'passion'); ?></a></li>
          </ul>
        </li>
       </ul>
</div>
<!-- SlideNav Navigation -->       
    <div class="clear"></div>
    <div class="wrapper">
    	<div class="row">
    <div class="col-sm-4 col-md-4">
        <div id="logo">
            <?php echo logo_header(); ?>
   <div class="slidenav_buttom"><a style="font-size:30px;cursor:pointer; margin-right:10px" onClick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
            <span id="description"><?php echo osc_page_description(); ?></span>
        </div><!-- logo -->
       </div><!-- col 3 -->
  <div class="col-sm-8 col-md-8">
<!-- main search --> 
    <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
        <input type="hidden" name="page" value="search"/>
        <div class="main-search">
            <div class="cell">
                <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'passion'), 'passion')); ?>" />
            </div>
            <?php  if ( osc_count_categories() ) { ?>
                <div class="cell selector">
                    <?php osc_categories_select('sCategory', null, __('Select a category', 'passion')) ; ?>
                </div>
                <div class="cell reset-padding">
            <?php  } else { ?>
                <div class="cell">
            <?php  } ?>
                <button class="ui-button ui-button-big js-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </div>
        <div id="message-seach"></div>
    </form>
 <!-- /main search -->  
  </div><!-- col 9 -->
  </div><!-- row -->
</div><!-- wrapper -->
</div><!-- header -->
<!-- Category Menu -->
<div class="main-menu-wrapper">
<div class="container" style="margin-top:-10px">
		<div class="row">

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-width">
      <?php
         while ( osc_has_categories() ) {
         ?>
        <ul class="navbar-nav mr-auto">
             <li class="nav-item dropdown">
                 
                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    $_slug      = osc_category_slug();
                    $_url       = osc_search_category_url();
                    $_name      = osc_category_name();
                    $_total_items = osc_category_total_items();
                    if ( osc_count_subcategories() > 0 ) { ?>
                    
                    <?php } ?>
                    <?php if($_total_items > 0) { ?>
                    
         <a class="nav-link dropdown-toggle" href="#" id="<?php echo osc_esc_html($_slug) ; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_name ; ?></a>                   
                    <?php } else { ?>
        <a class="nav-link dropdown-toggle" href="#" id="<?php echo osc_esc_html($_slug) ; ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_name ; ?></a>    
             <?php } ?>
                 
                 <?php if ( osc_count_subcategories() > 0 ) { ?>
			<ul class="dropdown-menu home-page-menu animate slideIn columns4" style="padding:3px 15px 5px 15px"; aria-labelledby="<?php echo osc_esc_html($_slug) ; ?>">
            
                      <?php if($_total_items > 0) { ?>
                    <a class="category <?php echo $_slug; ?>" href="<?php echo $_url; ?>"><li class="btn-viewall">View all in <?php echo $_name ; ?> <span>(<?php echo $_total_items ; ?>)</span></li></a>
                    <?php } else { ?>
                    <a class="category <?php echo $_slug; ?>" href="#"><li class="btn-viewall">View all in <?php echo $_name ; ?> <span> (<?php echo $_total_items ; ?>)</span></li></a>
                    <?php } ?> 
            
                         <?php while ( osc_has_subcategories() ) { ?>
                             <?php if( osc_category_total_items() > 0 ) { ?>
  <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><li><i class="fa fa-angle-double-right" padding-right:6px;"></i>&nbsp;<?php echo osc_category_name() ; ?></li></a>
                             <?php } else { ?>
   <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="#"><li><i class="fa fa-angle-double-right" padding-right:6px;"></i>&nbsp;<?php echo osc_category_name() ; ?></li></a>
                             <?php } ?>
                             
                         <?php } ?>
                   </ul>
                 <?php } ?>
             </li>
        </ul>
        <?php
                $i++;
            }
            echo '</div>';
        ?>
   </div>
</nav>
  </div><!-- row -->
</div><!-- container -->
</div><!-- /main menu wrapper -->
<!-- /Category Menu -->
<div class="clear"></div>
<?php if( osc_is_home_page() ) { ?>
<?php if(file_exists(THEMES_PATH . 'passion/assets/mobile_post_free_ads_button.php')) { ?>
<!-- mobile button post free ad -->
<div class="post_ad_mobile_button">
<?php osc_current_web_theme_path('assets/mobile_post_free_ads_button.php'); ?>
</div>
<!-- /mobile button post free ad -->
<?php } ?>
<?php } ?>

<!-- header banner -->
<?php if( osc_is_home_page() ) { ?>
<div id="home_banner">
<?php if(file_exists(THEMES_PATH . 'passion/assets/home_page_banner_title.php')) { ?>
<div class="banner-text-control"><?php osc_current_web_theme_path('assets/home_page_banner_title.php'); ?></div>
<?php  } else { ?>
<div class="banner-text-control"><h1><?php echo sprintf(__('Welcome to  %s', 'passion'), osc_page_title()); ?></h1><h2>Buy or sell anything for free</h2></div>
<?php } ?>


</div>
<?php } ?>
<!-- /header banner --> 

<?php if( osc_is_home_page() ) { ?>
<!-- mobile menu --> 
<div id="home-all-category">
<nav class="navbar navbar-lg navbar-light bg-light">
  <h1 style="padding-top:6px">Browse All categories</h1>
<span style="text-align:right"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span style="color:#F30; font-weight:bold"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
  </button></span>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <div style="vertical-align:top"><?php osc_run_hook('inside-main'); ?></div>
      </li>
    </ul>
  </div>
</nav>
</div><!-- /mobile menu --> 
<div class="clear"></div>
<?php } ?>
<?php osc_show_widgets('header'); ?>
<div class="wrapper wrapper-flash">
    <?php
        $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
        if( $breadcrumb !== '') { ?>
        <div class="breadcrumb">
            <?php echo $breadcrumb; ?>
            <div class="clear"></div>
        </div>
    <?php
        }
    ?>
    <?php osc_show_flash_message(); ?>
</div>
<?php osc_run_hook('before-content'); ?>
<div class="wrapper" id="content">
    <?php osc_run_hook('before-main'); ?>
    <div id="main">
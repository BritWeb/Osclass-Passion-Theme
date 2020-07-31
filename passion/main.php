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

    // meta tag robots
    osc_add_hook('header','passion_follow_construct');

    passion_add_body_class('home');


    $buttonClass = '';
    $listClass   = '';
    if(passion_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div class="clear"></div>
<div class="latest_ads">
<h1><strong><?php _e('Latest Listings', 'passion'); ?></strong></h1>

<?php $search = Search::newInstance();
View::newInstance()->_exportVariableToView('latestItems', $search->getLatestItems(osc_max_latest_items(), array(), true));

if( osc_count_latest_items() == 0) { ?>
    <div class="clear"></div>
    <p class="empty"><?php _e("There aren't listings available at this moment", 'passion'); ?></p>
<?php } else { ?>
    <div class="actions">
      <span class="doublebutton <?php echo $buttonClass; ?>">
           <a href="<?php echo osc_base_url(true); ?>?sShowAs=list" class="list-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('List', 'passion'); ?></span></a>
           <a href="<?php echo osc_base_url(true); ?>?sShowAs=gallery" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('Grid', 'passion'); ?></span></a>
      </span>
    </div>
    <?php
    View::newInstance()->_exportVariableToView("listType", 'latestItems');
    View::newInstance()->_exportVariableToView("listClass",$listClass);
    osc_current_web_theme_path('loop.php');
    ?>
    <div class="clear"></div>
    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
        <p class="see_more_link"><a href="<?php echo osc_search_show_all_url() ; ?>" >
           <strong><?php _e('See all listings', 'passion') ; ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </strong></a>
        </p>
    <?php } ?>
<?php } ?>


<!-- hot item list -->
<div style="font-weight:bold; padding-top:10px" class="container">
<div class="row">
  <a data-toggle="collapse" data-target="#hot-items" style="cursor:pointer; margin-bottom:5px"><?php _e('Check Out These Hot Items', 'passion'); ?> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
</div>
  <div id="hot-items" class="collapse">
          <?php osc_query_item(); $c = 1; ?>
          <ol>
          <?php while(osc_has_custom_items() and $c <= 10) { ?>
           <li class="hotlink-style"><a href="<?php echo osc_item_url();?>" title="<?php echo strip_tags(osc_item_description());?>"><?php echo ucfirst(osc_item_title());?></a></li>    
          <?php $c++; } ?>
      </ol></div>
    </div>
<!-- /hot item list -->
</div>
</div><!-- main -->
<div id="sidebar">
    <?php if( osc_get_preference('homepage-sidebar-300x250', 'passion') != '') {?>
    <!-- sidebar ad 350x250 -->
	<div class="ads_300 text-center">
        <?php echo osc_get_preference('homepage-sidebar-300x250', 'passion'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>

</div><!-- sidebar -->
<div class="clear"><!-- do not close, use main clossing tag for this case -->

<?php if( osc_get_preference('homepage-728x90', 'passion') != '') { ?>
<!-- homepage ad 728x60-->
<div class="ads_728_homepage text-center">
    <?php echo osc_get_preference('homepage-728x90', 'passion'); ?>
</div>
<!-- /homepage ad 728x60-->
<?php } ?>

<?php osc_current_web_theme_path('footer.php') ; ?>
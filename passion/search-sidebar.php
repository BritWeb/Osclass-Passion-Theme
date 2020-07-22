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
     $category = (array) __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }

?>
<div id="sidebar" class="bordered-box">
  <button  type="button" class="btn btn-primary btn-sm btn-block" data-toggle="collapse" data-target="#subscribe">Subscribe to this search</button>
  <div id="subscribe" class="collapse">
<?php osc_alert_form(); ?>
  </div>
<div class="filters">
    <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
        <input type="hidden" name="page" value="search"/>
        <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
   <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
        <?php foreach(osc_search_user() as $userId) { ?>
        <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
        <?php } ?>
            <fieldset>
    	<h3><?php _e('Refine category', 'passion') ; ?></h3>
        <div class="row">
         <div class="refine-category"><?php passion_sidebar_category_search($category['pk_i_id']); ?></div>
        </div>
    </fieldset>
        <fieldset class="first">
            <h3><?php _e('Your search', 'passion'); ?></h3>
            <div class="row">
                <input class="input-text" type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
            </div>
        </fieldset>
        <fieldset>
            <h3><?php _e('City', 'passion'); ?></h3>
            <div class="row">
                <input class="input-text" type="hidden" id="sRegion" name="sRegion" value="<?php echo osc_esc_html(Params::getParam('sRegion')); ?>" />
                <input class="input-text" type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html(osc_search_city()); ?>" />
            </div>
        </fieldset>
        <?php if( osc_images_enabled_at_items() ) { ?>
        <fieldset>
            <h3><?php _e('Show only', 'passion') ; ?></h3>
            <div class="row">
                <input style="margin-left:40px" type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> />
                <label style="margin-left:20px" for="withPicture"><?php _e('listings with pictures', 'passion') ; ?></label>
            </div>
        </fieldset>
        <?php } ?>
        
        <?php if( osc_price_enabled_at_items() ) { ?>
        <fieldset>
        <h3><?php _e('Price', 'passion') ; ?></h3>
           <div class="form-row">
    <div class="col"><span style="margin-left:10px">Min:</span>
      <input id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" type="text">
    </div>
    <div class="col"><span style="margin-left:10px">Max:</span>
      <input id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" type="text">
    </div>
  </div>
               
        </fieldset>
        <?php } ?>
        <div class="plugin-hooks">
            <?php
            if(osc_search_category_id()) {
                osc_run_hook('search_form', osc_search_category_id()) ;
            } else {
                osc_run_hook('search_form') ;
            }
            ?>
        </div>
        <?php
        $aCategories = osc_search_category();
        foreach($aCategories as $cat_id) { ?>
            <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
        <?php } ?>
        <div class="actions" style="padding:5px;">
            <button type="submit" class="btn btn-primary btn-block"><?php _e('Apply', 'passion') ; ?></button>
        </div>
    </form>
</div>
<div>

    <?php if( osc_get_preference('sidebar-300x250', 'passion') != '') {?>
    <!-- sidebar ad 350x250 -->
    <div class="ads_300" style="margin-top:15px">
        <?php echo osc_get_preference('sidebar-300x250', 'passion'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>
</div>

</div>
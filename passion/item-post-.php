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
    osc_add_hook('header','passion_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    passion_add_body_class('item item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit') {
        $action = 'item_edit_post';
        $edit = true;
    }

    ?>
<?php osc_current_web_theme_path('header.php') ; ?>
        <?php
    if (passion_default_location_show_as() == 'dropdown') {
        ItemForm::location_javascript();
    } else {
        ItemForm::location_javascript_new();
    }
    ?>
    <div class="form-container form-horizontal">
        <div class="resp-wrapper">
            <ul id="error_list"></ul>
                <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
                    <fieldset>
                    <input type="hidden" name="action" value="<?php echo $action; ?>" />
                        <input type="hidden" name="page" value="item" />
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                    <?php } ?>
                        <h2><?php _e('General Information', 'passion'); ?></h2>
                        <div class="control-group">
                            <label class="control-label" for="select_1"><?php _e('Category', 'passion'); ?></label>
                            <div class="controls">
                                <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'passion')); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Title', 'passion'); ?></label>
                            <div class="controls">
                                <?php ItemForm::title_input('title',osc_current_user_locale(), osc_esc_html( passion_item_title() )); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="description[<?php echo osc_current_user_locale(); ?>]"><?php _e('Description', 'passion'); ?></label>
                            <div class="controls">
                                <?php ItemForm::description_textarea('description',osc_current_user_locale(), osc_esc_html( passion_item_description() )); ?>
                            </div>
                        </div>
                        <?php if( osc_price_enabled_at_items() ) { ?>
                        <div class="control-group control-group-price">
                            <label class="control-label" for="price"><?php _e('Price', 'passion'); ?></label>
                            <div class="controls">
                                <?php ItemForm::price_input_text(); ?>
                                <?php ItemForm::currency_select(); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if( osc_images_enabled_at_items() ) {
                            ItemForm::ajax_photos();
                         } ?>
                        <div class="box location">
                            <h2><?php _e('Listing Location', 'passion'); ?></h2>
                            <?php if(count(osc_get_countries()) > 1) { ?>
                            <div class="control-group">
                                <label class="control-label" for="country"><?php _e('Country', 'passion'); ?></label>
                                <div class="controls">
                                    <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="regionId"><?php _e('Region', 'passion'); ?></label>
                                <div class="controls">
                                    <?php
                                    if (passion_default_location_show_as() == 'dropdown') {
                                        if($edit) {
                                            ItemForm::region_select(osc_get_regions(osc_item_country_code()), osc_item());
                                        } else {
                                            ItemForm::region_select(osc_get_regions(osc_user_field('fk_c_country_code')), osc_user());
                                        }
                                    } else {
                                        if($edit) {
                                            ItemForm::region_text(osc_item());
                                        } else {
                                            ItemForm::region_text(osc_user());
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            } else {
                                $aCountries = osc_get_countries();
                                $aRegions = osc_get_regions($aCountries[0]['pk_c_code']);
                                ?>
                            <input type="hidden" id="countryId" name="countryId" value="<?php echo osc_esc_html($aCountries[0]['pk_c_code']); ?>"/>
                            <div class="control-group">
                                <label class="control-label" for="region"><?php _e('Region', 'passion'); ?></label>
                                <div class="controls">
                                  <?php
                                    if (passion_default_location_show_as() == 'dropdown') {
                                        if($edit) {
                                            ItemForm::region_select($aRegions, osc_item());
                                        } else {
                                            ItemForm::region_select($aRegions, osc_user());
                                        }
                                    } else {
                                        if($edit) {
                                            ItemForm::region_text(osc_item());
                                        } else {
                                            ItemForm::region_text(osc_user());
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="control-group">
                                <label class="control-label" for="city"><?php _e('City', 'passion'); ?></label>
                                <div class="controls">
                                    <?php
                                    if (passion_default_location_show_as() == 'dropdown') {
                                        if($edit) {
                                            ItemForm::city_select(null, osc_item());
                                        } else { // add new item
                                            ItemForm::city_select(osc_get_cities(osc_user_region_id()), osc_user());
                                        }
                                    } else {
                                        ItemForm::city_text(osc_user());
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="cityArea"><?php _e('City Area', 'passion'); ?></label>
                                <div class="controls">
                                    <?php ItemForm::city_area_text(osc_user()); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address"><?php _e('Address', 'passion'); ?></label>
                                <div class="controls">
                                  <?php ItemForm::address_text(osc_user()); ?>
                                </div>
                            </div>
                        </div>
                        <!-- seller info -->
                        <?php if(!osc_is_web_user_logged_in() ) { ?>
                        <div class="box seller_info">
                            <h2><?php _e("Seller's information", 'passion'); ?></h2>
                            <div class="control-group">
                                <label class="control-label" for="contactName"><?php _e('Name', 'passion'); ?></label>
                                <div class="controls">
                                    <?php ItemForm::contact_name_text(); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="contactEmail"><?php _e('E-mail', 'passion'); ?></label>
                                <div class="controls">
                                    <?php ItemForm::contact_email_text(); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls checkbox">
                                    <?php ItemForm::show_email_checkbox(); ?> <label for="showEmail"><?php _e('Show e-mail on the listing page', 'passion'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-left:15px">
                        <?php
                        }
                        if($edit) {
                            ItemForm::plugin_edit_item();
                        } else {
                            ItemForm::plugin_post_item();
                        }
                        ?>
                        </div>
                            <?php if( osc_recaptcha_items_enabled() ) { ?>
                                <div class="controls">
                                    <?php osc_show_recaptcha(); ?>
                                </div>
                            <?php }?>
                        <div class="controls">
                      <?php if(function_exists('terms_manual_include')){ terms_manual_include();} ?>
                        </div>  
                            <div class="controls">
                                <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php if($edit) { _e("Update", 'passion'); } else { _e("Publish", 'passion'); } ?></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            $('#price').bind('hide-price', function(){
                $('.control-group-price').hide();
            });

            $('#price').bind('show-price', function(){
                $('.control-group-price').show();
            });

    <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
    $().ready(function(){
        $("#price").blur(function(event) {
            var price = $("#price").prop("value");
            <?php if(osc_locale_thousands_sep()!='') { ?>
            while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
            }
            <?php }; ?>
            <?php if(osc_locale_dec_point()!='') { ?>
            var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
            if(tmp.length>2) {
                price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
            }
            <?php }; ?>
            $("#price").prop("value", price);
        });
    });
    <?php }; ?>
</script>
<?php osc_current_web_theme_path('footer.php'); ?>

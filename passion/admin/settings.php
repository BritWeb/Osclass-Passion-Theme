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

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'passion') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'passion'); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/passion/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Search placeholder', 'passion'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'passion') ); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Show lists as:', 'passion'); ?></div>
                <div class="form-controls">
                    <select name="defaultShowAs@all">
                        <option value="gallery" <?php if(passion_default_show_as() == 'gallery'){ echo 'selected="selected"' ; } ?>><?php _e('Gallery','passion'); ?></option>
                        <option value="list" <?php if(passion_default_show_as() == 'list'){ echo 'selected="selected"' ; } ?>><?php _e('List','passion'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

    <h2 class="render-title"><?php _e('Location input', 'passion'); ?></h2>
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Show location input as:', 'passion'); ?></div>
                <div class="form-controls">
                    <select name="defaultLocationShowAs">
                        <option value="dropdown" <?php if(passion_default_location_show_as() == 'dropdown'){ echo 'selected="selected"' ; } ?>><?php _e('Dropdown','passion'); ?></option>
                        <option value="autocomplete" <?php if(passion_default_location_show_as() == 'autocomplete'){ echo 'selected="selected"' ; } ?>><?php _e('Autocomplete','passion'); ?></option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

    <h2 class="render-title"><?php _e('Ads management', 'passion'); ?></h2>
    <div class="form-row">
        <div class="form-label"></div>
        <div class="form-controls">
            <p><?php _e('In this section you can configure your site to display ads and start generating revenue.', 'passion'); ?><br/><?php _e('If you are using an online advertising platform, such as Google Adsense, copy and paste here the provided code for ads.', 'passion'); ?></p>
        </div>
    </div>
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Header 728x90', 'passion'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;"name="header-728x90"><?php echo osc_esc_html( osc_get_preference('header-728x90', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the top of your website, next to the site title and above the search results. Note that the size of the ad has to be 728x90 pixels.', 'passion'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage 728x90', 'passion'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="homepage-728x90"><?php echo osc_esc_html( osc_get_preference('homepage-728x90', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on the main site of your website. It will appear both at the top and bottom of your site homepage. Note that the size of the ad has to be 728x90 pixels.', 'passion'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results 728x90 (top of the page)', 'passion'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-results-top-728x90"><?php echo osc_esc_html( osc_get_preference('search-results-top-728x90', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown on top of the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'passion'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Search results 728x90 (middle of the page)', 'passion'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="search-results-middle-728x90"><?php echo osc_esc_html( osc_get_preference('search-results-middle-728x90', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown among the search results of your site. Note that the size of the ad has to be 728x90 pixels.', 'passion'); ?></div>
                </div>
            </div>           
            <div class="form-row">
                <div class="form-label"><?php _e('Item & Search Sidebar 300x250', 'passion'); ?></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="sidebar-300x250"><?php echo osc_esc_html( osc_get_preference('sidebar-300x250', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the right sidebar of your website, on the product detail & search page. Note that the size of the ad has to be 300x350 pixels.', 'passion'); ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Homepage Sidebar 300x250', 'passion'); ?><br /><br /><span style="color:#C00"><?php _e('Use multiple ad blocks if needed', 'passion'); ?></span></div>
                <div class="form-controls">
                    <textarea style="height: 115px; width: 500px;" name="homepage-sidebar-300x250"><?php echo osc_esc_html( osc_get_preference('homepage-sidebar-300x250', 'passion') ); ?></textarea>
                    <br/><br/>
                    <div class="help-box"><?php _e('This ad will be shown at the right sidebar of your website, on the homepage. Note that the size of the ad has to be 300x350 pixels.', 'passion'); ?></div>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'passion'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>

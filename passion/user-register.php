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

    passion_add_body_class('register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
?>
<div class="form-container form-horizontal form-container-box">
    <div class="header">
        <h1><?php _e('Register an account for free', 'passion'); ?></h1>
    </div>
    <div class="resp-wrapper">
        <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="page" value="register" />
            <input type="hidden" name="action" value="register_post" />
            <ul id="error_list"></ul>
            <div class="control-group">
                <label class="control-label" for="name"><?php _e('Name', 'passion'); ?></label>
                <div class="controls">
                    <?php UserForm::name_text(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="email"><?php _e('E-mail', 'passion'); ?></label>
                <div class="controls">
                    <?php UserForm::email_text(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password"><?php _e('Password', 'passion'); ?></label>
                <div class="controls">
                    <?php UserForm::password_text(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password-2"><?php _e('Repeat password', 'passion'); ?></label>
                <div class="controls">
                    <?php UserForm::check_password_text(); ?>
                    <p id="password-error" style="display:none;">
                        <?php _e("Passwords don't match", 'passion'); ?>
                    </p>
                </div>
            </div>
            <?php osc_run_hook('user_register_form'); ?>
            <div class="control-group">
                <div class="controls">
                    <?php osc_show_recaptcha('register'); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Create", 'passion'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
 <div class="control-group">
    <p style="border:#fff solid thin; border-radius:6px; padding:2px; background-color:#FFC; margin-top:5px; color:#000" class="text-info"><small>By creating an account or using a social login, you are agreeing to our website Terms & Conditions and Privacy Policy.</small></p>
   </div> 
 <div class="control-group"><p style="border:#F60 solid thin; border-radius:6px; padding:6px; background-color:#FFF"><i class="fa fa-bullhorn" style="color:#C00; font-size:18px; font-weight:bold"></i> Upon submitting the form an activation link will be emailed to you, please check in your <strong>inbox</strong> or <strong>spam folder</strong> and click to activate your account</p></div>
    </div>
<?php UserForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
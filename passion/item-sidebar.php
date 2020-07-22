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
<div id="sidebar">

    <?php if( osc_get_preference('sidebar-300x250', 'passion') != '') {?>
    <!-- sidebar ad 350x250 -->
    <div class="ads_300_item text-center" style="margin-bottom:10px">
        <?php echo osc_get_preference('sidebar-300x250', 'passion'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>

<section class="widget-box">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-justified">
                  <div class="nav nav-tabs item_tab_content_position" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                    <a class="nav-item nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    <a class="nav-item nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                    
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div class="pt-3"></div>
 <!-- user details -->   
<div class="profile_image">
            <div class="item_user_info_ctrl">
                <?php if( osc_item_user_id() != null ) { ?>
                <img src="<?php echo osc_current_web_theme_url('images/user-profile-default.png') ; ?>" /> 
                <?php }else{?>
                    <img class="item_user_info" src="<?php echo osc_current_web_theme_url('images/user-profile-default.png') ; ?>" /> 
                <?php }?>
            </div>
        </div>
                                        <div class="item_user_info_ctrl_det">
                                            <!--end author-image-->
                                            <div class="author-description">
                                            <?php if( osc_item_user_id() != null ) { ?>
                                            <u><a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></u>
    <?php } else { ?>
                                                <h4><?php printf('%s', osc_item_contact_name()); ?></h4>
                                                <?php } ?>
                                                <?php if(osc_item_user_id() <> 0) { ?>
                      <?php $get_user = User::newInstance()->findByPrimaryKey( osc_item_user_id() ); ?>
                      <?php if(isset($get_user['dt_reg_date']) AND $get_user['dt_reg_date'] <> '') { ?>
                        <div class="" data-rating=""><span class="small"><?php echo __('Registered:', 'passion'); ?> <?php echo osc_format_date(osc_user_field('dt_reg_date')); ?></span></div>
                        <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" class="text-uppercase"><?php echo __('Listings', 'passion'); ?>
                                                    <span class="appendix">(<?php echo osc_user_items_validated() ?>)</span>
                                                </a>
                      <?php } else { ?>
                        <div class="" data-rating=""><span class="small"><?php echo __('Unknown registration date', 'passion'); ?></span></div>
                      <?php } ?>
                    <?php } else { ?>
                      <div class="" data-rating=""><span class="small"><?php echo __('Unregistered user', 'passion'); ?></span></div>
                    <?php } ?>
                                            </div>
                                            <!-- website --> <p><?php if(osc_user_website() !='') : { ?>
                   <span class="user-websitesite">&nbsp;&nbsp;<a href="<?php echo osc_user_website() ; ?>" target="_blank"><?php _e("Visit Publisher's Website", 'passion'); ?></a></span>
               <?php } elseif(osc_user_website() =='') : { ?> <span class="user-websitesite">&nbsp;&nbsp;<?php _e("No Website Given", 'passion'); } ?></span><?php endif; ?></p><!-- website --> 
                                            <!--end author-description-->
                                        </div>
                                        <hr class="hr-style">    
                                            <?php if(function_exists('osc_telephone_number')){ osc_telephone_number();} ?>
                                       <div class="container">
                                        <?php if ( osc_user_phone_mobile() != '' ) { ?>  
                                       <div class="row phone_number_box">
                                            <div style="text-align:right"><i class="fa fa-phone-square"></i> Mobile:&nbsp;</div>
                                            <div style="text-align:right" class="float-right phonenumber phone-number-reveal" data-toggle="tooltip" data-placement="top" title="Click to reveal"><?php echo osc_user_phone_mobile(); ?></div>
                                        </div><!-- row -->
                                            <?php } else { ?>
                                       <div class="row phone_number_box"> 
                                            <div><i class="fa fa-phone-square"></i> Mobile:&nbsp;</div>
                                            <div class="no-phone-number"><?php _e("Not Given", 'passion'); ?></div>
                                            </div><!-- row -->
                                            <?php } ?>
                                            <?php if ( osc_user_phone_land() != '' ) { ?>
                                        <div class="row phone_number_box" style="margin-top:10px">
                                            <div><i class="fa fa-phone-square"></i> Landline:&nbsp;</div>
                                            <div style="text-align:right" class="phonenumber phone-number-reveal" data-toggle="tooltip" data-placement="top" title="Click to reveal"><?php echo osc_user_phone_land(); ?></div>
                                        </div><!-- row -->          
                                            <?php } else { ?>
                                        <div class="row phone_number_box" style="margin-top:10px">
                                            <div><i class="fa fa-phone-square"></i> Landline:&nbsp;</div>
                                            <div class="no-phone-number"><?php _e("Not Given", 'passion'); ?></div>
                                        </div><!-- row -->
										</div><!-- container -->
                                            <?php } ?>
                                           <?php if( osc_item_show_email() ) { ?> <?php _e('E-mail', 'passion'); ?> 
                                      <a href="mailto:<?php echo osc_item_contact_email(); ?>"><?php echo osc_item_contact_email(); ?></a>
                                           <?php } ?>
                                        <!-- /user details -->
									</div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                       <div class="pt-3"></div>
<!-- contact -->
 <div id="contact" class="form-container form-vertical">
        <?php if( osc_item_is_expired () ) { ?>
            <p>
                <?php _e("The listing is expired. You can't contact the publisher.", 'passion'); ?>
            </p>
        <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
            <p>
                <?php _e("It's your own listing, you can't contact the publisher.", 'passion'); ?>
            </p>
        <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
            <p>
                <?php _e("You must log in or register a new account in order to contact the advertiser", 'passion'); ?>
            </p>
            <div class="row">
        <div class="col">
                <strong><a class="btn btn-light btn-sm btn-block" href="<?php echo osc_user_login_url(); ?>" role="button"><i class="fa fa-sign-in" aria-hidden="true"></i> <?php _e('Login', 'passion'); ?></a></strong>
                </div>
        <div class="col">
                <strong><a class="btn btn-light btn-sm btn-block" href="<?php echo osc_register_account_url(); ?>" role="button"><i class="fa fa-user-plus" aria-hidden="true"></i> <?php _e('Register', 'passion'); ?></a></strong>
            </div></div>
        <?php } else { ?>

            <ul id="error_list"></ul>
            <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
                <?php osc_prepare_user_info(); ?>
                 <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                <div class="control-group">
                    <label class="control-label" for="yourName"><?php _e('Your name', 'passion'); ?>:</label>
                    <div class="controls"><?php ContactForm::your_name(); ?></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="yourEmail"><?php _e('Your e-mail address', 'passion'); ?>:</label>
                    <div class="controls"><?php ContactForm::your_email(); ?></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="phoneNumber"><?php _e('Phone number', 'passion'); ?> (<?php _e('optional', 'passion'); ?>):</label>
                    <div class="controls"><?php ContactForm::your_phone_number(); ?></div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="message"><?php _e('Message', 'passion'); ?>:</label>
                    <div class="controls textarea"><?php ContactForm::your_message(); ?></div>
                </div>

                <?php if(osc_item_attachment()) { ?>
                    <div class="control-group">
                        <label class="control-label" for="attachment"><?php _e('Attachment', 'passion'); ?>:</label>
                        <div class="controls"><?php ContactForm::your_attachment(); ?></div>
                    </div>
                <?php }; ?>

                <div class="control-group">
                    <div class="controls">
                        <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                        <?php if( osc_recaptcha_public_key() ) { ?>
                        <script type="text/javascript">
                            var RecaptchaOptions = {
                                theme : 'custom',
                                custom_theme_widget: 'recaptcha_widget'
                            };
                        </script>
                        <style type="text/css">
                          div#recaptcha_widget, div#recaptcha_image > img { width:240px; margin-top: 5px; }
                          div#recaptcha_image { margin-bottom: 15px; }
                        </style>
                        <div id="recaptcha_widget">
                            <div id="recaptcha_image"><img /></div>
                            <span class="recaptcha_only_if_image"><?php _e('Enter the words above','passion'); ?>:</span>
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                            <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'passion'); ?></a></div>
                        </div>
                        <?php } ?>
                        <?php osc_show_recaptcha(); ?>
                        <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Send", 'passion');?></button>
                    </div>
                </div>
            </form>
            <?php ContactForm::js_validation(); ?>
        <?php } ?>
    </div>
<!-- /contact -->     
                  </div>
                  <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                       <div class="pt-3"></div>
<!-- map -->
                            <div class="text-center">
<iframe width="100%" height="auto" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
							</div>
<!-- map -->
                      </div>
            </div>
        </div>
    </div>
</section>
 
     <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
<!-- item social share -->
  <div style="margin: -17px 0 -8px 0"> <div class="item_social_share">
        <ul>
            <li><a href="https://twitter.com/share?url=<?php echo urlencode(osc_item_url())?>&text=<?php echo osc_esc_html(osc_item_title())?>" target="_blank" class="item_share_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(osc_item_url())?>" target="_blank" class="item_share_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="http://www.linkedin.com/shareArticle?url=<?php echo urlencode(osc_item_url())?>&title=<?php echo osc_esc_html(osc_item_title())?>" target="_blank" class="item_share_linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="mailto:?Subject=<?php echo osc_esc_html(osc_item_title())?>&am aria-hidden="true"p;Body=<?php echo osc_esc_html(osc_item_title())?> on <?php echo urlencode(osc_item_url())?>" class="item_share_mail"><i class="fa fa-envelope"></i></a></li>
        </ul>
    </div> </div>
<!-- /item social share -->

    <?php if(function_exists('watchlist')) {?>
    <div class="list_watch">
    <button type="button" class="btn btn-primary btn-block"><i class="fa fa-heart-o"></i> <?php watchlist(); ?></button>
    </div>
    <?php } ?>

	<a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="btn btn-danger btn-sm btn-block send_to_friend"><i class="fa fa-send-o"></i> <?php _e('Send to friend', 'passion'); ?></a>
<!-- mark as -->
    <?php if(!osc_is_web_user_logged_in() || osc_logged_user_id()!=osc_item_user_id()) { ?>
			<form action="<?php echo osc_base_url(true); ?>" method="post" name="mask_as_form" id="mask_as_form">
            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
            <input type="hidden" name="as" value="spam" />
            <input type="hidden" name="action" value="mark" />
            <input type="hidden" name="page" value="item" />
    <div class="mark_as_box"><select name="as" id="as" class="mark_as">
                    <option><?php _e("Mark this listing as...", 'passion'); ?></option>
                    <option value="spam"><?php _e("Mark as spam", 'passion'); ?></option>
                    <option value="badcat"><?php _e("Mark as misclassified", 'passion'); ?></option>
                    <option value="repeated"><?php _e("Mark as duplicated", 'passion'); ?></option>
                    <option value="expired"><?php _e("Mark as expired", 'passion'); ?></option>
                    <option value="offensive"><?php _e("Mark as offensive", 'passion'); ?></option>
            </select></div> 
        </form>
    <?php } ?>         
 <!-- /mark as -->     

    <?php if( osc_get_preference('sidebar-300x250', 'passion') != '') {?>
    <!-- sidebar ad 350x250 -->
    <div class="ads_300_item text-center">
        <?php echo osc_get_preference('sidebar-300x250', 'passion'); ?>
    </div>
    <!-- /sidebar ad 350x250 -->
    <?php } ?>

        <div class="widget-box" style="margin-top:10px;">
                <nav class="nav-justified">
                  <div class="nav nav-tabs item_tab_content_position" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="disclaimer-tab" data-toggle="tab" href="#disclaimer" role="tab" aria-controls="disclaimer" aria-selected="true">Useful Info</a>
                    <a class="nav-item nav-link" id="useful-info-tab" data-toggle="tab" href="#useful-info" role="tab" aria-controls="useful-info" aria-selected="false">Disclaimer</a>                   
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="disclaimer" role="tabpanel" aria-labelledby="disclaimer-tab">
                        <div class="pt-3"></div>
 <div id="useful_info" class="useful_info_txt">
        <ol style="margin-left:-20px">
            <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'passion'); ?></li>
            <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'passion'); ?></li>
            <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'passion'); ?></li>
            <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'passion'); ?></li>
        </ol>
    </div>
                      </div>
                  <div class="tab-pane fade" id="useful-info" role="tabpanel" aria-labelledby="useful-info-tab">
                       <div class="pt-3"></div>
                    <div id="useful_info" class="useful_info_txt"><p>Please approach seller/buyer with caution. Investigate thoroughly before buying or selling anything on this site.</p><p><?php echo osc_page_title(); ?> will not get involved with any dispute whatsoever arising between individuals</p></div>  
                  </div>                  
                </div>
            </div>
        </div>
    </div>
</div><!-- /sidebar -->
   <script>
   $(document).ready(function() {
    var phonenumbers = [];
    $(".phonenumber").each(function(i) {
        phonenumbers.push($(this).text());
        var newcontent = $(this).text().substr(0, $(this).text().length - 4)
        $(this).text(newcontent);
        $(this).bind("click", function() {
            if ($(this).text() == phonenumbers[i]) {
                $(this).text(phonenumbers[i].substr(0, phonenumbers[i].length - 4));
            } else {
            $(".phonenumber").each(function(x) {
                if ($(this).text() == phonenumbers[x]) {
                   $(this).text(phonenumbers[x].substr(0, phonenumbers[x].length - 4));
                }
            });            
            $(this).text(phonenumbers[i]);
            }
        });
    });
});
   </script>
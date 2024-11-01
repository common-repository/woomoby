<div class="tab-pane fade" id="layout_app" role="tabpanel">
    <div class="card">
        <div class="card-block">
            <?php $pageID = get_page_by_path('woomoby'); 
            $page_link = str_replace(home_url(),"",get_the_permalink($pageID)); 
            ?>
            <center>
                <div class="frame-phone">
                    <div class="phone-screen">
                        <iframe src="<?php echo $page_link; ?>" width="300" height="500" overflow-x="hidden" id="preview-frame"></iframe>
                    </div>
                </div>
                <a href="" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#woomoby_formModal" style="margin:0 auto; width:20%; padding: 5px;">SEND TO APP STORE NOW</a>
            </center>
            <div id="woomoby_formModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="form-notification">
                            <div id="frmContact">
                                <div id="mail-status"></div>
                                <div class="woomoby-field woomoby-half">
                                    <?php
                                    $userData = get_userdata(get_current_user_id());
                                    ?>
                                    <label>Name</label>
                                    <span id="userName-info" class="info"></span><br/>
                                    <input type="text" name="userName" id="userName" value="<?php echo $userData->display_name; ?>" class="demoInputBox">
                                </div>
                                <div class="woomoby-field woomoby-half">
                                    <label>Email</label>
                                    <span id="userEmail-info" class="info"></span><br/>
                                    <input type="email" name="userEmail" id="userEmail" value="<?php echo $userData->user_email; ?>" />
                                </div>
                                <div class="woomoby-field">
                                    <label>Message</label> 
                                    <span id="content-info" class="info"></span><br/>
                                    <textarea name="content" id="content" class="demoInputBox" cols="60" rows="6">I want to generate my app. Here is my App Link:<?php echo get_the_permalink($pageID); ?></textarea>
                                </div>
                                <div class="woomoby-field">
                                    <button name="sendmail" class="btn btn-sm btn-primary  sendNotifications">Send Message</button>
                                    <input type="hidden" value="<?php echo $settings_options[ 'apikey_woomoby'];?>" name="token_id" id="token_id" />
                                </div>
                            </div>
                        </div>    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <?php _e('Close', 'woomoby'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
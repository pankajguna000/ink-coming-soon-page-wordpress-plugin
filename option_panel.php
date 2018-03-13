<?php
include_once 'upload_function.php';

add_action('admin_menu', 'Ink_UnderConstruction_menu_page');

function Ink_UnderConstruction_menu_page() {
    add_menu_page('UC', 'Ink csp', 'manage_options', 'uc_page', 'Ink_UnderConstruction_setting_page', plugins_url('image/icon.png', __FILE__), 118);
}

function Ink_UnderConstruction_setting_page() {
    global $wpdb;
    $value = get_option('ink_underconstruction_setting_value');
    ?>
    <div class="ink_info_wraper"> 
        <h4> Useful Plugin that help you to improve your website </h4>
        <ul>	
            <li><a href="http://wordpress.org/plugins/formget-contact-form/" target="_blank">FormGet Contact Form</a></li>
            <li><a href="http://wordpress.org/plugins/sliding-contact-form-by-formget/" target="_blank">Sliding Contact Form By FormGet</a></li>
            <li><a href="http://wordpress.org/plugins/contact-form-integrated-with-google-maps/" target="_blank">Contact Form Integrated With Google Maps</a></li>
        </ul>
    </div>
    <div id="ink_of_container" class="ink_wrap">

        <div id="ink_header">
            <div class="ink_logo">
                <h2>Ink Coming Soon Page</h2>                   
            </div>
            <a target="#">
                <div class="ink_icon-option"> </div>
            </a>
            <div class="clear"></div>
        </div>
        <div id="ink_main">

            <div id="ink_of-nav">
                <ul>
                    <li> <a class="pn-view-a" href="#pn_content" title="General Setting">General Setting </a></li>
                    <li> <a class="pn-view-a" href="#pn_displaysetting" title="Appearence Settings">Appearence Settings</a></li>
                    <li> <a class="pn-view-a" href="#pn_template" title="Notification Setting">Notification Setting</a></li>
                    <li> <a class="pn-view-a" href="#pn_subscriber" title="Subscriber List">Subscriber List</a></li>

                </ul>
            </div>

            <div id="ink_content">
                <div class="ink_group" id="pn_content">
                    <h2>General Setting</h2>
                    <div class="ink_section section-text">


                        <table class="form-table"><tbody>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_status"> Status</label></th>
                                    <td>
                                        <?php if ($value['plugin_status'] == 'enable') { ?>
                                            <input type="radio" name="status" value="disable" id="status" />  Disabled<br>
                                            <input type="radio" name="status" value="enable" id="status" checked />  Enabled
                                        <?php } else { ?>
                                            <input type="radio" name="status" value="disable" id="status" checked />  Disabled<br>
                                            <input type="radio" name="status" value="enable" id="status" />  Enabled
                                        <?php } ?>
                                        <p class="inknotice_hint">Enable Under Construction  page from here.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_bgimg"> Background Image</label></th>
                                    <td><?php
                                        settings_fields('theme_ink_options');
                                        do_settings_sections('ink');
                                        // $ink_options = get_option( 'theme_ink_options' );
                                        ?>
                                        <input type="text" value="<?php echo esc_attr($value['background_image_url']); ?>" id="upload_background" name="upload_image" size="36" />
                                        <input type="button"  value="Upload Background Image" class="button-primary" id="upload_bg_button"/>
                                        <div id="upload_bg_preview">

                                        </div>

                                        <p class="inknotice_hint">Upload a image that will be used as a background image.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_lgimg"> Logo Image</label></th>
                                    <td>
                                        <input type="text" value="<?php echo esc_attr($value['logo_image_url']); ?>" id="upload_logo" name="upload_image" size="36" />
                                        <input type="button"  value="Upload Logo Image" class="button-primary" id="upload_logo_button"/>
                                        <div id="upload_logo_preview">
                                        </div>
                                        <p class="inknotice_hint">Upload a image that will be used as a logo image.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_title">Title </label></th>
                                    <td>
                                        <input type="text" value="<?php
                                        if ($value['title_of_page'] == "") {
                                            echo "Coming Soon ";
                                        } else {
                                            echo $value['title_of_page'];
                                        }
                                        ?>" id="title" name="title" class="" />
                                        <p class="inknotice_hint">The text to be displayed as the page title.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_description">Description </label></th>
                                    <td>
                                        <textarea name="descrip" id="descrip" rows="5" cols="60"><?php
                                            if ($value['descrption_of_page'] == "") {
                                                echo "Enter your email address below to be the first to know when we launch it.";
                                            } else {
                                                echo $value['descrption_of_page'];
                                            }
                                            ?> </textarea>
                                        <p class="inknotice_hint">This will be displayed below the Page Title.</p>
                                    </td>
                                </tr>
                                  <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_analytics">Tracking Code</label></th>
                                    <td>
                                        <textarea name="tracking" id="tracking" rows="5" cols="60"><?php
                                            if ($value['tracking_code'] == "") {
                                                
                                            } else {
                                                echo stripslashes($value['tracking_code']);
                                            }
                                            ?> </textarea>
                                        <p class="inknotice_hint">Paste your Google Analytics (or other) tracking code here.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_social_link">Social Media Links </label></th>
                                    <td>
                                        <div id="facebook"> <img src="<?php echo plugins_url('image/facebook.png', __FILE__) ?>" align="left" />
                                            <input type="text" name="fb" id="fb" value="<?php echo $value['facebook_link']; ?>" placeholder="Enter facbook url" style="width:250px; margin-left:10px" /> </div><br />
                                        <div id="twitter"> <img src="<?php echo plugins_url('image/twitter.png', __FILE__) ?>" align="left" />
                                            <input type="text" name="twit" id="twitter" value="<?php echo $value['twitter_link']; ?>" placeholder="Enter twitter url" style="width:250px; margin-left:10px" /> </div><br />
                                        <div id="googlepluse">  <img src="<?php echo plugins_url('image/googleplus.png', __FILE__) ?>" align="left" />
                                            <input type="text" name="googleplus" id="googleplus" value="<?php echo $value['googleplus_link']; ?>" placeholder="Enter googleplus url" style="width:250px; margin-left:10px" /> </div><br />
                                        <p class="inknotice_hint"> Insert social links here. If it left blank, we won't show a social icon.</p>
                                    </td>
                                </tr>


                            </tbody></table>



                    </div>

                </div>	

                <div class="ink_group" id="pn_displaysetting">
                    <h2>Appearence Settings</h2>
                    <div class="ink_section section-text">
                        <div class="option">
                            <table class="form-table"><tbody>

                                    <tr>
                                        <th scope="row"><label for="Ink_UnderConstruction_bgcolor">Background Color </label></th>
                                        <td>
                                            <input type="text" value="<?php echo $value['page_background_color']; ?>" class="color {hash:true,caps:false,required:false}" id="background_color" />
                                            <p class="inknotice_hint">Select background color.</p>
                                        </td>
                                    </tr>   

                                    <tr>
                                        <th scope="row"><label for="Ink_UnderConstruction_title_text"> "Title" font & color </label></th>
                                        <td>

                                            <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                                                <select name="post_title_px" id="pxselect_post_title" class="select">
                                                    <?php
                                                    for ($i = 10; $i <= 100; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>" <?php
                                                        $value = get_option('ink_underconstruction_setting_value');
                                                        if ($value['title_font_size'] == $i)
                                                            echo selected($value['title_font_size'], $i);
                                                        ?> name=""><?php echo $i; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div><br/>

                                            <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                                                <select id="inknotice_font_style_prompt" name="font_style_prompt" class="inknotice_regular_text">
                                                    <option value="inherit" data-text="&lt;span style=&quot;font-family: inherit&quot;&gt;Default body font&lt;/span&gt;" "="">Default body font</option>
                                                    <option selected="selected" value="Arial, Helvetica, sans-serif" data-text="&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif&quot;&gt;Arial, Arial, Helvetica&lt;/span&gt;" "="">Arial, Arial, Helvetica</option>
                                                    <option value="Arial Black, Gadget, sans-serif" data-text="&lt;span style=&quot;font-family: Arial Black, Gadget, sans-serif&quot;&gt;Arial Black, Arial Black, Gadget&lt;/span&gt;" "="">Arial Black, Arial Black, Gadget</option>
                                                    <option value="Comic Sans MS, cursive" data-text="&lt;span style=&quot;font-family: Comic Sans MS, cursive&quot;&gt;Comic Sans MS&lt;/span&gt;" "="">Comic Sans MS</option>
                                                    <option value="Courier New, monospace" data-text="&lt;span style=&quot;font-family: Courier New, monospace&quot;&gt;Courier New&lt;/span&gt;" "="">Courier New</option>
                                                    <option value="Georgia, serif" data-text="&lt;span style=&quot;font-family: Georgia, serif&quot;&gt;Georgia&lt;/span&gt;" "="">Georgia</option>
                                                    <option value="Impact, Charcoal, sans-serif" data-text="&lt;span style=&quot;font-family: Impact, Charcoal, sans-serif&quot;&gt;Impact, Charcoal&lt;/span&gt;" "="">Impact, Charcoal</option>
                                                    <option value="Lucida Console, Monaco, monospace" data-text="&lt;span style=&quot;font-family: Lucida Console, Monaco, monospace&quot;&gt;Lucida Console, Monaco&lt;/span&gt;" "="">Lucida Console, Monaco</option>
                                                    <option value="Lucida Sans Unicode, Lucida Grande, sans-serif" data-text="&lt;span style=&quot;font-family: Lucida Sans Unicode, Lucida Grande, sans-serif&quot;&gt;Lucida Sans Unicode, Lucida Grande&lt;/span&gt;" "="">Lucida Sans Unicode, Lucida Grande</option>
                                                    <option value="Palatino Linotype, Book Antiqua, Palatino, serif" data-text="&lt;span style=&quot;font-family: Palatino Linotype, Book Antiqua, Palatino, serif&quot;&gt;Palatino Linotype, Book Antiqua, Palatino&lt;/span&gt;" "="">Palatino Linotype, Book Antiqua, Palatino</option>
                                                    <option value="Tahoma, Geneva, sans-serif" data-text="&lt;span style=&quot;font-family: Tahoma, Geneva, sans-serif&quot;&gt;Tahoma, Geneva&lt;/span&gt;" "="">Tahoma, Geneva</option>
                                                    <option value="Times New Roman, Times, serif" data-text="&lt;span style=&quot;font-family: Times New Roman, Times, serif&quot;&gt;Times New Roman, Times&lt;/span&gt;" "="">Times New Roman, Times</option>
                                                    <option value="Trebuchet MS, sans-serif" data-text="&lt;span style=&quot;font-family: Trebuchet MS, sans-serif&quot;&gt;Trebuchet MS&lt;/span&gt;" "="">Trebuchet MS</option>
                                                    <option value="Verdana, Geneva, sans-serif" data-text="&lt;span style=&quot;font-family: Verdana, Geneva, sans-serif&quot;&gt;Verdana, Geneva&lt;/span&gt;" "="">Verdana, Geneva</option>
                                                    <option value="Open Sans, sans-serif" data-text="&lt;span style=&quot;font-family: Open Sans, sans-serif&quot;&gt;Open Sans&lt;/span&gt;" "="">Open Sans</option>
                                                    <option value="Oswald, sans-serif" data-text="&lt;span style=&quot;font-family: Oswald, sans-serif&quot;&gt;Oswald&lt;/span&gt;" "="">Oswald</option>
                                                    <option value="Droid Sans, sans-serif" data-text="&lt;span style=&quot;font-family: Droid Sans, sans-serif&quot;&gt;Droid Sans&lt;/span&gt;" "="">Droid Sans</option>
                                                    <option value="Open Sans Condensed, sans-serif" data-text="&lt;span style=&quot;font-family: Open Sans Condensed, sans-serif&quot;&gt;Open Sans Condensed&lt;/span&gt;" "="">Open Sans Condensed</option>
                                                    <option value="Lato, sans-serif" data-text="&lt;span style=&quot;font-family: Lato, sans-serif&quot;&gt;Lato&lt;/span&gt;" "="">Lato</option>
                                                    <option value="PT Sans, sans-serif" data-text="&lt;span style=&quot;font-family: PT Sans, sans-serif&quot;&gt;PT Sans&lt;/span&gt;" "="">PT Sans</option>
                                                    <option value="Droid Serif, serif" data-text="&lt;span style=&quot;font-family: Droid Serif, serif&quot;&gt;Droid Serif&lt;/span&gt;" "="">Droid Serif</option>
                                                    <option value="Yanone Kaffeesatz, sans-serif" data-text="&lt;span style=&quot;font-family: Yanone Kaffeesatz, sans-serif&quot;&gt;Yanone Kaffeesatz&lt;/span&gt;" "="">Yanone Kaffeesatz</option>
                                                    <option value="Roboto, sans-serif" data-text="&lt;span style=&quot;font-family: Roboto, sans-serif&quot;&gt;Roboto&lt;/span&gt;" "="">Roboto</option>
                                                    <option value="Bitter, serif" data-text="&lt;span style=&quot;font-family: Bitter, serif&quot;&gt;Bitter&lt;/span&gt;" "="">Bitter</option>
                                                </select>                                      
                                            </div> <br/>


                                            <div class="form-item">
                                                <input type="text"  class="color {hash:true,caps:false,required:false}" id="title_color" name="color_post_title" value="<?php
                                                $value = get_option('ink_underconstruction_setting_value');

                                                if ($value['title_font_color'] == '') {
                                                    echo '#ffffff';
                                                } else {
                                                    echo $value['title_font_color'];
                                                }
                                                ?>"/>
                                            </div>     

                                            <p class="inknotice_hint">Customize the font , size and color of the title.</p>
                                        </td>
                                    </tr> 

                                    <tr>
                                        <th scope="row"><label for="Ink_UnderConstruction_title_text"> "Description" font & color </label></th>
                                        <td>

                                            <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                                                <select name="post_title_px" id="pxselect_post_description" class="select">
                                                    <?php
                                                    for ($i = 10; $i <= 100; $i++) {
                                                        ?>
                                                        <option value="<?php echo $i; ?>" <?php
                                                        $value = get_option('ink_underconstruction_setting_value');
                                                        if ($value['description_font_size'] == $i)
                                                            echo selected($value['description_font_size'], $i);
                                                        ?> name=""><?php echo $i; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div><br/>

                                            <div class="select_wrapper background-attachment" style="margin: 0px 0px 0px 0px; width: 180px;">
                                                <select id="inknotice_font_style_prompt_description" name="font_style_prompt" class="inknotice_regular_text">
                                                    <option value="inherit" data-text="&lt;span style=&quot;font-family: inherit&quot;&gt;Default body font&lt;/span&gt;" "="">Default body font</option>
                                                    <option selected="selected" value="Arial, Helvetica, sans-serif" data-text="&lt;span style=&quot;font-family: Arial, Helvetica, sans-serif&quot;&gt;Arial, Arial, Helvetica&lt;/span&gt;" "="">Arial, Arial, Helvetica</option>
                                                    <option value="Arial Black, Gadget, sans-serif" data-text="&lt;span style=&quot;font-family: Arial Black, Gadget, sans-serif&quot;&gt;Arial Black, Arial Black, Gadget&lt;/span&gt;" "="">Arial Black, Arial Black, Gadget</option>
                                                    <option value="Comic Sans MS, cursive" data-text="&lt;span style=&quot;font-family: Comic Sans MS, cursive&quot;&gt;Comic Sans MS&lt;/span&gt;" "="">Comic Sans MS</option>
                                                    <option value="Courier New, monospace" data-text="&lt;span style=&quot;font-family: Courier New, monospace&quot;&gt;Courier New&lt;/span&gt;" "="">Courier New</option>
                                                    <option value="Georgia, serif" data-text="&lt;span style=&quot;font-family: Georgia, serif&quot;&gt;Georgia&lt;/span&gt;" "="">Georgia</option>
                                                    <option value="Impact, Charcoal, sans-serif" data-text="&lt;span style=&quot;font-family: Impact, Charcoal, sans-serif&quot;&gt;Impact, Charcoal&lt;/span&gt;" "="">Impact, Charcoal</option>
                                                    <option value="Lucida Console, Monaco, monospace" data-text="&lt;span style=&quot;font-family: Lucida Console, Monaco, monospace&quot;&gt;Lucida Console, Monaco&lt;/span&gt;" "="">Lucida Console, Monaco</option>
                                                    <option value="Lucida Sans Unicode, Lucida Grande, sans-serif" data-text="&lt;span style=&quot;font-family: Lucida Sans Unicode, Lucida Grande, sans-serif&quot;&gt;Lucida Sans Unicode, Lucida Grande&lt;/span&gt;" "="">Lucida Sans Unicode, Lucida Grande</option>
                                                    <option value="Palatino Linotype, Book Antiqua, Palatino, serif" data-text="&lt;span style=&quot;font-family: Palatino Linotype, Book Antiqua, Palatino, serif&quot;&gt;Palatino Linotype, Book Antiqua, Palatino&lt;/span&gt;" "="">Palatino Linotype, Book Antiqua, Palatino</option>
                                                    <option value="Tahoma, Geneva, sans-serif" data-text="&lt;span style=&quot;font-family: Tahoma, Geneva, sans-serif&quot;&gt;Tahoma, Geneva&lt;/span&gt;" "="">Tahoma, Geneva</option>
                                                    <option value="Times New Roman, Times, serif" data-text="&lt;span style=&quot;font-family: Times New Roman, Times, serif&quot;&gt;Times New Roman, Times&lt;/span&gt;" "="">Times New Roman, Times</option>
                                                    <option value="Trebuchet MS, sans-serif" data-text="&lt;span style=&quot;font-family: Trebuchet MS, sans-serif&quot;&gt;Trebuchet MS&lt;/span&gt;" "="">Trebuchet MS</option>
                                                    <option value="Verdana, Geneva, sans-serif" data-text="&lt;span style=&quot;font-family: Verdana, Geneva, sans-serif&quot;&gt;Verdana, Geneva&lt;/span&gt;" "="">Verdana, Geneva</option>
                                                    <option value="Open Sans, sans-serif" data-text="&lt;span style=&quot;font-family: Open Sans, sans-serif&quot;&gt;Open Sans&lt;/span&gt;" "="">Open Sans</option>
                                                    <option value="Oswald, sans-serif" data-text="&lt;span style=&quot;font-family: Oswald, sans-serif&quot;&gt;Oswald&lt;/span&gt;" "="">Oswald</option>
                                                    <option value="Droid Sans, sans-serif" data-text="&lt;span style=&quot;font-family: Droid Sans, sans-serif&quot;&gt;Droid Sans&lt;/span&gt;" "="">Droid Sans</option>
                                                    <option value="Open Sans Condensed, sans-serif" data-text="&lt;span style=&quot;font-family: Open Sans Condensed, sans-serif&quot;&gt;Open Sans Condensed&lt;/span&gt;" "="">Open Sans Condensed</option>
                                                    <option value="Lato, sans-serif" data-text="&lt;span style=&quot;font-family: Lato, sans-serif&quot;&gt;Lato&lt;/span&gt;" "="">Lato</option>
                                                    <option value="PT Sans, sans-serif" data-text="&lt;span style=&quot;font-family: PT Sans, sans-serif&quot;&gt;PT Sans&lt;/span&gt;" "="">PT Sans</option>
                                                    <option value="Droid Serif, serif" data-text="&lt;span style=&quot;font-family: Droid Serif, serif&quot;&gt;Droid Serif&lt;/span&gt;" "="">Droid Serif</option>
                                                    <option value="Yanone Kaffeesatz, sans-serif" data-text="&lt;span style=&quot;font-family: Yanone Kaffeesatz, sans-serif&quot;&gt;Yanone Kaffeesatz&lt;/span&gt;" "="">Yanone Kaffeesatz</option>
                                                    <option value="Roboto, sans-serif" data-text="&lt;span style=&quot;font-family: Roboto, sans-serif&quot;&gt;Roboto&lt;/span&gt;" "="">Roboto</option>
                                                    <option value="Bitter, serif" data-text="&lt;span style=&quot;font-family: Bitter, serif&quot;&gt;Bitter&lt;/span&gt;" "="">Bitter</option>
                                                </select>                                      
                                            </div> <br/>


                                            <div class="form-item">
                                                <input type="text"  class="color {hash:true,caps:false,required:false}" id="description_color" name="color_post_title" value="<?php
                                                $value = get_option('ink_underconstruction_setting_value');
                                                if ($value['description_font_color'] == '') {
                                                    echo '#ffffff';
                                                } else {
                                                    echo $value['description_font_color'];
                                                }
                                                ?>"/>
                                            </div>     

                                            <p class="inknotice_hint">Customize the font , size and color of the description.</p>
                                        </td>
                                    </tr> 

                                </tbody></table>
                        </div>
                    </div>

                </div>


                <div class="ink_group" id="pn_template">
                    <h2>Notification Settings</h2>

                    <div class="ink_section section-text">

                        <table class="form-table"><tbody>
                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_bgimg"> Owner Email Address</label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['owner_email_address'] ?>" id="email" name="email" placeholder="example@gmail.com" class="" style="width:300px;" />
                                        <p class="inknotice_hint">Information of new subscriber will be sent to this email address. If left blank mail field will not be shown.</p>
                                    </td>
                                </tr>  

                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_bgimg"> Display Message after user subscribe. </label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['mesage_after_subscription'] ?>" id="message" name="message" placeholder="Thanks you for subscribing" class="" style="width:300px;" />
                                        <p class="inknotice_hint">Enter message to display after a user enters his email address.</p>
                                    </td>
                                </tr>  

                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_bgimg"> Subscribe Button </label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['subscribe_btn_text'] ?>" id="sb_btn" name="sb_btn" placeholder="Notify Me!" class="" style="width:300px;" />
                                        <p class="inknotice_hint">Customize the button text.</p>
                                    </td>
                                </tr> 

                                <tr>
                                    <th scope="row"><label for="Ink_UnderConstruction_bgimg"> Email Textbox Placeholder</label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['email_textbox_placeholder'] ?>" id="placeholder_text" name="placeholder_text" placeholder="Enter your email to be notify of our launch. " class=""  style="width:300px;"/>
                                        <p class="inknotice_hint">Customize the placeholder text of your subscription field</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_targeted_year">  Year</label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['targeted_year'] ?>" id="targeted_year_input" name="year"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Enter the count down targeted YEAR (eg. 2014, 2015..). If it left blank, we won't show a count down.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_targeted_month"> Month </label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['targeted_month'] ?>" id="targeted_month_input" name="month"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Enter the count down targeted MONTH (eg 6, 7). If it left blank, we won't show a count down.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_tageted_day"> Day</label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['targeted_day'] ?>" id="targeted_day_input" name="input"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Enter the count down targeted DATE (eg. 23, 14 ..). If it left blank, we won't show a count down.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_targeted_hour"> Hour</label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['targeted_hour'] ?>" id="targeted_hour_input" name="hour"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Enter the count down target date HOUR (24 hour clock)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_targeted_minute"> Minute </label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['targeted_minute'] ?>" id="targeted_minute_input" name="minute"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Enter the count down target MINUTE (eg. 45, 30 ..)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="Ink_time_zone"> Time Zone </label></th>
                                    <td>
                                        <input type="text" value="<?php echo $value['time_zone'] ?>" id="time_zone_input" name="time_zone"  class=""  style="width:100px;"/>
                                        <p class="inknotice_hint">Offset for your timezone in hours from UTC (eg 5, -5). <a href="http://wwp.greenwichmeantime.com/index.htm" target="_blank">Click here </a> to find the timezone offset for your location.</p>
                                    </td>
                                </tr>

                            </tbody></table>
                    </div>

                </div>
                <div class="ink_group" id="pn_subscriber">
                    <h2>Subscriber List</h2>

                    <div class="ink_section section-text">

                        <table id="show_subscriber_list" class="list_of_subscriber">
                            <thead>
                                <tr>
                                    <th scope="col" class="srno"> Sr. No. </th>
                                    <th scope="col" class="subscriber_email"> Subscriber Email </th>
                                </tr>

                            </thead>  
                            <tbody>
                                <?php
                                global $wpdb;
                                $ink_table_name = $wpdb->prefix . "ink_coming_soon";
                                $query = $wpdb->get_results("SELECT * FROM " . $ink_table_name);
                                foreach ($query as $row) {
                                    ?>
                                    <tr>
                                        <th scope="col"><?php echo $row->id; ?> </th>
                                        <th scope="col"><?php echo $row->subscriber_email; ?> </th>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>

                        </table>
                        <h3> Download List in File </h3> 

                        <form action="" method="post">
                            <input type="radio" name="filetype" value="csv" checked="check">CSV<br>
                            <input type="radio" name="filetype" value="word">Word<br>
                            <input type="radio" name="filetype" value="pdf">PDF<br> <br>
                            <input type="submit" class="button-primary"  name='download' value="Download">
                        </form> 
                          </div>

                </div>
                <div class="save_image"><img src="<?php echo plugins_url('image/images.gif', __FILE__) ?>"  /> </div>
            </div>
            <div class="clear"></div>

        </div>

        <div class="ink_save_bar_top">
            <input name="reset" type="submit" value="Reset Options" style="float:left; margin-right:10px;" class="button submit-button reset-button" onclick="return confirm('Click OK to reset. All settings will be lost!');">
            <div class="button-primary" id="button_save" style="float:left;"> Save All Changes </div>
        </div>

    </div>

    <?php
}
?>
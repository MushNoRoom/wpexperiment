<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 *
 * @since 1.0.0
 */
?>

<?php
include 'populate_select_form.php'
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if IE]><script src="<?php echo BAVOTASAN_THEME_URL; ?>/library/js/html5.js"></script><![endif]-->
	<?php wp_head(); ?>
</head>
<?php
$bavotasan_theme_options = bavotasan_theme_options();
$space_class = '';
?>
<body <?php body_class(); ?>>

	<div id="page">
		<header id="header">
			<nav id="site-navigation" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<h3 class="sr-only"><?php _e( 'Main menu', 'arcade' ); ?></h3>
				<a class="sr-only" href="#primary" title="<?php esc_attr_e( 'Skip to content', 'arcade' ); ?>"><?php _e( 'Skip to content', 'arcade' ); ?></a>

				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				    </button>
				</div>

				<div class="collapse navbar-collapse">
					<?php
					$menu_class = ( is_rtl() ) ? ' navbar-right' : '';
					wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav navbar-nav' . $menu_class, 'fallback_cb' => 'bavotasan_default_menu' ) );
					?>
				</div>
			</nav><!-- #site-navigation -->

			 <div class="title-card-wrapper">
                <div class="title-card">
    				<div id="site-meta">
    					<h1 id="site-title">
    						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    					</h1>

    					<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
    					<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
    					<?php } else {
    						$space_class = ' class="margin-top"';
    					} ?>

    					<h2 id="site-description"<?php echo $space_class; ?>>
    						<?php bloginfo( 'description' ); ?>
    					</h2>

                        <h4 class="frontPageSpaceHolder">This is a place holder</h4>
                        <style> 
                            h4.frontPageSpaceHolder {
                                visibility: hidden;
                            }
                        </style>

                        <?php
                            $yxgDatabase = new wpdb('root', '35941876', 'yixiuge1', 'localhost');
                            $yxgDatabase->show_errors();
                        ?>
                        <form name="issueSelectForm" action="index.php" method="post">
                            <select id="brand_selection" name="select_brand">
                            <?php
                                populateBrandList($yxgDatabase);
                            ?>
                            <script type="text/javascript">
                            var selectedBrand = document.getElementById('brand_selection');
                            // var form = document.getElementById("issue-select_form");
                            selectedBrand.onchange = function() {
                                var currentSelectedBrand = selectedBrand.options[selectedBrand.selectedIndex].value;
                                // selectedModel.scriptform.action = "slider.php?select_brand="+currentSelectedBrand;
                                if (currentSelectedBrand > -1) {
                                    document.issueSelectForm.submit();
                                }
                            }
                            </script>
                            </select>
                            <select id="model_selection" name="select_model">
                            <?php 
                                updateModelList($yxgDatabase);
                                $products = array("Spiderman","Batman","Superman");
                            ?>
                            </select>
                            <select id="issue_cat_selection" name="select_issue_category">
                            <?php 
                                $categoryArray = populateIssueCategory($yxgDatabase);
                            ?>
                            </select>
                            <select id="issue_detail_selection" name="select_issue_detail">
                            <option value="-1">请选择故障详情</option>
                            <option value="1">玻璃碎裂</option>
                            <option value="5">触控失灵</option>
<!--                             <?php $issueArray = populateIssueDetails($yxgDatabase) ?> -->
                            </select>
                            <br> <br>
                            <input type="submit" Value="查看报价">
                        </form>
                        </div>
    				<?php
    				// Header image section
    				bavotasan_header_images();
    				?>
				</div>
                <div class="issue_select_wrapper">

                </div>
			</div>

		</header>

		<main>
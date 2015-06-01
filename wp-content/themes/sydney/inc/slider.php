<?php
/**
 * Slider template
 *
 * @package Sydney
 */

//Slider template
if ( ! function_exists( 'sydney_slider_template' ) ) :
function sydney_slider_template() {

    if ( (get_theme_mod('front_header_type','slider') == 'slider' && is_front_page()) || (get_theme_mod('site_header_type') == 'slider' && !is_front_page()) ) {
    ?>

    <div id="slideshow" class="header-slider">
        <div class="slides-container">
            <?php 
                if ( get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.png') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.jpg')) . ');"></div>';
                
                }
                if ( get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg')) . ');"></div>';
                }           
                if ( get_theme_mod('slider_image_3') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_3')) . ');"></div>';
                }
                if ( get_theme_mod('slider_image_4') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_4')) . ');"></div>';
                }
                if ( get_theme_mod('slider_image_5') ) {
                    echo '<div class="slide-item" style="background-image:url(' . esc_url(get_theme_mod('slider_image_5')) . ');"></div>';
                }               
            ?>  
        </div>

        <div class="text-slider-section">
            <div class="text-slider">
                <ul class="slide-text slides">
                    <?php if ( get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.png') ) : ?>
                    <li>
                        <div class="contain">
                            <h2 class="maintitle"><?php echo esc_html(get_theme_mod('slider_title_1', 'Welcome to Sydney')); ?></h2>
                            <p class="subtitle"><?php echo esc_html(get_theme_mod('slider_subtitle_1','Feel free to look around')); ?></p>
                        </div>
                    </li>
                    <?php endif; ?>
<!--                     <?php if ( get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg') ) : ?>
                    <li>
                        <div class="contain">
                            <h2 class="maintitle"><?php echo esc_html(get_theme_mod('slider_title_2', 'Ready to begin your journey?')); ?></h2>
                            <p class="subtitle"><?php echo esc_html(get_theme_mod('slider_subtitle_2', 'Click the button below')); ?></p>
                        </div>
                    </li> -->
                    <?php endif; ?>                                       
                </ul>
            </div>
<!--             <?php $slider_button = get_theme_mod('slider_button_text', 'Click to begin'); ?>
            <?php if ($slider_button) : ?>
                <a href="<?php echo esc_url(get_theme_mod('slider_button_url','#primary')); ?>" class="roll-button button-slider"><?php echo esc_html($slider_button); ?></a>
            <?php endif; ?> -->
            <div class="custom-widget-content clearfix">
                <form class="form-inline" action="action_page.php">
                    <select name="请选择品牌">
                        <option value="sony" selected>请选择手机品牌</option>
                        <option value="sony">索尼</option>
                        <option value="samsung">三星</option>
                        <option value="apple">苹果</option>
                        <option value="htc">HTC</option>
                    </select>
                    <select name="请选择故障">
                        <option value="sony" selected>请选择故障类别</option>
                        <option value="screen">屏幕</option>
                        <option value="battery">电池</option>
                        <option value="headphone_jack">耳机</option>
                        <option value="camera">相机</option>  
                    </select>
                    <input type="submit" Value="查看价格">
                </form>

<!--                 <div id="dummy" style="float:left;width:20%">
                    <h2></h2>
                </div>
                <div id="main_widget_area" class="front-paget-widget-area" style="float:left">
                    <?php dynamic_sidebar('mywidgetarea-1'); ?>
                </div>
                <div id="issue_select_area" class="front-page-issue-select-area" style="float:left">
                    <?php dynamic_sidebar('mywidgetarea-2'); ?>
                </div> -->
            </div>
        </div>


        
    </div>
    <?php
    }
}
endif;
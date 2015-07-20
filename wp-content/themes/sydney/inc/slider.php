<?php

function updateModelList ($dbConnection) {
    if(isset($_POST["select_brand"])){
        $selectedBrandsId = $_POST["select_brand"];
        if ($selectedBrandsId > -1) {
            $modelList = $dbConnection->get_results("select * from yxgphonemodels where BrandID=".$selectedBrandsId);
            if (isset($_POST["select_model"])) {
                $selectedModelId = $_POST["select_model"];
                $dummySelectMarker = "";
                if ($selectedModelId < 0)
                {
                    $dummySelectMarker = "selected";
                }
                else {
                    $dummySelectMarker = "";
                }
                echo '<option value="-1"'.$dummySelectMarker.'>请选择手机型号</option>\n';
                foreach ($modelList as $key => $model) {
                    $modelDisplayName = $model->ModelDisplayName;
                    $modelId = $model->ID;
                    if ($modelId == $selectedModelId) 
                    {
                        echo '<option value="'.$modelId.'" selected>'.$modelDisplayName."</option>\n";
                    }
                    else
                    {
                        echo '<option value="'.$modelId.'">'.$modelDisplayName."</option>\n";
                    }
                }
            }
        }
    }
    else 
    {
        echo '<option value="-1" selected>请选择手机型号</option>';   
    }
}

function populateDefaultBrandList ($brandList) {
    echo '<option value="-1" selected>请选择手机品牌</option>';
    foreach ($brandList as $key => $brand) {
        $brandName = $brand->BrandName;
        $brandId = $brand->ID;
        echo '<option value="'.$brandId.'">'.$brandName."</option>\n";
    }
}

function populateBrandList ($dbConnection) {
    $brandList = $dbConnection->get_results("select * from yxgphonebrands");
    if(isset($_POST["select_brand"])) { // when the selection is NULL
        $selectedBrandsId = $_POST["select_brand"];
        if ($selectedBrandsId > -1) {
            foreach ($brandList as $key => $brand) {
                $brandName = $brand->BrandName;
                $brandId = $brand->ID;
                if ($brandId == $selectedBrandsId) {
                    echo '<option value="'.$brandId.'" selected>'.$brandName."</option>\n";
                }
                else {
                    echo '<option value="'.$brandId.'">'.$brandName."</option>\n";    
                }
            }
        }
    } 
    else {
        populateDefaultBrandList($brandList);
    }
}

function populateIssueCategory ($dbConnection) {

    $categories = $dbConnection->get_results("select * from yxgissuecategory");
    $categoryArray = array();
    echo '<option value="-1" selected>选择故障类别</option>';
    foreach ($categories as $key => $category) {
        $categoryArray[] = array($category->ID, $category->CategoryName);
        echo '<option value="'.$category->ID.'">'.$category->CategoryName."</option>\n";
    }


    return $categoryArray;
}

function populateIssueDetails ($dbConnection) {
    $issueArray = array();
    $desc = "";
    if(isset($_POST["select_brand"])){
        $selectedBrandsId = $_POST["select_brand"];
        // $desc = $selectedBrandsId;
        if ($selectedBrand >= 0) {
            $issueDetails = $dbConnection->get_results("select * from yxgissuedetails where BrandID = ".$selectedBrandsId." ORDER BY ModelID");
            foreach ($issueDetails as $key => $issue) {
                $desc = $issue->IssueDescription;
                array_push($issueArray, array($issue->ID, $issue->ModelID, $issue->CategoryID, $issue->IssueDescription));
            }
        }
    }
    return $issueArray;
}

?>


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
<!-- 		    <?php 
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
			?>	 -->
	    </div>

        <div class="text-slider-section">
            <div class="text-slider">
                <ul class="slide-text slides">        
                    <li>
                        <div class="contain">
                            <h2 class="maintitle"><?php echo esc_html(get_theme_mod('slider_title_1', 'Welcome to Sydney')); ?></h2>
                            <p class="subtitle"><?php echo esc_html(get_theme_mod('slider_subtitle_1','Feel free to look around')); ?></p>
                        </div>
                    </li>                                
                </ul>
            </div>
            <?php $slider_button = get_theme_mod('slider_button_text', 'Click to begin'); ?>
            <?php if ($slider_button) : ?>
                <a href="<?php echo esc_url(get_theme_mod('slider_button_url','#primary')); ?>" class="roll-button button-slider"><?php echo esc_html($slider_button); ?></a>
            <?php endif; ?>
        </div>


	    
	</div>
	<?php
	}
}
endif;
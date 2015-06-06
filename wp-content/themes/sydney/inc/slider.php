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

?>

<script type="text/javascript">
    function removeSelectionIndicator(selectObj) {
        var currentSelectedOption = selectObj.options[selectObj.selectedIndex].value;
        if (currentSelectedOption >= 0 && (selectObj.options[0].value < 0)) 
        {
           selectObj.remove(0);
        }
    }
</script>
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
                     <?php
                        $yxgDatabase = new wpdb('root', '35941876', 'yixiuge1', 'localhost');
                        $yxgDatabase->show_errors();
                        // $brandList = $yxgDatabase->get_results('SELECT * FROM yxgphonebrands');
                     ?>
                <form name="issueSelectForm" class="form-inline" action="index.php" method="post">
                    <select id="brand_selection" name="select_brand">
                        <!-- <option value="-1" selected>请选择手机品牌</option> -->
                        <?php 
                            populateBrandList($yxgDatabase);
                            // foreach ($brandList as $key => $brand) {
                            //     $brandName = $brand->BrandName;
                            //     $brandId = $brand->ID;
                            //     echo '<option value="'.$brandId.'">'.$brandName."</option>\n";
                            // }
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
                        <script type="text/javascript">
                            var selectedModel = document.getElementById('model_selection');
                            var testVar = <?php echo json_encode($products); ?>;
                            // var data = JSON.parse(testVar);
                            selectedModel.onchange = function() 
                            {
                                removeSelectionIndicator(selectedModel);
                                // var currentSelecteModelValue = selectedModel.options[selectedModel.selectedIndex].value;
                                // if (currentSelecteModelValue != -1 && (selectedModel.options[0].value == -1)) 
                                // {
                                //    selectedModel.remove(0);
                                // }
                                // document.getElementById("exp").innerHTML = "hi"; 
                            }
                        </script>
                    </select>
                    <select id="issue_cat_selection" name="select_issue_category">
                        <?php 
                            $categoryArray = populateIssueCategory($yxgDatabase);
                        ?>
<!--                         <option value="screen">屏幕碎裂</option>
                        <option value="battery">电池</option>
                        <option value="headphone_jack">耳机</option>
                        <option value="camera">相机</option>  
                        <option value="bodyDamage">机身变形</option> -->
                    </select>
                    <script type="text/javascript">
                        var selectCategory = document.getElementById('issue_cat_selection');
                        var categories = <?php echo json_encode($categoryArray) ?>;
                        selectCategory.onchange = function() {
                            removeSelectionIndicator(selectCategory);
                        }
                    </script>
                    <select name="故障详情">
                        <option value="issueDetails" selected>请选择故障详情</option>
                    </select>
                    <input type="submit" Value="查看价格">
                </form>
                <p id="exp"></p>

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
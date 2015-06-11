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
    // return $issueArray;   
    // return "select * from yxgissuedetails where BrandID= ".$selectedBrandsId." ORDER BY ModelID";
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
<!--         <div class="slides-container">
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
        </div> -->

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
                    </select>
                    <script type="text/javascript">
                        var selectCategory = document.getElementById('issue_cat_selection');
                        var selectIssue = document.getElementById('issue_detail_selection');
                        var categories = <?php echo json_encode($categoryArray) ?>;
                        selectCategory.onchange = function() {
                            removeSelectionIndicator(selectCategory);
                        }
                    </script>
                    <select name="select_issue_detail" id="issue_detail_selection">
                        <option value="-1">请选择故障详情</option>
                        <?php $issueArray = populateIssueDetails($yxgDatabase) ?>
                        <script type="text/javascript">
                            var selectDetail = document.getElementById('issue_detail_selection');
                            var selectCat = document.getElementById('issue_cat_selection');
                            var selectedModel = document.getElementById('model_selection'); 
                            var issues = JSON.parse('<?php echo json_encode($issueArray) ?>');
                            selectCategory.onchange = function() {
                                if (selectCat.options[selectCat.selectedIndex].value > 0)
                                {
                                    // removeSelectionIndicator(selectCategory);
                                    // var hello = 0;
                                    selectDetail.length = 0;
                                    var option = document.createElement("option");
                                    option.text = "请选择故障详情";
                                    // var issueCount = issues.length;
                                    // option.text = "hi"+issueCount;
                                    selectDetail.add(option, -1);
                                    var i;
                                    var text = "";
                                    for (i = 0; i < issues.length; i++) {
                                        // text += selectedModel.options[selectedModel.selectedIndex].value + "<br>";
                                        // text += issues[i][1] + issues[i][3] + "<br>";
                                        if (issues[i][2] == selectCat.options[selectCat.selectedIndex].value && issues[i][1] == selectedModel.options[selectedModel.selectedIndex].value)
                                        {
                                            
                                            option = document.createElement("option");
                                            option.text = issues[i][3];
                                            selectDetail.add(option, issues[i][0]);   
                                        }
                                    }
                                }
                                // for (i = 0; i < issues.length, ++i) {
                                //         var option = document.createElement("option");
                                //         option.text = "nima";
                                //         selectDetail.add(option, i); 
                                //     // if (issues[i][2] == selectCat.options[selectCat.selectedIndex].value && 
                                //     //     issues[i][1] == selectedModel.options[selectedModel.selectedIndex].value)
                                //     // {
                                //     //     option = document.createElement("option");
                                //     //     option.text = issues[i][3];
                                //     //     selectDetail.add(option, issues[i][0]);   
                                //     // }
                                // }
                                // document.getElementById("exp").innerHTML = text; 
                            }
                        </script>
                    </select>
                    <input type="submit" Value="查看报价">
                </form>
                <p id="exp"></p>
            </div>
        </div>


        
    </div>
    <?php
    }
}
endif;
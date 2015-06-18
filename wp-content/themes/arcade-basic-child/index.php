<?php
echo "Selected all";
if(isset($_POST["select_brand"]) {
   echo "Selected all";
   $selectedBrand = $_POST["select_brand"]; 
}
if(isset($_POST["select_brand"]) && isset($_POST["select_model"]) && isset($_POST["select_issue_category"]) && isset($_POST["select_issue_detail"]))
{
    echo "Selected all";
    $selectedBrand = $_POST["select_brand"];
    $selectedModel = $_POST["select_model"];
    $selectedCategory = $_POST["select_issue_category"];
    $selectedDetail = $_POST["select_issue_detail"]
    // <div class="presentation">
?>
        <h1>Brand selected <?php echo "$selectedBrand"; ?></h1>
    <!-- </div> -->
<?php
else {
?>

?>

<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
 */
get_header(); ?>
    
	<div class="container">
        <?php
echo "Selected all";
if(isset($_POST["select_brand"]) {
   echo "Selected all";
   $selectedBrand = $_POST["select_brand"]; 
}
?>
		<div class="row">
        	<div id="primary" <?php bavotasan_primary_attr(); ?>>
        		<?php
        		if ( have_posts() ) :
        			while ( have_posts() ) : the_post();
        				get_template_part( 'content', get_post_format() );
        			endwhile;

        			bavotasan_pagination();
        		else :
        			get_template_part( 'content', 'none' );
        		endif;
        		?>
        	</div>
            <?php get_sidebar(); ?>
		</div>
	</div>
<?php 
get_footer(); }
?>
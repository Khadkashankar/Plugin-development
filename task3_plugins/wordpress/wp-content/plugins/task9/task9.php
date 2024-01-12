<?php
/*
* Plugin Name: Custom Post Movie
* Plugin URI: #
* Author: Shankar Khadka        
* Author URI: #
* Description: custom metabox plugin

*/

function cpm_post_movie(){
    $labels = array(
        'name' => __('Movies', 'post type general name'),
        'add_new' => __('Add New Movies'),
    
      );
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true, 
          ); 
      register_post_type('movie',$args);
    }
add_action('init','cpm_post_movie');
add_action('add_meta_boxes','cpm_movie_metabox_fn');
function cpm_movie_metabox_fn(){
    add_meta_box('custom_metabox_id','Add Movie Details','cpm_show_metabox_fn','movie','side','high');
}
function cpm_show_metabox_fn($post){
    

    $release = get_post_meta($post->ID,'release_date',true);
    $director_name = get_post_meta($post->ID,'director_name',true);
    $movie_cast = get_post_meta($post->ID,'movie_cast',true);
    ?>
<div>
    <form action="" method="post">
        <label for="">Movie Release Date: </label>
        <input type="date" name="release" value="<?php echo $release; ?>"><br><br>
        <label for="">Movie Director: </label>
        <input type="text" name="director_name" value="<?php echo $director_name; ?>"><br><br>
        <label for="">Movie Cast: </label>
        <input type="text" name="movie_cast" value="<?php echo $movie_cast; ?>"><br><br>
    </form>

</div>
<?php
    
}
function cpm_insert_data_fn($post_id){
    if(isset($_POST['release']) && isset($_POST['director_name']) && isset($_POST['movie_cast'])){
        $release_date = sanitize_text_field($_POST['release']);
        $director_name = sanitize_text_field($_POST['director_name']);
        $movie_cast = sanitize_text_field($_POST['movie_cast']);
        

        update_post_meta($post_id,'release_date',$release_date);
        update_post_meta($post_id,'director_name',$director_name);
        update_post_meta($post_id,'movie_cast',$movie_cast);
        
    }
}
add_action('save_post','cpm_insert_data_fn');

function cpm_retrieve_movie_data_fn($content){
    global $post;
    $release_date = get_post_meta($post->ID,'release_date',true);
    $director_name = get_post_meta($post->ID,'director_name',true);
    $movie_cast = get_post_meta($post->ID,'movie_cast',true);
    
    $content= "Movie release date:".$release_date."<br>"."Director name is: ".$director_name."<br>"."caster is:".$movie_cast;


return $content;

}
add_filter('the_content','cpm_retrieve_movie_data_fn');

?>
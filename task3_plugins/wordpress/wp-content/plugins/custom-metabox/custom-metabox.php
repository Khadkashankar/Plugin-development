<?php
/*
** Plugin Name: Metabox
** Plugin URI: #
** Author: Shankar
** Description: this is custom metabox plugin for post

*/

add_action('add_meta_boxes','mb_custom_meta_fn');
function mb_custom_meta_fn(){
    add_meta_box('custom_metabox_id','Add Book Details','mb_show_metabox_fn','post','side','high');
}
function mb_show_metabox_fn($post){
    
    $author = get_post_meta($post->ID,'author',true);
    $book = get_post_meta($post->ID,'book',true);
    $description = get_post_meta($post->ID,'description',true);
    ?>
<div>
    <form action="" method="post">
        <label for="">Author: </label>
        <input type="text" name="author_name" value="<?php echo $author; ?>"><br><br>
        <select name="book_name" id="">
            <option disabled selected>choose book</option>
            <option value="english" <?php selected( $book, 'english' ); ?>>English</option>
            <option value=" nepali" <?php selected($book,'nepali'); ?>>Nepali</option>
            <option value="social" <?php selected($book,'socail'); ?>>Social</option>
            <option value="science" <?php selected($book,'science'); ?>>Science</option>
        </select><br><br>
        <textarea name="book_description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
    </form>

</div>
<?php
    
}
function mb_insert_data_fn($post_id){
    if(isset($_POST['author_name']) && isset($_POST['book_name']) && isset($_POST['book_description'])){
        $mb_author = sanitize_text_field($_POST['author_name']);
        $mb_book = sanitize_text_field($_POST['book_name']);
        $mb_description = sanitize_textarea_field($_POST['book_description']);
        

        update_post_meta($post_id,'author',$mb_author);
        update_post_meta($post_id,'book',$mb_book);
        update_post_meta($post_id,'description',$mb_description);
        
    }
}
add_action('save_post','mb_insert_data_fn');


function mb_retrieve_data_above_comments($content){
    
    global $post;
    $author = get_post_meta($post->ID,'author',true);
    $book = get_post_meta($post->ID,'book',true);
    $description = get_post_meta($post->ID,'description',true);
    
    $content= "Author is:".$author."<br>"."Book is: ".$book."<br>"."Description is:".$description;


return $content;
}
add_filter('the_content', 'mb_retrieve_data_above_comments');


// function retrieve_data_fn(){
// echo "hello";
// }
// add_action('comment_form_before','retrieve_data_fn');



?>
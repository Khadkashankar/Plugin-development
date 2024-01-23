<?php
//only accessible to logged in user
if (is_user_logged_in()) {
    if (isset($_POST['order_by'], $_POST['rating'], $_POST['page'])) {
        $order_by = sanitize_text_field($_POST['order_by']);
        $user_rating = sanitize_text_field($_POST['rating']);
        $page = intval($_POST['page']);
        $reviews_per_page = 5;
        $offset = ($page - 1) * $reviews_per_page;

        //get the reviews according to rating and date 
        $args = array(
            'role' => array('subscriber'),
            'meta_key' => 'rating',
            'meta_value' => $user_rating,
            'orderby' => 'user_registered',
            'order' => $order_by,
            'number' => $reviews_per_page,
            'offset' => $offset,
        );


        $users = get_users($args);
        $user = get_user_meta($user->ID);

        if (empty($users)) {
            echo '<div class="alert alert-info" role="alert">' . esc_html__('No review found.', 'user-review') . '</div>';
        } else {
            foreach ($users as $user) {
                $user_email = esc_html($user->user_email);
                $user_nicename = esc_html($user->user_nicename);
                $user_registered = esc_html($user->user_registered);
                $review = esc_html(get_user_meta($user->ID, 'review', true));
                $rating = esc_html(get_user_meta($user->ID, 'rating', true));

                echo '<div class="card mb-3" data-rating="' . $rating . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $user_nicename . '</h5>';
                echo '<p class="card-text"><strong>' . esc_html__('Email:', 'user-review') . '</strong> ' . $user_email . '</p>';
                echo '<p class="card-text"><strong>' . esc_html__('Review:', 'user-review') . '</strong> ' . $review . '</p>';
                echo '<p class="card-text" title="' . esc_html__('Rating', 'user-review') . '"><strong>' . esc_html__('Rating:', 'user-review') . '</strong> ' . $rating . '</p>';
                echo '<p class="card-text" title="' . esc_html__('Registered Date', 'user-review') . '"><strong>' . esc_html__('Registered Date:', 'user-reveiw') . '</strong> ' . $user_registered . '</p>';
                echo '</div>';
                echo '</div>';
            }
        }

        // Output pagination

        $user_query = new WP_User_Query(array(
            'role' => array('subscriber'),
            'meta_key' => 'review'
        ));
        $total_reviews = (int) $user_query->get_total();

        // $total_reviews = count_users()['total_users'];
        $total_pages = ceil($total_reviews / $reviews_per_page);

        echo '<div class="pagination-container">';
        echo '<ul class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
        die();
    }
} else {
    echo "You are not authorized to view this content";
}

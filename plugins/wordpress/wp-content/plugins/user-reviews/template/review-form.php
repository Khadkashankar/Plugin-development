<form action="" method="POST" id="user-form">
    <?php wp_nonce_field('urwr_user_review_nonce', 'urwr_user_review_nonce'); ?>
    <label for="email"><?php esc_html_e('User Email:', 'user-review') ?></label>
    <input type="email" id="email" />
    <span id="invalid-email" class="error-message"></span><br><br>

    <label for="pass"><?php esc_html_e('Password:', 'user-review') ?></label>
    <input type="password" id="pass" />
    <span id="invalid-pass" class="error-message"></span><br><br>

    <label for="firstname"><?php esc_html_e('First Name:', 'user-review') ?></label>
    <input type="text" id="firstname" />
    <span id="invalid-firstname" class="error-message"></span><br><br>

    <label for="lastname"><?php esc_html_e('Last Name:', 'user-review') ?></label>
    <input type="text" id="lastname" />
    <span id="invalid-lastname" class="error-message"></span><br><br>

    <label for="review"><?php esc_html_e('Review:', 'user-review') ?></label>
    <textarea id="review" cols="30" rows="10"></textarea>
    <span id="invalid-review" class="error-message"></span><br><br>

    <label for="rating"><?php esc_html_e('Rating:', 'user-review') ?></label>
    <input type="range" id="rating" min="1" value="5" max="5" step="1"><br><br>

    <input type="submit" id="submit" value="Register">
</form>
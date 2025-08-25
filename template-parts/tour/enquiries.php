<form class="banner-form" id="enquiryForm" method="post" name="enquirie_form">
    <input type="hidden" name="enquiries_package_id" value="<?php echo get_the_ID() ?>">
    <div class="search-box-single destination-box">
        <div class="searchbox-icon">
            <i class="bi bi-pencil-fill"></i>
        </div>
        <div class="searchbox-input">
            <input type="text" name="enquiries_fullname" placeholder="<?php echo esc_attr__('Full Name*', 'turio') ?>">
        </div>
    </div>
    <span class="enquiries_fullname_error d-none text-start text-danger"><?php echo esc_html('Full Name field is required') ?></span>
    <div class="search-box-single destination-box">
        <div class="searchbox-icon">
            <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="searchbox-input">
            <input type="text" name="enquiries_email_address" placeholder="<?php echo esc_attr__('E-mail*', 'turio') ?>">
        </div>
    </div>
    <span class="enquiries_email_address_error d-none text-start text-danger"><?php echo esc_html('E-mail field Address is required') ?></span>
    <div class="search-box-single destination-box">
        <div class="searchbox-icon">
            <i class="bi bi-telephone"></i>
        </div>
        <div class="searchbox-input">
            <input type="text" name="enquiries_phone" placeholder="<?php echo esc_attr__('Phone Number', 'turio') ?>">
        </div>
    </div>
    <div class="search-box-single">
        <div class="searchbox-icon">
            <i class="bi bi-person-fill"></i>
        </div>
        <div class="searchbox-input">
            <input type="number" name="enquiries_people" placeholder="<?php echo esc_attr__('People', 'turio') ?>">
        </div>
    </div>
    <div class="search-box-single">
        <div class="searchbox-icon">
            <i class="bi bi-tags-fill"></i>
        </div>
        <div class="searchbox-input">
            <input type="number" name="enquiries_number_of_tickets" placeholder="<?php echo esc_attr__('Number of tickets', 'turio') ?>">
        </div>
    </div>
    <div class="search-box-single">
        <div class="searchbox-icon">
            <i class="bi bi-chat-left-text-fill"></i>
        </div>
        <div class="searchbox-input">
            <textarea name="enquiries_message" rows="6" placeholder="<?php echo esc_attr__('Your Enquiry*', 'turio') ?>"></textarea>
        </div>
    </div>
    <span class="enquiries_message_error d-none text-start text-danger"><?php echo esc_html('Enquiry field is required') ?></span>
    <?php wp_nonce_field('enquiries_nonce', 'custom_enquiries_nonce'); ?>
    <div class="enquiries_success_message"></div>
    <button type="submit" value="enquiriesForm" class="button-fill-primary btn--lg w-100 mt-3"><?php echo esc_html__('Submit Now', 'turio') ?></button>
</form>
<?php

/**
 * your_tpl_settings_page
 *
 * @return void
 */
function your_tpl_settings_page()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $your_tpl_opts = get_option('your_tpl_opts');

?>
    <div class="card w-75 mw-100">
        <div class="card-body">
            <h3 class="card-title mb-3"><?php __('your_tpl Settings', 'your_tpl'); ?></h3>
            <?php if (isset($_GET['status']) && $_GET['status'] == 1) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo __("Options updated successfully!", "your_tpl") ?>
                </div>
            <?php endif; ?>


            <form class="row" method="POST" action="admin-post.php">
                <div class="form-group mb-3">
                    <label><?php echo __('Sticky Header', 'your_tpl'); ?></label>
                    <select class="form-control" name="your_tpl_sticky_header">
                        <option value="1"><?php echo __("No", "your_tpl") ?></option>
                        <option value="2" <?php echo $your_tpl_opts['your_tpl_sticky_header'] == 2 ? "selected" : ""; ?>><?php echo __("Yes", "your_tpl") ?></option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label><?php echo __('Show Featured Properties on Front Page', 'your_tpl'); ?></label>
                    <select class="form-control" name="your_tpl_featured_properties">
                        <option value="1"><?php echo __("No", "your_tpl") ?></option>
                        <option value="2" <?php echo $your_tpl_opts['your_tpl_featured_properties'] == 2 ? "selected" : ""; ?>><?php echo __("Yes", "your_tpl") ?></option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label><?php echo __('Show Regions on Front Page', 'your_tpl'); ?></label>
                    <select class="form-control" name="your_tpl_regions_properties">
                        <option value="1"><?php echo __("No", "your_tpl") ?></option>
                        <option value="2" <?php echo $your_tpl_opts['your_tpl_regions_properties'] == 2 ? "selected" : ""; ?>><?php echo __("Yes", "your_tpl") ?></option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <input type="hidden" name="action" value="your_tpl_save_options">
                    <?php wp_nonce_field('your_tpl_options_verify'); ?>
                    <button type="submit" class="btn btn-primary"><?php echo __('Save', 'your_tpl'); ?></button>
                </div>
            </form>

        </div>
    </div>

<?php
}

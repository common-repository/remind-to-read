<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/RemindToRead/wp-remind-to-read
 * @since      1.0.0
 *
 * @package    Remind_To_Read
 * @subpackage Remind_To_Read/partials
 */


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" id="rtr-extended-settings">
    <?php
    if (!empty($errors)) {
        foreach($errors as $error) {
            $this->printErrorMessage($error);
        }
    }
    ?>
    <h2>Remind to Read Settings <span class="wp-rtr-extended-light">Version <?php echo Remind_To_Read_Admin::$VERSION; ?></span></h2>


    <?php
    if ($isSaved) {
        $this->printSuccessMessage("Settings saved successfully.");
    }
    ?>
    <form name="rtr-extended-settings" method="post" action="">

      <input type="hidden" name="isRTRExtSettings" value="Y" />
	<hr>
      <h3>'Remind to Read' Module</h3>
      <table class="form-table">
        <tr valign="top">
          <th scope="row"><label for="module_remind_to_read_active"><?php _e('Remind to Read Status'); ?></label></th>
          <td>
            <?php $this->printSelectTag("remind_to_read_active",
            array("yes" => "Active", "no" => "Disabled"),
            $options["remind_to_read_active"]
            ); ?>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="module_remind_to_read_key"><?php _e('Remind to Read Key'); ?></label></th>
          <td>
            <?php 
			$this->printTextTag("remind_to_read_key", 
				$options["remind_to_read_key"], 
				array("size" => "50", "placeholder" => "[Found on settings page]")
			);
			?>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="module_remind_to_read_url"><?php _e('Remind to Read Domain'); ?></label></th>
          <td>
            <?php 
			$this->printTextTag("remind_to_read_url", 
				$options["remind_to_read_url"], 
				array("size" => "50", "placeholder" => "http://domain.com")
			);
			?>
          </td>
        </tr>
      </table>

      <p class="submit">
        <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
      </p>
    </form>
</div>

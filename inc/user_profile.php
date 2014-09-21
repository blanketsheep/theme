<?php
if( !function_exists('_s_user_profile_fields') ):
function _s_user_profile_fields($user) { ?>

<h3><?php echo __( 'ウェブマガジン', '_s' ); ?></h3>

<table class="form-table">
  <tbody>
    <tr>
      <th>
        <label><?php echo __( 'ライター情報', '_s' ); ?></label>
      </th>
      <td>
        <?php $form_data = get_user_meta($user->ID, '_s_is_writer'); ?>
        <?php if( !empty($form_data[0] ) && filter_var($form_data[0], FILTER_VALIDATE_BOOLEAN) ): ?>
        <input type="checkbox" name="_s_is_writer" checked="checked" />
        <?php else: ?>
        <input type="checkbox" name="_s_is_writer" />
        <?php endif; ?>
        <span><?php echo __( 'ライターとして表示する', '_s' ); ?></span>
      </td>
    </tr>
  </tbody>
</table>

<?php }
endif;

add_action('show_user_profile', '_s_user_profile_fields');
add_action('edit_user_profile', '_s_user_profile_fields');

if( !function_exists('_s_update_user_profile_fields') ):
function _s_update_user_profile_fields($user_id) {
  $form_bool = false;
  if( !empty($_POST['_s_is_writer']) )
    $form_bool = filter_var($_POST['_s_is_writer'], FILTER_VALIDATE_BOOLEAN);
  if( current_user_can('edit_user',$user_id) )
    update_user_meta($user_id, '_s_is_writer', $form_bool);
}
endif;

add_action('personal_options_update', '_s_update_user_profile_fields');
add_action('edit_user_profile_update', '_s_update_user_profile_fields');
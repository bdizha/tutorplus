<td colspan="5">
  <?php echo __('%%email_address%% - %%address_line_1%% - %%address_line_2%% - %%postcode%% - %%city%%', array('%%email_address%%' => $student_contact->getEmailAddress(), '%%address_line_1%%' => $student_contact->getAddressLine1(), '%%address_line_2%%' => $student_contact->getAddressLine2(), '%%postcode%%' => $student_contact->getPostcode(), '%%city%%' => $student_contact->getCity()), 'messages') ?>
</td>

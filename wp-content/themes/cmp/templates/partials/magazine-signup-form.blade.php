<?php
  $subscribe_form_action = get_field('subscribe_form_action', 'options') ?: 'http://members.carnegiemuseums.org/site/Survey';
?>

<form name="survey_16543" method="POST" action="<?= $subscribe_form_action ?>" >
  <div class="form-items">
    <input type="text" name="cons_email" placeholder="E-mail Address" size="25" maxlength="255" aria-label="Email address" />
    <input type="submit" name="ACTION_SUBMIT_SURVEY_RESPONSE" value="Sign Up" class="button" />
  </div>
  <input type="hidden" name="cons_info_component" value="t" />
  <input type="hidden" name="SURVEY_ID" value="16543" />
  <input type="hidden" name="USER_HAS_TAKEN" value="null" />
  <input type="hidden" name="SURVEY_IGNORE_ERRORS" value="TRUE" />
  <input type="hidden" name="QUESTION_STAG_APP_ID" value="" />
  <input type="hidden" name="QUESTION_STAG_APP_REF_ID" value="" />
  <input type="hidden" name="QUESTION_STAG_CTX_TYPE" value="" />
  <input type="hidden" name="ERRORURL" value="http://www.cmoa.org/#error"  /><!--local page for error redirect-->
  <input type="hidden" name="NEXTURL" value="http://members.carnegiemuseums.org/site/PageNavigator/CMP_Carnegie_Magazine_email_signup_box_preferences.html#success" /><!--local page for successful submission redirect-->
  <div style="display:none">
    <input type="text" name="denySubmit" value="" alt="This field is used to prevent form submission by scripts." aria-hidden="true" aria-label="For spam bots only" />
  </div>
</form>

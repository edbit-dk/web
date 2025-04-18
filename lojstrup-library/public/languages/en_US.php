<?php
/**
 * Texts used in the application.
 * These texts are used via Text::get('FEEDBACK_USERNAME_ALREADY_TAKEN').
 * Could be extended to i18n etc.
 */
return array(
    "FEEDBACK_UNKNOWN_ERROR" => "Unknown error occurred!",
    "FEEDBACK_PASSWORD_WRONG_3_TIMES" => "You have typed in a wrong password 3 or more times already. Please wait 30 seconds to try again.",
    "FEEDBACK_ACCOUNT_NOT_ACTIVATED_YET" => "Your account is not activated yet. Please click on the confirm link in the mail.",
    "FEEDBACK_PASSWORD_WRONG" => "Password was wrong.",
    "FEEDBACK_USER_DOES_NOT_EXIST" => "This user does not exist.",
    "FEEDBACK_LOGIN_FAILED" => "Login failed.",
    "FEEDBACK_USERNAME_FIELD_EMPTY" => "Username field was empty.",
    "FEEDBACK_PASSWORD_FIELD_EMPTY" => "Password field was empty.",
    "FEEDBACK_USERNAME_OR_PASSWORD_FIELD_EMPTY" => "Username or password field was empty.",
    "FEEDBACK_USERNAME_EMAIL_FIELD_EMPTY" => "Username / email field was empty.",
    "FEEDBACK_EMAIL_FIELD_EMPTY" => "Email field was empty.",
    "FEEDBACK_EMAIL_AND_PASSWORD_FIELDS_EMPTY" => "Email and password fields were empty.",
    "FEEDBACK_USERNAME_SAME_AS_OLD_ONE" => "Sorry, that username is the same as your current one. Please choose another one.",
    "FEEDBACK_USERNAME_ALREADY_TAKEN" => "Sorry, that username is already taken. Please choose another one.",
    "FEEDBACK_USER_EMAIL_ALREADY_TAKEN" => "Sorry, that email is already in use. Please choose another one.",
    "FEEDBACK_USERNAME_CHANGE_SUCCESSFUL" => "Your username has been changed successfully.",
    "FEEDBACK_USERNAME_AND_PASSWORD_FIELD_EMPTY" => "Username and password fields were empty.",
    "FEEDBACK_USERNAME_DOES_NOT_FIT_PATTERN" => "Username does not fit the name pattern: only a-Z and numbers are allowed, 2 to 64 characters.",
    "FEEDBACK_EMAIL_DOES_NOT_FIT_PATTERN" => "Sorry, your chosen email does not fit into the email naming pattern.",
    "FEEDBACK_EMAIL_SAME_AS_OLD_ONE" => "Sorry, that email address is the same as your current one. Please choose another one.",
    "FEEDBACK_EMAIL_CHANGE_SUCCESSFUL" => "Your email address has been changed successfully.",
    "FEEDBACK_CAPTCHA_WRONG" => "The entered captcha security characters were wrong.",
    "FEEDBACK_PASSWORD_REPEAT_WRONG" => "Password and password repeat are not the same.",
    "FEEDBACK_PASSWORD_TOO_SHORT" => "Password has a minimum length of 6 characters.",
    "FEEDBACK_USERNAME_TOO_SHORT_OR_TOO_LONG" => "Username cannot be shorter than 2 or longer than 64 characters.",
    "FEEDBACK_ACCOUNT_SUCCESSFULLY_CREATED" => "Your account has been created successfully and we have sent you an email. Please click the VERIFICATION LINK within that mail.",
    "FEEDBACK_VERIFICATION_MAIL_SENDING_FAILED" => "Sorry, we could not send you an verification mail. Your account has NOT been created.",
    "FEEDBACK_ACCOUNT_CREATION_FAILED" => "Sorry, your registration failed. Please go back and try again.",
    "FEEDBACK_VERIFICATION_MAIL_SENDING_ERROR" => "Verification mail could not be sent due to: ",
    "FEEDBACK_VERIFICATION_MAIL_SENDING_SUCCESSFUL" => "A verification mail has been sent successfully.",
    "FEEDBACK_ACCOUNT_ACTIVATION_SUCCESSFUL" => "Activation was successful! You can now log in.",
    "FEEDBACK_ACCOUNT_ACTIVATION_FAILED" => "Sorry, no such id/verification code combination here...",
    "FEEDBACK_AVATAR_UPLOAD_SUCCESSFUL" => "Avatar upload was successful.",
    "FEEDBACK_AVATAR_UPLOAD_WRONG_TYPE" => "Only JPEG and PNG files are supported.",
    "FEEDBACK_AVATAR_UPLOAD_TOO_SMALL" => "Avatar source file's width/height is too small. Needs to be 100x100 pixel minimum.",
    "FEEDBACK_AVATAR_UPLOAD_TOO_BIG" => "Avatar source file is too big. 5 Megabyte is the maximum.",
    "FEEDBACK_AVATAR_FOLDER_DOES_NOT_EXIST_OR_NOT_WRITABLE" => "Avatar folder does not exist or is not writable. Please change this via chmod 775 or 777.",
    "FEEDBACK_AVATAR_IMAGE_UPLOAD_FAILED" => "Something went wrong with the image upload.",
    "FEEDBACK_AVATAR_IMAGE_DELETE_SUCCESSFUL" => "You successfully deleted your avatar.",
    "FEEDBACK_AVATAR_IMAGE_DELETE_NO_FILE" => "You don't have a custom avatar.",
    "FEEDBACK_AVATAR_IMAGE_DELETE_FAILED" => "Something went wrong while deleting your avatar.",
    "FEEDBACK_PASSWORD_RESET_TOKEN_FAIL" => "Could not write token to database.",
    "FEEDBACK_PASSWORD_RESET_TOKEN_MISSING" => "No password reset token.",
    "FEEDBACK_PASSWORD_RESET_MAIL_SENDING_ERROR" => "Password reset mail could not be sent due to: ",
    "FEEDBACK_PASSWORD_RESET_MAIL_SENDING_SUCCESSFUL" => "A password reset mail has been sent successfully.",
    "FEEDBACK_PASSWORD_RESET_LINK_EXPIRED" => "Your reset link has expired. Please use the reset link within one hour.",
    "FEEDBACK_PASSWORD_RESET_COMBINATION_DOES_NOT_EXIST" => "Username/Verification code combination does not exist.",
    "FEEDBACK_PASSWORD_RESET_LINK_VALID" => "Password reset validation link is valid. Please change the password now.",
    "FEEDBACK_PASSWORD_CHANGE_SUCCESSFUL" => "Password successfully changed.",
    "FEEDBACK_PASSWORD_CHANGE_FAILED" => "Sorry, your password changing failed.",
    "FEEDBACK_ACCOUNT_TYPE_CHANGE_SUCCESSFUL" => "Account type change successful",
    "FEEDBACK_ACCOUNT_TYPE_CHANGE_FAILED" => "Account type change failed",
    "FEEDBACK_NOTE_CREATION_FAILED" => "Note creation failed.",
    "FEEDBACK_NOTE_EDITING_FAILED" => "Note editing failed.",
    "FEEDBACK_NOTE_DELETION_FAILED" => "Note deletion failed.",
    "FEEDBACK_COOKIE_INVALID" => "Your remember-me-cookie is invalid.",
    "FEEDBACK_COOKIE_LOGIN_SUCCESSFUL" => "You were successfully logged in via the remember-me-cookie.",
    "FEEDBACK_FACEBOOK_LOGIN_NOT_REGISTERED" => "Sorry, you don't have an account here. Please register first.",
    "FEEDBACK_FACEBOOK_EMAIL_NEEDED" => "Sorry, but you need to allow us to see your email address to register.",
    "FEEDBACK_FACEBOOK_UID_ALREADY_EXISTS" => "Sorry, but you have already registered here (your Facebook ID exists in our database).",
    "FEEDBACK_FACEBOOK_EMAIL_ALREADY_EXISTS" => "Sorry, but you have already registered here (your Facebook email exists in our database).",
    "FEEDBACK_FACEBOOK_USERNAME_ALREADY_EXISTS" => "Sorry, but you have already registered here (your Facebook username exists in our database).",
    "FEEDBACK_FACEBOOK_REGISTER_SUCCESSFUL" => "You have been successfully registered with Facebook.",
    "FEEDBACK_FACEBOOK_OFFLINE" => "We could not reach the Facebook servers. Maybe Facebook is offline (that really happens sometimes).",
);
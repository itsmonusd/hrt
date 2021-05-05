<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// helpers messasges

    function messages() {
        $message = array(
            'success'	=> 'success',
            'failed'	=> 'failed',
            'tryAgain' => 'Something went wrong!, Try again later',
            'verifyMobile'=>'Verify mobile number',
            'otpVerified'=>'Your OTP is verified',
            'otpNotVerified'=>'OTP is not matched',
            'authenticationFailed'=>'Usercode or password not matched',
            'loggedInTrue'=>'Successfully logged in',
            'passwordSentToMobile'=>'Your password is successfully send to authorized mobile',
            'verifyYourMobile'=>'Please verify your mobile first',
            'invalidUserType'=>'Invalid user type',
            'invalidPassword'=>'Your password not matched!',
            'passwordUpdated'=> 'Password has been updated',
            'unAuthorized'=>'User not authorized. Contact to administrator',
            'userNotFound'=>'User not found',
            'passwordNotMatch'=>'Password not matched',
            'changePassword'=>'Password changed',
            'oldPasswordNotMatch'=>'Old password not matched',
            'categorySaved' => 'Category saved successfully',
            'ourTeamSaved'=>'Our team saved successfully',
            'patnerFeaturedSaved'=>'Patner or Featured saved successfully',
            'formRequired'=>'Form required, fill the form please',
            'policySaved'=>'Policy saved successfully',
            'galleryImageSaved'=>'Gallery image uploaded',
            'galleryImageFetched'=>'Gallery image successfully fetched',
            'requiredFeilds'=>'Please fill required feilds'
        );

        return $message;

    }

?>


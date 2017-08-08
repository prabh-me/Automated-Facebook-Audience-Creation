<?php
define('SDK_DIR', __DIR__ . '/home/ubuntu/vendor/facebook/php-ads-sdk'); // Path to the SDK directory
$loader = include '/home/ubuntu/vendor/autoload.php';

$app_id='XXXXXXXXXXXXX'; //Your facebook app id
$app_secret='XXXXXXXXXXXXX'; //Your facebook app secret
$access_token='XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; //Your facebook app token

use FacebookAds\Api;
Api::init($app_id, $app_secret, $access_token);
$api = Api::instance();

use FacebookAds\Object\CustomAudience;
use FacebookAds\Object\Values\CustomAudienceTypes;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Fields\CustomAudienceFields;
use FacebookAds\Object\Values\CustomAudienceSubtypes;

$parameters = file_get_contents('php://input');
$email_id_and_product_group_id = explode(",",$parameters);
$email_id=$email_id_and_product_group_id[0];
$product_group_id=$email_id_and_product_group_id[1];

$account = new AdAccount('act_<AD_ACCOUNT_ID>'); //Your Ad Account ID
$field = array(
CustomAudienceFields::NAME,
CustomAudienceFields::ID);
$audiences = $account->getCustomAudiences($field);

$audience_already_exists=0;

foreach ($audiences as $value){
       if $value->name == product_group_id . '_add_to_cart';
       $audience_already_exists=1;
       $custom_audience_id=$value->id;
       }
       
if ($audience_already_exists==1){
$audience = new CustomAudience($custom_audience_id);
$audience->addUsers($emails, CustomAudienceTypes::EMAIL);
}

if ($audience_already_exists==0){
$audience = new CustomAudience(null, 'act_<AD_ACCOUNT_ID>'); //Your Ad Account ID
$audience->setData(array(
  CustomAudienceFields::NAME => product_group_id . '_add_to_cart',
  CustomAudienceFields::SUBTYPE => CustomAudienceSubtypes::CUSTOM,
  CustomAudienceFields::DESCRIPTION => 'People who added a product to their cart.',
));

$audience->create();
}
?>

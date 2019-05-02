# drupal8-siteinformation
* This is drupal 8 module to add new field (siteapikey) in site information configuration form in Admin.
* Button text has been changed from 'Save Configuration' to 'Update Configuration'
* This module has custom REST API which can be access through this URL- http://localhost/drupal8/page_json/{siteapikey}/{node_id}?_format=json
* If node is page type and siteapikey value mathed then node content is will be display as json response else access denied error will throw.

# Resource used 
https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Form%21form.api.php/function/hook_form_alter/8.2.x
https://www.drupal.org/docs/8/api/configuration-api/simple-configuration-api


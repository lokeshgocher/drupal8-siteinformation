<?php
namespace Drupal\siteform\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\Core\node\Entity\Node;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "siteform_resource_api",
 *   label = @Translation("site resource api"),
 *   uri_paths = {
 *     "canonical" = "/page_json/{apikey}/{nid}",
      
 *   }
 * )
 */
 
 
Class SiteResource extends ResourceBase {
	
	
	/**
     * Responds to GET requests.
     *
     *  @return \Drupal\rest\ResourceResponse
     *   The HTTP response object.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     *   Throws exception expected.
     */
    public function get($apikey,$nid)
    {
		// $nid = $this->request->get('nid');
       // get api key from site information page
	   $siteinfo = \Drupal::config('system.site');
       $siteapi = $siteinfo->get('siteapikey');
        if($nid){
            // Load node
                $node = \Drupal\node\Entity\Node::load($nid);
				        if(is_object($node) AND $node->type->target_id=='page' AND $siteapi==$apikey)
				            {
								
								$response_result['node_id'] = $node->id();
								$response_result['title'] = $node->getTitle();
								$response_result['type'] = $node->type->target_id;
								$response_result['content'] = $node->body->value;
								$response_result['format'] = $node->body->format;
								$response = new ResourceResponse($response_result);
								// Configure caching for results
							//	if ($response instanceof CacheableResponseInterface) {
							//		$response->addCacheableDependency($response_result);
							//	}
								return $response;
							}
							else
							{
								throw new AccessDeniedHttpException('Access Denied');
							}
				   
				}
	                        else
							{
								throw new AccessDeniedHttpException('Access Denied');
							}
				
  }
	
	
	
	
	
}

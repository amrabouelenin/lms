<?php

namespace Drupal\lms_common;
use Symfony\Component\HttpFoundation\Request;

/**
 * Enacapsulate functions that can be used under focal point entities 
 */

class FPEntities {

	/**
	 * @var \Drupal\Core\Config\ConfigFactoryInterface
	 */

  /**
   * check if specific entity has it's own employees verified
   */
	public function are_all_employees_of_entity_verified($entity) {

  	$ids = \Drupal::entityTypeManager()
	  	->getStorage('user')
	  	->loadByProperties(['field_entity' => $entity, 'field_verified' => '0']);
	  if(!empty($ids)){
	    return false;
	  }
	  else return true;
	}

  /**
   * check if specific employee to specific entity
   */
	public function does_employee_belong_to_this_entity($employee_id, $entity_id) {

  	$ids = \Drupal::entityTypeManager()
	  	->getStorage('user')
	  	->loadByProperties(['field_entity' => $entity_id, 'uid' => $employee_id]);
	  if(!empty($ids)){
	    return true;
	  }
	  else return false;
	}

  /**
   * check if specific employee to specific entity
   */
	public function get_employee_entity($employee_id) {
		$user = \Drupal\user\Entity\User::load($employee_id);

		if ($user->hasRole('qdg_admin') || $user->hasRole('administrator') ) {
		  return ;
		}
		else {
		  return $user->get('field_entity')->target_id;
		}
	}
}

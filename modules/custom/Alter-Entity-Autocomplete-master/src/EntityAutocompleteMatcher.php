<?php

namespace Drupal\alter_entity_autocomplete;

use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\Tags;

class EntityAutocompleteMatcher extends \Drupal\Core\Entity\EntityAutocompleteMatcher {

  /**
   * Gets matched labels based on a given search string.
   */
  public function getMatches($target_type, $selection_handler, $selection_settings, $string = '') {

    $matches = [];

    $options = [
      'target_type'      => $target_type,
      'handler'          => $selection_handler,
      'handler_settings' => $selection_settings,
    ];

    $handler = $this->selectionManager->getInstance($options);

    if (isset($string)) {
      // Get an array of matching entities.
      $match_operator = !empty($selection_settings['match_operator']) ? $selection_settings['match_operator'] : 'CONTAINS';
      $entity_labels = $handler->getReferenceableEntities($string, $match_operator, 10);

      // Loop through the entities and convert them into autocomplete output.
      foreach ($entity_labels as $values) {
        foreach ($values as $entity_id => $label) {

          $entity = \Drupal::entityTypeManager()->getStorage($target_type)->load($entity_id);
          $entity = \Drupal::entityManager()->getTranslationFromContext($entity);

          $type = !empty($entity->type->entity) ? $entity->type->entity->label() : $entity->bundle();
          $status = '';
          if ($entity->getEntityType()->id() == 'node') {
            //$status = ($entity->isPublished()) ? ", Published" : ", Unpublished";
            $key = $label . ' (' . $entity_id . ')';
            // Strip things like starting/trailing white spaces, line breaks and tags.
            $key = preg_replace('/\s\s+/', ' ', str_replace("\n", '', trim(Html::decodeEntities(strip_tags($key)))));
            // Names containing commas or quotes must be wrapped in quotes.
            $key = Tags::encode($key);
            $label = $label . ' (' . $entity_id . ')';
            //$label = $label ;
            $matches[] = ['value' => $key, 'label' => $label];
          }
          if ($entity->getEntityType()->id() == 'user') {
            
            // get employee full name from user entity
            $entity = \Drupal::entityTypeManager()->getStorage($target_type)->load($entity_id);
            $user = \Drupal\user\Entity\User::load($entity_id);
            $status = $user->get('field_full_name')->getValue()[0]['value'];
            // get employee entity name from entity reference 
            $employee_entity = $user->get('field_entity')->getValue()[0]['target_id'];
            $employee_entity = \Drupal::entityManager()->getStorage('node')->load($user->get('field_entity')->getValue()[0]['target_id']);
            $key = $label . ' (' . $entity_id .')';
            // Strip things like starting/trailing white spaces, line breaks and tags.
            $key = preg_replace('/\s\s+/', ' ', str_replace("\n", '', trim(Html::decodeEntities(strip_tags($key)))));
            // Names containing commas or quotes must be wrapped in quotes.
            $key = Tags::encode($key);
            $label = $label . ' ['  . $status . ','.$employee_entity->title->value.']';
            $matches[] = ['value' => $key, 'label' => $label];
          }


        }
      }
    }

    return $matches;
  }
}

<?php

namespace Drupal\vbo_export\Plugin\Action;

use Drupal\views_bulk_operations\Action\ViewsBulkOperationsActionBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\StreamWrapper\StreamWrapperManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Session\AccountInterface;

/**
 * Base class for export actions.
 */
abstract class VboExportBase extends ViewsBulkOperationsActionBase implements ContainerFactoryPluginInterface {

  const THEME = '';

  const EXTENSION = '';

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RendererInterface $renderer, StreamWrapperManagerInterface $streamWrapperManager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->renderer = $renderer;
    $this->streamWrapperManager = $streamWrapperManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('renderer'),
      $container->get('stream_wrapper_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildPreConfigurationForm(array $form, array $values, FormStateInterface $form_state) {
    $form['strip_tags'] = [
      '#title' => $this->t('Strip HTML tags'),
      '#type' => 'checkbox',
      '#default_value' => isset($values['strip_tags']) ? $values['strip_tags'] : FALSE,
    ];
    return $form;
  }

  /**
   * Generate output string.
   */
  protected function generateOutput() {
    $renderable = [
      '#theme' => static::THEME,
      '#header' => $this->context['sandbox']['header'],
      '#rows' => $this->context['sandbox']['rows'],
      '#configuration' => $this->configuration,
    ];

    return $this->renderer->render($renderable);
  }

  /**
   * Output generated string to file. Message user.
   *
   * @param string $output
   *   The string that will be saved to a file.
   */
  protected function sendToFile($output) {

    if (!empty($output)) {
      $rand = substr(hash('ripemd160', uniqid()), 0, 8);
      $filename = $this->context['view_id'] . '_' . date('Y_m_d_H_i', REQUEST_TIME) . '-' . $rand . '.' . static::EXTENSION;

      $wrappers = $this->streamWrapperManager->getWrappers();
      if (isset($wrappers['private'])) {
        $wrapper = 'private';
      }
      else {
        $wrapper = 'public';
      }

      $destination = $wrapper . '://' . $filename;
      $file = file_save_data($output, $destination, FILE_EXISTS_REPLACE);
      $file->setTemporary();
      $file->save();
      $file_url = Url::fromUri(file_create_url($file->getFileUri()));
      $link = Link::fromTextAndUrl($this->t('Click here'), $file_url);
      drupal_set_message($this->t('Export file created, @link to download.', array('@link' => $link->toString())));
    }

  }

  /**
   * Execute multiple handler.
   *
   * Execute action on multiple entities to generate csv output
   * and display a download link.
   */
  public function executeMultiple(array $entities) {
    // Build output header array.
    if (!isset($this->context['sandbox']['header'])) {
      $this->context['sandbox']['header'] = [];
    }
    $header = &$this->context['sandbox']['header'];

    if (empty($header)) {
      foreach ($this->view->field as $id => $field) {
        // Skip Views Bulk Operations field and excluded fields.
        if ($field->options['plugin_id'] === 'views_bulk_operations_bulk_form' || $field->options['exclude']) {
          continue;
        }
        $header[$id] = $field->options['label'];
      }
    }

    if (!empty($header) && !empty($this->view->result)) {
      // Render rows.
      $this->view->style_plugin->preRender($this->view->result);

      if (!isset($this->context['sandbox']['rows'])) {
        $this->context['sandbox']['rows'] = [];
      }

      $index = count($this->context['sandbox']['rows']);
      foreach ($this->view->result as $num => $row) {
        foreach ($header as $field_id => $label) {
          $this->context['sandbox']['rows'][$index][$field_id] = (string) $this->view->style_plugin->getField($num, $field_id);
        }
        $index++;
      }

      // Generate the output file if the last row has been processed.
      if (!isset($this->context['sandbox']['total']) || $index >= $this->context['sandbox']['total']) {
        $output = $this->generateOutput();
        $this->sendToFile($output);
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function execute($entity = NULL) {
    $this->executeMultiple([$entity]);
  }

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    $access = $object->access('view', $account, TRUE);
    return $access->isAllowed();
  }

}

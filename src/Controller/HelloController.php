<?php

namespace Drupal\ai42core\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, World! Welcome to the AI42 Core module.'),
    ];
  }
}

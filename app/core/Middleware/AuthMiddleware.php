<?php

namespace app\core\Middleware;

use app\core\Application;
use app\core\HttpException;

class AuthMiddleware extends Middleware
{
  const ALL_METHOD = 'ALL_METHOD';

  protected array $actions = [];

  public function __construct(array $actions = [])
  {
    $this->actions = $actions;
  }

  public function execute()
  {
    if (Application::$app->user) {
      if (in_array(self::ALL_METHOD, array_keys($this->actions))) {
        if (!in_array(Application::$app->user->role, $this->actions[self::ALL_METHOD])) {
          throw new HttpException(401);
        }
      } elseif ($this->actions[Application::$app->controller->action] ?? false) {
        if (!in_array(Application::$app->user->role, $this->actions[Application::$app->controller->action])) {
          throw new HttpException(401);
        }
      }
    } else {
      throw new HttpException(401);
    }
  }
}

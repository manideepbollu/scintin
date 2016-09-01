<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 15/12/14
 * Time: 10:53 AM
 */

namespace common\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['batch']) ? $params['batch']->created_by == $user : false;
    }
}
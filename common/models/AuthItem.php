<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property array $permissionElements
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property User $updatedBy
 * @property User $createdBy
 */
class AuthItem extends ActiveRecord
{

    public $permissionElements = ['create', 'view', 'view-own', 'update', 'update-own', 'delete', 'delete-own'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_by', 'updated_by'], 'integer'],
            [['description', 'data', 'created_at', 'updated_at'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Sets the appropriate permissions for a role as per the inputs during create / update role.
     * @param array|mixed $postParams
     * @return boolean
     */
    public function setRolePermissions($postParams)
    {
        if($postParams){
            $totalPermissions = self::getAllPermissions();
            $rbac = Yii::$app->authManager;
            $rbac->removeChildren($this);

            foreach($totalPermissions as $permission){
                $localPermission = $rbac->getPermission($permission);
                if(isset($postParams[$localPermission->name])){
                    if(!$rbac->hasChild($this, $localPermission))
                        $rbac->addChild($this, $localPermission);
                }
            }
        }
        return true;
    }

    /**
     * @return array - Returns an array of permissions registered in the application
     */
    public static function getAllPermissions()
    {
        return AuthItem::find()
            ->asArray()
            ->select(['name'])
            ->where(['type' => 2])
            ->all();
    }

    /**
     * @return array - Returns an array of roles registered in the application
     */
    public static function getAllRoles()
    {
        $roles = null;

        $multiArray =  AuthItem::find()
            ->asArray()
            ->select(['name'])
            ->where(['type' => 1])
            ->all();

        foreach($multiArray as $singleArray)
            $roles[$singleArray['name']] = $singleArray['name'];

        return $roles;
    }

    /**
     * Applies timestamps and blamable data without the help of Yii Behaviors.
     * @param string $action = create / update
     * @return bool
     */
    public function timeAndBlame($action = "create")
    {
        $time = date('d/m/Y H:i:s'); /* Ex: 01/01/2015 22:10:05 */
        $userID = Yii::$app->user->id;

        if($action === "create"){
            $this->created_at = $time;
            $this->updated_at = $time;
            $this->created_by = $userID;
            $this->updated_by = $userID;
            return $this->save();
        }else{
            $this->updated_at = $time;
            $this->updated_by = $userID;
            return $this->save();
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

}

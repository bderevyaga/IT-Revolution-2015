<?php
namespace app\models;

use Yii;
use yii\web\UploadedFile;

class Userinfo extends \yii\db\ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return 'userinfo';
    }
    public function rules()
    {
        return [
            [['user_id', 'date_birth', 'address', 'phone', 'avatar', 'name'], 'required'],
            [['user_id', 'date_birth'], 'integer'],
            [['address'], 'string'],
            [['phone', 'avatar', 'name'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'id',
            'date_birth' => 'День народження',
            'address' => 'Адреса',
            'phone' => 'Телефон',
            'avatar' => 'Аватар',
            'name' => 'Імя',
        ];
    }

    public static function getAll($user_id)
    {
        $query = Userinfo::find();
        $departments = $query->where([ 'user_id' => $user_id])->asArray()->all();
        return $departments;
    }
    public static function savedate($data)
    {
        $customer = Userinfo::findOne(['user_id' => Yii::$app->user->identity->id,]);
        if($customer == ''){
            $customer = new Userinfo();
            $customer->user_id = Yii::$app->user->identity->id;
            $customer->date_birth = $data['Userinfo']['date_birth'];
            $customer->address = $data['Userinfo']['address'];
            $customer->phone = $data['Userinfo']['phone'];
            $customer->avatar = $data['Userinfo']['avatar'];
            $customer->name = $data['Userinfo']['name'];
            $customer->save();
        }else{
            $customer->date_birth = $data['Userinfo']['date_birth'];
            $customer->address = $data['Userinfo']['address'];
            $customer->phone = $data['Userinfo']['phone'];
            $customer->avatar = $data['Userinfo']['avatar'];
            $customer->name = $data['Userinfo']['name'];
            $customer->save();
        }
        

    }
}


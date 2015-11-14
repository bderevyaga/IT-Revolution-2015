<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class Event extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['id', 'user_id', 'start'], 'integer'],
            [['title'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'start' => $this->start,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }

    public static function getAll($user_id)
    {
        $query = Event::find();
        $departments = $query->where([ 'user_id' => $user_id])->asArray()->all();
        return $departments;
    }
}

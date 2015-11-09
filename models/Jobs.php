<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jobs".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $start_datetime
 * @property string $end_datetime
 */
class Jobs extends \yii\db\ActiveRecord
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';


    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['user_id', 'title', 'description', 'start_datetime', 'end_datetime'],
            self::SCENARIO_CREATE => ['*'],
            self::SCENARIO_UPDATE => ['*']
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['start_datetime', 'end_datetime'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
        ];
    }
}

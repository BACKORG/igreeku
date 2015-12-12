<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%chapter}}".
 *
 * @property integer $id
 * @property integer $school_id
 * @property string $name
 * @property integer $type
 *
 * @property Schools $school
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chapter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(Schools::className(), ['id' => 'school_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%schools}}".
 *
 * @property integer $id
 * @property string $shortname
 * @property string $fullname
 *
 * @property Chapter[] $chapters
 */
class Schools extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%schools}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname'], 'string'],
            [['shortname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortname' => 'Shortname',
            'fullname' => 'Fullname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['school_id' => 'id']);
    }
}

<?php

namespace app\modules\traidavto\models;

use Yii;
use yii\db\Query;

class ImageAvto extends \yii\db\ActiveRecord {

    /**
     * Изображение
     * @var file
     */
    public $imageFiles;

    public function rules() {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 7, 'maxSize' => 8000000],
        ];
    }

    public function attributeLabels() {
        return [
            'imageFiles' => 'Загрузите фотографию авто',
        ];
    }

    public function upload() {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

}

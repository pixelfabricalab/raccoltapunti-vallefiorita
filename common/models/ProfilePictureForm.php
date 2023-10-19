<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class ProfilePictureForm extends Model
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate() && !is_null($this->imageFile)) {
            $this->filename = Yii::getAlias('@runtime') . '/uploads/' . Yii::$app->getSecurity()->generateRandomString(16) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->filename);
            return true;
        } else if (is_null($this->imageFile) && $this->id) {
            return true;
        } else {
            return false;
        }
    }

}

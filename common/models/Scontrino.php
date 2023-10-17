<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * This is the model class for table "scontrino".
 *
 * @property int $id
 * @property int|null $profilo_id
 * @property string|null $content
 * @property string|null $creato_il
 * @property string|null $modificato_il
 *
 * @property Profilo $profilo
 */
class Scontrino extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scontrino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profilo_id'], 'integer'],
            [['content', 'filename'], 'string'],
            [['creato_il', 'modificato_il'], 'safe'],
            [['profilo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profilo::class, 'targetAttribute' => ['profilo_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function getResized($w = 100, $h = 100, $crop=FALSE) {
        if (!$this->filename) {
            return null;
        }
        list($width, $height) = getimagesize($this->filename);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefromjpeg($this->filename);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
        ob_start (); 

        imagejpeg ($dst);
        $image_data = ob_get_contents (); 

        ob_end_clean (); 

        $image_data_base64 = base64_encode($image_data);

        return $image_data_base64;
    }

    public function getItems()
    {
        if (!$this->articoli) {
            return [];
        } else {
            return Json::decode($this->articoli);
        }
        return [];
    }

    public function analyze()
    {
        if ($this->content) {
            $content = Json::decode($this->content);
            if (is_array($content) && isset($content['receipts']) && is_array($content['receipts']) && !empty($content['receipts'])) {
                $scontrino = $content['receipts'][0];

                $this->ragione_sociale = $scontrino['merchant_name'];
                $this->partita_iva = $scontrino['merchant_tax_reg_no'];
                
                if (isset($scontrino['items']) && is_array($scontrino['items']) && !empty($scontrino['items'])) {
                    $this->articoli = Json::encode($scontrino['items']);
                }
            }
        }
    }

    public function getFileEncode()
    {
        $fileEncode = base64_encode(file_get_contents($this->filename));
        return $fileEncode;
    }

    public function getFileData()
    {
        $fileData = exif_read_data($this->filename);
        return $fileData;
    }

    public function getMimeType()
    {
        return $this->fileData['MimeType'];
    }

    public function upload()
    {
        if ($this->validate()) {
            /* Vecchia implementazione
            $fileparams = [];
            $filename = $this->imageFile->baseName;
            $mimetype = $this->imageFile->type;
            $size = $this->imageFile->size;
            $extension = $this->imageFile->extension;
            $tmpfilename = $this->imageFile->tempName;
            $upload_date = date('d-m-Y H:i:s');
            $hashfilename = hash('sha256', $filename . time());
            $this->imageFile->saveAs($base . $hashfilename . '.' . $extension);
            $fileparams = ['filename' => $filename, 'tempName' => $tmpfilename, 'mimetype' => $mimetype, 'size' => $size, 'extension' => $extension, 'hashfilename' => $hashfilename];
            $logcontent = "Upload \n ============== \n\n nomefile: ". $filename. "\n nometemporaneo: ". $tmpfilename ."\n tipo file: ". $mimetype . "\n dimensione: " . $size . "\n estensione: " . $extension . "\n hashnomefile: ". $hashfilename . "\n data upload: ". $upload_date ."\n\n =================\n";
            $logger->logUpload($logcontent);
            return $fileparams;
            */
            $this->filename = Yii::getAlias('@runtime') . '/uploads/' . Yii::$app->getSecurity()->generateRandomString(16) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->filename);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profilo_id' => 'Profilo ID',
            'content' => 'Content',
            'creato_il' => 'Creato Il',
            'modificato_il' => 'Modificato Il',
        ];
    }

    /**
     * Gets query for [[Profilo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfilo()
    {
        return $this->hasOne(Profilo::class, ['id' => 'profilo_id']);
    }
}

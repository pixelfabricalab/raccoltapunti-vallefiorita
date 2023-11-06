<?php
/** @var yii\web\View $this */
$this->title = 'Notifiche e alert';
?>
<h6>Installazione</h6>

<p>
    <?php if (!file_exists(\Yii::getAlias('@webroot/../../frontend/runtime/uploads'))) : ?>
        <div class="alert alert-warning">Creare la cartella /frontend/runtime/uploads</div>
    <?php endif; ?>
    <?php if (!file_exists(\Yii::getAlias('@webroot/../runtime/uploads'))) : ?>
        <div class="alert alert-warning">Creare la cartella /backend/runtime/uploads</div>
    <?php endif; ?>
    <?php if (!file_exists(\Yii::getAlias('@webroot/../../common/runtime/uploads'))) : ?>
        <div class="alert alert-warning">Creare la cartella /common/runtime/uploads</div>
    <?php endif; ?>
</p>

<?php // phpinfo(); ?>

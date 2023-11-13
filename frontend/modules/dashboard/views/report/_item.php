
    <div class="d-flex w-100 justify-content-between">
      <h6 class="text-info mb-0"><?= $model['titolo'] ?></h6>
      <!--
      <small class="font-weight-bold <?= (isset($model['negative']) && $model['negative']) ? 'text-danger' : 'text-success' ?>">
        <?= (isset($model['negative']) && $model['negative']) ? '-' : '+' ?> <?= rand(1, 200) ?> PUNTI</small>
        -->
    </div>
    <small><?= $model['descrizione'] ?></small>

<?php 
$this->title = "Dashboard";
$profilo = isset(\Yii::$app->user->identity->profilo) && \Yii::$app->user->identity->profilo ? \Yii::$app->user->identity->profilo : null;
?>
<div class="dashboard-default-index">
    <div class="emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-5 col-md-12">
                                            <div class="profile-img">
                                                <img class="img-fluid" src="<?= \Yii::getAlias('@web/images/ryan.jpg') ?>" alt=""/>
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-12">
                                            <?php if ($profilo) : ?>
                                            <h5 class="text-info mt-2 mb-0">
                                                <?= $profilo->nomeCompleto ?>
                                            </h5>
                                            <small><?= $profilo->professione ?></small>
                                            <div class="d-block d-sm-none">SALDO PUNTI<br><strong class="h4 text-success font-weight-bold">670</strong></div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <p><?= (isset($profilo->bio) && $profilo->bio) ? $profilo->bio : '' ?></p>
                                </div>
                                <div class="col-md-7">
                                    <div class="profile-head mb-4">
                                        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profilo-tab" data-toggle="tab" href="#profilo" role="tab" aria-controls="profilo" aria-selected="true">Profilo</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="attivita-tab" data-toggle="tab" href="#attivita" role="tab" aria-controls="attivita" aria-selected="false">Attivit&agrave;</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profilo" role="tabpanel" aria-labelledby="profilo-tab">
                                            <?php if ($profilo) : ?>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome utente</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>mario.rossi</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nome completo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $profilo->nomeCompleto ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= \Yii::$app->user->identity->email ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tel.</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $profilo->cellulare ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Professione</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $profilo->professione ?></p>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="tab-pane fade" id="attivita" role="tabpanel" aria-labelledby="attivita-tab">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Livello attuale</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>7</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Avanzamento livello</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><span class="text-success">670</span> / <span class="text-info">1000</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Scontrini caricati</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $profilo->numScontrini ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Valore medio scontrino</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>45,00 €</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Articoli censiti</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>120</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Valore ultimo scontrino</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>230,00 €</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Premi riscossi</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>5</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="text-center">SALDO PUNTI<br><strong class="h4 text-success font-weight-bold">670</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col-12 col-md-8">
                <hr />
                <?= $this->render('_premi') ?>
                <hr />
                <?= $this->render('_attivita') ?>
            </div>
        </div>
    </div>
</div>

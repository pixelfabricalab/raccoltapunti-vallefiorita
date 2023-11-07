<?php 
$this->title = "Dashboard";
$profilo = isset(\Yii::$app->user->identity->profilo) && \Yii::$app->user->identity->profilo ? \Yii::$app->user->identity->profilo : null;
?>
<div class="dashboard-default-index">
    <div class="emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-12 col-lg-10 col-xl-8">
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
                                            <div class="text-center">
                                                <?php if ($profilo) : ?>
                                                <h5 class="text-info mt-2 mb-0">
                                                    <?= $profilo->nomeCompleto ?>
                                                </h5>
                                                <?php if ($profilo->professione) : ?>
                                                <small><?= $profilo->professione ?></small>
                                                <?php endif; ?>
                                                <div class="d-block d-sm-none">NUM. SCONTRINI<br><strong class="h4 text-success font-weight-bold"><?= ($profilo) ? $profilo->numScontrini : '' ?></strong></div>
                                                <?php endif; ?>
                                            </div>
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
                                                    <p><?= ($profilo) ? $profilo->cellulare : '' ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Professione</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= ($profilo) ? $profilo->professione : '' ?></p>
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
                                                    <p><?= ($profilo) ? $profilo->livello : 0 ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Avanzamento livello</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><span class="text-success"><?= ($profilo) ? $profilo->numScontrini : '' ?></span> / <span class="text-info">1000</span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Valore medio scontrino</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= ($profilo) ? $profilo->valoreMedioScontrini : '' ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Coupon Richiesti</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= ($profilo) ? $profilo->numCoupon : '' ?></p>
                                                </div>
                                            </div>
                                            <!--
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
                                                    <p>0</p>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="text-center">NUM. SCONTRINI<br><strong class="h4 text-success font-weight-bold"><?= ($profilo) ? $profilo->numScontrini : '' ?></strong></div>
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
                <?= $this->render('_coupon') ?>
                <?php if (false) : ?>
                <hr />
                <?= $this->render('_attivita') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

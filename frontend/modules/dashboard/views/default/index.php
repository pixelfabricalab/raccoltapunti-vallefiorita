<?php 
$this->title = "Dashboard";
?>
<div class="dashboard-default-index">
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-img">
                                        <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="profile-head">
                                        <h5 class="text-info">
                                            <?= \Yii::$app->user->identity->profilo->nomeCompleto ?>
                                        </h5>
                                        <h6>
                                            <?= \Yii::$app->user->identity->profilo->professione ?>
                                        </h6>
                                        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profilo-tab" data-toggle="tab" href="#profilo" role="tab" aria-controls="profilo" aria-selected="true">Profilo</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="attivita-tab" data-toggle="tab" href="#attivita" role="tab" aria-controls="attivita" aria-selected="false">Attivit&agrave;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-center">SALDO PUNTI<br><strong class="h4 text-success font-weight-bold">670</strong></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <hr />
                                    <h6 class="h6 font-weight-bold">Bio</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at mauris venenatis arcu luctus gravida fringilla at metus. Duis semper placerat leo, at commodo justo convallis a. </p>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profilo" role="tabpanel" aria-labelledby="profilo-tab">
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
                                                    <p><?= \Yii::$app->user->identity->profilo->nomeCompleto ?></p>
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
                                                    <p><?= \Yii::$app->user->identity->profilo->cellulare ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Professione</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= \Yii::$app->user->identity->profilo->professione ?></p>
                                                </div>
                                            </div>
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
                                                    <p>11</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <div class="row">
            <div class="col">
                <hr />
                <?= $this->render('_premi') ?>
                <hr />
                <?= $this->render('_attivita') ?>
            </div>
        </div>
    </div>
</div>

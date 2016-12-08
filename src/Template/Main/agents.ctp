<div class="container cadres">
    <div class="row">
        <div class="col-md-12">
            <h1>Découvrez l'équipe <span style="font-weight: 100">JunGle immobilier</span></h1>
            <div class="equipe clearfix">
                <h2>Le fondateur</h2>
                <div class="col-md-4">
                    <div class="pull-left cadre">
                        <div class="information">
                            <span class="nom">JOSEPH<br>GALLIOT</span><br><br>Gérant Fondateur
                        </div>
                        <img src="<?= PATH_ADMIN . '/img/agents/joseph.jpg' ?>"
                             alt="JOSEPH - GALLIOT Gérant Fondateur">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="citation">
                        « Le meilleur moyen de prédire le futur c’est de le créer » – <span class="pull-right">Peter Drucker</span>
                    </div>
                </div>
            </div>

            <div class="equipe clearfix">
                <h2>Nos collaborateurs</h2>

                <?php foreach ($agents as $agent): ?>
                <div class="pull-left cadre">
                    <div class="information">
                        <span class="nom"><?= $agent->last_name ?><br><?= $agent->first_name ?></span><br><br><?= $agent->description ?>
                    </div>
                    <img src="<?= PATH_ADMIN . '/img/agents/'.$agent->photo ?>" alt="<?= $agent->last_name ?> - <?= $agent->first_name ?> <?= $agent->description ?>">
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

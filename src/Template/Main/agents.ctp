<div style="text-align:center;">
<?php
foreach ($resultsAgents as $agent):
    ?>

    <div class="agent text-center">
        <div class="agent-title"><?= $agent->last_name . ' ' . $agent->first_name ?></div>
        <div class="agent-content">
            <div class="agent-photo">
                <?= $this->Html->image('/img/agents/' . $agent->photo) ?>
            </div>
            <div class="agent-description"><?= $agent->description ?></div>
        </div>
        <div class="agent-information">21 ventes</div>
    </div>


<?php endforeach; ?>
</div>

<div class="btn-group">
    <button type="button" class="btn btn-info"><?= __('Actions') ?></button>
    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><?= $this->Html->link(__('List Biens'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="margin-bottom"></div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ajouter un nouveau bien</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?= $this->Form->create($bien, array('type' => 'file')) ?>
    <div class="box-body">
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Indiquez un titre', 'label' => 'Titre']); ?></div>
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('price', ['class' => 'form-control', 'placeholder' => 'Indiquez un prix', 'label' => 'Prix']); ?></div>
        <div class="form-group col-lg-6 col-sm-6 col-sx-6">
            <?= $this->Form->label('Secteurs'); ?>
            <?= $this->Form->select('secteur_id', $secteurs, ['empty' => '(Sélectionnez un secteur)', 'class' => 'form-control']); ?></div>
        <div class="form-group col-lg-6 col-sm-6 col-sx-6">
            <?= $this->Form->label('Villes'); ?>
            <?= $this->Form->select('town_id', $townSelect, ['empty' => '(Sélectionnez une ville)', 'class' => 'form-control']); ?></div>
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('room', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de chambre', 'label' => 'Chambres']); ?></div>
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('kitchen', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de cuisines', 'label' => 'Cuisines']); ?></div>
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('shower', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de salles de bain', 'label' => 'Salle de bains']); ?></div>
        <div
            class="form-group col-lg-6 col-sm-6 col-sx-6"><?= $this->Form->input('parking', ['class' => 'form-control', 'placeholder' => 'Indiquez le nombre de parking', 'label' => 'Parkings']); ?></div>
        <div class="form-group col-lg-6 col-sm-6 col-sx-6">
            <?= $this->Form->label('Dpe'); ?>
            <?= $this->Form->select('dpe_id', $dpes, ['empty' => '(Sélectionnez un dpe)', 'class' => 'form-control']); ?>
        </div>
        <div class="form-group col-lg-6 col-sm-6 col-sx-6">
            <?= $this->Form->label('Agents'); ?>
            <?= $this->Form->select('agent_id', $agentSelect, ['empty' => '(Sélectionnez un agent)', 'class' => 'form-control']); ?>
        </div>

        <div
            class="form-group col-lg-12 col-sm-12 col-sx-12"><?= $this->Form->textarea('description', ['class' => 'form-control', 'placeholder' => 'Indiquez une description', 'label' => 'Description']); ?></div>


        <div class="form-group col-lg-12 col-sm-12 col-sx-12">
            <div class="form-group col-lg-4 col-sm-4 col-sx-4">
                <?= $this->Form->label('Type de bien'); ?>
                <div class="btn-group" data-toggle="buttons" id="type_of_bien">
                    <label class="btn btn-default">
                        <input name="type_of_bien" value="1" type="radio" checked="checked">Maison
                    </label>
                    <label class="btn btn-default">
                        <input name="type_of_bien" value="2" type="radio">Appartement
                    </label>
                    <label class="btn btn-default">
                        <input name="type_of_bien" value="3" type="radio">Immeuble
                    </label>
                    <label class="btn btn-default">
                        <input name="type_of_bien" value="4" type="radio">Terrain
                    </label>
                    <label class="btn btn-default">
                        <input name="type_of_bien" value="5" type="radio">Propriété
                    </label>
                </div>
            </div>

            <div class="form-group col-lg-4 col-sm-4 col-sx-4">
                <?= $this->Form->label('Offre'); ?>
                <div class="btn-group" data-toggle="buttons" id="offer">
                    <label class="btn btn-default">
                        <input name="offer" value="1" type="radio">A vendre
                    </label>
                    <label class="btn btn-default">
                        <input name="offer" value="2" type="radio">A louer
                    </label>
                    <label class="btn btn-default">
                        <input name="offer" value="3" type="radio">En viager
                    </label>
                </div>
            </div>
            <div class="form-group col-lg-4 col-sm-4 col-sx-4">
                <?= $this->Form->label('En ligne ?'); ?>
                <?= $this->Form->checkbox('online', [
                    'id' => 'online',
                    'data-toggle' => 'toggle',
                    'data-on' => 'Visible en ligne',
                    'data-off' => 'Non visible en ligne',
                    'data-height' => '40px',
                    'data-width' => '150px',
                    'data-onstyle' => 'success',
                    'data-offstyle' => 'danger',
                ]); ?>
            </div>
        </div>
        <div class="form-group list-img-biens">
            <?= $this->Form->hidden('list_image_id', ['id' => 'list_image_id']); ?>
            <?= $this->Form->label('Images'); ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Ajouter des images
            </button>
            <ul id="list-img"></ul>
        </div>


        <!-- /.box-body -->

        <div class="box-footer">
            <?= $this->Form->button(__('Enregistrer'), ["class" => "btn btn-primary"]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <?= $this->Flash->render() ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ajouter des photos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group file-upload" id="uploadImages">
                        <!--<?= $this->Form->label('Image'); ?>

                        <?= $this->Form->input('image_file', array('type' => 'file')); ?>-->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <?php echo $this->Html->css('/admin/css/dropzone.css'); ?>
    <?php echo $this->Html->css('/admin/css/custom.css'); ?>
    <?php echo $this->Html->css('/admin/css/bootstrap2-toggle.min.css'); ?>
    <?php echo $this->Html->script('/admin/js/bootstrap/bootstrap2-toggle.min', ['block' => 'scriptBottom']); ?>
    <?php echo $this->Html->script('/admin/js/tinymce/tinymce.min.js', ['block' => 'scriptBottom']); ?>
    <?php echo $this->Html->script('/admin/js/dropzone.js', ['block' => 'scriptBottom']); ?>
    <?php echo $this->Html->script('/admin/js/biens.js', ['block' => 'scriptBottom']); ?>

<?php $this->Html->scriptBlock("tinymce.init({ selector:'textarea',menubar: false});", ['block' => 'scriptBottom']); ?>
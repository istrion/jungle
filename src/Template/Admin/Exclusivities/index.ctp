<?= $this->Html->link("Exporter les données", ['action' => 'exportExclu'], ['class' => "btn btn-primary"]) ?>

<div class="exclusivities index large-9 medium-8 columns content">
    <h3><?= __('Exclusivities') ?></h3>


    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Nom Prénom
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Email
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Téléphone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($exclusivities as $exclusivity): ?>
                                    <tr role="row">
                                        <td><?= h($exclusivity->name) ?></td>
                                        <td><?= h($exclusivity->email) ?></td>
                                        <td><?= h($exclusivity->telephone) ?></td>
                                        <td class="actions">
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exclusivity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exclusivity->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status"
                                 aria-live="polite"><?= $this->Paginator->counter() ?></div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


</div>
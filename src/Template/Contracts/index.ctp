<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Contracts

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="GET">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('worker_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('subcontractor_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($contracts as $contract): ?>
                <tr>
                  <td><?= $this->Number->format($contract->id) ?></td>
                  <td><?= h($contract->type) ?></td>
                  <td><?= h($contract->start_date) ?></td>
                  <td><?= h($contract->end_date) ?></td>
                  <td><?= $contract->has('worker') ? $this->Html->link($contract->worker->full_name, ['controller' => 'Workers', 'action' => 'view', $contract->worker->id]) : '' ?></td>
                  <td><?= $contract->has('subcontractor') ? $this->Html->link($contract->subcontractor->id_name, ['controller' => 'Subcontractors', 'action' => 'view', $contract->subcontractor->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $contract->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contract->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
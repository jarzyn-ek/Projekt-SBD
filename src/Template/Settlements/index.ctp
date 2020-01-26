<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Settlements

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
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
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
                  <th scope="col"><?= $this->Paginator->sort('charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('payment_due') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('contract_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('budget_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($settlements as $settlement): ?>
                <tr>
                  <td><?= $this->Number->format($settlement->id) ?></td>
                  <td><?= $this->Number->format($settlement->charge) ?></td>
                  <td><?= h($settlement->payment_due) ?></td>
                  <td><?= $settlement->has('contract') ? $this->Html->link($settlement->contract->id, ['controller' => 'Contracts', 'action' => 'view', $settlement->contract->id]) : '' ?></td>
                  <td><?= $settlement->has('budget') ? $this->Html->link($settlement->budget->id, ['controller' => 'Budgets', 'action' => 'view', $settlement->budget->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $settlement->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $settlement->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $settlement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settlement->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
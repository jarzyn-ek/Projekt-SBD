<section class="content-header">
  <h1>
    Contract
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Type') ?></dt>
            <dd><?= h($contract->type) ?></dd>
            <dt scope="row"><?= __('Worker') ?></dt>
            <dd><?= $contract->has('worker') ? $this->Html->link($contract->worker->id, ['controller' => 'Workers', 'action' => 'view', $contract->worker->id]) : '' ?></dd>
            <dt scope="row"><?= __('Subcontractor') ?></dt>
            <dd><?= $contract->has('subcontractor') ? $this->Html->link($contract->subcontractor->name, ['controller' => 'Subcontractors', 'action' => 'view', $contract->subcontractor->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($contract->id) ?></dd>
            <dt scope="row"><?= __('Start Date') ?></dt>
            <dd><?= h($contract->start_date) ?></dd>
            <dt scope="row"><?= __('End Date') ?></dt>
            <dd><?= h($contract->end_date) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Settlements') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($contract->settlements)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Charge') ?></th>
                    <th scope="col"><?= __('Payment Due') ?></th>
                    <th scope="col"><?= __('Contract Id') ?></th>
                    <th scope="col"><?= __('Budget Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($contract->settlements as $settlements): ?>
              <tr>
                    <td><?= h($settlements->id) ?></td>
                    <td><?= h($settlements->charge) ?></td>
                    <td><?= h($settlements->payment_due) ?></td>
                    <td><?= h($settlements->contract_id) ?></td>
                    <td><?= h($settlements->budget_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Settlements', 'action' => 'view', $settlements->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Settlements', 'action' => 'edit', $settlements->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Settlements', 'action' => 'delete', $settlements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $settlements->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

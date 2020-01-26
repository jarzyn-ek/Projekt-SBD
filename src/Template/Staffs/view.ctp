<section class="content-header">
  <h1>
    Staff
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
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($staff->name) ?></dd>
            <dt scope="row"><?= __('Department') ?></dt>
            <dd><?= $staff->has('department') ? $this->Html->link($staff->department->name, ['controller' => 'Departments', 'action' => 'view', $staff->department->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($staff->id) ?></dd>
            <dt scope="row"><?= __('Income') ?></dt>
            <dd><?= $this->Number->format($staff->income) ?></dd>
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
          <h3 class="box-title"><?= __('Workers') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($staff->workers)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Pesel') ?></th>
                    <th scope="col"><?= __('Staff Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($staff->workers as $workers): ?>
              <tr>
                    <td><?= h($workers->id) ?></td>
                    <td><?= h($workers->first_name) ?></td>
                    <td><?= h($workers->last_name) ?></td>
                    <td><?= h($workers->pesel) ?></td>
                    <td><?= h($workers->staff_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Workers', 'action' => 'view', $workers->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Workers', 'action' => 'edit', $workers->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workers', 'action' => 'delete', $workers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workers->id), 'class'=>'btn btn-danger btn-xs']) ?>
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

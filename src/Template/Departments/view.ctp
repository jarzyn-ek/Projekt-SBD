<section class="content-header">
  <h1>
    Department
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
            <dd><?= h($department->name) ?></dd>
            <dt scope="row"><?= __('Company') ?></dt>
            <dd><?= $department->has('company') ? $this->Html->link($department->company->name, ['controller' => 'Companies', 'action' => 'view', $department->company->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($department->id) ?></dd>
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
          <h3 class="box-title"><?= __('Budgets') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($department->budgets)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Resources') ?></th>
                    <th scope="col"><?= __('Expenses') ?></th>
                    <th scope="col"><?= __('Project Id') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($department->budgets as $budgets): ?>
              <tr>
                    <td><?= h($budgets->id) ?></td>
                    <td><?= h($budgets->resources) ?></td>
                    <td><?= h($budgets->expenses) ?></td>
                    <td><?= h($budgets->project_id) ?></td>
                    <td><?= h($budgets->department_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Budgets', 'action' => 'view', $budgets->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Budgets', 'action' => 'edit', $budgets->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Budgets', 'action' => 'delete', $budgets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $budgets->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Jobs') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($department->jobs)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Basic Salary') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($department->jobs as $jobs): ?>
              <tr>
                    <td><?= h($jobs->id) ?></td>
                    <td><?= h($jobs->name) ?></td>
                    <td><?= h($jobs->basic_salary) ?></td>
                    <td><?= h($jobs->department_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Staffs') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($department->staffs)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Income') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($department->staffs as $staffs): ?>
              <tr>
                    <td><?= h($staffs->id) ?></td>
                    <td><?= h($staffs->name) ?></td>
                    <td><?= h($staffs->income) ?></td>
                    <td><?= h($staffs->department_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Staffs', 'action' => 'view', $staffs->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Staffs', 'action' => 'edit', $staffs->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Staffs', 'action' => 'delete', $staffs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffs->id), 'class'=>'btn btn-danger btn-xs']) ?>
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

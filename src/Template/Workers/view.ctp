<section class="content-header">
  <h1>
    Worker
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
            <dt scope="row"><?= __('First Name') ?></dt>
            <dd><?= h($worker->first_name) ?></dd>
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($worker->last_name) ?></dd>
            <dt scope="row"><?= __('Pesel') ?></dt>
            <dd><?= h($worker->pesel) ?></dd>
            <dt scope="row"><?= __('Staff') ?></dt>
            <dd><?= $worker->has('staff') ? $this->Html->link($worker->staff->name, ['controller' => 'Staffs', 'action' => 'view', $worker->staff->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($worker->id) ?></dd>
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
          <h3 class="box-title"><?= __('Projects') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($worker->projects)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Start Date') ?></th>
                    <th scope="col"><?= __('End Date') ?></th>
                    <th scope="col"><?= __('Expected Profit') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($worker->projects as $projects): ?>
              <tr>
                    <td><?= h($projects->id) ?></td>
                    <td><?= h($projects->name) ?></td>
                    <td><?= h($projects->start_date) ?></td>
                    <td><?= h($projects->end_date) ?></td>
                    <td><?= h($projects->expected_profit) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
          <?php if (!empty($worker->jobs)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Basic Salary') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($worker->jobs as $jobs): ?>
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
          <h3 class="box-title"><?= __('Contracts') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($worker->contracts)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Type') ?></th>
                    <th scope="col"><?= __('Start Date') ?></th>
                    <th scope="col"><?= __('End Date') ?></th>
                    <th scope="col"><?= __('Worker Id') ?></th>
                    <th scope="col"><?= __('Subcontractor Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($worker->contracts as $contracts): ?>
              <tr>
                    <td><?= h($contracts->id) ?></td>
                    <td><?= h($contracts->type) ?></td>
                    <td><?= h($contracts->start_date) ?></td>
                    <td><?= h($contracts->end_date) ?></td>
                    <td><?= h($contracts->worker_id) ?></td>
                    <td><?= h($contracts->subcontractor_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id), 'class'=>'btn btn-danger btn-xs']) ?>
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

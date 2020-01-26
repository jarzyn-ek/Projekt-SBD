<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Project
        <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i
                    class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('Form'); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($project, ['role' => 'form']); ?>
                <div class="box-body">
                    <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('daterange', ['type' => 'text', 'class' => 'form-control daterange-picker']);
                    echo $this->Form->control('expected_profit');
                    echo $this->Form->control('workers._ids', ['options' => $workers, 'multiple' => true]);
                    echo $this->Form->control('subcontractors._ids', ['options' => $subcontractors, 'multiple' => true]);
                    ?>
                </div>
                <!-- /.box-body -->

                <?php echo $this->Form->submit(__('Submit')); ?>

                <?php echo $this->Form->end(); ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

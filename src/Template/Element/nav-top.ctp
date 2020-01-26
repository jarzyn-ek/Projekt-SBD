<?php use Cake\Core\Configure; ?>
<nav class="navbar navbar-static-top">

  <?php if (isset($layout) && $layout == 'top'): ?>
  <div class="container">

    <div class="navbar-header">
      <a href="<?php echo $this->Url->build('/'); ?>" class="navbar-brand"><?php echo Configure::read('Theme.logo.large') ?></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>
    <!-- /.navbar-collapse -->
  <?php else: ?>

    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

  <?php endif; ?>
  </div>

  <?php if (isset($layout) && $layout == 'top'): ?>
  </div>
  <?php endif; ?>
</nav>

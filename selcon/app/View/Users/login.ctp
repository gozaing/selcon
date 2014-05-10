
<!-- <div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav pull-right">
        <?php
          if(isset($user)):
            echo "<li><a href='logout'>ログアウト</a></li>";
          else:
            echo "<li><a href='register'>新規登録</a></li>";
          endif;
        ?>
      </ul>
      <ul class="nav pull-right">
        <li><a href="#">準備中</a></li>
      </ul>
    </div>
   </div>
</div>
 -->

<div class="container" style="padding-top: 60px;">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<!-- <div id="header_menu">
  <?php
    if(isset($user)):
      echo $this->Html->link('ログアウト', '/users/logout');
    else:
      echo $this->Html->link('新規登録', '/users/register');
    endif;
    ?>
</div>
 -->




<?php echo $this->Form->create('User', array(
  'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
  ),
  'class' => 'well'
)); ?>
  <fieldset>
    <legend>Login</legend>
    <?php echo $this->Form->input('username', array(
      'label' => 'Username',
      'placeholder' => 'enter name',
      'after' => '<span class="help-block">example</span>'
    )); ?>
    <?php echo $this->Form->input('password', array(
      'label' => 'Password',
      'placeholder' => 'enter password',
      'after' => '<span class="help-block">example</span>'
    )); ?>
    <?php echo $this->Form->submit('Submit', array(
      'div' => false,
      'class' => 'btn btn-default'
    )); ?>
  </fieldset>
<?php echo $this->Form->end(); ?>

</div>
</div>
</div>

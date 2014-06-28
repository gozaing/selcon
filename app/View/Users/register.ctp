<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="navbar-brand" href="/users/login">SelCon</a>
    <div class="container">
      <ul class="nav pull-right">
        <?php
          if(isset($user)):
            echo "<li><a href='logout'>LogOut</a></li>";
          else:
            echo "<li><a href='register'>NewAccount</a></li>";
          endif;
        ?>
      </ul>
      <ul class="nav pull-right">
        <li><a href="#">Coming Soon</a></li>
      </ul>
    </div>
   </div>
</div>

<div class="container" style="padding-top: 60px;">

<div class="row">
<div class="col-md-8 col-md-offset-2">


<?php echo $this->Form->create('User', array(
  'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
  ),
  'class' => 'well',
  'novalidate' => true
)); ?>
  <fieldset>
    <legend>NewAccount</legend>
    <?php echo $this->Form->input('username', array(
      'label' => 'Name',
      'placeholder' => 'enter name',
      'after' => '<span class="help-block"></span>'
    )); ?>
    <?php echo $this->Form->input('password', array(
      'label' => 'Password',
      'placeholder' => 'enter password',
      'after' => '<span class="help-block"></span>'
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


<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="navbar-brand" href="#">SelCon</a>
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
  'class' => 'well'
)); ?>
  <fieldset>
    <legend>Login</legend>
    <?php echo $this->Form->input('username', array(
      //'required'=>false,
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

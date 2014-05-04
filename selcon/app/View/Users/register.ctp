
<div class="container">

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
    <legend>New Account</legend>
    <?php echo $this->Form->input('username', array(
      'label' => 'Username',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>'
    )); ?>
    <?php echo $this->Form->input('password', array(
      'label' => 'Password',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>'
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


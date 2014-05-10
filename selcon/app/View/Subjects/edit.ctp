
<div class="container" style="padding-top: 60px;">

<div class="row">
<div class="col-md-8 col-md-offset-2">


<?php echo $this->Form->create('Subject', array(
  'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
  ),
  'class' => 'well'
)); ?>
  <fieldset>
    <legend>Edit Subject</legend>
    <?php echo $this->Form->input('title', array(
      'label' => 'title',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>'
    )); ?>
    <?php echo $this->Form->input('body', array(
      'label' => 'body',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>',
      'rows' => '3'
    )); ?>
    <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
    <?php echo $this->Form->submit('Submit', array(
      'div' => false,
      'class' => 'btn btn-default'
    )); ?>
  </fieldset>
<?php echo $this->Form->end(); ?>

</div>
</div>
</div>





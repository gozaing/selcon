<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="navbar-brand" href="/selcon/subjects">SelCon</a>
    <div class="container">
      <ul class="nav pull-right">
        <?php
          if(isset($user)):
            echo "<li><a href='/selcon/users/logout'>LogOut</a></li>";
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


<?php echo $this->Form->create('Subject', array(
  'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
  ),
  'class' => 'well'
)); ?>
  <fieldset>
    <legend>Add Talk</legend>
    <?php echo $this->Form->input('title', array(
      'label' => 'Talk',
      'placeholder' => 'enter talk',
      'after' => '<span class="help-block"></span>'
    )); ?>
    <?php echo $this->Form->input('body', array(
      'label' => 'TalkMemo',
      'placeholder' => 'enter talkmemo',
      'after' => '<span class="help-block"></span>',
      'rows' => '3'
    )); ?>
    <?php echo $this->Form->submit('Add', array(
      'div' => false,
      'class' => 'btn btn-default'
    )); ?>
  </fieldset>
<?php echo $this->Form->end(); ?>

</div>
</div>
</div>




<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="navbar-brand" href="/selcon/subjects">SelCon</a>
    <div class="container">
      <ul class="nav pull-right">
        <?php
          if(isset($user)):
            echo "<li><a href='/selcon/users/logout'>ログアウト</a></li>";
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
    <legend>Add Subject</legend>
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
    <?php echo $this->Form->submit('Submit', array(
      'div' => false,
      'class' => 'btn btn-default'
    )); ?>
  </fieldset>
<?php echo $this->Form->end(); ?>

</div>
</div>
</div>




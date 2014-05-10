
<?php echo $this->Html->css('box'); ?>

<div class="container" style="padding-top: 60px;">

<div class="row">
<div class="col-md-8 col-md-offset-2">

<?php
echo $this->Html->Link(
       'Back to Subject',
       array('controller' => 'subjects',
             'action' => 'index')
       );
?>


<h2><?php echo h($subject['Subject']['title']); ?></h2>
<p><?php echo h($subject['Subject']['body']); ?></p>



<div class="container">

<div class="row">
<div class="col-md-8 col-md-offset-2">


<?php foreach( $subject['Comment'] as $comment ):?>
    <div class="wrapper">

        <?php
        if ( $comment['commenter'] == "1" ):
            echo "<div class='box-A'>";
        else :
            echo "<div class='box-B'>";
        endif;
        ?>
            <?php echo h($options[$comment['commenter']]) ?>
            <?php echo nl2br($comment['body']) ?>
            <?php
                echo $this->Form->postLink('delete' ,
                                           array('controller' => 'comments' , 'action' => 'delete' , $comment['subject_id'],$comment['id'] ),
                                           array('confirm' => 'Are you sure?')
                                            );
            ?>
        </div>
    </div>
<?php endforeach?>



</div>
</div>
</div>

<div class="container">

<div class="row">
<div class="col-md-8 col-md-offset-2">


<?php echo $this->Form->create('Comment', array(
  'action' => 'add',
  'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
  ),
  'class' => 'well'
)); ?>
  <fieldset>
    <legend>Add Comment</legend>

    <?php
echo $this->Form->input('commenter', array(
  'div'=>false,
  'label'=>false,
  'options'=>$options));
?>


<!--     <?php echo $this->Form->input('commenter', array(
      'label' => 'commenter',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>'
    )); ?>
 -->    <?php echo $this->Form->input('body', array(
      'label' => 'body',
      'rows' => '3',
      'placeholder' => 'Type something…',
      'after' => '<span class="help-block">Example block-level help text here.</span>'
    )); ?>
    <?php echo $this->Form->input('Comment.subject_id', array(
      'type'=>'hidden', 'value'=> $subject['Subject']['id']
    )); ?>

  </fieldset>
<?php echo $this->Form->end('Comment',array('action' => 'add')); ?>

</div>
</div>
</div>

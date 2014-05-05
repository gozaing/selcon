
<?php echo $this->Html->css('box'); ?>

<div class="container">

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

<h2>Comment</h2>
<table class="table table-striped table-bordered table-hover">
<thead style="background-color: #b7e5d6;">
  <tr>
    <th><?php echo "Commenter";?></th>
    <th><?php echo "Body";?></th>
    <th><?php echo "編集";?></th>
  </tr>
</thead>
<tbody>
<?php foreach( $subject['Comment'] as $comment ):?>
  <tr>
    <td><?php echo h($options[$comment['commenter']]) ?></td>
    <td><?php echo nl2br($comment['body']) ?></td>
    <td><?php
                echo $this->Form->postLink('delete' ,
                                           array('controller' => 'comments' , 'action' => 'delete' , $comment['subject_id'],$comment['id'] ),
                                           array('confirm' => 'Are you sure?')
                                            );
            ?>
    </td>
  </tr>
<?php endforeach?>
</tbody>
</table>

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

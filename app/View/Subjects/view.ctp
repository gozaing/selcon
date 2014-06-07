
<?php echo $this->Html->css('box'); ?>

<script type="text/javascript">
        window.onload = function(){
          // ページ読み込み時に最下部まで移動
          window.scroll(0,document.body.scrollHeight);
        }
</script>


<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <a class="navbar-brand" href="/subjects">SelCon</a>
    <div class="container">
      <ul class="nav pull-right">
        <?php
          if(isset($user)):
            echo "<li><a href='/users/logout'>LogOut</a></li>";
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

<h2><?php echo h($subject['Subject']['title']); ?></h2>
<p><?php echo h($subject['Subject']['body']); ?></p>



<div class="container">

<div class="row">
<div class="col-md-8 col-md-offset-2">


<?php foreach( $subject['Comment'] as $comment ):?>
    <div class="wrapper" id="comment_<?php echo h($comment['id']); ?>" >

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
                echo $this->Html->link('delete-ajax',
                                       '#',
                                       array('class'=>'delete',
                                             'data-subject-id' => $comment['subject_id'],
                                             'data-comment-id' => $comment['id']
                                             )
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
  'class' => 'well',
  'novalidate' => true,
)); ?>
  <fieldset>
    <legend>Add Comment</legend>

<?php
  // echo $this->Form->input('commenter', array(
  //                                           'legend'=>false,
  //                                           'type'=>'radio',
  //                                           'options'=>$options,
  //                                           'div' => 'radio-horizontal',
  //                                           'style' => 'float:none;'
  //                                           )
  //                         );
?>
<?php
//$options = array('1' => '(A)', '2' => '(B)');
$attributes = array('legend' => false,'value'=>'1');
echo $this->Form->radio('commenter', $options, $attributes);
?>

    <?php echo $this->Form->input('body', array(
        'label' => 'Comment',
        'rows' => '3',
        'placeholder' => 'enter comment',
        'after' => '<span class="help-block"></span>'
      )

    ); ?>
    <?php //echo $this->Form->error('Comment.body',null,array('error'=>false)) ?>
    <?php echo $this->Form->input('Comment.subject_id', array(
      'type'=>'hidden', 'value'=> $subject['Subject']['id']
    )); ?>

  </fieldset>
<?php echo $this->Form->end('Add Comment',array('action' => 'add')); ?>

</div>
</div>
</div>

<script>
$(function(){
  $('a.delete').click(function(e){
    if(confirm('Are You Sure Delete Comment ?')) {
      $.post('/comments/delete/'+$(this).data('subject-id')+'/'+$(this).data('comment-id'),{},function(res) {
        $('#comment_'+res.id).fadeOut();
      }, "json");
    }
    return false;
  });
});
</script>

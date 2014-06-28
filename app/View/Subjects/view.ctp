
<?php echo $this->Html->css('box'); ?>
<?php //$this->AjaxValidation->active(); ?>

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
<div id="comentbody" class="col-md-8 col-md-offset-2">


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
                echo $this->Html->link('delete',
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

<fieldset>
  <legend id='comentlabel'>Add Comment</legend>

<?php

    $data = $this->Js->get('#CommentAddForm')->serializeForm(array('isForm' => true, 'inline' => true));
    $this->Js->get('#CommentAddForm')->event(
          'submit',
          $this->Js->request(
            array(
                  'action' => '../comments/add'
                  ),
            array(
                    'update' => '#commentStatus',
                    'data' => $data,
                    'async' => true,    
                    'dataExpression'=>true,
                    'method' => 'POST',
                    //'success'=> "test();"
                )
            )
        );
    echo $this->Form->create('Comment', array(
      'action' => 'add',
      'inputDefaults' => array(
        'div' => 'form-group',
        'wrapInput' => false,
        'class' => 'form-control'
      ),
      'class' => 'well',
      'novalidate' => true,
      'default' => false
    ));
    $attributes = array('legend' => false,'value'=>'1');
    echo $this->Form->radio('commenter', $options, $attributes);
    echo $this->Form->input('body', array(
            'label' => 'Comment',
            'rows' => '3',
            'placeholder' => 'enter comment',
            'after' => '<span class="help-block"></span>'
          )

        );
    echo $this->Form->input('Comment.subject_id', array(
      'type'=>'hidden', 'value'=> $subject['Subject']['id']
    ));
    echo $this->Form->submit('Add Comment');
    echo $this->Form->end();
    echo $this->Js->writeBuffer();

?>

</fieldset>

</div>
</div>
</div>

<div id="commentStatus">
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

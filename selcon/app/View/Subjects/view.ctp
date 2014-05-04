
<?php
echo $this->Html->Link(
       'Back to Subject',
       array('controller' => 'subjects',
             'action' => 'index')
       );
?>


<h1><?php echo h($subject['Subject']['title']); ?></h1>

<p>
    <small>
        created: <?php echo $subject['Subject']['created']; ?>
    </small>
</p>
<p><?php echo h($subject['Subject']['body']); ?></p>

<h2>Comment</h2>

<table>
    <tr>
        <td>commenter</td>
        <td>body</td>
    </tr>
    <?php foreach ( $subject['Comment'] as $comment ): ?>
    <tr>
        <td>
            <?php echo h($comment['commenter']); ?>

            <?php echo h($comment['id']); ?>

            <?php
                echo $this->Form->postLink('delete' ,
                                           array('controller' => 'comments' , 'action' => 'delete' , $comment['subject_id'],$comment['id'] ),
                                           array('confirm' => 'Are you sure?')
                                            );
            ?>
        </td>
        <td>
                <?php echo h($comment['body']); ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>

<h2>Add Comment</h2>
<?php
echo $this->Form->create('Comment',array('action' => 'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body',array('rows' => 3));
echo $this->Form->input('Comment.subject_id' , array('type'=>'hidden', 'value'=> $subject['Subject']['id']));
echo $this->Form->end('Comment',array('action' => 'add'));
?>

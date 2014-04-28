<!-- File: /app/View/Posts/index.ctp -->
<h1>Subject</h1>

<?php
echo $this->Html->Link(
       'Add Post',
       array('controller' => 'subjects',
             'action' => 'add')
       );
?>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
    <?php echo var_dump($Subjects); ?>

    <?php foreach ($Subjects as $subject): ?>
    <tr>
        <td><?php echo $subject['Subject']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($subject['Subject']['title'], array('controller' => 'subjects',
                                'action' => 'view',
                                $subject['Subject']['id'])); ?>
        </td>
        <td>
            <?php
                echo $this->Html->link('Edit',array('controller' => 'subjects',
                                                    'action' => 'edit',
                                                    $subject['Subject']['id']));
            ?>
            <?php
                echo $this->Form->postLink('delete' ,
                                           array('action' => 'delete' , $subject['Subject']['id']),
                                           array('confirm' => 'Are you sure?')
                                        );
            ?>
        </td>


        <td><?php echo $subject['Subject']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
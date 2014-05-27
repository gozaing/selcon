<!-- File: /app/View/Posts/index.ctp -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <a class="navbar-brand" href="#">SelCon</a>
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

<div class="container"  style="padding-top: 60px;">
<h2>Talk</h2>


<?php echo $this->Paginator->pagination(array('ul' => 'pagination')); ?>


<div>
<?php

echo $this->Html->Link(
       'Add Talk',
       array('controller' => 'subjects',
             'action' => 'add')
       );
?>
</div>

<table class="table table-striped table-bordered table-hover">
<thead style="background-color: #b7e5d6;">
  <tr>
    <th><?php echo "Talk"; ?></th>
    <th><?php echo "TalkMemo"; ?></th>
    <th><?php echo "Create"; ?></th>
    <th><?php echo "Modify"; ?></th>

  </tr>
</thead>
<tbody>
<?php foreach($Subjects as $subject):?>
  <tr>
    <th><?php echo $this->Html->link($subject['Subject']['title'], array('controller' => 'subjects',
                                'action' => 'view',
                                $subject['Subject']['id'])); ?></th>
    <td><?php echo nl2br($subject['Subject']['body']) ?></td>
    <td><?php echo h($subject['Subject']['created'])?></td>
    <td>            <?php
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
  </tr>
<?php endforeach?>
</tbody>
</table>
<?php echo $this->Paginator->pager(array(
  'prev' => __('prev'),
  'next' => __('next')
)); ?>
</div>
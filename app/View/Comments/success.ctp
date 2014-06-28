<?php
if (!empty( $valerror['body'])){
    for($i=0; $i<count( $valerror['body']); $i++){
        echo $valerror['body'][$i];
    }
} else {
    //echo h( $this->request->data['Comment']['data']);
}

$this->log('success.ctp-pass', 'debug');
$this->log('param_comment_id->'.$last_id, 'debug');


//$this->log('success->'. $this->request->data['Comment']['data'], 'debug');
//var_dump($this->request->data);
$this->log($this->request->data, 'debug');

$this->log($this->request->data['Comment']['subject_id'], 'debug');
$this->log($this->request->data['Comment']['body'], 'debug');
$this->log($this->request->data['Comment']['commenter'], 'debug');

$sub_id = $this->request->data['Comment']['subject_id'] ;
$body = $this->request->data['Comment']['body'] ;
$commenter = $this->request->data['Comment']['commenter'] ;

$box = "";
$boxName = "";
if ($commenter == 1 ) {
    $box = "box-A";
    $boxName = "( A ) ";
} else {
    $box = "box-B";
    $boxName = "( B )";
}

?>

<script>
$(function(){
    $('#comentbody').append("<div class='wrapper' id=comment_<?php echo $last_id; ?> ><div class='<?php echo $box; ?>'><?php echo $boxName.$body; ?><a href='#' class='delete' data-subject-id='<?php echo $sub_id; ?>' data-comment-id='<?php echo $last_id; ?>' onClick='test(arguments[0])' >  delete</a></div>");

    // init input form
    $('commenter').value =1;
    $('#CommentBody').val('');
    $('#CommentCommenter1').attr("checked", true);
    $('#CommentBody').select();
        
    // event remove and add
    $('a.delete').unbind('click');
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

<?php

$alertText = "";
if (!empty( $valerror['body'])){
    for($i=0; $i<count( $valerror['body']); $i++){
        $alertText = $valerror['body'][$i];

    }
} else {
    //echo h( $this->request->data['Comment']['data']);
}

$this->log('error.ctp-pass', 'debug');

?>
<script>
$(function(){
    alert('<?php echo $alertText; ?>');
});
</script>

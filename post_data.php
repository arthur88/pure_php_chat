<?php
require_once("GameEngine/inc/class.chat.php"); 

$ch = new chat;

if(($_SERVER['REQUEST_METHOD'] === "POST") && isset($_POST['message'])){
       $if_inserted =  $ch->insert_new_message($session->uid, $_POST['message']);
       if($if_inserted == TRUE){   echo $lang['writed']; } else { echo $lang['error']; }    
}
?>
<div id="chat">
<?php $b = 1; ?>      
<?php for($i=0; $i < count($chat_messages['uID']); $i++): ?>
  
    <div class="chat_item">
        <div class="chat_num"><?php echo $ch->safe($b + $i); ?>.</div>
        <div class="chat_cred">
            (<?php echo $ch->safe(date("m-d H:i", date($chat_messages['time'][$i]))); ?>)
              <strong><?php echo $ch->multi->userID($ch->safe($chat_messages['uID'][$i])); ?></strong>     
        </div>    
        <div class="chat_mess"><?php echo $ch->safe($chat_messages['mess'][$i]); ?></div>
    </div>
<?php endfor; ?>
</div>
 

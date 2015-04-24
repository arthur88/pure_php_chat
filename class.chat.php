<?php require_once('class.boot.php'); 
/**
 * Chat class for managing items with chat messagesystem
 *
 * @author arturas
 */
class chat extends boot{
    protected $usr_id;
    protected $var;

    function insert_new_message($usr_id, $var){
        $q = "INSERT INTO ".TB_PREFIX."chat_global_messages (user_id, message, time) VALUES ('".$this->safe($usr_id)."', '".$this->safe($var)."', '".$this->safe(strtotime(date("Y-m-d H:i")))."' )";
        $query = mysql_query($q);
        if($query == TRUE){ return TRUE; } else { return FALSE; }  
    }
    
    function last_100_messages(){
        $q = "SELECT user_id, message, time FROM ".TB_PREFIX."chat_global_messages ORDER BY id DESC LIMIT 100";
        $query = mysql_query($q) OR DIE(mysql_error());
        if(mysql_numrows($query) > 0){
            
            while ($row = mysql_fetch_assoc($query)) {
                $user_id[] = $this->safeDB($row['user_id']);
                $message[] = $this->safeDB($row['message']);
                $time[] = $this->safeDB($row['time']);
            }
            
            return array("uID" => $user_id, "mess" => $message, "time" => $time); 
        } else { return FALSE; }
    }
    
    function __destruct() {  mysql_close(); }
            
}


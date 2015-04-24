<?php 
    require_once("header.php");   
    require_once("GameEngine/inc/class.chat.php");
    $ch = new chat();
    
?>

<div id="wrapper">
  <div id="chatbox"></div>
  <form method="POST" id="form_id">
     <input name="message" type="text" id="usermsg" size="63" placeholder="<?php echo $boot->safe($lang['enter_message'])?>"/>
    <input name="submit" type="button"  id="submit" value="Send" /> 
  </form>


</div>
<script src="js/jquery.js"></script>
<script>window.setInterval("refreshChat()",1000); </script>
<script type="text/javascript">  
   $(function () {
        $('#form_id').on('click','#submit', function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "post_data.php",
                data: $('#form_id').serialize(),
                success: function(data) {
                    //alert(data);
                    document.getElementById('usermsg').value = '';
                }
            });
            return false;
        });
    });
    
    
function refreshChat()
{
      $.ajax({
          type: "POST",
          url: "post_data.php",
           success: function(msg){
                $("#chatbox").html(msg);
           }
      });
} 
</script>

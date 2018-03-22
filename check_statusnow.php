<?php
include("conn.php");
session_start();
if($_SESSION['id']=="")
{ ?>
<script>
window.top.location.href = "http://portal.progressive.in/web/guest/home?p_p_state=maximized&p_p_mode=view&saveLastPath=0&_58_struts_action=%2Flogin%2Flogin&p_p_id=58&p_p_lifecycle=0&_58_redirect=%2Fweb%2Fprocare%2Farf";
</script>
<?php } ?>

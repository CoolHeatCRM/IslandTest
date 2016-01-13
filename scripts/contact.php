<?php
 require('Twilio.php');
// ==== Control Vars =======
 $custName = $_POST["name"];
$strFromNumber = "+16138007340";
$strToNumber = $_POST["cellphone"];
$strMsg = "Hey! Thank you from Cool Heat. We will get back to you ASAP!";  
$aryResponse = array();
 
    // set our AccountSid and AuthToken - from www.twilio.com/user/account
    $AccountSid = "AC56336699792326710f6bf1096dadb5a4";
    $AuthToken = "fc56d43927e04b1b5331394472ebcc97";

 
    // ini a new Twilio Rest Client
    $objConnection = new Services_Twilio($AccountSid, $AuthToken);
   

    // Send a new outgoinging SMS by POSTing to the SMS resource

    $bSuccess = $objConnection->account->sms_messages->create(
        
        $strFromNumber,     // number we are sending from 
        $strToNumber,           // number we are sending to
        $strMsg         // the sms body
    );
	
    echo "<script type='text/javascript'>
      document.body.innerHTML = '';
      </script>";
    echo "Assigning $numleft / 95 numbers!<br>";
    ob_end_flush();
    flush();
   
    $aryResponse["SentMsg"] = $strMsg;
    $aryResponse["Success"] = true;
    
    echo json_encode($aryResponse);
?>


<?php 

ini_set('display_errors', 1);  
     $xml_str =  "<ENVELOPE>" .  
    "<HEADER>" .   
    "<TALLYREQUEST>Export Data</TALLYREQUEST>" .  
    "</HEADER>" .  
    "<BODY>" .  
    "<EXPORTDATA>" .  
    "<REQUESTDESC>" .  
    "<REPORTNAME>List of Accounts</REPORTNAME>" .  
    "<STATICVARIABLES>" .  
    "<SVEXPORTFORMAT>\$\$SysName:XML</SVEXPORTFORMAT>" .  
    "<ACCOUNTTYPE>Employees</ACCOUNTTYPE>" .  
    "<!--Other possible values for ACCOUNTTYPE tag are given below-->" .  
    "<!--All Acctg. Masters, All Inventory Masters,All Statutory Masters-->" .  
    "<!--Ledgers,Groups,Cost Categories,Cost Centres-->" .  
    "<!--Units,Godowns,Stock Items,Stock Groups,Stock Categories-->" .  
    "<!--Voucher types,Currencies,Employees,Budgets & Scenarios-->" .  
    "</STATICVARIABLES>" .  
    "</REQUESTDESC>" .  
    "</EXPORTDATA>" .  
    "</BODY>" .  
    "</ENVELOPE>";   

 $url = "http://localhost:9000";
 $headers = array("Content-type: text/xml", "Content-length:" . strlen($xml_str), "Connection: close");

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_TIMEOUT, 100);
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_str);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 $data = curl_exec($ch);
 
 if(curl_errno($ch)) {
  print curl_error($ch);  
 } else {
  print "<pre>" . htmlentities($data) . "</pre>";
  curl_close($ch);
 }

?>
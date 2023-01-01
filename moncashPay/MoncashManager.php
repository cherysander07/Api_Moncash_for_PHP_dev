<?php

 class MoncashPayment {
public string $clientId;
public string $clientSecret;
 public bool $isLive;
 public int $amount;
 public string $orderId;
 private string $token;

 

    public function generateToken(){
        $clientId = $this->clientId;
        $clientSecret = $this->clientSecret;
        $isLive = $this->isLive;
if($isLive) {
        $url = "https://$clientId:$clientSecret@moncashbutton.digicelgroup.com/Api/oauth/token?scope=read,write&grant_type=client_credentials";
} else {
  $url = "https://$clientId:$clientSecret@sandbox.moncashbutton.digicelgroup.com/Api/oauth/token?scope=read,write&grant_type=client_credentials";
}
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
           "Content-Type: application/json"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp =  json_decode(curl_exec($curl), TRUE);
        
        curl_close($curl);
        return $this->token = $resp['access_token'];
            }


    public function postPayment() {
      $isLive = $this->isLive;
      if($isLive) {
        $url = "https://moncashbutton.digicelgroup.com/Api/v1/CreatePayment";
      } else {
        $url = "https://sandbox.moncashbutton.digicelgroup.com/Api/v1/CreatePayment";
      }
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers = array(
        "Accept: application/json",
          "Content-Type: application/json",
           "Authorization: Bearer $this->token"
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $data = <<<DATA
        {
          "amount": $this->amount,
          "orderId": $this->orderId
        }
        DATA;
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
        
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp =  json_decode(curl_exec($curl), TRUE); 
        curl_close($curl);
        if($isLive) {
        return "https://moncashbutton.digicelgroup.com/Moncash-middleware/Payment/Redirect?token=".$resp['payment_token']['token'];
        } else {
          return "https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware/Payment/Redirect?token=".$resp['payment_token']['token'];

        } 
      }



 // =======================================================

 public function getDetailsOfTransaction($transactionId) {
  $isLive = $this->isLive;
  if($isLive) {
  $url = "https://moncashbutton.digicelgroup.com/Api/v1/RetrieveTransactionPayment";
  } else {
    $url = "https://sandbox.moncashbutton.digicelgroup.com/Api/v1/RetrieveTransactionPayment";

  }
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
  $headers = array(
  "Accept: application/json",
    "Content-Type: application/json",
     "Authorization: Bearer $this->token"
  );
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  
  $data = <<<DATA
  {
    "transactionId": $transactionId
  }
  DATA;
  
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  
  
  //for debug only!
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  $resp =  json_decode(curl_exec($curl), TRUE);
  
  curl_close($curl);
  var_dump($resp);
  return $resp['payment']['reference'];
      }
















 }


?>
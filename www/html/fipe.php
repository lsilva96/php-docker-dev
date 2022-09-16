<?php

$_ARGS[0] = "59";
// $_ARGS[1] = "5940";
// $_ARGS[2] = "2014-3";

// $_ARGS[0] = "";
$_ARGS[1] = "";
$_ARGS[2] = "";

$retfipe = fipecars($_ARGS[0], $_ARGS[1], $_ARGS[2]);
echo "<pre>";
print_r($retfipe);
  
   function fipecars($marca, $modelo, $ano) {    

      if(!empty($marca)){
         $url = 'marcas/'.$marca.'/modelos';      
         if(!empty($modelo)){
            $url .= '/'.$modelo.'/anos';
            if(!empty($ano)){
               $url .= '/'.$ano;
              
            };
         };
      }else{
         $url3 = 'marcas';      
      }      

      echo $url;
      
      $ch = curl_init();     

      if(!empty($url)){
         curl_setopt($ch, CURLOPT_URL, 'https://parallelum.com.br/fipe/api/v1/carros/'.$url.'');       
      }
      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

      $data = curl_exec($ch);       

      if(curl_errno($ch) > 0){
         $retorno['error'] = 1;
      }else{
         $retorno['error'] = 0;
         $retorno['data'] =  $data;
      }    
      
     curl_close($ch);

     return $retorno;
   }  
<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
<!-- Google fonts API -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Merriweather:300,700,700italic,300italic|Open+Sans:700,400|Montserrat:400,700">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:700" rel="stylesheet">
<!-- Font Awesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Meta tag for responsive site-->  
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Bootstrap CSS -->    
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
<!-- Custom CSS -->

<link rel="stylesheet" type="text/css" href="/p5/style.css">
        <title>PHP Currency Converter</title>
    
    </head>
    <body>
       
         <div class="container">
        <div class="card card-container">
           
            <img id="logo"  src="/p5/img/currency.png" />
            <h2>Currency Converter</h2>
            <form class="form-signin">
               
                <h3>Amount:</h3>
                <input type="text" name="amount" id="amount" value="1">
                <h3>Convert From:</h3>
                    <select name="convertFrom" id="convertFrom">
                        <option value="USD">USD - US Dollar</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="CNY">CNY - Chinese Yuan Renminbi</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="EUR" selected>EUR - Euro</option>
                        <option value="INR">INR - Indian Rupee</option>
                    </select>
                
                <h3>Convert To:</h3>
                     <select name="convertTo" id="convertTo">
                        <option value="USD" selected>USD - US Dollar</option>
                        <option value="CAD">CAD - Canadian Dollar</option>
                        <option value="CNY">CNY - Chinese Yuan Renminbi</option>
                        <option value="JPY">JPY - Japanese Yen</option>
                        <option value="EUR">EUR - Euro</option>
                        <option value="INR">INR - Indian Rupee</option>
                    </select>
                 <div class="wrapper">
                    <span class="group-btn  col-lg-6">     
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="submit">Submit</button>
                    </span>
                     
                </div>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
    </div><!-- /container -->
       <div class="result">  
        <p>Conversion Result:</p>
       
       <?php

// set API Endpoint, access key, required parameters
$endpoint = 'latest';
$access_key = '04a09535186b934a322adfc6609ca934';

$from = 'EUR';


// Initialize CURL:
$ch = curl_init('http://data.fixer.io/api/latest?access_key='.$access_key.'&base=' . $from . '&symbols=EUR,USD,INR,CAD,JPY,CNY');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);
        
          
      
        
        if(isset($_GET['submit'])){
            $from = $_GET['convertFrom'];
            $to = $_GET['convertTo'];
            $amount = $_GET['amount'];
            $result;
         
            
            
            //Euro Conversion
            
            if($from == "EUR" && $to == "USD"){
         $result = $amount * $exchangeRates['rates']['USD'];
            }else if($from == "EUR" && $to == "CAD"){
                $result = $amount * $exchangeRates['rates']['CAD'];
                }else if($from == "EUR" && $to == "CNY"){
                $result = $amount * $exchangeRates['rates']['CNY'];
                    }else if($from == "EUR" && $to == "JPY"){
                        $result = $amount * $exchangeRates['rates']['JPY'];
                            }else if($from == "EUR" && $to == "INR"){
                                $result = $amount * $exchangeRates['rates']['INR'];
                                    }
            
            //USD Conversion
            
             if($from == "USD" && $to == "CAD"){
        $result = $amount * $exchangeRates['rates']['CAD'];
            }else if($from == "USD" && $to == "EUR"){
               $result = $amount * ($exchangeRates['rates']['EUR']/ $exchangeRates['rates']['USD']);
                }else if($from == "USD" && $to == "CNY"){
                $result = $amount * $exchangeRates['rates']['CNY'];
                    }else if($from == "USD" && $to == "JPY"){
                        $result = $amount * $exchangeRates['rates']['JPY'];
                            }else if($from == "USD" && $to == "INR"){
                                $result = $amount * $exchangeRates['rates']['INR'];
                                    }
            
            //Canadian Conversion
            
              if($from == "CAD" && $to == "USD"){
        $result = $amount * $exchangeRates['rates']['USD'];
            }else if($from == "CAD" && $to == "EUR"){
                 $result = $amount * ($exchangeRates['rates']['EUR']/ $exchangeRates['rates']['CAD']);
                }else if($from == "CAD" && $to == "CNY"){
                $result = $amount * $exchangeRates['rates']['CNY'];
                    }else if($from == "CAD" && $to == "JPY"){
                        $result = $amount * $exchangeRates['rates']['JPY'];
                            }else if($from == "CAD" && $to == "INR"){
                                $result = $amount * $exchangeRates['rates']['INR'];
                                    }
            
            //Chinese Conversion
            
                  if($from == "CNY" && $to == "USD"){
        $result = $amount * $exchangeRates['rates']['USD'];
            }else if($from == "CNY" && $to == "EUR"){
               $result = $amount * ($exchangeRates['rates']['EUR']/ $exchangeRates['rates']['CNY']);
                }else if($from == "CNY" && $to == "CAD"){
                $result = $amount * $exchangeRates['rates']['CAD'];
                    }else if($from == "CNY" && $to == "JPY"){
                        $result = $amount * $exchangeRates['rates']['JPY'];
                            }else if($from == "CNY" && $to == "INR"){
                                $result = $amount * $exchangeRates['rates']['INR'];
                                    }
            
            //Japanese Conversion
            
                     if($from == "JPY" && $to == "USD"){
        $result = $amount * $exchangeRates['rates']['USD'];
            }else if($from == "JPY" && $to == "EUR"){
                $result = $amount * ($exchangeRates['rates']['EUR']/ $exchangeRates['rates']['JPY']);
                }else if($from == "JPY" && $to == "CAD"){
                $result = $amount * $exchangeRates['rates']['CAD'];
                    }else if($from == "JPY" && $to == "CNY"){
                        $result = $amount * $exchangeRates['rates']['CNY'];
                            }else if($from == "JPY" && $to == "INR"){
                                $result = $amount * $exchangeRates['rates']['INR'];
                                    }
            
            //Indian Conversion
            
                 if($from == "INR" && $to == "USD"){
        $result = $amount * $exchangeRates['rates']['USD'];
            }else if($from == "INR" && $to == "EUR"){
                $result = $amount * ($exchangeRates['rates']['EUR']/ $exchangeRates['rates']['INR']);
                }else if($from == "INR" && $to == "CAD"){
                $result = $amount * $exchangeRates['rates']['CAD'];
                    }else if($from == "INR" && $to == "CNY"){
                        $result = $amount * $exchangeRates['rates']['CNY'];
                            }else if($from == "INR" && $to == "JPY"){
                                $result = $amount * $exchangeRates['rates']['JPY'];
                                    }
            
            
            
            
              //Rounds result 
   $roundedResult = round($result, 3);
            
            //Output Results
   
    echo $amount, " ", $from, " = " ,$roundedResult, " ", $to;
            
            
        }
     
  
?>
        
  </div>   
        
    
    </body>





</html>
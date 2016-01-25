<?php

class GamePlace{
   
   public $winner='n';
   public  $box = array('','','','','','','','','');
   
   function ReadBoxState($xoarray){
    for ($i=0; $i<=8; $i++){
            $box[$i] = $xoarray["box"."$i"];
            
            }
            return $box;
       
    }
    
    function DrawBoxState($state){
       
        for ($i=0; $i<=8; $i++){
                   printf('<input type="text" name="box%s" value="%s"> ', $i, $state[$i]);
                   if ($i == 2 || $i==5 || $i ==8) {
                          print('<br>');  
                        }
                    }
        
        
    }
    
    function DrawZero($state){
       
         $i = rand() %8;
            while ($state[$i] != ''){
                $i = rand() % 8;
            }
       
            $state[$i] ='o';
      return $state;
       
    }
    
    function WhoWin($state, $xo) {
        
        if (($state[0]=="$xo" && $state[1]=="$xo" && $state[2]=="$xo")|| ($state[3]=="$xo" && $state[4]=="$xo" && $state[5]=="$xo")||
        ($state[6]=="$xo" && $state[7]=="$xo" && $state[8]=="$xo" )||($state[0]=="$xo" && $state[3]=="$xo" && $state[6]=="$xo" )||($state[1]=="$xo" && $state[4]=="$xo" && $state[7]=="$xo" )
        ||($state[2]=="$xo" && $state[5]=="$xo" && $state[8]=="$xo" )||($state[0]=="$xo" && $state[4]=="$xo" && $state[8]=="$xo" )||($state[2]=="$xo" && $state[4]=="$xo" && $state[6]=="$xo")){
            
            $winner = "$xo" ;
          return  print ("$xo "." wins!");
            
        }
        
        
        
    }
}






?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tic Tac Toe</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="container">
    <div class="row">
  

            <h1>Tic Tac Toe</h1>
            
            <form name="tictactoe" method="post" action="object.php">
             
                 <?php
                    
                    $newgame = new GamePlace();
                     
                    $stateplacegame= $newgame->ReadBoxState($_POST);
                    $stateplacegame = $newgame->DrawZero($stateplacegame); 
                    $newgame->DrawBoxState($stateplacegame);
                    print ('<input type="submit" name="submitbtn" value="Go" >');
                    $newgame->WhoWin($stateplacegame, 'x');
                    $newgame->WhoWin($stateplacegame, 'o');
                   
                     
                 ?>       
            
            </form>
        </div>
   </div>           

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
?>
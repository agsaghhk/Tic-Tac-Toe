<?php
   #Build the board
   fwrite(STDOUT, " ");
   fwrite(STDOUT, "|");
   fwrite(STDOUT, " ");
   fwrite(STDOUT, "|\n");
   fwrite(STDOUT, "-----\n");
   fwrite(STDOUT, " ");
   fwrite(STDOUT, "|");
   fwrite(STDOUT, " ");
   fwrite(STDOUT, "|\n");

   #parse user moves
   $move=fgets(STDIN);
   echo($move);
   echo((strlen($move)-2));
   echo("\n");

   #how to print portions of $move
   echo("\n");
   echo("\n");
   echo substr("1,3",0,1);
   echo("\n");
   echo substr("1,3",2,1);
   echo("\n");

   #creation of a 2d board
   $board=array(array(0,0,0),array(0,0,0),array(0,0,0));
   for($i=0; $i<count($board); $i++){
      for($I=0; $I<count($board[$i]) ; $I++){
         echo $board[$i][$I];
	 echo " ";
      }
      echo "\n";
   }
#############################################################
   #obtaining a user move
   $playerTurn=1;
   fprintf(STDOUT,"Player %d make a move:",$playerTurn);
   $move=fgets(STDIN);
   if(substr($move,0,1) < 1 || substr($move,2,1) > 3){
      fwrite(STDOUT,"Invalid Move. Please try again");
   }
   else{
      $x=substr($move,0,1)-1;
      $y=substr($move,2,1)-1;
      $board[$x][$y]=1;

   }
#############################################################   
   
   #print board after move process
   for($i=0; $i<count($board); $i++){
      for($I=0; $I<count($board[$i]) ; $I++){
         echo $board[$i][$I];
	 echo " ";
      }
      echo "\n";
   }
   
   #print formatted for user turns
/*   for($i=0; $i<count($board); $i++){
      for($I=0; $I<count($board[$i]) ; $I++){
         if( $board[$i][$I]==0){
	    echo " ";
	 }
	 else if( $board[$i][$I]==1){
	    echo "X";
	 }
	 else{
	    echo "O";
	 }
      }
      echo "\n";
   }*/



#parse movements for 5 part array
   /*$x=substr($move,0,1)-1;
               $y=substr($move,2,1)-1;
	       if($x===1){
	       }
	       elseif($x===2){
	       }
	       elseif($x===3){
	       }*/



   #make array 5x5 and even prints print | or -------
   $boards=array(array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0));
   for($z=0; $z<count($boards); $z++){
      if($z%2===1){
         echo "-----\n";
      }
      else{
         for($Z=0; $Z<count($boards[$z]) ; $Z++){
            if($Z%2===1){
	       echo "|";
	    }
	    else{
               
	       echo $boards[$z][$Z];
	    }
         }
         echo "\n";
      }
   }

   

?>

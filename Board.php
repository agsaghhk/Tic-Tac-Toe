<?php
      

   #create an empty board
   $boards=array(array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0));


   #parse movements for 5 part array
   $playerTurn=1;
   fprintf(STDOUT,"Player %d make a move:",$playerTurn);
   
   #get users move
   $move=fgets(STDIN);
   
   while(substr($move,0,1)!="q"){
	   
	   #used to determine if move was invalid
	   $invalid=0;
	   
	   #set up variables for indexed spaces
	   $space1=0;
	   $space2=2;
	   $space3=4;
	   
	   #check if user string is appropriate length
	   if(strlen($move)!=5){
	      
	      fwrite(STDERR,"Please enter move in the form #,#\n");
	      $invalid=1;
	   
	   }
	   
	   #check if user entered appropriate value(s)
	   elseif(substr($move,0,1) < 1 || substr($move,0,1) > 3 || substr($move,2,1) < 1 || substr($move,2,1) > 3){
	      
	      fwrite(STDERR,"Invalid Move, Numbers must be in 1-3. Please try again\n");
	      $invalid=1;
	   
	   }
	   
	   elseif(substr($move,1,1)!=","){
	      
	      fwrite(STDERR, "Please enter move in the form #,#\n");
	      $invalid=1;
	   
	   }
	   
	   #if given move is appropriate
	   else{
	      
	      #retrieve the specific numbers, maybe move above error checking?
	      $x=substr($move,0,1);
	      $y=substr($move,2,1);
	      
	      
	      if($x==1){
		 
		 #if user entered 1,1
		 if($y==1){
		    
		    if($boards[$space1][$space1]==0){
		       $boards[$space1][$space1]=$playerTurn;

		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 
		 }
		 
		 #if user entered 1,2
		 elseif($y==2){
		    
		    if($boards[$space1][$space2]==0){
		       $boards[$space1][$space2]=$playerTurn;

		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
		 
		 #if user entered 1,3
		 else{
		    
		    if($boards[$space1][$space3]==0){
		       $boards[$space1][$space3]=$playerTurn;

		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
	      
	      }
	      
	      elseif($x==2){
		 
		 #if user entered 2,1
		 if($y==1){
		    
		    if($boards[$space2][$space1]==0){
		       $boards[$space2][$space1]=$playerTurn;

		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
		 
		 #if user entered 2,2
		 elseif($y==2){
		    
		    if($boards[$space2][$space2]==0){
		       $boards[$space2][$space2]=$playerTurn;

		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
		 
		 #if user entered 2,3
		 else{
		    
		    if($boards[$space2][$space3]==0){
		       $boards[$space2][$space3]=$playerTurn;
;
		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
	      }
	      
	      else{
		 
		 #if user entered 3,1
		 if($y==1){
		    
		    if($boards[$space3][$space1]==0){
		       $boards[$space3][$space1]=$playerTurn;
		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
		 
		 #if user entered 3,2
		 elseif($y==2){
		    
		    if($boards[$space3][$space2]==0){
		       $boards[$space3][$space2]=$playerTurn;
		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
		 
		 #if user entered 3,3
		 else{
		    
		    if($boards[$space3][$space3]==0){
		       $boards[$space3][$space3]=$playerTurn;
		    }
		    else{
		       echo "Space already taken, please try again\n";
		       $invalid=1;
		    }
		 }
	      
	      }

	   }



	   #Code used to print out all elements of board in board format
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
		       
		       if($boards[$z][$Z]==1){
		          echo "X";
		       }
		       else if($boards[$z][$Z]==2){
		          echo "O";
		       }
		       else{
		          echo " ";
		       }
		       #echo $boards[$z][$Z];
		    }
		 }
		 echo "\n";
	      }
	   }

           if($invalid!=1){
	      if(($playerTurn+1)%2==0){
	         $playerTurn=2;
	      }
	      else{
	         $playerTurn=1;
	      }
	   }   
	   
	   if($boards[$space1][$space1]!=0){
	      $check=$boards[$space1][$space1];
	      if($boards[$space1][$space2]==$check And $boards[$space1][$space3]==$check){
	         echo "Game Over 1\n";
	      }
	      elseif($boards[$space2][$space2]==$check And $boards[$space3][$space3]==$check){
	         echo "Game Over 2\n";
              }
	      elseif($boards[$space2][$space1]==$check And $boards[$space3][$space1]==$check){
	         echo "Game Over 3\n";
	      }
	   }
	   if($boards[$space1][$space2]!=0){
	      $check=$boards[$space1][$space2];
	      if($boards[$space2][$space2]==$check And $boards[$space3][$space2]==$check){
	         echo "Game Over 4\n";
              }
	   }
	   if($boards[$space1][$space3]!=0){
	      $check=$boards[$space1][$space3];
	      if($boards[$space2][$space3]==$check And $boards[$space3][$space3]==$check){
	         echo "Game Over 5\n";
	      }
	      if($boards[$space2][$space2]==$check And $boards[$space3][$space1]==$check){
	         echo "Game Over 6\n";
	      }
	   }
	   if($boards[$space2][$space1]!=0){
	      $check=$boards[$space2][$space1];
	      if($boards[$space2][$space2]==$check And $boards[$space2][$space3]==$check){
	         echo "Game over 7\n";
              }
	   }
	   if($boards[$space3][$space1]!=0){
	      $check=$boards[$space3][$space1];
	      if($boards[$space3][$space2]==$check And $boards[$space3][$space3]==$check){
	         echo "Game Over 8\n";
	      }
	   }
	   if($boards[$space1][$space1]!=0 And $boards[$space1][$space2]!=0 And $boards[$space1][$space3]!=0 And
	      $boards[$space2][$space1]!=0 And $boards[$space2][$space2]!=0 And $boards[$space2][$space3]!=0 And
	      $boards[$space3][$space1]!=0 And $boards[$space3][$space2]!=0 And $boards[$space3][$space3]!=0){
	      echo "Game Over 9\n";
	   }
	   fprintf(STDOUT,"Player %d make a move:",$playerTurn);
	   $move=fgets(STDIN);
	}


   

?>

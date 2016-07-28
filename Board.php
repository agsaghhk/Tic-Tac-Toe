<?php
      

   #create an empty board
   $boards=array(array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0));


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
             }
	  }
          
	  echo "\n";
       }
    }
   
   #parse movements for 5 part array
   $playerTurn=1;
   fprintf(STDOUT,"Player %d make a move:",$playerTurn);
   
   #get users move
   $move=fgets(STDIN);
   
   #if user enters q exit game loop
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
	   
	   #if user doesnt enter in the form #,# print error
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
	      
	      #every other row print space seperation
	      if($z%2===1){
		 
		 echo "-----\n";
	      
	      }
	      
	      #otherwise print characters
	      else{
		 
		 for($Z=0; $Z<count($boards[$z]) ; $Z++){
		    
		    #every other space print board seperation
		    if($Z%2===1){
		       
		       echo "|";
		    
		    }
		    
		    else{
		       
		       #if player one print X
		       if($boards[$z][$Z]==1){
		          
			  echo "X";
		       
		       }
		       
		       #if player two prin O
		       else if($boards[$z][$Z]==2){
		          
			  echo "O";
		       
		       }
		       
		       #if unoccupied print space
		       else{
		          
			  echo " ";
		       
		       }
		    
		    }
		 
		 }
		
		#print new line to create rows
		echo "\n";
	      
	      }
	   
	   }

           #if valid move
	   if($invalid!=1){
	      
	      #if player two set turn to 2
	      if(($playerTurn+1)%2==0){
	         
		 $playerTurn=2;
	      
	      }
	      
	      #otherwise set turn to 1
	      else{
	         
		 $playerTurn=1;
	      
	      }
	   
	   }   
	   
	   #whole block of game over checks

	   #if first space occupied
	   if($boards[$space1][$space1]!=0){
	      
	      #store the space value
	      $check=$boards[$space1][$space1];
	      
	      #if three in a row to the right game over
	      if($boards[$space1][$space2]==$check And $boards[$space1][$space3]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
	      
	      }

	      #if three diagonally game over
	      elseif($boards[$space2][$space2]==$check And $boards[$space3][$space3]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
              
	      }
	      
	      #if three vertically game over
	      elseif($boards[$space2][$space1]==$check And $boards[$space3][$space1]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
	      
	      }
	   
	   }
	   
	   #if second space occupied
	   if($boards[$space1][$space2]!=0){
	      
	      #store space value
	      $check=$boards[$space1][$space2];
	      
	      #if three vertically game over
	      if($boards[$space2][$space2]==$check And $boards[$space3][$space2]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
              
	      }
	   
	   }
	   
	   #if third space occupied
	   if($boards[$space1][$space3]!=0){
	      
	      #store space value
	      $check=$boards[$space1][$space3];
	      
	      #if three vertically game over
	      if($boards[$space2][$space3]==$check And $boards[$space3][$space3]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
	      
	      }
	      
	      #if three diagonally game over
	      if($boards[$space2][$space2]==$check And $boards[$space3][$space1]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
	      
	      }
	   
	   }
	   
	   #if first space of second row occupied
	   if($boards[$space2][$space1]!=0){
	      
	      #store space value
	      $check=$boards[$space2][$space1];
	      
	      #if three horizontally game over
	      if($boards[$space2][$space2]==$check And $boards[$space2][$space3]==$check){
	         
		 echo "Game over player $check wins\n";
		 exit;
              
	      }
	   
	   }
	   
	   #if first space of third row occupied
	   if($boards[$space3][$space1]!=0){
	      
	      #store space value
	      $check=$boards[$space3][$space1];
	      
	      #if three horizontally game over
	      if($boards[$space3][$space2]==$check And $boards[$space3][$space3]==$check){
	         
		 echo "Game Over player $check wins\n";
		 exit;
	      
	      }
	   
	   }
	   
	   #if cat game game over
	   if($boards[$space1][$space1]!=0 And $boards[$space1][$space2]!=0 
	     And $boards[$space1][$space3]!=0 And $boards[$space2][$space1]!=0 
	     And $boards[$space2][$space2]!=0 And $boards[$space2][$space3]!=0
	     And $boards[$space3][$space1]!=0 And $boards[$space3][$space2]!=0 
	     And $boards[$space3][$space3]!=0){
	      
	      echo "Game Over. It's a tie.\n";
	      exit;
	   
	   }
	   
	   #if all game over checks false then go to next turn
	   fprintf(STDOUT,"Player %d make a move:",$playerTurn);
	   $move=fgets(STDIN);
	
	}


   

?>

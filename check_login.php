<?php
//Check if credentials are valid

session_start() ;

if(isset($_SESSION['username']) && isset($_SESSION['password'])) {


    echo 'Votre login est '.'  '.$_SESSION['username'].' '.' et votre mot de passe est ' .' '.$_SESSION['password'].'.';

}

else {

    echo "<style>
                  a {
                  pointer-events: none;
                  cursor: default;
                  text-decoration: none;
                  color: black;
                  }  
                  .logout, button, form {
                    
                    visibility: hidden;
                  
                  }
                 
         </style>" ;


}
<?php 

namespace App ;

class PasswordChecker{

    private string $password ;
    private int $length = 12 ;

    public function __construct(string $password)
    {
        
        $this->password = $password;
        
    }

    public function checkLength(){

        if (strlen($this->password) >= $this->length){
            
            return true ;

        }else{

            return false ;
        }

    }

}

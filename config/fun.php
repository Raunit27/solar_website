<?php

class fun
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

//    bd268

     public function enquiry_update($name, $email,$number,$message){
        $sql="INSERT INTO `enquiry_update`(`name`, `email`, `number`, `message`) VALUES ('$name','$email','$number','$message')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

}    
?>
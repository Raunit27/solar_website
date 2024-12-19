<?php

class fun 
{
    private $db;
    function __construct($con)
    {
        $this->db = $con;

    }

    //  new fun


    public function login($username,$password){
        
        $query    = "SELECT * FROM `owner_profile` WHERE `username`='$username' AND `password` = '".$password."';";
        $result = mysqli_query($this->db, $query);
        $rows = mysqli_num_rows($result);
        
        if ($rows == 1) {
            $fetch = mysqli_fetch_assoc($result);
                 return $fetch;
             // Redirect to user dashboard page 
         }
         else{
             //print_r($rows);
             return null;
         }
    }


    public function view_owner($id){
        $query="SELECT * FROM `owner_profile` WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return $result;
    }


    public function insert_client($name, $email, $mobile_number, $dob, $address, $description){
        $query="INSERT INTO `client_details` (`name`, `email`, `mobile_number`,`dob`, `address`,  `description`)  VALUES ('".$name."', '".$email."', '".$mobile_number."',
        '".$dob."', '".$address."', '".$description."')"; 
         $result = mysqli_query($this->db, $query);
         return $result;        
       }


       public function  view_client(){

        $query ="SELECT * FROM `client_details` ";
           
            $result = mysqli_query($this->db, $query);
                  return $result;
        }


        public function insert_photo($image){

            $query="INSERT INTO `photo_details`(`image`) VALUES ('".$image."')";
            $result = mysqli_query($this->db, $query);
            return $result;
        
           }


           public function  view_photos(){

            $query ="SELECT * FROM `photo_details` ";
               
                $result = mysqli_query($this->db, $query); 
                      return $result;
            }

            public function  fetch_photos($id){

                $query ="SELECT * FROM `photo_details` where `id`='$id' ";
                    $result = mysqli_query($this->db, $query);
                          return $result;
                }
            
            public function deletePhoto($id){
                $image=$this->fetch_photos($id);
                $image=mysqli_fetch_assoc($image);
                $image=$image['image'];
                $query="DELETE FROM `photo_details` WHERE id = $id";
                $result = mysqli_query($this->db, $query);
                if($result){
                    unlink("./images/gallery_images/$image");
                }
                return $result;
            }

               public function insert_staff($name, $email, $mobile_number, $alternate_mobile_number,  $address, $date_of_joining){
                $query ="INSERT INTO `staff_details`(`name`, `email`, `mobile_number`, `alternate_mobile_number`, `address`, `date_of_joining`) VALUES ('".$name."', '".$email."', '".$mobile_number."', '".$alternate_mobile_number."',  '".$address."', '".$date_of_joining."')";
                $result = mysqli_query($this->db, $query);
                return $result;
            }


            public function   view_staff(){

                $query ="SELECT * FROM `staff_details` ";
                   
                    $result = mysqli_query($this->db, $query);
                          return $result;
                } 


                public function view_client_payment(){
                    $query="SELECT * FROM `client_payment_details` ORDER BY id DESC";
                    $result = mysqli_query($this->db, $query);
                    return $result;
                }


                public function insert_client_payment($client_id, $client_name,$date ,$amount){
                    $sql="INSERT INTO `client_payment_details`(`client_id`, `client_name`, `date`, `amount`) VALUES ('$client_id','$client_name','$date','$amount')";
                    
                    //$date = date('Y-m-d');
                    $result = mysqli_query($this->db, $sql); 
                    return $result;
                }



                public function view_staff_payment(){
                    $query="SELECT * FROM `staff_payment_details` ORDER BY id DESC";
                    $result = mysqli_query($this->db, $query);
                    return $result;
                }

                public function insert_staff_payment($staff_id, $staff_name,$date ,$amount){
                    $sql="INSERT INTO `staff_payment_details`(`staff_id`, `staff_name`,`date`, `amount`) VALUES ('$staff_id','$staff_name','$date','$amount')";
                    $result = mysqli_query($this->db, $sql);
                    return $result;
                }

                public function update_owner($id,$name, $title, $company_name, $email, $phone, $website,$image='',$fblink,$instalink,$twitterlink,$username, $password){
                    if($image!=""){
                        $sql="UPDATE `owner_profile` SET `name`='$name',`title`='$title',`company_name`='$company_name',`email`='$email',`phone`='$phone',`website`=' $website',`image`='$image',`fblink`='$fblink',`instalink`='$instalink',`twitterlink`='$twitterlink',`username`='$username',`password`='$password' WHERE id = $id";
        
                    }
                   else{
                    $sql="UPDATE `owner_profile` SET `name`='$name',`title`=' $title',`company_name`='$company_name',`email`='$email',`phone`=' $phone',`website`=' $website',`fblink`='$fblink',`instalink`='$instalink',`twitterlink`='$twitterlink',`username`=' $username',`password`=' $password' WHERE id = $id";
                   }
                    $result = mysqli_query($this->db, $sql);
                    return $result;
                }

    
                public function edit_staff($id){

                    $query ="SELECT * FROM `staff_details` WHERE id = '$id'";
                       
                        $result = mysqli_query($this->db, $query);
                              return $result;
                }       
                
                
                public function update_staff($id,$name, $email, $mobile_number, $alternate_mobile_number, $address, $date_of_joining){
                    $sql="UPDATE `staff_details` SET `name`='$name',`email`='$email',`mobile_number`='$mobile_number',`alternate_mobile_number`='$alternate_mobile_number',`address`='$address',`date_of_joining`='$date_of_joining' WHERE id=$id";
                    $result = mysqli_query($this->db, $sql);
                    return $result;
                }


                public function  edit_client($id){

                    $query ="SELECT * FROM `client_details` WHERE id = '$id'";
                       
                        $result = mysqli_query($this->db, $query);
                              return $result;
                    }

                    public function update_client ($id,$name, $email, $mobile_number, $dob, $address,  $description) {
                        //check if the user already exists in the database
                        
                        $sql= "UPDATE client_details SET name='$name', email='$email', mobile_number='$mobile_number', dob='$dob', address='$address',  description='$description' WHERE id = $id";
                        $result = mysqli_query($this->db, $sql);
                        return $result;
                    } 

                    public function enquiry_update($name, $email,$number,$message){
                        $sql="INSERT INTO `enquiry_update`(`name`, `email`, `number`, `message`) VALUES ('$name','$email','$number','$message')";
                        $result = mysqli_query($this->db, $sql);
                        return $result;
                    }
                    
        

                    public function view_intrested_client(){
                        $sql="SELECT * FROM `enquiry_update` ORDER BY id DESC";
                        $result = mysqli_query($this->db, $sql);
                        return $result;
                    }



                    public function delete_intrested_client($id){
                        $sql="DELETE FROM `enquiry_update` WHERE id = $id";
                        $result = mysqli_query($this->db, $sql);
                        return $result;
                    }


                    public function deleteClient($id){
                        $query="DELETE FROM `client_details` WHERE id = $id";
                        $result = mysqli_query($this->db, $query);
                        return $result;
                    }

                    public function deleteStaff($id){
                        $query="DELETE FROM `staff_details` WHERE id = $id";
                        $result = mysqli_query($this->db, $query);
                        return $result;
                    }

                    public function insert_testimonial($name,$review,$newfilename){
                        $sql="INSERT INTO `testimonial`(`name`, `review`, `image`) VALUES ('$name','$review','$newfilename')";
                        $result = mysqli_query($this->db, $sql);
                        return $result;
                    }


                    public function  view_testimonial(){

                        $query ="SELECT * FROM `testimonial` ";
                           
                            $result = mysqli_query($this->db, $query);
                                  return $result;
                        }

                        
                      public function  fetch_testimonial_photos_details($id){

                     $query ="SELECT * FROM `testimonial` where `id`='$id' ";
                     $result = mysqli_query($this->db, $query);
                          return $result;
                     }


                    public function deleteTestimonial($id){
                        $image=$this->fetch_testimonial_photos_details($id);
                        $image=mysqli_fetch_assoc($image);
                        $image=$image['image'];
                        $query="DELETE FROM `testimonial` WHERE id = $id";
                        $result = mysqli_query($this->db, $query);
                        if($result){
                            unlink("./images/testimonial_images/$image");
                        }
                        return $result;
                    }













        
    
}

    
?>
<?php 
    session_start();
    include "config/db.php";
    include "config/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    $msg="";

   //    new submit 

   if(isset($_POST["client_submit"]))
   {
      
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile_number = $_POST['m_nuber'];
      $dob = $_POST['dob'];
      $address = $_POST['address'];
      $description = $_POST['discription'];
      
      

      if(empty($name) || empty($email) || empty($mobile_number) || empty($dob) || empty($address)  || empty($description) ){
       $msg = "All fields are required";
       echo $msg;
       header("Location:add_client.php?msg=$msg");
   }
   else{
        $result = $fun->insert_client($name, $email, $mobile_number, $dob, $address, $description);
       
      
       if ($result) {
          header('Location: add_client.php');
       }
    }
  
 }


 if(isset($_POST["photo_submit"]))
    {    
            if(isset($_FILES["image"]["name"])&& !empty($_FILES["image"]["name"])){

               $fileName = $name.time();
               $target_dir = "./images/gallery_images/";
               $target_file = $target_dir .basename($_FILES["image"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               $file_name = $target_dir ."$fileName.".$imageFileType;
                $newfilename=$fileName.".".$imageFileType;
               if(move_uploaded_file($_FILES["image"]["tmp_name"], $file_name)){
                   $image=$newfilename;
      
               $result = $fun->insert_photo($image);
               if ($result) {
                  header('Location:  add_photo.php');
               }
               else{
                   echo "error";
               }
             }else{
                 echo "error";
             }
         }
         //images
         else{
                  header('Location:  add_mana.php?msg=Password Not Match');
         }
    }


    if(isset($_POST["staff_submit"])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile_number = $_POST['m_nuber'];
      $alternate_mobile_number = $_POST['m_nuber_1'];
      
      $address = $_POST['address'];
      $date_of_joining = $_POST['doj'];

      if(empty($name) || empty($email) || empty($mobile_number) || empty($alternate_mobile_number)  || empty($address) || empty($date_of_joining)){
         $msg = "All fields are required";
         header("Location:add_staff.php?msg=$msg");
      }
      else{
      $result = $fun->insert_staff($name, $email, $mobile_number, $alternate_mobile_number,  $address, $date_of_joining);
      if ($result) {

         header('Location: add_staff.php');
      }else{
         echo"error";
      }
   }
   }


   if(isset($_POST['client_pay'])){
      // echo "string";
      
      $name= explode('|', $_POST['Client']); 
      $client_id=$name[0];
      $client_name=$name[1]; 
      $date=$_POST['date'];
      $amount=$_POST['amount'];

      if(empty($client_id) || empty($client_name)  || empty($date) || empty($amount)){
         $msg= "Enter All Fields";
         echo "$msg";
         header("location:client_payment.php?msg=$msg");
      }
      else{

      $result = $fun->insert_client_payment($client_id, $client_name,$date, $amount);
      if ($result) {
          $msg = "<div class='alert alert-success' role='alert'>Payment added successfully</div>";
          header("location:client_payment.php?msg=$msg");
          
      }else{
          $msg = "<div class='alert alert-danger' role='alert'>Payment not added</div>";
      }
  
  }
}


if(isset($_POST['staff_pay'])){
   // echo "string";
   
   $name= explode('|', $_POST['staff']); 
   $staff_id=$name[0];
   $staff_name=$name[1];
   $date=$_POST['date'];
   $amount=$_POST['amount'];

   if (empty($staff_id) || empty($staff_name) || empty($date) || empty($amount)) {
      $msg= "Enter All Fields";
      echo "$msg";
         header("location:staff_payment_details.php?msg=$msg");
      }
      else{
   $result = $fun->insert_staff_payment($staff_id,$staff_name,$date,$amount);
   if ($result) {
       $msg = "<div class='alert alert-success' role='alert'>Payment added successfully</div>";
       header("location:staff_payment_details.php?msg=$msg");
   }
   else{
       $msg = "<div class='alert alert-danger' role='alert'>Payment not added</div>";
   }
   }
      }


      if(isset($_POST["owner_edit_submit"])) {
         $id= $_POST['id'];
         $name = $_POST['name'];
         $title = $_POST['title'];
         $company_name = $_POST['company_name'];
         $email = $_POST['email'];
         $phone = $_POST['phone']; 
         $website = $_POST['website'];
         $fblink= $_POST['fblink'];
         $instalink= $_POST['instalink'];
         $twitterlink= $_POST['twitterlink'];
         $username=trim($_POST['userid']);
         $password=trim($_POST['pass']);
   
        if(empty($name) || empty($title) || empty($company_name) || empty($email) || empty($phone) || empty($website) || empty($fblink) || empty($instalink) || empty($twitterlink)|| empty($username) || empty($password)){
           $msg = "All fields are required";
           header("Location:owner_edit_profile.php?id=$id&msg=$msg");
        }
        else{
           //images
           if(isset($_FILES["image"]["name"])&& !empty($_FILES["image"]["name"])){
   
           $fileName = "owner";
           $target_dir = "./images/owner_images/";
           $target_file = $target_dir .basename($_FILES["image"]["name"]);
           $uploadOk = 1;
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           $file_name = $target_dir ."$fileName.".$imageFileType;
            $newfilename=$fileName.".".$imageFileType;
           if(move_uploaded_file($_FILES["image"]["tmp_name"], $file_name)){
            $result= $fun->update_owner($id,$name, $title, $company_name, $email, $phone, $website, $newfilename,$fblink,$instalink,$twitterlink,$username,$password);
            if ($result) {
               echo "<script>alert('Updated successfully');document.location='owner_profile.php' </script>";
            } else { 
               echo"error";
            }
           }
           else{
               $msg= "Enter All Fields";
               echo "$msg";
               header("location:owner_profile.php?msg=$msg");
            }
           }else{
               $result= $fun->update_owner($id,$name, $title, $company_name, $email, $phone, $website,"", $fblink,$instalink,$twitterlink,$username,$password);
               if ($result) {
                  echo "<script>alert('Updated successfully');document.location='owner_profile.php' </script>";
               } else {
                  echo"error";
               }
            }
      }
   }


   if(isset($_POST["staff_edit"])) {
      $id= $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile_number = $_POST['m_nuber'];
      $alternate_mobile_number = $_POST['m_nuber_1'];
      $address = $_POST['address'];
      $date_of_joining = $_POST['doj'];

      if(empty($name) || empty($email) || empty($mobile_number)  || empty($address) || empty($date_of_joining)){
         $msg = "All fields are required"; 
         header("Location:edit_staff.php?staff&id=$id&msg=$msg");
      }

      $result = $fun->update_staff($id,$name, $email, $mobile_number, $alternate_mobile_number, $address, $date_of_joining);
      if ($result) {
           
         echo "<script>alert('Updated successfully');document.location='view_staff.php' </script>";
      } else {
         echo"error";
      }
   }



   
   if(isset($_POST["client_update"]))
     {
        $id=$_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile_number = $_POST['m_nuber'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
       
        $description = $_POST['discription'];
        
        
        if(empty($name) || empty($email) || empty($mobile_number) || empty($dob) || empty($address) || empty($description)){
           $msg = "All fields are required";
           header("Location:edit_client.php?client&id=$id&msg=$msg");
        }
         else{
         $result = $fun->update_client($id,$name, $email, $mobile_number, $dob, $address, $description);
         if ($result) {
           
          
            // PHP program to pop an alert 
            // message box on the screen 
              
            // Display the alert box  
           // echo '<script>alert("Updated successfully")</script>'; 
            echo "<script>alert('Updated successfully');document.location='view_client.php' </script>";
         } else {
            echo"error";
         }
      }
        
    }


     
   if(isset($_POST["enquiry_update"])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $number=$_POST['number'];
      $message=$_POST['message'];

      $result = $fun->enquiry_update($name, $email,$number,$message);
      if ($result) {
           
          
        
         echo "<script>alert('You will get an update');document.location='../index.php' </script>";
      } else {
         echo"error";
      }
   }

   if(isset($_POST["Testimonial_submit"])){
      $name=$_POST['name'];
      $review=$_POST['review'];

      if(empty($name) || empty($review) ){
         $msg = "All fields are required";
         header("Location:add_testimonial.php?id=$id&msg=$msg");
      }
      else{


        //images
        if(isset($_FILES["image"]["name"])&& !empty($_FILES["image"]["name"])){
   
         $fileName = $name.time();
         $target_dir = "./images/testimonial_images/";
         $target_file = $target_dir .basename($_FILES["image"]["name"]);
         $uploadOk = 1;
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         $file_name = $target_dir ."$fileName.".$imageFileType;
          $newfilename=$fileName.".".$imageFileType;
         if(move_uploaded_file($_FILES["image"]["tmp_name"], $file_name)){
          $result= $fun->insert_testimonial($name,$review,$newfilename);
          if ($result) {
             echo "<script>alert('Updated successfully');document.location='view_testimonial.php' </script>";
          } else { 
             echo"error";
          }
         }
         else{
             $msg= "Enter All Fields";
             echo "$msg";
             header("location:owner_profile.php?msg=$msg");
          }
         
      }

   }
}

      







   




























//-----------------------------------------------------------

    

    

   

     
    ?>
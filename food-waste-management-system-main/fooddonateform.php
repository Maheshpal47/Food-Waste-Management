<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost:3308","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #0625c1;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo">Anna <b style="color: #0625c1; ">Daan</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(number of person /kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div>
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="Locality">Locality:</label>
<select id="Locality" name="Locality" style="padding:10px;">
  <option value="Mumbai">Mumbai</option>
  <option value="Boisar">Boisar</option>
  <option value="Kelve">Kelve</option>
  <option value="Palghar">palghar</option>
  <option value="kalyan">kalyan</option>
  <option value="Dahisar">Dahisar</option>
  <option value="Borivali">Borivali</option>
  <option value="Kandivali">Kandivali</option>
  <option value="Malad">Malad</option>
  <option value="Goregaon">Goregaon</option>
  <option value="Rammandir">Rammandir</option>
  <option value="Miraroad">Miraroad</option>
  <option value="Bhayander">Bhayander</option>
  <option value="Naigaon">Naigaon</option>
  <option value="Vasai">Vasai</option>
  <option value="Ashokvan">Ashokvan</option>
  <option value="Rawalpada">Rawalpada</option>
  <option value="Chandivali" selected>Chandivali</option>
  <option value="Andheri">Andheri</option>
  <option value="Thane">Thane</option>
  <option value="Poisar">Poisar</option>
  <option value="Dindoshi">Dindoshi</option>
  <option value="Kurar">Kurar</option>
  <option value="AArey">AArey</option>
  <option value="Magathane">Magathane</option>
  <option value="Anand nagar">Anand nagar</option>
  <option value="Oshivara">Oshivara</option>
</select> 

        <label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>
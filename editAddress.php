<?php include 'include/header.php'; ?>
<?php include 'include/address.php'; ?>

<h1>EDIT CONTACT DETAILS</h1>
<?php
if(isset($_GET['id']) && isset($_GET['addressbook'])){
    $id=$_GET['id'];
    $addressbook=$_GET['addressbook'];

    $query="select * from ".$addressbook." where id=$id";
    $result=mysqli_query($connection,$query);
    while($res=mysqli_fetch_assoc($result)){
        $editEntry=new AddressBook($res['firstName'],$res['lastName'],$res['address'],$res['city'],$res['zip'],$res['phoneNumber']);
    }
    $errMsgFname=$errMsgLname=$errMsgAddress=$errMsgCity=$errMsgZip=$errMsgPhone='';
    $firstName=$editEntry->firstName;
    $lastName=$editEntry->lastName;
    $address=$editEntry->address;
    $city=$editEntry->city;
    $zip=$editEntry->zip;
    $phoneNumber=$editEntry->phoneNumber;
}
?>

<?php

if(isset($_POST['submit'])){
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $phoneNumber=$_POST['phone'];

    if(empty($_POST['firstName'])){
        $errMsgFname='Field cannot be empty';
    }elseif(empty($_POST['lastName'])){
        $errMsgLname='Field cannot be empty';
    }elseif(empty($_POST['address'])){
        $errMsgAddress='Field cannot be empty';
    }elseif(empty($_POST['city'])){
        $errMsgCity='Field cannot be empty';
    }elseif(empty($_POST['zip'])){
        $errMsgZip='Field cannot be empty';
    }elseif(empty($_POST['phone'])){
        $errMsgPhone='Field cannot be empty';
    }else{
        $editEntry->firstName=$_POST['firstName'];
        $editEntry->lastName=$_POST['lastName'];
        $editEntry->address=$_POST['address'];
        $editEntry->city=$_POST['city'];
        $editEntry->zip=$_POST['zip'];
        $editEntry->phoneNumber=$_POST['phone'];

        $query=" update ".$addressbook." set firstName='".$editEntry->firstName."', lastName='".$editEntry->lastName."', address='".$editEntry->address."', city='".$editEntry->city."', zip='".$editEntry->zip."', phoneNumber='".$editEntry->phoneNumber."' where id=".$id;
        $result=mysqli_query($connection,$query);
        if(!$result){
            die("query error occurred");
        }else{
            header("Location: showAddressBook.php?addressbook=".$addressbook);
        }

    }
}

?>

<form method="post" action="">
<p><span class="error">* required field</span></p>
  First Name: <input type="text" name="firstName" value="<?php echo $firstName; ?>">
  <span class="error"><?php echo "* ".$errMsgFname; ?></span>
  <br><br>
  Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>">
  <span class="error"><?php echo "* ".$errMsgLname; ?></span>
  <br><br>
  Address: <textarea name="address" rows="5" cols="40"><?php echo $address; ?></textarea>
  <span class="error"><?php echo "* ".$errMsgAddress; ?></span>
  <br><br>
  City: <input type="text" name="city" value="<?php echo $city; ?>">
  <span class="error"><?php echo "* ".$errMsgCity; ?></span>
  <br><br>
  ZIP: <input type="text" name="zip" value="<?php echo $zip; ?>">
  <span class="error"><?php echo "* ".$errMsgZip; ?></span>
  <br><br>
  Phone: <input type="text" name="phone" value="<?php echo $phoneNumber; ?>">
  <span class="error"><?php echo "* ".$errMsgPhone; ?></span>
  <br><br>
  <input type="submit" name="submit" value="Edit Entry">
</form>


<?php include 'include/footer.php'  ?>
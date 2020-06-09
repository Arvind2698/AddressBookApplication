<?php include 'include/header.php'; ?>
<?php include 'include/address.php' ?>

<?php
$firstName=$lastName=$address=$city=$zip=$phoneNumber='';
$errMsgFname=$errMsgLname=$errMsgAddress=$errMsgCity=$errMsgZip=$errMsgPhone='';

if(isset($_GET['addressbook'])){
    $addressbook=$_GET['addressbook'];
}else{
    die("error occurred");
}

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
        $newEntry= new AddressBook($firstName,$lastName,$address,$city,$zip,$phoneNumber);

        $query=" INSERT INTO ".$addressbook." ( firstName, lastName, address, city, zip, phoneNumber) VALUES ('".$newEntry->firstName."','".$newEntry->lastName."','".$newEntry->address."','".$newEntry->city."','".$newEntry->zip."','".$newEntry->phoneNumber."')";

        $result=mysqli_query($connection,$query);
        if($result){
            header("Location: showAddressBook.php?addressbook=".$addressbook);
        }else{
            die("error occured while pushing");
        }
    }
}
?>

<h1>ADD A NEW ENTRY</h1>

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
  <input type="submit" name="submit" value="Add Entry">
</form>


<?php include 'include/footer.php'; ?>





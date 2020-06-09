<?php include 'include/header.php'; ?>

<h1>WELCOME TO THE ADDRESS BOOK APPLICATION</h1>

<h3>AVAILABLE ADDRESS BOOKS</h3>

<?php

$query1="show tables";
$counter=1;
$result1=mysqli_query($connection,$query1);
while($res=mysqli_fetch_assoc($result1)){
    echo "<h4><a href='showAddressBook.php?addressbook=".$res['Tables_in_addressbook']."'>".$counter.": ".$res['Tables_in_addressbook']."</a></h4>";
    $counter++;
}
?>
<br<br>
<h3><a href="index.php?create=1">CREATE A NEW ADDRESS BOOK</a></h3>


<?php
if(isset($_GET['create']) || isset($_GET['msg']))
{
    if(empty($_GET['msg'])){
        $errMsg='';
    }else{
        $errMsg="Field cannot be empty";
    }
?>
<form action="index.php" method="post">
Name of Address Book: <input type="text" name="name">
<span class="error"><?php echo "* ".$errMsg; ?></span>
<input type="submit" name='submit1'>
</form>
<?php } ?>

<?php
if(isset($_POST['submit1'])){
    $newAddressBook=$_POST['name'];
    if(!empty($newAddressBook)){
    $query2=" CREATE TABLE"." $newAddressBook"." ( `id` INT NOT NULL AUTO_INCREMENT , `firstName` VARCHAR(255) NOT NULL , `lastName` VARCHAR(255) NOT NULL , `address` TEXT NOT NULL , `city` VARCHAR(255) NOT NULL , `zip` INT(10) NOT NULL , `phoneNumber` INT(15) NOT NULL , PRIMARY KEY (`id`))";
    $result2=mysqli_query($connection,$query2);
    if(!$result2){
        die("error occurred");
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php?create=1&msg=f");

}
}
?>
<h3><a href="index.php?delete=1">DELETE AN ADDRESS BOOK</a></h3>
<?php
if(isset($_GET['delete'])){
$query3="show tables";
$result3=mysqli_query($connection,$query3);
while($res3=mysqli_fetch_assoc($result3)){

?>
<form action="" method="post">
    <input type="radio"  name="addressbook" value="<?php echo $res3['Tables_in_addressbook']; ?>">
    <label for="<?php echo $res3['Tables_in_addressbook']; ?>"><?php echo $res3['Tables_in_addressbook']; ?></label><br>
<?php } ?>
    <br>
    <input type="submit" name="submit2" value="Delete Address Book">
</form>
<?php } ?>

<?php
if(isset($_POST['submit2'])){
    if(!empty($_POST['addressbook'])){
        $query4="drop table ".$_POST['addressbook'];
        $result4=mysqli_query($connection,$query4);
        if(!$result4){
            die("error occurred");
        }else{
            header("Location: index.php");
        }
    }
}
?>

<?php include 'include/footer.php';  ?>
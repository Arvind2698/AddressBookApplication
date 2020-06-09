<?php include 'include/header.php'; ?>


<?php
if(isset($_GET['id']) && isset($_GET['addressbook'])){
    $id=$_GET['id'];
    $addressbook=$_GET['addressbook'];

    $query="delete from ".$addressbook." where id=$id";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("error occured");
    }else{
        header("Location: showAddressBook.php?addressbook=".$addressbook);
    }
}
?>


<?php include 'include/footer.php'  ?>
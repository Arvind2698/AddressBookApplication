<?php include 'include/header.php' ?>
<?php if(isset($_GET['addressbook'])){
    $addressbook=$_GET['addressbook'];
    echo "<h1>WELCOME TO THE ADDRESS BOOK: ".$addressbook."</h1>";
?>
<?php
if(isset($_GET['sort'])){
  $sortid=$_GET['sort'];
  if($sortid==1){
    $query='select * from '.$addressbook.' order by lastName ';
  }else{
    $query='select * from '.$addressbook.' order by zip';
  }
}else{
$query='select * from '.$addressbook;
}
$result=mysqli_query($connection,$query);

?>
<table>
  <tr>
    <th>First name</th>
    <th><a href="showAddressBook.php?addressbook=<?php echo $addressbook; ?>&sort=1">Last name</a></th>
    <th>Address</th>
    <th>City</th>
    <th><a href="showAddressBook.php?addressbook=<?php echo $addressbook; ?>&sort=2">ZIP</a></th>
    <th>Phone</th>
    <th>Options</th>
  </tr>
<?php
while($res=mysqli_fetch_assoc($result)){
    $id=$res['id'];
    echo "<tr>";
    echo  "<td>".$res['firstName']."</td>";
    echo  "<td>".$res['lastName']."</td>";
    echo  "<td>".$res['address']."</td>";
    echo  "<td>".$res['city']."</td>";
    echo  "<td>".$res['zip']."</td>";
    echo  "<td>".$res['phoneNumber']."</td>";
    echo "<td><a href='editAddress.php?id=".$id."&addressbook=".$addressbook."'>Edit</a> <a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='deleteAddress.php?id=".$id."&addressbook=".$addressbook."'>Delete</a></td>";
    echo "</tr>";
}
?>

</table>

<a href="addAddress.php?addressbook=<?php echo $addressbook; ?>"><h3>Add a new Entry</h3></a>
<a href="index.php"><h3>Return to home page</h3></a>
<?php } ?>


<?php include 'include/footer.php' ?>
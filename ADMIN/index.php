<?php
   
   include "../assets/header.php"

?>
<table class="table" border="2">
  <tr>
    
    <td>image</td>
    <td>title</td>
    <td>content</td>
    <td>edit</td>
    <td>Delete</td>
  </tr>

<?php


$db = mysqli_connect("localhost", "root", "", "onerealhk");
$records =mysqli_query($db, "select * from posts  ORDER BY id  "); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    
    <td><?php echo "<img src='../Assets/images/".$data['image']."' >"; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><?php echo $data['content']; ?></td> 
    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']; ?>">edit</a></td> 
    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>

  </tr>	
<?php
}
?>
</table>
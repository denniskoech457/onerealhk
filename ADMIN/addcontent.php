<?php
   
   include "./server.php"

?>
<form method="POST"  enctype="multipart/form-data">
  
  <input type="hidden" name="size" value="1000000">
  <div>
    <input type="file" name="image">
  </div>
<div>
<p>select category</p>
                    <?php

                        $conn = new mysqli('localhost', 'root', '', 'onerealhk') 
                    or die ('Cannot connect to db');

                        $result = $conn->query("select  categoryname from categories");

                        
                        echo "<select name='categoryname'>";

                        while ($row = $result->fetch_assoc()) {

                                      unset( $name);
                                      
                                      $name = $row['categoryname']; 
                                      echo '<option value="'.$name.'">'.$name.'</option>';

                    }

                        echo "</select>";
                        
                    ?> 
   
 </div>

<div> 
       <input type="text" name="title" placeholder="Blog title" class="form-control bg-dark text-white my-3 text-centre" required>
</div>
<div> 
       <textarea class="form-control btn-dark text-white my-3 text-centre"id="text" 
      cols="40" 
      rows="4" 
      name="content" 
       placeholder="Content" 
       required></textarea>
</div>
<input type="hidden" name="author" value="<?php 
   
  if (isset($_SESSION['user'])) 
  echo $_SESSION['user'];
        ?>" readonly>
  
  <div>
      <button class="btn btn-dark" type="submit" name="upload">ADD POST</button>
  </div>
</form>
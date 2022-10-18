<?php
include 'connection.php';
  
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    
    if($name==''){
        echo 'name cannot be empty';
    }
    else{
        $data = mysqli_query($con,"INSERT INTO person VALUES ('','$name')");

        if($data){
            echo 'data inserted';
        }
        else
        echo mysqli_error($con);
    }
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>


 <form method="POST">
        <input type="text" placeholder="Enter Name" name="name"/>
        <button name="submit">Click Me</button>
    </form>
    
    <table>
     <thead>
        <th>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Update</td>
            <td>Del</td>
        </tr>
    </th>
     </thead>
    <tbody>
       <!-- Display all the data in the table -->
            <?php 
            
            $data = mysqli_query($con,"SELECT * FROM person");

            if(mysqli_num_rows($data)>0){
                while($row=mysqli_fetch_assoc($data)){
                    ?>
 <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><a href="update.php?id=<?php echo $_GET['id']=$row['id'] ?>">Update</a></td>
            <td>Del</td>
    </tr>
<?php
                }
            }
            ?>
            

    </tbody>
    
    </table>


  
 </body>
 </html>



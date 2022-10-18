<?php
$name = '';
$id = $_GET['id'];//get the id of the clicked item in table and store it in id variable

include 'connection.php'; //include connection.php file to perform crud


//to display the selected name in the textfield
$data = mysqli_query($con,"SELECT * FROM person WHERE id='$id'");

if(mysqli_num_rows($data)>0){
    while($row=mysqli_fetch_assoc($data)){
        $name = $row['name'];
    }
}


//if the update button is clicked
if(isset($_POST['btnUpdate'])){
    $name = $_POST['name'];

    $data = mysqli_query($con,"UPDATE person SET name='$name' WHERE id='$id'");

    if($data){
        header("Location:index.php");//if the data is updated redirec it to the index.php page
    }
    else{
        echo 'some error occured';
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
        <input type="text"
         placeholder="name" 
         name="name"
          value="<?php echo $name ?>" 
          />
          <!-- display the name in the field -->
        <button name="btnUpdate">Update</button>
    </form>
</body>
</html>
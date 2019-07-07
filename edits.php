<?php
 $dbServername="localhost";
 $dbUsername="root";
 $dbPassword="";
 $dbName="loginsystem";



$Name = "";
$Rollno = "";
$sem_qualified = "";
$Percentage = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database
try{
    $connect = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['Name'];
    $posts[1] = $_POST['Rollno'];
    $posts[2] = $_POST['sem_qualified'];
    $posts[3] = $_POST['Percentage'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM users WHERE Name = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $Name = $row['Name'];
                $Rollno = $row['Rollno'];
                $sem_qualified = $row['sem_qualified'];
                $Percentage = $row['Percentage'];
            }
        }else{
            echo 'No Data For This Name';
        }
    }else{
        echo 'Result Error';
    }
}


// Insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `student_data`(`Rollno`, `sem_qualified`, `Percentage`) VALUES ('$data[1]','$data[2]',$data[3])";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `student_data` WHERE `Name` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `student_data` SET `Rollno`='$data[1]',`sem_qualified`='$data[2]',`Percentage`=$data[3] WHERE `Name` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="php_insert_update_delete_search.php" method="post">
            <input type="text" name="Name" placeholder="Name" value="<?php echo $Name;?>"><br><br>
            <input type="number" name="Rollno" placeholder="Rollno" value="<?php echo $Rollno;?>"><br><br>
            <input type="number" name="sem_qualified" placeholder="sem_qualified" value="<?php echo $sem_qualified;?>"><br><br>
            <input type="number" name="Percentage" placeholder="Percentage" value="<?php echo $Percentage;?>"><br><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </body>
</html>
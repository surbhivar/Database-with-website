<?php
  include_once 'dbh.inc.php';
  ?>

<!DOCTYPE html>
<html>
<head>
 <title> Best Engineering college in Delhi NCR</title>

<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="adject.css">
 <link rel = "icon" href = "Logo-jiit.png"  type = "image/x-icon"> 

</head>
<body background="bg.jpg">>

<div class="jumbotron">
  <h3 id="jiit"><b>JAYPEE INSTITUTE OF INFORMATION TECHNOLOGY, NOIDA</h3>
<p id="deem">[Deemed to be University under Section 3 of UGC Act 1956 ]</p>
<p id="Ai">[AICTE approved,NIRF (MHRD,GoL)Ranked[2016,2017,2018,2019] and NAAC Accredited]</p>


</div>


<nav>
   <ul>
        <li ><a href="webb.php">HOME</a>
    
                
    
    
    </li>
        <li class="parent"><a href="#">ACADEMICS</a>
            <ul class="child">
                <li><a href="Btech.php"> Under graduate programs</a></li>
                <li><a href="mtech.php">Post graduate program</a></li>
                <li><a href="#">Doctoral programs (PHD)</a></li>
            </ul>
        </li>
        
    <li class="parent1"><a href="#">ADMISSION</a>
    <ul class="child1">
                <li><a href="result.php">Admission Results</a></li>
                <li><a href="pro.php">Admission Procedure</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
    
    
    </li>
       <li class="parent2"><a href="#">ABOUT US</a>
    <ul class="child2">
                <li><a href="ab.php">About JIIT</a></li>
                <li><a href="#">About JAYPEE group</a></li>
                <li><a href="#">Authorities</a></li>
            </ul>
    
    
    </li>
        <li class="parent3"><a href="#">CONTACT US</a>
    <ul class="child3">
                
                <li><a href="cont.php">Contact Details</a></li>
                <li><a href="#">Reach US</a></li>
            </ul>
    
    
    </li>
    </ul>
</nav>
<br>

 <h3><b><u>STUDENT DATABASE</h3>

<?php
   $sql="SELECT * FROM student_data;";
   $result=mysqli_query($conn,$sql);
   
   echo '<table border="2" cellspacing="5" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial"><i><h4>Name</h4></font> </td> 
          <td> <font face="Arial">Rollno</font> </td> 
          <td> <font face="Arial">sem_qualified</font> </td> 
          <td> <font face="Arial">Percentage</font> </td> 
          
      </tr>';
 

    while ($row = $result->fetch_assoc()) {
        $field1name = $row["Name"];
        $field2name = $row["Rollno"];
        $field3name = $row["sem_qualified"];
        $field4name = $row["Percentage"];
        
 
        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                   
              </tr>';
    }
    $result->free();
 
   ?>
   <br></br>
   <a href="edits.php">To edit Student Database click here</a>
   <br></br>
  </body>
  </html>
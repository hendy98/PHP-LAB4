<?php
   #1
   //open & close connection
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'demo';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
?>

<?php
#2
//create db & select
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='k2';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error($conn));
   }
   
   echo 'Connected successfully';
   //create
   $sql = "create database $dbname";
     $retval = mysqli_query( $conn,$sql );
   
   if(! $retval ) {
      die('Could not create database: ' . mysqli_connect_error($retval));
   }
    //select
    mysqli_select_db( $conn,$dbname );
   echo "Database <span style='color:red'>$dbname </span>created & selected successfully\n";
   mysqli_close($conn);
?>

<?php
#3
//create db TABLE
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='k2';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error($conn));
   }
   
   echo 'Connected successfully<br>';
   
   //select
   mysqli_select_db( $conn,$dbname );

   //create table
   $sql = 'CREATE TABLE employee( emp_id INT NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(20) NOT NULL,
   emp_address  VARCHAR(20) NOT NULL,
   emp_salary   INT NOT NULL,
   join_date    timestamp(6) NOT NULL,
   primary key ( emp_id ))';

     $retval = mysqli_query( $conn,$sql );
   
   if(! $retval ) {
      die('Could not create table: ' . mysqli_connect_error($retval));
   }
    
   echo "<br>Database Table  created successfully\n";
   mysqli_close($conn);
?>

<?php
#4
//create db TABLE from file
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='k2';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error($conn));
   }
   
   echo 'Connected successfully<br>';
  
   $query_file = 'sql_query.txt';
   
   $fp = fopen($query_file, 'r');
   $sql = fread($fp, filesize($query_file));
   fclose($fp);
    
   //select
   mysqli_select_db( $conn,$dbname );

     $retval = mysqli_query( $conn,$sql );
   
   if(! $retval ) {
      die('Could not create table: ' . mysqli_connect_error($retval));
   }
    
   echo "<br>Database Table  created successfully\n";
   mysqli_close($conn);

/*
Delete database
$sql = 'DROP DATABASE db_name';
Delete table
$sql = 'DROP TABLE tbl_name';
*/
?>

<?php
#5
//insert data to TABLE
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='k2';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error($conn));
   }
   
   echo 'Connected successfully<br>';
   
   //select
   mysqli_select_db( $conn,$dbname );

   //create table
   $sql = "INSERT INTO emp(emp_name,emp_address, emp_salary, join_date) 
   VALUES ( 'guest', 'XYZ', 2000, NOW() )";

   $retval = mysqli_query( $conn,$sql );
   
   if(! $retval ) {
      die('Could not insert to table: ' . mysqli_connect_error($retval));
   }
    
   echo "<br>Data inserted to table successfully\n";
   mysqli_close($conn);
?>

<?php
#6
//select==get from to TABLE
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='k2';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error($conn));
   }
   
   echo 'Connected successfully<br>';
  
   $sql = 'SELECT emp_id, emp_name, emp_salary FROM employee';
   mysqli_select_db($conn,$dbname);
   $result = mysqli_query($conn,$sql );
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_connect_error($result));
   }


   if (mysqli_num_rows($result) > 0) {
      // output data of each row

      // echo "<table>";
      while($row = mysqli_fetch_assoc($result)) {
         echo "EMP ID :{$row['emp_id']}  <br> ".
         "EMP NAME : {$row['emp_name']} <br> ".
         "EMP SALARY : {$row['emp_salary']} <br> ".
         "--------------------------------<br>";
      }
      // echo "</table>";

    } else {
      echo "0 results";
    }
    /* //Its a good practice to release cursor memory
    mysqli_free_result($result);
    */
   echo "Fetched data successfully\n";
   
   mysqli_close($conn);
?>

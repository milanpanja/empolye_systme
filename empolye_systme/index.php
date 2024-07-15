<?php
error_reporting(0);
include "connection.php";
?>

<?php
error_reporting(0);
if(isset($_POST['search']))
{
   $search= $_POST['search-id'];

   $query="SELECT * FROM form WHERE id='$search'";
   $data=mysqli_query($conn,$query);

   $result= mysqli_fetch_assoc($data);
   //$name=$result['emp_name'];
   //echo $name;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color:rgb(134, 67, 118);
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #101aac;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
            color:  #101aac;
        }

        .form-group input,
        .form-group select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color:  #101aac;
        }

        .form-group select {
            appearance: none;
            background:url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 8"><path fill="none" stroke="gray" stroke-width=".5" d="M2 0L0 2h4zM2 5L0 3h4z"/></svg>') no-repeat right 10px center;;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #007bff;
            outline: none;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .buttons button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .buttons .search {
            background-color: #007bff;
            color: #fff;
        }
        .buttons .search:hover {
            background-color: #003670;
            color: #fff;
        }

        .buttons .save {
            background-color: #28a745;
            color: #fff;
        }
        .buttons .save:hover {
            background-color: #017a1d;
            color: #fff;
        }

        .buttons .modify {
            background-color: #ffc107;
            color: #fff;
        }
        .buttons .modify:hover {
            background-color: #5f4700;
            color: #fff;
        }

        .buttons .delete {
            background-color: #dc3545;
            color: #fff;
        }
        .buttons .delete:hover {
            background-color: #8a010f;
            color: #fff;
        }

        .buttons .clear {
            background-color: #6c757d;
            color: #fff;
        }
        .buttons .clear:hover {
            background-color: #2f373d;
            color: #fff;
        }

        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }

            .buttons {
                flex-direction: column;
            }

            .buttons button {
                margin-bottom: 10px;
            }

            .buttons button:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Employee Management System</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="search-id">Search ID</label>
                <input type="text"  id="search-id" name="search-id" value="<?php if(isset($_POST['search'])){echo $result['id'];}?>">
            </div>
            <div class="form-group">
                <label for="employee-name">Employee Name</label>
                <input type="text"  id="employee-name" name="employee-name"  value="<?php if(isset($_POST['search'])){echo $result['emp_name'];}?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="Not selected">Select Gender</option>
                    <option value="Male" <?php if($result['emp_gender']=='Male'){echo "Selected";}?>>Male</option>
                    <option value="Female" <?php if($result['emp_gender']=='Female'){echo "Selected";}?>>Female</option>
                    <option value="Other" <?php if($result['emp_gender']=='Other'){echo "Selected";}?>>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" name="email"  value="<?php if(isset($_POST['search'])){echo $result['emp_email'];}?>">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select id="department" name="department">
                    <option value="Not Selected">Select Department</option>
                    <option value="HR" <?php if($result['emp_department']=='HR'){echo "Selected";}?>>HR</option>
                    <option value="Accoubts" <?php if($result['emp_department']=='Accoubts'){echo "Selected";}?>>Accounts</option>
                    <option value="IT" <?php if($result['emp_department']=='IT'){echo "Selected";}?>>IT</option>
                    <option value="Sales" <?php if($result['emp_department']=='Sales'){echo "Selected";}?>>Sales</option>
                    <option value="Business" <?php if($result['emp_department']=='Business'){echo "Selected";}?>>Business Development</option>
                    <option value="Marketing" <?php if($result['emp_department']=='Marketing'){echo "Selected";}?>>Marketing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text"  id="address" name="address" value="<?php if(isset($_POST['search'])){echo $result['emp_address'];}?>">
            </div>
            <div class="buttons">
                <button type="submit" name="search" class="search">Search</button>
                <button type="submit" name="save" class="save">Save</button>
                <button type="submit" name="update" class="modify">Update</button>
                <button type="submit" name="delete" class="delete" onclick='return m()'>Delete</button>
                <button type="reset" name="clear" class="clear">Clear</button>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    function m() {
        return confirm('Tumi ki Sotti Delete korba?');
}
</script>

<?php
error_reporting(0);
include "connection.php";

if(isset($_POST['save']))
{
    $name=$_POST['employee-name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $depar=$_POST['department'];
    $address=$_POST['address'];

    $sql="SELECT * FROM form WHERE emp_email='$email'";
    $result=mysqli_query($conn,$sql);
    $count_email=mysqli_num_rows($result);

    if($count_email==0)
    {
         $sql="INSERT INTO form (emp_name,emp_gender,emp_email,emp_department,emp_address)VALUES
         ('$name','$gender','$email','$depar','$address')";
         $result=mysqli_query($conn,$sql);
         if($result)
        {
           echo "<script> alert('Data Save Successfully')</script>";
        } 
        else
        {
            echo "<script> alert('Failed to insert Data')</script>";
        }   
    }
    else
    {
        if($count_email>0)
        {
            echo '<script>
            window.location.href="index.php";
            alert("Email already Exista !");
            </script>';
        }
    }
    if($result==TRUE)
    {
        $to="milanpanja731@gmail.com";
        $sub="mmm";
        $mes="sksk";
        $heder="From:milanpanja731@gmail.com";
        $mail= mail($to,$sub,$mes,$heder);
        if($mail==TRUE)
        {
            echo "mail send";
        }
    }
    
}
?>

<?php
error_reporting(0);

if(isset($_POST['delete']))
{
    $id=$_POST['search-id'];
    
    $query="DELETE FROM form WHERE id='$id'";
    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo "Record Deleted";
    }
    else
    {
        echo "Not Delete";
    }
}


?>

<?php

if(isset($_POST['update']))
{
    $id=$_POST['search-id'];
    $name=$_POST['employee-name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $depar=$_POST['department'];
    $address=$_POST['address'];

    $query="UPDATE form SET emp_name='$name',emp_gender='$gender',emp_email='$email',
    emp_department='$depar',emp_address='$address' WHERE id='$id'";
    $data= mysqli_query($conn,$query);
    if($data)
    {
        echo "<script> alert('Record Updated')</script>";
    }
    else
    {
        echo "<script> alert('Record Not Update')</script>";
    }


}
?>
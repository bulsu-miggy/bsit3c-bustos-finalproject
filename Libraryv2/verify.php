<?php



include 'dbconn.php';

if(isset($_GET['email']) && isset($_GET['vercode'])){
    $query = "SELECT * FROM libraryv2.user WHERE  EmailId = '$_GET[email]'
    AND vercode = '$_GET[vercode]'";

echo "This your Verfification Code:".$_GET['vercode'] ;
    $result = mysqli_query($conn,$query);

    if($result)
    {
        if(mysqli_num_rows($result) == 1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch[`verified`] == 0)
                {
                    $update = "UPDATE libraryv2.user SET verified = '1' 
                    WHERE  EmailId = '$result_fetch[EmailId]'";
                    if(mysqli_query($conn,$update)){
                        echo "<script> 
                alert('Email Verification Success');
                window.location.href='index.php';
                </script>";
                    }
                
                    else
                    {
                        echo "<script> 
                        alert('Cannot Run Query');
                        window.location.href='verify.php';
                        </script>";
                    }
                }
        }
        else
        {

        }
    }
    else
    {
        echo "<script> 
            alert('Server Down');
            window.location.href='verify.php';
            </script>";
    }
}   
?>
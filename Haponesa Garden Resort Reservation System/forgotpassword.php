<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
body{
    min-height: 100vh;
    width: 95%;
    margin: auto;
    background:url(pictures/haponesalog.jpg);
    background-position: center;
    background-size: cover;

    
}


        </style>
</head>
<body>

    <div class="container d-flex justify-content-center mt-5 pt-5">
        <div class="card mt-5" style="width:500px">
            <div class="card-header">
                <h1 class="text-center">Forgot Password</h1>
            </div>
            <div class="card-body">
                <form action="resetmail.php" method="post">
                    <div class="mt-4">
                        <label for="email"> Enter your email address : </label>
                        <input type="email" name="Email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="mt-4 text-end">
                        <input type="submit" name="submit" class="btn btn-primary" onclick="alert('Update your password in Email');">
                        <a href="login.php" class="btn btn-danger">Back</a>
          
                    </div>
                </form>
            </div>
        </div>
    </div>


    

</body>
</html>
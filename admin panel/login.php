<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {
   

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_UNSAFE_RAW);

    $pass = sha1($_POST['password']);
    $pass = filter_var($pass, FILTER_UNSAFE_RAW);

    

    $select_sellers = $conn->prepare("SELECT * FROM `sellers` WHERE email = ? AND password = ? ");
    $select_sellers->execute([$email, $pass]);
    $row = $select_sellers->fetch(PDO::FETCH_ASSOC);

    if ($select_sellers->rowCount() > 0) {
        setcookie('sellers_id', $row['id'], time() + 60*60*24*30, '/');
        header('location:dashboard.php');

    }else{
        $warning_msg[] = 'incorrect email or password';
    }




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bleu Ciel Eté - page d'inscription du vendeur</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

 
</head>
<body>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="login">
                      <h3>login maintenant</h3>

                      <div class="input-field">
                          <p>votre email <span>*</span></p>
                          <input type="email" name="email" placeholder="entez votre email" maxlength="50" required class="box">
                        </div>


                        <div class="input-field">
                        <p>votre password <span>*</span></p>
                        <input type="password" name="password" placeholder="entez votre password" maxlength="50" required class="box">
                    </div>


                      <p class="link">j'ai pas  un compte ? <a href="register.php">insecrer maintenant</a></p>
                      <input type="submit" name="submit" value="login now" class="btn">
        </form>
            
    </div>  
    













      <!-- sweeetalert cdn link -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      <!-- custom js link -->
       <script src="../js/script.js"></script>

       <?php include '../components/alert.php'; ?>

</body>
</html>


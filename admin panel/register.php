<?php
include '../components/connect.php';

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
        <form action="" method="post" enctype="multipart/form-data" class="register"></form>
            <h3>inscrivez-vous maintenant</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>votre nom <span>*</span></p>
                        <input type="text" name="name" placeholder="entez votre nom" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>votre email <span>*</span></p>
                        <input type="email" name="email" placeholder="entez votre email" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>votre password <span>*</span></p>
                        <input type="password" name="password" placeholder="entez votre password" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>confirmez password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="confirmez votre password" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>votre profile <span>*</span></p>
                        <input type="file" name="image" accept="image/*" required class="box">
                    </div>
                    <p class="link">j'ai déjà un compte ? <a href="login.php">connectez-vous maintenant</a></p>
                    <input type="submit" name="submit" value="inscrivez-vous maintenant" class="btn">
                </div>
            </div>
    </div>  
    













      <!-- sweeetalert cdn link -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      <!-- custom js link -->
       <script src="../js/script.js"></script>

       <?php include '../components/alert.php'; ?>

</body>
</html>


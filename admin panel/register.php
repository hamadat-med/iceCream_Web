<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {
    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_UNSAFE_RAW);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_UNSAFE_RAW);

    $pass = sha1($_POST['password']);
    $pass = filter_var($pass, FILTER_UNSAFE_RAW);

    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_UNSAFE_RAW);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_UNSAFE_RAW);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = unique_id().'.'.$ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_files/'.$rename;

    $select_sellers = $conn->prepare("SELECT * FROM `sellers` WHERE email = ? ");
    $select_sellers->execute([$email]);

    if ($select_sellers->rowCount()> 0)  {
        $warning_msg[] = 'email alredy exist!';
      }else{
        if ($pass != $cpass){
            $warning_msg[] = 'confirm password not matched';
        }else{
        $insert_sellers = $conn->prepare("INSERT INTO `sellers` (id, name, email, password, image) VALUES(?, ?, ?, ?, ?) ");
        $insert_sellers->execute([$id,  $name, $email, $cpass, $rename]);
        move_uploaded_file($image_tmp_name, $image_folder);
        $success_msg[] = 'new seller registeres! please loging now';
      }
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
        <form action="" method="post" enctype="multipart/form-data" class="register">
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
                </div>
                <div class="col">
                    <div class="input-field">
                        <p>votre password <span>*</span></p>
                        <input type="password" name="password" placeholder="entez votre password" maxlength="50" required class="box">
                    </div>
                 
                    <div class="input-field">
                        <p>confirmez password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="confirmez votre password" maxlength="50" required class="box">
                    </div>
                </div>
                
            </div>
            <div class="input-field">
                        <p>votre profile <span>*</span></p>
                        <input type="file" name="image" accept="image/*" required class="box">
                </div>
                      <p class="link">j'ai déjà un compte ? <a href="login.php">connectez-vous maintenant</a></p>
                      <input type="submit" name="submit" value="register now" class="btn">
        </form>
            
    </div>  
    













      <!-- sweeetalert cdn link -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      <!-- custom js link -->
       <script src="../js/script.js"></script>

       <?php include '../components/alert.php'; ?>

</body>
</html>


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Description of the website -->
    <meta name="description" content="<?= $page_description ?>">
    <title><?= $page_title ?></title>
    <!-- Fonts Montserrat & Fira Sans Condensed & Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@700&family=Montserrat:wght@700&family=Roboto&display=swap" rel="stylesheet">
    <!-- CSS Bootstrap 5.1 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Bootswatch 5 - Spacelab theme --> 
    <link href="https://bootswatch.com/5/spacelab/bootstrap.min.css" rel="stylesheet">
    <!-- Font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet">
    <?php if(!empty($page_css)) : ?>
        <link type="text/css" href="<?= URL ?>public/CSS/<?=$page_css?>" rel="stylesheet">
    <?php endif; ?> 
</head>

<body>
    <!-- <input type="hidden" value="<?php getenv('PROD') ?>" name="prod" id="prod"> -->
    
    <!-- header -->
    <?php require_once("views/common/header.php"); ?>
    
    <!-- main -->
    <main class="container-fluid">

        <!-- Alert success / error message  --> 
        <section class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 text-center mt-2">
                    <?php 
                        if(!empty($_SESSION['alert'])) {
                            foreach($_SESSION['alert'] as $alert){
                                echo "<div class='alert alert-dismissible ". $alert['type'] ."' role='alert'>
                                    ".$alert['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            unset($_SESSION['alert']);
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- Page content --> 
        <?php echo $page_content; ?>
    </main>
    
    <!-- footer -->
    <?php require_once("views/common/footer.php"); ?>

    <!-- JS Bootstrap 5.1 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <?php if(!empty($pagejavascript)): ?>
        <?php foreach($pagejavascript as $filejavascript):?>
            <script type="text/javascript" src="<?= URL ?>public/javascript/<?= $filejavascript ?>"></script>
        <?php endforeach ?>
    <?php endif ?>

</body>
</html>
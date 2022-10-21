<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?= $page_description ?>">
    <title><?= $page_title ?></title>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@700&family=Montserrat:wght@700&family=Roboto&display=swap" rel="stylesheet">

    <link href="https://bootswatch.com/5/spacelab/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet">
    <?php if(!empty($page_css)) : ?>
        <link type="text/css" href="<?= URL ?>public/CSS/<?=$page_css?>" rel="stylesheet">
    <?php endif; ?> 
</head>

<body>
    
   
    <?php require_once("views/common/header.php"); ?>
    

    <main class="container-fluid">

  
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

 
        <?php echo $page_content; ?>
    </main>
    

    <?php require_once("views/common/footer.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <?php if(!empty($pagejavascript)): ?>
        <?php foreach($pagejavascript as $filejavascript):?>
            <script src="<?= URL ?>public/javascript/<?= $filejavascript ?>"></script>
        <?php endforeach ?>
    <?php endif ?>

</body>
</html>
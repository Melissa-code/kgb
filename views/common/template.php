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
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="<?= URL ?>public/CSS/main.css" rel="stylesheet">
    <?php if(!empty($page_css)) : ?>
        <link href="<?= URL ?>public/CSS/<?=$page_css?>" rel="stylesheet">
    <?php endif; ?>

</head>


<body>
    <?php require_once("views/common/header.php"); ?>
    
    <main class="container" >
        <?php echo $page_content; ?>
    </main>
    
    <?php require_once("views/common/footer.php"); ?>

    <!-- JS & Popper Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- JS -->
    <?php if(!empty($page_javascript)): ?>
        <?php foreach($page_javascript as $file_javascript):?>
            <script src="<?= URL ?>public/Javascript/<?= $file_javascript ?>"></script>
        <?php endforeach ?>
    <?php endif ?>

</body>
</html>
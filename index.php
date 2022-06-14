<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_mainpage.css">
    <title>Mes projets</title>
</head>
<body>
    <div class="title_container">
        <p>MES PROJETS</p>
    </div>

    <?php

    include 'assets/php/obj_categorie.php';
    include 'assets/php/obj_projet.php';
    include 'assets/php/connectdb.php';

    $liste_categories = [];
    $stmt = $db->query("SELECT * FROM categorie");
    while ($row = $stmt->fetch()) {

      if ($row['categorie_id']!=3){

        $projectList = [];
                $stmt1 = $db->query("SELECT * FROM projet WHERE projet_categorie_id =".$row['categorie_id']);
                while ($row1 = $stmt1->fetch()) {
                    $projectList[] = new Projet($row1['projet_name'], $row1['projet_miniature'], $row1['projet_link'], $row1['projet_id'], $row1['projet_categorie_id']);
                }
        $liste_categories[] = new Categorie($row['categorie_name'], $projectList, $row['categorie_id']);
              }
    }

            foreach ($liste_categories as &$categorie) {
                echo '<p class="categorie_name">'.$categorie->get_name().'</p>';

                echo '<div class="projets_grid">';
                foreach ($categorie->get_liste_de_projet() as &$projet) {
                echo '<a class="projets_item" href="'.$projet->get_link().'">'
                .
                "<img src=assets/uploaded_files/".$projet->get_miniature()."></img>"
                .
                '<p>'.$projet->get_name().'</p>'
                .
                '</a>';
                }
                echo '</div>';
            }

    ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div>
  <div class="contact-form-wrapper d-flex justify-content-center">
    <form action="#" class="contact-form">
      <h5 class="title">ME CONTACTER</h5>
      <p class="description">N'hésitez pas à me contacter pour en savoir plus mes projets et mon experience.
      </p>
      <div>
        <input type="text" class="form-control rounded border-white mb-3 form-input" id="name" placeholder="Nom" required>
      </div>
      <div>
        <input type="email" class="form-control rounded border-white mb-3 form-input" placeholder="Email" required>
      </div>
      <div>
        <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" placeholder="Message" required></textarea>
      </div>
      <div class="submit-button-wrapper">
        <input type="submit" value="Send">
      </div>
    </form>
  </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".projets_item").on('mouseenter', function(event){
            event.target.parentNode.children[1].style.opacity = 1;
            event.target.parentNode.children[0].style.filter = 'brightness(75%)';
        });
        $(".projets_item").on('mouseleave', function(event){
            event.target.parentNode.children[1].style.opacity = 0;
            event.target.parentNode.children[0].style.filter = '';
        });
    </script>

</body>
</html>
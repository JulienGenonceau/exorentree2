<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style_panelprojet.css">
    <title>Mes projets</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <div class="title_container">
        <p>PANEL PROJETS</p>
    </div>

    <ul>
    <li id='1'>Ajouter un Projet</li>
    |
    <li id='2'>Gerer les Projets</li>
    |
    <li id='3'>Gerer les Categories</li>
    </ul>

    <div id="page_container">
    </div>

    <script>
        
        include_page('../includes/gerer_projets.php');

        page_id = 2;
        $("li").on('click', function(event){
            id_target = event.target.id;
            
            if (id_target != page_id){
                
                switch(id_target) {
                case '1':
                    include_page('../includes/ajouter_projet.php');
                    break;
                case '2':
                    include_page('../includes/gerer_projets.php');
                    break;
                case '3':
                    include_page('../includes/gerer_categories.php');
                    break;
                default:
                    break;
                }
            }
            page_id = id_target;
        });

        function include_page(lien){
            document.getElementById('page_container').style.transition = "";
            document.getElementById('page_container').style.opacity = "0";
            $.post('assets/php/include_page.php', {link:lien}, function(data){ 
                $("#page_container").html(data);
            document.getElementById('page_container').style.transition = "opacity 0.5s";
            document.getElementById('page_container').style.opacity = "1";
            });
        }
    </script>

</body>
</html>
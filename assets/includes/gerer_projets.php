<link rel="stylesheet" href="assets/css/style_gerer_projets.css">

<?php

include '../php/obj_categorie.php';
include '../php/obj_projet.php';
include 'connectdb.php';

    // $liste_categories = [
    //     new Categorie("Categorie 1", [
    //         new Projet('Projet blablacar', 'default.png', 'www.google.com'),
    //         new Projet('Projet videos', 'default.png', 'www.google.com'),
    //         new Projet('Projet super cuite', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    //     ]),
    //     new Categorie("Deuxième catégorie", [
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    //     ]),
    //     new Categorie("The third one", [
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    //     ]),
    //     new Categorie("Q U A T R E", [
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
    //         new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    //     ])
    //     ];
        $liste_categories = [];
$stmt = $db->query("SELECT * FROM categorie");
while ($row = $stmt->fetch()) {
    $projectList = [];
            $stmt1 = $db->query("SELECT * FROM projet WHERE projet_categorie_id =".$row['categorie_id']);
            while ($row1 = $stmt1->fetch()) {
                $projectList[] = new Projet($row1['projet_name'], $row1['projet_miniature'], $row1['projet_link'], $row1['projet_id'], $row1['projet_categorie_id']);
            }
    $liste_categories[] = new Categorie($row['categorie_name'], $projectList, $row['categorie_id']);
}

        $isFirst = true;
        foreach ($liste_categories as &$categorie) {
            if ($isFirst) {
            echo '<p class="categorie_name gray">'.$categorie->get_name().'</p>';
            }else{
            echo '<p class="categorie_name">'.$categorie->get_name().'</p>';
            }
            $isFirst = false;

            echo '<div class="projets_grid">';
            foreach ($categorie->get_liste_de_projet() as &$projet) {
                
            $link = $projet->get_link();
            echo '<div class="projets_item">'
            .
            "<img onclick='gotolink(event.target.id)' id='".$link."' src=assets/uploaded_files/".$projet->get_miniature()."></img>"
            .
            "<div class='item_modifbar'>   
                   <input id='".$projet->get_id()."' class='bar_inputname' type='text' value='".$projet->get_name()."'></input>
                   <input id='file-input' type='file' name='name' style='display: none;' />
                   <div class='bar_icon one' onclick = 'inputFocus(event)'></div>
                   <div class='bar_icon two' id='".$projet->get_link()."' onclick = 'changelink(".$projet->get_id().", event.target.id)'></div>
                   <div class='bar_icon trois' onclick = 'changeimage(event, ".$projet->get_id().")'></div>

                  ";

                  echo "<select class='select_modifbar' onclick='changeprojetcategorie(event, ".$projet->get_id().", ".$projet->get_categorie_id().")'>";
                  $stmt = $db->query("SELECT * FROM categorie WHERE categorie_id=".$projet->get_categorie_id());
                  while ($row = $stmt->fetch()) {
                      echo "<option id=".$row['categorie_id']." value='".$row['categorie_name']."'>".$row['categorie_name']."</option>";
                  }
                  $stmt = $db->query("SELECT * FROM categorie");
                  while ($row = $stmt->fetch()) {
                      if ($row['categorie_id'] != $projet->get_categorie_id()){
                      echo "<option id=".$row['categorie_id']." value='".$row['categorie_name']."'>".$row['categorie_name']."</option>";
                      }
                  }
                  echo "</select>";
                   
                   
            echo "</div>"
            .
            "<div class='item_redcross' onclick = 'deleteprojet(".$projet->get_id().")'>X</div>"
            .
            '<p>'.$projet->get_name().'</p>'
            .
            '</div>';
            }
            echo '</div>';
        }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

        function inputFocus(e){
            const input =  e.target.parentNode.children[0]
            input.focus();
            var tmpStr = input.value;
            input.value = '';
            input.value = tmpStr;
        }

        function changelink(id, linkactuel){
            let newlink = prompt("Entrez un nouveau lien", linkactuel);

            if (newlink != null) {
                $.post('assets/php/changeprojectlink_traitement.php', {
                new_link: newlink,
                id: id}, 
                function(returnedData){
                console.log(returnedData);
                include_page('../includes/gerer_projets.php');
            });
            }
        }

        function changeimage(event, id){
            const inputfile =  event.target.parentNode.children[1]
            console.log(inputfile);
            $(inputfile).trigger('click');
            inputfile.onchange = function(){
                changeimage_traitement(inputfile, id);
            }
        }

        function deleteprojet(id){
            $.post('assets/php/deleteprojet_traitement.php', {
                id: id}, 
            function(returnedData){
                console.log(returnedData);
                include_page('../includes/gerer_projets.php');
            });
        }

        function changeprojetcategorie(event, id_projet, id_categorie_actuel){
            var select = event.target;
            var id_categorie = select.options[select.selectedIndex].id;

            if (id_categorie != id_categorie_actuel){
                $.post('assets/php/changeprojetcategorie_traitement.php', {
                id_projet: id_projet,
                id_categorie: id_categorie}, 
            function(returnedData){
                console.log(returnedData);
                include_page('../includes/gerer_projets.php');
            });
            }

        }

        $(".bar_inputname").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            $.post('assets/php/changeprojetcname_traitement.php', {
                new_name: e.target.value,
                id: e.target.id}, 
            function(returnedData){
                console.log(returnedData);
                include_page('../includes/gerer_projets.php');
            });
        }
        });

        function gotolink(link){
            if (!link.includes('http://') && !link.includes('https://')){
                link = 'http://'+link;
            }
            window.location.replace(link);
        }


        function changeimage_traitement(input, id){
            let formData = new FormData();
	        let photo = input.files[0];

    if (photo != null){
      if (isImage(photo.name)){
      formData.append("projet_miniaturefile", photo);
    }}
	$.ajax({
    url: 'assets/php/ajouter_projet_traitement_fileupload.php',
    type: 'POST',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
         success: function(data) {
			//$('body').html(data);
        }
  });

	var filename = "";
	var fullPath = input.value;
        if (fullPath) {
    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
    filename = fullPath.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
	}
	$.post('assets/php/changeprojectimg_traitement.php', {
                new_img: filename,
                id: id}, 
                function(returnedData){
                console.log(returnedData);
                include_page('../includes/gerer_projets.php');
            });

}



        function getExtension(filename) {
  var parts = filename.split('.');
  return parts[parts.length - 1];
}

function isImage(filename) {
  var ext = getExtension(filename);
  switch (ext.toLowerCase()) {
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
      //etc
      return true;
  }
  return false;
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/polyfills.umd.js"></script>

<script type="module" src="assets/script_pdf.js"></script>
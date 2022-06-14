
<?php
include '../php/connectdb.php'
?>

<link rel="stylesheet" href="assets/css/style_ajouter_projet.css">

<form id = 'form_ajouter_projet'>

  <label for="projet_titre">Titre</label><br>
  <input type="text" id="projet_titre" value=""><br>

  <label for="projet_lien">Lien</label><br>
  <input type="text" id="projet_lien" value=""><br><br>
  
  <label for="projet_miniature">Miniature</label><br>

  <div class="control-group file-upload" id="file-upload1">
  <div class="image-box text-center">
		<p>+</p>
		<img src="" alt="">
	</div>
  <div class="controls" style="display: none;">
		<input type="file" id="projet_miniature"/>
	</div>
</div>
<p id="img_instructions">Cliquez ou déposez une image</p>

  <label for="projet_categorie">Catégorie</label><br>

  <select id="projet_categorie" onchange="checkif_new_category_is_selected()">
	  <?php
		$stmt = $db->query("SELECT * FROM categorie");
		while ($row = $stmt->fetch()) {
			if ($row['categorie_id']!=3){
			echo "<option id=".$row['categorie_id']." value='".$row['categorie_name']."'>".$row['categorie_name']."</option>";
			}
		}
	  ?>
	  
  <option id="newcategorie" value="newcategorie">Nouvelle categorie...</option>
  </select>
  <input type="text" id="projet_new_categorie_title" value="" placeholder=" Nom de la nouvelle categorie..."><br>

  <input type="submit" id="btn_form_ajouter_submit" onclick='submitform(event)' value="Ajouter">
</form> 

<script>

checkif_new_category_is_selected();

function submitform(event){
	event.preventDefault();


	let formData = new FormData();
	let photo = document.getElementById('projet_miniature').files[0];

    if (photo != null){
      if (isImage(photo.name)){
      formData.append("projet_miniaturefile", photo);
    }}


	$.ajax({
    url: 'assets/php/ajouter_projet_traitement_fileupload.php',
    type: 'POST',

    // Form data
    data: formData,

    cache: false,
    contentType: false,
    processData: false,
         success: function(data) {
			console.log(data);
        }
  });

	var select = document.getElementById('projet_categorie');
    var id_pcategorie = select.options[select.selectedIndex].id;

	var filename = "";
	var fullPath = $('#projet_miniature').val();
        if (fullPath) {
    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
    filename = fullPath.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
	}

	var value_pcategorie_name =  $('#projet_new_categorie_title').val();

	var select = document.getElementById('projet_categorie');
    var id_selected = select.options[select.selectedIndex].id;
	if (id_selected != "newcategorie"){
		value_pcategorie_name = "";
	}

	$.post('assets/php/ajouter_projet_traitement.php', {
		ptitre: $('#projet_titre').val(),
		plien : $('#projet_lien').val(),
		pminiature: filename,
		pcategorie_id: id_pcategorie,
		pnew_categorie_name: value_pcategorie_name}, 
    function(returnedData){
		  console.log(returnedData);
          include_page('../includes/gerer_projets.php');
		  page_id = 2;
	});
}

$(".image-box").click(function(event) {
	var previewImg = $(this).children("img");

	$(this)
		.siblings()
		.children("input")
		.trigger("click");

	$(this)
		.siblings()
		.children("input")
		.change(function() {
			var reader = new FileReader();

			reader.onload = function(e) {
				var urll = e.target.result;
				$(previewImg).attr("src", urll);
				previewImg.parent().css("background", "transparent");
				previewImg.show();
				previewImg.siblings("p").hide();
			};
			reader.readAsDataURL(this.files[0]);
		});
});

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

function checkif_new_category_is_selected(){
	var select = document.getElementById('projet_categorie');
    var id_selected = select.options[select.selectedIndex].id;
	if (id_selected=="newcategorie"){
		document.getElementById('projet_new_categorie_title').style.display="block";
	}else{
		document.getElementById('projet_new_categorie_title').style.display="none";
	}
}

</script>
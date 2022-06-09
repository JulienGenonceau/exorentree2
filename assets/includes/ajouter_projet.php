<link rel="stylesheet" href="assets/css/style_ajouter_projet.css">

<form id = 'form_ajouter_projet' action="/action_page.php">

  <label for="projet_titre">Titre</label><br>
  <input type="text" name="projet_titre" value=""><br>

  <label for="projet_lien">Lien</label><br>
  <input type="text" name="projet_lien" value=""><br><br>
  
  <label for="projet_miniature">Miniature</label><br>

  <div class="control-group file-upload" id="file-upload1">
  <div class="image-box text-center">
		<p>+</p>
		<img src="" alt="">
	</div>
  <div class="controls" style="display: none;">
		<input type="file" name="projet_miniature"/>
	</div>
</div>
<p id="img_instructions">Cliquez ou déposez une image</p>

  <label for="projet_categorie">Catégorie</label><br>

  <select name="cars" id="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
  </select>

  <input id="btn_form_ajouter_submit" type="submit" value="Ajouter">
</form> 

<script>
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

</script>
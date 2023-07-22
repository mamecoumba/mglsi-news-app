<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Articles par Catégorie</title>
	<link rel="stylesheet" type="text/css" href="design/style.css">
</head>
<body>
	<?php require_once 'entete.php'; ?>
	<div id="contenu">
		<?php
			require_once 'Models/fonctions.php';
			if (($bdd = dbConnect()) != null) {
				if (isset($_GET['id']) && is_numeric($_GET['id'])) {
					$categorie_id = $_GET['id'];
					$articles = getArticlesByCategorie($bdd, $categorie_id);

					if (!empty($articles)) {
						foreach ($articles as $article) {
							?>
							<div class="article">
								<h1><a href="article.php?id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
								<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
							</div>
							<?php
						}
					} else {
						echo "Aucun article trouvé dans cette catégorie.";
					}
				} else {
					echo "ID de la catégorie invalide.";
				}
			} else {
				echo "Erreur de connexion à la base de données.";
			}
		?>
	</div>
	<?php 
		$categories = getList($bdd, 'Categorie');
		require_once 'menu.php'; 
	?>
</body>
</html>

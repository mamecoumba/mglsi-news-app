<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Affichage d'un article</title>
	<link rel="stylesheet" type="text/css" href="design/style.css">
</head>
<body>
	<div id="contenu">
	<?php 
		require_once 'entete.php';
		require_once 'Models/fonctions.php';
		$bdd = dbConnect();
		if (isset($_GET['id']))
		{
			?>
				<?php
					$id = (int) $_GET['id'];
					$article = getItem($bdd, $id);
				?>
				<h1><?= $article->titre ?></h1>
				<span>Publié le <?= $article->dateCreation ?></span>
				<p><?= $article->contenu ?></p>
			</div><?php
		}
		else if  (isset($_GET['categorie']))
		{
			$catId = (int) $_GET['categorie'];
			$articles = getItemByCategorie($bdd, $catId);

			if (empty($articles)) {
				echo "Aucun article dans cette catégorie";
			}
			else
			{
				foreach ($articles as $article)
				{?>
					<div class="article">
						<h1><a href="article.php?id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
						<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
					</div><?php
				}
			}
		}
		else
		{?>
			<meta http-equiv="refresh" content="3; url=index.php">
			<p>Cet article n'existe pas !!!</p><?php
		}
	?>
	</div>
	<?php 
		$categories = getList($bdd, 'Categorie');
		require_once 'menu.php'; 
	?>
</body>
</html>
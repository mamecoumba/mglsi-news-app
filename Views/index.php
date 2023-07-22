<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités MGLSI</title>
	<link rel="stylesheet" type="text/css" href="design/style.css">
</head>
<body>
	<?php require_once 'entete.php'; ?>
	<div id="contenu">
		<?php
			require_once 'Models/fonctions.php';
			if (($bdd = dbConnect()) != null)
			{
				$articles = getList($bdd);
				foreach ($articles as $article)
				{?>
					<div class="article">
						<h1><a href="article.php?id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
						<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
					</div><?php
				}
			}
			else
			{
				echo "Aucun article trouvé";
			}
		?>
	</div>
	<?php 
		$categories = getList($bdd, 'Categorie');
		require_once 'Views/menu.php'; 
	?>
</body>
</html>
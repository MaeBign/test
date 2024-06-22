<?php
function redirectTo(string $url){
	header('Location: '.$url);
	exit;
}

function getArticle(string $id, Array $l){
	foreach ($l as $article){
		if ($article["id"]===intval($id)){
			return $article;
		}
	}
	return NULL;
}
?>
<?php

/**
 * Retourne les infos de routage en fonction de la requête
 * et d'une table de routage
 *
 * @param string $page
 * @param array $routes
 * @return array un tableau contenant le nom de la route et son chemin
 */
function getRouteInfos(
	string $page,
	array $routes,
	string $notFoundRoute = "not_found"
): array {
	// Résolution du routage
	if (array_key_exists($page, $routes)) {
		$controller = $routes[$page];
	} else {
		$controller = $page;
	}

	// Gestion d'un contrôleur dont le fichier n'existe pas
	$controllerPath = "controllers/$controller.php";
	if (!file_exists($controllerPath)) {
		$controllerPath = "controllers/$notFoundRoute.php";
	}

	return [
		"controller" => $controller,
		"controllerPath" => $controllerPath
	];
}

/**
 * Calcul le rendu d'un modèle et retourne ce contenu 
 * sous la forme d'une chaîne de caractères
 *
 * @param string $template
 * @param array $params
 * @return string
 */
function getTemplateContent(string $template, array $params = []): string
{
	ob_start();
	$templatePath = "views/$template.php";
	$content = "Impossible de charger le modèle";

	if (file_exists($templatePath)) {
		extract($params, EXTR_OVERWRITE);
		include $templatePath;
		$content = ob_get_clean();
	}

	return $content;
}


/**
 * function du rendu du template
 *
 * @param string $template
 * @param array $params
 * @param string $layout
 * @return string
 */
function render(
	string $template,
	array $params = [],
	string $layout = "gabarit"
): string {
	$params["content"] = getTemplateContent($template, $params);
	return getTemplateContent($layout, $params);
}

/**
 * Obtient le lien vers une route
 *
 * @param string $route
 * @param array $query
 * @return string
 */
function getLinkToRoute(string $route, array $query = []): string
{
	$queryString = "";
	foreach ($query as $key => $value) {
		$queryString .= "&$key=$value";
	}

	return "/ElePhp/index.php?page=$route$queryString";
}



/**
 * function de connexion a la base de donnée
 *
 * @return PDO
 */
function getPDO(): PDO
{
	return new PDO(DSN, DB_USER, DB_PASS, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	]);
}

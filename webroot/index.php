<?php

  error_reporting(E_ALL);
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);

	/**
	 * Use the DS to separate the directories in other defines
	 */
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}

	/**
	 * The full path to the directory which holds "app", WITHOUT a trailing DS.
	 *
	 */
	if (!defined('ROOT')) {
		define('ROOT', dirname(dirname(__FILE__)));
	}
	/**
	 * The actual directory name for the "app".
	 *
	 */
	if (!defined('APP_DIR')) {
		define('APP_DIR', "app");
	}
	/**
	 * The actual directory name for the "webroot".
	 *
	 */
	if (!defined('WEBROOT_DIR')) {
		define('WEBROOT_DIR', basename(dirname(__FILE__)));
	}

	/**
     * Path after the server.
     * @var string
     */
	$path = substr($_SERVER["SCRIPT_NAME"], 0, strlen($_SERVER["SCRIPT_NAME"]) - 9);

    /**
     * URL passed in from the parameter. More than likely this comes from
     * a trick with htaccess file.
     * @var string
     */
    $url = null;
    if (isset($_REQUEST["url"])) {
        $url = $_REQUEST["url"];
		$url = str_replace($path, "", $url);
    }
	
	/**
     * Content item. We append ".php" to the end of it to find
     * the guts of the page. We also use this to form the
     * the extra bit of the title.
     * @var string
     */
    $content = "home";
    if ($url && $url != "" && $url != "/") {
        $content = $url;
        $length = strlen($content);
        if (strrpos($content, "/") == $length - 1) {
            $content = substr($content, 0, $length - 1);
        }
    }

	/**
     * Content directory location.
     * @var string
     */
    $directory = ROOT . DS . "view" . DS . "pages" . DS;

	/**
	 * Require helper classes
	 */
	require_once(ROOT . DS . "app" . DS . "includes" . DS . "asset.php");
	$asset = new Asset();

	require_once(ROOT . DS . "config" . DS . "config.php");
	Config::setup();
	
    /**
     * Actual file we will use as the guts of the page.
     * @var string
     */

    $file = $directory . $content . ".php";
    if (!file_exists($file)) {
        $content = "404";
        $file = $directory . $content . ".php";
        header($_SERVER['SERVER_PROTOCOL'] . " 404 Not found");
    }
	
	ob_start();
	require_once($file);
	$page = ob_get_contents();
	ob_end_clean();

	/**
     * Page title, this is formed from a base title plus
     * the content.
     * @var string
     */
    $title = Config::get("title");

	/**
	 * Require the default template
	 */
	require_once(ROOT . DS . "view" . DS . "layout" . DS . "default.php");

?>
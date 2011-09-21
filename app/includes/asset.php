<?php
/**
 * Asset loading class. For javascript and css files we want to add to a page, but
 * we also append cache busting parameters to the end (file time).
 * @author Matt Howlett, modified by Charlie Gleason
 *
 */
class Asset {
	
	static function getBase() {
		$result = "http://" . $_SERVER["HTTP_HOST"]
	                     . (($_SERVER["SERVER_PORT"] == '80') ? "" : ":" .$_SERVER["SERVER_PORT"]);
	
		if(Config::get("root")) {
			$result .= DS . Config::get("root");
		}
		
		return $result;
	}
    /**
     * Generates a script tag with caching parameters. This assumes
     * the script is in the js directory.
     *
     * @return true if successful.
     * @param $script String
     */
    function javascript($script) {
	
        if($script == null) {
            return false;
        }

		$base = Asset::getBase();
		$path = ROOT . DS . WEBROOT_DIR . DS . $script;

        // Append js to the end if not appended
        if(stristr($path, ".js") === false) {
            $path = $path . ".js";
        }

        if(!is_file($path)) {
            return false;
        }

		$parameter = filemtime($path);
		$file = $base . DS . $script;

		// Append js to the end if not appended
        if(stristr($file, ".js") === false) {
            $file = $file . ".js";
        }
		
        // Echo out the result
        echo '<script type="text/javascript" src="'. $file . '?' . $parameter . '"></script>' . "\n";
        return true;
    }

    /**
     * Generates a stylesheet tag with caching parameters. This assumes
     * the script is in the css directory.
     *
     * @return true if successful.
     * @param $stylesheet String
     */
    function stylesheet($stylesheet) {

        if($stylesheet == null) {
            return false;
        }

		$base = Asset::getBase();
        $path = ROOT . DS . WEBROOT_DIR . DS . $stylesheet;

        // Append css to the end if not appended
        if(stristr($path, ".css") === false) {
            $path = $path . ".css";
        }

        if(!is_file($path)) {
            return false;
        }

        $parameter = filemtime($path);
		$file = $base . DS . $stylesheet;

		// Append js to the end if not appended
        if(stristr($file, ".css") === false) {
            $file = $file . ".css";
        }

        // Echo out the result
        echo '<link type="text/css" rel="stylesheet" href="'  . $file . '?' . $parameter . '" />' . "\n";
        return true;
    }

    /**
     * Generates an image tag
     *
     * @return true if successful.
     * @param $image String
     * @param $config Array (width, height, alt and class)
     */
    function image($image, $config) {

		if($image == null) {
            return false;
        }

		$base = Asset::getBase();
        $path = ROOT . DS . WEBROOT_DIR . DS . "images" . DS . $image;

        if(!is_file($path)) {
            return false;
        }

        $parameter = filemtime($path);
		$file = $base . DS . "images" . DS . $image;

		$class = "";
		$width = "";
		$height = "";
		$alt = "";

        if($config != null) {
			if(isset($config['width']) && ($config['width'] != null)) {
				$width = ' width="' . $config['width'] . '"';
			}
			if(isset($config['height']) && ($config['height'] != null)) {
				$height = ' height="' . $config['height'] . '"';
			}
			if(isset($config['alt']) && ($config['alt'] != null)) {
				$alt = ' alt=' . $config['alt'];
			}
			if(isset($config['class']) && ($config['class'] != null)) {
				$class = ' class="' . $config['class'] . '"';
			}
		}
		
        // Echo out the result
        echo '<img src="'  . $file . '?' . $parameter . '"' . $width . $height . $alt . $class . ' />' . "\n";
        return true;
    }

	/**
     * Generates a link
     *
     * @return true if successful.
     * @param $image String
     * @param $config Array (rel)
     */
    function link($image, $config) {

		if($image == null) {
            return false;
        }

		$base = Asset::getBase();
        $path = ROOT . DS . WEBROOT_DIR . DS . $image;

        if(!is_file($path)) {
            return false;
        }

        $parameter = filemtime($path);
		$file = $base . DS . $image;

		$rel = "";

        if($config != null) {
			if($config['rel'] != null) {
				$rel = ' rel="' . $config['rel'] . '"';
			}
		}
		
        // Echo out the result
        echo '<link href="'  . $file . '?' . $parameter . '"' . $rel . ' />' . "\n";
        return true;
    }
}
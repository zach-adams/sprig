<?php

class Twig_Model {
    var $twigTemplate;

    public function template_include_twig( $template ) {
        if($this->twigTemplate) {
            return $this->twigTemplate;
        }
        if(!$template) {
            return $template;
        }
        Twig_Autoloader::register();
        // Load the templates so Twig can read them
        $loader = new Twig_Loader_Filesystem(get_theme_root() . '/' . get_template());
        $template = basename($template);

        // Setup the environment
        $twig = new Twig_Environment($loader, array(
            'cache'             => TWIG_STORAGE,
            'debug'             => TWIG_DEBUG,
            'auto_reload'       => true,
            'strict_variables'  => false
        ));

        if(!TWIG_CACHE) {
            $twig->clearCacheFiles();
        }


        //$render = $twig->loadTemplate($template);
        $source = $loader->getSource($template);
        $path = $twig->getCacheFilename($template);

        $tokenized = $twig->tokenize($source);
        $nodes = $twig->parse($tokenized);
        $php = $twig->compile($nodes);
        var_dump($php);
        die();


        if ( ! file_exists( $path ) ) {
            $this->forceFilePutContents($path, "<?php // $template ?>\n" . $source);
        }

        $this->twigTemplate = $path;

        return $this->twigTemplate;

    }
    public function get_query_template( $template ) {
        return $this->template_include_twig($template);
    }
    public function forceFilePutContents ($filepath, $content){
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
            if($isInFolder) {
                $folderName = $filepathMatches[1];
                $fileName = $filepathMatches[2];
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777, true);
                }
            }
            file_put_contents($filepath, $content);
        } catch (Exception $e) {
            echo "ERR: error writing '$content' to '$filepath', ". $e->getMessage();
        }
    }
}
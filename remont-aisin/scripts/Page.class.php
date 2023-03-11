<?php
class Page {
    var $site_name;
    var $site_template;
    var $page_content;
    var $page_title;
    var $page_template;
    var $page_encoding;
    var $default_module;
    static $is_active;
    var $path_to_files;
    var $seo;
    //РќР°С‡Р°Р»Рѕ Р±СѓС„РµСЂРёР·Р°С†РёРё, СЃРёРЅРіР»РµС‚РѕРЅ
    public function __construct() {
        if(self::$is_active == true) {
            die("РћР±СЉРµРєС‚ СѓР¶Рµ СЃРѕР·РґР°РЅ");
        }
        else {
            self::$is_active = true;
            $this->path_to_files = getcwd();
            //Р‘СѓС„РµСЂРёР·Р°С†РёСЏ
            ob_start();
        }
    }

    //РљРѕРЅРµС† Р±С„СѓС„РµСЂРёР·Р°С†РёРё, РІС‹РІРѕРґ РїРµСЂРµРјРµРЅРЅРѕР№ РІ РєРѕРЅС‚РµС‚
    public function __destruct() {
        $this->LoadContent();
        $this->content = ob_get_contents();
        ob_end_clean();
        ob_flush();
        $this->RenderPage();
    }

    public function SetPageTemplate($Template) {
        if(!empty($this->page_template)) {
            die("РЁР°Р±Р»РѕРЅ СѓР¶Рµ Р·Р°РґР°РЅРЅ");
        }
        else {
            $this->page_template = $Template;
        }
    }

    public function SetEncoding($Encoding) {
        if(!empty($this->page_encoding)) {
            die("РљРѕРґРёСЂРѕРІРєР° СѓР¶Рµ Р·Р°РґР°РЅР°");
        }
        else {
            $this->page_encoding = $Encoding;
        }
    }

    public function SetDefaultModule($Modules) {
        if(!empty($this->default_module)) {
            die("РњРѕРґСѓР»СЊ РїРѕ СѓРјРѕР»С‡Р°РЅРёСЋ СѓР¶Рµ РЅР°Р·РЅР°С‡РµРЅ");
        }
        else {
            $this->default_module = $Module;
        }
    }

    public function SetSeoData($seo = NULL) {
            if(!empty($seo)) {
                    $this->seo = $seo;
            }
    }

    private function LoadContent() {
        if(empty($_GET['page'])) {
            $path = $this->path_to_files."/pages/index.htm";
        }
        else {
            $page = (string)$_GET['page'];
            $page = strip_tags(stripslashes($page));
            $path = $this->path_to_files."/pages/{$page}.htm";
            $scriptPath = $this->path_to_files."/pages/{$page}.php";
        }
        if(file_exists($path)) {
            echo file_get_contents($path);
            $this->PrepareSeo($_GET['page']);
        }
        elseif(file_exists($scriptPath)) {
            include $scriptPath;
            $this->PrepareSeo($_GET['page']);
        }
        else {
            echo '404';
        }
    }

    private function PrepareSeo($page) {
        if(empty($this->seo[$page])) {
                $this->seoData = $this->seo['default'];
        } else {
                $this->seoData = $this->seo[$page];
        }
    }
    
    private function RenderPage() {
        $path = "{$this->path_to_files}/templates/{$this->page_template}/page.tpl.php";
        if(file_exists($path)) {
            require_once($path);
        }
        else {
            die("РўР°РєРѕРіРѕ С€Р°Р±Р»РѕРЅР° РЅРµ СЃСѓС‰РµСЃС‚РІСѓРµС‚");
        }
    }
}
?>

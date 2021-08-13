<?php

namespace sys\core;

require_once('sys/config/constants.php');

class View {

    public $currentUser;
    private $contentPath;

    public const RES = RES_DIR;
    public const ROOT = SITE_ROOT_DIR;
    private const MASTER_PAGE = BASE_TEMPLATE;

    public function __construct($contentPath, $data = null) {
        $this->currentUser = 'Гость';
        $this->contentPath = "app/views/$contentPath";
        if($data !== null && is_array($data)) {
            extract($data);
        }
        include(self::MASTER_PAGE);
    }
}
<?php

namespace sys\core;

class View {

    public $currentUser;
    private $contentPath;

    private const MASTER_PAGE = 'app/views/layouts/base.php';

    public function __construct($contentPath, $data = null) {
        $this->currentUser = 'Гость';
        $this->contentPath = "app/views/$contentPath";
        if($data !== null && is_array($data)) {
            extract($data);
        }
        include(self::MASTER_PAGE);
    }
}
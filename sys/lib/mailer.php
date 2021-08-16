<?php

namespace sys\lib;

class Mailer {
    public $to;
    public $from;
    public $subject;
    public $message;
    public $headers;

    public function __construct($to) {
        $this->to = $to;
        $this->from = 'Teach-Assistant Admin: gurov.anatoliy@gmail.com'; ////// ?????? !!!!!!!!!
        $this->subject = 'Подтверждение регистрации';
        $this->message = $this->build_message();
        $this->headers = $this->build_headers();
    }

    private function build_message() {
        $html = '';
        $html .= '<html>';
        $html .= '<body>';
        $html .= '<h3>Подтверждение регистрации на сайте Teach-Assistant</h3>';
        $html .= '<h4><a href="http://localhost/php/teach-assistant/auth/confirm/'.$this->to.'">Подтвердить</a></h4>';
        $html .= '</body>';
        $html .= '</html>';
        return $html;
    }

    private function build_headers() {
        $headers = "";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: $this->from\r\n";
        return $headers;
    }

    public function send() {
        mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
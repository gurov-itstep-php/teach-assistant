<?php

namespace sys\lib;

class Feedbacker {
    public $to;      // кому
    public $from;    // от кого
    public $subject; // тема
    public $message; // текс сообщения
    public $headers; // заголовки

    public function __construct($to, $subject) {
        $this->to = $to;
        $this->from = 'Teach-Assistant Admin: gurov.anatoliy@gmail.com';
        $this->subject = 'Feedback Teach-Assistant -> Тема: '.$this->subject.'';
        $this->message = $this->build_message();
        $this->message = $this->build_headers();
    }

    private function build_message() {
        $html = '';
        $html .= '<html><body>';
        $html .= '<h3>Cообщение от пользователя сайта'.$this->from.'</h3>';
        $html .= '<h4>'.$this->subject.'</h4>';
        $html .= '<h5>Текст сообщения:<hr></h5>';
        $html .= '<p>'.$this->message.'</p><hr>';
        $html .= '</body></html>';
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
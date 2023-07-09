<?php
class PHPMailerAdapter
{
    private $pm;

    public function __construct()
    {
        $this->pm = new PHPMailer(true);
        $this->pm->charSet = "utf-8";
    }

    public function addAddress($address, $name = '')
    {
        $this->pm->AddAddress($address, $name);
    }

    public function setFrom($from, $name)
    {
        $this->pm->From = $from;
        $this->pm->Name = $name;
    }

    public function setSubject($subject)
    {
        $this->pm->Subject = $subject;
    }

    public function setTextBody($body)
    {
        $this->pm->Body = $body;
        $this->pm->isHtml = false;
    }

    public function send()
    {
        $this->pm->Send();
        return true;
    }
}
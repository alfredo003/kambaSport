<?php

namespace Source\Support;

use Source\Core\Session;

/**
 *Class Message
 *
 * @author Alfredo Manuel <alfredomanuel127.02gmai.com>
 * @package Source\Core
 */
class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    private $before;

    private $after;
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->before.$this->text.$this->after;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }


    public function before(string $text):Message
    {
        $this->before =$text;
        return $this;
    }
    public function after(string $text):Message
    {
        $this->after =$text;
        return $this;
    }
    /**
     * @param string $message
     * @return Message
     */
    public function info(string $message): Message
    {
        $this->type = "info icon-info";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function success(string $message): Message
    {
        $this->type = "success icon-check-square-o";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message 
     */
    public function warning(string $message): Message
    {
        $this->type = "warning icon-warning";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function error(string $message): Message
    {
        $this->type = "message icon-error";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "<div class='message {$this->getType()}'>{$this->getText()}</div>";
    }

    /**
     * @return string
     */
    public function json(): string
    {
        return json_encode(["error" => $this->getText()]);
    }

    /**
     * Set flash Session Key
     */
    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_STRIPPED);
    }
}
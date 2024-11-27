<?php

namespace Src\Presentation\Views;

class View
{
    private string $template;
    private array $data;

    public function __construct(string $template = '', array $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    public static function make(string $template, array $data = []): self
    {
        return new self($template, $data);
    }

    public function render(): void
    {
        $templatePath = $this->getTemplatePath();

        if (! file_exists($templatePath)) {
            throw new \RuntimeException("Template {$this->template} not found");
        }

        extract($this->data);

        require $templatePath;
    }

    private function getTemplatePath(): string
    {
        return __DIR__ . '/Templates/' . str_replace('.', '/', $this->template) . '.php';
    }

    public static function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}

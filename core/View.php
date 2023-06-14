<?php

namespace Core;

class View
{
    public static function render(string $view, array $parameters = []): string
    {
        $viewPath = "app/Views/{$view}.html";
        $content = file_get_contents($viewPath);

        foreach ($parameters as $parameterName => $parameterValue) {
            $placeholder = "{{ {$parameterName} }}";
            $content = str_replace($placeholder, $parameterValue, $content);
        }

        return $content;
    }
}

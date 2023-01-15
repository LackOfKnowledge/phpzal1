<?php

namespace Apsl\Http;


class Request
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const HEADER_ACCEPT_LANGUAGE = 'Accept-Language';
    const HEADER_ACCEPT_ENCODING = 'Accept-Encoding';
    const HEADER_USER_AGENT = 'User-Agent';

    public function getHeader(string $name): ?string
    {
        $headerName = 'HTTP_' . strtoupper(str_replace('-', '_', $name));
        return ($_SERVER[$headerName] ?? null);
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isMethod(string $name): bool
    {
        return ($this->getMethod() === strtoupper($name));
    }

    public function getValue(string $name, $default = null)
    {
        return ($_REQUEST[$name] ?? $default);
    }

    public function getQueryStringValue(string $name, $default = null)
    {
        return ($_GET[$name] ?? $default);
    }

    public function getPostValue(string $name, $default = null)
    {
        return ($_POST[$name] ?? $default);
    }

    public function getCookieValue(string $name, $default = null)
    {
        return ($_COOKIE[$name] ?? $default);
    }

    public function getCurrentUri(bool $withQueryString = true): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        if ($withQueryString === false) {
            $uri = explode('?', $uri)[0];
        }

        return $uri;
    }
}

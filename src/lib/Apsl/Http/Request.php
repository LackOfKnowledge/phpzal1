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

    public function getValue(string $name)
    {
        return ($_REQUEST[$name] ?? null);
    }

    public function getQueryStringValue(string $name)
    {
        return ($_GET[$name] ?? null);
    }

    public function getPostValue(string $name)
    {
        return ($_POST[$name] ?? null);
    }

    public function getCookieValue(string $name)
    {
        return ($_COOKIE[$name] ?? null);
    }
}

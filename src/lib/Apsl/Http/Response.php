<?php

namespace Apsl\Http;


class Response
{
    const HEADER_CONTENT_LENGTH = 'Content-Length';
    const HEADER_CONTENT_TYPE = 'Content-Type';
    const CODE_200_OK = 200;
    const CODE_301_MOVED_PERMAMENTLY = 301;
    const CODE_302_FOUND = 302;
    const CODE_403_FORBIDDEN = 403;
    const CODE_404_NOT_FOUND = 404;
    const CODE_500_INTERNAL_SERVER_ERROR = 500;

    protected array $headers = [];
    protected string $body = '';
    protected int $statusCode = self::CODE_200_OK;

    public function send(): void
    {
        http_response_code($this->statusCode);

        $this->addHeader(self::HEADER_CONTENT_LENGTH, strlen($this->body));
        foreach ($this->headers as $name => $value) {
            header("{$name}: {$value}");
        }

        echo $this->body;
    }

    public function addHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function deleteHeader(string $name): void
    {
        unset($this->headers[$name]);
    }

    public function clearHeaders(): void
    {
        $this->headers = [];
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }
}

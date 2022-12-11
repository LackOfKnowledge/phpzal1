<?php

namespace Apsl\Session;


class Session
{
    const DEFAULT_SESSION_NAME = 'session';
    const DEFAULT_SESSION_LIFETIME = 60 * 60 * 24 * 2;

    protected string $name;
    protected int $lifetime;

    public function __construct(string $name = self::DEFAULT_SESSION_NAME, $lifetime = self::DEFAULT_SESSION_LIFETIME, bool $autostart = true)
    {
        $this->name = $name;
        $this->lifetime = $lifetime;

        if ($autostart) {
            $this->start();
        }
    }

    public function start()
    {
        session_name($this->name);
        if (session_status() === PHP_SESSION_NONE) {
            session_start([
                'cookie_lifetime' => $this->lifetime,
                'gc_maxlifetime' => $this->lifetime
            ]);
        }
    }

    public function getValue(string $name, $default = null)
    {
        return ($_SESSION[$name] ?? $default);
    }

    public function setValue(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }
}
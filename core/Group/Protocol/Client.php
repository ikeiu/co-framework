<?php

namespace Group\Protocol;

use Config;
use Group\Protocol\Client\BufTcp;
use Group\Protocol\Client\EofTcp;

class Client
{   
    protected $ip;

    protected $port;

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function getClient()
    {
        $protocol = Config::get("app::protocol");
            switch ($protocol) {
            case 'buf':
              $server = new BufTcp($this->ip, $this->port);
              break;
            case 'eof':
            default:
              $server = new EofTcp($this->ip, $this->port);
              break;
        }

        return $server;
    }
}
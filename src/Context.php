<?php declare(strict_types = 1);
namespace PhpMcp\Server;

use PhpMcp\Server\Contracts\SessionInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Context
{
    /**
     * @var SessionInterface
     */
    public $session;

    /**
     * @var ServerRequestInterface|null
     */
    public $request;

    public function __construct(
        SessionInterface $session,
        $request = null
    )
    {
        $this->session = $session;
        $this->request = $request;
    }
}
<?php

declare(strict_types=1);

namespace PhpMcp\Server;

use PhpMcp\Schema\Implementation;
use PhpMcp\Schema\ServerCapabilities;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use React\EventLoop\LoopInterface;

/**
 * Value Object holding core configuration and shared dependencies for the MCP Server instance.
 *
 * This object is typically assembled by the ServerBuilder and passed to the Server constructor.
 */
class Configuration
{
    /**
     * @var Implementation Info about this MCP server application.
     */
    public $serverInfo;

    /**
     * @var ServerCapabilities Capabilities of this MCP server application.
     */
    public $capabilities;

    /**
     * @var LoggerInterface PSR-3 Logger instance.
     */
    public $logger;

    /**
     * @var LoopInterface ReactPHP Event Loop instance.
     */
    public $loop;

    /**
     * @var CacheInterface|null Optional PSR-16 Cache instance for registry/state.
     */
    public $cache;

    /**
     * @var ContainerInterface PSR-11 DI Container for resolving handlers/dependencies.
     */
    public $container;

    /**
     * @var int Maximum number of items to return for list methods.
     */
    public $paginationLimit;

    /**
     * @var string|null Instructions describing how to use the server and its features.
     */
    public $instructions;

    /**
     * @param  Implementation  $serverInfo  Info about this MCP server application.
     * @param  ServerCapabilities  $capabilities  Capabilities of this MCP server application.
     * @param  LoggerInterface  $logger  PSR-3 Logger instance.
     * @param  LoopInterface  $loop  ReactPHP Event Loop instance.
     * @param  CacheInterface|null  $cache  Optional PSR-16 Cache instance for registry/state.
     * @param  ContainerInterface  $container  PSR-11 DI Container for resolving handlers/dependencies.
     * @param  int  $paginationLimit  Maximum number of items to return for list methods.
     * @param  string|null  $instructions  Instructions describing how to use the server and its features.
     */
    public function __construct(
        Implementation $serverInfo,
        ServerCapabilities $capabilities,
        LoggerInterface $logger,
        LoopInterface $loop,
        $cache,
        ContainerInterface $container,
        $paginationLimit = 50,
        $instructions = null
    ) {
        $this->serverInfo = $serverInfo;
        $this->capabilities = $capabilities;
        $this->logger = $logger;
        $this->loop = $loop;
        $this->cache = $cache;
        $this->container = $container;
        $this->paginationLimit = $paginationLimit;
        $this->instructions = $instructions;
    }
}

<?php declare(strict_types=1);

namespace Codeception\Specify\TestCase;

use Codeception\Verify\Verify;

trait ShouldThrowTrait
{
    public function shouldThrow($actual): void
    {
        Verify::Callable(
            [$this->subject, $this->methodName], $this->parameters
        )->throws($actual);
    }

    public function shouldNotThrow($actual): void
    {
        Verify::Callable(
            [$this->subject, $this->methodName], $this->parameters
        )->doesNotThrow($actual);
    }
}
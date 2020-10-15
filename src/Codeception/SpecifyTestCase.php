<?php declare(strict_types=1);

namespace Codeception;

use Codeception\Exception\InvalidSpecifyException;
use Codeception\Specify\TestCase\SpecifyReturn;
use Codeception\Specify\TestCase\SpecifyShouldBe;
use PHPUnit\Framework\TestCase;

abstract class SpecifyTestCase extends TestCase
{
    protected $subjectInstance;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->subjectInstance = $this->makeInstance();
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @return object|string
     */
    abstract protected function getSpecSubject();

    abstract public function testBehaviorSpec(): void;

    /**
     * @return mixed|object
     */
    private function makeInstance()
    {
        $subject = $this->getSpecSubject();
        if (is_string($subject)) {
            return new $subject;
        } elseif (is_object($subject)) {
            return $subject;
        } else {
            throw new InvalidSpecifyException(basename(__CLASS__), $subject);
        }
    }

    protected function callTo(string $methodName, ...$parameters): SpecifyReturn
    {
        return new SpecifyReturn($this->subjectInstance, $methodName, $parameters);
    }

    protected function returnOfCalling(string $methodName, ...$parameters): SpecifyShouldBe
    {
        return new SpecifyShouldBe($this->subjectInstance, $methodName, $parameters);
    }
}

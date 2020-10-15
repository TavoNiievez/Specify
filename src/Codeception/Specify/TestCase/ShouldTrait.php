<?php declare(strict_types=1);

namespace Codeception\Specify\TestCase;

use Codeception\Verify\Verifiers\VerifyArray;
use Codeception\Verify\Verifiers\VerifyBaseObject;
use Codeception\Verify\Verifiers\VerifyClass;
use Codeception\Verify\Verifiers\VerifyDirectory;
use Codeception\Verify\Verifiers\VerifyFile;
use Codeception\Verify\Verifiers\VerifyJsonFile;
use Codeception\Verify\Verifiers\VerifyJsonString;
use Codeception\Verify\Verifiers\VerifyString;
use Codeception\Verify\Verifiers\VerifyXmlFile;
use Codeception\Verify\Verifiers\VerifyXmlString;
use Codeception\Verify\Verify;
use PHPUnit\Framework\Assert;

trait ShouldTrait
{
    private $subject;

    private $parameters;

    /**
     * @var string
     */
    private $methodName;

    public function __construct($subject, string $methodName, $parameters)
    {
        $this->subject = $subject;
        $this->methodName = $methodName;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    private function run()
    {
        return call_user_func(
            [$this->subject, $this->methodName],
            ...$this->parameters
        );
    }

    private function should($value): void
    {
        Verify::Mixed($this->run())->same($value);
    }

    private function shouldLike($value): void
    {
        Verify::Mixed($this->run())->equals($value);
    }

    private function shouldApproximately($value, float $delta): void
    {
        Verify::Mixed($this->run())->equalsWithDelta($value, $delta);
    }

    /**
     * @return VerifyFile|false
     */
    private function shouldFile()
    {
        $actual = $this->run();
        if (is_file($actual)) {
            return new VerifyFile($actual);
        }
        Assert::fail('Result is not a file.');
        return false;
    }

    /**
     * @return VerifyJsonFile|false
     */
    private function shouldJsonFile()
    {
        $actual = $this->run();
        if (is_file($actual)) {
            return new VerifyJsonFile($actual);
        }
        Assert::fail('Result is not a file.');
        return false;
    }

    /**
     * @return VerifyJsonString|false
     */
    private function shouldJsonString()
    {
        $actual = $this->run();
        if (is_string($actual)) {
            return new VerifyJsonString($actual);
        }
        Assert::fail('Result is not an string.');
        return false;
    }

    /**
     * @return VerifyXmlFile|false
     */
    private function shouldXmlFile()
    {
        $actual = $this->run();
        if (is_file($actual)) {
            return new VerifyXmlFile($actual);
        }
        Assert::fail('Result is not a file.');
        return false;
    }

    /**
     * @return VerifyXmlString|false
     */
    private function shouldXmlString()
    {
        $actual = $this->run();
        if (is_string($actual)) {
            return new VerifyXmlString($actual);
        }
        Assert::fail('Result is not a string.');
        return false;
    }

    /**
     * @return VerifyBaseObject|false
     */
    private function shouldBaseObject()
    {
        $actual = $this->run();
        if (is_object($actual)) {
            return new VerifyBaseObject($actual);
        }
        Assert::fail('Result is not an object.');
        return false;
    }

    /**
     * @return VerifyClass|false
     */
    private function shouldClass()
    {
        $actual = $this->run();
        if (is_string($actual) && class_exists($actual)) {
            return new VerifyClass($actual);
        }
        Assert::fail('Result is not an existing class.');
        return false;
    }

    /**
     * @return VerifyDirectory|false
     */
    private function shouldDirectory()
    {
        $actual = $this->run();
        if (is_dir($actual)) {
            return new VerifyDirectory($actual);
        }
        Assert::fail('Result is not a directory.');
        return false;
    }

    /**
     * @return VerifyArray|false
     */
    private function shouldArray()
    {
        $actual = $this->run();
        if (is_array($actual)) {
            return new VerifyArray($actual);
        }
        Assert::fail('Result is not an array.');
        return false;
    }

    /**
     * @return VerifyString|false
     */
    private function shouldString()
    {
        $actual = $this->run();
        if (is_string($actual)) {
            return new VerifyString($actual);
        }
        Assert::fail('Result is not a string.');
        return false;
    }
}

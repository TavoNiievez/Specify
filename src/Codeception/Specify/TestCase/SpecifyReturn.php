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

final class SpecifyReturn
{
    use
        ShouldTrait,
        ShouldThrowTrait
    ;

    public function returns($value): void
    {
        $this->should($value);
    }

    public function returnsValueLike($value): void
    {
        $this->shouldLike($value);
    }

    public function returnsApproximately($value, float $delta): void
    {
        $this->shouldApproximately($value, $delta);
    }

    /**
     * @return VerifyFile|false
     */
    public function returnsFile()
    {
        return $this->shouldFile();
    }

    /**
     * @return VerifyJsonFile|false
     */
    public function returnsJsonFile()
    {
        return $this->shouldJsonFile();
    }

    /**
     * @return VerifyJsonString|false
     */
    public function returnsJsonString()
    {
        return $this->shouldJsonString();
    }

    /**
     * @return VerifyXmlFile|false
     */
    public function returnsXmlFile()
    {
        return $this->shouldXmlFile();
    }

    /**
     * @return VerifyXmlString|false
     */
    public function returnsXmlString()
    {
        return $this->shouldXmlString();
    }

    /**
     * @return VerifyBaseObject|false
     */
    public function returnsBaseObject()
    {
        return $this->shouldBaseObject();
    }

    /**
     * @return VerifyClass|false
     */
    public function returnsClass()
    {
        return $this->shouldClass();
    }

    /**
     * @return VerifyDirectory|false
     */
    public function returnsDirectory()
    {
        return $this->shouldDirectory();
    }

    /**
     * @return VerifyArray|false
     */
    public function returnsArray()
    {
        return $this->shouldArray();
    }

    /**
     * @return VerifyString|false
     */
    public function returnsString()
    {
        return $this->shouldString();
    }
}

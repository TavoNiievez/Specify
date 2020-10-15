<?php declare(strict_types=1);

namespace Codeception\Specify\TestCase;

use Codeception\Verify\Verifiers\VerifyArray;
use Codeception\Verify\Verifiers\VerifyBaseObject;
use Codeception\Verify\Verifiers\VerifyClass;
use Codeception\Verify\Verifiers\VerifyDirectory;
use Codeception\Verify\Verifiers\VerifyFile;
use Codeception\Verify\Verifiers\VerifyJsonFile;
use Codeception\Verify\Verifiers\VerifyJsonString;
use Codeception\Verify\Verifiers\VerifyMixed;
use Codeception\Verify\Verifiers\VerifyString;
use Codeception\Verify\Verifiers\VerifyXmlFile;
use Codeception\Verify\Verifiers\VerifyXmlString;

final class SpecifyShouldBe
{
    use
        ShouldTrait,
        ShouldThrowTrait
    ;

    public function it(): VerifyMixed
    {
        return new VerifyMixed($this->run());
    }

    public function its() :VerifyMixed
    {
        return $this->it();
    }

    public function shouldBe($value): void
    {
        $this->should($value);
    }

    public function shouldBeLike($value): void
    {
        $this->shouldLike($value);
    }

    public function shouldBeApproximately($value, float $delta): void
    {
        $this->shouldApproximately($value, $delta);
    }

    /**
     * @return VerifyFile|false
     */
    public function shouldBeFile()
    {
        return $this->shouldFile();
    }

    /**
     * @return VerifyJsonFile|false
     */
    public function shouldBeJsonFile()
    {
        return $this->shouldJsonFile();
    }

    /**
     * @return VerifyJsonString|false
     */
    public function shouldBeJsonString()
    {
        return $this->shouldJsonString();
    }

    /**
     * @return VerifyXmlFile|false
     */
    public function shouldBeXmlFile()
    {
        return $this->shouldXmlFile();
    }

    /**
     * @return VerifyXmlString|false
     */
    public function shouldBeXmlString()
    {
        return $this->shouldXmlString();
    }

    /**
     * @return VerifyBaseObject|false
     */
    public function shouldBeBaseObject()
    {
        return $this->shouldBaseObject();
    }

    /**
     * @return VerifyClass|false
     */
    public function shouldBeClass()
    {
        return $this->shouldClass();
    }

    /**
     * @return VerifyDirectory|false
     */
    public function shouldBeDirectory()
    {
        return $this->shouldDirectory();
    }

    /**
     * @return VerifyArray|false
     */
    public function shouldBeArray()
    {
        return $this->shouldArray();
    }

    /**
     * @return VerifyString|false
     */
    public function shouldBeString()
    {
        return $this->shouldString();
    }
}

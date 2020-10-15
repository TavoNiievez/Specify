<?php

use Codeception\SpecifyTestCase;

class ChocolateFactorySpec extends SpecifyTestCase
{
    protected function getSpecSubject()
    {
        return ChocolateFactory::class;
        // return new ChocolateFactory(); also works
    }

    public function testBehaviorSpec(): void
    {
        $this->callTo('willy')
            ->returns('wonka');

        $this->returnOfCalling('willy')
            ->shouldBe('wonka');

        $this->returnOfCalling('willy')
            ->it()
            ->isString()
            ->equals('wonka');
    }
}

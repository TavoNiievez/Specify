<?php

use Codeception\SpecifyTestCase;

class ExcelParserBehavior extends SpecifyTestCase
{
    protected function getSpecSubject()
    {
        return ExcelParser::class;
    }

    public function testBehaviorSpec(): void
    {
        $this->callTo('excelToArray', __DIR__.'\users.xlsx')
            ->returnsArray()
            ->notCount(60)
            ->hasKey(2)
            ->hasNotKey('password')
        ;

        $this->callTo('validateExtension', __DIR__.'\employees.xlsx')
            ->shouldNotThrow(ArgumentCountError::class);

        $this->returnOfCalling('validateExtension', __DIR__.'\users.xlsx')
            ->shouldBe(true)
        ;
    }
}


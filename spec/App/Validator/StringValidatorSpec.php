<?php

namespace spec\App\Validator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringValidatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Validator\StringValidator');
    }

    public function it_should_return_true_if_passed_a_string()
    {
        $this->validate('foo')->shouldReturn(true);
    }

    public function it_should_return_false_if_passed_an_intager()
    {
        $this->validate(10)->shouldReturn(false);
    }

    public function it_should_return_false_if_passed_an_array()
    {
        $this->validate([])->shouldReturn(false);
    }

    public function it_should_return_false_if_passed_an_class()
    {
        $this->validate(new \stdClass)->shouldReturn(false);
    }
}

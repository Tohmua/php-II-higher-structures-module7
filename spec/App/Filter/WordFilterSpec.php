<?php

namespace spec\App\Filter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordFilterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Filter\WordFilter');
    }

    public function it_should_return_a_string_if_passed_an_integer()
    {
        $this->filter(12)->shouldReturn('12');
    }

    public function it_should_return_a_string_if_passed_a_string()
    {
        $this->filter('Monkey')->shouldReturn('Monkey');
    }

    public function it_should_return_a_long_string_if_passed_a_string()
    {
        $this->filter('Monkey Foo Bar')->shouldReturn('Monkey Foo Bar');
    }
}

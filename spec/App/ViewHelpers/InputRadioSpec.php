<?php

namespace spec\App\ViewHelpers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputRadioSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\ViewHelpers\InputRadio');
    }

    public function it_should_return_nothing_if_no_values_set()
    {
        $this->display()->shouldReturn('');
    }

    public function it_should_return_one_input_if_value_is_set()
    {
        $this->beConstructedWith('name', ['value']);
        $this->display()->shouldReturn('<input type="radio" name="name" value="value" />');
    }

    public function it_should_return_two_input_if_two_values_set()
    {
        $this->beConstructedWith('name', ['value1', 'value2']);
        $this->display()->shouldReturn('<input type="radio" name="name" value="value1" />' . PHP_EOL . '<input type="radio" name="name" value="value2" />');
    }

    public function it_should_return_three_input_if_three_values_set_with_one_selected()
    {
        $this->beConstructedWith('name', ['value1', 'value2', 'value3'], 'value3');
        $this->display()->shouldReturn('<input type="radio" name="name" value="value1" />' . PHP_EOL . '<input type="radio" name="name" value="value2" />' . PHP_EOL . '<input type="radio" name="name" value="value3" checked />');
    }
}

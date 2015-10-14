<?php

namespace spec\App\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class ElementFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Elements\ElementFactory');
    }

    public function it_should_return_input_text()
    {
        $this::make('InputText', 'test')->shouldHaveType('App\Elements\InputText');
    }

    public function it_should_take_custom_view_helper()
    {
        $viewHelper = (new Prophet())->prophesize('App\ViewHelpers\ViewHelper');

        $this::make('InputText', 'test', $viewHelper->reveal())->shouldHaveType('App\Elements\InputText');
    }

    public function it_should_throw_error_with_invalid_field()
    {
        $this->shouldThrow('App\Elements\ElementException')->during('make', ['foo', 'bar']);
    }
}

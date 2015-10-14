<?php

namespace spec\App\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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

    public function it_should_throw_error_with_invalid_field()
    {
        $this->shouldThrow('App\Elements\ElementException')->during('make', ['foo', 'bar']);
    }
}

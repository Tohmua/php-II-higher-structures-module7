<?php

namespace spec\App\FormBuilder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class FormSpec extends ObjectBehavior
{
    private $prophet;

    public function let()
    {
        $this->prophet = new Prophet();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('App\FormBuilder\Form');
    }

    public function it_should_add_and_retreive_elements()
    {
        $inputText = $this->prophet->prophesize('App\Elements\InputText');
        $inputText = $inputText->reveal();

        $this->addElement($inputText);
        $this->elements()->shouldReturn([$inputText]);
    }

    public function it_should_hydrate()
    {
        $inputText = $this->prophet->prophesize('App\Elements\InputText');
        $inputText->hydrate(['foo', 'bar'])->willReturn(true);
        $inputText = $inputText->reveal();

        $this->addElement($inputText);
        $this->hydrate(['foo', 'bar'])->shouldReturn(null);
    }
}

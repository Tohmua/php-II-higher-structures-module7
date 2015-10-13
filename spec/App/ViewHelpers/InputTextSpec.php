<?php

namespace spec\App\ViewHelpers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputTextSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\ViewHelpers\InputText');
    }

    public function it_should_return_an_input_field()
    {
        $this->beConstructedWith();
        $this->display()->shouldReturn('<input type="text" name="" id="" class="" />');
    }

    public function it_should_return_an_input_field_with_name()
    {
        $this->beConstructedWith('name');
        $this->display()->shouldReturn('<input type="text" name="name" id="" class="" />');
    }

    public function it_should_return_an_input_field_with_name_and_id()
    {
        $this->beConstructedWith('name', 'id');
        $this->display()->shouldReturn('<input type="text" name="name" id="id" class="" />');
    }

    public function it_should_return_an_input_field_name_and_id_and_class()
    {
        $this->beConstructedWith('name', 'id', 'class');
        $this->display()->shouldReturn('<input type="text" name="name" id="id" class="class" />');
    }
}

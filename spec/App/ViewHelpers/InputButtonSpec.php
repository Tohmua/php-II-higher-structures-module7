<?php

namespace spec\App\ViewHelpers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputButtonSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\ViewHelpers\InputButton');
    }

    public function it_should_create_a_button_with_a_name()
    {
        $this->beConstructedWith('name');
        $this->display()->shouldReturn('<input type="button" name="name" value="" id="" class="" />');
    }

    public function it_should_create_a_button_with_a_name_and_value()
    {
        $this->beConstructedWith('name', 'value');
        $this->display()->shouldReturn('<input type="button" name="name" value="value" id="" class="" />');
    }

    public function it_should_create_a_button_with_a_name_and_value_and_id()
    {
        $this->beConstructedWith('name', 'value', 'id');
        $this->display()->shouldReturn('<input type="button" name="name" value="value" id="id" class="" />');
    }

    public function it_should_create_a_button_with_a_name_and_value_and_id_and_class()
    {
        $this->beConstructedWith('name', 'value', 'id', 'class');
        $this->display()->shouldReturn('<input type="button" name="name" value="value" id="id" class="class" />');
    }
}

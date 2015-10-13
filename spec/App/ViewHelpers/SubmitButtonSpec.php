<?php

namespace spec\App\ViewHelpers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmitButtonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\ViewHelpers\SubmitButton');
    }

    public function it_should_create_a_submit_button_with_a_name()
    {
        $this->beConstructedWith('name');
        $this->__toString()->shouldReturn('<input type="submit" name="name" value="" id="" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_name_and_value()
    {
        $this->beConstructedWith('name', 'value');
        $this->__toString()->shouldReturn('<input type="submit" name="name" value="value" id="" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_name_and_value_and_id()
    {
        $this->beConstructedWith('name', 'value', 'id');
        $this->__toString()->shouldReturn('<input type="submit" name="name" value="value" id="id" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_name_and_value_and_id_and_class()
    {
        $this->beConstructedWith('name', 'value', 'id', 'class');
        $this->__toString()->shouldReturn('<input type="submit" name="name" value="value" id="id" class="class" />');
    }
}

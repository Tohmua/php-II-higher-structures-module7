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
        $this->display(['name' => 'name'])->shouldReturn('<input type="button" name="name" value="" id="" class="" />');
    }

    public function it_should_create_a_button_with_a_value()
    {
        $this->display(['value' => 'value'])->shouldReturn('<input type="button" name="" value="value" id="" class="" />');
    }

    public function it_should_create_a_button_with_a_id()
    {
        $this->display(['id' => 'id'])->shouldReturn('<input type="button" name="" value="" id="id" class="" />');
    }

    public function it_should_create_a_button_with_a_class()
    {
        $this->display(['class' => 'class'])->shouldReturn('<input type="button" name="" value="" id="" class="class" />');
    }
}

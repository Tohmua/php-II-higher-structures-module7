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
        $this->display(['name' => 'name'])->shouldReturn('<input type="submit" name="name" value="" id="" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_value()
    {
        $this->display(['value' => 'value'])->shouldReturn('<input type="submit" name="" value="value" id="" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_id()
    {
        $this->display(['id' => 'id'])->shouldReturn('<input type="submit" name="" value="" id="id" class="" />');
    }

    public function it_should_create_a_submit_button_with_a_class()
    {
        $this->display(['class' => 'class'])->shouldReturn('<input type="submit" name="" value="" id="" class="class" />');
    }
}

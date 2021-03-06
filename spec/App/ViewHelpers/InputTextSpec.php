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
        $this->display([])->shouldReturn('<label for=""></label><input type="text" name="" id="" class="" value="" />');
    }

    public function it_should_return_an_input_field_with_name()
    {
        $this->display(['name' => 'name'])->shouldReturn('<label for="">name</label><input type="text" name="name" id="" class="" value="" />');
    }

    public function it_should_return_an_input_field_with_id()
    {
        $this->display(['id' => 'id'])->shouldReturn('<label for="id"></label><input type="text" name="" id="id" class="" value="" />');
    }

    public function it_should_return_an_input_field_with_class()
    {
        $this->display(['class' => 'class'])->shouldReturn('<label for=""></label><input type="text" name="" id="" class="class" value="" />');
    }

    public function it_should_return_an_input_field_with_value()
    {
        $this->display(['value' => 'value'])->shouldReturn('<label for=""></label><input type="text" name="" id="" class="" value="value" />');
    }
}

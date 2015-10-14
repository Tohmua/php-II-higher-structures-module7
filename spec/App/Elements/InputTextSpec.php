<?php

namespace spec\App\Elements;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;

class InputTextSpec extends ObjectBehavior
{
    private $prophet;

    public function let()
    {
        $this->prophet = new Prophet();
        $prophacy = $this->prophet->Prophesize('App\ViewHelpers\InputText');

        $prophacy->display(['name' => 'test'])->willReturn('<input type="text" name="test" id="" class="" value="" />');

        $this->beConstructedWith('test', $prophacy->reveal());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Elements\InputText');
    }

    public function it_should_display()
    {
        $this->display()->shouldReturn('<input type="text" name="test" id="" class="" value="" />');
    }

    public function it_should_not_hydrate_if_invalid_value_given()
    {
        $this->shouldThrow('App\Elements\ElementException')->during('hydrate', [['foo' => 'bar']]);
    }

    public function it_should_hydrate()
    {
        $this->hydrate(['test' => 'foo'])->shouldReturn(NULL);
        $this->get()->shouldReturn('foo');
    }

    public function it_should_loop_through_filters()
    {
        $filter = $this->prophet->Prophesize('App\Filter\WordFilter');
        $filter->willImplement('App\Filter\Filter');
        $filter->filter('foo')->willReturn('bar');

        $this->addFilter($filter->reveal());
        $this->hydrate(['test' => 'foo']);

        $this->get()->shouldReturn('bar');
    }

    public function it_should_loop_through_validators_and_pass_validation()
    {
        $validator = $this->prophet->Prophesize('App\Validator\StringValidator');
        $validator->willImplement('App\Validator\Validator');
        $validator->validate('foo')->willReturn(true);

        $this->addValidator($validator->reveal());
        $this->hydrate(['test' => 'foo']);

        $this->get()->shouldReturn('foo');
    }

    public function it_should_loop_through_validators_and_throw_exception_on_fail()
    {
        $validator = $this->prophet->Prophesize('App\Validator\StringValidator');
        $validator->willImplement('App\Validator\Validator');
        $validator->validate('foo')->willReturn(false);
        $validator->getError()->willReturn('StringValidator failed');

        $this->addValidator($validator->reveal());
        $this->shouldThrow('App\Elements\ElementException')->during('hydrate', [['test' => 'foo']]);
    }
}

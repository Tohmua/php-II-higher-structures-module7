<?php

namespace spec\App\Filter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailFilterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Filter\EmailFilter');
    }

    public function it_should_return_valid_charictors()
    {
        $this->filter('qwertyuioplkjhgfdsazxcvbnm0123456789!#$%&\'*+-=?^_`{|}~@.[].')
             ->shouldReturn('qwertyuioplkjhgfdsazxcvbnm0123456789!#$%&\'*+-=?^_`{|}~@.[].');
    }

    public function it_should_not_return_invalid_charictors()
    {
        $this->filter('a a"a')->shouldReturn('aaa');
    }
}

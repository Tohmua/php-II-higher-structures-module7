<?php

namespace spec\App\Validator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailValidatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Validator\EmailValidator');
    }

    public function it_should_validate_a_valid_email()
    {
        $this->validate('test@test.com')->shouldReturn(true);
    }

    public function it_should_fail_validating_invalid_emails()
    {
        $invalidEmails = [
            'localpart.ending.with.dot.@example.com',
            '(comment)localpart@example.com',
            '"this is v@lid!"@example.com',
            '"much.more unusual"@example.com',
            'postbox@com',
            'admin@mailserver1',
            '"()<>[]:,;@\"\\!#$%&\'*+-/=?^_`{}| ~.a"@example.org',
            '" "@example.org',
        ];

        foreach ($invalidEmails as $email) {
            $this->validate($email)->shouldReturn(false);
        }
    }
}

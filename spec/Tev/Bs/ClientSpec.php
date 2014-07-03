<?php

namespace spec\Tev\Bs;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('gibberish', 'gibberish', 'gibberish');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Tev\Bs\Client');
    }
}

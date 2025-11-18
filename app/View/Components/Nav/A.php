<?php

namespace App\View\Components\Nav;

use Illuminate\View\Component;
use Illuminate\View\View;

class A extends Component
{
    public function __construct(
        public mixed $when = true,
    ) {}

    public function shouldRender(): bool
    {
        return (bool) $this->when;
    }

    public function render(): View
    {
        return view('components.nav.a');
    }
}

<?php

declare(strict_types=1);

namespace Core\App\InputFilter;

use Frontend\App\InputFilter\Input\CsrfInput;
use Laminas\InputFilter\InputFilter;

/**
 * @template TFilteredValues
 * @extends InputFilter<TFilteredValues>
 */
abstract class AbstractInputFilter extends InputFilter
{
    public function init(): self
    {
        return $this
        ->add(new CsrfInput('createContractCsrf', false));
    }
}

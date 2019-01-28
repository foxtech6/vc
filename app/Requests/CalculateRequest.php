<?php

namespace App\Requests;

use Foxtech\Kernel\AbstractRequestHandler;

/**
 * Class CalculateRequest
 *
 * @author Mykhailo Bavdys <bavdysmyh@ukr.net>
 * @since 28.01.2019
 */
class CalculateRequest extends AbstractRequestHandler
{
    /**
     * {@inheritdoc}
     * @see AbstractRequestHandler::rules()
     */
    public function rules(): array
    {
        return [
            'estimated' => 'number|max:100000|min:100',
            'tax'       => 'number|max:100|min:0',
            'number'    => 'number|max:12|min:1',
        ];
    }
}

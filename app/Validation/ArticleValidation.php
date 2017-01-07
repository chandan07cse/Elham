<?php
namespace Elham\Validation;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException as Exceptions;
class ArticleValidation{

    protected $rules=[];
    protected $errors = [];

    public function __construct()
    {
        $this->initRules();
    }

    public function initRules()
    {
        /* Go to below link & grab the rules
         * https://github.com/Respect/Validation/blob/master/docs/VALIDATORS.md
         * ordering necessary for ordering output
         * */

        $this->rules['caption'] = v::notEmpty()->length(5, 100)->setName('caption');
        $this->rules['description'] = v::notEmpty()->length(20,1000)->setName('description');
    }

    public function validate(array $inputs)
    {
        foreach ($this->rules as $rule => $validator) {
            try {
                $validator->assert(array_get($inputs, $rule));
            } catch (Exceptions $e) {
                $this->errors = array($rule => $e->getMessages());
                return false;
            }
        }
    }
    public function errors()
    {
        return $this->errors;
    }
}
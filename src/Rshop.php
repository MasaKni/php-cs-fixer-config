<?php
namespace Rshop\CS\Config;

use PhpCsFixer\Config;

class Rshop extends Config
{
    /** @var string */
    private $header;

    /** @var bool */
    private $strict = false;

    /**
     * @param string $header
     */
    public function __construct($header = null)
    {
        $this->header = $header;

        parent::__construct('rshop');

        $this->setRiskyAllowed(true);
    }

    /**
     * @return $this
     */
    public function setStrict()
    {
        $this->strict = true;

        return $this;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            '@Symfony' => true,
            'array_syntax' => [
                'syntax' => 'short'
            ],
            'concat_space' => [
                'spacing' => 'one'
            ],
            'declare_strict_types' => $this->strict,
            'hash_to_slash_comment' => false,
            'is_null' => [
                'use_yoda_style' => false
            ],
            'no_multiline_whitespace_before_semicolons' => true,
            'no_null_property_initialization' => true,
            'no_php4_constructor' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => [
                'order' => ['use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'method_public', 'method_protected', 'method_private', 'magic', 'phpunit']
            ],
            'ordered_imports' => [
                'sortAlgorithm' => 'alpha'
            ],
            'phpdoc_add_missing_param_annotation' => [
                'only_untyped' => false
            ],
            'phpdoc_order' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last'
            ],
            'protected_to_private' => false,
            'ternary_to_null_coalescing' => true,
            'trailing_comma_in_multiline_array' => false,
            'yoda_style' => [
                'equal' => false,
                'identical' => false,
                'less_and_greater' => false
            ]
        ];

        if (!$this->strict) {
            $rules['no_blank_lines_before_namespace'] = true;
            $rules['single_blank_line_before_namespace'] = false;
        }

        if ($this->header !== null) {
            $rules['header_comment'] = [
                'commentType' => 'PHPDoc',
                'header' => $this->header,
                'location' => 'after_open',
                'separate' => 'bottom'
            ];
        }

        return $rules;
    }
}

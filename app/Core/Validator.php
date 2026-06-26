<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Rule-based validator. Rules are pipe-delimited, e.g. 'required|email|max:120'.
 */
final class Validator
{
    /** @var array<string, array<int, string>> */
    private array $errors = [];

    public function __construct(
        private readonly array $data,
        private readonly array $rules,
    ) {
    }

    public static function make(array $data, array $rules): self
    {
        return new self($data, $rules);
    }

    public function passes(): bool
    {
        foreach ($this->rules as $field => $ruleString) {
            foreach (explode('|', $ruleString) as $rule) {
                [$name, $param] = array_pad(explode(':', $rule, 2), 2, null);
                $this->applyRule($field, $name, $param);
            }
        }
        return $this->errors === [];
    }

    public function fails(): bool
    {
        return !$this->passes();
    }

    /** @return array<string, array<int, string>> */
    public function errors(): array
    {
        return $this->errors;
    }

    private function applyRule(string $field, string $name, ?string $param): void
    {
        $value = $this->data[$field] ?? null;

        switch ($name) {
            case 'required':
                if ($value === null || $value === '') {
                    $this->add($field, ucfirst($field) . ' is required.');
                }
                break;
            case 'email':
                if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->add($field, 'Enter a valid email address.');
                }
                break;
            case 'min':
                if ($value !== null && mb_strlen((string) $value) < (int) $param) {
                    $this->add($field, ucfirst($field) . " must be at least {$param} characters.");
                }
                break;
            case 'max':
                if ($value !== null && mb_strlen((string) $value) > (int) $param) {
                    $this->add($field, ucfirst($field) . " may not exceed {$param} characters.");
                }
                break;
            case 'numeric':
                if ($value !== null && $value !== '' && !is_numeric($value)) {
                    $this->add($field, ucfirst($field) . ' must be a number.');
                }
                break;
            case 'same':
                if ($value !== ($this->data[$param] ?? null)) {
                    $this->add($field, ucfirst($field) . " must match {$param}.");
                }
                break;
            case 'in':
                $options = explode(',', (string) $param);
                if ($value !== null && $value !== '' && !in_array($value, $options, true)) {
                    $this->add($field, ucfirst($field) . ' is invalid.');
                }
                break;
        }
    }

    private function add(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }
}

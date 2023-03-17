<?php

function toOnlyNumbers($value = null): string | null
{
    return !empty($value) ? preg_replace('/[^0-9]/', '', $value) : null;
}

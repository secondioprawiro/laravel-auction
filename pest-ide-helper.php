<?php

namespace {
    class PestFixer {
        public function __call($name, $args) { return $this; }
        public function __get($name) { return $this; }
    }

    if (!function_exists('test')) {
        function test($description, $closure = null) { return new PestFixer(); }
    }
    
    if (!function_exists('it')) {
        function it($description, $closure = null) { return new PestFixer(); }
    }

    if (!function_exists('expect')) {
        function expect($value) { return new PestFixer(); }
    }

    if (!function_exists('uses')) {
        function uses(...$classes) {}
    }
}
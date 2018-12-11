<?php
error_reporting(E_ERROR);

class B {
    /**
     * @param string $p
     * @return string
     */
    function g($p) {
        if (!$p) {
            return null;
        }
        return $p;
    }
}

class C extends B {
    function f($p) {
        return $this->$p[0];
    }

    /**
     * @param int $p
     * @return int
     */
    function g($p) {
        $this->p = $p;
        $this->property = [42];
        return $this->f($p);
    }

}

print (new C)->g('property' . $undeclared_global) . "\n";

// /example02.php:11 PhanTypeMismatchReturn Returning type null but g() is declared to return string
// /example02.php:19 PhanCompatiblePHP7 Expression may not be PHP 7 compatible
// /example02.php:26 PhanParamSignatureMismatch Declaration of function g(int $p) : int should be compatible with function g(string $p) : string defined in /example02.php:9
// /example02.php:27 PhanUndeclaredProperty Reference to undeclared property \C->p
// /example02.php:28 PhanUndeclaredProperty Reference to undeclared property \C->property
// /example02.php:34 PhanTypeMismatchArgument Argument 1 (p) is string but \C::g() takes int defined at /example02.php:26
// /example02.php:34 PhanUndeclaredVariable Variable $undeclared_global is undeclared
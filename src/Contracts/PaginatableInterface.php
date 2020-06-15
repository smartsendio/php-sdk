<?php

namespace Smartsendio\Api\Contracts;

interface PaginatableInterface
{
    /**
     * Set the page.
     *
     * Note that the retun type hint has been intentionally omitted to support pre PHP7.4 versions.
     * The return of this method should be the class itself (subclass of PaginatableInterface) and not just any class
     * implementing the PaginatableInterface. This is called covariance and was not supported until PHP7.4 - For more
     * information see: https://stackoverflow.com/questions/39068983/php-7-interfaces-return-type-hinting-and-self
     *
     * @param  int  $page
     * @return self
     */
    public function page(int $page);
}

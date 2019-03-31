<?php

/**
 * Protected API routes
 */
$this->group(['middleware' => ['jwt.verify']], function () {

});

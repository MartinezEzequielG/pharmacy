<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('identificationclass_index', new Route(
    '/',
    array('_controller' => 'AppBundle:IdentificationClass:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('identificationclass_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:IdentificationClass:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('identificationclass_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:IdentificationClass:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('identificationclass_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:IdentificationClass:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('identificationclass_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:IdentificationClass:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('city_index', new Route(
    '/',
    array('_controller' => 'AppBundle:City:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('city_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:City:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('city_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:City:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('city_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:City:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('city_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:City:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

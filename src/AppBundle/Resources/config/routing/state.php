<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('state_index', new Route(
    '/',
    array('_controller' => 'AppBundle:State:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('state_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:State:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('state_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:State:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('state_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:State:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('state_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:State:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

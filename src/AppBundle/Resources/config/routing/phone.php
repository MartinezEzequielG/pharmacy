<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('phone_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Phone:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('phone_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Phone:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('phone_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Phone:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('phone_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Phone:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('phone_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Phone:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

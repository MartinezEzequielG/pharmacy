<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('address_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Address:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('address_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Address:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('address_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Address:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('address_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Address:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('address_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Address:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

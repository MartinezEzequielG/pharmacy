<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('identification_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Identification:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('identification_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Identification:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('identification_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Identification:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('identification_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Identification:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('identification_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Identification:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

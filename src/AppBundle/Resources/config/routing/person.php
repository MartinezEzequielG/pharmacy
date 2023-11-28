<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('person_index', new Route(
    '/',
    array('_controller' => 'AppBundle:Person:index'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('person_show', new Route(
    '/{id}/show',
    array('_controller' => 'AppBundle:Person:show'),
    array(),
    array(),
    '',
    array(),
    array('GET')
));

$collection->add('person_new', new Route(
    '/new',
    array('_controller' => 'AppBundle:Person:new'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('person_edit', new Route(
    '/{id}/edit',
    array('_controller' => 'AppBundle:Person:edit'),
    array(),
    array(),
    '',
    array(),
    array('GET', 'POST')
));

$collection->add('person_delete', new Route(
    '/{id}/delete',
    array('_controller' => 'AppBundle:Person:delete'),
    array(),
    array(),
    '',
    array(),
    array('DELETE')
));

return $collection;

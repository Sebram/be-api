<?php
namespace App\Api\Serializer\Listener;

use JMS\Serializer\EventDispatcher\Events;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;

Class ArticleListener implements EventSubscriberInterface{
	
	public static function getSubscribedEvents() {
		return [
			[
				'event' => Events::POST_SERIALIZE,
				'format' => 'json',
				'class' => 'App\Api\Entity\Article',
				'method' => 'onPostSerialize',
			]
		];
	}

	public static function onPostSerialize(ObjectEvent $event) {
	 	
	 	$date = new \Datetime();

	 	$event->getVisitor()->addData('serialized_at', $date->format('l jS \of F Y h:s:i'));

	}
}
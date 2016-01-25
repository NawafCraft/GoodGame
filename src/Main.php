<?php

namespace ArrowParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\Entity\EntityShootBowEvent;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\particle\DustParticle;
use pocketmine\player;

class Main extends PluginBase implements Listener{

        public function OnEnable() {
                $this->getLogger()->info("§dArrowParticle §aPlugin Has been Enabled!");
        }
        
        public function OnDisable() {
                $this->getLogger()->info("§dArrowParticle §cPlugin Has Benn Disabled!");
        }
        
        public function onsb(EntityShootBowEvent $ev) {
	        if ($ev->isCancelled()) return;
	        $damage = $ev->getDamage();
	        $player = $ev->getEntity();
	        if (!($player instanceof Player)) return;
	              
	        for ($i=0;$i<$damage;$i++) {
		        $player->getLevel()->addParticle(new DustParticle(self::randVector($player),(mt_rand()/mt_getrandmax())*2));
		        $player->getLevel()->addSound(new ClickSound($player));
	              }
        }
        
        public function OnDeath(PlayerDeathEvent $event) {
        	$event->getlevel()->addSound(new FizzSound($player));
                $event->sendMessage("§c Birisi öldü :( ?");
        }
}
// this plugin not tested!

<?php

namespace GoodGame;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\Entity\EntityShootBowEvent;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\particle\DustParticle;
use pocketmine\player;

class Main extends PluginBase implements Listener{

        public function OnLoad() {
                $this->getLogger()->info("§GoodGame §ePlugin Loading...!");
        }
        
        public function OnEnable() {
                $this->getLogger()->info("§GoodGame §aPlugin Has been Enabled!");
        }
        
        public function OnDisable() {
                $this->getLogger()->info("§GoodGame §cPlugin Has Benn Disabled!");
        }
        ////////////
       ///EVENTS///
      ////////////
      
        public function OnDeath(PlayerDeathEvent $event) {
        	$event->getlevel()->addSound(new FizzSound($player));
                $event->getPlayer()->sendMessage("§7================");
                $event->getPlayer()->sendMessage("§7==§cYOU DIED!§7==");
                $event->getPlayer()->sendMessage("§7================");
        }
        
        public function OnDeath(PlayerDeathEvent $event) {
        	$event->getlevel()->addSound(new FizzSound($player));
                $event->sendMessage("§a Welcome to the §bAWESOME §eServer!");
                $event->getlevel()->addParticle(new Dustparticle($player));//test :D
        }
        
        public function onHold(PlayerItemHeldEvent $event){
            if($event->getItem()->getId() == 276){
                $event->getPlayer()->sendPopup(TextFormat:: AQUA . "Your Inventory Clearing...");
                $event->getPlayer()->getInventory()->clearAll();
            }
            if($event->getItem()->getId() == 280){
                $event->getPlayer()->sendPopup("¬ßdMelting Wand");
            }
        }

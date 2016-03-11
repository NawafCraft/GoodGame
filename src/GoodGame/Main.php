<?php

namespace GoodGame;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\PopSound;
use pocketmine\level\particle\DustParticle;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\Player;
use pocketmine\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener
{
        
        public function OnEnable(){
                $this->getLogger()->info("[§eGood§bGame] §aPlugin Has been Enabled!");
        }
        
        public function OnLoad() {
                $this->getLogger()->info("[§eGood§bGame] §ePlugin Loading...!");
        }
        
        public function OnDisable() {
                $this->getLogger()->info("[§eGood§bGame] §cPlugin Has been Disabled!");
        }
        ////////////
       ///EVENTS///
      ////////////
      
        public function OnDeath(PlayerDeathEvent $event){
                $player = $event->getPlayer();
        	$player->getLevel()->addSound(new FizzSound($player));
                $player->sendMessage("§7================");
                $player->sendMessage("§7==§cYOU DIED!§7==");
                $player->sendMessage("§7================");
        }
        
        public function OnRespawn(PlayerRespawnEvent $event){
                $player = $event->getPlayer();
        	$player->getLevel()->addSound(new BatSound($player));
        	$player->sendMessage("§aRespawned!");
        }
        
        public function OnJoin(PlayerJoinEvent $event){
                $player = $event->getPlayer();
        	$player->getLevel()->addSound(new BatSound($player));
                $player->sendTip("§a Welcome to the §bAWESOME §eServer!");
                $player->getlevel()->addParticle(new DustParticle($player));
        }
        
        public function onHold(PlayerItemHeldEvent $event){
                $player = $event->getPlayer();
            if($player->getItem()->getId() == 46){
                $player->sendPopup(TextFormat:: AQUA . "Your Inventory Clearing...");
                $player->getInventory()->clearAll();
            }
            if($player->getItem()->getId() == 347){
                $player->sendPopup("§a(Returning to Hub...");
                //$player->teleport coming soon..
                
            }
        }
        
        public function OnDrop(PlayerDropItemEvent $event) {
                $player = $event->getPlayer();
                $player->sendTip("§Dropping Item..");
                $player->getLevel()->addSound(new PopSound($player));
                $player->getLevel()->addParticle(new FlameParticle($player));
        }
        
        public function OnChat(PlayerChatEvent $event){
                $player = $event->getPlayer();
                $player->getLevel()->addSound(new ClickSound());
                $player->sendPopUp("§aChatting..");
        }
}

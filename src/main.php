<?php

namespace ArrowParticle;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\player;

class Main extends PluginBase implements Listener{

public function OnEnable(){
  $this->getLogger()->info("§dArrowParticle §aPlugin Has been Enabled!"),
}

public function OnDisable(){
  4this->getLogger()->info("§dArrowParticle §cPlugin Has Benn Disabled!");
}

public function OnShot(){
  $this->getItem(OnUse) == 262 {
    // to be countine..
  }
}

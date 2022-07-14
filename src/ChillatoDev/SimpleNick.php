<?php

namespace ChillatoDev;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class SimpleNick extends PluginBase implements Listener {

    public function onEnable(): void
    {
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if($sender instanceof Player){
            switch($command->getName()){
                case "nick":
                    if(count($args) > 1 || empty($args)){
                        $sender->sendMessage("§l§eNick §7>> §cUsage: /nick [nick]");
                        return false;
                    } else {
                        $sender->setDisplayName($args[0]);
                        $sender->setNameTag($args[0]);
                        $sender->sendMessage("§l§eNick §7>> §ayour nick has changed to {$args[0]}");
                    }
                    break;
                case "nickreset":
                    $sender->setDisplayName($sender->getName());
                    $sender->setNameTag($sender->getName());
                    $sender->sendMessage("§l§eNick §7>> §ayour nick has been reset");
            }
            return true;
        }
        return true;
    }
}

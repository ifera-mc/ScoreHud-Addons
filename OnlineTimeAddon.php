<?php

declare(strict_types = 1);
/**
 * @name OnlineTimeAddon
 * @main JackMD\ScoreHud\Addons\OnlineTimeAddon
 * @depend OnlineTime
 */
namespace JackMD\ScoreHud\Addons {

    use JackMD\ScoreHud\addon\AddonBase;
    use pocketmine\Player;
    use Zedstar16\OnlineTime\Main;

    class OnlineTimeAddon extends AddonBase{

        /** @var OnlineTime */
        private $onlinetime;

        public function onEnable() : void{
            $this->onlinetime = $this->getServer()->getPluginManager()->getPlugin("OnlineTime");
        }

        /**
         * @param Player $player
         * @return array
         */
        public function getProcessedTags(Player $player): array{
            return [
                "{total_time}"   => $this->getTotal($player->getName()),
                "{session_time}" => $this->getSession($player->getName()),
            ];
        }

        public function getTotal($pn){
            $pn = strtolower($pn);
            return isset(Main::$times[$pn]) ? $this->onlinetime->getTotalTime($pn) : "Error";
        }

        public function getSession($pn){
            $pn = strtolower($pn);
            return isset(Main::$times[$pn]) ? $this->onlinetime->getSessionTime($pn) : "Error";
        }

    }
}

<?php

/**
 * @name BravoClanAddon
 * @version 1.1
 * @main    JackMD\ScoreHud\Addons\BravoClanAddon
 */

namespace JackMD\ScoreHud\Addons
{
    use Itzdvbravo\BravoClan\Main;
    use JackMD\ScoreHud\addon\AddonBase;
    use pocketmine\Player;

    class BravoClanAddon extends AddonBase {

        /** @var BravoClan */
        private $BravoClan;

        public function onEnable(): void{
            $this->BravoClan = $this->getServer()->getPluginManager()->getPlugin("BravoClan");
        }

        /**
         * @param Player $player
         * @return array
         */
        public function getProcessedTags(Player $player): array{
            return [
                "{clan}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan"),
                "{clan_xp}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_xp"),
                "{clan_next_lvl}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_next_lvl"),
                "{clan_kills}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_kills"),
                "{clan_deaths}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_deaths"),
                "{clan_members}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_members"),
                "{clan_max_members}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "clan_max_members"),
                "{member_kills}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "member_kills"),
                "{member_deaths}" => $this->BravoClan->scorehudAddon(strtolower($player->getName()), "member_deaths"),
            ];
        }
    }
}

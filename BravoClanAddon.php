<?php

/**
 * @name BravoClanAddon
 * @version 0.0.1
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
                "{clan}" => $this->BravoClan->scorehudAddon(strtolower($player->getName())),
            ];
        }
    }
}

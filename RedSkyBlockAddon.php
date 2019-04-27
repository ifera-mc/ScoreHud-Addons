<?php

/**
 * @name RedSkyBlockAddon
 * @version 1.0.0
 * @main JackMD\ScoreHud\Addons\RedSkyBlockAddon
 * @depend RedSkyBlock
 * @api 3.0.0
 */

namespace JackMD\ScoreHud\Addons {

  use JackMD\ScoreHud\addon\AddonBase;
  use RedCraftPE\RedSkyBlock\SkyBlock;
  use pocketmine\Player;

  class RedSkyBlockAddon extends AddonBase {

    private $redSkyBlockAPI;

    public function onEnable(): void {

      $this->redSkyBlockAPI = $this->getServer()->getPluginManager()->getPlugin("RedSkyBlock");
    }
    public function getProcessedTags(Player $player): array {
      return [
        "{island_name}" => $this->redSkyBlockAPI->getIslandName($player),
        "{island_members}" => $this->redSkyBlockAPI->getMembers($player),
        "{island_banned}" => $this->redSkyBlockAPI->getBanned($player),
        "{island_locked_status}" => $this->redSkyBlockAPI->getLockedStatus($player),
        "{island_size}" => $this->redSkyBlockAPI->getSize($player),
        "{island_rank}" => $this->redSkyBlockAPI->calcRank(strtolower($player->getName())),
        "{island_value}" => $this->redSkyBlockAPI->getValue($player)
      ];
    }
  }
}

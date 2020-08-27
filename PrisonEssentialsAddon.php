<?php

/**
 * @name PrisonEssentialsAddon
 * @version 1.0.0
 * @main JackMD\ScoreHud\Addons\PrisonEssentialsAddon
 * @depend PrisonEssentials
 */
namespace JackMD\ScoreHud\Addons
{
	use JackMD\ScoreHud\addon\AddonBase;
	use Prison\Main;
	use Prison\EventListener;
	use PrisonEssentials\Players;
	use pocketmine\Player;

	class PrisonEssentialsAddon extends AddonBase{

		/** @var PrisonEssentials */
		private $PrisonEssentials;

		public function onEnable(): void{
			$this->PrisonEssentials = $this->getServer()->getPluginManager()->getPlugin("PrisonEssentials");
		}

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			return [
				"{prison_rank}" => $this->PrisonEssentials->getRank($player),
				"{prison_nextrank}" => $this->PrisonEssentials->getNextRank($player),
				"{price_to_rankup}" => $this->PrisonEssentials->calculateMoney($player),
				"{prestige}" => $this->PrisonEssentials->getPrestige($player),
				"{next_prestige}" => $this->PrisonEssentials->getNextPrestige($player),
			];
		}
	}
}

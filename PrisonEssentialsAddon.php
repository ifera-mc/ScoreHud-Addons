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
				"{prison_money_till_next_rank}" => $this->PrisonEssentials->calculateMoney($player),
			];
		}
	}
}
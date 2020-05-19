<?php
declare(strict_types = 1);

/**
 * @name ParoxityEconAddon
 * @version 1.0.0
 * @main    JackMD\ScoreHud\Addons\ParoxityEconAddon
 * @depend ParoxityEcon
 * @api 3.0.0
 */

namespace JackMD\ScoreHud\Addons
{

	use JackMD\ScoreHud\addon\AddonBase;
	use Paroxity\ParoxityEcon\Cache\ParoxityEconCache;
	use pocketmine\Player;

	class ParoxityEconAddon extends AddonBase{

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			return [
				"{money}" => ParoxityEconCache::getMoney($player)
			];
		}
	}
}

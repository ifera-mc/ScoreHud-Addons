<?php

declare(strict_types=1);

/**
 * @name BlockSniperAddon
 * @main BlockHorizons\ScoreHud\Addons\BlockSniperAddon
 * @depend BlockSniper
 * @api 4.0.0
 */
namespace BlockHorizons\ScoreHud\Addons {

	use BlockHorizons\BlockSniper\brush\Brush;
	use BlockHorizons\BlockSniper\sessions\SessionManager;
	use JackMD\ScoreHud\addon\AddonBase;
	use pocketmine\Player;

	class BlockSniperAddon extends AddonBase{

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			$session = SessionManager::getPlayerSession($player);
			$shape = $type = $mode = $size = "No Perm";
			if($session !== null){
				// We only set the correct values if the player has the permission required.
				$brush = $session->getBrush();

				$shape = $brush->getShape()->getName();
				$type = $brush->getType()->getName();
				$mode = $brush->mode === Brush::MODE_BRUSH ? "Brush" : "Selection";
				$size = (string) $brush->size;
				if($brush->getShape()->usesThreeLengths()){
					$size = (string) $brush->width . "x" . (string) $brush->length . "x" . (string) $brush->height;
				}
			}
			return [
				"{brush_shape}" => $shape,
				"{brush_type}" => $type,
				"{brush_mode}" => $mode,
				"{brush_size}" => $size,
			];
		}
	}
}

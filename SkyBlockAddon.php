<?php
declare(strict_types = 1);

/**
 * @name SkyBlockAddon
 * @version 1.0.0
 * @main   JackMD\ScoreHud\Addons\SkyBlockAddon
 * @depend SkyBlock
 */
namespace JackMD\ScoreHud\Addons
{

	use JackMD\ScoreHud\addon\AddonBase;
	use pocketmine\Player;
	use room17\SkyBlock\session\BaseSession as SkyBlockSession;
	use room17\SkyBlock\island\RankIds;
	use room17\SkyBlock\SkyBlock;

	class SkyBlockAddon extends AddonBase{

		/** @var SkyBlock */
		private $skyBlock;

		public function onEnable(): void{
			$this->skyBlock = $this->getServer()->getPluginManager()->getPlugin("SkyBlock");
		}

		/**
		 * @param Player $player
		 * @return array
		 */
		public function getProcessedTags(Player $player): array{
			return [
				"{is_state}"   => $this->getIsleState($player),
				"{is_blocks}"  => $this->getIsleBlocks($player),
				"{is_members}" => $this->getIsleMembers($player),
				"{is_size}"    => $this->getIsleSize($player),
				"{is_rank}"    => $this->getIsleRank($player)
			];
		}

		/**
		 * @param Player $player
		 * @return string
		 */
		public function getIsleState(Player $player){
			$session = $this->skyBlock->getSessionManager()->getSession($player);

			if((is_null($session)) || (!$session->hasIsland())){
				return "No Island";
			}

			$isle = $session->getIsland();

			return $isle->isLocked() ? "Locked" : "Unlocked";
		}

		/**
		 * @param Player $player
		 * @return int|string
		 */
		public function getIsleBlocks(Player $player){
			$session = $this->skyBlock->getSessionManager()->getSession($player);

			if((is_null($session)) || (!$session->hasIsland())){
				return "No Island";
			}

			$isle = $session->getIsland();

			return $isle->getBlocksBuilt();
		}

		/**
		 * @param Player $player
		 * @return int|string
		 */
		public function getIsleMembers(Player $player){
			$session = $this->skyBlock->getSessionManager()->getSession($player);

			if((is_null($session)) || (!$session->hasIsland())){
				return "No Island";
			}

			$isle = $session->getIsland();

			return count($isle->getMembers());
		}

		/**
		 * @param Player $player
		 * @return string
		 */
		public function getIsleSize(Player $player){
			$session = $this->skyBlock->getSessionManager()->getSession($player);

			if((is_null($session)) || (!$session->hasIsland())){
				return "No Island";
			}

			$isle = $session->getIsland();

			return $isle->getCategory();
		}

		/**
		 * @param Player $player
		 * @return string
		 */
		public function getIsleRank(Player $player){
			$session = $this->skyBlock->getSessionManager()->getSession($player);

			if((is_null($session)) || (!$session->hasIsland())){
				return "No Island";
			}

			switch($session->getRank()){
				case RankIds::MEMBER:
					return "Member";
				case RankIds::OFFICER:
					return "Officer";
				case RankIds::LEADER:
					return "Leader";
				case RankIds::FOUNDER:
					return "Founder";
			}

			return "No Rank";
		}
	}
}

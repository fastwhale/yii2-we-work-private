<?php

	namespace fastwhale\yii2\weWork\src\dataStructure;

	use fastwhale\yii2\weWork\components\Utils;

	/**
	 * Class BatchJobPartyResult
	 *
	 * @property string $partyname  部门名称
	 * @property int    $partyid    部门ID
	 * @property int    $errcode    该部门对应操作的结果错误码
	 * @property string $errmsg     错误信息，例如无权限错误，键值冲突，格式错误等
	 *
	 * @package fastwhale\yii2\weWork\src\dataStructure
	 */
	class BatchJobParty1Result
	{

		/**
		 * @param array $arr
		 *
		 * @return BatchJobParty1Result
		 */
		public static function parseFromArray ($arr)
		{
			$jobPartyResult = new BatchJobParty1Result();

			$jobPartyResult->partyname = Utils::arrayGet($arr, "partyname");
			$jobPartyResult->partyid   = Utils::arrayGet($arr, "partyid");
			$jobPartyResult->errcode   = Utils::arrayGet($arr, "errcode");
			$jobPartyResult->errmsg    = Utils::arrayGet($arr, "errmsg");

			return $jobPartyResult;
		}
	}
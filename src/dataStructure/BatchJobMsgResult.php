<?php

	namespace fastwhale\yii2\weWork\src\dataStructure;

	use fastwhale\yii2\weWork\components\Utils;

	/**
	 * Class BatchJobUserResult
	 *
	 * @property array  $user_list    当前指定的jobid任务表示的应用已推送消息的成员列表
	 * @property string $msgid        当前指定的jobid任务表示的应用已推送消息的消息id
	 *
	 * @package fastwhale\yii2\weWork\src\dataStructure
	 */
	class BatchJobMsgResult
	{
		/**
		 * @param array $arr
		 *
		 * @return BatchJobUserResult
		 */
		public static function parseFromArray ($arr)
		{
			$jobUserResult = new BatchJobMsgResult();

			$jobUserResult->user_list = Utils::arrayGet($arr, "user_list");
			$jobUserResult->msgid     = Utils::arrayGet($arr, "msgid");

			return $jobUserResult;
		}
	}
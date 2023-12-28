<?php

	namespace fastwhale\yii2\weWork\src\dataStructure;

	use fastwhale\yii2\weWork\components\Utils;

	/**
	 * Class BatchJobResult todo 与私有化接口字段不一致
	 *
	 * @property int    $status                 任务状态，整型，1表示任务开始，2表示任务进行中，3表示任务已完成
	 * @property string $type                   操作类型，字节串，目前分别有：1. sync_user(增量更新成员) 2. replace_user(全量覆盖成员)3. replace_party(全量覆盖部门)
	 * @property int    $total                  任务运行总条数
	 * @property int    $percentage             目前运行百分比，当任务完成时为100
	 * @property array  $result                 详细的处理结果，具体格式参考下面说明。当任务完成后此字段有效
	 * @property array  $party_result           详细的处理结果，具体格式参考下面说明。当任务完成后此字段有效
	 * @property array  $listuser_result        异步获取部门成员的处理结果。 此处返回的是文件id，可通过获取临时素材文件下载结果
	 * @package fastwhale\yii2\weWork\src\dataStructure
	 */
	class BatchJobResult
	{
		const STATUS_STARTED  = 1;
		const STATUS_PENDING  = 2;
		const STATUS_FINISHED = 3;

		//1.replace_party(全量覆盖部门) 2.replace_user(全量覆盖成员) 3.sync_user(增量更新成员) 4.send_msg(应用发消息) 5.sync_party(增量更新部门) 6.async_user(异步获取部门成员详情) 7.async_user_simple(异步获取部门成员)
		const TYPE_REPLACE_PARTY     = 1;
		const TYPE_REPLACE_USER      = 2;
		const TYPE_SYNC_USER         = 3;
		const TYPE_SEND_MSG          = 4;
		const TYPE_SYNC_PARTY        = 5;
		const TYPE_ASYNC_USER        = 6;
		const TYPE_ASYNC_USER_SIMPLE = 7;

		/**
		 * @param array $arr
		 *
		 * @return BatchJobResult
		 */
		public static function parseFromArray ($arr)
		{
			$jobResult = new BatchJobResult();

			$jobResult->status     = Utils::arrayGet($arr, "status");
			$jobResult->type       = Utils::arrayGet($arr, "type");
			$jobResult->total      = Utils::arrayGet($arr, "total");
			$jobResult->percentage = Utils::arrayGet($arr, "percentage");

			$jobResult->result = [];
			$resultList        = Utils::arrayGet($arr, 'result');
			if (is_array($resultList)) {
				foreach ($resultList as $item) {
					if ($jobResult->type == static::TYPE_REPLACE_PARTY) {
						array_push($jobResult->result, BatchJobPartyResult::parseFromArray($item));
					} elseif (in_array($jobResult->type, [static::TYPE_SYNC_USER, static::TYPE_REPLACE_USER])) {
						array_push($jobResult->result, BatchJobUserResult::parseFromArray($item));
					} elseif ($jobResult->type == static::TYPE_SEND_MSG) {
						array_push($jobResult->result, BatchJobMsgResult::parseFromArray($item));
					}
				}
			}

			$jobResult->party_result = [];
			$partyResultList         = Utils::arrayGet($arr, 'party_result');
			if (is_array($partyResultList)) {
				foreach ($partyResultList as $item) {
					if ($jobResult->type == static::TYPE_SYNC_PARTY) {
						array_push($jobResult->party_result, BatchJobParty1Result::parseFromArray($item));
					}
				}
			}

			$jobResult->listuser_result = Utils::arrayGet($arr, 'listuser_result');

			return $jobResult;
		}
	}
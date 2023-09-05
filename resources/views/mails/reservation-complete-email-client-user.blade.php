{!! $data['clientUserName'] !!}様
この度、残業時間が閾値を超えた医師への疲労蓄積度調査を実施させていただきました。調査結果と面談医との面談詳細をご報告させていただきます。

[結果]
{!! $data['hirouSituationMemo'] !!}

[面談詳細]
面談対象者：{!! $data['employeeName'] !!}
担当面談医：{!! $data['sangyoiName'] !!}
面談実施日時：{!! $data['reserveDate'] !!} {!! $data['reserveTimeFrom'] !!} ~ {!! $data['reserveTimeTo'] !!}
面談場所：zoom

ご不明な点があれば下記の連絡先へご連絡ください。
日本産業医支援機構TEL：{!! $data['tel'] !!}
問合せ時間　{!! $data['hour'] !!}

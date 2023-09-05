{!! $data['sangyoiName'] !!}様
明日は面接日になっております。
時間になりましたら、下記のリンクから管理画面へログインをし、セルフチェック/疲労蓄積度チェック・長時間労働チェック結果を確認して面接を行なってください。

{!! $data['reportUrl'] !!}

※万が一キャンセルをする場合下記のリンクから対象の面接を選択し、遅刻・キャンセル処理を行なってください。
{!! $data['cancelUrl'] !!}

日時：{!! $data['reserveDate'] !!} {!! $data['reserveTimeFrom'] !!} ~ {!! $data['reserveTimeTo'] !!}
zoomURLはこちらです
{!! $data['zoomMeetingUrl'] !!}
ミーティングID:{!! $data['zoomMeetingId'] !!}
ミーティングPW:{!! $data['zoomMeetingPw'] !!}
企業名：{!! $data['userCompanyName'] !!}

ご不明な点があれば下記の連絡先へご連絡ください。
日本産業医支援機構TEL：{!! $data['tel'] !!}
問合せ時間　{!! $data['hour'] !!}

{!! $data['sangyoiName'] !!}様
下記の日程で面接日程の変更がされました。
下記のリンクから管理画面へログインをし、内容を確認してください。

{!! $data['loginUrl'] !!}

日時：{!! $data['reserveDate'] !!} {!! $data['reserveTimeFrom'] !!} ~ {!! $data['reserveTimeTo'] !!}

zoomURLはこちらです
Zoomミーティングに参加する
{!! $data['zoomUrl'] !!}
ミーティングID:{!! $data['zoomId'] !!}
ミーティングPW:{!! $data['zoomPassword'] !!}
企業名：{!! $data['companyName'] !!}

※万が一キャンセルをする場合下記のリンクから対象の面接を選択し、遅刻・キャンセル処理を行なってください。
{!! $data['cancelUrl'] !!}

ご不明な点があれば下記の連絡先へご連絡ください。
日本産業医支援機構TEL：{!! $data['tel'] !!}
問合せ時間　{!! $data['hour'] !!}

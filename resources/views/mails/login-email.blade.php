@if ($data['type'] == 'sangyoi')
長時間労働者面接システム 面接おまかせくんアカウントのパスワードのリセットが完了しました
下記のリンクからログインしてください。

{!! $data['url'] !!}

ご不明な点があれば下記の連絡先へご連絡ください。
電話番号：{!! $data['tel'] !!}
営業時間　{!! $data['hour'] !!}
@elseif ($data['type'] == 'user')
長時間労働者面接システム 面接おまかせくんアカウントのパスワードのリセットが完了しました
下記のリンクからログインしてください。

{!! $data['url'] !!}
@else
長時間労働者面接システム 面接おまかせくんのパスワードのリセットが完了しました
下記のリンクからログインしてください。

{!! $data['url'] !!}

ご不明な点があれば下記の連絡先へご連絡ください。
連絡先：{!! $data['mail'] !!}
電話番号：{!! $data['tel'] !!}
営業時間　{!! $data['hour'] !!}
@endif

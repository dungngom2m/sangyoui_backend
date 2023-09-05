面接指導実施医師のスケジュールが更新されました。
下記のリンクから管理画面へログインし、産業医のスケジュールを確認してください。

{!! $data['url'] !!}

スケジュール更新面接指導実施医師一覧

@foreach ($data['item'] as $item)
所属医療機関名：{!! $item['user_company_name'] !!}
氏名：{!! $item['doctor_name'] !!}

@endforeach

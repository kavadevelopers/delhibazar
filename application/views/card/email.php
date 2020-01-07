<!DOCTYPE html>
<html>
<head>
	<title>Virtual Card</title>
</head>
<body>
	<p> Hello <?= $name ?> Your Virtual Card</p>

	<br><br>

	<div style="width: 330px; height: 180px; background: #000000; margin: 0 auto;display: table;border-radius: 10px;">
		<div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
			<img src="<?= base_url() ?>image/logo.png" style="width: 100%;">
			<p style="padding: 0px; text-align: center; color: #ffc107; font-size: 14px; margin: 0;">
				<?= get_setting()['card_text'] ?>
			</p>
			<p style="padding: 0px; text-align: center; color: #ffffff; font-size: 14px; margin: 0;">
				<?= get_setting()['card_email'] ?>
			</p>
		</div>
		<div style="vertical-align: middle; width: 50%; display: table-cell; text-align: center;">
			<img src="<?= base_url('uploads/qr/').$qr; ?>" style="width: 70%;">
			<p style="padding: 0px; text-align: center; color: #ffffff; font-size: 12px; margin: 5px 0 0 0; line-height: 1;">
				<?= get_setting()['card_web'] ?>
			</p>
		</div>
	</div>

	<div style="margin-top: 40px;">
		<?= $card_desc['desc'] ?>
	</div>
</body>
</html>
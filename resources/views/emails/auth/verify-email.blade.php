<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Подтверждение email</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, sans-serif; color:#333;">
<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:40px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.05);">

                ```
                <!-- Header -->
                <tr>
                    <td style="background:#10b981; padding:20px 30px; text-align:left;">
                        <h1 style="margin:0; font-size:20px; color:#ffffff;">
                            {{ config('app.name') }}
                        </h1>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:30px;">
                        <h2 style="margin-top:0; font-size:22px;">
                            Здравствуйте, {{ $user->name }}!
                        </h2>

                        <p style="margin:16px 0;">
                            Спасибо за регистрацию в нашем сервисе. Мы рады видеть вас среди пользователей.
                        </p>

                        <p style="margin:16px 0;">
                            Чтобы активировать ваш аккаунт и начать пользоваться всеми возможностями, подтвердите email по кнопке ниже:
                        </p>

                        <!-- Button -->
                        <div style="text-align:center; margin:30px 0;">
                            <a href="{{ $url }}"
                               style="display:inline-block; background-color:#10b981; color:#ffffff; padding:14px 28px; text-decoration:none; border-radius:8px; font-weight:bold; font-size:14px; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                                Подтвердить email
                            </a>
                        </div>

                        <!-- Info box -->
                        <div style="background:#f9fafb; border-left:4px solid #10b981; padding:15px 20px; margin:25px 0; border-radius:6px;">
                            <p style="margin:0; font-size:14px;">
                                ⏱ Ссылка действительна в течение <strong>24 часов</strong>.
                            </p>
                        </div>

                        <p style="margin:16px 0; font-size:14px; color:#666;">
                            Если вы не создавали аккаунт, просто проигнорируйте это письмо — никаких дополнительных действий не требуется.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="padding:20px 30px; background:#f9fafb; font-size:13px; color:#888;">
                        <p style="margin:0;">
                            С уважением,<br>
                            <strong>Команда {{ config('app.name') }}</strong>
                        </p>
                        <p style="margin:10px 0 0;">
                            Это автоматическое письмо, пожалуйста, не отвечайте на него.
                        </p>
                    </td>
                </tr>

            </table>

            <!-- Spacer -->
            <div style="height:20px;"></div>

            <!-- Bottom note -->
            <p style="font-size:12px; color:#aaa;">
                © {{ date('Y') }} {{ config('app.name') }}. Все права защищены.
            </p>

        </td>
    </tr>
</table>
```

</body>
</html>

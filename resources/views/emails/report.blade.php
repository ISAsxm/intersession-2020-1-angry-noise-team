<!-- TODO -->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color:#f0f2ea; margin:0; padding:0; color:#333333;">

    <table width="100%" bgcolor="#191F40" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td style="padding:40px 0;">
                    <!-- begin main block -->
                    <table cellpadding="0" cellspacing="0" width="608" border="0" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <a style="display:block; width:407px; height:100px; margin:0 auto 30px;">
                                        <img src="{{asset('images/email/banniere.png')}}" height="100px" alt="Code Laïka bannière lune" style="display:block; border:0; margin:0;">
                                    </a>
                                    <!-- begin wrapper -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="8" height="4" colspan="2" style="background:url(http://demo.artlance.ru/email/shadow-top-left.png) no-repeat 100% 100%;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td height="4" style="background:url(http://demo.artlance.ru/email/shadow-top-center.png) repeat-x 0 100%;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="8" height="4" colspan="2" style="background:url(http://demo.artlance.ru/email/shadow-top-right.png) no-repeat 0 100%;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-left-top.png) no-repeat 100% 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td colspan="3" rowspan="3" bgcolor="#FFFFFF" style="padding:0 0 30px;">
                                                    <!-- begin content -->
                                                    <a href="{{ url('/') }}"><img src="{{asset('images/email/header2.jpg')}}" width="600" height="200" alt="Code Laïka" style="display:block; border:0; margin:0 0 44px; background:#eeeeee;"></a>
                                                    <p style="margin:0 30px 33px;; text-align:center; text-transform:uppercase; font-size:24px; line-height:30px; font-weight:bold; color:#222a59;">
                                                        Resultat de votre analyse
                                                    </p>
                                                    <!-- begin articles -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tbody>
                                                            <tr valign="top">
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <a style="display:block; margin:0 0 14px;"><img src="{{asset('images/email/computer2.png')}}" width="255" height="100" alt="Pictogramme ordinateur" style="display:block; margin:0; border:0;object-fit:contain;"></a>
                                                                    <h3 style="text-align:center;font-size:30px;padding:0;margin:0;color:#222a59;">24053</h3>
                                                                    <p style="font-size:14px; line-height:22px; font-weight:bold; color:#303E8C; margin:0 0 5px;text-align:center;">Lignes analysées</p>

                                                                </td>
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <a style="display:block; margin:0 0 14px;"><img src="{{asset('images/email/error2.png')}}" width="255" height="100" alt="Pictogramme panneau danger" style="display:block; margin:0; border:0;object-fit:contain;"></a>
                                                                    <h3 style="text-align:center;font-size:30px;padding:0;margin:0;color:#222a59;">80</h3>
                                                                    <p style="font-size:14px; text-align:center; line-height:22px; font-weight:bold; color:#303E8C; margin:0 0 5px;">Erreurs repérées</p>

                                                                </td>
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:30px;">&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                            <tr valign="top">
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                                <td colspan="3">
                                                                    <p style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:15px 0 15px;text-align: center;">Détails de votre analyse pour le repo : <a target="_blank" rel="noopener noreferrer" href="{{ url('/') }}" style="color:#303E8C; text-decoration:none;display: block;">https://github.com/it-akademy-students/intersession-2020-1-angry-noise-team</a></p>
                                                                    <table style="border-collapse: collapse;border-bottom: 2px solid #333333;">
                                                                        <thead style="background-color:#222a59;color:white;">
                                                                            <tr style="text-align:left">
                                                                                <th style="padding: 0px 0px 0px 15px;">
                                                                                    Id
                                                                                </th>
                                                                                <th style="padding:10px;max-width:140px;word-wrap: break-word;">
                                                                                    Fichier
                                                                                </th>
                                                                                <th style="padding: 0px 15px 0px 5px;">
                                                                                    Détail
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($reportData as $index => $row)
                                                                            <tr style="border-bottom: 1px solid rgba(150,150,150,0.3);">
                                                                                <td style="color:#222a59;padding: 0px 0px 0px 15px;">
                                                                                    <h3 style="font-size:17px;">{{ $index + 1 }}</h3>
                                                                                </td>
                                                                                <td style="color:#222a59;padding:0px 5px;max-width:140px;word-wrap: break-word;">
                                                                                    <h3 style="font-size:14px;">{{ $row['file'] }}</h3>
                                                                                </td>
                                                                                <td style="color:#222A59;padding: 0px 15px 0px 5px;">
                                                                                    @foreach($row['errors'] as $error)
                                                                                        <h4 style="text-align:justify;margin-bottom: 5px">{{ $error['name'] }}</h4>
                                                                                        <p style="font-size:14px;text-align:left;"> {{ $error['description'] }}</p>
                                                                                    @endforeach
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    <h4 style="font-size:15px; line-height:22px; font-weight:bold; margin:30px 0 15px;text-align: center;color:#303E8C">Merci d'avoir utilisé Code Laïka et bonnes corrections à vous !</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- /end articles -->
                                                    <p style="margin:0; font-size:5px; line-height:5px; margin:0 30px 29px;">&nbsp;</p>
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tbody>
                                                            <tr valign="top">
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                                <td>
                                                                    <p style="margin:0 0 4px; font-weight:bold; color:#222a59; font-size:14px; line-height:22px;">Code Laïka</p>
                                                                    <p style="margin:0; color:#333333; font-size:11px; line-height:18px;text-align:justify;">
                                                                        Code Laïka est un outil vous permettant d'analyser votre code PHP. Grâce à son analyse robuste, votre PHP deviendra une oeuvre d'art en seulement quelques minutes.
                                                                        Il suffit pour cela d'indiquer l'URL de votre repo puis de patienter quelques minutes. Une fois l'analyse terminée vous pouvez recevoir les résultats en indiquant votre adresse email.
                                                                    </p>
                                                                </td>
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                                <td width="100" style="vertical-align:middle;">
                                                                    <p style="margin:0; font-weight:bold; clear:both; font-size:12px; line-height:22px;">
                                                                        <a href="{{ url('/') }}" style="color:#36D9C8; text-decoration:none;">Site internet</a><br>
                                                                    </p>
                                                                </td>
                                                                <td width="30">
                                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- end content -->
                                                </td>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-right-top.png) no-repeat 0 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td width="4" style="background:url(http://demo.artlance.ru/email/shadow-left-center.png) repeat-y 100% 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="4" style="background:url(http://demo.artlance.ru/email/shadow-right-center.png) repeat-y 0 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-left-bottom.png) repeat-y 100% 100%;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-right-bottom.png) repeat-y 0 100%;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-corner-left.png) no-repeat 100% 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-left.png) no-repeat 100% 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-center.png) repeat-x 0 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-right.png) no-repeat 0 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                                <td width="4" height="4" style="background:url(http://demo.artlance.ru/email/shadow-bottom-corner-right.png) no-repeat 0 0;">
                                                    <p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end wrapper-->
                                    <p style="margin:0; padding:34px 0 0; text-align:center; font-size:11px; line-height:13px; color:white;">
                                        Don‘t want to recieve further emails? You can unsibscribe <a href="http://pixelbuddha.net/" style="color:#36D9C8; text-decoration:underline;">here</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- end main block -->
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
